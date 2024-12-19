<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Dette;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Dette::class, inversedBy: 'paiements')]
    private ?Dette $dette = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $montant = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $datePaiement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDette(): ?Dette
    {
        return $this->dette;
    }

    public function setDette(?Dette $dette): self
    {
        $this->dette = $dette;
        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;
        return $this;
    }
}
