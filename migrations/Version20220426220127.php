<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426220127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_product_declination (id INT AUTO_INCREMENT NOT NULL, product_declination_id INT NOT NULL, customer_id INT NOT NULL, stock INT NOT NULL, INDEX IDX_AD173EF6CA28D71E (product_declination_id), INDEX IDX_AD173EF69395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, operating_system VARCHAR(255) NOT NULL, megapixels VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_declination (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, color VARCHAR(255) NOT NULL, storage INT NOT NULL, INDEX IDX_9177C85A4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, surname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, personal_title VARCHAR(3) NOT NULL, birthdate DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_product_declination (id INT AUTO_INCREMENT NOT NULL, product_declination_id INT NOT NULL, user_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_BBB4A728CA28D71E (product_declination_id), INDEX IDX_BBB4A728A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customer_product_declination ADD CONSTRAINT FK_AD173EF6CA28D71E FOREIGN KEY (product_declination_id) REFERENCES product_declination (id)');
        $this->addSql('ALTER TABLE customer_product_declination ADD CONSTRAINT FK_AD173EF69395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE product_declination ADD CONSTRAINT FK_9177C85A4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE user_product_declination ADD CONSTRAINT FK_BBB4A728CA28D71E FOREIGN KEY (product_declination_id) REFERENCES product_declination (id)');
        $this->addSql('ALTER TABLE user_product_declination ADD CONSTRAINT FK_BBB4A728A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_product_declination DROP FOREIGN KEY FK_AD173EF69395C3F3');
        $this->addSql('ALTER TABLE product_declination DROP FOREIGN KEY FK_9177C85A4584665A');
        $this->addSql('ALTER TABLE customer_product_declination DROP FOREIGN KEY FK_AD173EF6CA28D71E');
        $this->addSql('ALTER TABLE user_product_declination DROP FOREIGN KEY FK_BBB4A728CA28D71E');
        $this->addSql('ALTER TABLE user_product_declination DROP FOREIGN KEY FK_BBB4A728A76ED395');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_product_declination');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_declination');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_product_declination');
    }
}
