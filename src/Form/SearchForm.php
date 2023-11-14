<?php


namespace App\Form;

use App\Data\SearchData;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SearchForm extends AbstractType

{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder

            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                   'placeholder' => ' rechercher...',
                   'class'=>'form-control'
                ]
            ])

            ->add('Category',EntityType::class,[
                'label'=>false,
                'required'=> false,
                'class'=>Categories::class,
                'expanded'=>true,
                'multiple'=>true,
                        
            ])

            ->add('pmin',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    
                        'placeholder'=>'Prix min €', 
                
                        'class'=>'form-control',
                ]
            
            ])

            ->add('pmax',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'Prix max €', 
                    'class'=>'form-control',
                ]
            
            ])

            ->add('kmin',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>' min k/m', 
                    'class'=>'form-control',
                ]
            
            ])

            ->add('kmax',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>' max k/m', 
                    'class'=>'form-control',
                ]
            
            ])

            ->add('amin',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'Année min',
                    'class'=>'form-control',

                ]
            
            ])

            ->add('amax',NumberType::class,[
                'label'=>false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'Année max' ,
                    'class'=>'form-control',
                ]
            
            ])

            ->add('promo',CheckboxType::class,[
                'label'=>'En Promotion...',
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'Prix minumum  €', 
                   
                ]
            
            ]);
    
    }







    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            ' csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
