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
#[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
#[Route('/admin/cours/create', name: 'admin_cours_create')]
public function createCours(Request $request, EntityManagerInterface $em): Response
{
    $cours = new Cours();

    $form = $this->createFormBuilder($cours)
        ->add('nom', TextType::class, [
            'label' => 'Nom du cours',
            'attr' => ['class' => 'form-control']
        ])
        ->add('module', TextType::class, [
            'label' => 'Module',
            'attr' => ['class' => 'form-control']
        ])
        ->add('professeur', EntityType::class, [
            'class' => Professeur::class,
            'choice_label' => 'nom',
            'label' => 'Professeur',
            'attr' => ['class' => 'form-control']
        ])
        ->add('classes', EntityType::class, [
            'class' => Classe::class,
            'choice_label' => 'nom',
            'multiple' => true,
            'expanded' => true,
            'label' => 'Classes associées'
        ])
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($cours);
        $em->flush();

        return $this->redirectToRoute('admin_cours_list');
    }

    return $this->render('admin/cours/create.html.twig', [
        'form' => $form->createView(),
    ]);
}

#[Route('/admin/cours/list', name: 'admin_cours_list')]
public function listCours(EntityManagerInterface $em): Response
{
    $coursList = $em->getRepository(Cours::class)->findAll();

    return $this->render('admin/cours/list.html.twig', [
        'coursList' => $coursList,
    ]);
}


#[Route('/admin/niveau/create', name: 'admin_niveau_create')]
public function createNiveau(Request $request, EntityManagerInterface $em): Response
{
    $niveau = new Niveau();

    $form = $this->createFormBuilder($niveau)
        ->add('nom', TextType::class, [
            'label' => 'Nom du Niveau',
            'attr' => ['class' => 'form-control']
        ])
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

#[Route('/admin/niveaux/list', name: 'admin_niveaux_list')]
public function listNiveaux(EntityManagerInterface $em): Response
{
    $niveaux = $em->getRepository(Niveau::class)->findAll();

    return $this->render('admin/niveau/list.html.twig', [
        'niveaux' => $niveaux,
    ]);
}




   
}
