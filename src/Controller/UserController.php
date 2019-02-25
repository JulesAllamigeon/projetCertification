<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\User;
use App\Form\UserEditType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/utilisateur")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $repositoryBookings = $em->getRepository(Booking::class);

        $appointments = $repositoryBookings->findBy(
            [
                'user' => $user->getId(),
                'status' => 'EN_ATTENTE'
            ],
            ['date' => 'ASC']);


        return $this->render('user/index.html.twig',
            [
                'profile' => $user,
                'appointments' => $appointments
            ]
        );
    }

    /**
     * @Route("/utilisateur/modification")
     */
    public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var User $user */
        $user = $this->getUser();

        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                if (!empty($user->getPlainPassword())) {
                    $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                    $user->setPassword($password);
                }


                $em->persist($user);
                $em->flush();

                // message de confirmation
                $this->addFlash('success', "La modification est enregistrée");
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
