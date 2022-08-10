<?php

namespace App\Controller;

use App\Entity\Bienvenue;
use App\Form\BienvenueType;
use App\Repository\BienvenueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/bienvenue")
 */
class AdminBienvenueController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_bienvenue_index", methods={"GET"})
     */
    public function index(BienvenueRepository $bienvenueRepository): Response
    {
        return $this->render('admin_bienvenue/index.html.twig', [
            'bienvenues' => $bienvenueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_bienvenue_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BienvenueRepository $bienvenueRepository): Response
    {
        $bienvenue = new Bienvenue();
        $form = $this->createForm(BienvenueType::class, $bienvenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bienvenueRepository->add($bienvenue, true);

            return $this->redirectToRoute('app_admin_bienvenue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bienvenue/new.html.twig', [
            'bienvenue' => $bienvenue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_bienvenue_show", methods={"GET"})
     */
    public function show(Bienvenue $bienvenue): Response
    {
        return $this->render('admin_bienvenue/show.html.twig', [
            'bienvenue' => $bienvenue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_bienvenue_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Bienvenue $bienvenue, BienvenueRepository $bienvenueRepository): Response
    {
        $form = $this->createForm(BienvenueType::class, $bienvenue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bienvenueRepository->add($bienvenue, true);

            return $this->redirectToRoute('app_admin_bienvenue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_bienvenue/edit.html.twig', [
            'bienvenue' => $bienvenue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_bienvenue_delete", methods={"POST"})
     */
    public function delete(Request $request, Bienvenue $bienvenue, BienvenueRepository $bienvenueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bienvenue->getId(), $request->request->get('_token'))) {
            $bienvenueRepository->remove($bienvenue, true);
        }

        return $this->redirectToRoute('app_admin_bienvenue_index', [], Response::HTTP_SEE_OTHER);
    }
}
