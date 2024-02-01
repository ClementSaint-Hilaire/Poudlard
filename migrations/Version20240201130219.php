<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201130219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maison ADD etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_F90CB66DDDEAB1A3 ON maison (etudiant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66DDDEAB1A3');
        $this->addSql('DROP INDEX IDX_F90CB66DDDEAB1A3 ON maison');
        $this->addSql('ALTER TABLE maison DROP etudiant_id');
    }
}
