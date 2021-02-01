<?php
namespace App\Form\Back;


use App\Entity\Reason;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReasonCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Motif',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                        'placeholder' => ''
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reason::class,
            'validation_groups' => ['configuration_form'],
        ]);
    }
}
