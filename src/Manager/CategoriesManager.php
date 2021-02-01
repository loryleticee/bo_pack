<?php


namespace App\Manager;

use App\Entity\CategoryDocument;
use App\Entity\CategoryUser;
use App\Entity\Congres;
use App\Entity\Reason;
use Doctrine\ORM\EntityManagerInterface;

class CategoriesManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * CategoriesManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAllCatUser()
    {
        $repo = $this->doctrine->getRepository(CategoryUser::class);
        return $repo->findAll();
    }

    public function getCatUserById($id)
    {
        $repo = $this->doctrine->getRepository(CategoryUser::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getCatDocById($id)
    {
        $repo = $this->doctrine->getRepository(CategoryDocument::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getCatDocByName($name)
    {
        $repo = $this->doctrine->getRepository(CategoryDocument::class);
        return $repo->findOneBy(['name' => $name]);
    }

    public function getReasonById($id)
    {
        $repo = $this->doctrine->getRepository(Reason::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getAllCatDoc()
    {
        $repo = $this->doctrine->getRepository(CategoryDocument::class);
        return $repo->findAll();
    }

    public function getAllReason()
    {
        $repo = $this->doctrine->getRepository(Reason::class);
        return $repo->findAll();
    }

}