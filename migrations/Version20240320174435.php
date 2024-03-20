<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320174435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, site VARCHAR(50) NOT NULL, logo VARCHAR(255) NOT NULL, description VARCHAR(300) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, affiliee BOOLEAN NOT NULL, linked_in VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE entreprise_tags (entreprise_id INTEGER NOT NULL, tags_id INTEGER NOT NULL, PRIMARY KEY(entreprise_id, tags_id), CONSTRAINT FK_E4298301A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E42983018D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E4298301A4AEAFEA ON entreprise_tags (entreprise_id)');
        $this->addSql('CREATE INDEX IDX_E42983018D7B4FB4 ON entreprise_tags (tags_id)');
        $this->addSql('CREATE TABLE entreprise_evenement (entreprise_id INTEGER NOT NULL, evenement_id INTEGER NOT NULL, PRIMARY KEY(entreprise_id, evenement_id), CONSTRAINT FK_96A6CFB7A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_96A6CFB7FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_96A6CFB7A4AEAFEA ON entreprise_evenement (entreprise_id)');
        $this->addSql('CREATE INDEX IDX_96A6CFB7FD02F13 ON entreprise_evenement (evenement_id)');
        $this->addSql('CREATE TABLE evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, a_lieu_a_id INTEGER NOT NULL, nom VARCHAR(100) NOT NULL, date DATE NOT NULL, affiche VARCHAR(255) NOT NULL, tarif_libre DOUBLE PRECISION NOT NULL, tarif_membre DOUBLE PRECISION NOT NULL, date_publication DATE NOT NULL, description VARCHAR(300) NOT NULL, lien_inscription VARCHAR(255) NOT NULL, date_limite_inscription DATETIME NOT NULL, places_restantes INTEGER NOT NULL, affiche_ferme VARCHAR(255) NOT NULL, CONSTRAINT FK_B26681EE589C79F FOREIGN KEY (a_lieu_a_id) REFERENCES lieu_evenement (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_B26681EE589C79F ON evenement (a_lieu_a_id)');
        $this->addSql('CREATE TABLE lieu_evenement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, label VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE log_modif (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fait_par_id INTEGER NOT NULL, type_id INTEGER NOT NULL, requete_entiere VARCHAR(500) NOT NULL, date DATE NOT NULL, CONSTRAINT FK_BB8B3F9617C2941B FOREIGN KEY (fait_par_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BB8B3F96C54C8C93 FOREIGN KEY (type_id) REFERENCES type_requete (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_BB8B3F9617C2941B ON log_modif (fait_par_id)');
        $this->addSql('CREATE INDEX IDX_BB8B3F96C54C8C93 ON log_modif (type_id)');
        $this->addSql('CREATE TABLE membre_amigo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, poste VARCHAR(50) NOT NULL, photo VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, mail VARCHAR(255) NOT NULL, niveau VARCHAR(25) NOT NULL)');
        $this->addSql('CREATE TABLE niveau_detude (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_prestation_id INTEGER NOT NULL, libelle VARCHAR(15) NOT NULL, debut_stage DATE NOT NULL, fin_stage DATE NOT NULL, CONSTRAINT FK_5D6F1149EEA87261 FOREIGN KEY (type_prestation_id) REFERENCES type_prestation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_5D6F1149EEA87261 ON niveau_detude (type_prestation_id)');
        $this->addSql('CREATE TABLE offre_emploi (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pour_niveau_detude_id INTEGER NOT NULL, par_entreprise_id INTEGER NOT NULL, nom_poste VARCHAR(255) NOT NULL, description VARCHAR(300) NOT NULL, mail_contact VARCHAR(255) NOT NULL, is_remunere BOOLEAN NOT NULL, tel_contact VARCHAR(10) NOT NULL, CONSTRAINT FK_132AD0D1475A44C7 FOREIGN KEY (pour_niveau_detude_id) REFERENCES niveau_detude (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_132AD0D14EEDDEE6 FOREIGN KEY (par_entreprise_id) REFERENCES entreprise (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_132AD0D1475A44C7 ON offre_emploi (pour_niveau_detude_id)');
        $this->addSql('CREATE INDEX IDX_132AD0D14EEDDEE6 ON offre_emploi (par_entreprise_id)');
        $this->addSql('CREATE TABLE tags (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, couleur VARCHAR(7) NOT NULL)');
        $this->addSql('CREATE TABLE texte_dynamique (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu VARCHAR(1500) NOT NULL, code VARCHAR(100) NOT NULL, page VARCHAR(25) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A340F9377153098 ON texte_dynamique (code)');
        $this->addSql('CREATE TABLE type_prestation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL)');
        $this->addSql('CREATE TABLE type_requete (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_requete VARCHAR(6) NOT NULL, nom_table VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (username)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE entreprise_tags');
        $this->addSql('DROP TABLE entreprise_evenement');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE lieu_evenement');
        $this->addSql('DROP TABLE log_modif');
        $this->addSql('DROP TABLE membre_amigo');
        $this->addSql('DROP TABLE niveau_detude');
        $this->addSql('DROP TABLE offre_emploi');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE texte_dynamique');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE type_requete');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
