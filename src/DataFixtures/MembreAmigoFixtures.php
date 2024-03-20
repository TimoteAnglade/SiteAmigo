<?php

namespace App\DataFixtures;

use App\Entity\MembreAmigo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MembreAmigoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $membre1 = new MembreAmigo();
        $membre1->setNom("Moïse")
            ->setPrenom("Ian")
            ->setPhoto("/images/profilAmigo/imoise.png")
            ->setPoste("Président")
            ->setDescription("Étudiant L3 Miage")
            ->setMail("ian.moise@etu.univ-orleans.fr")
            ->setNiveau("L3");
        $manager->persist($membre1);

        $membre2 = new MembreAmigo();
        $membre2->setNom("Leblanc")
            ->setPrenom("Laura")
            ->setPhoto("/images/profilAmigo/lleblanc.png")
            ->setPoste("Vice-présidente")
            ->setDescription("Étudiante L3 Miage")
            ->setMail("laura.leblanc@etu.univ-orleans.fr")
            ->setNiveau("L3");
        $manager->persist($membre2);

        $membre3 = new MembreAmigo();
        $membre3->setNom("Christophe")
            ->setPrenom("Marie")
            ->setPhoto("/images/profilAmigo/mchristophe.png")
            ->setPoste("Trésorière")
            ->setDescription("Étudiante M2 Miage")
            ->setMail("marie.christophe@etu.univ-orleans.fr")
            ->setNiveau("M2");
        $manager->persist($membre3);

        $membre4 = new MembreAmigo();
        $membre4->setNom("Ferey")
            ->setPrenom("Arthur")
            ->setPhoto("/images/profilAmigo/aferey.png")
            ->setPoste("VP partenariat")
            ->setDescription("Étudiant de m2 miage.")
            ->setMail("arthur.ferey@etu.univ-orleans.fr")
            ->setNiveau("M2");
        $manager->persist($membre4);

        $membre5 = new MembreAmigo();
        $membre5->setNom("Franchet")
            ->setPrenom("Anaïs")
            ->setPhoto("/images/profilAmigo/afranchet.png")
            ->setPoste("VP Event")
            ->setDescription("Étudiant de m2 miage")
            ->setMail("anaïs.franchet@etu.univ-orleans.fr")
            ->setNiveau("M2");
        $manager->persist($membre5);

        $membre6 = new MembreAmigo();
        $membre6->setNom("Lourdessamy")
            ->setPrenom("Solomon")
            ->setPhoto("/images/profilAmigo/slourdessamy.png")
            ->setPoste("VP Développement numérique")
            ->setDescription("Étudiant de M1 miage")
            ->setMail("solomon.lourdessamy@etu.univ-orleans.fr")
            ->setNiveau("M1");
        $manager->persist($membre6);

        $membre7 = new MembreAmigo();
        $membre7->setNom("Guérin")
            ->setPrenom("Marilou")
            ->setPhoto("/images/profilAmigo/mguerin.png")
            ->setPoste("VP Communication Secrétaire intérimaire")
            ->setDescription("Étudiant de L3 Miage")
            ->setMail("marilou.guerin@etu.univ-orleans.fr")
            ->setNiveau("L3");
        $manager->persist($membre7);


        $manager->flush();
    }
}
