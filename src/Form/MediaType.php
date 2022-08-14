<?php

namespace App\Form;

use App\Entity\Media;
use App\Entity\Oeuvre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ["label"=>"Media","required"=>true])
            ->add('description', TextareaType::class, ["label"=>"Description", "required"=>false])
            ->add('source', TextType::class, ["label"=>"Source de la description : ", "required"=>false])
            ->add('actif', CheckboxType::class, ["label"=>"Visible", "required"=>false])
            ->add('oeuvres', EntityType::class, ["class"=>Oeuvre::class, "label"=>"Oeuvres", "multiple"=>true, "expanded"=>true, "by_reference"=>false, "required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
