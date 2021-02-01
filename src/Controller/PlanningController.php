<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Manager\CongresManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use App\Service\Crypt;
use App\Service\Invite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PlanningController
 * @package App\Controller
 */
class PlanningController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var UserManager */
    protected $userManager;

    /** @var MeetingManager */
    protected $meetingManager;

    /** @var Em */
    protected $em;

    public function __construct(CongresManager $congresManager, UserManager $userManager, MeetingManager $meetingManager, EntityManagerInterface $em)
    {
        $this->congresManager = $congresManager;
        $this->userManager = $userManager;
        $this->meetingManager = $meetingManager;
        $this->em = $em;
    }

    /**
     * @Route("/planning/user/{email}/{idCongres}", name="planning_user")
     */
    public function userPlanning($email, $idCongres, Crypt $crypt)
    {
        $alluser = $this->userManager->getAll();
        $userFind = null;
        foreach ($alluser as $user){
            if ($crypt->cryptWithSalt($user->getEmail()) == $email){
                    $userFind = $user;
                }
            }

        $congres = $this->congresManager->getById($idCongres);
        if ($congres == null || $userFind == null){return $this->render('notFound.html.twig');}
        $meeting = $this->meetingManager->getAllByCongresAndUser($idCongres, $userFind->getId());

        return $this->render('planning/planningUser.html.twig', [
            'congres' => $congres,
            'user' => $userFind,
            'meetings' => $meeting,
            'startDate' => $congres->getStartDate(),
        ]);
    }

    /**
     * @Route("/planning/send/meeting", name="planning_user_send")
     */
    public function sendMeeting(Request $request, \Swift_Mailer $mailer, Crypt $crypt)
    {
        $data = $request->request;

        if (!is_null($data->get('meeting'))) {

            $meeting = $this->meetingManager->getById(($data->get('meeting')));
            $reason = $this->meetingManager->getReasonById(($data->get('reason')));
            $congres = $this->congresManager->getById($meeting->getCongres());
            $contact = $this->userManager->getById($meeting->getUser());
            $idEncrypt = urlencode(base64_encode($meeting->getId()));

            $customer = new Customer();
            $customer->setFirstname($data->get('firstname'))
                ->setCivility($data->get('civility'))
                ->setLocalisation($data->get('localisation'))
                ->setLastname($data->get('lastname'))
                ->setEmail($data->get('mail'))
                ->setPhone($data->get('phone'))
                ->setMeeting($meeting);
            $this->em->persist($customer);

            $meeting->setCustomer($customer)
                ->setReason($reason)
                ->setIsOpen(false)
                ->setIsReserved(true);
            $this->em->persist($meeting);
            $this->em->flush();

            $invite = new Invite();
            $invite
                ->setSubject("Rendez-vous Incyte - Congrès SFH 2020")
                ->setDescription("Nous vous attendons sur notre stand.")
                ->setStart($meeting->getStartDate())
                ->setEnd($meeting->getEndDate())
                ->setLocation("Palais des congrès, Paris")
                ->setOrganizer($contact->getEmail(), $contact->getLastname())
                ->addAttendee($customer->getEmail(), $customer->getLastname())
                ->generate()// generate the invite
                ->save(); // save it to a file


            $message = (new \Swift_Message('Rendez-vous accepté'))
                ->setFrom($_ENV['EMAIL_SENDER'])
                ->setTo($customer->getEmail())
                ->setBody(
                    $this->renderView('emails/acceptedMeeting.html.twig', [
                        'meeting' => $meeting,
                        'meetingIdEncrypt' => $idEncrypt,
                        'customer' => $customer,
                        'contact' => $contact,
                        'congres' => $congres,
                        'domain_name' => $_ENV['DOMAIN_NAME']
                    ]),
                    'text/html'
                )
                ->attach(\Swift_Attachment::fromPath(Invite::getSavedPath()));
            $mailer->send($message);
            $this->addFlash('sucess','erreur réessayer');
        }else{$this->addFlash('error','erreur réessayer');}
           return $this->redirectToRoute('planning_user', ['email' => $crypt->cryptWithSalt($contact->getEmail()), 'idCongres' => $congres->getId() ]);
    }

}