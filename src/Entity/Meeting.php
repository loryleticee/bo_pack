<?php

namespace App\Entity;

use App\Repository\MeetingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeetingRepository::class)
 */
class Meeting
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Congres::class, inversedBy="meetings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $congres;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="meetings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $end_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_open;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_reserved;

    /**
     * @ORM\ManyToOne(targetEntity=Reason::class, inversedBy="meetings")
     * @ORM\joinColumn(onDelete="SET NULL")
     */
    private $reason;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCancel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reasonCancel;

    /**
     * @ORM\OneToOne(targetEntity=Customer::class, inversedBy="meeting", cascade={"persist", "remove"})
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCongres(): ?Congres
    {
        return $this->congres;
    }

    public function setCongres(?Congres $congres): self
    {
        $this->congres = $congres;

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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getIsOpen(): ?bool
    {
        return $this->is_open;
    }

    public function setIsOpen(bool $is_open): self
    {
        $this->is_open = $is_open;

        return $this;
    }

    public function getIsReserved(): ?bool
    {
        return $this->is_reserved;
    }

    public function setIsReserved(bool $is_reserved): self
    {
        $this->is_reserved = $is_reserved;

        return $this;
    }


    public function getReason(): ?Reason
    {
        return $this->reason;
    }

    public function setReason(?Reason $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getIsCancel(): ?bool
    {
        return $this->isCancel;
    }

    public function setIsCancel(?bool $isCancel): self
    {
        $this->isCancel = $isCancel;

        return $this;
    }

    public function getReasonCancel(): ?string
    {
        return $this->reasonCancel;
    }

    public function setReasonCancel(?string $reasonCancel): self
    {
        $this->reasonCancel = $reasonCancel;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
