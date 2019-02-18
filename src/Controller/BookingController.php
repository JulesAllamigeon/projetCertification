<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking")
     */
    public function takeMyRDV(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $booking = New Booking();

        $form = $this->createForm(BookingType::class, $booking);


        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()) {

                // represente le user qui s'est connecté
                $booking->setUser($this->getUser());




                $em->persist($booking);
                $em->flush();

                $this->addFlash('success', 'Votre RDV a bien été enregistré');

                return $this->redirectToRoute("app_index_index");

            }
            else {
                $this->addFlash('error', 'Votre formulaire contient des erreurs');
            }
        }

        return $this->render('booking/index.html.twig', [
                'form' => $form->createView(),
        ]);
    }
}
