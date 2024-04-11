<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410081507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, events VARCHAR(200) NOT NULL, dp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, description VARCHAR(255) NOT NULL, date VARCHAR(200) NOT NULL, venue VARCHAR(200) NOT NULL, artist VARCHAR(200) NOT NULL, tickets INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, event VARCHAR(200) NOT NULL, type VARCHAR(200) NOT NULL, price NUMERIC(10, 2) NOT NULL, quantity_available INT NOT NULL, quantity_sold INT NOT NULL, sale_startdate DATETIME NOT NULL, sale_enddate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE venue (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, address VARCHAR(200) NOT NULL, city VARCHAR(200) NOT NULL, country VARCHAR(200) NOT NULL, capacity INT NOT NULL, events VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE venue');
    }
}
