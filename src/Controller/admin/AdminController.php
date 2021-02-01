<?php

namespace App\Controller\admin;

use App\Entity\CategoryDocument;
use App\Entity\CategoryUser;
use App\Entity\Reason;
use App\Form\Back\ReasonCreationType;
use App\Entity\Congres;
use App\Form\Back\CatDocCreationType;
use App\Form\Back\CatUserCreationType;
use App\Manager\CategoriesManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Manager\CongresManager;
use App\Form\Back\CongresCreationType;

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

    public function __construct(CongresManager $congresManager, EntityManagerInterface $em, CategoriesManager $categoriesManager)
    {
        $this->congresManager = $congresManager;
        $this->categoriesManager = $categoriesManager;
        $this->em = $em;
    }

    /**
    * @Route("/", name="admin_home")
    */
    public function home()
    {
        $congres = $this->congresManager->getAll();

        return $this->render('admin/home.html.twig', [
            'congres' => $congres
        ]);
    }

    /**
     * @Route("/categories", name="admin_categorie")
     */
    public function categories()
    {
        $catUser = $this->categoriesManager->getAllCatUser();
        $catDoc = $this->categoriesManager->getAllCatDoc();
        $reasons = $this->categoriesManager->getAllReason();

        return $this->render('admin/categories/categories.html.twig', [
            'catUsers' => $catUser,
            'catDocs' => $catDoc,
            'reasons' => $reasons
        ]);
    }

    /**
     * @Route("/new/categorie/user", name="admin_create_catUser")
     */
    public function createCategoryUser(Request $request)
    {
        $form = $this->createForm(CatUserCreationType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Catégorie ajouté');
        }

        return $this->render('admin/categories/createCategoryUser.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new/categorie/doc", name="admin_create_catDoc")
     */
    public function createCategoryDoc(Request $request)
    {
        $form = $this->createForm(CatDocCreationType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Catégorie ajouté');
        }

        return $this->render('admin/categories/createCategoryDoc.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new/reason", name="admin_create_reason")
     */
    public function createReason(Request $request)
    {
        $form = $this->createForm(ReasonCreationType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Motif ajouté');
        }

        return $this->render('admin/categories/createReason.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}/reason", name="admin_edit_reason")
     */
    public function editReason(Request $request, Reason $reason)
    {
        $form = $this->createForm(ReasonCreationType::class);
        $form->setData($reason);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Motif modifié');
            return $this->redirectToRoute('admin_categorie');

        }

        return $this->render('admin/categories/createReason.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}/catDoc", name="admin_catDoc_reason")
     */
    public function editcatDoc(Request $request, CategoryDocument $entity)
    {
        $form = $this->createForm(CatDocCreationType::class);
        $form->setData($entity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Catégorie modifiée');
            return $this->redirectToRoute('admin_categorie');

        }

        return $this->render('admin/categories/createCategoryDoc.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}/catUser", name="admin_catUser_reason")
     */
    public function editcatUser(Request $request, CategoryUser $entity)
    {
        $form = $this->createForm(CatUserCreationType::class);
        $form->setData($entity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cat = $form->getData();
            $this->em->persist($cat);
            $this->em->flush();
            $this->addFlash('sucess', 'Catégorie modifiée');
            return $this->redirectToRoute('admin_categorie');

        }

        return $this->render('admin/categories/createCategoryUser.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cat/doc/{id}/delete", name="admin_catDoc_delete", methods={"DELETE"})
     */
    public function deleteCatDoc(Request $request, $id)
    {
        $cat = $this->categoriesManager->getCatDocById($id);
        if ($this->isCsrfTokenValid('delete'.$cat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_categorie');
    }

    /**
     * @Route("/cat/user/{id}/delete", name="admin_catUser_delete", methods={"DELETE"})
     */
    public function deleteCatUser(Request $request, $id)
    {
        $cat = $this->categoriesManager->getCatUserById($id);
        if ($this->isCsrfTokenValid('delete'.$cat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_categorie');
    }

    /**
     * @Route("/reason/user/{id}/delete", name="admin_reason_delete", methods={"DELETE"})
     */
    public function deleteReason(Request $request, $id)
    {
        $cat = $this->categoriesManager->getReasonById($id);
        if ($this->isCsrfTokenValid('delete'.$cat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_categorie');
    }

    /**
     * @Route("/new/congres", name="admin_create_congres")
     */
    public function createCongres(Request $request)
    {
        $form = $this->createForm(CongresCreationType::class);
        $form->setData(new Congres());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $congres = $form->getData();
            $this->em->persist($congres);
            $this->em->flush();
            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin/congres/createCongres.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/logout", name="admin_logout", methods={"GET"})
     */
    public function logout(Request $request)
    {

    }


}
