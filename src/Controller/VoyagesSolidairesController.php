<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyagesSolidairesController extends AbstractController
{
    #[Route('/voyages/solidaires', name: 'voyages_solidaires')]
    public function index(): Response
    {
        return $this->render('voyages_solidaires/index.html.twig', [
            'controller_name' => 'VoyagesSolidairesController',
        ]);
    }
}
