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
     * @Route("/{id}/user", name="admin_produits_user")
     */
    public function user_products($id, Request $request, EntityManagerInterface $em)
    {
        $produits = $this->em->getRepository(User::class)->getProduits();
        $users = $this->userManager->getAllByCongres($produits);
        if ($produits == null) {
            return $this->render('notFound.html.twig');
        }

        return $this->render('admin/congres/user.html.twig', [
            'congres' => $produits,
            'users' => $users

        ]);
    }

    /**
     * @Route("/edit/user/{id}", name="admin_edit_user")
     */
    public function edit(User $user, Request $request)
    {
       
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