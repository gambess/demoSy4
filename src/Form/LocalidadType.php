<?php

namespace App\Form;

use App\Entity\Localidad;
use App\Entity\Subsector;
use App\Entity\Sector;
use App\Entity\Comuna;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LocalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('altura')
            ->add('sector', EntityType::class, [
                'class' => Sector::class,
                'choice_label' => 'nombre',
            ])
            ->add('subsector', EntityType::class, [
                'class' => Subsector::class,
                'choice_label' => 'nombre',
            ])
            ->add('comuna', EntityType::class, [
                'class' => Comuna::class,
                'choice_label' => 'nombre',
            ])
            ->add('personas')
            ->add('casas')
            ->add('pararrayos')
            ->add('prioridad')
            ->add('alumbradoPublico')
            ->add('motivo')
            ->add('descripcion')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Localidad::class,
        ]);
    }
}
