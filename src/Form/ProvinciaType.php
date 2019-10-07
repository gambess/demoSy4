<?php

namespace App\Form;

use App\Entity\Provincia;
use App\Entity\Region;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ProvinciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
	    ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'nombre',
            ])
            ->add('altura')
            ->add('latitud')
            ->add('longitud')
            ->add('descripcion')    
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Provincia::class,
        ]);
    }
}
