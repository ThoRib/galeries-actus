<?php

namespace App\Controller;

use App\Entity\Evenements;
use App\Form\EvenementsType;
use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/evenements")
 */
class AdminEvenementsController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_evenements_index", methods={"GET"})
     */
    public function index(EvenementsRepository $evenementsRepository): Response
    {
        return $this->render('admin_evenements/index.html.twig', [
            'evenements' => $evenementsRepository->findAll(),
            'active' => 'adm-events',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_evenements_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EvenementsRepository $evenementsRepository): Response
    {
        $evenement = new Evenements();
        $form = $this->createForm(EvenementsType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementsRepository->add($evenement, true);

            return $this->redirectToRoute('app_admin_evenements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_evenements/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
            'active' => 'adm-events',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_evenements_show", methods={"GET"})
     */
    public function show(Evenements $evenement): Response
    {
        return $this->render('admin_evenements/show.html.twig', [
            'evenement' => $evenement,
            'active' => 'adm-events',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_evenements_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Evenements $evenement, EvenementsRepository $evenementsRepository): Response
    {
        $form = $this->createForm(EvenementsType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementsRepository->add($evenement, true);

            return $this->redirectToRoute('app_admin_evenements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_evenements/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
            'active' => 'adm-events',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_evenements_delete", methods={"POST"})
     */
    public function delete(Request $request, Evenements $evenement, EvenementsRepository $evenementsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $evenementsRepository->remove($evenement, true);
        }

        return $this->redirectToRoute('app_admin_evenements_index', [], Response::HTTP_SEE_OTHER);
    }
}
