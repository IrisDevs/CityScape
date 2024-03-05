<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305142628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, rent_user_id INT DEFAULT NULL, rent_property_id INT NOT NULL, rent_start DATE NOT NULL, rent_end DATE NOT NULL, rent_price DOUBLE PRECISION NOT NULL, INDEX IDX_2784DCC4642A8E5 (rent_user_id), INDEX IDX_2784DCC89358D81 (rent_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC4642A8E5 FOREIGN KEY (rent_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC89358D81 FOREIGN KEY (rent_property_id) REFERENCES property (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC4642A8E5');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC89358D81');
        $this->addSql('DROP TABLE rent');
    }
}
