<?php

namespace App\DataFixtures;

use App\Entity\NiveauDetude;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NiveauDetudeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $stage = $this->getReference('stage');
        $alternance = $this->getReference('alternance');

        $l3 = new NiveauDetude();
        $l3->setLibelle("L3 MIAGE")
            ->setDebutStage(date_create("2024-04-02"))
            ->setFinStage(date_create("2024-07-02"))
            ->setTypePrestation($stage);
        $manager->persist($l3);

        $m1 = new NiveauDetude();
        $m1->setLibelle("M1 MIAGE")
            ->setDebutStage(date_create("2024-09-01"))
            ->setFinStage(date_create("2025-09-01"))
            ->setTypePrestation($alternance);
        $manager->persist($m1);

        $m2 = new NiveauDetude();
        $m2->setLibelle("M2 MIAGE")
            ->setDebutStage(date_create("2024-09-01"))
            ->setFinStage(date_create("2025-09-01"))
            ->setTypePrestation($alternance);
        $manager->persist($m2);

        $this->setReference('l3',$l3);
        $this->setReference('m1',$m1);
        $this->setReference('m2',$m2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [TypePrestationFixtures::class];
    }

}
