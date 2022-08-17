<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/oeuvre")
 */
class AdminOeuvreController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_oeuvre_index", methods={"GET"})
     */
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('admin_oeuvre/index.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
            'active' => 'adm-oeuvres',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_oeuvre_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OeuvreRepository $oeuvreRepository): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_admin_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_oeuvre/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
            'active' => 'adm-oeuvres',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_oeuvre_show", methods={"GET"})
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('admin_oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
            'active' => 'adm-oeuvres',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_oeuvre_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_admin_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
            'active' => 'adm-oeuvres',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_oeuvre_delete", methods={"POST"})
     */
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $oeuvreRepository->remove($oeuvre, true);
        }

        return $this->redirectToRoute('app_admin_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
}
