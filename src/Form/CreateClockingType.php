<?php

namespace App\Form;

use App\Entity\Clocking;
use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CreateClockingType extends
    AbstractType
{

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array                                        $options
     *
     * @return void
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array                $options
    ) : void {
        // $builder->add('clockingProject', EntityType::class, [
        //     'class'        => Project::class,
        //     'choice_label' => 'name',
        //     'label'        => 'entity.Clocking.clockingProject',
        // ]);
        $builder->add('projectsClocked', CollectionType::class, [
            'entry_type' => ProjectClockingType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'prototype' => true, // Assurez-vous que 'prototype' est activé
            'prototype_name' => '__name__', // Ceci permet de remplacer __name__ dans le prototype
        ]);
        $builder->add('clockingUser', EntityType::class, [
            'class'        => User::class,
            'choice_label' => static function(
                ?User $choice
            ) : ?string {
                return $choice === null
                    ? null
                    : $choice->getLastName() . ' ' . $choice->getFirstName();
            },
            'label'        => 'entity.Clocking.clockingUser',
        ]);
        $builder->add('date', DateType::class, [
            'label' => 'entity.Clocking.dateEnd',
        ]);
        // $builder->add('duration', IntegerType::class, [
        //     'label' => 'entity.Clocking.duration',
        // ]);
        $builder->add('submit', SubmitType::class, [
            'label' => 'Créer',
        ]);
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults(
            [
                'data_class' => Clocking::class,
            ]
        );
    }
}
