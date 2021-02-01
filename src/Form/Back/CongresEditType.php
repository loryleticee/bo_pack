<?php
namespace App\Form\Back;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CongresEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom de l\'événement*',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Congres Incyte'
                    ]
                ])
            ->add('security_code',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Code de sécurité*',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('save', SubmitType::class,
                [
                'label' => 'Enregistrer',
                'attr' => [
                    'class'=> 'btn btn-primary',
                ]
                ])
        ;
    }
}
