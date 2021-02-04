<?php

namespace App\Controller\admin;

use App\Entity\Produit;
use App\Entity\User;
use App\Form\Back\UserCreationType;
use App\Manager\CategoriesManager;
use App\Tools\PdfGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\RouterInterface;

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
            ->add('user', EntityType::class,
            [
                'class' => User::class,
                'choice_label' => 'lastname',
                'required' => false,
                'label' => 'Utilisateur',
            ])
            ->add('email', TextType::class, [
                'required' => false,
            ])
            ->add('bu', ChoiceType::class, [
                'choices' => User::BU_OPTIONS,
                'label' => 'BU',
                'required' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => ['class' => 'btn-block btn-primary mt-4',]
            ])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $produits = $this->getProducts($form);

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

    /**
     * @Route("/qr_codes", name="admin_produits_get_qr_codes")
     * @param PdfGenerator $pdfGenerator
     * @param RouterInterface $router
     */
    public function getQrCodes(PdfGenerator $pdfGenerator)
    {
        #TODO: apply search filters
        $products = $this->getDoctrine()->getRepository(Produit::class)->findBy(['is_deleted' => false]);

        $pdfGenerator->getPdf($products);
    }

    public function getProducts($form)
    {
        $datas = [];

        $productfliters = [
            'name' => $form->get('product_name', [])->getData(),
            'brand' => $form->get('brand', [])->getData(),
            'place' => $form->get('place', [])->getData(),
            'type_produit' => $form->get('product_type', [])->getData(),
            'modele' => $form->get('modele', [])->getData(),
        ];

        $userFilters = [
            'user' => $form->get('user', [])->getData(),
            'email' => $form->get('email', [])->getData(),
            'bu' => $form->get('bu', [])->getData(),
        ];

        $products = $this->em->getRepository(Produit::class)->searchProducts($productfliters);

        if (!empty($products)) {
            if (!empty($userFilters['user'])) {
                $datas = array_filter($products, function ($product) use($userFilters) {
                    return ($product['id'] == $userFilters['user']);
                });
            }

            $userFilters = array_slice($userFilters, 1);
            $filterKeys = array_keys($userFilters);

            $aUserIds = array_map( function ($filter, $key) {
                if(!empty($filter)) {
                    return $this->em->getRepository(User::class)->searchProducts([ $key => $filter ]);
                }
            }, $userFilters, $filterKeys);

            $aIds = array_map( function ($item) {
                return !empty($item['id']) ?  $item['id'] : null;
            }, current(array_filter($aUserIds)));

            if(empty($datas)) {
                $datas = $this->em->getRepository(Produit::class)->findBy(['user'=> $aIds ]);
            }else {
                $datas = array_filter($datas, function ($product) use($aIds) {
                    return in_array($product['id'], $aIds);
                });
            }

        }

        return $datas;
    }
}
