<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OeuvreRepository::class)
 */
class Oeuvre
{

// ====================================================== //
// ====================== PROPRIETE ===================== //
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\ManyToMany(targetEntity=Artiste::class, mappedBy="oeuvres")
     */
    private $artistes;

    /**
     * @ORM\ManyToMany(targetEntity=Media::class, inversedBy="oeuvres")
     */
    private $medias;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneeCreation;

// ====================================================== //
// ==================== CONSTRUCTEUR ==================== //
// ====================================================== //

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->medias = new ArrayCollection();
    }

// ====================================================== //
// =================== GETTER / SETTER ================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
     * @return Collection<int, Artiste>
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes[] = $artiste;
            $artiste->addOeuvre($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->removeElement($artiste)) {
            $artiste->removeOeuvre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias[] = $media;
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        $this->medias->removeElement($media);

        return $this;
    }

    public function getAnneeCreation(): ?string
    {
        return $this->anneeCreation;
    }

    public function setAnneeCreation(?string $anneeCreation): self
    {
        $this->anneeCreation = $anneeCreation;

        return $this;
    }
}