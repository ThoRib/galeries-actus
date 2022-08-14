<?php

namespace App\Form;

use App\Entity\TypeEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeEvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', TextType::class, ["label"=>"Type d'evenement : ", "required"=>true])
            ->add('description', TextareaType::class, ["label"=>"Description : ", "required"=>false])
            ->add('source', TextType::class, ["label"=>"Source de la description : ", "required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeEvenement::class,
        ]);
    }
}
