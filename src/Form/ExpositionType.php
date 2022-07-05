<?php

namespace App\Form;

use App\Entity\Exposition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('sousTitre')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('presentation')
            ->add('actif')
            ->add('imageName')
            ->add('imagesExpo')
            ->add('galerie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exposition::class,
        ]);
    }
}
