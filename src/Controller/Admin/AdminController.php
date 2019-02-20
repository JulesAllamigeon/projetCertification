<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/02/2019
 * Time: 14:14
 */

namespace App\Controller\Admin;


use App\Entity\Booking;
use App\Entity\Consultation;
use App\Entity\User;
use App\Form\BookingType;
use App\Form\ConsultationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller\Admin
 * @Route("/consultation")
 */
class AdminController extends AbstractController
{
    /**
     *
     * @Route("/")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Booking::class);
        $consultations = $repository->findBy([], [
            'date' => 'ASC',
        ]);

        return $this->render('admin/index.html.twig', [
            'consultations' => $consultations

        ]);
    }

    /**
     * @Route("/modification/{id}")
     */
    public function update(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $booking = $em->find(Booking::class, $id);

        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // si les validations à partir des annotations dans l'entité
            // Category sont ok
            if ($form->isValid()) {
                // enregistrement de la catégorie en bdd
                $em->persist($booking);
                $em->flush();

                // message de confirmation
                $this->addFlash('success', 'Le RDV a bien été modifié');
                // redirection vers la liste
                return $this->redirectToRoute('app_admin_admin_index');
            } else {
                // message d'erreur
                $this->addFlash('error', 'Le formulaire contient des erreurs');
            }
        }

        return $this->render('admin/update.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/patient/{id}")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view($id)
    {
        $em = $this->getDoctrine()->getRepository(Booking::class);
        $booking = $em->find($id);

        return $this->render('admin/view.html.twig', [
            'booking' => $booking
        ]);
    }

    /**
     * @Route("/patients")
     */
    public function allMyPatients()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findBy([], [
            'lastname' => 'ASC',

        ]);

        return $this->render('admin/patients.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/validation")
     */
    public function manageMyConsultation(Request $request)
    {
        $consultation = new Consultation();

        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                //$consultation->setUser($booking);




                $em->persist($consultation);
                $em->flush();



            }
        }
        return $this->render('admin/consultation.html.twig', [
            'form' => $form->createView()
        ]);
    }
}