<?php

namespace App\Form;

use App\Entity\Exposition;
use App\Entity\Galerie;
use App\Entity\ImagesExpo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ExpositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["label"=>"Titre","required"=>true])
            ->add('sousTitre', TextType::class, ["label"=>"Sous titre","required"=>false])
            ->add('dateDebut', DateType::class, ["format"=>"dd-MM-yyyy"])
            ->add('dateFin', DateType::class, ["format"=>"dd-MM-yyyy"])
            ->add('galerie', EntityType::class, ["class"=>Galerie::class, "label"=>"Espace"])
            ->add('presentation', TextareaType::class, ["label"=>"Présentation","required"=>false])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->add('imageFile', FileType::class, [
                "label"=>"Image de couverture",
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
            ->add('imagesExpo', EntityType::class, ["class"=>ImagesExpo::class, "label"=> "Illustrations du détail de l'expo : ", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
            ->remove('imageName')
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exposition::class,
        ]);
    }
}
