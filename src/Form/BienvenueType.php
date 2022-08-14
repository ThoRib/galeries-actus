<?php

namespace App\Form;

use App\Entity\Bienvenue;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BienvenueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('annonce', TextType::class, ["label"=>"Annonce d'accueil : ", "required"=>true])
            ->add('details', TextType::class, ["label"=>"Sous-titre : ", "required"=>false])
            ->add('about', CKEditorType::class, ["label"=>"Presentation Générale : ", "required"=>false, "config"=>["toolbar"=>"standard", "language"=>"fr", "uiColor"=>"#ffc075" ]])
            ->remove('illustration')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bienvenue::class,
        ]);
    }
}
