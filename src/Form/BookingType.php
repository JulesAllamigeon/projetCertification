<?php

namespace App\Form;

use App\Entity\Booking;
use App\Form\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    private $transformer;

    public function __construct(DateTimeToStringTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add(
                'date',
                TextType::class,
                [
                    'attr' => [
                        'class' => 'datepicker'

                    ]
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
                        'occasionnelle' => 'occasionnelle',
                        'régulière'    => 'réguliere',
                        'intensive'   => 'intensive'
                    ]
                ]
            )
            ->add(
                'medical_past',
                TextType::class,
                [
                    'label' => 'Antécédents médicaux :',
                    'attr' => array(
                        'placeholder' => 'exemple : fracture.. intervention chirurgicale.. '
                    )
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
            ->add('allergies',ChoiceType::class,[
                'multiple'=>true,
                'expanded'=>true,
                'label' => 'Êtes vous allergique ?',
                'choices'=>[
                    'pollen'=>'pollen',
                    'alimentaire'=>'alimentaire',
                    'acariens' => 'acariens',
                    'animaux' => 'animaux',
                    'soleil' => 'soleil'
                ]
            ])


            ->add(
                'sleep_schedule',
                RangeType::class,
                [
                    'label' => 'Qualité de votre sommeil :',
                    'attr' => [
                        'min' => 0,
                        'max' => 10

                    ]
                ]
            )
        ;

        $builder->get('date')->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
