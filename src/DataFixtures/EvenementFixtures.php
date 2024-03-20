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


        $factory = $this->getReference('factory');
        $troisIA = $this->getReference('3IA');
        $bourgogne = $this->getReference('bourgogne');

        $sopra = $this->getReference('sopra');
        $microsoft = $this->getReference('sopra');
        $cgi = $this->getReference('cgi');
        $capgemini = $this->getReference('capgemini');
        $atos = $this->getReference('atos');

        //
        // NUIT DE L'INFO
        //

        $ndi->setNom("Nuit de l'info 2023")
            ->setDate(date_create("2023-12-07"))
            ->setAffiche("/images/affiche/ndi23.png")
            ->setAfficheFerme("/images/affichesFerme/ndi23.png")
            ->setTarifLibre(0)
            ->setTarifMembre(0)
            ->setPlacesRestantes(100)
            ->setDescription("Le plus fun serious-game regroupant des milliers d'étudiants pour développer une application informatique en une nuit.")
            ->setLienInscription("https://www.forms.gle/mqutfhS59ctmpENh6")
            ->setDatePublication(date_create("2023-11-07"))
            ->setDateLimiteInscription(date_create("2023-12-04"));

        $ndi->setALieuA($troisIA);

        $manager->persist($ndi);

        //
        // BILLARD
        //

        $billard = new Evenement();

        $billard->setNom("Evenement billard Miage/Entreprise")
            ->setDate(date_create("2022-11-24"))
            ->setAffiche("/images/affiche/billard23.png")
            ->setAfficheFerme("/images/affichesFerme/billard23.png")
            ->setTarifLibre(2)
            ->setTarifMembre(3)
            ->setPlacesRestantes(-1)
            ->setDescription("L’AMIGO a l’honneur de vous convier à son deuxième challenge MIAGE - ENTREPRISE, c’est autour d’un tournoi de Billard que ça se passera cette fois ci.")
            ->setDatePublication(date_create("2022-11-10"))
            ->setDateLimiteInscription(date_create("2022-11-17"));

        $billard->setALieuA($factory);
        $billard->addEntreprisesParticipante($sopra);

        $manager->persist($billard);

        //
        // MARS ATTAQUE
        //

        $marsAttaque = new Evenement();
        $marsAttaque->setNom("Mars Attaque 5")
            ->setDate(date_create("2024-03-28"))
            ->setAffiche("/images/affiche/marsattack23.png")
            ->setAfficheFerme("/images/affichesFerme/marsattack23.png")
            ->setTarifLibre(2)
            ->setTarifMembre(1)
            ->setPlacesRestantes(-1)
            ->setDescription("Tes BDE préférés organisent une conquête des bars lors du 5ème acte de Mars Attaque 👽")
            ->setDatePublication(date_create("2024-03-14"))
            ->setDateLimiteInscription(date_create("2024-03-28"));
        $marsAttaque->setALieuA($bourgogne);
        $manager->persist($marsAttaque);

        //
        // ESCAPE GAME
        //

        $escapeGame = new Evenement();
        $escapeGame->setNom("Escape Game")
            ->setDate(date_create("2023-03-28"))
            ->setAffiche("/images/affiche/escapegame23.png")
            ->setAfficheFerme("/images/affichesFerme/escapegame23.png")
            ->setTarifLibre(3)
            ->setTarifMembre(2)
            ->setPlacesRestantes(-1)
            ->setDescription("L'AMIGO vous invite à faire un escape game. Votre équipe et vous devrez tenter de résoudre les différentes énigmes qui vous attendent lors de cette soirée escape game.")
            ->setDatePublication(date_create("2024-02-05"))
            ->setDateLimiteInscription(date_create("2024-02-15"));
        $escapeGame->setALieuA($factory);
        $escapeGame->addEntreprisesParticipante($sopra);
        $escapeGame->addEntreprisesParticipante($microsoft);
        $escapeGame->addEntreprisesParticipante($cgi);
        $manager->persist($escapeGame);

        //
        // CASINO NIGHT
        //

        $casinoNight = new Evenement();
        $casinoNight->setNom("Casino Night")
            ->setDate(date_create("2023-10-12"))
            ->setAffiche("/images/affiche/casinonight23.png")
            ->setAfficheFerme("/images/affichesFerme/casinonight23.png")
            ->setTarifLibre(3)
            ->setTarifMembre(2)
            ->setPlacesRestantes(-1)
            ->setDescription("L’AMIGO vous invite le jeudi 12 octobre à 19h30 au bâtiment 3IA pour participer au premier challenge de cette année🎉 C’est autour de différentes tables de jeux que vous pourrez retrouver nos entreprises partenaires afin de passer une soirée dans notre casino🔥 Buffet et Boissons offertes !
")
            ->setDatePublication(date_create("2023-10-03"))
            ->setDateLimiteInscription(date_create("2023-10-12"));
        $casinoNight->setALieuA($troisIA);
        $casinoNight->addEntreprisesParticipante($sopra);
        $casinoNight->addEntreprisesParticipante($microsoft);
        $casinoNight->addEntreprisesParticipante($cgi);
        $casinoNight->addEntreprisesParticipante($capgemini);
        $casinoNight->addEntreprisesParticipante($atos);
        $manager->persist($casinoNight);


        $manager->flush();

    }


    public function getDependencies(): array
    {
        return [LieuEvenementFixtures::class];
    }

}
