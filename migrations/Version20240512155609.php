<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512155609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, bloc_id INT NOT NULL, number INT NOT NULL, INDEX IDX_4D7E68545582E9C0 (bloc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer_service (id INT AUTO_INCREMENT NOT NULL, povider_id INT NOT NULL, service_id INT NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_40955CDB7889F3FE (povider_id), INDEX IDX_40955CDBED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68545582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE offer_service ADD CONSTRAINT FK_40955CDB7889F3FE FOREIGN KEY (povider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE offer_service ADD CONSTRAINT FK_40955CDBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68545582E9C0');
        $this->addSql('ALTER TABLE offer_service DROP FOREIGN KEY FK_40955CDB7889F3FE');
        $this->addSql('ALTER TABLE offer_service DROP FOREIGN KEY FK_40955CDBED5CA9E6');
        $this->addSql('DROP TABLE apartment');
        $this->addSql('DROP TABLE offer_service');
    }
}
