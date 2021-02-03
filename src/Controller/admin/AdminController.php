<?php

namespace App\Controller\admin;
use App\Entity\Produit;
use App\Entity\User;
use App\Manager\CategoriesManager;
use Doctrine\ORM\EntityManagerInterface;
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

    public function __construct( EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
    * @Route("/", name="admin_home")
    */
    public function home()
    {
        $produits = $this->em->getRepository(Produit::class)->findAllActive();

        return $this->render('admin/home.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/{id}/user", name="admin_produits_user")
     */
    public function user_products($id)
    {   

        $user = $this->em->getRepository(User::class)->findOneBy(['id'=> $id]);
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
