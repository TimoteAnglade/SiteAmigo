<?php

namespace App\DataFixtures;

use App\Entity\OffreEmploi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OffreEmploiFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $sopra = $this->getReference('sopra');
        $l3 = $this->getReference('l3');

        $stage = new OffreEmploi();
        $stage->setDescription("Stage en tant que membre de l'équipe de développement, dans l'objectif de poursuivre sur une alternance.")
            ->setParEntreprise($sopra)
            ->setPourNiveauDetude($l3)
            ->setNomPoste("Stage - Développeur Java Fullstack");

        $manager->persist($stage);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [EntrepriseFixtures::class, NiveauDetudeFixtures::class];
    }

}
