<?php

namespace App\Form\Back;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Prénom*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add(
                'lastname',
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
                'email',
                EmailType::class,
                [
                    'required' => false,
                    'label' => 'Email*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('bu', ChoiceType::class, [
                'label' => 'BU',
                'choices' => User::BU_OPTIONS,
            ])
            ->add(
                'about',
                TextareaType::class,
                [
                    'required' => false,
                    'label' => 'A propos',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Enregistrer',
                    'attr' => [
                        'class' => 'btn btn-primary mt-5 float-right',
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['configuration_form'],
        ]);
    }
}
