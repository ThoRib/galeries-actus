<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Repository\GalerieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mon-espace/galerie")
 */
class FrontGalerieController extends AbstractController
{
    /**
     * @Route("/", name="front_galerie_index", methods={"GET"})
     */
    public function index(GalerieRepository $galerieRepository): Response
    {
        return $this->render('front_galerie/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="front_galerie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GalerieRepository $galerieRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->add($galerie, true);

            // Ajout dans l'entite user de la galerie créée
            $user = $this->getUser();
            $user->setGalerie($galerie);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('app_front_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front_galerie/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="front_galerie_show", methods={"GET"})
     */
    public function show(Galerie $galerie): Response
    {
        return $this->render('front_galerie/show.html.twig', [
            'galerie' => $galerie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="front_galerie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Galerie $galerie, GalerieRepository $galerieRepository, int $id): Response
    {
        $userGalerie = $this->getUser()->getGalerie();
        // Verification que l'id passé en url est bien celui de la galerie du user logé
        if( $id == $userGalerie->getId()) {
            $form = $this->createForm(GalerieType::class, $galerie);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $galerieRepository->add($galerie, true);

                return $this->redirectToRoute('app_front_user', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('front_galerie/edit.html.twig', [
                'galerie' => $galerie,
                'form' => $form,
            ]);
        } else {
            return $this->redirectToRoute('app_front_user', [], Response::HTTP_SEE_OTHER);
        }
    }

    /**
     * @Route("/{id}", name="front_galerie_delete", methods={"POST"})
     */
    public function delete(Request $request, Galerie $galerie, GalerieRepository $galerieRepository,EntityManagerInterface $entityManagerInterface): Response
    {
        if ($this->isCsrfTokenValid('delete'.$galerie->getId(), $request->request->get('_token'))) {
            $user = $this->getUser();
            $user->setGalerie(null);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            $galerieRepository->remove($galerie, true);
        }

        return $this->redirectToRoute('app_front_user', [], Response::HTTP_SEE_OTHER);
    }
}
