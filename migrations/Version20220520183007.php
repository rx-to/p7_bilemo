<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220520183007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer_product_declination DROP FOREIGN KEY FK_AD173EF6CA28D71E');
        $this->addSql('DROP TABLE customer_product_declination');
        $this->addSql('DROP TABLE product_declination');
        $this->addSql('ALTER TABLE product ADD color VARCHAR(50) NOT NULL, ADD storage INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customer_product_declination (id INT AUTO_INCREMENT NOT NULL, product_declination_id INT NOT NULL, customer_id INT NOT NULL, stock INT NOT NULL, INDEX IDX_AD173EF6CA28D71E (product_declination_id), INDEX IDX_AD173EF69395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE product_declination (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, color VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, storage INT NOT NULL, INDEX IDX_9177C85A4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE customer_product_declination ADD CONSTRAINT FK_AD173EF69395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_product_declination ADD CONSTRAINT FK_AD173EF6CA28D71E FOREIGN KEY (product_declination_id) REFERENCES product_declination (id)');
        $this->addSql('ALTER TABLE product_declination ADD CONSTRAINT FK_9177C85A4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product DROP color, DROP storage');
    }
}
