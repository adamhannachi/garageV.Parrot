<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class'=>'form-control w-75',
                ],

                'constraints'=>[
                    new Assert\Length(['min' => 5 , 'max'=>250]),
                ]
            ])
            
            ->add(
                'roles', ChoiceType::class, [
                    'attr'=>[
                        'class'=>'form-control w-75',
                        'label'=>'Roles'
                    ],
                    'choices' => ['ROLE_ADMIN'=>'ROLE_ADMIN' ,'ROLE_USER'=>'ROLE_USER','SUPER_ADMIN'=>'SUPER_ADMIN'],
                    'expanded' => true,
                    'multiple' => true,
                ],
            )

           
        
           
            ->add('firstName', TextType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75',
                ],

                'label'=>'Prénom',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                   
                   ]
            ])


            ->add('lastName',TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-75',
                ],
                'label'=>'Nome de famille',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                  
                   ]

            ])
            ->add('adresse',TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-75',
                ],

                'label'=>'Adresse ',

               
            ])
            ->add('numeroTelephone',NumberType::class,[
                'attr'=>[
                    'class'=>'form-control w-75',
                ],

                'label'=>'Numero de Téléphone',

               
            ])


            ->add('numeroPersonnel', NumberType::class,[
                'attr'=>[
                    'class'=>'form-control w-75',
                ],

                'label'=>'Code de personnel',

               
            ])


            ->add('password', PasswordType::class, [
               
                'attr'=>[
                    'class'=>'form-control w-75 ',
                ],
            ])
        


            ->add('imageFile',VichImageType::class,[
                
                'attr' =>[
                    'class'=> 'form-label mt-3 w-75'
                ]
            ])
            
            ->add('submit',SubmitType::class, [
               
                'attr'=>[
                    'class'=>'btn btn-warning w-75 m-4 bg-warning  ',
                ],
                'label'=>'enregistrer '
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
