<?php

namespace App\Entity;

use App\Repository\GalerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalerieRepository::class)
 */
class Galerie
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telFixe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telMobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $horaires;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\OneToMany(targetEntity=Exposition::class, mappedBy="galerie")
     */
    private $expositions;

// ====================================================== //
// ==================== CONSTRUCTEUR ==================== //
// ====================================================== //

    public function __construct()
    {
        $this->expositions = new ArrayCollection();
    }

// ====================================================== //
// =================== GETTER / SETTER ================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complementAdresse;
    }

    public function setComplementAdresse(?string $complementAdresse): self
    {
        $this->complementAdresse = $complementAdresse;

        return $this;
    }

    public function getTelFixe(): ?string
    {
        return $this->telFixe;
    }

    public function setTelFixe(?string $telFixe): self
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    public function getTelMobile(): ?string
    {
        return $this->telMobile;
    }

    public function setTelMobile(?string $telMobile): self
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(?string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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
            $exposition->setGalerie($this);
        }

        return $this;
    }

    public function removeExposition(Exposition $exposition): self
    {
        if ($this->expositions->removeElement($exposition)) {
            // set the owning side to null (unless already changed)
            if ($exposition->getGalerie() === $this) {
                $exposition->setGalerie(null);
            }
        }

        return $this;
    }
}
