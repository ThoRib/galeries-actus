<?php

namespace App\DataFixtures;

use App\Entity\Oeuvre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OeuvreFixtures extends Fixture implements DependentFixtureInterface
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

public const X1 = "green-square-1.jpg";
public const X2 = "design.svg";
public const Y1 = "roses-1.jpg";
public const Y2 = "vagues-6.jpg";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Carrés verts n°1");
        $oeuvre->setImageName("green-square-1.jpg");
        $oeuvre->setActif(true);
        $oeuvre->addMedia($this->getReference(MediaFixtures::PEINTURE));
        $manager->persist($oeuvre);
        $this->addReference(self::X1, $oeuvre);
        
        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Design");
        $oeuvre->setImageName("design.svg");
        $oeuvre->setActif(true);
        $oeuvre->addMedia($this->getReference(MediaFixtures::PEINTURE));
        $manager->persist($oeuvre);
        $this->addReference(self::X2, $oeuvre);

        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Monochrome rose n°1");
        $oeuvre->setImageName("roses-1.jpg");
        $oeuvre->setActif(true);
        $oeuvre->addMedia($this->getReference(MediaFixtures::PEINTURE));
        $manager->persist($oeuvre);
        $this->addReference(self::Y1, $oeuvre);

        $oeuvre = new Oeuvre();
        $oeuvre->setTitre("Suite d'ondes n°4");
        $oeuvre->setImageName("ondes-4.jpg");
        $oeuvre->setActif(true);
        $oeuvre->addMedia($this->getReference(MediaFixtures::PEINTURE));
        $manager->persist($oeuvre);
        $this->addReference(self::Y2, $oeuvre);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [MediaFixtures::class];
    }
}
