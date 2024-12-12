<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241209135833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE knowlage_base CHANGE slug slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1B192706989D9B62 ON knowlage_base (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1B192706989D9B62 ON knowlage_base');
        $this->addSql('ALTER TABLE knowlage_base CHANGE slug slug VARCHAR(255) DEFAULT NULL');
    }
}
