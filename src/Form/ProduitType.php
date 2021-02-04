<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )

            ->add(
                'brand',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Marque*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add(
                'model',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Modele*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'En cours d’utilisation' => 'En cours d’utilisation',
                    'Non attribué' => 'Non attribué',
                    'Perdu' => 'Perdu',
                ]
            ])

            ->add('type_produit', ChoiceType::class, [
                'choices' => [
                    'Ecran' => 'Ecran',
                    'Souris' => 'Souris',
                    'Clavier' => 'Clavier',
                    'Tours' => 'Tours',
                    'Portable' => 'Portable',
                    'Tablette' => 'Tablette',
                    'Telephone fixe' => 'Telephone fixe',
                    'Chaise' => 'Chaise',
                ]
            ])
            ->add('place', ChoiceType::class, [
                'label' => 'Emplacement',
                'choices' => [
                    'Office' => 'Office',
                    'Home-office' => 'Home-office',
                ]
            ])
            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Enregister',
                    'attr' => [
                        'class' => 'btn-lg btn-primary mt-5 float-right',
                    ]
                ]
            );


        if (empty($options['user'])) {
            $builder->add(
                'user',
                EntityType::class,
                [
                    'class' => User::class,
                    'choice_label' => 'lastname',
                    'multiple' => false,
                    'expanded' => false,
                    'required' => true,
                    'label' => 'Utilisateur',
                    'attr' => [
                        'class' => 'w-100 mb-3'
                    ]
                ]
            );
        } else {
            $builder->add(
                'user',
                HiddenType::class,
                [
                    'required' => true,
                    'label' => $options['user']->getFirstName().' '.$options['user']->getLastName() ,
                    'data' => $options['user']->getId(),
                    'attr' => [
                        'class' => 'form-control w-100 mb-3',
                        'disabled ' => true,
                    ],
                ]
            );
        }
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['user']);
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
