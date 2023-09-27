<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424113510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE participants_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE edmundoschema.participants_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE edmundoschema.participants (id INT NOT NULL, classes_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E1542E139E225B24 ON edmundoschema.participants (classes_id)');
        $this->addSql('CREATE INDEX IDX_E1542E1367B3B43D ON edmundoschema.participants (users_id)');
        $this->addSql('ALTER TABLE edmundoschema.participants ADD CONSTRAINT FK_E1542E139E225B24 FOREIGN KEY (classes_id) REFERENCES "edmundoschema"."classes" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE edmundoschema.participants ADD CONSTRAINT FK_E1542E1367B3B43D FOREIGN KEY (users_id) REFERENCES "edmundoschema"."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE participants DROP CONSTRAINT fk_716970929e225b24');
        $this->addSql('ALTER TABLE participants DROP CONSTRAINT fk_7169709267b3b43d');
        $this->addSql('DROP TABLE participants');
        $this->addSql('ALTER TABLE edmundoschema.classes DROP CONSTRAINT FK_4043EDF361220EA6');
        $this->addSql('ALTER TABLE edmundoschema.classes ADD CONSTRAINT FK_4043EDF361220EA6 FOREIGN KEY (creator_id) REFERENCES "edmundoschema"."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE edmundoschema.participants_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE participants_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE participants (id INT NOT NULL, classes_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_7169709267b3b43d ON participants (users_id)');
        $this->addSql('CREATE INDEX idx_716970929e225b24 ON participants (classes_id)');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT fk_716970929e225b24 FOREIGN KEY (classes_id) REFERENCES edmundoschema.classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT fk_7169709267b3b43d FOREIGN KEY (users_id) REFERENCES edmundoschema."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE edmundoschema.participants DROP CONSTRAINT FK_E1542E139E225B24');
        $this->addSql('ALTER TABLE edmundoschema.participants DROP CONSTRAINT FK_E1542E1367B3B43D');
        $this->addSql('DROP TABLE edmundoschema.participants');
        $this->addSql('ALTER TABLE "edmundoschema"."classes" DROP CONSTRAINT fk_4043edf361220ea6');
        $this->addSql('ALTER TABLE "edmundoschema"."classes" ADD CONSTRAINT fk_4043edf361220ea6 FOREIGN KEY (creator_id) REFERENCES edmundoschema."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
