<?php

namespace App\DataFixtures;

use App\Entity\TypeRequete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeRequeteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $listeTables = array("LieuEvenementFixtures","Evenement","Entreprise","OffreEmploi","MembreAmigo","NiveauEtude");
        $listeType = array("INSERT","UPDATE","DELETE");

        foreach ($listeTables as $table) {
            foreach ($listeType as $type) {
                $item = new TypeRequete();
                $item->setTypeRequete($type)->setNomTable("$table");
                $manager->persist($item);
            }
        }

        $manager->flush();
    }
}