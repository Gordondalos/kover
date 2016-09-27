<?php

namespace ProductBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('properties')
            ->add('description')
            ->add('title')
            ->add('photoProduct')
	        ->add('category', EntityType::class , array(
		        'class' => 'CategoryBundle\Entity\Category',
		        'choice_label' => 'title',
	        ))
	        ->add('producer', EntityType::class , array(
		        'class' => 'ProducerBundle\Entity\Producer',
		        'choice_label' => 'title',
	        ))

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductBundle\Entity\Product'
        ));
    }
}
