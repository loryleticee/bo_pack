<?php


namespace App\Manager;

use App\Entity\CategoryDocument;
use App\Entity\Document;
use Doctrine\Persistence\ManagerRegistry;

class DocumentManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * ContactManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Document::class);
        return $repo->findAll();
    }

    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(Document::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getByCategory($value, $id)
    {
        $repo = $this->doctrine->getRepository(Document::class);
        return $repo->findByCategory($value, $id);
    }

    public function getAllByCongres($entity)
    {
        $repo = $this->doctrine->getRepository(Document::class);
        return $repo->findByCongres($entity);
    }

    public function search($id, $value)
    {
        $repo = $this->doctrine->getRepository(Document::class);
        return $repo->search($id, $value);
    }

    public function getAllCategories()
    {
        $repo = $this->doctrine->getRepository(CategoryDocument::class);
        return $repo->findAll();
    }


}