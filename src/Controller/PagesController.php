<?php

namespace App\Controller;

use App\Repository\MembreAmigoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('guest/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
    #[Route('/amigo', name: 'amigo')]
    public function amigo(MembreAmigoRepository $membres): Response
    {
        return $this->render('guest/amigo.html.twig', [
            'controller_name' => 'PagesController',
            'membres' => $membres->findAll(),
        ]);
    }
}
