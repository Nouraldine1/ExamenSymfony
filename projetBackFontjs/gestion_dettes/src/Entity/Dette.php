<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetteRepository::class)]
class Dette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('dette:read')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[Groups('dette:read')]
    private ?Utilisateur $client = null;

    #[ORM\ManyToOne(targetEntity: Article::class)]
    #[Groups('dette:read')]
    private ?Article $article = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Groups('dette:read')]
    private ?string $montant = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups('dette:read')]
    private ?string $statut = 'impayée'; 

    #[ORM\OneToMany(mappedBy: 'dette', targetEntity: Paiement::class)]
    #[Groups('dette:read')]
    private $paiements;

    private const STATUTS_PERMIS = ['payée', 'impayée', 'en cours'];

    public function __construct()
    {
        $this->paiements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Utilisateur
    {
        return $this->client;
    }

    public function setClient(?Utilisateur $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        if (!in_array($statut, self::STATUTS_PERMIS)) {
            throw new \InvalidArgumentException("Le statut doit être 'payée', 'impayée' ou 'en cours'. Reçu : $statut");
        }
        $this->statut = $statut;
        return $this;
    }

    public function getPaiements()
    {
        return $this->paiements;
    }
}
