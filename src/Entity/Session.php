<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'time')]
    private $heureDebut;

    #[ORM\Column(type: 'time')]
    private $heureFin;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $salle;

    #[ORM\ManyToOne(targetEntity: Cours::class)]
    private $cours;

    // Getters et setters...
}

