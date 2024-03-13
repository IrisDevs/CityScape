<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313155310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89549213EC');
        $this->addSql('DROP INDEX IDX_16DB4F89549213EC ON picture');
        $this->addSql('ALTER TABLE picture ADD pic_property_id INT DEFAULT NULL, ADD pic_size INT DEFAULT NULL, DROP property_id, DROP image_size, CHANGE attachment pic_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8931C778CF FOREIGN KEY (pic_property_id) REFERENCES property (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8931C778CF ON picture (pic_property_id)');
        $this->addSql('ALTER TABLE property DROP address');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8931C778CF');
        $this->addSql('DROP INDEX IDX_16DB4F8931C778CF ON picture');
        $this->addSql('ALTER TABLE picture ADD property_id INT DEFAULT NULL, ADD image_size INT DEFAULT NULL, DROP pic_property_id, DROP pic_size, CHANGE pic_name attachment VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_16DB4F89549213EC ON picture (property_id)');
        $this->addSql('ALTER TABLE property ADD address VARCHAR(255) DEFAULT NULL');
    }
}
