<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512161717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_service (id INT AUTO_INCREMENT NOT NULL, offer_service_id INT NOT NULL, resident_id INT NOT NULL, date DATE NOT NULL, confirmed TINYINT(1) NOT NULL, INDEX IDX_D16A217D71F66A32 (offer_service_id), INDEX IDX_D16A217D8012C5B0 (resident_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE occuption (id INT AUTO_INCREMENT NOT NULL, resident_id INT NOT NULL, apartment_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_C8E02B158012C5B0 (resident_id), INDEX IDX_C8E02B15176DFE85 (apartment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprerty_manager (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(8) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthday DATE NOT NULL, picture VARCHAR(255) NOT NULL, phone VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, resident_id INT NOT NULL, offer_service_id INT NOT NULL, content VARCHAR(255) NOT NULL, stars INT NOT NULL, INDEX IDX_794381C68012C5B0 (resident_id), INDEX IDX_794381C671F66A32 (offer_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217D71F66A32 FOREIGN KEY (offer_service_id) REFERENCES offer_service (id)');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217D8012C5B0 FOREIGN KEY (resident_id) REFERENCES resident (id)');
        $this->addSql('ALTER TABLE occuption ADD CONSTRAINT FK_C8E02B158012C5B0 FOREIGN KEY (resident_id) REFERENCES resident (id)');
        $this->addSql('ALTER TABLE occuption ADD CONSTRAINT FK_C8E02B15176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartment (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C68012C5B0 FOREIGN KEY (resident_id) REFERENCES resident (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C671F66A32 FOREIGN KEY (offer_service_id) REFERENCES offer_service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_service DROP FOREIGN KEY FK_D16A217D71F66A32');
        $this->addSql('ALTER TABLE demande_service DROP FOREIGN KEY FK_D16A217D8012C5B0');
        $this->addSql('ALTER TABLE occuption DROP FOREIGN KEY FK_C8E02B158012C5B0');
        $this->addSql('ALTER TABLE occuption DROP FOREIGN KEY FK_C8E02B15176DFE85');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C68012C5B0');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C671F66A32');
        $this->addSql('DROP TABLE demande_service');
        $this->addSql('DROP TABLE occuption');
        $this->addSql('DROP TABLE proprerty_manager');
        $this->addSql('DROP TABLE review');
    }
}
