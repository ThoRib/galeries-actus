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

    public const IMG1 = "000_322Y6LM-1-1024x675.jpg";
    public const IMG2 = "1582283547_cover.jpg";
    public const IMG3 = "744991-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg";
    public const IMG4 = "744951-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg";
    public const IMG5 = "48284307882_e88ca6f22d_b.jpg";
    public const IMG6 = "okfaire_corps03_0.jpg";
    public const IMG7 = "XVMfb39eb0e-767d-11e5-b0b0-c31b3ebd6616.jpg";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Floraison numérique');
        $imgExpo->setImageName('000_322Y6LM-1-1024x675.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG1,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Immersion rouge');
        $imgExpo->setImageName('1582283547_cover.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG2,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Vue générale');
        $imgExpo->setImageName('744991-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG3,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Installation');
        $imgExpo->setImageName('744951-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG4,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Arbre immaginaire');
        $imgExpo->setImageName('48284307882_e88ca6f22d_b.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG5,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Lucioles numériques');
        $imgExpo->setImageName('okfaire_corps03_0.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG6,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('Damier 3D');
        $imgExpo->setImageName('XVMfb39eb0e-767d-11e5-b0b0-c31b3ebd6616.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG7,$imgExpo);

        $manager->flush();
    }
}
