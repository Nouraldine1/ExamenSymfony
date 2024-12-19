<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $module;

    #[ORM\ManyToOne(targetEntity: Professeur::class)]
    private $professeur;

    #[ORM\ManyToMany(targetEntity: Classe::class)]
    private $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
    }
    private function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }
    

    private function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
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


    public function getModule(): ?string
    {
        return $this->module;
    }


    public function setModule(string $module): self
    {
        $this->module = $module;

        return $this;
    }


    public function getClasses(): Collection
    {
        return $this->classes;
    }


}

