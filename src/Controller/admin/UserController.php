<?php


namespace App\Controller\admin;


use App\Entity\Congres;
use App\Entity\Meeting;
use App\Entity\User;
use App\Form\Back\UserCreationType;
use App\Form\Back\UserEditType;
use App\Manager\CongresManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/admin")
 */
class UserController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var UserManager */
    protected $userManager;

    /** @var Em */
    protected $em;

    /** @var MeetingManager */
    protected $meetingManager;

    private $passwordEncoder;


    public function __construct(
        CongresManager $congresManager,
        UserManager $userManager,
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder,
        MeetingManager $meetingManager
    ) {
        $this->congresManager = $congresManager;
        $this->userManager = $userManager;
        $this->userManager = $userManager;
        $this->em = $em;
        $this->meetingManager = $meetingManager;
        $this->passwordEncoder = $passwordEncoder;

    }

    /**
     * @Route("/{id}/user", name="admin_congres_user")
     */
    public function user($id, Request $request)
    {
        $congres = $this->congresManager->getById($id);
        $users = $this->userManager->getAllByCongres($congres);
        if ($congres == null) {
            return $this->render('notFound.html.twig');
        }

        return $this->render('admin/congres/user.html.twig', [
            'congres' => $congres,
            'users' => $users

        ]);
    }

    /**
     * @Route("/{id}/new/user", name="admin_create_user_in_congres")
     */
    public function createUserInCongres($id, Request $request)
    {
        $congres = $this->congresManager->getById($id);
        if ($congres == null) {
            return $this->render('notFound.html.twig');
        }

        $form = $this->createForm(UserCreationType::class);
        $form->setData(new User());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $img = $form->get('img')->getData();

            $originalFilename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $safeFilename = $originalFilename;
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $img->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $img->move(
                    $this->getParameter('photo_user_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur');
            }


            $user->setPassword($this->passwordEncoder->encodePassword($user, 'userincyte2020'))
                ->setImg($newFilename)
                ->addCongres($congres);
            $this->em->persist($user);

            //Génération des meetings
            $hourMin = $congres->getHourMin();
            $startDate = $congres->getStartDate();
            $endDate = $congres->getEndDate();
            $hourMax = $congres->getHourMax();
            //->sub(new \DateInterval('PT1S'));
            $duration = $congres->getDurationMeeting();
            $duration = $duration->diff(new \DateTime("1970-01-01 00:00:00.0"));


            $daterangeByDay = [];
            $daterange = new \DatePeriod($hourMin, $duration, $hourMax);
            while ($startDate <= $endDate) {
                $daterangeByHour = [];
                foreach ($daterange as $date) {
                    $date = (new \DateTime("1970-01-01 00:00:00.0"))->diff($date);
                    $meetinStartDate = clone $startDate;
                    $meetinStartDate->add($date);
                    array_push($daterangeByHour, $meetinStartDate);
                }
                array_push($daterangeByDay, $daterangeByHour);
                $startDate->add(new \DateInterval('P1D'));
            }
            foreach ($daterangeByDay as $meetingByDay) {
                foreach ($meetingByDay as $meetingByHour) {
                    $meeting = new Meeting();
                    $endDate = clone $meetingByHour;
                    $endDate = $endDate->sub($duration);
                    $meeting->setUser($user)
                        ->setIsOpen(true)
                        ->setStartDate($meetingByHour)
                        ->setEndDate(($endDate))
                        ->setIsReserved(false)
                        ->setCongres($congres);
                    $this->em->persist($meeting);
                }
            }

            $this->em->flush();
            $this->addFlash('sucess', 'Contact ajouté');
            return $this->redirectToRoute('admin_planning_user', ['idCongres'=>$congres->getId(), 'idUser'=>$user->getId()]);
        }

        return $this->render('admin/congres/createUserInCongres.html.twig', [
            'form' => $form->createView(),
            'congres' => $congres

        ]);
    }

    /**
     * @Route("/{idCongres}/planning/user/{idUser}", name="admin_planning_user")
     */
    public function planningUser($idCongres, $idUser, Request $request)
    {
        $user = $this->userManager->getById($idUser);
        $congres = $this->congresManager->getById($idCongres);
        if ($congres == null || $user == null) {return $this->render('notFound.html.twig');}
        $meetings = $this->meetingManager->getAllByCongresAndUser($congres->getId(), $user->getId());

        $data = $request->request->all();
        if (!empty($data)){
            foreach ($data as $meetingId){
                if ($meetingId != ""){
                    $meeting = $this->meetingManager->getById($meetingId);
                    $meeting->setIsopen(false);
                    $this->em->persist($meeting);
                }
            }
            $this->em->flush();
            $this->addFlash('sucess', 'Planning édité');
            return $this->redirectToRoute('admin_congres_user',['id' => $congres->getId()]);
        }
        return $this->render('admin/congres/planningUser.html.twig',[
            'meetings' => $meetings,
            'user' => $user,
            'congres' => $congres,
            'startDate' => $congres->getStartDate(),
        ]);
    }

    /**
     * @Route("/open/meeting", name="open_meeting")
     */
    public function addStatDocument(Request $request)
    {
        $idMeeting = $request->query->get('meeting');
        if ($idMeeting == null){return new JsonResponse(false);}
        $meeting = $this->meetingManager->getById($idMeeting);
        $meeting->setIsOpen(true);
        $this->em->persist($meeting);
        $this->em->flush();
        return new JsonResponse(true);
    }

    /**
     * @Route("/{idCongres}/edit/user/{id}", name="admin_edit_user")
     */
    public function edit($idCongres, User $user, Request $request)
    {
        $congres = $this->congresManager->getById($idCongres);
        $form = $this->createForm(UserEditType::class);
        $form->get('firstname')->setData($user->getFirstname());
        $form->get('lastname')->setData($user->getLastname());
        $form->get('email')->setData($user->getEmail());
        $form->get('phone')->setData($user->getPhone());
        $form->get('localisation')->setData($user->getLocalisation());
        $form->get('job')->setData($user->getJob());
        $form->get('about')->setData($user->getAbout());
        $form->get('categoryUsers')->setData($user->getCategoryUsers());
        $form->get('reasons')->setData($user->getReasons());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newUser = $user;
            $img = $form->get('img')->getData();
            if ($img != null){
                $originalFilename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $originalFilename;
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $img->guessExtension();

                $newUser->setImg($newFilename);
                try {
                    $img->move(
                        $this->getParameter('photo_user_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur');
                }
            }else{$newUser->setImg($user->getImg());}

            $newUser->setPassword($user->getPassword())
                ->setEmail($form->get('email')->getData())
                ->setFirstname($form->get('firstname')->getData())
                ->setLastname($form->get('lastname')->getData())
                ->setPhone($form->get('phone')->getData())
                ->setAbout($form->get('about')->getData())
                ->setJob($form->get('job')->getData())
                ->setLocalisation($form->get('localisation')->getData())
            ;

            $this->em->persist($newUser);
            $this->em->flush();
            $this->addFlash('sucess', 'Contact édité');
        }
        return $this->render('admin/user/editUser.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'congres' => $congres
        ]);
    }

    /**
     * @Route("/{id}/user/delete", name="admin_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user)
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_home');
    }
}