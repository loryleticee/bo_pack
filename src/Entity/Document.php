<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $doc_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;

    /**
     * @ORM\ManyToOne(targetEntity=congres::class, inversedBy="documents")
     * @ORM\JoinColumn(nullable=true)
     */
    private $congres;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_download;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=CategoryDocument::class, inversedBy="document", cascade={"persist"})
     */
    private $categoryDocuments;

    public function __construct()
    {
        $this->categoryDocuments = new ArrayCollection();
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

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getDocName(): ?string
    {
        return $this->doc_name;
    }

    public function setDocName(string $doc_name): self
    {
        $this->doc_name = $doc_name;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getCongres(): ?congres
    {
        return $this->congres;
    }

    public function setCongres(?congres $congres): self
    {
        $this->congres = $congres;

        return $this;
    }

    public function getNumberDownload(): ?int
    {
        return $this->number_download;
    }

    public function setNumberDownload(?int $number_download): self
    {
        $this->number_download = $number_download;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

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

    /**
     * @return Collection|CategoryDocument[]
     */
    public function getCategoryDocuments(): Collection
    {
        return $this->categoryDocuments;
    }

    public function addCategoryDocument(CategoryDocument $categoryDocument): self
    {
        if (!$this->categoryDocuments->contains($categoryDocument)) {
            $this->categoryDocuments[] = $categoryDocument;
            $categoryDocument->addDocument($this);
        }

        return $this;
    }

    public function removeCategoryDocument(CategoryDocument $categoryDocument): self
    {
        if ($this->categoryDocuments->contains($categoryDocument)) {
            $this->categoryDocuments->removeElement($categoryDocument);
            $categoryDocument->removeDocument($this);
        }

        return $this;
    }
}
