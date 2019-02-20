<?php

namespace App\Form;

use App\Entity\Consultation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'payment',
                ChoiceType::class,
        [
            'label' => 'Type de paiement : ',
            'choices' => [
                'Mode de paiement' => null,
                'Carte bancaire' => 'Carte bancaire',
                'Cheque' => 'Cheque',
                'Espèces' => 'Especes'
            ]
        ]
            )
            ->add(
                'comment',
                TextareaType::class,
                [
                    'label' => 'Commentaire sur la consultation'
                ]

            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}
