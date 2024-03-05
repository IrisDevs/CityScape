<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305141847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address ADD add_country_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81D4948FC3 FOREIGN KEY (add_country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81D4948FC3 ON address (add_country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81D4948FC3');
        $this->addSql('DROP INDEX IDX_D4E6F81D4948FC3 ON address');
        $this->addSql('ALTER TABLE address DROP add_country_id');
    }
}
