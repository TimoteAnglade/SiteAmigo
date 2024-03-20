<?php

namespace App\Controller;

use App\Entity\LieuEvenement;
use App\Form\LieuEvenementType;
use App\Repository\LieuEvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/lieuevenement')]
class LieuEvenementController extends AbstractController
{
    #[Route('/', name: 'app_lieu_evenement_index', methods: ['GET'])]
    public function index(LieuEvenementRepository $lieuEvenementRepository): Response
    {
        return $this->render('lieu_evenement/index.html.twig', [
            'lieu_evenements' => $lieuEvenementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lieu_evenement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lieuEvenement = new LieuEvenement();
        $form = $this->createForm(LieuEvenementType::class, $lieuEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lieuEvenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_lieu_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lieu_evenement/new.html.twig', [
            'lieu_evenement' => $lieuEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lieu_evenement_show', methods: ['GET'])]
    public function show(LieuEvenement $lieuEvenement): Response
    {
        return $this->render('lieu_evenement/show.html.twig', [
            'lieu_evenement' => $lieuEvenement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lieu_evenement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LieuEvenement $lieuEvenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LieuEvenementType::class, $lieuEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_lieu_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lieu_evenement/edit.html.twig', [
            'lieu_evenement' => $lieuEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lieu_evenement_delete', methods: ['POST'])]
    public function delete(Request $request, LieuEvenement $lieuEvenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lieuEvenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lieuEvenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_lieu_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
