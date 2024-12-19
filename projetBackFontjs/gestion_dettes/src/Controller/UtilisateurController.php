<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class UtilisateurController extends AbstractController{

    #[Route('/api/connexion', name: 'api_connexion', methods: ['POST'])]
    public function login(): JsonResponse
    {
        throw new \LogicException('This method is handled by LexikJWTAuthenticationBundle.');
    }

    #[Route('/api/utilisateurs', name: 'api_utilisateurs_lister', methods: ['GET'])]
    public function listUsers(): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $utilisateurs = $this->getDoctrine()->getRepository('App\Entity\Utilisateur')->findAll();
        return $this->json($utilisateurs);
    }

    #[Route('/api/utilisateurs/role/{role}', name: 'api_utilisateurs_par_role', methods: ['GET'])]
    public function listUsersByRole(string $role, UtilisateurRepository $utilisateurRepository): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $utilisateurs = $utilisateurRepository->findByRole($role);
        return $this->json($utilisateurs);
    }
}
