<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231015190635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaires_ouverture (id INT AUTO_INCREMENT NOT NULL, jours VARCHAR(255) DEFAULT NULL, debut_matin TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', fin_matin TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', debut_apres_midi TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', fin_apres_midi TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', is_public TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE horaires_ouverture');
    }
}
