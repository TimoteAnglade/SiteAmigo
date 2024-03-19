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
        $m1 = $this->getReference('m1');
        $m2 = $this->getReference('m2');

        $stage1 = new OffreEmploi();
        $stage1->setDescription("Stage en tant que membre de l'équipe de développement, dans l'objectif de poursuivre sur une alternance.")
            ->setParEntreprise($sopra)
            ->setPourNiveauDetude($l3)
            ->setNomPoste("Stage - Développeur Java Fullstack")
            ->setMailContact("contact-corp@soprasteria.com");

        $manager->persist($stage1);


        $stage2 = new OffreEmploi();
        $stage2->setDescription("Alternance en tant que membre de l'équipe de développement.")
            ->setParEntreprise($sopra)
            ->setPourNiveauDetude($m1)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@soprasteria.com");

        $manager->persist($stage2);

        $stage3 = new OffreEmploi();
        $stage3->setDescription("Alternance en tant que membre de l'équipe de développement.")
            ->setParEntreprise($sopra)
            ->setPourNiveauDetude($m2)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@soprasteria.com");

        $manager->persist($stage3);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [EntrepriseFixtures::class, NiveauDetudeFixtures::class];
    }

}
