<?php

namespace App\Controller;

use App\Entity\ImagesExpo;
use App\Form\ImagesExpoType;
use App\Repository\ImagesExpoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/images/expo")
 */
class AdminImagesExpoController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_images_expo_index", methods={"GET"})
     */
    public function index(ImagesExpoRepository $imagesExpoRepository): Response
    {
        return $this->render('admin_images_expo/index.html.twig', [
            'images_expos' => $imagesExpoRepository->findAll(),
            'active' => 'adm-img-expos',
        ]);
    }

    /**
     * @Route("/new", name="app_admin_images_expo_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ImagesExpoRepository $imagesExpoRepository): Response
    {
        $imagesExpo = new ImagesExpo();
        $form = $this->createForm(ImagesExpoType::class, $imagesExpo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imagesExpoRepository->add($imagesExpo, true);

            return $this->redirectToRoute('app_admin_images_expo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_images_expo/new.html.twig', [
            'images_expo' => $imagesExpo,
            'form' => $form,
            'active' => 'adm-img-expos',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_images_expo_show", methods={"GET"})
     */
    public function show(ImagesExpo $imagesExpo): Response
    {
        return $this->render('admin_images_expo/show.html.twig', [
            'images_expo' => $imagesExpo,
            'active' => 'adm-img-expos',
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_images_expo_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ImagesExpo $imagesExpo, ImagesExpoRepository $imagesExpoRepository): Response
    {
        $form = $this->createForm(ImagesExpoType::class, $imagesExpo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imagesExpoRepository->add($imagesExpo, true);

            return $this->redirectToRoute('app_admin_images_expo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_images_expo/edit.html.twig', [
            'images_expo' => $imagesExpo,
            'form' => $form,
            'active' => 'adm-img-expos',
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_images_expo_delete", methods={"POST"})
     */
    public function delete(Request $request, ImagesExpo $imagesExpo, ImagesExpoRepository $imagesExpoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imagesExpo->getId(), $request->request->get('_token'))) {
            $imagesExpoRepository->remove($imagesExpo, true);
        }

        return $this->redirectToRoute('app_admin_images_expo_index', [], Response::HTTP_SEE_OTHER);
    }
}
