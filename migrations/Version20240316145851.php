<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240316145851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE texte_dynamique (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contenu VARCHAR(1500) NOT NULL, code VARCHAR(100) NOT NULL, page VARCHAR(25) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A340F9377153098 ON texte_dynamique (code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE texte_dynamique');
    }
}
