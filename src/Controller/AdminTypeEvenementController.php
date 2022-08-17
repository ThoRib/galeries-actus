<?php

namespace App\Controller;

use App\Entity\TypeEvenement;
use App\Form\TypeEvenementType;
use App\Repository\TypeEvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/type/evenement")
 */
class AdminTypeEvenementController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_type_evenement_index", methods={"GET"})
     */
    public function index(TypeEvenementRepository $typeEvenementRepository): Response
    {
        return $this->render('admin_type_evenement/index.html.twig', [
            'type_evenements' => $typeEvenementRepository->findAll(),
            'active' => 'adm-tp-events',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_type_evenement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TypeEvenementRepository $typeEvenementRepository): Response
    {
        $typeEvenement = new TypeEvenement();
        $form = $this->createForm(TypeEvenementType::class, $typeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeEvenementRepository->add($typeEvenement, true);

            return $this->redirectToRoute('app_admin_type_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_evenement/new.html.twig', [
            'type_evenement' => $typeEvenement,
            'form' => $form,
            'active' => 'adm-tp-events',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_type_evenement_show", methods={"GET"})
     */
    public function show(TypeEvenement $typeEvenement): Response
    {
        return $this->render('admin_type_evenement/show.html.twig', [
            'type_evenement' => $typeEvenement,
            'active' => 'adm-tp-events',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_type_evenement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeEvenement $typeEvenement, TypeEvenementRepository $typeEvenementRepository): Response
    {
        $form = $this->createForm(TypeEvenementType::class, $typeEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeEvenementRepository->add($typeEvenement, true);

            return $this->redirectToRoute('app_admin_type_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_evenement/edit.html.twig', [
            'type_evenement' => $typeEvenement,
            'form' => $form,
            'active' => 'adm-tp-events',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_type_evenement_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeEvenement $typeEvenement, TypeEvenementRepository $typeEvenementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeEvenement->getId(), $request->request->get('_token'))) {
            $typeEvenementRepository->remove($typeEvenement, true);
        }

        return $this->redirectToRoute('app_admin_type_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
