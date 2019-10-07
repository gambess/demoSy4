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
	    ->add('subsector', EntityType::class, [
                'class' => Subsector::class,
                'choice_label' => 'nombre',
            ])
            ->add('altura')
            ->add('latitud')
            ->add('longitud')
            ->add('prioridad')
	    ->add('motivo')
	    ->add('personas')
            ->add('casas')
            ->add('pararrayos')
            ->add('alumbradoPublico')
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
