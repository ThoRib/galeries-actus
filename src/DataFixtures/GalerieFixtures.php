<?php

namespace App\DataFixtures;

use App\Entity\Galerie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GalerieFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

    public const ESPACE_1 = "Espace #1";
    public const ESPACE_2 = "Espace #2";
    public const ESPACE_3 = "Espace #3";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $galerie = new Galerie();
        $galerie->setNom("Espace #1");
        $galerie->setAdresse("rue du premier");
        // $galerie->setTelFixe("01 53 01 52 00");
        $galerie->setEmail("espace-1@les-multiples.com");
        $galerie->setPresentation("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et egestas quis ipsum suspendisse ultrices gravida dictum. Neque vitae tempus quam pellentesque nec nam aliquam sem et. Amet porttitor eget dolor morbi non arcu risus. Justo eget magna fermentum iaculis eu non diam phasellus vestibulum. In hac habitasse platea dictumst quisque sagittis. Egestas diam in arcu cursus. Aliquam id diam maecenas ultricies. Imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Egestas purus viverra accumsan in nisl nisi scelerisque.");
        // $galerie->setWebsite("gaite-lyrique.net");
        $galerie->setHoraires("Tous les jours de 11h00 à 21h00 sauf le lundi");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $galerie->setImageName('espace-mauve.svg');
        $manager->persist($galerie);
        $this->addReference(self::ESPACE_1, $galerie);

        $galerie = new Galerie();
        $galerie->setNom("Espace #2");
        $galerie->setAdresse("rue du deuxième");
        // $galerie->setTelFixe("01 81 69 77 51");
        $galerie->setEmail("espace-2@les-multiples.com");
        $galerie->setPresentation("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Magna fringilla urna porttitor rhoncus dolor purus. Gravida rutrum quisque non tellus orci ac auctor. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. In metus vulputate eu scelerisque felis imperdiet proin. Pharetra convallis posuere morbi leo urna molestie. Fringilla ut morbi tincidunt augue. At augue eget arcu dictum. Cursus sit amet dictum sit amet justo. Quis enim lobortis scelerisque fermentum dui faucibus in. Ipsum faucibus vitae aliquet nec. Integer vitae justo eget magna fermentum iaculis eu.");
        // $galerie->setWebsite("palaisdetokyo.com");
        $galerie->setHoraires("Tous les jours sauf le lundi, de midi à minuit");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $galerie->setImageName('espace-bleu.svg');
        $manager->persist($galerie);
        $this->addReference(self::ESPACE_2, $galerie);

        $galerie = new Galerie();
        $galerie->setNom("Espace #3");
        $galerie->setAdresse("rue du troisième");
        // $galerie->setTelFixe("01 42 18 56 50");
        $galerie->setEmail("espace-3@les-multiples.com");
        $galerie->setPresentation("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt arcu non sodales neque. Proin libero nunc consequat interdum varius. Arcu vitae elementum curabitur vitae nunc. Lectus sit amet est placerat in egestas erat imperdiet. Sed tempus urna et pharetra pharetra. Nulla facilisi cras fermentum odio eu feugiat. Ornare quam viverra orci sagittis eu volutpat odio. Nulla malesuada pellentesque elit eget gravida cum. Elementum sagittis vitae et leo duis ut diam quam nulla.");
        // $galerie->setWebsite("fondationcartier.com");
        $galerie->setHoraires("Tous les jours de 10h à 18h sauf le lundi. Nocturne le mardi, jusqu'à à 22h");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $galerie->setImageName('espace-vert.svg');
        $manager->persist($galerie);
        $this->addReference(self::ESPACE_3, $galerie);

        $manager->flush();
    }
}
