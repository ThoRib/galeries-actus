<?php

namespace App\Form;

use App\Entity\Exposition;
use App\Entity\ImagesExpo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ImagesExpoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ["label"=>"Titre","required"=>true])
            ->add('description', TextareaType::class, ["label"=>"Description", "required"=>false])
            ->add('expositions', EntityType::class, ["class"=>Exposition::class, "label"=>"Exposition(s) associée(s)", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
            ->add('imageFile', FileType::class, [
                "label"=>"Image :",
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
                        "mimeTypesMessage" => "Les formats d'images acceptés sont gif, jpeg, png, tiff, webp, svf"
                    ])
                ]
               ])
            ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ImagesExpo::class,
        ]);
    }
}
