<?php

namespace App\Form;

use App\Entity\Produit;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitEditType extends AbstractType
{
    private $userRepository;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $activeUsers = $this->userRepository->findAllActive();
      
        $aUsers = [];
        array_walk($activeUsers, function ($a) use (&$aUsers) {
            $aUsers[$a->getFirstname()] = $a->getId();
        });

        $builder
            ->add(
                'name',
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
            ->add(
                'model',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Modele*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add(
                'brand',
                TextType::class,
                [
                    'required' => true,
                    'label' => 'Marque*',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('type_produit', ChoiceType::class, [
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
            ])
           
            ->add('user',  ChoiceType::class,
                [
                    'choices' => $aUsers,
                    'empty_data' => $options['user']->getLastname(),
                    'data' => $options['user']->getId()
                ]
            )

            ->add('old_user', HiddenType::class, [
                'attr' => [
                    'name' => 'old_user'
                ],
                'data'=> $options['user']->getId()
            ])

            ->add(
                'save',
                SubmitType::class,
                [
                    'label' => 'Enregister',
                    'attr' => [
                        'class' => 'btn btn-primary',
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('user');
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
