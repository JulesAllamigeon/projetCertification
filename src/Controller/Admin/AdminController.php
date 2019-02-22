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
    public function index(Request $request)
    {
        $filters = $request->query->all();

        $date = new \DateTime();

        $repository = $this->getDoctrine()->getRepository(Booking::class);
        $bookings = $repository->findByDate($filters);

        return $this->render('admin/index.html.twig', [
            'bookings' => $bookings,
            'date' => $date

        ]);
    }

    /**
     * @Route("/historique")
     */
    public function historiqueConsultation(Request $request)
    {
        $filters = $request->query->all();

        $date = new \DateTime();

        $repository = $this->getDoctrine()->getRepository(Consultation::class);
        $consultations = $repository->findByDate($filters);

       // $repository2 = $this->getDoctrine()->getRepository(Consultation::class);
        //$consultation = $repository2->find($id);

        return $this->render('admin/historique.html.twig', [
            'consultations' => $consultations,
            'date' => $date
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
            'form' => $form->createView(),
            'booking' => $booking
        ]);

    }

    /**
     * @Route("/detail/{id}")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view($id)
    {
        $repo = $this->getDoctrine()->getRepository(Consultation::class);
        $consultation = $repo->find($id);


        return $this->render('admin/view.html.twig', [
            'consultation' => $consultation
        ]);
    }

    /**
     * @Route("/detail/profil/{id}")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewProfil($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);


        return $this->render('admin/viewProfil.html.twig', [
                'user' => $user
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
     * @Route("/validation/{id}")
     *
     */
    public function manage(Request $request, Booking $booking, $id)
    {
        $consultation = new Consultation();

        $em2 = $this->getDoctrine()->getRepository(Booking::class);
        $bookings = $em2->find($id);


        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ConsultationType::class, $consultation);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $consultation->setBooking($booking);
                $consultation->setDate($booking->getDate());

                $booking->setStatus('PAYEE');

                $em->persist($consultation);
                $em->flush();

                $this->addFlash('success', 'Votre RDV a bien été validé');
                return $this->redirectToRoute("app_index_index");
            }
            else{
                $this->addFlash('error', 'Votre validation contient des erreurs');
            }
        }
        return $this->render('admin/manage.html.twig', [
            'form' => $form->createView(),
            'booking' => $bookings
        ]);
    }
}

