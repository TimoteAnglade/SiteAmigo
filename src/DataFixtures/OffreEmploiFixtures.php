<?php

namespace App\DataFixtures;

use App\Entity\OffreEmploi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OffreEmploiFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $sopra = $this->getReference('sopra');
        $cgi = $this->getReference('cgi');
        $capgemini = $this->getReference('capgemini');
        $microsoft = $this->getReference('microsoft');
        $atos = $this->getReference('atos');
        $l3 = $this->getReference('l3');
        $m1 = $this->getReference('m1');
        $m2 = $this->getReference('m2');

        $stage1 = new OffreEmploi();
        $stage1->setDescription("Stage en tant que membre de l'équipe de développement, dans l'objectif de poursuivre sur une alternance.")
            ->setParEntreprise($sopra)
            ->setPourNiveauDetude($l3)
            ->setNomPoste("Stage - Développeur Java Fullstack")
            ->setMailContact("contact-corp@soprasteria.com")
            ->setIsRemunere(false)
            ->setTelContact('0123456789');

        $manager->persist($stage1);

        $stage2 = new OffreEmploi();
        $stage2->setDescription("Alternance en tant que membre de l'équipe de développement.")
            ->setParEntreprise($atos)
            ->setPourNiveauDetude($m1)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@atos.com")
            ->setIsRemunere(true)
            ->setTelContact('0123456789');

        $manager->persist($stage2);

        $stage3 = new OffreEmploi();
        $stage3->setDescription("Alternance en tant que membre de l'équipe de développement.")
            ->setParEntreprise($capgemini)
            ->setPourNiveauDetude($m1)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@capgemini.com")
            ->setIsRemunere(true)
            ->setTelContact('0123456789');

        $manager->persist($stage3);

        $stage4 = new OffreEmploi();
        $stage4->setDescription("Microsoft offre un stage passionnant en développement Java pour les étudiants en L3. Ce stage vous permettra d'acquérir une expérience pratique dans un environnement professionnel dynamique. Vous travaillerez sur des projets Java innovants, collaborant avec une équipe expérimentée pour développer vos compétences et contribuer à des solutions informatiques de pointe.")
            ->setParEntreprise($microsoft)
            ->setPourNiveauDetude($l3)
            ->setNomPoste("Stage - Développeur Java Fullstack")
            ->setMailContact("contact-corp@microsoft.com")
            ->setIsRemunere(false)
            ->setTelContact('0123456789');

        $manager->persist($stage4);


        $stage5 = new OffreEmploi();
        $stage5->setDescription("Alternance en tant que membre de l'équipe de développement.")
            ->setParEntreprise($cgi)
            ->setPourNiveauDetude($m2)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@cgi.com")
            ->setIsRemunere(true)
            ->setTelContact('0123456789');

        $manager->persist($stage5);

        $stage6 = new OffreEmploi();
        $stage6->setDescription("Microsoft offre un stage passionnant en développement Java pour les étudiants en L3. Ce stage vous permettra d'acquérir une expérience pratique dans un environnement professionnel dynamique. Vous travaillerez sur des projets Java innovants, collaborant avec une équipe expérimentée pour développer vos compétences et contribuer à des solutions informatiques de pointe.")
            ->setParEntreprise($microsoft)
            ->setPourNiveauDetude($m1)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@microsoft.com")
            ->setIsRemunere(false)
            ->setTelContact('0123456789');

        $manager->persist($stage6);

        $stage7 = new OffreEmploi();
        $stage7->setDescription("Microsoft offre un stage passionnant en développement Java pour les étudiants en L3. Ce stage vous permettra d'acquérir une expérience pratique dans un environnement professionnel dynamique. Vous travaillerez sur des projets Java innovants, collaborant avec une équipe expérimentée pour développer vos compétences et contribuer à des solutions informatiques de pointe.")
            ->setParEntreprise($microsoft)
            ->setPourNiveauDetude($m2)
            ->setNomPoste("Alternance - Développeur Java Fullstack")
            ->setMailContact("contact-corp@microsoft.com")
            ->setIsRemunere(false)
            ->setTelContact('0123456789');

        $manager->persist($stage7);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [EntrepriseFixtures::class, NiveauDetudeFixtures::class];
    }

}
