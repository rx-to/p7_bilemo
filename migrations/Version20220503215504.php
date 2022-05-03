<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503215504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_product_declination');
        $this->addSql('ALTER TABLE customer CHANGE city city VARCHAR(50) NOT NULL, CHANGE telephone phone_number VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE megapixels megapixels INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD customer_id INT NOT NULL, CHANGE name name VARCHAR(50) NOT NULL, CHANGE city city VARCHAR(50) NOT NULL, CHANGE personal_title personal_title VARCHAR(5) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499395C3F3 ON user (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_product_declination (id INT AUTO_INCREMENT NOT NULL, product_declination_id INT NOT NULL, user_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_BBB4A728CA28D71E (product_declination_id), INDEX IDX_BBB4A728A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_product_declination ADD CONSTRAINT FK_BBB4A728A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_product_declination ADD CONSTRAINT FK_BBB4A728CA28D71E FOREIGN KEY (product_declination_id) REFERENCES product_declination (id)');
        $this->addSql('ALTER TABLE customer CHANGE city city VARCHAR(255) NOT NULL, CHANGE phone_number telephone VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE megapixels megapixels VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499395C3F3');
        $this->addSql('DROP INDEX IDX_8D93D6499395C3F3 ON user');
        $this->addSql('ALTER TABLE user DROP customer_id, CHANGE name name VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE personal_title personal_title VARCHAR(3) NOT NULL');
    }
}
