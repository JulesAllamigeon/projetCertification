<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }


    /**
     * @Route("/contact")
     */
    public function contact(\Swift_Mailer $mailer, Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $data = $form->getData();

                $message = (new \Swift_Message('Mail de contact'))
                    //->setFrom($data['email'])
                    ->setFrom('emaildusite@jacl.com')
                    ->setTo('possesseurdusite@jacl.com')
                    ->setBody(
                        $this->renderView(
                            'index/mail.html.twig',
                            [
                                'data' => $data
                            ]
                        ),
                        'text/html'
                    );

                $mailer->send($message);
                $this->addFlash('success', 'Message envoyé');
            }
            else {
                $this->addFlash('error', 'Veuillez remplir correctement les champs');
            }
        }

        return $this->render('index/contact.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/apropos")
     */
    public function apropos()
    {
        return $this->render('index/apropos.html.twig');
    }

    /**
     * @Route("/nospatients")
     */
    public function nospatients()
    {
        return $this->render('index/nospatients.html.twig');
    }
}
