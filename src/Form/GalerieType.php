<?php

namespace App\Form;

use App\Entity\Galerie;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class GalerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["label"=>"Nom","required"=>true])
            ->add('adresse', TextType::class, ["label"=>"Adresse","required"=>true])
            ->add('complementAdresse', TextType::class, ["label"=>"Complément", "required"=>false])
            ->add('telFixe', TelType::class, ["label"=>"Tél. fixe", "required"=>false])
            ->add('telMobile', TelType::class, ["label"=>"Tél. Mobile", "required"=>false])
            ->add('email', EmailType::class, ["label"=>"Email", "required"=>false])
            ->add('presentation', CKEditorType::class, ["label"=>"Presentation", "required"=>false, "config"=>["toolbar"=>"standard", "language"=>"fr", "uiColor"=>"#ffc075" ]])
            ->add('website', UrlType::class, ["label"=>"Site Web", "required"=>false] )
            ->add('horaires', TextType::class, ["label"=>"Horaires", "required"=>false])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->remove('dateCreation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Galerie::class,
        ]);
    }
}
