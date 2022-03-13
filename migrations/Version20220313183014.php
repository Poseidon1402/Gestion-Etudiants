<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313183014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ETUDIANTS ADD email VARCHAR(50) NOT NULL AFTER sexe');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_66BE1C04E7927C74 ON ETUDIANTS (email)');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CDDEAB1A3');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX UNIQ_66BE1C04E7927C74 ON ETUDIANTS');
        $this->addSql('ALTER TABLE ETUDIANTS DROP email, CHANGE nom nom VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenoms prenoms VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE MATIERES CHANGE libelle libelle VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NIVEAU CHANGE nom nom VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CDDEAB1A3');
        $this->addSql('ALTER TABLE NOTES ADD CONSTRAINT FK_F64F643CDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES ETUDIANTS (numero_inscription)');
    }
}
