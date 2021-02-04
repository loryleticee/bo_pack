<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
    * @return User[] Returns an array of User objects
    */

    public function findByCongres($value)
    {
        $qb = $this->createQueryBuilder('u')
            ->leftJoin ('u.congres','c')
            ->where('c.id = :id')
            ->setParameter('id', $value);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function findAllActive()
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.is_deleted != :value')
            ->setParameter('value', 1);

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function search($idCongres, $value)
    {
        $qb = $this->createQueryBuilder('d')
            ->leftJoin ('d.congres','c')
            ->orWhere('d.firstname LIKE :value')
            ->orWhere('d.job LIKE :value')
            ->orWhere('d.lastname LIKE :value')
            ->orWhere('d.localisation LIKE :value')
            ->orWhere('d.about LIKE :value')
            ->andWhere('c.id = :id')
            ->setParameter('id', $idCongres)
            ->setParameter('value', '%'.$value.'%')
        ;

        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function searchProducts($filters)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.id')
            ->where('u.is_deleted != 1');
    
        foreach ($filters as $key => $filter) {
            if (!empty($filter)) {     
                $qb->andwhere("u.$key  like :" . $key);
                $qb->setParameter($key, "%$filter%");
            }
        }
        $query = $qb->getQuery();
        $results = $query->getResult();
        return $results;
    }



    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
