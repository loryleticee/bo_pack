<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use stdClass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
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
                'choices' => Produit::PLACE_OPTIONS
            ])
            ->add('status', ChoiceType::class, [
                'choices' => Produit::STATUS_OPTIONS
            ])
            ->add(
                'model',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Modele',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add(
                'brand',
                TextType::class,
                [
                    'required' => false,
                    'label' => 'Marque',
                    'attr' => [
                        'class' => 'form-control w-100 mb-3'
                    ]
                ]
            )
            ->add('type_produit', ChoiceType::class, [
                'choices' => Produit::TYPE_OPTIONS,
            ])
           
            ->add('user',  ChoiceType::class,
                [
                    'choices' => $aUsers,
                    'data' => $options['user']
                ]
            )

            ->add('is_deleted',  ChoiceType::class, [
                    'choices' => Produit::DELETE_OPTIONS,
                    'required' => true,
                    'label' => 'Actif/Supprimé',
                ]
            )

            ->add('old_user', HiddenType::class, [
                'mapped' => false,
                'attr' => [
                    'name' => 'old_user'
                ],
                'data'=> $options['user'] ? $options['user']->getId() : []
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
           $userRepository =  $this->userRepository;
            $builder->get('user')->addModelTransformer(new CallbackTransformer(
                function ($input) {
                    return $input ? $input->getId() : null;
                },
                function ($input) use($userRepository){
                    return $userRepository->find($input);
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('user');
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
