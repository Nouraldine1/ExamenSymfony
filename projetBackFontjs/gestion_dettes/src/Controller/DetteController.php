<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DetteController extends AbstractController{
   
    #[Route('/api/dettes', name: 'api_dettes_lister', methods: ['GET'])]
    public function listDebts(DetteRepository $detteRepository): JsonResponse
    {
        $dettes = $detteRepository->findAll();
        return $this->json($dettes, 200, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes/{id}', name: 'api_dette_afficher', methods: ['GET'])]
    public function showDebt(Dette $dette): JsonResponse
    {
        $this->denyAccessUnlessGranted('VIEW', $dette);
        return $this->json($dette, 200, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes', name: 'api_dettes_creer', methods: ['POST'])]
    public function createDebt(Request $request, DetteRepository $detteRepository, ArticleRepository $articleRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $dette = new Dette();
        $dette->setClient($this->getUser());
        $dette->setMontant($data['montant']);
        $dette->setStatut('en cours');

        $article = $articleRepository->find($data['article_id']);
        if (!$article) {
            return $this->json(['error' => 'Article not found'], 404);
        }
        $dette->setArticle($article);

        $detteRepository->save($dette, true);
        return $this->json($dette, 201, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes/client/{clientId}', name: 'api_dettes_par_client', methods: ['GET'])]
    public function listDebtsByClient(int $clientId, DetteRepository $detteRepository): JsonResponse
    {
        $dettes = $detteRepository->findByClient($clientId);
        return $this->json($dettes, 200, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes/statut/{statut}', name: 'api_dettes_par_statut', methods: ['GET'])]
    public function listDebtsByStatus(string $statut, DetteRepository $detteRepository): JsonResponse
    {
        $dettes = $detteRepository->findByStatut($statut);
        return $this->json($dettes, 200, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes/article/{articleId}', name: 'api_dettes_par_article', methods: ['GET'])]
    public function listDebtsByArticle(int $articleId, DetteRepository $detteRepository): JsonResponse
    {
        $dettes = $detteRepository->findByArticle($articleId);
        return $this->json($dettes, 200, [], ['groups' => 'dette:read']);
    }

    #[Route('/api/dettes/filtre', name: 'api_dettes_filtrer', methods: ['GET'])]
    public function filterDebts(Request $request, DetteRepository $detteRepository): JsonResponse
    {
        $clientId = $request->query->get('clientId');
        $statut = $request->query->get('statut');
        $montantMin = $request->query->get('montantMin');

        $qb = $detteRepository->createQueryBuilder('d');

        if ($clientId) {
            $qb->andWhere('d.client = :clientId')->setParameter('clientId', $clientId);
        }
        if ($statut) {
            $qb->andWhere('d.statut = :statut')->setParameter('statut', $statut);
        }
        if ($montantMin) {
            $qb->andWhere('d.montant >= :montantMin')->setParameter('montantMin', $montantMin);
        }

        $dettes = $qb->getQuery()->getResult();
        return $this->json($dettes, 200, [], ['groups' => 'dette:read']);
    }
}
