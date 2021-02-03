<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                    'Perdu' => 'Perdu',
                    'Non attribué' => 'Non attribué',
                    'En cours d’utilisation' => 'En cours d’utilisation',
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
                'choices' => [
                    'Office' => 'Office',
                    'Home-office' => 'Home-office',
                ]
            ])

            ->add(
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
            )
            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Enregister',
                    'attr' => [
                        'class' => 'btn btn-primary',
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
