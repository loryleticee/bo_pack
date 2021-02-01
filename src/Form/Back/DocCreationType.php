<?php
namespace App\Form\Back;


use App\Entity\CategoryDocument;
use App\Entity\Document;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class DocCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Titre',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('ref',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Référence',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('about',
                TextareaType::class,
                [
                    'required' => false,
                    'label' => 'Description',
                    'attr' => [
                        'class'=> 'form-control w-100 mb-3'
                    ]
                ])
            ->add('categoryDocuments',
                EntityType::class,
                [
                    'class' => CategoryDocument::class,
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false,
                    'label' => 'Categories',
                    'attr' => [
                        'class'=> 'w-100 mb-3'
                    ]
                ])
            ->add('img', FileType::class, [
                'label' => 'Image',
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
            ->add('docName', FileType::class, [
                'label' => 'Document',
                'required' => true,
                'attr' => [
                    'class'=> 'w-100 mb-3'
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '100024k',
                        'mimeTypes' => [
                            'application/jpg',
                            'application/jpeg',
                            'application/gif',
                            'application/png',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid document (pdf, jpg, jpeg, gif, png, MaxSize : 100024ko)',
                    ])
                ],
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
            'data_class' => Document::class,
            'validation_groups' => ['configuration_form'],
        ]);
    }
}
