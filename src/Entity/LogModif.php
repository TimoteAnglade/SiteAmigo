<?php

namespace App\Entity;

use App\Repository\LogModifRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogModifRepository::class)]
class LogModif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $requeteEntiere = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $faitPar = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeRequete $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getRequeteEntiere(): ?string
    {
        return $this->requeteEntiere;
    }

    public function setRequeteEntiere(string $requeteEntiere): static
    {
        $this->requeteEntiere = $requeteEntiere;

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

    public function getFaitPar(): ?user
    {
        return $this->faitPar;
    }

    public function setFaitPar(?user $faitPar): static
    {
        $this->faitPar = $faitPar;

        return $this;
    }

    public function getType(): ?TypeRequete
    {
        return $this->type;
    }

    public function setType(?TypeRequete $type): static
    {
        $this->type = $type;

        return $this;
    }
}
