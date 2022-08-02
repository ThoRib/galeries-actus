<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220802175729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_exposition (user_id INT NOT NULL, exposition_id INT NOT NULL, INDEX IDX_1B563BFFA76ED395 (user_id), INDEX IDX_1B563BFF88ED476F (exposition_id), PRIMARY KEY(user_id, exposition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_exposition ADD CONSTRAINT FK_1B563BFFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_exposition ADD CONSTRAINT FK_1B563BFF88ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_exposition');
    }
}
