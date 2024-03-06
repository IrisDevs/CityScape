<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305125113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amen_dishwasher (id INT AUTO_INCREMENT NOT NULL, amen_dishwasher TINYINT(1) NOT NULL, amen_floor_coverings TINYINT(1) NOT NULL, amen_internet TINYINT(1) NOT NULL, amen_wardrobes TINYINT(1) NOT NULL, amen_supermarket TINYINT(1) NOT NULL, amen_kids_zone TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amenity (id INT AUTO_INCREMENT NOT NULL, amen_prop_id INT DEFAULT NULL, amen_dishwasher TINYINT(1) NOT NULL, amen_floor_coverings TINYINT(1) NOT NULL, amen_internet TINYINT(1) NOT NULL, amen_wardrobes TINYINT(1) NOT NULL, amen_supermarket TINYINT(1) NOT NULL, amen_kids_zone TINYINT(1) NOT NULL, INDEX IDX_AB6079633FD4699C (amen_prop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amenity ADD CONSTRAINT FK_AB6079633FD4699C FOREIGN KEY (amen_prop_id) REFERENCES property (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amenity DROP FOREIGN KEY FK_AB6079633FD4699C');
        $this->addSql('DROP TABLE amen_dishwasher');
        $this->addSql('DROP TABLE amenity');
    }
}