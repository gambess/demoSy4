<?php

namespace App\Form;

use App\Entity\Vivienda;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ViviendaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('personas')
            ->add('altura')
            ->add('latitud')
            ->add('longitud')
            ->add('descripcion')
            ->add('localidad')
            ->add('propietario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vivienda::class,
        ]);
    }
}
