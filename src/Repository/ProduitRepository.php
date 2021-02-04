<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findAllActive()
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.is_deleted != :value')
            ->setParameter('value', 1);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function searchProducts($filters)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.is_deleted != 1');
            // ->setParameter('value', 1);

        foreach ($filters as $key => $filter) {
            if (!empty($filter)) { 
                
                $qb->andwhere("p.$key  like :" . $key);
                $qb->setParameter($key, "%$filter%");
            }
        }
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
