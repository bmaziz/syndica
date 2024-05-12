<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240512163111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manager_residence ADD residence_id INT NOT NULL, ADD owner_since DATE NOT NULL, ADD left_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE manager_residence ADD CONSTRAINT FK_490C971A8B225FBD FOREIGN KEY (residence_id) REFERENCES residence (id)');
        $this->addSql('CREATE INDEX IDX_490C971A8B225FBD ON manager_residence (residence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manager_residence DROP FOREIGN KEY FK_490C971A8B225FBD');
        $this->addSql('DROP INDEX IDX_490C971A8B225FBD ON manager_residence');
        $this->addSql('ALTER TABLE manager_residence DROP residence_id, DROP owner_since, DROP left_at');
    }
}
