<?php

namespace App\DataFixtures;

use App\Entity\Evenements;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EvenementsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $evenement = new Evenements();
        $evenement->setTitre("Performance picturale");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y','22-11-2023'));
        $evenement->setHoraire("17h00");
        $evenement->setSousTitre(("Performance de l'artiste XXX"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::PERFORMANCE));
        $evenement->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        $evenement->setActif(true);
        $manager->persist($evenement);

        $evenement = new Evenements();
        $evenement->setTitre("Performance vidéo");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y','05-08-2023'));
        $evenement->setHoraire("17h00");
        $evenement->setSousTitre(("Performance de l'artiste YYY"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::PERFORMANCE));
        $evenement->setGalerie($this->getReference(GalerieFixtures::GAIETE_LYRIQUE));
        $evenement->setActif(true);
        $manager->persist($evenement);

        $evenement = new Evenements();
        $evenement->setTitre("Lecture de Poesies");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y','15-01-2023'));
        $evenement->setHoraire("14h00");
        $evenement->setSousTitre(("L'artiste WWW présentera une lecture de ses ouvres poetiques"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::LECTURE));
        $evenement->setGalerie($this->getReference(GalerieFixtures::PALAIS_DE_TOKYO));
        $evenement->setActif(true);
        $manager->persist($evenement);

        $evenement = new Evenements();
        $evenement->setTitre("Vernissage Exposition Abstractions");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y','07-02-2021'));
        $evenement->setHoraire("19h00");
        $evenement->setSousTitre(("Vernissage de l'exposition d'arts abstraits en présence des artistes"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::VERNISSAGE));
        $evenement->setGalerie($this->getReference(GalerieFixtures::GAIETE_LYRIQUE));
        $evenement->setActif(true);
        $manager->persist($evenement);

        $manager->flush();

    }
    public function getDependencies()
    {
        return [TypeEvenementFixtures::class,
                GalerieFixtures::class];
    }
}
