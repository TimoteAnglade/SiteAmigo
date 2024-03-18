<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
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
            ->setAffiche("/images/affiche/ndi2023.png")
            ->setAfficheFerme("/images/affichesFerme/ndi2023.png")
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

        $billard = new Evenement();

        $billard->setNom("Evenement billard Miage/Entreprise")
            ->setDate(date_create("2022-11-24"))
            ->setAffiche("/images/affiche/billard2022.png")
            ->setAfficheFerme("/images/affichesFerme/ndi2023.png")
            ->setTarifLibre(2)
            ->setTarifMembre(3)
            ->setPlacesRestantes(-1)
            ->setDescription("L’AMIGO a l’honneur de vous convier à son deuxième challenge MIAGE - ENTREPRISE, c’est autour d’un tournoi de Billard que ça se passera cette fois ci.")
            ->setDatePublication(date_create("2022-11-10"))
            ->setDateLimiteInscription(date_create("2022-11-17"));

        $factory = $this->getReference('factory');
        $billard->setALieuA($factory);

        $sopra = $this->getReference('sopra');
        $billard->addEntreprisesParticipante($sopra);


        $manager->persist($billard);

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [LieuEvenementFixtures::class];
    }

}
