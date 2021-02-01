<?php


namespace App\Controller\admin;


use App\Entity\Congres;
use App\Form\Back\CongresEditType;
use App\Manager\CongresManager;
use App\Manager\DocumentManager;
use App\Manager\MeetingManager;
use App\Manager\UserManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin")
 */
class CongresController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var UserManager */
    protected $userManager;

    /** @var Em */
    protected $em;

    public function __construct(CongresManager $congresManager, UserManager $userManager, EntityManagerInterface $em)
    {
        $this->congresManager = $congresManager;
        $this->userManager = $userManager;
        $this->em = $em;
    }

    /**
     * @Route("/{id}/congres/delete", name="admin_congres_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Congres $congres, MeetingManager $meetingManager, DocumentManager $documentManager)
    {
        if ($this->isCsrfTokenValid('delete'.$congres->getId(), $request->request->get('_token'))) {
            $meetings = $meetingManager->getAllByCongres($congres->getId());
            $entityManager = $this->getDoctrine()->getManager();
            foreach ($meetings as $meeting){
                $customer = $this->userManager->getCustomerById($meeting->getId());
                if ($customer != null){
                    $entityManager->remove($customer);
                }
                $entityManager->remove($meeting);
            }
            $documents = $documentManager->getAllByCongres($congres->getId());
            foreach ($documents as $document){
                $entityManager->remove($document);
            }

            $entityManager->remove($congres);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_home');
    }

    /**
     * @Route("/{id}/congres/edit", name="admin_congres_edit")
     */
    public function editCongres(Request $request, $id)
    {
        $congres = $this->congresManager->getById($id);
        $form = $this->createForm(CongresEditType::class);
        $form->get('name')->setData($congres->getName());
        $form->get('security_code')->setData($congres->getSecurityCode());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $congres->setName($form->get('name')->getData())
                ->setSecurityCode($form->get('security_code')->getData())
                ;
            $this->em->persist($congres);
            $this->em->flush();
            $this->addFlash('sucess', 'Congres édité');
        }

        return $this->render('admin/congres/editCongres.html.twig',[
            'form' => $form->createView(),
            'congres' => $congres
        ]);
    }
}