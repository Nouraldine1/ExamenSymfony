<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public int $id;

    #[ORM\Column(type: 'string', length: 255)]
    public string $nom;

    #[ORM\Column(type: 'string', length: 255)]
    public string $prenom;

    #[ORM\ManyToOne(targetEntity: Classe::class, inversedBy: 'etudiants')]
    #[ORM\JoinColumn(nullable: false)]
    public ?Classe $classe;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getNom():?string
    {
        return $this->nom;
    }
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function getPrenom():?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getClasse():?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;
        return $this;
    }
    
}
