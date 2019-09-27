<?php

namespace App\Form;

use App\Entity\Subsector;
use App\Entity\Sector;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SubsectorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('latitud')
            ->add('longitud')
            ->add('altura')
            ->add('sector', EntityType::class, [
            'class' => Sector::class,
            'choice_label' => 'nombre',
            ])
            ->add('descripcion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subsector::class,
        ]);
    }
}
