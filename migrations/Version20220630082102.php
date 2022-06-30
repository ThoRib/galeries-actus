<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630082102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exposition_images_expo (exposition_id INT NOT NULL, images_expo_id INT NOT NULL, INDEX IDX_F16FA81388ED476F (exposition_id), INDEX IDX_F16FA8133F79364A (images_expo_id), PRIMARY KEY(exposition_id, images_expo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_expo (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exposition_images_expo ADD CONSTRAINT FK_F16FA81388ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exposition_images_expo ADD CONSTRAINT FK_F16FA8133F79364A FOREIGN KEY (images_expo_id) REFERENCES images_expo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exposition ADD image_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exposition_images_expo DROP FOREIGN KEY FK_F16FA8133F79364A');
        $this->addSql('DROP TABLE exposition_images_expo');
        $this->addSql('DROP TABLE images_expo');
        $this->addSql('ALTER TABLE exposition DROP image_name');
    }
}
