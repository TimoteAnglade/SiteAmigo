<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\LieuEvenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EvenementFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $ndi = new Evenement();

        $ndi->setNom("Nuit de l'info 2023")
            ->setDate(date_create("2023-12-07"))
            ->setAffiche("/images/affiches/NDI2023.png")
            ->setAfficheFerme("/images/affichesFerme/NDI2023.png")
            ->setTarifLibre(0)
            ->setTarifMembre(0)
            ->setPlacesRestantes(100)
            ->setDescription("Le plus fun serious-game regroupant des milliers d'étudiants pour développer une application informatique en une nuit.")
            ->setLienInscription("https://www.forms.gle/mqutfhS59ctmpENh6")
            ->setDatePublication(date_create("2023-11-07"))
            ->setDateLimiteInscription(date_create("2023-12-04"));

        $troisIA = $this->getReference('3IA');
        $ndi->setALieuA($troisIA);


        $manager->persist($ndi);

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [LieuEvenementFixtures::class];
    }

}
