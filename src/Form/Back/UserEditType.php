<?php
namespace App\Form\Back;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Prénom*',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('lastname',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom*',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('email',
                EmailType::class,
                [
                    'required' => true,
                    'label' => 'Email*',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
           

            ->add('bu', ChoiceType::class, [
                'required' =>false,
                'choices' => [
                    'Digital' => 'Digital',
                    'Luxe' => 'Luxe',
                    'Pack' => 'Pack',
                    'Pro' => 'Pro',
                    'Santé' => 'Santé',
                    'Autre' => 'Autre',
                ]
            ])
            
            ->add('about',
                TextareaType::class,
                [
                    'required' => false,
                    'label' => 'A propos',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            
            ->add('save', SubmitType::class,
                [
                'label' => 'Enregister',
                'attr' => [
                    'class'=> 'btn btn-primary',
                    ]
                ])
        ;
    }
}
