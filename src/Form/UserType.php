<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, ["label"=>"Nom d'utilisateur", "required"=>true])
            ->remove('roles')
            ->add('role', ChoiceType::class, ["label"=>"Rôle", "choices"=>["Utilisateur"=>"USER", "Administrateur"=>"ADMIN"], "required"=>true, "mapped"=>false])
            ->remove('password')
            ->add('plainPassword', PasswordType::class, ["label"=>"Mot de passe", "required"=>false, "mapped"=>false])
            ->add('nom', TextType::class, ["label"=>"Nom", "required"=>false])
            ->add('prenom', TextType::class, ["label"=>"Prenom", "required"=>false])
            ->add('email', EmailType::class, ["label"=>"Email", "required"=>false])
            ->remove('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
