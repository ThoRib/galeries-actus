<?php

namespace App\DataFixtures;

use App\Entity\Exposition;
use App\Entity\ImagesExpo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ExpositionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $expo = new Exposition();
        $expo->setTitre("Exposition d'Art Numérique Immersif");
        $expo->setSousTitre("L'art immersif est la conception d'œuvres dans lesquelles le spectateur pénètre et séjourne. Les réalisations en réalité augmentée font partie de l'art immersif.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '22-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '22-01-2023'));
        $expo->setPresentation('Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.');
        $expo->setImageName("067f8a863c3df64c2756d37a7cd95592.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMG1));
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMG2));
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre('Réclamer La Terre au Palais de Tokyo');
        $expo->setSousTitre("Rassembler écologie, féminisme, socialisme et politiques autochtones. Une prise de conscience écologique autant qu’un cri de ralliement. Différentes Générations. Quatorze Artistes.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '15-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '15-11-2022'));
        $expo->setPresentation('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna.');
        $expo->setImageName("palais-de-tokyo.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMG3));
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMG4));
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre('Nous les Arbres');
        $expo->setSousTitre("Réunissant une communauté d’artistes, de botanistes et de philosophes, la Fondation Cartier pour l’art contemporain se fait l’écho des plus récentes recherches scientifiques qui portent sur les arbres un regard renouvelé.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '02-10-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '02-11-2022'));
        $expo->setPresentation('Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.');
        $expo->setImageName("fondation-cartier.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMG5));
        $manager->persist($expo);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [ImagesExpoFixtures::class];
    }
}
