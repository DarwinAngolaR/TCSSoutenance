<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use symfony\component\Routing\Annotation\Route;

class VoyagesController{
/**
 * @Route("/voyages")
 */
    public function voyages(): Response{
        return new Response("Hello World");
    }
/**
 * @Route("/voyages/{name}")
 */
    public function voyagesName($name): Response{
        return new Response("Hello ".$name);
    }
}