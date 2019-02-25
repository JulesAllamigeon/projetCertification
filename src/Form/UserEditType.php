<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom :'
                ]
            )
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom :'
                ]
            )
            ->add(
                'age',
                TextType::class,
                [
                    'label' => 'Age :'
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email :'
                ]
            )
            ->add(
                'telephone',
                TextType::class,
                [
                    'label' => 'Téléphone :'
                ]
                )
            ->add('adress',
                TextType::class,
                [
                    'label' => 'Adresse postale :'
                ]
                )
            ->add('city',
                TextType::class,
                [
                    'label' => 'Ville :'
                ]
            )
            ->add('zipcode',
                TextType::class,
                [
                    'label' => 'Code postal :'
                ]
            )
            ->add(
                'plainPassword',
                // 2 champs qui doivent avoir la meme valeur
                RepeatedType::class,
                [
                    // ... de type password
                    'type' => PasswordType::class,
                    'required' => false,
                    // options du 1er champs
                    'first_options' => [
                        'label' => 'Nouveau mot de passe :'
                    ],
                    // options du 2eme champs
                    'second_options' => [
                        'label' => 'Confirmation du nouveau mot de passe :'
                    ],
                    // message si les 2 champs n'ont pas la meme valeur
                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe'
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
