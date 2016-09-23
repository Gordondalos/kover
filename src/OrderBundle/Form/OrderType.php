<?php

namespace OrderBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('dateCreated', 'datetime')
            ->add('dateFinish', 'datetime')
            ->add('description')
            ->add('status')
            ->add('products')
            ->add('price_total')
            ->add('client')
            ->add('clientAdress')
            ->add('man_created')
            ->add('man_doit')
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
