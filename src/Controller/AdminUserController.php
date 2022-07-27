<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/admin/user")
 */
class AdminUserController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin_user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
            //Ajout de la prise en charge des rôles
            if($request->request->get("user")["role"]=="ADMIN") {
                $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
            } else {
                $user->setRoles(["ROLE_USER"]);
            }

            //Ajout de la prise en charge du mot de passe
            $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $request->request->get("user")["plainPassword"]);

            // On affecte la valeur du mot de passe hashé à la propriété password de l'utilisateur
            $user->setPassword($hashedPassword);

            //Mise en BDD en utilisant la méthode originale
            $userRepository->add($user, true);

            return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin_user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Ajout de la prise en charge des rôles
            if($request->request->get("user")["role"]=="ADMIN") {
                $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
            } else {
                $user->setRoles(["ROLE_USER"]);
            }
          
            if(!empty($request->request->get("user")["plainPassword"])) {
                //Ajout de la prise en charge du mot de passe
                $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $request->request->get("user")["plainPassword"]);

                // On affecte la valeur du mot de passe hashé à la propriété password de l'utilisateur
                $user->setPassword($hashedPassword);
            }

            $userRepository->add($user, true);
            return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('admin_user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
