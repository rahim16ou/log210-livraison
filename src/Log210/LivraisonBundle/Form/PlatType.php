<?php

namespace Log210\LivraisonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description',null,array('attr' => array('class'=>'description'),'required' => false))
            ->add('prix','money',array('precision'=>2,))
            ->add('menu','reference',array('type'=>'Log210LivraisonBundle:menu'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Log210\LivraisonBundle\Entity\Plat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'log210_livraisonbundle_plat';
    }
}
