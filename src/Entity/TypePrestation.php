<?php

namespace App\Entity;

use App\Repository\TypePrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypePrestationRepository::class)]
class TypePrestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $libelle = null;

    #[ORM\OneToMany(targetEntity: NiveauDetude::class, mappedBy: 'typePrestation')]
    private Collection $niveauDetudes;

    public function __construct()
    {
        $this->niveauDetudes = new ArrayCollection();
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

    /**
     * @return Collection<int, NiveauDetude>
     */
    public function getNiveauDetudes(): Collection
    {
        return $this->niveauDetudes;
    }

    public function addNiveauDetude(NiveauDetude $niveauDetude): static
    {
        if (!$this->niveauDetudes->contains($niveauDetude)) {
            $this->niveauDetudes->add($niveauDetude);
            $niveauDetude->setTypePrestation($this);
        }

        return $this;
    }

    public function removeNiveauDetude(NiveauDetude $niveauDetude): static
    {
        if ($this->niveauDetudes->removeElement($niveauDetude)) {
            // set the owning side to null (unless already changed)
            if ($niveauDetude->getTypePrestation() === $this) {
                $niveauDetude->setTypePrestation(null);
            }
        }

        return $this;
    }
}
