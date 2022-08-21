<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Galerie;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('presentation', CKEditorType::class, ["label"=>"Presentation", "required"=>false, "config"=>["toolbar"=>"standard", "language"=>"fr", "uiColor"=>"#75d8ff" ]])
            ->add('horaires', TextType::class, ["label"=>"Horaires", "required"=>false])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->add('imageFile', FileType::class, [
                "label"=>"Image d'illustration' :",
                "required"=>false,
                "constraints" => [
                    new File([
                        "maxSize" => "1000k",
                        "mimeTypes" => [
                            "image/gif",
                            "image/jpeg",
                            "image/png",
                            "image/tiff",
                            "image/webp",
                            "image/svg+xml"
                        ],
                        "mimeTypesMessage" => "Les formats d'images acceptés sont gif, jpeg, png, tiff, webp, svg"
                    ])
                ]
            ])
            ->add('artistes', EntityType::class, ["class"=>Artiste::class, "label"=>"Artistes associés", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
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
