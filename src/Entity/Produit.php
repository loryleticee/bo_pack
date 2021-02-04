<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    const STATUS_OPTIONS = [
        'used' => 'En cours d’utilisation',
        'unused' => 'Non attribué',
        'lost' => 'Perdu',
    ];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $add_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_modify;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="produits")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_deleted;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $type_produit;

    public function __construct()
    {
        $this->add_date = new \DateTime();
        $this->is_deleted = 0;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAddDate(): ?\DateTimeInterface
    {
        return $this->add_date;
    }

    public function setAddDate(?\DateTimeInterface $add_date): self
    {
        $this->add_date = $add_date;

        return $this;
    }

    public function getLastModify(): ?string
    {
        return $this->last_modify;
    }

    public function setLastModify(?string $last_modify): self
    {
        $this->last_modify = $last_modify;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(?bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    public function getTypeProduit(): ?string
    {
        return $this->type_produit;
    }

    public function setTypeProduit(?string $type_produit): self
    {
        $this->type_produit = $type_produit;

        return $this;
    }
}
