<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313175227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE NOTES ADD CONSTRAINT FK_F64F643CDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES ETUDIANTS (numero_Inscription)');
        $this->addSql('ALTER TABLE NOTES ADD CONSTRAINT FK_F64F643CF46CD258 FOREIGN KEY (matiere_id) REFERENCES MATIERES (codemat)');
        $this->addSql('ALTER TABLE NOTES ADD CONSTRAINT FK_F64F643CB3E9C81 FOREIGN KEY (niveau_id) REFERENCES NIVEAU (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE ETUDIANTS CHANGE nom nom VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenoms prenoms VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE MATIERES CHANGE libelle libelle VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NIVEAU CHANGE nom nom VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CDDEAB1A3');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CF46CD258');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CB3E9C81');
    }
}
