<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $site = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 300)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone = null;

    #[ORM\Column]
    private ?bool $affiliee = null;

    #[ORM\OneToMany(targetEntity: OffreEmploi::class, mappedBy: 'parEntreprise', orphanRemoval: true)]
    private Collection $offreEmplois;

    #[ORM\ManyToMany(targetEntity: Tags::class, inversedBy: 'entreprises')]
    private Collection $tagsEntreprise;

    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'entreprisesParticipantes')]
    private Collection $entrepriseEvenement;

    public function __construct()
    {
        $this->offreEmplois = new ArrayCollection();
        $this->tagsEntreprise = new ArrayCollection();
        $this->entrepriseEvenement = new ArrayCollection();
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): static
    {
        $this->site = $site;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function isAffiliee(): ?bool
    {
        return $this->affiliee;
    }

    public function setAffiliee(bool $affiliee): static
    {
        $this->affiliee = $affiliee;

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
            $offreEmploi->setParEntreprise($this);
        }

        return $this;
    }

    public function removeOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if ($this->offreEmplois->removeElement($offreEmploi)) {
            // set the owning side to null (unless already changed)
            if ($offreEmploi->getParEntreprise() === $this) {
                $offreEmploi->setParEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, tags>
     */
    public function getTagsEntreprise(): Collection
    {
        return $this->tagsEntreprise;
    }

    public function addTagsEntreprise(tags $tagsEntreprise): static
    {
        if (!$this->tagsEntreprise->contains($tagsEntreprise)) {
            $this->tagsEntreprise->add($tagsEntreprise);
        }

        return $this;
    }

    public function removeTagsEntreprise(tags $tagsEntreprise): static
    {
        $this->tagsEntreprise->removeElement($tagsEntreprise);

        return $this;
    }

    /**
     * @return Collection<int, evenement>
     */
    public function getEntrepriseEvenement(): Collection
    {
        return $this->entrepriseEvenement;
    }

    public function addEntrepriseEvenement(evenement $entrepriseEvenement): static
    {
        if (!$this->entrepriseEvenement->contains($entrepriseEvenement)) {
            $this->entrepriseEvenement->add($entrepriseEvenement);
        }

        return $this;
    }

    public function removeEntrepriseEvenement(evenement $entrepriseEvenement): static
    {
        $this->entrepriseEvenement->removeElement($entrepriseEvenement);

        return $this;
    }
}
