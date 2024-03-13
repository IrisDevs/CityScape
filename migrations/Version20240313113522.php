<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313113522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address ADD add_property_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F816D74A6B FOREIGN KEY (add_property_id) REFERENCES property (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F816D74A6B ON address (add_property_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F816D74A6B');
        $this->addSql('DROP INDEX UNIQ_D4E6F816D74A6B ON address');
        $this->addSql('ALTER TABLE address DROP add_property_id');
    }
}
