<?php


namespace App\Manager;

use App\Entity\Customer;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class UserManager
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
        $repo = $this->doctrine->getRepository(User::class);
        return $repo->findAll();
    }

    public function getById($id)
    {
        $repo = $this->doctrine->getRepository(User::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getByMail($mail)
    {
        $repo = $this->doctrine->getRepository(User::class);
        return $repo->findOneBy(['email' => $mail]);
    }

    public function getCustomerById($id)
    {
        $repo = $this->doctrine->getRepository(Customer::class);
        return $repo->findOneBy(['id' => $id]);
    }

    public function getAllByCongres($entity)
    {
        $repo = $this->doctrine->getRepository(User::class);
        return $repo->findByCongres($entity);
    }

    public function getCustomerByMeeting($id)
    {
        $repo = $this->doctrine->getRepository(Customer::class);
        return $repo->findOneBy(['meetin_id' => $id]);
    }

    public function search($id, $value)
    {
        $repo = $this->doctrine->getRepository(User::class);
        return $repo->search($id, $value);
    }


}