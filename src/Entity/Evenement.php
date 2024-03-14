<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $affiche = null;

    #[ORM\Column]
    private ?float $tarifLibre = null;

    #[ORM\Column]
    private ?float $tarifMembre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\Column(length: 300)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $lienInscription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateLimiteInscription = null;

    #[ORM\Column]
    private ?int $placesRestantes = null;

    #[ORM\Column(length: 255)]
    private ?string $afficheFerme = null;

    #[ORM\OneToOne(inversedBy: 'evenements', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?lieuEvenement $aLieuA = null;

    #[ORM\ManyToMany(targetEntity: Entreprise::class, mappedBy: 'entrepriseEvenement')]
    private Collection $entreprisesParticipantes;

    public function __construct()
    {
        $this->entreprisesParticipantes = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getAffiche(): ?string
    {
        return $this->affiche;
    }

    public function setAffiche(string $affiche): static
    {
        $this->affiche = $affiche;

        return $this;
    }

    public function getTarifLibre(): ?float
    {
        return $this->tarifLibre;
    }

    public function setTarifLibre(float $tarifLibre): static
    {
        $this->tarifLibre = $tarifLibre;

        return $this;
    }

    public function getTarifMembre(): ?float
    {
        return $this->tarifMembre;
    }

    public function setTarifMembre(float $tarifMembre): static
    {
        $this->tarifMembre = $tarifMembre;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): static
    {
        $this->datePublication = $datePublication;

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

    public function getLienInscription(): ?string
    {
        return $this->lienInscription;
    }

    public function setLienInscription(string $lienInscription): static
    {
        $this->lienInscription = $lienInscription;

        return $this;
    }

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): static
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    public function getPlacesRestantes(): ?int
    {
        return $this->placesRestantes;
    }

    public function setPlacesRestantes(int $placesRestantes): static
    {
        $this->placesRestantes = $placesRestantes;

        return $this;
    }

    public function getAfficheFerme(): ?string
    {
        return $this->afficheFerme;
    }

    public function setAfficheFerme(string $afficheFerme): static
    {
        $this->afficheFerme = $afficheFerme;

        return $this;
    }

    public function getALieuA(): ?lieuEvenement
    {
        return $this->aLieuA;
    }

    public function setALieuA(lieuEvenement $aLieuA): static
    {
        $this->aLieuA = $aLieuA;

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getEntreprisesParticipantes(): Collection
    {
        return $this->entreprisesParticipantes;
    }

    public function addEntreprisesParticipante(Entreprise $entreprisesParticipante): static
    {
        if (!$this->entreprisesParticipantes->contains($entreprisesParticipante)) {
            $this->entreprisesParticipantes->add($entreprisesParticipante);
            $entreprisesParticipante->addEntrepriseEvenement($this);
        }

        return $this;
    }

    public function removeEntreprisesParticipante(Entreprise $entreprisesParticipante): static
    {
        if ($this->entreprisesParticipantes->removeElement($entreprisesParticipante)) {
            $entreprisesParticipante->removeEntrepriseEvenement($this);
        }

        return $this;
    }
}
