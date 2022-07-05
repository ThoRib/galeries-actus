<?php

namespace App\Controller;

use App\Entity\Exposition;
use App\Form\ExpositionType;
use App\Repository\ExpositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/exposition")
 */
class AdminExpositionController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_exposition_index", methods={"GET"})
     */
    public function index(ExpositionRepository $expositionRepository): Response
    {
        return $this->render('admin_exposition/index.html.twig', [
            'expositions' => $expositionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_exposition_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ExpositionRepository $expositionRepository): Response
    {
        $exposition = new Exposition();
        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $expositionRepository->add($exposition, true);

            return $this->redirectToRoute('app_admin_exposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_exposition/new.html.twig', [
            'exposition' => $exposition,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_exposition_show", methods={"GET"})
     */
    public function show(Exposition $exposition): Response
    {
        return $this->render('admin_exposition/show.html.twig', [
            'exposition' => $exposition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_exposition_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Exposition $exposition, ExpositionRepository $expositionRepository): Response
    {
        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $expositionRepository->add($exposition, true);

            return $this->redirectToRoute('app_admin_exposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_exposition/edit.html.twig', [
            'exposition' => $exposition,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_exposition_delete", methods={"POST"})
     */
    public function delete(Request $request, Exposition $exposition, ExpositionRepository $expositionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exposition->getId(), $request->request->get('_token'))) {
            $expositionRepository->remove($exposition, true);
        }

        return $this->redirectToRoute('app_admin_exposition_index', [], Response::HTTP_SEE_OTHER);
    }
}
