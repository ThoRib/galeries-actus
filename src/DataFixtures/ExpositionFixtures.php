<?php

namespace App\DataFixtures;

use App\Entity\Exposition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExpositionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $expo = new Exposition();
        $expo->setTitre('Exposition de peintures');
        $expo->setSousTitre('Un grand ensemble retrospectif de la peinture européenne depuis la deuxième moitié du siècle dernier');
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '22-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '22-01-2023'));
        $expo->setPresentation('Nam quibusdam, quos audio sapientes habitos in Graecia, placuisse opinor mirabilia quaedam (sed nihil est quod illi non persequantur argutiis): partim fugiendas esse nimias amicitias, ne necesse sit unum sollicitum esse pro pluribus; satis superque esse sibi suarum cuique rerum, alienis nimis implicari molestum esse; commodissimum esse quam laxissimas habenas habere amicitiae, quas vel adducas, cum velis, vel remittas; caput enim esse ad beate vivendum securitatem, qua frui non possit animus, si tamquam parturiat unus pro pluribus.');
        $expo->setActif(true);
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre('Exposition de photographies');
        $expo->setSousTitre('Une sélection des meilleures images réalisées par les photographes de notre agence au cours de ces dix dernières années');
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '15-09-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '15-11-2022'));
        $expo->setPresentation('Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna.');
        $expo->setActif(true);
        $manager->persist($expo);

        $expo = new Exposition();
        $expo->setTitre('Exposition de sculptures');
        $expo->setSousTitre('Les élèves de l\'atelier exposent leurs travaux de fin d\'année');
        $expo->setDateDebut(\DateTime::createFromFormat('d-m-Y', '02-10-2022'));
        $expo->setDateFin(\DateTime::createFromFormat('d-m-Y', '02-11-2022'));
        $expo->setPresentation('Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.');
        $expo->setActif(true);
        $manager->persist($expo);

        $manager->flush();
    }
}
