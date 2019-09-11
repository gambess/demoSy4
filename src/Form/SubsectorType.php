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
            ->add('altura')
            ->add('descripcion')
            ->add('sector', EntityType::class, [
            'class' => Sector::class,
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
            'data_class' => Subsector::class,
        ]);
    }
}
