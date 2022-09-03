<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireUserType;
use App\Repository\ArtisteRepository;
use App\Repository\GalerieRepository;
use App\Repository\BienvenueRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EvenementsRepository;
use App\Repository\ExpositionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
            'galeries' => $galeries,
            'active' => 'accueil'
        ]);
    }

    /**
     * @Route("/les-expositions", name="app_les_expos")
     */
    public function allExpos(ExpositionRepository $expositionRepository): Response
    {
        return $this->render('accueil/all-expos.html.twig', [
            // 'expos' => $expos
            'expos' => $expositionRepository->findAfterNow(true),
            'active' => 'expos'
        ]);
    }

    /**
     * @Route("/les-artistes", name="app_les_artistes")
     */
    public function allArtistes(ArtisteRepository $artisteRepository): Response
    { 
        return $this->render('accueil/all-artistes.html.twig', [
            'artistes' => $artisteRepository->findBy(['actif'=> true]),
            'active' => 'artistes'
        ]);
    }

    /**
     * @Route("/les-evenements", name="app_les_evenements")
     */
    public function allEvenements(EvenementsRepository $evenementsRepository): Response
    {
        $evenements = $evenementsRepository->findBy(['actif'=> true], ['date' => 'ASC']);
        
        return $this->render('accueil/all-events.html.twig', [
            'evenements' => $evenements,
            'active' => 'events'
        ]);
    }

    /**
     * @Route("/espace/{id}", name="app_galerie")
     */
    public function seeEspace(GalerieRepository $galerieRepository, string $id): Response
    {
        $galerie = $galerieRepository->findOneBy(["id" => $id]);

        return $this->render('accueil/one-espace.html.twig', [
            'galerie' => $galerie,
            'active' => 'accueil'
        ]);
    }

    /**
     * @Route("/exposition/{id}", name="app_expo")
     */
    public function seeExpo(ExpositionRepository $expositionRepository,string $id, Request $request, EntityManagerInterface $entityManagerInterface): Response 
    {
        $expo = $expositionRepository->findOneBy(["id" => $id]);

        $commentaire = new Commentaire;
        $form = $this -> createForm(CommentaireUserType::class, $commentaire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $commentaire->setExposition($expo)
                        ->setUser($this->getUser());
            
            $entityManagerInterface->persist($commentaire);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('app_expo', array('id' => $id));
        }

        return $this->render('accueil/one-expo.html.twig', [
            'expo' => $expo,
            'active' => 'expos',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/artiste/{id}", name="app_artiste")
     */
    public function seeArtiste(ArtisteRepository $artisteRepository,string $id): Response 
    {
        $artiste = $artisteRepository->findOneBy(["id" => $id]);
        return $this->render('accueil/one-artiste.html.twig', [
            'artiste' => $artiste,
            'active' => 'artistes'
        ]);
    }
}
