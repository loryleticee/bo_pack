<?php


namespace App\Controller\admin;


use App\Entity\Document;
use App\Form\Back\DocEditType;
use App\Manager\CongresManager;
use App\Manager\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\Back\DocCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class DocumentController
 * @package App\Controller
 * @Route("/admin")
 */
class DocumentController extends AbstractController
{
    /** @var CongresManager */
    protected $congresManager;

    /** @var DocumentManager */
    protected $documentManager;

    /** @var Em */
    protected $em;


    public function __construct(CongresManager $congresManager, DocumentManager $documentManager, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->congresManager = $congresManager;
        $this->documentManager = $documentManager;
        $this->em = $em;
    }

    /**
     * @Route("/{id}/documents", name="admin_congres_documents")
     */
    public function documents($id, Request $request)
    {
        $congres = $this->congresManager->getById($id);
        $documents = $this->documentManager->getAllByCongres($congres);
        if ($congres == null){return $this->render('notFound.html.twig');}

        return $this->render('admin/congres/document.html.twig', [
            'congres' => $congres,
            'documents' => $documents
        ]);
    }

    /**
     * @Route("/{id}/new/document", name="admin_create_document_in_congres")
     */
    public function createDocumentInCongres($id, Request $request)
    {
        $congres = $this->congresManager->getById($id);
        if ($congres == null) {return $this->render('notFound.html.twig');}

        $form = $this->createForm(DocCreationType::class);
        $form->setData(new Document());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $document = $form->getData();
            $img = $form->get('img')->getData();

            $originalFilename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
            // this is needed to safely include the file name as part of the URL
            $safeFilename = $originalFilename;
            $newFilenameImg = $safeFilename . '-' . uniqid() . '.' . $img->guessExtension();

            // Move the file to the directory where brochures are stored
            try {
                $img->move(
                    $this->getParameter('img_doc_directory'),
                    $newFilenameImg
                );
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur');
            }

            $doc = $form->get('docName')->getData();
            $fileSize = filesize($doc);
            $originalFilename = pathinfo($doc->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $originalFilename;
            $newFilenameDoc = $safeFilename . '-' . uniqid() . '.' . $doc->guessExtension();
            try {
                $doc->move(
                    $this->getParameter('doc_directory'),
                    $newFilenameDoc
                );
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur');
            }

            $document->setCongres($congres)
                ->setImg($newFilenameImg)
                ->setSize($fileSize)
                ->setDocName($newFilenameDoc);
            $this->em->persist($document);
            $this->em->flush();
            $this->addFlash('sucess', 'Document ajouté');
        }
        return $this->render('admin/congres/createDocumentInCongres.html.twig', [
            'form' => $form->createView(),
            'congres' => $congres
        ]);
    }

    /**
     * @Route("/{idCongres}/edit/document/{id}", name="admin_edit_document")
     */
    public function editDocument($idCongres, Document $document, Request $request)
    {
        $congres = $this->congresManager->getById($idCongres);
        $form = $this->createForm(DocEditType::class);
        $form->get('name')->setData($document->getName());
        $form->get('about')->setData($document->getAbout());
        $form->get('ref')->setData($document->getRef());
        $form->get('categoryDocuments')->setData($document->getCategoryDocuments());


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $img = $form->get('img')->getData();
            if ($img != null){
                $originalFilename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $originalFilename;
                $newFilenameImg = $safeFilename . '-' . uniqid() . '.' . $img->guessExtension();

                $document->setImg($newFilenameImg);
                try {
                    $img->move(
                        $this->getParameter('img_doc_directory'),
                        $newFilenameImg
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur');
                }
            }{$document->setImg($document->getImg());}

            $doc = $form->get('docName')->getData();
            if ($doc != null) {
                $fileSize = filesize($doc);
                $originalFilename = pathinfo($doc->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $originalFilename;
                $newFilenameDoc = $safeFilename . '-' . uniqid() . '.' . $doc->guessExtension();
                $document->setDocName($newFilenameDoc)
                ->setSize($fileSize);
                try {
                    $doc->move(
                        $this->getParameter('doc_directory'),
                        $newFilenameDoc
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur');
                }
            }else{$document->setDocName($document->getDocName());}
            $document->setRef($form->get('ref')->getData())
                ->setAbout($form->get('about')->getData())
                ->setName($form->get('name')->getData())
                ->setNumberDownload($document->getNumberDownload())
                ->setCreatedAt($document->getCreatedAt())
            ;
            $this->em->persist($document);
            $this->em->flush();
            $this->addFlash('sucess', 'Document édité');

        }

        return $this->render('admin/document/editDocument.html.twig', [
            'form' => $form->createView(),
            'document' => $document,
            'domain' => $_ENV['DOMAIN_NAME'],
            'congres' => $congres
        ]);

    }

    /**
     * @Route("/{id}/document/delete", name="admin_doc_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Document $document)
    {
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_home');
    }
}