<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\ManyToOne(targetEntity: Niveau::class)]
    private $niveau;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Etudiant::class)]
    private $etudiants;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


   public function getNiveau():?Niveau
    {
            return $this->niveau;
    }

  public function setNiveau(?Niveau $niveau): self
  {
            $this->niveau = $niveau;
   
  }

  public function getEtudiants()
    {
        return $this->etudiants;
    }

    
   
}




