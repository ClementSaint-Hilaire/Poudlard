<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/', name: 'etudiant_index', methods: ['GET'])]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'etudiant' => $etudiantRepository->findAll(),
        ]);
    }
    #[Route('/{id}', 'etudiant_show', ['GET'])]
    public function show(Etudiant $etudiant): Response
    {
        return $this->render{'etudiant/show.html.twig', [
            'etudiant' => $etudiant,
        ]};
    }



}
    
