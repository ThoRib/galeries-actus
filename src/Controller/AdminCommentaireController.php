<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/commentaire")
 */
class AdminCommentaireController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_commentaire_index", methods={"GET"})
     */
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        return $this->render('admin_commentaire/index.html.twig', [
            'commentaires' => $commentaireRepository->findAll(),
            'active' => 'adm-coms',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_commentaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CommentaireRepository $commentaireRepository): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireRepository->add($commentaire, true);

            return $this->redirectToRoute('app_admin_commentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_commentaire/new.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form,
            'active' => 'adm-coms',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_commentaire_show", methods={"GET"})
     */
    public function show(Commentaire $commentaire): Response
    {
        return $this->render('admin_commentaire/show.html.twig', [
            'commentaire' => $commentaire,
            'active' => 'adm-coms',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_commentaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commentaire $commentaire, CommentaireRepository $commentaireRepository): Response
    {
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireRepository->add($commentaire, true);

            return $this->redirectToRoute('app_admin_commentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_commentaire/edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form,
            'active' => 'adm-coms',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_commentaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Commentaire $commentaire, CommentaireRepository $commentaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaire->getId(), $request->request->get('_token'))) {
            $commentaireRepository->remove($commentaire, true);
        }

        return $this->redirectToRoute('app_admin_commentaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
