<?php

namespace App\Entity;

use App\Repository\TypeRequeteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRequeteRepository::class)]
class TypeRequete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $type_requete = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_table = null;

    #[ORM\OneToMany(targetEntity: LogModif::class, mappedBy: 'type', orphanRemoval: true)]
    private Collection $logs;

    private static ?int $compteur = 0;

    public function __construct()
    {
        $this->logs = new ArrayCollection();
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

    public function getTypeRequete(): ?string
    {
        return $this->type_requete;
    }

    public function setTypeRequete(string $type_requete): static
    {
        $this->type_requete = $type_requete;

        return $this;
    }

    public function getNomTable(): ?string
    {
        return $this->nom_table;
    }

    public function setNomTable(string $nom_table): static
    {
        $this->nom_table = $nom_table;

        return $this;
    }

    /**
     * @return Collection<int, LogModif>
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(LogModif $log): static
    {
        if (!$this->logs->contains($log)) {
            $this->logs->add($log);
            $log->setType($this);
        }

        return $this;
    }

    public function removeLog(LogModif $log): static
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getType() === $this) {
                $log->setType(null);
            }
        }

        return $this;
    }
}
