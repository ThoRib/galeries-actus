<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtisteRepository::class)
 */
class Artiste
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\ManyToMany(targetEntity=Oeuvre::class, inversedBy="artistes")
     */
    private $oeuvres;

    /**
     * @ORM\ManyToMany(targetEntity=Galerie::class, inversedBy="artistes")
     */
    private $galeries;

// ====================================================== //
// ==================== CONSTRUCTEUR ==================== //
// ====================================================== //

    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
        $this->galeries = new ArrayCollection();
    }

// ====================================================== //
// ================== FONCTION MAGIQUE ================== //
// ====================================================== //

public function __toString()
{
    return $this->nom;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection<int, Oeuvre>
     */
    public function getOeuvres(): Collection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres[] = $oeuvre;
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        $this->oeuvres->removeElement($oeuvre);

        return $this;
    }

    /**
     * @return Collection<int, Galerie>
     */
    public function getGaleries(): Collection
    {
        return $this->galeries;
    }

    public function addGalery(Galerie $galery): self
    {
        if (!$this->galeries->contains($galery)) {
            $this->galeries[] = $galery;
        }

        return $this;
    }

    public function removeGalery(Galerie $galery): self
    {
        $this->galeries->removeElement($galery);

        return $this;
    }
}
