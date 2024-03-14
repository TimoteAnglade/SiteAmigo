<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column(length: 7)]
    private ?string $couleur = null;

    #[ORM\ManyToMany(targetEntity: Entreprise::class, mappedBy: 'tagsEntreprise')]
    private Collection $entreprises;

    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntrepriseId(Entreprise $entrepriseId): static
    {
        if (!$this->entreprises->contains($entrepriseId)) {
            $this->entreprises->add($entrepriseId);
            $entrepriseId->addTagsEntreprise($this);
        }

        return $this;
    }

    public function removeEntrepriseId(Entreprise $entrepriseId): static
    {
        if ($this->entreprises->removeElement($entrepriseId)) {
            $entrepriseId->removeTagsEntreprise($this);
        }

        return $this;
    }
}
