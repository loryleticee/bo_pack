<?php

// namespace App\Form;

// use App\Form\Model\SearchJob;
// use App\Repository\PostTypeRepository;
// use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;
// use Symfony\Component\Form\FormEvent;
// use Symfony\Component\Form\FormEvents;

// class SearchProductType extends AbstractType
// {
//     protected $postTypeRepository;

//     public function __construct(PostTypeRepository $postTypeRepository)
//     {
//         $this->postTypeRepository = $postTypeRepository;
//     }

//     private function getJobTypesOptions(): array
//     {
//         $options = [];
//         $options[SearchJob::JOBTYPE_TOUT] = SearchJob::JOBTYPE_TOUT_VAL;

//         $jobTypes = $this->postTypeRepository->findBy(['active' => true, 'isDeleted' => false]);

//         array_walk($jobTypes, function ($elem) use (&$options) {
//             $options[$elem->getName()] = $elem->getId();
//         });

//         return $options;
//     }

//     public function buildForm(FormBuilderInterface $builder, array $options)
//     {
//         $builder
//             ->add('typeDePoste', ChoiceType::class, [
//                 'label' => 'Type de poste',
//                 'choices' => $this->getJobTypesOptions(),
//                 'attr' => [
//                     'data-parsley-errors-container' => "#error-contact"
//                 ],
//                 'placeholder' => 'Selectionner un type de poste',
//                 'required' => false
//             ])
//             ->add('lieu', TextType::class, [
//                 'label' => 'Où',
//                 'attr' => [
//                     'class' => 'custom',
//                     'data-parsley-errors-container' => "#error-contact",
//                     'placeholder' => 'Ville, département'
//                 ],
//             ])
//             ->addEventListener(FormEvents::POST_SUBMIT, [$this, 'onPostSubmit']);
//     }

//     public function onPostSubmit(FormEvent $event): void
//     {
//         $jobType = $event->getData();

//         if (null === $jobType->typeDePoste) {
//             $jobType->typeDePoste = SearchJob::JOBTYPE_TOUT_VAL;
//         }
//     }

//     public function configureOptions(OptionsResolver $resolver)
//     {
//         $resolver->setDefaults([
//             'data_class' => SearchJob::class
//         ]);
//     }
// }
