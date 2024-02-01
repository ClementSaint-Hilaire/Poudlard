<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201105949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE baguette_composant (baguette_id INT NOT NULL, composant_id INT NOT NULL, INDEX IDX_B64AD903513FF34B (baguette_id), INDEX IDX_B64AD9037F3310E7 (composant_id), PRIMARY KEY(baguette_id, composant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD903513FF34B FOREIGN KEY (baguette_id) REFERENCES baguette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE baguette_composant ADD CONSTRAINT FK_B64AD9037F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE baguette ADD taille DOUBLE PRECISION NOT NULL, DROP composant, CHANGE libelle nom VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD promotion VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD903513FF34B');
        $this->addSql('ALTER TABLE baguette_composant DROP FOREIGN KEY FK_B64AD9037F3310E7');
        $this->addSql('DROP TABLE baguette_composant');
        $this->addSql('ALTER TABLE baguette ADD composant VARCHAR(50) DEFAULT NULL, DROP taille, CHANGE nom libelle VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE etudiant DROP promotion');
    }
}
