<?php

namespace App\Form;

use App\Entity\Consultation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add(
                'diagnostic',
                TextareaType::class,
                [
                    'label' => 'Diagnostic de la séance'
                ]
            )
            ->add(
                'traitement',
                TextareaType::class,
                [
                    'label' => 'Traitement'
                ]
            )
            ->add(
                'commentaire',
                TextareaType::class,
                [
                    'label' => 'Commentaire'
                ]
            )
            ->add('paiement',
                ChoiceType::class,
                [
                    'choices' => [
                        'Choisissez un mode de paiement' => null,
                        'Chèque' => 'Chèques',
                        'Espèces' => 'Espèces',
                        'Carte Bleue' => 'Carte Bleue'
                    ]
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
