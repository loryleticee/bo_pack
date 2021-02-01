<?php
namespace App\Form\Front;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class CustomerCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility',
                ChoiceType::class,
                [
                    'choices'  => [
                        'Civilité*' => 'null',
                        'Professeur' => 'Professeur',
                        'Docteur' => 'Docteur',
                        'Madame' => 'Madame',
                        'Monsieur' => 'Monsieur'
                    ],
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Civilité*'
                    ]
                ])

            ->add('lastname',
                TextType::class,
                [
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Nom*'
                    ]
                ])
            ->add('firstname',
                TextType::class,
                [
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Prénom*'
                    ]
                ]
            )
            ->add('mail',
                EmailType::class,
                [
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Email*'
                    ]
                ])
        ;
    }
}
