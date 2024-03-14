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
        $troisIA->setNom("3IA")
            ->setLabel("Bâtiment du campus universitaire")
            ->setAdresse("LIFO Bat. 3IA, Université d'Orléans, Rue Léonard de Vinci, B.P. 6759, F-45067 ORLEANS Cedex 2");
        $manager->persist($troisIA);

        $this->addReference('3IA', $troisIA);

        $manager->flush();
    }
}
