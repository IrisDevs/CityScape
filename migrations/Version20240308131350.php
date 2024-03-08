<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308131350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8931C778CF');
        $this->addSql('DROP INDEX IDX_16DB4F8931C778CF ON picture');
        $this->addSql('ALTER TABLE picture ADD property_id INT DEFAULT NULL, ADD image_size INT DEFAULT NULL, ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', DROP pic_property_id, DROP pic_file, DROP pic_name, DROP pic_href, DROP pic_alt, DROP pic_type, DROP pic_format, DROP pic_width, DROP pic_height, DROP pic_size, CHANGE pic_caption image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F89549213EC ON picture (property_id)');
        $this->addSql('ALTER TABLE property ADD category_id INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDE12469DE2 ON property (category_id)');
        $this->addSql('ALTER TABLE user ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD user_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89549213EC');
        $this->addSql('DROP INDEX IDX_16DB4F89549213EC ON picture');
        $this->addSql('ALTER TABLE picture ADD pic_property_id INT NOT NULL, ADD pic_file VARCHAR(255) NOT NULL, ADD pic_name LONGTEXT DEFAULT NULL, ADD pic_href VARCHAR(255) NOT NULL, ADD pic_alt VARCHAR(255) NOT NULL, ADD pic_type VARCHAR(255) NOT NULL, ADD pic_format LONGTEXT NOT NULL, ADD pic_width INT NOT NULL, ADD pic_height INT NOT NULL, ADD pic_size DOUBLE PRECISION NOT NULL, DROP property_id, DROP image_size, DROP created_at, DROP updated_at, CHANGE image_name pic_caption VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8931C778CF FOREIGN KEY (pic_property_id) REFERENCES property (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_16DB4F8931C778CF ON picture (pic_property_id)');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE12469DE2');
        $this->addSql('DROP INDEX IDX_8BF21CDE12469DE2 ON property');
        $this->addSql('ALTER TABLE property DROP category_id, DROP updated_at, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user DROP last_name, DROP first_name, DROP user_name');
    }
}
