<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220314184130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE MATIERES ADD niveau_id INT NOT NULL');
        $this->addSql('ALTER TABLE MATIERES ADD CONSTRAINT FK_4BA4EF9EB3E9C81 FOREIGN KEY (niveau_id) REFERENCES NIVEAU (id)');
        $this->addSql('CREATE INDEX IDX_4BA4EF9EB3E9C81 ON MATIERES (niveau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE ETUDIANTS CHANGE nom nom VARCHAR(25) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenoms prenoms VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sexe sexe VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annee annee VARCHAR(4) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE MATIERES DROP FOREIGN KEY FK_4BA4EF9EB3E9C81');
        $this->addSql('DROP INDEX IDX_4BA4EF9EB3E9C81 ON MATIERES');
        $this->addSql('ALTER TABLE MATIERES DROP niveau_id, CHANGE libelle libelle VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NIVEAU CHANGE nom nom VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CDDEAB1A3');
    }
}
