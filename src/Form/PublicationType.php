<?php
// src/Form/PublicationType.php

namespace App\Form;

use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Evenement;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_utilisateur', TextType::class, [
                'label' => 'Nom Utilisateur',
            ])
           
            ->add('evenement', ChoiceType::class, [
                'label' => 'Evenement',
                'choices' => [
                    'Yoga' => 'Yoga',
                    'Cardio' => 'Cardio',
                    'Meditation' => 'Meditation',
                    'Marche' => 'Marche',
                    'Foot' => 'Foot',
                    // Add other choices as needed
                ],
                'placeholder'=>'',
                'attr' => ['class' => 'form-select'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publication::class,
        ]);
    }
}
