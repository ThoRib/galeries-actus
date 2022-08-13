<?php

namespace App\DataFixtures;

use App\Entity\Bienvenue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BienvenueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $bienvenue = new Bienvenue();
        $bienvenue->setAnnonce("Galerie des Espaces Multiples");
        $bienvenue->setAbout("Notre galerie est heureuse de vous accueillir au sein de ses désormais 3 espaces. Les 2 situés à Paris et Marseille nous permettent de vous proposer les plus belles oeuvres de nos artistes, en toute intimiié. Celui situé au coeur de la campagne de Seine et Marne, dans une usine historique, désormais désaffectée et remise en état, nous permettra d'exposer les oeuvres monumentales les plus intenses de notre collection.");
        $bienvenue->setIllustration('highlight-id-x_YGdy5H2MY-unsplash.jpg');
        $bienvenue->setActif(true);
        $manager->persist($bienvenue);

        $manager->flush();
    }
}
