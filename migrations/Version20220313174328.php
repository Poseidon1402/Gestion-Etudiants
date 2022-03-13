<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313174328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ETUDIANTS (numero_inscription INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, nom VARCHAR(25) NOT NULL, prenoms VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, sexe VARCHAR(10) NOT NULL, annee DATE NOT NULL, INDEX IDX_66BE1C04B3E9C81 (niveau_id), PRIMARY KEY(numero_inscription)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE MATIERES (codemat INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, coefficient INT NOT NULL, PRIMARY KEY(codemat)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE NIVEAU (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE NOTES (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, matiere_id INT NOT NULL, niveau_id INT NOT NULL, note INT NOT NULL, INDEX IDX_F64F643CDDEAB1A3 (etudiant_id), INDEX IDX_F64F643CF46CD258 (matiere_id), INDEX IDX_F64F643CB3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ETUDIANTS ADD CONSTRAINT FK_66BE1C04B3E9C81 FOREIGN KEY (niveau_id) REFERENCES NIVEAU (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CDDEAB1A3');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CF46CD258');
        $this->addSql('ALTER TABLE ETUDIANTS DROP FOREIGN KEY FK_66BE1C04B3E9C81');
        $this->addSql('ALTER TABLE NOTES DROP FOREIGN KEY FK_F64F643CB3E9C81');
        $this->addSql('DROP TABLE ETUDIANTS');
        $this->addSql('DROP TABLE MATIERES');
        $this->addSql('DROP TABLE NIVEAU');
        $this->addSql('DROP TABLE NOTES');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
