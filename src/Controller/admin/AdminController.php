<?php

namespace App\Controller\admin;

use App\Entity\Produit;
use App\Entity\User;
use App\Form\Back\UserCreationType;
use App\Manager\CategoriesManager;
use App\Repository\ProduitRepository;
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

    /** @var EntityManagerInterface */
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
                'choice_label' => 'fullname',
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

            $produits = $this->applyFiltersToProducts($form);

            $this->addFlash('sucess', 'Lancement de la recherche');
        }

        return $this->render('admin/home.html.twig', [
            'produits' => $produits,
            'totalProduits' => count($produits),
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
        $produits =  $this->em->getRepository(Produit::class)->findBy(['user' => $user->getId(), 'is_deleted' => 0]);

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
     * @param ProduitRepository $productsRepo
     */
    public function getQrCodes(PdfGenerator $pdfGenerator, ProduitRepository $productsRepo)
    {
        $lastResultsFilePath = $this->getParameter('qr_code_dir') . '/last_search.csv';
        $fp = fopen($lastResultsFilePath, 'r');
        $ids = fgetcsv($fp);

        if (is_null(reset($ids))) {
            $products = $productsRepo->findBy(['is_deleted' => false]);
        } else {
            $products = $productsRepo->findBy(['id' => $ids]);
        }

        $pdfGenerator->getPdf($products);
    }

    private function applyFiltersToProducts($form)
    {
        $datas = [];
        $ids = [];

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
        $datas = $products;

        if (!empty($products)) {
            if (!empty($userFilters['user'])) {
                $ids = [$userFilters['user']->getId()];
            }

            if (!empty($userFilters['email'])) {
                $idsFromEmail =  array_map(function($item) {
                    return $item->getId();
                }, $this->em->getRepository(User::class)->findBy([ 'email' => $userFilters['email'] ,'is_deleted' => 0 ]));
                
                $ids = array_merge($ids, $idsFromEmail);
            }
            
            if (!empty($userFilters['bu'])) {
                $idsFromBu =  array_map(function($item) {
                    return $item->getId();
                }, $this->em->getRepository(User::class)->findBy([ 'bu' => $userFilters['bu'], 'is_deleted' => 0 ]));
                $ids = array_merge($ids, $idsFromBu);
            }

            if(!empty($ids)) {
                $datas = array_filter($products, function ($product) use($ids) {
                   return in_array($product->getUser()->getId(), $ids);
                });
            }
        }

        $this->saveLastSearchResults($datas);

        return $datas;
    }

    private function saveLastSearchResults($results)
    {
        $results = array_values($results);
        $lastResultsFilePath = $this->getParameter('qr_code_dir') . '/last_search.csv';
        $ids = array_map(function($item) {
            return $item->getId();
        }, $results);

        $fp = fopen($lastResultsFilePath, 'w');
        fputcsv($fp, $ids);
    }
}
