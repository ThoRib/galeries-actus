<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Artiste;
use App\Entity\Galerie;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["label"=>"Nom","required"=>true])
            ->add('prenom', TextType::class, ["label"=>"Prenom","required"=>false])
            ->add('pseudo', TextType::class, ["label"=>"Pseudo","required"=>false])
            ->add('presentation', CKEditorType::class, ["label"=>"Presentation", "required"=>false, "config"=>["toolbar"=>"standard", "language"=>"fr", "uiColor"=>"#75d8ff" ]])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->add('oeuvres', EntityType::class, ["class"=>Oeuvre::class, "label"=>"Oeuvres", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
            ->add('galeries', EntityType::class, ["class"=>Galerie::class, "label"=>"Espace(s) associés", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
