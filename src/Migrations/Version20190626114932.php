<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190626114932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE tuser ADD views_count INT DEFAULT 0');
        $this->addSql('ALTER TABLE tuser ADD browser VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tuser ADD os VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tuser ADD service_provider VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tuser ALTER ip_adress SET DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tuser DROP views_count');
        $this->addSql('ALTER TABLE tuser DROP browser');
        $this->addSql('ALTER TABLE tuser DROP os');
        $this->addSql('ALTER TABLE tuser DROP service_provider');
        $this->addSql('ALTER TABLE tuser ALTER ip_adress DROP NOT NULL');
    }
}
