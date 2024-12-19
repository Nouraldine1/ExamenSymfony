<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class PaiementController extends AbstractController{
    #[Route('/api/dettes/{detteId}/paiements', name: 'api_paiements_creer', methods: ['POST'])]
    public function createPayment(int $detteId, Request $request, DetteRepository $detteRepository, PaiementRepository $paiementRepository): JsonResponse
    {
        $dette = $detteRepository->find($detteId);
        if (!$dette) {
            return $this->json(['error' => 'Debt not found'], 404);
        }
        $this->denyAccessUnlessGranted('VIEW', $dette);

        $data = json_decode($request->getContent(), true);
        $paiement = new Paiement();
        $paiement->setDette($dette);
        $paiement->setMontant($data['montant']);
        $paiement->setDatePaiement(new \DateTime());

        $paiementRepository->save($paiement, true);
        return $this->json($paiement, 201);
    }

    #[Route('/api/dettes/{detteId}/paiements', name: 'api_paiements_par_dette', methods: ['GET'])]
    public function listPaymentsByDebt(int $detteId, PaiementRepository $paiementRepository): JsonResponse
    {
        $paiements = $paiementRepository->findByDette($detteId);
        return $this->json($paiements);
    }

    #[Route('/api/paiements/date/{date}', name: 'api_paiements_par_date', methods: ['GET'])]
    public function listPaymentsByDate(string $date, PaiementRepository $paiementRepository): JsonResponse
    {
        $dateObj = new \DateTime($date);
        $paiements = $paiementRepository->findByDateAfter($dateObj);
        return $this->json($paiements);
    }
}
