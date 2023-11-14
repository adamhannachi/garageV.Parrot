<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email',EmailType::class,[
            'attr'=>[
                'class'=>'form-control  w-100',
            ]
            ])
          
            ->add('firstName', TextType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                ],

                'label'=>'Prénom',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                    new NotBlank(),
                   ]
            ])

            ->add('lastName', TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                ],

                'label'=>'Nome de famille',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                    new NotBlank(),
                   ]
            ])

            ->add('adresse_postal', TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                ],

                'label'=>'Adresse postal',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                    new NotBlank(),
                   ]
            ])

            ->add('telephone', NumberType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                ],

                'label'=>'Numero de téléphone',

                'constraints'=>[
                    new Assert\Length(['min' => 10 , 'max'=>11]),
                    new NotBlank(),
                   ]
            ])


            ->add('sujet', TextType::class,[

                'attr'=>[
                    'class'=>'form-control w-100',
                ],

                'label'=>'Sujet',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>50]),
                    new NotBlank(),
                   ]

            ])
            ->add('message',TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                ],

                'label'=>'Message',

                'constraints'=>[
                    new Assert\Length(['min' => 2 , 'max'=>150]),
                    new NotBlank(),
                   ]

            ])
            ->add('submit',SubmitType::class, [
               
                'attr'=>[
                    'class'=>'btn btn-warning  my-3 bg-warning  w-50 ',
                ],
                'label'=>'envoyer '
            ]);
                
            
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
