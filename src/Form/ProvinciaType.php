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
            // looks for choices from this entity
            'class' => Region::class,
//            'query_builder' => function (EntityRepository $er) {
//                return $er->createQueryBuilder('pr')
//                    ->orderBy('pr.nombre', 'ASC');
//            },
            // uses the Provincia.nombre property as the visible option string
            'choice_label' => 'nombre',
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Provincia::class,
        ]);
    }
}
