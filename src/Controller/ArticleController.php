<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article_list')]
    public function index(ArticleRepository $articleRepo): Response
    {
        return $this->render('article/list.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articleRepo->findAll()
        ]);
    }

    #[Route('/article/{id}', name: 'app_article')]
    public function article(ArticleRepository $articleRepo, int $id): Response
    {
        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
            'article' => $articleRepo->find($id)
        ]);
    }
}
