<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Article;
use App\Entity\Dette;
use App\Entity\Paiement;
use Doctrine\Persistence\ObjectManager;

class AppFixtures
{
    private $manager;

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;

        $utilisateurs = [];
        for ($i = 1; $i <= 10; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail("user$i@gmail.com");
            $utilisateur->setUsername("user$i");
            $utilisateur->setPassword('$2y$13$abcdef1234567890...'); // Remplacez par le hash de "passer123"
            $utilisateur->setRole($i % 3 == 0 ? 'ROLE_ADMIN' : ($i % 2 == 0 ? 'ROLE_BOUTIQUIER' : 'ROLE_CLIENT'));
            $this->manager->persist($utilisateur);
            $utilisateurs[] = $utilisateur;
        }

        $articles = [
            ['nom' => 'Pain', 'prix' => '300', 'stock' => 100],
            ['nom' => 'Lait', 'prix' => '500', 'stock' => 50],
            ['nom' => 'Riz', 'prix' => '1000', 'stock' => 80],
            ['nom' => 'Sucre', 'prix' => '400', 'stock' => 120],
            ['nom' => 'Eau', 'prix' => '200', 'stock' => 200],
            ['nom' => 'Huile', 'prix' => '1500', 'stock' => 30],
            ['nom' => 'Pates', 'prix' => '350', 'stock' => 150],
            ['nom' => 'Sel', 'prix' => '150', 'stock' => 90],
            ['nom' => 'Poisson', 'prix' => '2000', 'stock' => 40],
            ['nom' => 'Viande', 'prix' => '3000', 'stock' => 25],
        ];
        foreach ($articles as $data) {
            $article = new Article();
            $article->setNom($data['nom']);
            $article->setPrix($data['prix']); // Prix en CFA (string pour decimal dans Doctrine)
            $article->setQuantiteStock($data['stock']);
            $this->manager->persist($article);
            $articles[$data['nom']] = $article; // Stocker par nom pour référence
        }

        $dettes = [];
        for ($i = 0; $i < 10; $i++) {
            $dette = new Dette();
            $dette->setClient($utilisateurs[$i]);
            $dette->setArticle(array_values($articles)[$i]);
            $dette->setMontant((string)(($i + 5) * 100)); // Montant : 500 à 1400 CFA
            $dette->setStatut($i % 3 == 0 ? 'payée' : ($i % 2 == 0 ? 'impayée' : 'en cours'));
            $this->manager->persist($dette);
            $dettes[] = $dette;
        }
        for ($i = 0; $i < 10; $i++) {
            $paiement = new Paiement();
            $paiement->setDette($dettes[$i]);
            $paiement->setMontant((string)(($i + 1) * 100)); // Montant : 100 à 1000 CFA
            $paiement->setDatePaiement(new \DateTime("2025-03-" . sprintf('%02d', $i + 1)));
            $this->manager->persist($paiement);
        }

        $this->manager->flush();
    }
}