<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sopra = new Entreprise();

        $sopra->setAdresse("10 Rue Emile Zola, 45000 Orléans")
            ->setNom("Sopra Steria")
            ->setSite("https://www.soprasteria.fr")
            ->setLogo("/images/logoEntreprise/sopra.png")
            ->setAffiliee(true)
            ->setDescription("Sopra Steria est une entreprise de services du numérique (ESN) française et une société de conseil en transformation numérique des entreprises et des organisations.\n\nSopra Steria est le fruit de la fusion en janvier 2015 des deux entreprises françaises de services numériques Sopra et Steria, créées respectivement en 1968 et 1969. En 2020, le groupe compte 46 000 salariés répartis dans plus de 30 pays dont 20 000 en France, et réalise en 2020 un chiffre d'affaires de 4,3 milliards d'euros.")
            ->setTelephone("0238523737");
        $manager->persist($sopra);

        $this->setReference('sopra',$sopra);


        $manager->flush();
    }
}
