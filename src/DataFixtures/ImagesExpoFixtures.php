<?php

namespace App\DataFixtures;

use App\Entity\ImagesExpo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesExpoFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

    public const SWV = "sound-wave-violet.jpg";
    public const PAY4 = "paysage-4.svg";
    public const RS5 = "roses-5.jpg";
    public const IMM2 = "immeubles-miroir-2.svg";
    public const OND6 = "ondes-6.jpg";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Vague sonore violette');
        $imgExpo->setImageName('sound-wave-violet.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::SWV,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Paysage n°4');
        $imgExpo->setImageName('paysage-4.svg');
        $manager->persist($imgExpo);
        $this->addReference(self::PAY4,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Monochrome Rose n°5');
        $imgExpo->setImageName('roses-5.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::RS5,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Immeubles n°2');
        $imgExpo->setImageName('immeubles-2.svg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMM2,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre("Suite d'ondes n°6");
        $imgExpo->setImageName('ondes-6.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::OND6,$imgExpo);

        $manager->flush();
    }
}
