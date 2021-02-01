<?php
namespace App\Form\Front;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class RefuseMeetingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reasonCancel',
                TextareaType::class,
                [
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Motif de l\'annulation'
                    ]
                ])
            ->add('submit', SubmitType::class, [
                'label' =>'Valider votre annulation',
                'attr' => [
                    'class' => 'but-popin-alert'
                ],
            ])
        ;
    }
}
