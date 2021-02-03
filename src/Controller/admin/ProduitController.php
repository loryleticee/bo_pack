<?php

namespace App\Controller\admin;

use App\Entity\Produit;
use App\Entity\User;
use App\Form\ProduitEditType;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="produit_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produit = new Produit(); 
        $form = $this->createForm(ProduitType::class, $produit, ['user' => '']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('admin_home');
        }
        return $this->render('produit/createProduit.html.twig', [
            'produit' => $produit,
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/new/user/{id}", name="produit_new_user", methods={"GET","POST"})
     */
    public function newProductUser(User $user, Request $request): Response
    {
        $produit = new Produit(); 
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneBy(['id' =>  $user->getId()]);
        $form = $this->createForm(ProduitType::class, $produit, ['user' => $user]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produit->setUser($user);
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('admin_home');
        }
        return $this->render('produit/createProduit.html.twig', [
            'produit' => $produit,
            'user' => $user,
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/{id}", name="produit_show", methods={"GET"})
     */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'imageUrl' => $params->get('qr_code_dir') . '/images/' . $produit->getId()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="produit_edit", methods={"GET","POST"})
     */
    public function edit(Produit $produits,Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(ProduitEditType::class , null,['user' => $produits->getUser() ]);
        $form->get('name')->setData($produits->getName());
        $form->get('brand')->setData($produits->getBrand());
        $form->get('model')->setData($produits->getModel());
        $form->get('status')->setData($produits->getStatus());
        $form->get('type_produit')->setData($produits->getTypeProduit());
        $form->get('place')->setData($produits->getPlace());
        $form->get('user')->setData($produits->getUser()->getLastName());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           
            $newProduit = $produits;
            $newUser = $em->getRepository(User::class)->findOneBy(['id' => $form->get('user')->getData()]);
            $newProduit->setName($form->get('name')->getData())
                ->setBrand($form->get('brand')->getData())
                ->setModel($form->get('model')->getData())
                ->setStatus($form->get('status')->getData())
                ->setTypeProduit($form->get('type_produit')->getData())
                ->setPlace($form->get('place')->getData())
                ->setUser($newUser)
                ->setLastModify($this->_hasNewUser($form->get('user')->getData(), $form->get('old_user')->getData()));

            $this->em->persist($newProduit);
            $this->em->flush();
            $this->addFlash('sucess', 'Produit édité');
        }
        
        return $this->render('produit/editProduit.html.twig', [
            'form' => $form->createView(),
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/{id}", name="produit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produit $produit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $produit->setIsDeleted(true);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_home');
    }

    /**
    * @Route("/{id}/user/delete", name="admin_produits_delete", methods={"DELETE"})
    */
   public function admin_produits_delete(Request $request, Produit $produit, ProduitRepository $produitRepository, EntityManagerInterface $em)
   {
       if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
        //$produitRepository->removeFormUser($produit->getId());

        $produit->setUser(null);
        $em->flush();
       }

       return $this->redirectToRoute('admin_home');
   }

    static function _hasNewUser($iUser, $iOldUser) {
        dd($iUser, $iOldUser);
        $log = [date('Y-m-d H:i:s')];
        if ($iUser !== $iOldUser) {
            $log = ['date' => date('Y-m-d H:i:s'), 'last_user' => $iOldUser];
        }

        return json_encode($log);
   }
}
