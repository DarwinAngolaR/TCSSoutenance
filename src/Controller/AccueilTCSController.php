<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilTCSController extends AbstractController

{
    #[Route('/accueiltcs', name: 'accueil_t_c_s')]

    public function index(): Response
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

    #[Route('/agir_ensemble', name: 'agir_ensemble')]
    public function agir_ensemble()
    {
        return $this->render('accueil_tcs/agir_ensemble.html.twig');
    }
}
