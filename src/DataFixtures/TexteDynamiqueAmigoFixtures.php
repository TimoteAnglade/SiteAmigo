<?php

namespace App\DataFixtures;

use App\Entity\TexteDynamique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TexteDynamiqueAmigoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $page="amigo";
        $textes = array();
        $i = 0;

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Qu'est-ce que l'AMIGO")
            ->setCode("amigoDescTitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("L'Association des MIAGE d'Orléans, connue sous le nom d'AMIGO, est un pilier dynamique au sein de la communauté étudiante. Fondée sur les principes de solidarité, d'innovation et d'entraide, AMIGO offre un espace inclusif où les étudiants en MIAGE peuvent s'épanouir tant sur le plan académique que social. En organisant des événements culturels, des formations professionnelles et des activités ludiques, AMIGO favorise l'échange de connaissances et le développement de compétences, tout en renforçant les liens entre ses membres et le monde professionnel. Reconnue pour son engagement et sa convivialité, l'association AMIGO incarne la passion et l'esprit de collaboration qui caractérisent la MIAGE d'Orléans.")
            ->setCode("amigoDesc");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("https://www.helloasso.com/associations/amigo")
            ->setCode("amigoInscription");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Membres de l'AMIGO")
            ->setCode("amigoMembresTitre");

        foreach($textes as $item){
            $manager->persist($item->setPage($page));
        }

        $manager->flush();
    }
}
