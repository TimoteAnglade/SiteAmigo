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
        $membre1->setNom("Couvreur")
            ->setPrenom("Jean-Michel")
            ->setPhoto("/images/profilAmigo/jmcouvreur.png")
            ->setPoste("Fonda MVP++")
            ->setDescription("Professeur de l'université et référant de la L3 parcours MIAGE")
            ->setMail("jean-michel.couvreur@univ-orleans.fr")
            ->setNiveau("Professeur");
        $manager->persist($membre1);

        $membre2 = new MembreAmigo();
        $membre2->setNom("Autreaux")
            ->setPrenom("Denis")
            ->setPhoto("/images/profilAmigo/dautreaux.png")
            ->setPoste("Membre")
            ->setDescription("Pervers narcissique : Le pervers narcissique dénigre son entourage en se plaçant en victime. C'est toujours les autres qui lui ont fait du mal. Il y a un décalage entre ce que le PN est et ce qu'il dit être. Il affirme être attaché aux valeurs de bienveillance, d'honnêteté et pourtant, il agit en contradiction avec ces valeurs.")
            ->setMail("denis.autreaux@univ-orleans.fr")
            ->setNiveau("Random + ratio");
        $manager->persist($membre2);

        $manager->flush();
    }
}
