<?php


namespace App\Manager;

use App\Entity\Congres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class CongresManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * CongresManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Congres::class);
        return $repo->findAll();
    }

    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(Congres::class);
        return $repo->findOneBy(['id' => $id]);
    }


}