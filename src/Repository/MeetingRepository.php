<?php

namespace App\Repository;

use App\Entity\Meeting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Meeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Meeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Meeting[]    findAll()
 * @method Meeting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeetingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Meeting::class);
    }

    /**
     * @return Meeting[] Returns an array of User objects
     */

    public function findAllByCongres($value)
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin ('m.congres','c')
            ->where('c.id = :id')
            ->setParameter('id', $value);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function findAllByCongresAndUser($idCongres, $idUser)
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin ('m.congres','c')
            ->leftJoin('m.user', 'u')
            ->where('c.id = :idCongres')
            ->andWhere('u.id = :idUser')
            ->setParameter('idCongres', $idCongres)
            ->setParameter('idUser', $idUser);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    // /**
    //  * @return Meeting[] Returns an array of Meeting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Meeting
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
