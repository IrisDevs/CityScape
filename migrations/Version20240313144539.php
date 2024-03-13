<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313144539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', CHANGE proj_category proj_category JSON NOT NULL');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE12469DE2');
        $this->addSql('DROP INDEX IDX_8BF21CDE12469DE2 ON property');
        $this->addSql('ALTER TABLE property ADD prop_amenity_id INT DEFAULT NULL, ADD prop_address_id INT DEFAULT NULL, DROP prop_address, CHANGE category_id prop_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDECA943D59 FOREIGN KEY (prop_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE401472AD FOREIGN KEY (prop_amenity_id) REFERENCES amenity (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE2A3CCEDD FOREIGN KEY (prop_address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDECA943D59 ON property (prop_category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8BF21CDE401472AD ON property (prop_amenity_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8BF21CDE2A3CCEDD ON property (prop_address_id)');
        $this->addSql('ALTER TABLE rent CHANGE rent_property_id rent_property_id INT DEFAULT NULL, CHANGE rent_price rent_price NUMERIC(10, 2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDECA943D59');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE401472AD');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE2A3CCEDD');
        $this->addSql('DROP INDEX IDX_8BF21CDECA943D59 ON property');
        $this->addSql('DROP INDEX UNIQ_8BF21CDE401472AD ON property');
        $this->addSql('DROP INDEX UNIQ_8BF21CDE2A3CCEDD ON property');
        $this->addSql('ALTER TABLE property ADD category_id INT DEFAULT NULL, ADD prop_address VARCHAR(255) NOT NULL, DROP prop_category_id, DROP prop_amenity_id, DROP prop_address_id');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8BF21CDE12469DE2 ON property (category_id)');
        $this->addSql('ALTER TABLE project DROP created_at, DROP updated_at, CHANGE proj_category proj_category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE rent CHANGE rent_property_id rent_property_id INT NOT NULL, CHANGE rent_price rent_price DOUBLE PRECISION NOT NULL');
    }
}
