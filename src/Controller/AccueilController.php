<?php

namespace App\Controller;

use App\Repository\ExpositionRepository;
use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(ExpositionRepository $expositionRepository, GalerieRepository $galerieRepository): Response
    {
        $expos = $expositionRepository->findBy(['actif'=> true], ['dateDebut' => 'ASC']);
        $galeries = $galerieRepository->findBy(['actif'=> true], ['nom' => 'ASC']);
        return $this->render('accueil/index.html.twig', [
            'expos' => $expos,
            'galeries' => $galeries,
        ]);
    }

    /**
     * @Route("/exposition/{id}", name="app_expo")
     */
    public function seeExpo(ExpositionRepository $expositionRepository,string $id): Response 
    {
        $expo = $expositionRepository->findOneBy(["id" => $id]);
        return $this->render('accueil/expo.html.twig', [
            'expo' => $expo,
        ]);
    }

    /**
     * @Route("/galerie/{id}", name="app_galerie")
     */
    public function seeGalerie(GalerieRepository $galerieRepository, string $id): Response
    {
        $galerie = $galerieRepository->findOneBy(["id" => $id]);
        return $this->render('accueil/galerie.html.twig', [
            'galerie' => $galerie,
        ]);
    }
}
