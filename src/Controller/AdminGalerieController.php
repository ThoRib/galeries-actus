<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\GalerieType;
use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/galerie")
 */
class AdminGalerieController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_galerie_index", methods={"GET"})
     */
    public function index(GalerieRepository $galerieRepository): Response
    {
        return $this->render('admin_galerie/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
            'active' => 'adm-galeries',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_galerie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GalerieRepository $galerieRepository): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->add($galerie, true);

            return $this->redirectToRoute('app_admin_galerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_galerie/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
            'active' => 'adm-galeries',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_galerie_show", methods={"GET"})
     */
    public function show(Galerie $galerie): Response
    {
        return $this->render('admin_galerie/show.html.twig', [
            'galerie' => $galerie,
            'active' => 'adm-galeries',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_galerie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        $form = $this->createForm(GalerieType::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->add($galerie, true);

            return $this->redirectToRoute('app_admin_galerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_galerie/edit.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
            'active' => 'adm-galeries',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_galerie_delete", methods={"POST"})
     */
    public function delete(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$galerie->getId(), $request->request->get('_token'))) {
            $galerieRepository->remove($galerie, true);
        }

        return $this->redirectToRoute('app_admin_galerie_index', [], Response::HTTP_SEE_OTHER);
    }
}
