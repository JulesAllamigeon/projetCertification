<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add(
                'date',
                DateTimeType::class,
                [
                    'widget' => 'single_text'
                ]
            )
            ->add(
                'motive',
                ChoiceType::class,
                [
                    'label' => 'Motif de consultation :',
                    'choices' => [
                        'Choisissez un motif de consultation' => null,
                        'Douleur mâchoire' => 'Douleur mâchoire',
                        'Vertige-Migraine' => 'Vertige-Migraine',
                        'Scoliose' => 'Scoliose',
                        'Sciatique' => 'Sciatique',
                        'Douleur lombaire' => 'Douleur lombaire',
                        'Douleur d\'épaule' => 'Douleur d\'épaule',
                        'Hanche-Genou-Cheville' => 'Hanche-Genou-Cheville'
                    ]
                ]
            )
            ->add(
                'job',
                TextType::class,
                [
                    'label' => 'Profession :'
                ]
            )
            ->add(
                'sports',
                ChoiceType::class,
                [
                    'label' => 'Pratique du sport :',
                    'choices' => [
                        'Pratique occasionnelle' => 'occasionnelle',
                        'Pratique régulière'    => 'réguliere',
                        'Pratique intensive'   => 'intensive'
                    ]
                ]
            )
            ->add(
                'medical_past',
                TextType::class,
                [
                    'label' => 'Antécédents médicaux :'
                ]
            )
            ->add(
                'smoker',
                ChoiceType::class,
                [
                    'label' => 'Etes vous fumeur ?',
                    'choices' => [
                        'Fumeur' => 'oui',
                        'Non-fumeur' => 'non'
                    ],
                        'required' => true
                ]

            )
            ->add(
                'medication',
                ChoiceType::class,
                [
                    'label' => 'Prenez vous des médicaments au quotidien ?',
                    'choices' => [
                        'Oui' => 'oui',
                        'Non' => 'non'
                    ],
                    'required' => true

                ]
            )
            ->add(
                'allergies',
                TextType::class,
                [
                    'label' => 'Avez vous des allergies ? Si oui lesquelles'
                ]
            )
            ->add(
                'sleep_schedule',
                RangeType::class,
                [
                    'label' => 'Qualité de votre sommeil :',
                    'attr' => [
                        'min' => 0,
                        'max' => 100

                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
