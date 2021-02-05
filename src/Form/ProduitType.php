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
                    'required' => false,
                    'label' => 'Marque',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )

            ->add(
                'model',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Modèle',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )

            ->add('status', ChoiceType::class, [
                'choices' => Produit::STATUS_OPTIONS,
            ])

            ->add('type_produit', ChoiceType::class, [
                'label' => 'Type de produit',
                'choices' => Produit::TYPE_OPTIONS,
            ])

            ->add('place', ChoiceType::class, [
                'label' => 'Emplacement',
                'choices' => Produit::PLACE_OPTIONS
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
                    'choice_label' => 'fullname',
                    'multiple' => false,
                    'expanded' => false,
                    'required' => false,
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
