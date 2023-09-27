<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424103526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edmundoschema.classes ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE edmundoschema.classes ADD CONSTRAINT FK_4043EDF361220EA6 FOREIGN KEY (creator_id) REFERENCES "edmundoschema"."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4043EDF361220EA6 ON edmundoschema.classes (creator_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "edmundoschema"."classes" DROP CONSTRAINT FK_4043EDF361220EA6');
        $this->addSql('DROP INDEX IDX_4043EDF361220EA6');
        $this->addSql('ALTER TABLE "edmundoschema"."classes" DROP creator_id');
    }
}
