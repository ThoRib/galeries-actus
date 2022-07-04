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

    public const GAIETE_LYRIQUE = "La Gaieté Lyrique";
    public const PALAIS_DE_TOKYO = "Le Palais de Tokyo";
    public const FONDATION_CARTIER = "La Fondation Cartier";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $galerie = new Galerie();
        $galerie->setNom("La Gaîté Lyrique");
        $galerie->setAdresse("3bis rue Papin");
        $galerie->setTelFixe("01 53 01 52 00");
        $galerie->setEmail("contact@gaite-lyrique.net");
        $galerie->setPresentation("La Gaîté Lyrique est un établissement culturel de la Ville de Paris qui met en lumière les cultures post-Internet . Ces pratiques artistiques, nées et transformées par Internet , sont ici exposées, mais aussi imaginées, fabriquées, expérimentées et transmises. Espace de découverte pour comprendre notre époque virtualisée, c’est aussi un lieu de fête , de créativité et de partage.");
        $galerie->setWebsite("gaite-lyrique.net");
        $galerie->setHoraires("Ouverture du mardi au vendredi de 14h00 à 20h00 et de 12h00 à 19h00 samedi et dimanche");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $manager->persist($galerie);
        $this->addReference(self::GAIETE_LYRIQUE, $galerie);

        $galerie = new Galerie();
        $galerie->setNom("Le Palais de Tokyo");
        $galerie->setAdresse("13 Av. du Président Wilson");
        $galerie->setTelFixe("01 81 69 77 51");
        $galerie->setEmail("accueil@palaisdetokyo.com");
        $galerie->setPresentation("Ancré dans le présent et tourné vers l’avenir, le Palais de Tokyo est également riche d’une histoire passionnante, qui invite à un voyage à travers la création artistique. Devenu en 2012 le plus grand centre d’art contemporain d’Europe suite à la réhabilitation de l’ensemble de ses espaces, le Palais de Tokyo invite à explorer l’émergence et à rencontrer les créateurs de notre temps, là même où furent exposés certains des plus grands artistes du siècle passé.");
        $galerie->setWebsite("palaisdetokyo.com");
        $galerie->setHoraires("Tous les jours sauf le mardi, de midi à minuit");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $manager->persist($galerie);
        $this->addReference(self::PALAIS_DE_TOKYO, $galerie);

        $galerie = new Galerie();
        $galerie->setNom("La Fondation Cartier");
        $galerie->setAdresse("261 Bd Raspail");
        $galerie->setTelFixe("01 42 18 56 50");
        $galerie->setEmail("info.reservation@fondation.cartier.com");
        $galerie->setPresentation("À la fois espace de création pour les artistes et lieu de rencontres entre l’art et le grand public, la Fondation Cartier pour l’art contemporain a pour vocation de favoriser la création contemporaine et d’en diffuser la connaissance. Chaque année, la Fondation Cartier programme des expositions thématiques ou personnelles et passe alors commande aux artistes, enrichissant ainsi une importante Collection. Elle organise aussi les Soirées Nomades, rendez-vous avec les arts de la scène où les artistes créent des liens entre les arts plastiques et d’autres modes d’expression de la création contemporaine. En s’exportant régulièrement dans les institutions étrangères, les expositions et la Collection confèrent à la Fondation Cartier sa dimension internationale.");
        $galerie->setWebsite("fondationcartier.com");
        $galerie->setHoraires("Tous les jours de 11h à 20h sauf le lundi. Nocturne le mardi, jusqu'à à 22h");
        $galerie->setActif(true);
        $galerie->setDateCreation(\DateTimeImmutable::createFromFormat('d-m-Y', '04-08-2022'));
        $manager->persist($galerie);
        $this->addReference(self::FONDATION_CARTIER, $galerie);

        $manager->flush();
    }
}
