<?php

namespace App\Form;


use App\Entity\Product;
use App\Entity\Categories;
use App\Entity\ContactAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName' ,TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-75  ms-5',
                   
                    'minlength'=>'3',
                    'maxlength'=>'50',
                ],
               
                'label'=> 'Prénom',
                'label_attr'=>[
                    'class'=>'form-label  w-75 ms-5',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 2 , 'max'=>50]),
                 new NotBlank(),
                ]
            ])

            
            ->add('lastName',TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-75  ms-5',
                    'minlength'=>'3',
                    'maxlength'=>'50',
                ],
                'label'=> 'Nom',
                'label_attr'=>[
                    'class'=>'form-label  ms-5',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 2 , 'max'=>50]),
                 new NotBlank(),
                ]
            ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class'=>'form-control w-75  ms-5',
                ],

                'label'=>'Email',
                'label_attr'=>[
                    'class'=>'form-label  ms-5',
                ],

                'constraints'=>[
                    new Assert\Length(['min' => 8 , 'max'=>50]),
                    new NotBlank(),
                   ]
            ])
            ->add('telephone', NumberType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-5',
                ],

                'label'=>'Numero de téléphone',
                'label_attr'=>[
                    'class'=>'form-label  ms-5',
                ],
                'constraints'=>[
                    new Assert\Length(['min' => 10 , 'max'=>11]),
                    new NotBlank(),
                   ]
            ])
            ->add('sujet',TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-75  ms-5',
                    'minlength'=>'2',
                    'maxlength'=>'50',
                ],
                'label'=> 'Sujet',
                'label_attr'=>[
                    'class'=>'form-label ms-5',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 5 , 'max'=>250]),
                 new NotBlank(),
                ]
                ])


            ->add('message',TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-5',
                    'minlength'=>'2',
                    'maxlength'=>'50',
                ],
                'label'=> 'Message',
                'label_attr'=>[
                    'class'=>'form-label  ms-5 ',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 5 , 'max'=>250]),
                 new NotBlank(),
                ]
                ])

            ->add('nameAnnonce')
               
            ->add('send', SubmitType::class, [
                'attr'=>[
                    'class'=>'form-control  w-25  bg-warning ms-5',
                ]
                ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactAnnonce::class,
        ]);
    }
}
