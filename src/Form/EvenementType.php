<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_evenement')
            ->add('choix_evenement', ChoiceType::class, [
                'label' => 'Choix de l evenement',
                'choices' => [
                    'Yoga' => 'Yoga',
                    'Marche' => 'Marche',
                    'Cardio' => 'Cardio',
                    'Musculaton' => 'Musculation',
                    'Foot' => 'Foot',
                ],
                'placeholder'=>'',
                'attr' => ['class' => 'form-select'],   
            ])
            ->add('description_evenement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
