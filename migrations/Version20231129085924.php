<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129085924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clothes (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, type_id INT DEFAULT NULL, size_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, image_url LONGTEXT DEFAULT NULL, INDEX IDX_3079B48C12469DE2 (category_id), INDEX IDX_3079B48CC54C8C93 (type_id), INDEX IDX_3079B48C498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clothes_size (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clothes_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoes (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, type_id INT DEFAULT NULL, size_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, image_url LONGTEXT DEFAULT NULL, INDEX IDX_14CF819712469DE2 (category_id), INDEX IDX_14CF8197C54C8C93 (type_id), INDEX IDX_14CF8197498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoes_size (id INT AUTO_INCREMENT NOT NULL, size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shoes_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clothes ADD CONSTRAINT FK_3079B48C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE clothes ADD CONSTRAINT FK_3079B48CC54C8C93 FOREIGN KEY (type_id) REFERENCES clothes_type (id)');
        $this->addSql('ALTER TABLE clothes ADD CONSTRAINT FK_3079B48C498DA827 FOREIGN KEY (size_id) REFERENCES clothes_size (id)');
        $this->addSql('ALTER TABLE shoes ADD CONSTRAINT FK_14CF819712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE shoes ADD CONSTRAINT FK_14CF8197C54C8C93 FOREIGN KEY (type_id) REFERENCES shoes_type (id)');
        $this->addSql('ALTER TABLE shoes ADD CONSTRAINT FK_14CF8197498DA827 FOREIGN KEY (size_id) REFERENCES shoes_size (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clothes DROP FOREIGN KEY FK_3079B48C12469DE2');
        $this->addSql('ALTER TABLE clothes DROP FOREIGN KEY FK_3079B48CC54C8C93');
        $this->addSql('ALTER TABLE clothes DROP FOREIGN KEY FK_3079B48C498DA827');
        $this->addSql('ALTER TABLE shoes DROP FOREIGN KEY FK_14CF819712469DE2');
        $this->addSql('ALTER TABLE shoes DROP FOREIGN KEY FK_14CF8197C54C8C93');
        $this->addSql('ALTER TABLE shoes DROP FOREIGN KEY FK_14CF8197498DA827');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE clothes');
        $this->addSql('DROP TABLE clothes_size');
        $this->addSql('DROP TABLE clothes_type');
        $this->addSql('DROP TABLE shoes');
        $this->addSql('DROP TABLE shoes_size');
        $this->addSql('DROP TABLE shoes_type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
