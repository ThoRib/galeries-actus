<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $userPasswordHascherInterface)
    {
        $this->encoder = $userPasswordHascherInterface;        
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $manager->persist($user);
        $user->setEmail('thomas.ribardiere@orange.fr');
        $user->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user, "mdp"));

        $manager->flush();
    }
}
