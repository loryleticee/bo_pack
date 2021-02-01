<?php

namespace App\Repository;

use App\Entity\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @return Document[] Returns an array of User objects
     */

    public function findByCongres($value)
    {
        $qb = $this->createQueryBuilder('d')
            ->leftJoin ('d.congres','c')
            ->where('c.id = :id')
            ->setParameter('id', $value);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function search($idCongres, $value)
    {
        $qb = $this->createQueryBuilder('d')
            ->leftJoin ('d.congres','c')
            ->orWhere('d.name LIKE :value')
            ->orWhere('d.about LIKE :value')
            ->orWhere('d.ref LIKE :value')
            ->andWhere('c.id = :id')
            ->setParameter('id', $idCongres)
            ->setParameter('value', '%'.$value.'%');

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function findByCategory($idCongres, $value)
    {
        $qb = $this->createQueryBuilder('d')
            ->leftJoin ('d.categoryDocuments','c')
            ->Where('c.id = :id')
            ->andWhere('d.congres = :congres')
            ->setParameter('id', $value)
            ->setParameter('congres', $idCongres);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    /* public function findByCategory($value)
    {
        $qb = $this->createQueryBuilder('d')
            ->leftJoin ('d.categoryDocuments','c')
            ->where('c.id = :id')
            ->setParameter('id', $value);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    } */

    // /**
    //  * @return Document[] Returns an array of Document objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
