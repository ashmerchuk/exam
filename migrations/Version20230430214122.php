<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430214122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migrations is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE IF NOT EXISTS skills (id SERIAL PRIMARY KEY, name VARCHAR(255) NOT NULL)");

    }

    public function down(Schema $schema): void
    {
        // this down() migrations is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
    }
}
