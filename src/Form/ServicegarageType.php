<?php

namespace App\Form;

use App\Entity\ServiceGarage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ServicegarageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            ->add('Description',TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-2',

                
                   ],
            ])
           
            ->add('servicereparation',TextType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-2 md-2',
                          
                       ],
                ])
            ->add('tarifs',IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-2',
                          
                       ],
            ])
            ->add('telephone',IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control  w-75  ms-2',
                          
                       ],
            ])

            ->add('imageFile',  VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => '...',
                'download_label' => '...',
                'download_uri' => true,
                'image_uri' => true,
              
                'asset_helper' => true,
            ])

            ->add('Valider', SubmitType::class,[
                'attr'=>[
                    'class'=>'form-control  w-25  ms-2 mt-3 bg-primary',
                          
                       ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ServiceGarage::class,
        ]);
    }
}
