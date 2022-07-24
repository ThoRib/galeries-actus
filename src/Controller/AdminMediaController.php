<?php

namespace App\Controller;

use App\Entity\Media;
use App\Form\MediaType;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/media")
 */
class AdminMediaController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_media_index", methods={"GET"})
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        return $this->render('admin_media/index.html.twig', [
            'media' => $mediaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_media_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MediaRepository $mediaRepository): Response
    {
        $medium = new Media();
        $form = $this->createForm(MediaType::class, $medium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mediaRepository->add($medium, true);

            return $this->redirectToRoute('app_admin_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_media/new.html.twig', [
            'medium' => $medium,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_media_show", methods={"GET"})
     */
    public function show(Media $medium): Response
    {
        return $this->render('admin_media/show.html.twig', [
            'medium' => $medium,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_media_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Media $medium, MediaRepository $mediaRepository): Response
    {
        $form = $this->createForm(MediaType::class, $medium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mediaRepository->add($medium, true);

            return $this->redirectToRoute('app_admin_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_media/edit.html.twig', [
            'medium' => $medium,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_media_delete", methods={"POST"})
     */
    public function delete(Request $request, Media $medium, MediaRepository $mediaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medium->getId(), $request->request->get('_token'))) {
            $mediaRepository->remove($medium, true);
        }

        return $this->redirectToRoute('app_admin_media_index', [], Response::HTTP_SEE_OTHER);
    }
}
