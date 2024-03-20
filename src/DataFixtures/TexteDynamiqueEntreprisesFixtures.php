<?php

namespace App\DataFixtures;

use App\Entity\TexteDynamique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TexteDynamiqueEntreprisesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $page = "entreprises";
        $textes = array();
        $i=0;

        // -----------------------
        // DESCRIPTION MIAGE
        // ----------------------

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Les entreprises participant à MIAGE x Entreprises")
            ->setCode("entrepriseMXEtitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Les entreprises associées")
            ->setCode("entrepriseTitre");

        foreach($textes as $item){
            $manager->persist($item->setPage($page));
        }

        $manager->flush();
    }
}
