<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content',TextareaType::class,[
                     'attr'=>[
                        'class'=>'form-control w-100 text-dark',
                        'label'=>'poster ',
                     ],
                     'label'=>'Commentaire ',

                    
            ])

        

            ->add('submit',SubmitType::class,[
                'attr'=>[
                    'class'=>'form-control  bg-warning w-25 mt-2',
                    
                ],
                'label'=>'  poster',
            ]);
        }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
            'attr'=>[
                'class'=>'form-control w-100 bg-dark',
            ]
        ]);
    }
}
