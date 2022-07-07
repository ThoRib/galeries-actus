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
        $artiste->setNom("Kuin");
        $artiste->setPrenom("Huni");
        $artiste->setPresentation("Bane est le fils de Ibã Sales, gardien des savoirs et des chants (huni meka) traditionnels du peuple Huni Kuin transmis par son propre père. Sous la conduite d’Ibã, Bane a été le premier, en 2009, à transcrire les chants du rituel de la liane psychotrope Nixi Pae (Banisteriopsis caapi) sous forme de dessins, composant ainsi de véritables partitions chamaniques. Ces chants évoquent Yube, l’anaconda cosmique et chaman primordial, maître du Nixi Pae, et diverses entités « humanimales » de la forêt.");
        $artiste->setActif(true);
        $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::KUIN1));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::KUIN2));
        $manager->persist($artiste);

        $artiste = new Artiste();
        $artiste->setNom("Novelli");
        $artiste->setPrenom("Bruno");
        $artiste->setPresentation("Bruno Novelli est un peintre brésilien, formé au design graphique et très inspiré par l’exubérance de l’univers amazonien. Ses œuvres mettent en scène des animaux fantastiques et des panoramas tropicaux oniriques soigneusement élaborés à l’aide de motifs géométriques colorés. L’artiste s’inspire de la forêt imaginaire qu’il transforme en une luxuriante intrication organique entre paysages, animaux et végétaux. Ce thème lui donne l’occasion de faire cohabiter styles et références symboliques très diverses allant des chimères peuplant les fresques médiévales aux formes de représentation du paysage héritées de l’Asie. Bruno Novelli crée ainsi une véritable ode aux tonalités végétales.");
        $artiste->setActif(true);
        $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::NOVELLI1));
        $artiste->addOeuvre($this->getReference(OeuvreFixtures::NOVELLI2));
        $manager->persist($artiste);

        // $artiste = new Artiste();
        // $artiste->setNom();
        // $artiste->setPrenom();
        // $artiste->setPresentation();
        // $artiste->setActif(true);
        // $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        // $manager->persist($artiste);

        // $artiste = new Artiste();
        // $artiste->setNom();
        // $artiste->setPrenom();
        // $artiste->setPresentation();
        // $artiste->setActif(true);
        // $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        // $manager->persist($artiste);

        // $artiste = new Artiste();
        // $artiste->setNom();
        // $artiste->setPrenom();
        // $artiste->setPresentation();
        // $artiste->setActif(true);
        // $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        // $manager->persist($artiste);

        // $artiste = new Artiste();
        // $artiste->setNom();
        // $artiste->setPrenom();
        // $artiste->setPresentation();
        // $artiste->setActif(true);
        // $artiste->setGalerie($this->getReference(GalerieFixtures::FONDATION_CARTIER));
        // $manager->persist($artiste);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [GalerieFixtures::class,
                OeuvreFixtures::class];
    }
}
