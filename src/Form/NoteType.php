<?php

namespace App\Form;

use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note', ChoiceType::class, [
                'choices'  => [
                    '☆' => '☆ ',
                    '☆☆' => '☆☆ ',
                    '☆☆☆' => '☆☆☆',
                    '☆☆☆☆' => '☆☆☆☆',
                    '☆☆☆☆☆' => '☆☆☆☆☆ ',
                ],
                'attr'=>[
                    'class'=>'form-control  w-75 ms-5   ',
                    'placeholder' => 'étoile'
                
                ],
                
              
            
              
            ])

            ->add('Prenom',TextType::class,[
                'attr'=>[
                    'class'=>'form-control  w-100  ms-5',
                    'placeholder' => 'Nom'
                
            ],

              
        ])


        
        ->add('submit', SubmitType::class, [
            'attr'=>[
                'class'=>'form-control  w-75  bg-warning ms-5 mt-4 mb-2',
                
            ],
            'label'=>'Poster '
            
               
            ]);
            

           
          

        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,

           
        ]);
    }
}
