<?php

namespace App\DataFixtures;

use App\Entity\TypePrestation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypePrestationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $stage = new TypePrestation();
        $stage->setLibelle("stage");
        $manager->persist($stage);

        $alternance = new TypePrestation();
        $alternance->setLibelle("alternance");
        $manager->persist($alternance);

        $this->addReference('stage', $stage);
        $this->addReference('alternance', $alternance);

        $manager->flush();
    }
}
