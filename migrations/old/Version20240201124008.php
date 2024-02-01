<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201124008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE baguette (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, taille DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE baguette_composant (baguette_id INT NOT NULL, composant_id INT NOT NULL, INDEX IDX_B64AD903513FF34B (baguette_id), INDEX IDX_B64AD9037F3310E7 (composant_id), PRIMARY KEY(baguette_id, composant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composant (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, many_to_many VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_professeur (cours_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_125DA0B07ECF78B0 (cours_id), INDEX IDX_125DA0B0BAB22EE9 (professeur_id), PRIMARY KEY(cours_id, professeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, notes_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_naiss DATE NOT NULL, surnom VARCHAR(50) DEFAULT NULL, INDEX IDX_717E22E3139DF194 (promotion_id), INDEX IDX_717E22E3FC56F556 (notes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maison (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, date_note DATE NOT NULL, note VARCHAR(255) DEFAULT NULL, INDEX IDX_CFBDFA147ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_naiss DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD903513FF34B FOREIGN KEY (baguette_id) REFERENCES baguette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD9037F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_professeur ADD CONSTRAINT FK_125DA0B07ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_professeur ADD CONSTRAINT FK_125DA0B0BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3FC56F556 FOREIGN KEY (notes_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA147ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD903513FF34B');
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD9037F3310E7');
        $this->addSql('ALTER TABLE cours_professeur DROP FOREIGN KEY FK_125DA0B07ECF78B0');
        $this->addSql('ALTER TABLE cours_professeur DROP FOREIGN KEY FK_125DA0B0BAB22EE9');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3139DF194');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3FC56F556');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA147ECF78B0');
        $this->addSql('DROP TABLE baguette');
        $this->addSql('DROP TABLE baguette_composant');
        $this->addSql('DROP TABLE composant');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_professeur');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE professeur');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
