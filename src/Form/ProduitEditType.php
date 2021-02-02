<?php

namespace App\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('place', ChoiceType::class, [
                'choices' => [
                    'Office' => 'Office',
                    'Home-office' => 'Home-office',
                ]
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Perdu' => 'Perdu',
                    'Non attribué' => 'Non attribué',
                    'En cours d’utilisation' => 'En cours d’utilisation',
                ]
            ])
            ->add('model',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Nom*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('brand',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Marque*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Écran' => 'Écran',
                    'Souris' => 'Souris',
                    'Clavier' => 'Clavier',
                    'Tours' => 'Tours',
                    'Portable' => 'Portable',
                    'Tablette' => 'Tablette',
                    'Telephone fixe' => 'Telephone fixe',
                    'Chaise' => 'Chaise',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
