<?php


namespace App\Manager;

use App\Entity\Meeting;
use App\Entity\Reason;
use Doctrine\Persistence\ManagerRegistry;

class MeetingManager
{
    /** @var ManagerRegistry */
    protected $doctrine;

    /**
     * MeetingManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAll()
    {
        $repo = $this->doctrine->getRepository(Meeting::class);
        return $repo->findAll();
    }

    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(Meeting::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getAllByCongres($entity)
    {
        $repo = $this->doctrine->getRepository(Meeting::class);
        return $repo->findAllByCongres($entity);
    }

    public function getAllByCongresAndUser($congresId, $userId)
    {
        $repo = $this->doctrine->getRepository(Meeting::class);
        return $repo->findAllByCongresAndUser($congresId, $userId);
    }

    public function getReasonById($id)
    {
        $repo = $this->doctrine->getRepository(Reason::class);
        return $repo->findOneBy(['id' => $id]);
    }


}