<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ArticleRepository;

class AccueilTCSController extends AbstractController

{

    private $repoArticle;
    private $repoCategory;

    public function __construct(
        ArticleRepository $repoArticle,
        CategoryRepository $repoCategory
    ) {
        $this->repoArticle = $repoArticle;
        $this->repoCategory = $repoCategory;
    }

    #[Route('/accueiltcs', name: 'accueil_t_c_s')]
    public function index()
    {
        return $this->render('accueil_tcs/index.html.twig', [
            'controller_name' => 'AccueilTCSController',
        ]);
    }

    #[Route('/', name: 'home')]
    public function home()
    {
        return $this->render('accueil_tcs/home.html.twig');
    }

    #[Route('/nos_actions', name: 'nos_actions')]
    public function nos_actions()
    {
        return $this->render('accueil_tcs/nos_actions.html.twig');
    }

    #[Route('/qui_sommes_nous', name: 'qui_sommes_nous')]
    public function qui_sommes_nous()
    {
        return $this->render('accueil_tcs/qui_sommes_nous.html.twig');
    }

    #[Route('/agir_ensemble', name: 'agir_ensemble')]
    public function agir_ensemble()
    {
        return $this->render('accueil_tcs/agir_ensemble.html.twig');
    }

    #[Route('/voyages', name: 'voyages')]
    public function voyages()
    {
        $categories = $this->repoCategory->findAll();
        $articles = $this->repoArticle->findAll();
        return $this->render('accueil_tcs/voyages.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/show/{id}", name = "show")
     */
    public function show(Article $article): Response
    {
        if (!$article) {
            return $this->redirectToRoute('voyages');
        }

        return $this->render('show/index.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/showArticles/{id}", name = "show_article")
     */
    public function showArticle(?Category $category): Response
    {
        if ($category) {
            $articles = $category->getArticles()->getValues();
        } else {
            return $this->redirectToRoute('voyages');
        }

        $categories = $this->repoCategory->findAll();
        return $this->render('show/showArticle.html.twig', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
