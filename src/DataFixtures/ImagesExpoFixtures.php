<?php

namespace App\DataFixtures;

use App\Entity\ImagesExpo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesExpoFixtures extends Fixture
{

// ~~~~~~~~~~~~~~ PROPRIETES ~~~~~~~~~~~~~ //

    public const IMG1 = "000_322Y6LM-1-1024x675.jpg";
    public const IMG2 = "1582283547_cover.jpg";
    public const IMG3 = "744991-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg";
    public const IMG4 = "744951-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg";
    public const IMG5 = "48284307882_e88ca6f22d_b.jpg";

// ~~~~~~~~~~~~~~~ METHODES ~~~~~~~~~~~~~~ //

    public function load(ObjectManager $manager): void
    {
        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('exposition numérique immersive');
        $imgExpo->setImageName('000_322Y6LM-1-1024x675.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG1,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('exposition numérique immersive');
        $imgExpo->setImageName('1582283547_cover.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG2,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('reclamer la terre au palais de tokyo');
        $imgExpo->setImageName('744991-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG3,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('reclamer la terre au palais de tokyo');
        $imgExpo->setImageName('744951-saison-reclamer-la-terre-au-palais-de-tokyo-nos-photos.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG4,$imgExpo);

        $imgExpo = new ImagesExpo();
        $imgExpo->setTitre('les arbres');
        $imgExpo->setImageName('48284307882_e88ca6f22d_b.jpg');
        $manager->persist($imgExpo);
        $this->addReference(self::IMG5,$imgExpo);

        $manager->flush();
    }
}
