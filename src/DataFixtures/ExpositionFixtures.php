<?php

namespace App\DataFixtures;

use App\Entity\Exposition;
use App\Entity\ImagesExpo;
use App\DataFixtures\GalerieFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExpositionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $expo = new Exposition();
        $expo->setTitre("Images Sonores");
        $expo->setSousTitre("Suspendisse ultrices gravida dictum fusce. Pretium fusce id velit ut tortor pretium viverra suspendisse.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '22-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '22-01-2024'));
        $expo->setPresentation('Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.');
        $expo->setImageName("sound-wave-green.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::SWV));
        $expo->setGalerie($this->getReference(GalerieFixtures::ESPACE_2));
        $manager->persist($expo);


        $expo = new Exposition();
        $expo->setTitre('Paysages vagues');
        $expo->setSousTitre("Sed sed risus pretium quam vulputate dignissim suspendisse.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '15-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '15-11-2023'));
        $expo->setPresentation('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna.');
        $expo->setImageName("paysage-1.svg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::PAY4));
        $expo->setGalerie($this->getReference(GalerieFixtures::ESPACE_1));
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre("Miroirs d'immeubles");
        $expo->setSousTitre("Velit euismod in pellentesque massa placerat.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '02-10-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '02-11-2023'));
        $expo->setPresentation('Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.');
        $expo->setImageName("immeubles-miroir-3.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::IMM2));
        $expo->setGalerie($this->getReference(GalerieFixtures::ESPACE_3));
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre("Monochromes roses");
        $expo->setSousTitre("Magna eget est lorem ipsum dolor. Odio morbi quis commodo odio aenean sed adipiscing");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '05-02-2023'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '25-04-2023'));
        $expo->setPresentation('Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.');
        $expo->setImageName("roses-6.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::RS5));
        $expo->setGalerie($this->getReference(GalerieFixtures::ESPACE_2));
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre("Suites ondulatoires");
        $expo->setSousTitre("Id cursus metus aliquam eleifend mi. Magna eget est lorem ipsum dolor.");
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '05-02-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '25-04-2023'));
        $expo->setPresentation('Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.');
        $expo->setImageName("ondes-2.jpg");
        $expo->setActif(true);
        $expo->addImagesExpo($this->getReference(ImagesExpoFixtures::OND6));
        $expo->setGalerie($this->getReference(GalerieFixtures::ESPACE_1));
        $manager->persist($expo);

        $manager->flush();
    }
    
    public function getDependencies()
    {
        return [ImagesExpoFixtures::class,
                GalerieFixtures::class];
    }
}
