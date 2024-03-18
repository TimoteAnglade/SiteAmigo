<?php

namespace App\DataFixtures;

use App\Entity\Tags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $textes = array();
        $i=0;

        $textes[$i] = new Tags();
        $textes[$i]
            ->setCouleur("3F4E9E")
            ->setLibelle("Orléans Centre");
        $this->addReference('tagOrleans', $textes[$i++]);

        $textes[$i] = new Tags();
        $textes[$i]
            ->setCouleur("FFA500")
            ->setLibelle("ESN");
        $this->addReference('tagESN', $textes[$i++]);

        $textes[$i] = new Tags();
        $textes[$i]
            ->setCouleur("AA6C39")
            ->setLibelle("Banque");
        $this->addReference('tagBanque', $textes[$i++]);

        $textes[$i] = new Tags();
        $textes[$i]
            ->setCouleur("00EE77")
            ->setLibelle("Assurance");
        $this->addReference('tagAssurance', $textes[$i++]);

        foreach ($textes as $item) {
            $manager->persist($item);
        }

        $manager->flush();
    }
}
