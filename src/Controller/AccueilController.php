<?php

namespace App\Controller;

use App\Repository\BienvenueRepository;
use App\Repository\EvenementsRepository;
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
    public function index(BienvenueRepository $bienvenueRepository, GalerieRepository $galerieRepository): Response
    {
        $bienvenue = $bienvenueRepository->findOneBy(['actif' => true]);
        $galeries = $galerieRepository->findBy(['actif'=> true], ['nom' => 'ASC']);

        return $this->render('accueil/index.html.twig', [
            'bienvenue' => $bienvenue,
            'galeries' => $galeries
        ]);
    }

    /**
     * @Route("/les-expositions", name="app_les_expos")
     */
    public function allExpos(ExpositionRepository $expositionRepository): Response
    {
        $expos = $expositionRepository->findBy(['actif'=> true], ['dateDebut' => 'ASC']);
        
        return $this->render('accueil/les-expositions.html.twig', [
            'expos' => $expos
        ]);
    }

    /**
     * @Route("/les-evenements", name="app_les_evenements")
     */
    public function allEvenements(EvenementsRepository $evenementsRepository): Response
    {
        $evenements = $evenementsRepository->findBy(['actif'=> true], ['date' => 'ASC']);
        
        return $this->render('accueil/les-evenements.html.twig', [
            'evenements' => $evenements
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
}
