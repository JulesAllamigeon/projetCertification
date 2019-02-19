<?php

namespace App\Form;

use http\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom'
                ],
                [
                    'constraints' => [
                        new NotBlank()
                    ]
                ]
            )
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom'
                ],
                [
                    'constraints' => [
                        NotBlank::class
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Adresse Mail'
                ],
                [
                    'constraints' => [
                        NotBlank::class
                    ]

                ]
            )

            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Message'
                ],
                [
                    'constraints' => [
                        NotBlank::class
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
