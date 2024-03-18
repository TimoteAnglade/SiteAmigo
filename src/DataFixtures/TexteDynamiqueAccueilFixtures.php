<?php

namespace App\DataFixtures;

use App\Entity\TexteDynamique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TexteDynamiqueAccueilFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $page = "accueil";
        $textes = array();
        $i=0;

        // -----------------------
        // DESCRIPTION MIAGE
        // ----------------------

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Qu'est-ce que la MIAGE")
            ->setCode("miageDescTitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("La MIAGE (Méthodes Informatiques Appliquées à la Gestion des Entreprises) est un cursus universitaire pluridisciplinaire axé sur l'application des technologies de l'information et de la communication dans le domaine de la gestion des entreprises. Son objectif est de former des professionnels capables de comprendre les enjeux liés à l'informatique et à la gestion, et d'élaborer des solutions informatiques innovantes pour répondre aux besoins des entreprises.")
            ->setCode("miageDesc");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Excellence : Nous nous engageons à offrir une formation de haute qualité, en accord avec les standards académiques les plus élevés.")
            ->setCode("miageLi1");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Intégrité : Nous agissons avec intégrité, honnêteté et transparence dans toutes nos interactions avec nos étudiants, notre personnel et nos partenaires.")
            ->setCode("miageLi2");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Innovation : Nous encourageons l'innovation et la créativité, et nous soutenons les projets et les initiatives qui contribuent à l'avancement de la MIAGE.")
            ->setCode("miageLi3");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Collaboration : Nous favorisons la collaboration entre étudiants, enseignants, chercheurs et professionnels, afin de créer un environnement d'apprentissage dynamique et enrichissant.")
            ->setCode("miageLi4");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Engagement : Nous sommes engagés à soutenir nos étudiants tout au long de leur parcours académique et professionnel, en leur offrant un accompagnement personnalisé et des opportunités de développement.")
            ->setCode("miageLi5");

        // -----------------------
        // DESCRIPTION SPECIALITES
        // ----------------------

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Les spécialisations")
            ->setCode("speTitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("SISMA")
            ->setCode("spe1Titre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Systèmes d'information des métiers du social et de l'assurance")
            ->setCode("spe1TitreLong");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Née de la collaboration université-entreprise, répond à un important besoin régional d’ingénieurs informaticiens ayant également une solide compétence métier dans le secteur des assurances, du social et de la banque. Ce parcours forme aux fonctions d’assistant à la maîtrise d’ouvrage pour le compte de banques et de sociétés d’assurance, de retraite, de prévoyance.")
            ->setCode("spe1Desc");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("SIR")
            ->setCode("spe2Titre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Systèmes d'information répartis")
            ->setCode("spe2TitreLong");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Propose d’acquérir, en complément des compétences communes, des compétences de haut niveau en matière de répartition des systèmes d’informations (étude, développement et déploiement de solutions applicatives et techniques réparties), incluant les aspects cloud, sécurités et big data.")
            ->setCode("spe2Desc");

        // -----------------------
        // CONTACT
        // ----------------------

        $textes[$i] = new TexteDynamique(); // Constante email
        $textes[$i++]
            ->setContenu("Email: ")
            ->setCode("contactMail");

        $textes[$i] = new TexteDynamique(); // Constante telephone
        $textes[$i++]
            ->setContenu("Téléphone: ")
            ->setCode("contactTel");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Contact")
            ->setCode("contactTitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Ouvert du lundi au vendredi (9h-17h)")
            ->setCode("contactHoraires");

        // Djelloul

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Responsable Miage / Master 2 Miage Orléans")
            ->setCode("contactMiageTitre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("khalil.djelloul@univ-orleans.fr")
            ->setCode("contactMiageMail");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("+33 456 789 123")
            ->setCode("contactMiageTel");

        // Couvreur

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Responsable Licence 3 parcours Miage Orléans")
            ->setCode("contactL3Titre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("jean-michel.couvreur@univ-orleans.fr")
            ->setCode("contactL3Mail");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("+33 2 38 41 70 10")
            ->setCode("contactL3Tel");

        // Delacourt

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("Responsable Master 1 Miage Orléans")
            ->setCode("contactM1Titre");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("martin.delacourt@univ-orleans.fr")
            ->setCode("contactM1Mail");

        $textes[$i] = new TexteDynamique();
        $textes[$i++]
            ->setContenu("+33 2 38 49 25 76")
            ->setCode("contactM1Tel");

        foreach($textes as $item){
            $manager->persist($item->setPage($page));
        }

        $manager->flush();
    }
}
