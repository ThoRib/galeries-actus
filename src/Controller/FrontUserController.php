<?php

namespace App\Controller;

use App\Repository\ExpositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontUserController extends AbstractController
{
    /**
     * @Route("/mon-espace/user", name="app_front_user")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('front_user/index.html.twig', [
            'user' => $user,
            'active' => 'perso'
        ]);
    }

    /**
     * @Route("/add-favoris/{id}", name="add_favoris")
     */
    public function addFavoris(int $id, ExpositionRepository $expositionRepository, EntityManagerInterface $entityManagerInterface) 
    {
        $expo = $expositionRepository->find($id);
        $user = $this->getUser();
        $user->addFavori($expo);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_expo', ['id' => $id]);
    }

    /**
     * @Route("/remove-favoris/{id}", name="remove_favoris")
     */
    public function removeFavoris(int $id, ExpositionRepository $expositionRepository, EntityManagerInterface $entityManagerInterface) 
    {
        $expo = $expositionRepository->find($id);
        $user = $this->getUser();
        $user->removeFavori($expo);
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();
        return $this->redirectToRoute('app_expo', ['id' => $id]);
    }

}


