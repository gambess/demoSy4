<?php

namespace App\Form;

use App\Entity\Casa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CasaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('personas')
            ->add('longitud')
            ->add('latitud')
            ->add('altura')
            ->add('localidad')
            ->add('subsector')
            ->add('sector')
            ->add('propietario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Casa::class,
        ]);
    }
}
