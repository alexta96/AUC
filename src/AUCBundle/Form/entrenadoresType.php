<?php

namespace AUCBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class entrenadoresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nombre')
                ->add('titulaciones')
                ->add('apellidos')
                ->add('telefono1')
                ->add('equipo', EntityType::class, array(
                // query choices from this entity
                'class' => 'AUCBundle:equipos',
                // use the User.username property as the visible option string
                'choice_label' => 'nombre'))
                ->add('Crear', SubmitType::class);;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AUCBundle\Entity\entrenadores'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'aucbundle_entrenadores';
    }


}
