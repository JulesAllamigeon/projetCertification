<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profil/{firstname}-{lastname}")
     */
    public function index(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class, $user);

        $profile = $repository->findOneBy(
            [
                'id' => $user->getId()
            ]
        );
        dump($profile);


        return $this->render('user/index.html.twig',
            [
                'profile' => $profile
            ]
        );
    }

    /**
     * @Route("/profil/{firstname}-{lastname}/modification")
     */
    public function edit(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(User::class, $user);


        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {


                $em->persist($user);
                $em->flush();

                // message de confirmation
                $this->addFlash('success', "La modification est enregistré");
                // redirection vers la liste
                return $this->redirectToRoute('app_admin_article_index');
            } else {
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('user/edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
