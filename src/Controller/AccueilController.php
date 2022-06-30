<?php

namespace App\Controller;

use App\Repository\ExpositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(ExpositionRepository $expositionRepository): Response
    {
        $expos = $expositionRepository->findBy(['actif'=> true], ['dateDebut' => 'ASC']);
        return $this->render('accueil/index.html.twig', [
            'title_page' => 'Accueil',
            'expos' => $expos,
        ]);
    }

    /**
     * @Route("/exposition/{id}", name="app_expo")
     */
    public function seeExpo (ExpositionRepository $expositionRepository,string $id): Response 
    {
        $expo = $expositionRepository->findOneBy(["id" => $id]);
        return $this->render('accueil/expo.html.twig', [
            'title_page' => 'Exposition',
            'expo' => $expo,
        ]);
    }
}
