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
}
