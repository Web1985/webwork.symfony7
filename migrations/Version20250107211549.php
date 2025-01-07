<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250107211549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP CONSTRAINT fk_cbe5a331a21214b7');
        $this->addSql('DROP INDEX idx_cbe5a331a21214b7');
        $this->addSql('ALTER TABLE book DROP category');
        $this->addSql('ALTER TABLE book RENAME COLUMN categories_id TO category_id');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CBE5A33112469DE2 ON book (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE book DROP CONSTRAINT FK_CBE5A33112469DE2');
        $this->addSql('DROP INDEX IDX_CBE5A33112469DE2');
        $this->addSql('ALTER TABLE book ADD category VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE book RENAME COLUMN category_id TO categories_id');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT fk_cbe5a331a21214b7 FOREIGN KEY (categories_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_cbe5a331a21214b7 ON book (categories_id)');
    }
}
