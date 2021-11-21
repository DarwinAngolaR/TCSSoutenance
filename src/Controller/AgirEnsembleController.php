<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgirEnsembleController extends AbstractController
{
    #[Route('/agir/ensemble', name: 'agir_ensemble')]
    public function index(): Response
    {
        return $this->render('agir_ensemble/index.html.twig', [
            'controller_name' => 'AgirEnsembleController',
        ]);
    }
}
