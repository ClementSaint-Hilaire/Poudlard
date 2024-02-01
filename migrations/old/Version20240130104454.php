<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240130104454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours_professeur (cours_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_125DA0B07ECF78B0 (cours_id), INDEX IDX_125DA0B0BAB22EE9 (professeur_id), PRIMARY KEY(cours_id, professeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, cours_id INT DEFAULT NULL, date_note DATE NOT NULL, note VARCHAR(255) DEFAULT NULL, INDEX IDX_CFBDFA14A6CC7B2 (eleve_id), INDEX IDX_CFBDFA147ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours_professeur ADD CONSTRAINT FK_125DA0B07ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_professeur ADD CONSTRAINT FK_125DA0B0BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA147ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE eleve ADD promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7139DF194 ON eleve (promotion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours_professeur DROP FOREIGN KEY FK_125DA0B07ECF78B0');
        $this->addSql('ALTER TABLE cours_professeur DROP FOREIGN KEY FK_125DA0B0BAB22EE9');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A6CC7B2');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA147ECF78B0');
        $this->addSql('DROP TABLE cours_professeur');
        $this->addSql('DROP TABLE note');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7139DF194');
        $this->addSql('DROP INDEX IDX_ECA105F7139DF194 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP promotion_id');
    }
}
