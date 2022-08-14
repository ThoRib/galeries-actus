<?php

namespace App\Form;

use App\Entity\Galerie;
use App\Entity\Evenements;
use App\Entity\TypeEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["label"=>"Titre : ", "required"=>true])
            ->add('date', DateType::class, ["label"=>"Date", "required"=>true])
            ->add('horaire', TextType::class, ["label"=>"Horaires : ", "required"=>true])
            ->add('duration', TextType::class, ["label"=>"Durée : ", "required"=>false])
            ->remove('illustration')
            ->add('description', TextareaType::class, ["label"=>"Description : ","required"=>false])
            ->add('type' , EntityType::class, ["class"=>TypeEvenement::class, "label"=>"Type d'evenement"])
            ->add('galerie', EntityType::class, ["class"=>Galerie::class, "label"=>"Galerie"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
