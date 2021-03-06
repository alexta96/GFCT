<?php

namespace GfctBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class ProfesoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    //Funcion "build" que se encarga de hacer el formulario mediante los campos de nuestra BD
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('departamento')
            ->add('Crear',SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GfctBundle\Entity\Profesores'
        ));
    }
}
