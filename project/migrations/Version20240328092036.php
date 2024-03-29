<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328092036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, add_property_id INT DEFAULT NULL, add_nb_street INT NOT NULL, add_address_line_1 VARCHAR(255) NOT NULL, add_address_line_2 VARCHAR(255) DEFAULT NULL, add_city VARCHAR(255) NOT NULL, add_state VARCHAR(255) NOT NULL, add_zip VARCHAR(255) NOT NULL, add_country VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D4E6F816D74A6B (add_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE amenity (id INT AUTO_INCREMENT NOT NULL, amen_prop_id INT DEFAULT NULL, amen_dishwasher TINYINT(1) NOT NULL, amen_floor_coverings TINYINT(1) NOT NULL, amen_internet TINYINT(1) NOT NULL, amen_wardrobes TINYINT(1) NOT NULL, amen_supermarket TINYINT(1) NOT NULL, amen_kids_zone TINYINT(1) NOT NULL, INDEX IDX_AB6079633FD4699C (amen_prop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, meta_title VARCHAR(255) NOT NULL, meta_description VARCHAR(255) NOT NULL, INDEX IDX_64C19C1727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, image_size INT DEFAULT NULL, attachment VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_16DB4F89549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, proj_title VARCHAR(255) NOT NULL, proj_client VARCHAR(255) NOT NULL, proj_price INT NOT NULL, proj_category JSON DEFAULT NULL, proj_date DATE NOT NULL, proj_facebook VARCHAR(255) DEFAULT NULL, proj_twitter VARCHAR(255) DEFAULT NULL, proj_linkedin VARCHAR(255) DEFAULT NULL, proj_instagram VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, prop_category_id INT DEFAULT NULL, prop_amenity_id INT DEFAULT NULL, prop_address_id INT DEFAULT NULL, prop_housing_type VARCHAR(255) NOT NULL, prop_nb_rooms INT NOT NULL, prop_sqm INT NOT NULL, prop_price INT NOT NULL, prop_nb_beds INT DEFAULT NULL, prop_nb_baths INT DEFAULT NULL, prop_nb_spaces INT DEFAULT NULL, prop_furnished TINYINT(1) DEFAULT NULL, prop_feature LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', slug VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8BF21CDECA943D59 (prop_category_id), UNIQUE INDEX UNIQ_8BF21CDE401472AD (prop_amenity_id), UNIQUE INDEX UNIQ_8BF21CDE2A3CCEDD (prop_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, rent_user_id INT DEFAULT NULL, rent_property_id INT DEFAULT NULL, rent_start DATE NOT NULL, rent_end DATE NOT NULL, rent_price NUMERIC(10, 2) NOT NULL, INDEX IDX_2784DCC4642A8E5 (rent_user_id), INDEX IDX_2784DCC89358D81 (rent_property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, auth_code VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, user_name VARCHAR(255) NOT NULL, discord_id VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F816D74A6B FOREIGN KEY (add_property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE amenity ADD CONSTRAINT FK_AB6079633FD4699C FOREIGN KEY (amen_prop_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1727ACA70 FOREIGN KEY (parent_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDECA943D59 FOREIGN KEY (prop_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE401472AD FOREIGN KEY (prop_amenity_id) REFERENCES amenity (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE2A3CCEDD FOREIGN KEY (prop_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC4642A8E5 FOREIGN KEY (rent_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC89358D81 FOREIGN KEY (rent_property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F816D74A6B');
        $this->addSql('ALTER TABLE amenity DROP FOREIGN KEY FK_AB6079633FD4699C');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1727ACA70');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89549213EC');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDECA943D59');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE401472AD');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE2A3CCEDD');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC4642A8E5');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC89358D81');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE amenity');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
