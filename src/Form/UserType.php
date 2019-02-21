<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom'
                ]
            )
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom'
                ]
            )
            ->add(
                'age',
                TextType::class,
                [
                    'label' => 'Age'
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email'
                ]
            )
            ->add(
                'sexe',
                ChoiceType::class,
                [
                    'choices' => [
                        'Homme' => 'm',
                        'Femme' => 'f'
                    ],
                    'expanded' => true

                ]
            )
            ->add(
                'telephone',
                TextType::class,
                [
                    'label' => 'Téléphone'
                ]
                )
            ->add(
                'plainPassword',
                // 2 champs qui doivent avoir la meme valeur
                RepeatedType::class,
                [
                    // ... de type password
                    'type' => PasswordType::class,
                    // options du 1er champs
                    'first_options' => [
                        'label' => 'Mot de passe'
                    ],
                    // options du 2eme champs
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe'
                    ],
                    // message si les 2 champs n'ont pas la meme valeur
                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe'
                ]
            )
            ->add('adress',
                TextType::class,
                [
                    'label' => 'Adresse postale'
                ]
                )
            ->add('city',
                TextType::class,
                [
                    'label' => 'Ville'
                ]
            )
            ->add('zipcode',
                TextType::class,
                [
                    'label' => 'Code postal'
                ]
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['create']
        ]);
    }
}
