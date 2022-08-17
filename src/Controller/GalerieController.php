<?php

namespace App\Controller;

use App\Repository\GalerieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GalerieController extends AbstractController
{
    /**
     * @Route("/galerie/{id}", name="app_galerie")
     */
    public function index(GalerieRepository $galerieRepository, string $id): Response
    {
        $galerie = $galerieRepository->findOneBy(["id" => $id]);

        return $this->render('galerie/index.html.twig', [
            'galerie' => $galerie,
            'active' => 'accueil'
        ]);
    }
}
