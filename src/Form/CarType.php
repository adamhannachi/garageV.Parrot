<?php

namespace App\Form;


use App\Entity\Product;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                    'minlength'=>'2',
                    'maxlength'=>'255',
                ],
                'label'=> 'Mdel',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 2 , 'max'=>50]),
                 new NotBlank(),
                ]
            ])


            ->add('price',MoneyType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                   
                ],
                'label'=> 'Prix',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new Assert\Positive(),
                 new NotBlank(),
                ]
            ])
            ->add('kilometrage',IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                   
                ],
                'label'=> 'Kilométrage',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new NotBlank(),
                ]
                ])

            ->add('years',IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control w-100',
                ],
                'label'=> 'Année',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new NotBlank(),
                ],
                ])

                ->add('nombre_de_place',IntegerType::class,[
                    'attr'=>[
                        'class'=>'form-control w-100',
                    ],
                    'label'=> 'Nombre de place ',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                ])
                  
                ->add('huile',ChoiceType::class,[

                    'choices'  => [
                        'Essence' => 'Essence',
                        'diesel' => 'diesel',
                        ' Electrique'=>' Electrique'
                       
                    ],
                    'attr'=>[
                        'class'=>'form-control w-100',
                    ],
                    'label'=> 'Huile',
                    'label_attr'=>[
                        'class'=>'form-label mt-4',
                    ],
                ])
                ->add('boite_de_vitesses',ChoiceType::class,[
                    'choices'  => [
                        'boîte manuelle' => 'boîte manuelle',
                        'boîte auto' =>  'boîte auto',
                        'boite 5' =>  'boite 5',
                        'boite 6' =>  'boite 5'
                    ],
                    'attr'=>[
                        'class'=>'form-control w-100',
                    ],
                    'label'=> 'Boite de vitesses',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                ])
                

            ->add('description',TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlength'=>'2',
                    'maxlength'=>'255',
                ],
                'label'=> 'Caractéristique',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 5 , 'max'=>250]),
                 new NotBlank(),
                ]
            ])

            ->add('content',TextType::class,[
                'attr'=>[
                    'class'=>'form-control ',
                    'minlength'=>'2',
                    'maxlength'=>'255',
                ],
                'label'=> 'Content',
                'label_attr'=>[
                    'class'=>'form-label mt-4',
                ],

                'constraints'=>[
                 new Assert\Length(['min' => 5 , 'max'=>250]),
                 new NotBlank(),
                ]
            ])

            ->add('numero_telephone',IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control w-25',
                ],
                'label'=> 'Numéro de téléphone ',
            'label_attr'=>[
                'class'=>'form-label mt-4',
            ],

            ])
          
            ->add('promo',ChoiceType::class, [
                'attr'=>[
                    'class'=>'form-control w-25',
                ],
                'choices'  => [
                    'Yes' => 1,
                    'No' => 0,
                ],
            ])
            ->add('imageFile', VichFileType::class, [
                'attr'=>[
                    'class'=>'form-control w-25',
                ]
                ])
         
          
    
                ->add('category',EntityType::class,[
                    'label'=>false,
                    'required'=> false,
                    'class'=>Categories::class,
                    'expanded'=>true,
                    'multiple'=>true,
                    'attr'=>[
                        'class'=>'form-control w-100 bg-warning',
                    ],
                    'label'=>'Marque de la voiture',
                    
                   
                
                ])

            ->add('submit',SubmitType::class, [
               
                'attr'=>[
                    'class'=>'btn btn-warning w-25 m-4 bg-warning  ',
                ],
                'label'=>'enregistrer '
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
