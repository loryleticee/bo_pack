<?php

namespace App\Entity;

use App\Repository\CongresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CongresRepository::class)
 */
class Congres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $security_code;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="congres")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="congres")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity=Meeting::class, mappedBy="congres", orphanRemoval=true)
     */
    private $meetings;

    /**
     * @ORM\Column(type="time")
     */
    private $durationMeeting;

    /**
     * @ORM\Column(type="time")
     */
    private $hour_min;

    /**
     * @ORM\Column(type="time")
     */
    private $hour_max;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->meetings = new ArrayCollection();
        $this->setCreatedAt(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSecurityCode(): ?string
    {
        return $this->security_code;
    }

    public function setSecurityCode(string $security_code): self
    {
        $this->security_code = $security_code;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(user $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->setCongres($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getCongres() === $this) {
                $document->setCongres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Meeting[]
     */
    public function getMeetings(): Collection
    {
        return $this->meetings;
    }

    public function addMeeting(Meeting $meeting): self
    {
        if (!$this->meetings->contains($meeting)) {
            $this->meetings[] = $meeting;
            $meeting->setCongres($this);
        }

        return $this;
    }

    public function removeMeeting(Meeting $meeting): self
    {
        if ($this->meetings->contains($meeting)) {
            $this->meetings->removeElement($meeting);
            // set the owning side to null (unless already changed)
            if ($meeting->getCongres() === $this) {
                $meeting->setCongres(null);
            }
        }

        return $this;
    }

    public function getDurationMeeting(): ?\DateTimeInterface
    {
        return $this->durationMeeting;
    }

    public function setDurationMeeting(\DateTimeInterface $durationMeeting): self
    {
        $this->durationMeeting = $durationMeeting;

        return $this;
    }

    public function getHourMin(): ?\DateTimeInterface
    {
        return $this->hour_min;
    }

    public function setHourMin(\DateTimeInterface $hour_min): self
    {
        $this->hour_min = $hour_min;

        return $this;
    }

    public function getHourMax(): ?\DateTimeInterface
    {
        return $this->hour_max;
    }

    public function setHourMax(\DateTimeInterface $hour_max): self
    {
        $this->hour_max = $hour_max;

        return $this;
    }
}
