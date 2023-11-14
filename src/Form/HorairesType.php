<?php

namespace App\Form;

use DateTime;
use App\Entity\HorairesOuverture;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class HorairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jours',ChoiceType::class,[
                'choices'  => [
                    'Lundi'=>'Lundi',
                    'Mardi'=>'Mardi',
                    'Mercredi'=>'Mercredi',
                    'Jeudi'=>'Jeudi',
                    'Vendredi'=>'Vendredi',
                    'Samedi'=>'Samedi',
                    'Dimanche'=>'Dimanche',
                ],

                'attr'=>[
                    'class'=>'form-control  w-50 ms-5',
                ]
            ])
            ->add('debut_matin',)
           
            ->add('fin_matin')
            ->add('debut_apresMidi',)
            ->add('fin_apresMidi',)

            ->add('is_public',ChoiceType::class,[
                'choices'  => [
                    'toute la journnée' => true,
                    'que le matin' => Null,
                   
                   
                ],
                'attr'=>[
                    'class'=>'form-control  w-50 ms-5',
                ]
                
                ])

             ->add('Valider',SubmitType::class,[
                'attr'=>[
                    'class'=>'form-control  w-50 ms-5 mt-4 bg-warning',
                ]
                
             ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HorairesOuverture::class,
        ]);
    }
}
