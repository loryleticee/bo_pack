<?php
namespace App\Form\Front;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SecurityCongresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code',
                TextType::class,
                [
                    'required'   => true,
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => 'Code de sécurité'
                    ]
                ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'but-popin-alert'],
            ])
        ;
    }
}
