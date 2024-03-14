<?php

namespace App\DataFixtures;

use App\Entity\MembreAmigo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MembreAmigoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $membre = new MembreAmigo();
        $membre->setNom("Couvreur")
            ->setPrenom("Jean-Michel")
            ->setPhoto("/images/profilAmigo/jmcouvreur.png")
            ->setPoste("Fonda MVP++");

        $manager->persist($membre);

        $manager->flush();
    }
}
