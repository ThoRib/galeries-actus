<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\ExpositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

        $this->addFlash('message', 'Cette exposition a été ajoutée à vos favoris');

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

        return $this->render('front_user/index.html.twig', [
            'user' => $user,
            'active' => 'perso'
        ]);
    }

    /**
     * @Route("/delete-me", name="delete_me", methods={"POST"})
     */
    public function deleteMe(Request $request, UserRepository $userRepository, EntityManagerInterface $entManInt): Response
    {
        $user = $this->getUser();

        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            
            //mise à null de l'id user pour chaque commentaire associé
            $allComs = $user->getCommentaires();
            foreach($allComs as $com) {
                $com->setUser(null);
                $entManInt->persist($com);
            }
            $entManInt->flush();
            
            //Mise à null du Token d'identification et suppression de l'utilisateur
            $this->container->get('security.token_storage')->setToken(null);
            $userRepository->remove($user, true);

            $this->addFlash('message', 'Votre compte a bien été supprimé');
        }

        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }

}


