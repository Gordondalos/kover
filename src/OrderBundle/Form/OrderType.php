<?php

namespace OrderBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class OrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateCreated', DateTimeType::class)
            ->add('dateFinish', DateTimeType::class)

            ->add('status', EntityType::class , array(
	            'class' => 'ClientsOrderStatusBundle:ClientsOrderStatus',
	            'choice_label' => 'title',
            ))
            ->add('products')
            ->add('price_total')
            ->add('client')
            ->add('clientAdress')
            ->add('man_created')
            ->add('man_doit')
	        ->add('description')

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OrderBundle\Entity\Order'
        ));
    }
}
