<?php

namespace App\Form;

use App\Entity\Galerie;
use App\Entity\Evenements;
use App\Entity\TypeEvenement;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["label"=>"Titre : ", "required"=>true])
            ->add('date', DateType::class, ["label"=>"Date","format"=>"dd MM yyyy", "required"=>true])
            ->add('horaire', TextType::class, ["label"=>"Horaires : ", "required"=>true])
            ->remove('illustration')
            ->add('description', CKEditorType::class, ["label"=>"Presentation", "required"=>false, "config"=>["toolbar"=>"standard", "language"=>"fr", "uiColor"=>"#75d8ff" ]])
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
