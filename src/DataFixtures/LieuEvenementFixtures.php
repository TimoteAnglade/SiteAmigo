<?php

namespace App\DataFixtures;

use App\Entity\LieuEvenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LieuEvenementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $troisIA = new LieuEvenement();
        $troisIA->setNom("Bâtiment 3IA")
            ->setLabel("Bâtiment du campus universitaire")
            ->setAdresse("LIFO Bat. 3IA, Université d'Orléans, Rue Léonard de Vinci, B.P. 6759, F-45067 ORLEANS Cedex 2");
        $manager->persist($troisIA);

        $this->addReference('3IA', $troisIA);

        $factory = new LieuEvenement();
        $factory->setNom("Factory")
            ->setLabel("Bowling et salle de jeux")
            ->setAdresse("3055 Rte de Sandillon, 45560 Saint-Denis-en-Val");
        $manager->persist($factory);
        $this->addReference('factory', $factory);

        $rueDeBourgogne = new LieuEvenement();
        $rueDeBourgogne->setNom("Rue de Bourgogne")
            ->setLabel("Bowling et salle de jeux")
            ->setAdresse("Rue de bourgogne, 45000 Orléans");
        $manager->persist($rueDeBourgogne);

        $this->addReference('bourgogne', $rueDeBourgogne);

        $manager->flush();
    }
}
