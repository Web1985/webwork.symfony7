<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241209140919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knowlage_base DROP slug');

        $this->addSql('ALTER TABLE knowlage_base ADD slug VARCHAR(255)');
        $this->addSql("UPDATE knowlage_base SET slug=REPLACE(REPLACE(LOWER(TRIM(title)), ' ',  '-'),'.', '-')");
        $this->addSql("ALTER TABLE knowlage_base ALTER COLUMN slug SET NOT NULL");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knowlage_base CHANGE slug slug VARCHAR(255) NOT NULL');
    }
}
