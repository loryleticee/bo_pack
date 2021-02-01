<?php
namespace App\Form\Back;


use App\Entity\Congres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CongresCreationType extends AbstractType
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
            ->add('start_date',
                DateType::class,
                [
                    'required' => true,
                    'label' => 'Date de début*',
                    "widget" => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                    ]
                ])
            ->add('end_date',
                DateType::class,
                [
                    'required' => true,
                    'label' => 'Date de fin*',
                    "widget" => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                    ]
                ])
            ->add('duration_meeting',
                TimeType::class,
                [
                    'required' => true,
                    'label' => 'Durée des créneaux',
                    "widget" => 'single_text',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                    ]
                ])
            ->add('hour_min',
                TimeType::class,
                [
                    'required' => true,
                    'label' => 'Heure de début*',
                    "widget" => 'single_text',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
                    ]
                ])
            ->add('hour_max',
                TimeType::class,
                [
                    'required' => true,
                    'label' => 'Heure de fin*',
                    "widget" => 'single_text',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3',
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
        // TODO Create custom validator for start date < end date
        $resolver->setDefaults([
            'data_class' => Congres::class,
            'validation_groups' => ['configuration_form'],
        ]);
    }
}
