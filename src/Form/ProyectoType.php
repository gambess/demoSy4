<?php

namespace App\Form;

use App\Entity\Proyecto;
use App\Entity\Localidad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProyectoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('localidad', EntityType::class, [
                'class' => Localidad::class,
                'choice_label' => 'nombre',
            ])
            ->add('nombre')
            ->add('codigoBip')
            ->add('tipologiaAccion',TextareaType::class)
            ->add('justificacion',TextareaType::class)
            ->add('descripcion',TextareaType::class)
            ->add('programa',TextareaType::class)
            ->add('beneficiariosDirectos')
            ->add('beneficiariosIndirectos')
            ->add('estimadoViviendas')
            ->add('fecha')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proyecto::class,
        ]);
    }
}
