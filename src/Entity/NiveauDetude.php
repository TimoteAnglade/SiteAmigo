<?php

namespace App\Entity;

use App\Repository\NiveauDetudeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauDetudeRepository::class)]
class NiveauDetude
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debutStage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $finStage = null;

    #[ORM\OneToMany(targetEntity: OffreEmploi::class, mappedBy: 'pourNiveauDetude', orphanRemoval: true)]
    private Collection $offreEmplois;

    #[ORM\ManyToOne(inversedBy: 'niveauDetudes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?typePrestation $typePrestation = null;

    public function __construct()
    {
        $this->offreEmplois = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDebutStage(): ?\DateTimeInterface
    {
        return $this->debutStage;
    }

    public function setDebutStage(\DateTimeInterface $debutStage): static
    {
        $this->debutStage = $debutStage;

        return $this;
    }

    public function getFinStage(): ?\DateTimeInterface
    {
        return $this->finStage;
    }

    public function setFinStage(\DateTimeInterface $finStage): static
    {
        $this->finStage = $finStage;

        return $this;
    }

    /**
     * @return Collection<int, OffreEmploi>
     */
    public function getOffreEmplois(): Collection
    {
        return $this->offreEmplois;
    }

    public function addOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if (!$this->offreEmplois->contains($offreEmploi)) {
            $this->offreEmplois->add($offreEmploi);
            $offreEmploi->setPourNiveauDetude($this);
        }

        return $this;
    }

    public function removeOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if ($this->offreEmplois->removeElement($offreEmploi)) {
            // set the owning side to null (unless already changed)
            if ($offreEmploi->getPourNiveauDetude() === $this) {
                $offreEmploi->setPourNiveauDetude(null);
            }
        }

        return $this;
    }

    public function getTypePrestation(): ?typePrestation
    {
        return $this->typePrestation;
    }

    public function setTypePrestation(?typePrestation $typePrestation): static
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }
}
