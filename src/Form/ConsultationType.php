<?php

namespace App\Form;

use App\Entity\Consultation;
use Symfony\Component\Form\AbstractType;
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
                TextType::class,
                [
                    'label' => 'Diagnostic de la séance'
                ]
            )
            ->add(
                'traitement',
                TextType::class,
                [
                    'label' => 'Traitement'
                ]
            )
            ->add(
                'commentaire',
                TextType::class,
                [
                    'label' => 'Commentaire'
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
