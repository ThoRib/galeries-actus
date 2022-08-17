<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220817174431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste DROP FOREIGN KEY FK_9C07354F825396CB');
        $this->addSql('DROP INDEX IDX_9C07354F825396CB ON artiste');
        $this->addSql('ALTER TABLE artiste DROP galerie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artiste ADD galerie_id INT NOT NULL');
        $this->addSql('ALTER TABLE artiste ADD CONSTRAINT FK_9C07354F825396CB FOREIGN KEY (galerie_id) REFERENCES galerie (id)');
        $this->addSql('CREATE INDEX IDX_9C07354F825396CB ON artiste (galerie_id)');
    }
}
