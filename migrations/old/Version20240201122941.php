<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201122941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A6CC7B2');
        $this->addSql('CREATE TABLE baguette_composant (baguette_id INT NOT NULL, composant_id INT NOT NULL, INDEX IDX_B64AD903513FF34B (baguette_id), INDEX IDX_B64AD9037F3310E7 (composant_id), PRIMARY KEY(baguette_id, composant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD903513FF34B FOREIGN KEY (baguette_id) REFERENCES baguette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD9037F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7139DF194');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F79D67D8AF');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('ALTER TABLE baguette ADD taille DOUBLE PRECISION NOT NULL, DROP composant, CHANGE libelle nom VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE composant ADD many_to_many VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD promotion_id INT DEFAULT NULL, ADD notes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3FC56F556 FOREIGN KEY (notes_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3139DF194 ON etudiant (promotion_id)');
        $this->addSql('CREATE INDEX IDX_717E22E3FC56F556 ON etudiant (notes_id)');
        $this->addSql('DROP INDEX IDX_CFBDFA14A6CC7B2 ON note');
        $this->addSql('ALTER TABLE note DROP eleve_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, maison_id INT NOT NULL, promotion_id INT DEFAULT NULL, INDEX IDX_ECA105F79D67D8AF (maison_id), INDEX IDX_ECA105F7139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F79D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id)');
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD903513FF34B');
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD9037F3310E7');
        $this->addSql('DROP TABLE baguette_composant');
        $this->addSql('ALTER TABLE baguette ADD composant VARCHAR(50) DEFAULT NULL, DROP taille, CHANGE nom libelle VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE composant DROP many_to_many');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3139DF194');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3FC56F556');
        $this->addSql('DROP INDEX IDX_717E22E3139DF194 ON etudiant');
        $this->addSql('DROP INDEX IDX_717E22E3FC56F556 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP promotion_id, DROP notes_id');
        $this->addSql('ALTER TABLE note ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A6CC7B2 ON note (eleve_id)');
    }
}
