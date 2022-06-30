<?php

namespace App\Entity;

use App\Repository\ImagesExpoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesExpoRepository::class)
 */
class ImagesExpo
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Exposition::class, mappedBy="imagesExpo")
     */
    private $expositions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

// ====================================================== //
// ==================== CONSTRUCTEUR ==================== //
// ====================================================== //

    public function __construct()
    {
        $this->expositions = new ArrayCollection();
    }

// ====================================================== //
// =================== METHODE MAGIQUE ================== //
// ====================================================== //

    public function __toString()
    {
        return $this->imageName;
    }

// ====================================================== //
// =================== GETTER / SETTER ================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Exposition>
     */
    public function getExpositions(): Collection
    {
        return $this->expositions;
    }

    public function addExposition(Exposition $exposition): self
    {
        if (!$this->expositions->contains($exposition)) {
            $this->expositions[] = $exposition;
            $exposition->addImagesExpo($this);
        }

        return $this;
    }

    public function removeExposition(Exposition $exposition): self
    {
        if ($this->expositions->removeElement($exposition)) {
            $exposition->removeImagesExpo($this);
        }

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
}
