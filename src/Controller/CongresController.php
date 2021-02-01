<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\Front\SecurityCongresType;
use App\Manager\CategoriesManager;
use App\Manager\DocumentManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use App\Service\Crypt;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CongresController
 * @package App\Controller
 * @Route("/congres/{id}")
 */
class CongresController extends AbstractController
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
    * @Route("/", name="congres_home")
    */
    public function home($id, Request $request, Crypt $crypt)
    {
        $entity = $this->congresManager->getById($id);
        if ($entity == null){return $this->render('notFound.html.twig');}
        $eventStart = true;
        if ($entity->getStartDate() > new \DateTime()){
            $eventStart = false;
        }
        if ($entity->getEndDate() < (new \DateTime())->setTime(0,0)){return $this->render('eventFinish.html.twig');}
        //Check code in get and put in session
        $code = $request->query->get('code');
        //dd($crypt->cryptWithSalt($entity->getSecurityCode()));
        //$this->session->set('code', null);
        if ($code === $crypt->cryptWithSalt($entity->getSecurityCode())){
            $this->session->set('code', true);
            return $this->redirectToRoute('congres_home', ['id' => $id]);
        }

        $form = $this->createForm(SecurityCongresType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $codeForm = $form->get('code')->getData();
            if ($codeForm === $entity->getSecurityCode()){
                $this->session->set('code', true);

                return $this->redirectToRoute('congres_documents', ['id' => $id]);
            }
            else{$this->addFlash('error', 'Code non valide');}
        }


        $code = $this->session->get('code');

        return $this->render('congres/home.html.twig', [
            'congres' => $entity,
            'code' => $code,
            'formSecurity' => $form->createView(),
            'eventStart' => $eventStart
        ]);
    }

    /**
     * @Route("/contact", name="congres_contact")
     */
    public function contact($id, Request $request)
    {
        $congres = $this->congresManager->getById($id);
        if ($congres == null){return $this->render('notFound.html.twig');}
        if ($congres->getEndDate() < (new \DateTime())->setTime(0,0)){return $this->render('eventFinish.html.twig');}

        $query = $request->query;
        if (!empty($query->get('firstname'))){
            $customer = ['firstname' => $query->get('firstname'),
                'reason' => $query->get('reason'),
                'lastname' => $query->get('lastname'),
                'civility' => $query->get('civility'),
                'localisation' => $query->get('localisation'),
                'phone' => $query->get('phone'),
                'mail' => $query->get('mail'),
                'contact' => $query->get('contact'),
            ];

        }else{$customer = [];}


        $contact = $this->userManager->getAllByCongres($congres);
        $search = $request->request->get('search');
        if (!is_null($search)){
            $contact = $this->userManager->search($congres->getId(), $search);
        }

        return $this->render('congres/contact.html.twig', [
            'startDate' => $congres->getStartDate(),
            'congres' => $congres,
            'contacts' => $contact,
            'customer' => $customer
        ]);
    }

    /**
     * @Route("/documents", name="congres_documents")
     */
    public function documents($id, Request $request, CategoriesManager $categoriesManager)
    {
        $entity = $this->congresManager->getById($id);
        if ($entity == null){return $this->render('notFound.html.twig');}
        if ($entity->getEndDate() < (new \DateTime())->setTime(0,0)){return $this->render('eventFinish.html.twig');}
        if ($entity->getStartDate() > new \DateTime()){return $this->render('eventToCome.html.twig', ['congres'=>$entity]);}
        $documents = $this->documentManager->getAllByCongres($entity);
        $categories = $this->documentManager->getAllCategories();
        $get = $request->query->get('category');
        $cat = $categoriesManager->getCatDocByName($get);
        if (!is_null($cat)){
            $documents = $this->documentManager->getByCategory($id, $cat->getId());
        }
        $search = $request->request->get('search');
        if (!is_null($search)){
            $documents = $this->documentManager->search($entity->getId(), $search);
        }
        return $this->render('congres/document.html.twig', [
            'congres' => $entity,
            'documents' => $documents,
            'categories' => $categories,
            'get' => $get
        ]);
    }

    /**
     * @Route("/search/documents", name="search_doc")
     */
    public function searchDoc($id, Request $request)
    {
        $entity = $this->congresManager->getById($id);
        if ($entity == null){return $this->render('notFound.html.twig');}
        if ($entity->getEndDate() < (new \DateTime())->setTime(0,0)){return $this->render('eventFinish.html.twig');}
        if ($entity->getStartDate() > new \DateTime()){return $this->render('eventToCome.html.twig', ['congres'=>$entity]);}

        $get = $request->query->get('category');
        $documents = $this->documentManager->search($entity->getId(), $get);
        //dd($documents);
        return $this->render('congres/caroussel.html.twig', [
            'documents' => $documents
        ]);

    }

    /**
     * @Route("/send", name="question_send")
     */
    public function questionSend($id, Request $request, \Swift_Mailer $mailer, Crypt $crypt)
    {
        $data = $request->request;
        $entity = $this->congresManager->getById($id);
        if ($entity == null){return $this->render('notFound.html.twig');}
        if ($entity->getEndDate() < new \DateTime()){return $this->render('eventFinish.html.twig');}

        if (!is_null($data->get('meeting'))){

            $meeting = $this->meetingManager->getById(($data->get('meeting')));
            $reason = $this->meetingManager->getReasonById(($data->get('reason')));

            $customer = new Customer();
            $customer->setFirstname($data->get('firstname'))
                ->setCivility($data->get('civility'))
                ->setLocalisation($data->get('localisation'))
                ->setLastname($data->get('lastname'))
                ->setEmail($data->get('mail'))
                ->setPhone($data->get('phone'))
                ->setMeeting($meeting)
            ;
            $this->em->persist($customer);

            $meeting->setCustomer($customer)
                ->setReason($reason)
                ->setIsOpen(false)
                ->setIsReserved(true)
            ;
            $this->em->persist($meeting);
            $this->em->flush();

            $contactId = $meeting->getUser();
            $contact = $this->userManager->getById($contactId);
            $congres = $this->congresManager->getById($id);

            $meetingId = urlencode(base64_encode($meeting->getId()));

            $message = (new \Swift_Message('Demande de rendez-vous'))
                ->setFrom($_ENV['EMAIL_SENDER'])
                ->setTo($contact->getEmail())
                ->setBody(
                    $this->renderView('emails/askMeeting.html.twig', [
                        'meeting' => $meeting,
                        'meetingIdEncrypt' => $meetingId,
                        'customer' => $customer,
                        'contact' => $contact,
                        'congres' => $congres,
                        'domain_name' => $_ENV['DOMAIN_NAME'],
                        'mailCrypt' => $crypt->cryptWithSalt($contact->getEmail())
                    ]),
                    'text/html'
                )
            ;
            $mailer->send($message);

            return $this->render('meeting/askMeetingSend.html.twig', [
                'contact' => $contact,
                'id'=> $id
            ]);
        }

        return $this->redirectToRoute('congres_home', ['id' => $id]);
    }

    /**
     * @Route("/add/stat", name="add_stat")
     */
    public function addStatDocument($id, Request $request)
    {
        $entity = $this->congresManager->getById($id);
        if ($entity == null){return $this->render('notFound.html.twig');}
        if ($entity->getEndDate() < (new \DateTime())->setTime(0,0)){return $this->render('eventFinish.html.twig');}
        if ($entity->getStartDate() > new \DateTime()){return $this->render('eventToCome.html.twig', ['congres'=>$entity]);}

        $idDoc = $request->query->get('doc');
        $doc = $this->documentManager->getById($idDoc);
        $stat = $doc->getNumberDownload();
        $stat = $stat + 1;
        $doc->setNumberDownload($stat);
        $this->em->persist($doc);
        $this->em->flush();
        return new JsonResponse(true);
    }

}
