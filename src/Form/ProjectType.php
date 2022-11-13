<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Priority;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('priority', EntityType::class, [
                'class' => Priority::class,
                'choice_label' => 'priority_level',
                'placeholder' => 'Choose a priority',
                // 'query_builder' => fn (PriorityTableRepository $priorityTableRepository) =>
                // $priorityTableRepository->findAllOrderedByAscNameQueryBuilder()
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
