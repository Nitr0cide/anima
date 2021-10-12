<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211012134234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, first_air_date VARCHAR(255) DEFAULT NULL, ids JSON DEFAULT NULL, alt_titles JSON DEFAULT NULL, rank INT DEFAULT NULL, poster VARCHAR(255) DEFAULT NULL, fanart VARCHAR(255) DEFAULT NULL, first_aired DATETIME DEFAULT NULL, airs JSON DEFAULT NULL, runtime INT DEFAULT NULL, overview VARCHAR(5000) DEFAULT NULL, genres JSON DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, total_episodes INT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, ratings JSON DEFAULT NULL, trailers JSON DEFAULT NULL, users_recommendations JSON DEFAULT NULL, relations JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anime');
    }
}
