<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220808192047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images_expo_exposition (images_expo_id INT NOT NULL, exposition_id INT NOT NULL, INDEX IDX_6A56880D3F79364A (images_expo_id), INDEX IDX_6A56880D88ED476F (exposition_id), PRIMARY KEY(images_expo_id, exposition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images_expo_exposition ADD CONSTRAINT FK_6A56880D3F79364A FOREIGN KEY (images_expo_id) REFERENCES images_expo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images_expo_exposition ADD CONSTRAINT FK_6A56880D88ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE exposition_images_expo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exposition_images_expo (exposition_id INT NOT NULL, images_expo_id INT NOT NULL, INDEX IDX_F16FA81388ED476F (exposition_id), INDEX IDX_F16FA8133F79364A (images_expo_id), PRIMARY KEY(exposition_id, images_expo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE exposition_images_expo ADD CONSTRAINT FK_F16FA81388ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exposition_images_expo ADD CONSTRAINT FK_F16FA8133F79364A FOREIGN KEY (images_expo_id) REFERENCES images_expo (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE images_expo_exposition');
    }
}
