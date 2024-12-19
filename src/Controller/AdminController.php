<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Entity\Niveau;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;


class AdminController extends AbstractController
{
    #[Route('/admin/cours/create', name: 'admin_cours_create')]
    public function createCours(Request $request, EntityManagerInterface $em): Response
    {
        
        
    }

    #[Route('/admin/niveau/create', name: 'admin_niveau_create')]
    public function createNiveau(Request $request, EntityManagerInterface $em): Response
    {
        $niveau = new Niveau();
        $form = $this->createFormBuilder($niveau)
            ->add('nom', TextType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($niveau);
            $em->flush();
            return $this->redirectToRoute('admin_niveaux_list');
        }

        return $this->render('admin/niveau/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
