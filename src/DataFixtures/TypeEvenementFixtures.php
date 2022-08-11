<?php

namespace App\DataFixtures;

use App\Entity\TypeEvenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeEvenementFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //

    public const PERFORMANCE = "performance";
    public const CONCERT = "concert";
    public const LECTURE = "lecture";
    public const VERNISSAGE = "vernissage";

// ====================================================== //
// ====================== METHODES ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $typeEvenement = new TypeEvenement();
        $typeEvenement->setType('performance');
        $typeEvenement->setDescription("Une performance est une œuvre d'art ou un échantillon artistique créé par des actions menées par l'artiste ou d'autres participants, et peut être en direct, documenté, spontané ou écrit, présenté à un public un contexte de beaux-arts, traditionnellement interdisciplinaire. En d'autres mots, c'est une présentation artistique située, orientée vers l'action et éphémère d'un artiste ou d'un groupe de performance. Cette forme d'art remet en question la séparabilité de l'artiste et de l'œuvre ainsi que la forme marchande des œuvres d'art traditionnelles. La performance, également connue sous le nom de 'action artistique' , a été développée au fil des ans comme un genre à part entière dans lequel l'art est présenté en direct, ayant un rôle important et fondamental dans l'art d'avant-garde tout au long du XXe siècle. ");
        $typeEvenement->setSource("https://fr.wikipedia.org/wiki/Performance_(art)");
        $manager->persist($typeEvenement);
        $this->addReference(self::PERFORMANCE, $typeEvenement);
        
        $typeEvenement = new TypeEvenement();
        $typeEvenement->setType('concert');
        $manager->persist($typeEvenement);
        $this->addReference(self::CONCERT, $typeEvenement);

        $typeEvenement = new TypeEvenement();
        $typeEvenement->setType('lecture');
        $manager->persist($typeEvenement);
        $this->addReference(self::LECTURE, $typeEvenement);

        $typeEvenement = new TypeEvenement();
        $typeEvenement->setType('vernissage');
        $manager->persist($typeEvenement);
        $this->addReference(self::VERNISSAGE, $typeEvenement);

        $manager->flush();
    }
}
