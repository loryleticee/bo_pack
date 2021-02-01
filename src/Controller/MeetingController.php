<?php

namespace App\Controller;

use App\Form\Front\RefuseMeetingType;
use App\Manager\DocumentManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use App\Service\Crypt;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Invite;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class MeetingController
 * @package App\Controller
 */
class MeetingController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var UserManager */
    protected $userManager;

    /** @var MeetingManager */
    protected $meetingManager;

    /** @var DocumentManager */
    protected $documentManager;

    /** @var Em */
    protected $em;

    protected $session;

    /**
     * CampaignController constructor.
     */

    public function __construct(CongresManager $congresManager, UserManager $userManager, MeetingManager $meetingManager, DocumentManager $documentManager, SessionInterface $session, EntityManagerInterface $em)
    {
        $this->congresManager = $congresManager;
        $this->userManager = $userManager;
        $this->meetingManager = $meetingManager;
        $this->documentManager = $documentManager;
        $this->session = $session;
        $this->em = $em;
    }

    /**
    * @Route("/meeting/accept/{idEncrypt}", name="meeting_accept")
    */
    public function meetingAccept($idEncrypt, \Swift_Mailer $mailer, Crypt $crypt)
    {
        $id = base64_decode(urldecode($idEncrypt));
        $meeting = $this->meetingManager->getById($id);
        $congres = $this->congresManager->getById($meeting->getCongres());
        $customer = $this->userManager->getCustomerById($meeting->getCustomer());
        $contact = $this->userManager->getById($meeting->getUser());
        $idEncrypt = urlencode($idEncrypt);

        if ($meeting == null){return $this->render('notFound.html.twig');}

        $startDate = date_format($meeting->getStartDate(),"Y-m-d H:i");
        $endDate = date_format($meeting->getEndDate(),"Y-m-d H:i");
        //dd($meeting,$meeting->getStartDate());
        $date_start = new \DateTime($startDate, new \DateTimeZone('Europe/Paris'));
        // Conversion en UTC
        $date_start->setTimezone(new \DateTimeZone('UTC'));

        $date_end = new \DateTime($endDate, new \DateTimeZone('Europe/Paris'));
        // Conversion en UTC
        $date_end->setTimezone(new \DateTimeZone('UTC'));

        $invite = new Invite();
        $invite
            ->setSubject("Rendez-vous Incyte - Congrès SFH 2020")
            ->setDescription("Rendez-vous sur le stand Incyte.")
            ->setStart($date_start)
            ->setEnd($date_end)
            ->setLocation("Palais des congrès, Paris")
            ->setOrganizer($contact->getEmail(), $contact->getLastname())
            ->addAttendee($customer->getEmail(), $customer->getLastname())
            ->generate() // generate the invite
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
            ->attach(\Swift_Attachment::fromPath( Invite::getSavedPath() ))
        ;
        $mailer->send($message);

        return $this->render('meeting/acceptedMeeting.html.twig',
            ['congres' => $congres,
            'cryptEmail' => $crypt->cryptWithSalt($contact->getEmail())
            ]);
    }

    /**
     * @Route("/meeting/refuse/{idEncrypt}", name="meeting_refuse")
     */
    public function meetingRefuse($idEncrypt, Request $request, \Swift_Mailer $mailer, Crypt $crypt)
    {
        $refusedBy = $request->query->get('refusedBy');
        $id = base64_decode(urldecode($idEncrypt));
        $meeting = $this->meetingManager->getById($id);
        $congres = $this->congresManager->getById($meeting->getCongres());
        $contact = $this->userManager->getById($meeting->getUser());
        $customer = $this->userManager->getCustomerById($meeting->getCustomer());

        if ($meeting == null || $refusedBy == null){return $this->render('notFound.html.twig');}
        $form = $this->createForm(RefuseMeetingType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $reason = $form->get('reasonCancel')->getData();

            if ($refusedBy == 'customer'){
                $meeting->setReasonCancel($reason)
                    ->setIsOpen(true)
                    ->setIsReserved(false)
                    ->setCustomer(null)
                ;

                $customer->setMeeting(null);

                $this->em->persist($meeting);
                $this->em->persist($customer);
                $this->em->flush();


                //Send mail to contact
                $message = (new \Swift_Message('Rendez-vous annulé'))
                    ->setFrom($_ENV['EMAIL_SENDER'])
                    ->setTo($contact->getEmail())
                    ->setBody(
                        $this->renderView('emails/annulationMeeting.html.twig', [
                            'meeting' => $meeting,
                            'meetingIdEncrypt' => $idEncrypt,
                            'customer' => $customer,
                            'contact' => $contact,
                            'congres' => $congres,
                            'domain_name' => $_ENV['DOMAIN_NAME'],
                            'refusedBy' => $refusedBy,
                            'mailCrypt' => $crypt->cryptWithSalt($contact->getEmail())
                        ]),
                        'text/html'
                    )
                ;
            }
            if ($refusedBy == 'contact'){
                $meeting->setReasonCancel($reason)
                    ->setIsReserved(false)
                ;
                //dd($meeting);
                $this->em->persist($meeting);
                $this->em->flush();
                //Send mail to customer
                if ($customer){
                    $message = (new \Swift_Message('Rendez-vous annulé'))
                        ->setFrom($_ENV['EMAIL_SENDER'])
                        ->setTo($customer->getEmail())
                        ->setBody(
                            $this->renderView('emails/annulationMeeting.html.twig', [
                                'meeting' => $meeting,
                                'meetingIdEncrypt' => $idEncrypt,
                                'customer' => $customer,
                                'contact' => $contact,
                                'congres' => $congres,
                                'domain_name' => $_ENV['DOMAIN_NAME'],
                                'refusedBy' => $refusedBy,
                                'mailCrypt' => $crypt->cryptWithSalt($contact->getEmail())
                            ]),
                            'text/html'
                        )
                    ;
                }
            }

            $mailer->send($message);

            return $this->render('meeting/validationRefuseMeeting.html.twig', [
                'congres' => $congres,
                'refusedBy' => $refusedBy,
                'contact' => $contact,
                'customer' => $customer,
                'meeting' => $meeting,
                'mailCrypt' => $crypt->cryptWithSalt($contact->getEmail())
            ]);
        }


        return $this->render('meeting/refuseMeeting.html.twig', [
            'form' => $form->createView(),
            'congres' => $congres,
            'refusedBy' => $refusedBy
        ]);
    }
}
