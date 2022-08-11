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
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y H:i','22-11-2023 18:00'));
        $evenement->setSousTitre(("Performance de l'artiste XXX"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::PERFORMANCE));
        $manager->persist($evenement);

        $evenement = new Evenements();
        $evenement->setTitre("Performance vidéo");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y H:i','05-08-2023 17:00'));
        $evenement->setSousTitre(("Performance de l'artiste YYY"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::PERFORMANCE));
        $manager->persist($evenement);

        $evenement = new Evenements();
        $evenement->setTitre("Lecture de Poesies");
        $evenement->setDate(\DateTime::createFromFormat('d-m-Y H:i','15-01-2023 14:00'));
        $evenement->setSousTitre(("L'artiste WWW présentera une lecture de ses ouvres poetiques"));
        $evenement->setType($this->getReference(TypeEvenementFixtures::LECTURE));
        $manager->persist($evenement);

        $manager->flush();

    }
    public function getDependencies()
    {
        return [TypeEvenementFixtures::class];
    }
}
