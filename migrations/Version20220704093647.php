<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704093647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exposition ADD galerie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exposition ADD CONSTRAINT FK_BC31FD13825396CB FOREIGN KEY (galerie_id) REFERENCES galerie (id)');
        $this->addSql('CREATE INDEX IDX_BC31FD13825396CB ON exposition (galerie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exposition DROP FOREIGN KEY FK_BC31FD13825396CB');
        $this->addSql('DROP INDEX IDX_BC31FD13825396CB ON exposition');
        $this->addSql('ALTER TABLE exposition DROP galerie_id');
    }
}
