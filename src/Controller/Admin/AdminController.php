<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/02/2019
 * Time: 14:14
 */

namespace App\Controller\Admin;


use App\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller\Admin
 * @Route("/consultation")
 */
class AdminController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Booking::class);
        $consultations = $repository->findBy([], [
            'date' => 'ASC'
        ]);




        return $this->render('admin/index.html.twig', [
            'consultations' => $consultations
        ]);
    }


}