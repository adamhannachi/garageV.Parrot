<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231007121510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact_annonce (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL,
         last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, sujet VARCHAR(255) NOT NULL,
          message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_annonce_product (contact_annonce_id INT NOT NULL, product_id INT NOT NULL,
         INDEX IDX_B232A1F34FBCF2B8 (contact_annonce_id), INDEX IDX_B232A1F34584665A (product_id),
          PRIMARY KEY(contact_annonce_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact_annonce_product ADD CONSTRAINT FK_B232A1F34FBCF2B8 FOREIGN KEY (contact_annonce_id) REFERENCES
         contact_annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_annonce_product ADD CONSTRAINT FK_B232A1F34584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact_annonce_product DROP FOREIGN KEY FK_B232A1F34FBCF2B8');
        $this->addSql('ALTER TABLE contact_annonce_product DROP FOREIGN KEY FK_B232A1F34584665A');
        $this->addSql('DROP TABLE contact_annonce');
        $this->addSql('DROP TABLE contact_annonce_product');
    }
}
