<?php
namespace App\Form\Back;


use App\Entity\CategoryUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatUserCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom de la catégorie',
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
            'data_class' => CategoryUser::class,
            'validation_groups' => ['configuration_form'],
        ]);
    }
}
