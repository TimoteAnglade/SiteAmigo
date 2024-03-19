<?php

namespace App\Entity;

use App\Repository\OffreEmploiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreEmploiRepository::class)]
class OffreEmploi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPoste = null;

    #[ORM\Column(length: 300)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NiveauDetude $pourNiveauDetude = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entreprise $parEntreprise = null;

    #[ORM\Column(length: 255)]
    #[ORM\JoinColumn(nullable: false)]
    private ?string $mailContact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNomPoste(): ?string
    {
        return $this->nomPoste;
    }

    public function setNomPoste(string $nomPoste): static
    {
        $this->nomPoste = $nomPoste;

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

    public function getPourNiveauDetude(): ?NiveauDetude
    {
        return $this->pourNiveauDetude;
    }

    public function setPourNiveauDetude(?NiveauDetude $pourNiveauDetude): static
    {
        $this->pourNiveauDetude = $pourNiveauDetude;

        return $this;
    }

    public function getParEntreprise(): ?Entreprise
    {
        return $this->parEntreprise;
    }

    public function setParEntreprise(?Entreprise $parEntreprise): static
    {
        $this->parEntreprise = $parEntreprise;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(string $mailContact): static
    {
        $this->mailContact = $mailContact;

        return $this;
    }
}
