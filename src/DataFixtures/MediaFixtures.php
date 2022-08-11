<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

PUBLIC const PEINTURE = "peinture";
PUBLIC const SCULPTURE = "sculpture";
PUBLIC const PHOTOGRAPHIE = "photographie";
PUBLIC const INSTALLATION = "installation";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $media = new Media();
        $media->setNom("peinture");
        $media->setDescription("La peinture est une forme artistique dont les diverses techniques consistent à appliquer manuellement ou mécaniquement, sur une surface, des couleurs sous forme de pigments mélangés à un liant ou un diluant. Les artistes peintres s'expriment sur des supports tels que la toile, le papier, le bois, etc.
        Ouvrage de représentation ou d'invention, la peinture peut être naturaliste et figurative, ou abstraite. Elle peut avoir un contenu narratif, descriptif, symbolique, spirituel, ou philosophique.");
        $media->setSource("https://fr.wikipedia.org/wiki/Peinture_(art)");
        $media->setActif(true);
        $this->addReference(self::PEINTURE, $media);
        $manager->persist($media);

        $media = new Media();
        $media->setNom("sculpture");
        $media->setDescription("La sculpture est une activité artistique qui consiste à concevoir et réaliser des formes en volume, en relief, soit en ronde-bosse (statuaire), en haut-relief, en bas-relief, par modelage, par taille directe, par soudure ou assemblage. Le terme de sculpture désigne également l'objet résultant de cette activité.
        Le mot sculpture vient étymologiquement du latin « sculpere » qui signifie « tailler » ou « enlever des morceaux à une pierre »1. Cette définition, qui distingue « sculpture » et « modelage », illustre l'importance donnée à la taille de la pierre dans la civilisation romaine. Au Xe siècle, on parle d'« ymagier » et la plupart du temps, le travail du sculpteur est un travail d'équipe avec un maître et des tailleurs de pierre, comme il est traité dans l'art roman et l'architecture romane. Plusieurs équipes travaillent simultanément sur les grands chantiers des cathédrales. ");
        $media->setSource("https://fr.wikipedia.org/wiki/Sculpture");
        $media->setActif(true);
        $this->addReference(self::SCULPTURE, $media);
        $manager->persist($media);

        $media = new Media();
        $media->setNom("photographie");
        $media->setDescription("La photographie est l'ensemble des techniques, des procédés et des matériels qui permettent d'enregistrer un sujet en image fixe.
        Le terme « photographie » désigne aussi l'image obtenue, phototype1 (photographie visible et stable qu'elle soit négative ou positive, qu'on obtient après l'exposition et le traitement d'une couche sensible) ou non.
        Le terme désigne également la branche des arts graphiques qui utilise cette technique. ");
        $media->setSource("https://fr.wikipedia.org/wiki/Photographie");
        $media->setActif(true);
        $this->addReference(self::PHOTOGRAPHIE, $media);
        $manager->persist($media);

        $media = new Media();
        $media->setNom("installation");
        $media->setDescription("Une installation artistique est une œuvre d'art visuel en trois dimensions, souvent créée pour un lieu spécifique (in situ) et conçue pour modifier la perception de l'espace. Le terme « installation » apparu dans les années 1970 s'applique généralement à des œuvres créées pour des espaces intérieurs (galerie, musée) ; les œuvres en extérieur sont plus souvent désignées comme art public, land art ou intervention artistique. ");
        $media->setSource("https://fr.wikipedia.org/wiki/Installation_(art)");
        $media->setActif(true);
        $this->addReference(self::INSTALLATION, $media);
        $manager->persist($media);

        $manager->flush();
    }
}
