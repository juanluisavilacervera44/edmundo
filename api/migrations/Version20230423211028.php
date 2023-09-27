<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423211028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "edmundoschema"."classes_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "edmundoschema"."comments_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "edmundoschema"."events_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "edmundoschema"."messages_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "edmundoschema"."notifications_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "edmundoschema"."user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "edmundoschema"."classes" (id INT NOT NULL, name VARCHAR(100) NOT NULL, image VARCHAR(255) DEFAULT NULL, class_code VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "edmundoschema"."comments" (id INT NOT NULL, text VARCHAR(1000) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "edmundoschema"."events" (id INT NOT NULL, date DATE NOT NULL, text VARCHAR(1000) NOT NULL, notification VARCHAR(100) NOT NULL, repeat_notification VARCHAR(100) DEFAULT NULL, repeat_event VARCHAR(100) DEFAULT NULL, colour VARCHAR(7) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "edmundoschema"."messages" (id INT NOT NULL, text VARCHAR(1000) NOT NULL, date DATE NOT NULL, seen BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "edmundoschema"."notifications" (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "edmundoschema"."user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B924BD2E7927C74 ON "edmundoschema"."user" (email)');
        $this->addSql('ALTER TABLE edmundoschema.posts ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE edmundoschema.posts ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE edmundoschema.posts ADD video_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE edmundoschema.posts ADD text VARCHAR(1000) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "edmundoschema"."classes_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "edmundoschema"."comments_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "edmundoschema"."events_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "edmundoschema"."messages_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "edmundoschema"."notifications_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "edmundoschema"."user_id_seq" CASCADE');
        $this->addSql('DROP TABLE "edmundoschema"."classes"');
        $this->addSql('DROP TABLE "edmundoschema"."comments"');
        $this->addSql('DROP TABLE "edmundoschema"."events"');
        $this->addSql('DROP TABLE "edmundoschema"."messages"');
        $this->addSql('DROP TABLE "edmundoschema"."notifications"');
        $this->addSql('DROP TABLE "edmundoschema"."user"');
        $this->addSql('ALTER TABLE "edmundoschema"."posts" DROP title');
        $this->addSql('ALTER TABLE "edmundoschema"."posts" DROP image');
        $this->addSql('ALTER TABLE "edmundoschema"."posts" DROP video_url');
        $this->addSql('ALTER TABLE "edmundoschema"."posts" DROP text');
    }
}
