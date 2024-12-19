<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController{
   
    #[Route('/article', name: 'app_article')]
    public function listArticles(ArticleRepository $articleRepository): JsonResponse
    {
        $articles = $articleRepository->findAll();
        return $this->json($articles);
    }

    #[Route('/api/articles', name: 'api_articles_creer', methods: ['POST'])]
    public function createArticle(Request $request, ArticleRepository $articleRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $article = new Article();
        $article->setNom($data['nom']);
        $article->setPrix($data['prix']);
        $article->setQuantiteStock($data['quantiteStock']);

        $articleRepository->save($article, true);
        return $this->json($article, 201);
    }

    #[Route('/api/articles/nom/{nom}', name: 'api_articles_par_nom', methods: ['GET'])]
    public function listArticlesByName(string $nom, ArticleRepository $articleRepository): JsonResponse
    {
        $articles = $articleRepository->findByNom($nom);
        return $this->json($articles);
    }

    #[Route('/api/articles/stock-faible', name: 'api_articles_stock_faible', methods: ['GET'])]
    public function listArticlesWithLowStock(ArticleRepository $articleRepository): JsonResponse
    {
        $articles = $articleRepository->findByLowStock();
        return $this->json($articles);
    }
}
