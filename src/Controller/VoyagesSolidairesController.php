<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyagessolidairesController extends AbstractController
{
    #[Route('/voyagessolidaires', name: 'voyagessolidaires')]
    public function index(): Response
    {
        return $this->render('voyagessolidaires/index.html.twig', [
            'controller_name' => 'VoyagessolidairesController',
        ]);
    }
}
