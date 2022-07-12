<?php

namespace App\DataFixtures;

use App\Entity\Oeuvre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OeuvreFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

public const KUIN1 = "3d09cdca98fac0ad8569a92d280ae85d.jpg";
public const KUIN2 = "ed39ece943f7838fb5c0c0b2ea096e24.jpg";
public const NOVELLI1 = "bruno-9li-brazil-inkult-1.webp";
public const NOVELLI2 = "img-novelli232644977590.webp";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Les Indiens");
        $oeuvre->setImageName("3d09cdca98fac0ad8569a92d280ae85d.jpg");
        $oeuvre->setActif(true);
        $this->addReference(self::KUIN1, $oeuvre);
        $manager->persist($oeuvre);

        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Les serpents et l'oiseaux");
        $oeuvre->setImageName("ed39ece943f7838fb5c0c0b2ea096e24.jpg");
        $oeuvre->setActif(true);
        $this->addReference(self::KUIN2, $oeuvre);
        $manager->persist($oeuvre);

        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Le salut");
        $oeuvre->setImageName("bruno-9li-brazil-inkult-1.webp");
        $oeuvre->setActif(true);
        $this->addReference(self::NOVELLI1, $oeuvre);
        $manager->persist($oeuvre);

        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Paysage psychédélique");
        $oeuvre->setImageName("img-novelli232644977590.webp");
        $oeuvre->setActif(true);
        $this->addReference(self::NOVELLI2, $oeuvre);
        $manager->persist($oeuvre);

        $manager->flush();
    }
}
