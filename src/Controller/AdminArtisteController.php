<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/artiste")
 */
class AdminArtisteController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_artiste_index", methods={"GET"})
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('admin_artiste/index.html.twig', [
            'artistes' => $artisteRepository->findAll(),
            'active' => 'adm-artistes',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_artiste_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ArtisteRepository $artisteRepository): Response
    {
        $artiste = new Artiste();
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artisteRepository->add($artiste, true);

            return $this->redirectToRoute('app_admin_artiste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_artiste/new.html.twig', [
            'artiste' => $artiste,
            'form' => $form,
            'active' => 'adm-artistes',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_artiste_show", methods={"GET"})
     */
    public function show(Artiste $artiste): Response
    {
        return $this->render('admin_artiste/show.html.twig', [
            'artiste' => $artiste,
            'active' => 'adm-artistes',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_artiste_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artisteRepository->add($artiste, true);

            return $this->redirectToRoute('app_admin_artiste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_artiste/edit.html.twig', [
            'artiste' => $artiste,
            'form' => $form,
            'active' => 'adm-artistes',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_artiste_delete", methods={"POST"})
     */
    public function delete(Request $request, Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artiste->getId(), $request->request->get('_token'))) {
            $artisteRepository->remove($artiste, true);
        }

        return $this->redirectToRoute('app_admin_artiste_index', [], Response::HTTP_SEE_OTHER);
    }
}
