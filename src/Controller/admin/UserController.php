<?php


namespace App\Controller\admin;



use App\Entity\User;
use App\Entity\Produit;
use App\Form\Back\UserEditType;
use App\Manager\UserManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/admin")
 */
class UserController extends AbstractController
{
    /** @var UserManager */
    protected $userManager;

    /** @var Em */
    protected $em;

    private $passwordEncoder;


    public function __construct(
        UserManager $userManager,
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->userManager = $userManager;
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
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
        $form->get('about')->setData($user->getAbout());
        $form->get('bu')->setData($user->getBu());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newUser = $user;
            $newUser->setPassword($user->getPassword())
                ->setEmail($form->get('email')->getData())
                ->setFirstname($form->get('firstname')->getData())
                ->setLastname($form->get('lastname')->getData())
                ->setAbout($form->get('about')->getData())
                ->setBu($form->get('bu')->getData())
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
            foreach($user->getProduits() as $produit) {
                $produit->setUser(null);
                $produit->setStatus(Produit::STATUS_UNUSED);
            }
            $user->setIsDeleted(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_user');
    }
}