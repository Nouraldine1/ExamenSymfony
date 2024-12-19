<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306193608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, prix NUMERIC(10, 2) NOT NULL, quantite_stock INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dette (id SERIAL NOT NULL, client_id INT DEFAULT NULL, article_id INT DEFAULT NULL, montant NUMERIC(10, 2) NOT NULL, statut VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_831BC80819EB6921 ON dette (client_id)');
        $this->addSql('CREATE INDEX IDX_831BC8087294869C ON dette (article_id)');
        $this->addSql('CREATE TABLE paiement (id SERIAL NOT NULL, dette_id INT DEFAULT NULL, montant NUMERIC(10, 2) NOT NULL, date_paiement TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B1DC7A1EE11400A1 ON paiement (dette_id)');
        $this->addSql('CREATE TABLE utilisateur (id SERIAL NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
        $this->addSql('ALTER TABLE dette ADD CONSTRAINT FK_831BC80819EB6921 FOREIGN KEY (client_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dette ADD CONSTRAINT FK_831BC8087294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EE11400A1 FOREIGN KEY (dette_id) REFERENCES dette (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dette DROP CONSTRAINT FK_831BC80819EB6921');
        $this->addSql('ALTER TABLE dette DROP CONSTRAINT FK_831BC8087294869C');
        $this->addSql('ALTER TABLE paiement DROP CONSTRAINT FK_B1DC7A1EE11400A1');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE dette');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE utilisateur');
    }
}
