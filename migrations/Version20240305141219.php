<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305141219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, add_property_id INT NOT NULL, add_nb_street INT NOT NULL, add_address_line_1 VARCHAR(255) NOT NULL, add_address_line_2 VARCHAR(255) DEFAULT NULL, add_city VARCHAR(255) NOT NULL, add_state VARCHAR(255) NOT NULL, add_zip VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D4E6F816D74A6B (add_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F816D74A6B FOREIGN KEY (add_property_id) REFERENCES property (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F816D74A6B');
        $this->addSql('DROP TABLE address');
    }
}
