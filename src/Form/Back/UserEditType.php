<?php
namespace App\Form\Back;


use App\Entity\CategoryUser;
use App\Entity\Reason;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

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
            ->add('phone',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Téléphone',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('localisation',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Lieu',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('job',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Poste',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
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
            ->add('categoryUsers',
                EntityType::class,
                [
                    'class' => CategoryUser::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Categories',
                    'attr' => [
                        'class'=> 'w-100 mb-3'
                    ]
                ])
            ->add('reasons',
                EntityType::class,
                [
                    'class' => Reason::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Motifs de rendez-vous',
                    'attr' => [
                        'class'=> 'w-100 mb-3'
                    ]
                ])
            ->add('img', FileType::class, [
                'label' => 'Photo du contact',
                'required' => true,
                'attr' => [
                    'class'=> 'w-100 mb-3'
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/jpg',
                            'application/jpeg',
                            'application/gif',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid photo (jpg,jpeg,gif,png, MaxSize : 1024ko)',
                    ])
                ],
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
