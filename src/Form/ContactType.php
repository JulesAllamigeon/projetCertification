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
                    'label' => 'Prénom',
                    'constraints' => [
                        new NotBlank(['message' => 'Prénom obligatoire'])
                    ]
                ]
            )
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom',
                    'constraints' => [
                        new NotBlank(['message' => 'Nom obligatoire'])
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Adresse Mail',
                    'constraints' => [
                        new NotBlank(['message' => 'Email obligatoire'])
                    ]
                ]
            )

            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Message',
                    'constraints' => [
                        new NotBlank(['message' => 'Message obligatoire'])
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
