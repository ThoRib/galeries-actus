<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArtisteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $artiste = new Artiste();
        $artiste->setNom("xxxxx");
        $artiste->setPrenom("xxxx");
        $artiste->setPresentation("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer eget aliquet nibh praesent tristique magna sit amet. Id diam vel quam elementum pulvinar etiam non quam lacus. Scelerisque in dictum non consectetur a erat. Aenean sed adipiscing diam donec.");
        $artiste->setActif(true);
        $artiste->getGaleries($this->getReference(GalerieFixtures::ESPACE_1));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::X1));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::X2));
        $manager->persist($artiste);

        $artiste = new Artiste();
        $artiste->setNom("yyyyy");
        $artiste->setPrenom("yyyy");
        $artiste->setPresentation("Ac turpis egestas maecenas pharetra convallis posuere morbi leo. Quisque id diam vel quam elementum. Tristique sollicitudin nibh sit amet commodo nulla facilisi. Tellus mauris a diam maecenas sed enim ut sem viverra. Interdum posuere lorem ipsum dolor. Sed adipiscing diam donec adipiscing tristique risus.");
        $artiste->setActif(true);
        $artiste->getGaleries($this->getReference(GalerieFixtures::ESPACE_2));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::Y1));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::Y2));
        $manager->persist($artiste);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [GalerieFixtures::class,
                OeuvreFixtures::class];
    }
}
