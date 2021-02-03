<?php

namespace App\Controller\admin;

use App\Entity\Produit;
use App\Entity\User;
use App\Form\Back\UserCreationType;
use App\Manager\CategoriesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var CategoriesManager */
    protected $categoriesManager;

    /** @var Em */
    protected $em;

    protected $session;

    /**
     * dminController constructor.
     */

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="admin_home")
     */
    public function home(Request $request)
    {
        $produits = $this->em->getRepository(Produit::class)->findAllActive();
        $form = $this->createFormBuilder($produits)
            ->add('product_name', TextType::class, [
                'required' => false,
            ])
            ->add('brand', TextType::class, [
                'required' => false,
            ])
            ->add('place', TextType::class, [
                'required' => false,
            ])
            ->add('product_type', TextType::class, [
                'required' => false,
            ])
            ->add('modele', TextType::class, [
                'required' => false,
            ])
            ->add('user', TextType::class, [
                'required' => false,
            ])
            ->add('email', TextType::class, [
                'required' => false,
            ])
            ->add('bu', TextType::class, [
                'required' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Rechercher'])
            ->getForm();

        // $form->get('product_name')->setData('');
        // $form->get('brand')->setData('');
        // $form->get('place')->setData('');
        // $form->get('product_type')->setData('');
        // $form->get('modele')->setData('');
        // $form->get('user')->setData('');
        // $form->get('email')->setData('');
        // $form->get('bu')->setData('');

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $fliters = [
                'name' => $form->get('product_name', []),
                'brand' => $form->get('brand', []),
                'place' => $form->get('place', []),
                'type_produit' => $form->get('product_type', []),
                'modele' => $form->get('modele', []),

                '' => $form->get('user', []),
                '' => $form->get('email', []),
                '' => $form->get('bu', [])
            ];

            $produits = $this->em->getRepository(Produit::class)->searchProducts($fliters);

            $this->addFlash('sucess', 'Lancement de la recherche');
        }

        return $this->render('admin/home.html.twig', [
            'produits' => $produits,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/create/user", name="user_create", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserCreationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user->setRoles(['ROLE_USER']);
            $user->setPassword('');
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_user');
        }
        return $this->render('admin/user/createUser.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/user", name="admin_produits_user")
     */
    public function user_products($id)
    {

        $user = $this->em->getRepository(User::class)->findOneBy(['id' => $id]);
        $produits = $user->getProduits();
        if ($produits == null) {
            return $this->render('notFound.html.twig');
        }

        return $this->render('admin/user/userProducts.html.twig', [
            'produits' => $produits,
            'user' => $user
        ]);
    }

    /**
     * @Route("/users", name="admin_user", methods={"GET","POST"})
     */
    public function users()
    {
        $users = $this->em->getRepository(User::class)->findAllActive();
        return $this->render('admin/user/users.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/logout", name="admin_logout", methods={"GET"})
     */
    public function logout(Request $request)
    {
    }
}
