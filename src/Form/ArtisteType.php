<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Oeuvre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["label"=>"Nom","required"=>true])
            ->add('prenom', TextType::class, ["label"=>"Prenom","required"=>false])
            ->add('pseudo', TextType::class, ["label"=>"Pseudo","required"=>false])
            ->add('presentation', TextareaType::class, ["label"=>"presentation","required"=>false])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->add('oeuvres', EntityType::class, ["class"=>Oeuvre::class, "label"=>"Oeuvres", "multiple"=>true, "by_reference"=>false, "required"=>false])
            ->add('galerie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
