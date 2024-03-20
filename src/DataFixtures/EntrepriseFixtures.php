<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixtures extends Fixture implements DependentFixtureInterface
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
            ->setTelephone("0238523737")
            ->addTagsEntreprise($this->getReference('tagESN'))
            ->addTagsEntreprise($this->getReference('tagOrleans'))
            ->setLinkedIn("https://www.linkedin.com/company/soprasteria/?originalSubdomain=fr");
        $manager->persist($sopra);
        $this->setReference('sopra',$sopra);


        $atos = new Entreprise();

        $atos->setAdresse("River Ouest, 80 quai Voltaire, 95877, Bezons cedex – France")
            ->setNom("Atos")
            ->setSite("https://atos.net")
            ->setLogo("/images/logoEntreprise/atos.png")
            ->setAffiliee(true)
            ->setDescription("Atos est une entreprise de services du numérique (ESN) française, créée en 1997. Elle fait partie des 10 plus grandes ESN au niveau mondial, avec un chiffre d'affaires annuel de près de 11 milliards d'euros en 2019 et environ 110 000 employés répartis dans 73 pays.")
            ->setTelephone("0173260000")
            ->addTagsEntreprise($this->getReference('tagESN'))
            ->addTagsEntreprise($this->getReference('tagOrleans'))
            ->setLinkedIn("https://www.linkedin.com/company/atos/?originalSubdomain=fr");
        $manager->persist($atos);
        $this->setReference('atos',$atos);

        $capgamini = new Entreprise();

        $capgamini->setAdresse("12 Rue Emile Zola, 45000 Orléans")
            ->setNom("Capgemini")
            ->setSite("https://www.capgemini.com/fr-fr/")
            ->setLogo("/images/logoEntreprise/capgemini.png")
            ->setAffiliee(true)
            ->setDescription("En tant que partenaire stratégique des plus grandes organisations mondiales, nous accompagnons nos clients depuis plus de 50 ans dans leur transformation. Nous répondons à l’ensemble des besoins des entreprises, de la stratégie et du design jusqu’au management des opérations. Pour ce faire, nous nous appuyons sur une expérience approfondie des secteurs et sur la maîtrise de domaines en perpétuelle évolution : cloud, data, intelligence artificielle, connectivité des logiciels, de l’ingénierie digitale et des plateformes.")
            ->setTelephone("0238240101")
            ->addTagsEntreprise($this->getReference('tagESN'))
            ->addTagsEntreprise($this->getReference('tagOrleans'))
            ->setLinkedIn("https://www.linkedin.com/company/capgemini/");
        $manager->persist($capgamini);
        $this->setReference('capgemini',$capgamini);

        $cgi = new Entreprise();

        $cgi->setAdresse("6 Av. Jean Zay, 45000, Orléans")
            ->setNom("CGI")
            ->setSite("https://www.cgi.com/france/fr-fr")
            ->setLogo("/images/logoEntreprise/cgi.png")
            ->setAffiliee(true)
            ->setDescription("Fondée en 1976, CGI est leader mondial du conseil et des services numériques.
Nous offrons un portefeuille complet de services et de solutions accompagné d’un modèle de proximité conjugué à un réseau mondial de prestation de services.
Rejoindre CGI, c’est être au cœur des enjeux des entreprises et vivre des missions passionnantes, où l’innovation et l’excellence opérationnelle sont constamment mises au service de nos clients.")
            ->setTelephone("0238568930")
            ->addTagsEntreprise($this->getReference('tagESN'))
            ->addTagsEntreprise($this->getReference('tagOrleans'))
            ->setLinkedIn("https://www.linkedin.com/company/cgi/?originalSubdomain=fr");
        $manager->persist($cgi);
        $this->setReference('cgi',$cgi);

        $microsoft = new Entreprise();

        $microsoft->setAdresse("37/45 37 QUAI DU PRESIDENT ROOSEVELT 92130 ISSY-LES-MOULINEAUX")
            ->setNom("Microsoft")
            ->setSite("https://www.microsoft.com/fr-fr")
            ->setLogo("/images/logoEntreprise/microsoft.png")
            ->setAffiliee(true)
            ->setDescription("Microsoft Corporation est une multinationale informatique et micro-informatique américaine, fondée en 1975 par Bill Gates et Paul Allen. Microsoft fait partie des principales capitalisations boursières du NASDAQ, aux côtés d'Apple et d'Amazon. En 2023, le chiffre d'affaires s’élevait à 211,92 milliards de dollars. Elle est dirigée, depuis le 4 février 2014, par Satya Nadella qui succède à Steve Ballmer et Bill Gates en qualité de directeur général. En 2020, l'entreprise emploie 148 000 personnes dans 120 pays.")
            ->setTelephone("0970019090")
            ->addTagsEntreprise($this->getReference('tagESN'))
            ->addTagsEntreprise($this->getReference('tagSI'))
            ->setLinkedIn("https://www.linkedin.com/company/microsoft/?originalSubdomain=fr");
        $manager->persist($microsoft);
        $this->setReference('microsoft',$microsoft);
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [TagsFixtures::class];
    }
}
