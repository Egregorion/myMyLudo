<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250613085328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE boardgame_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE reviews_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boardgame (id INT NOT NULL, title VARCHAR(100) NOT NULL, release_year SMALLINT NOT NULL, publisher VARCHAR(55) NOT NULL, picture VARCHAR(255) NOT NULL, player_number VARCHAR(10) NOT NULL, age VARCHAR(10) NOT NULL, average_duration SMALLINT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boardgame_category (boardgame_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(boardgame_id, category_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3E9DDF39B1A27A21 ON boardgame_category (boardgame_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3E9DDF3912469DE2 ON boardgame_category (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE category (id INT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reviews (id INT NOT NULL, boardgame_id INT NOT NULL, user_id INT NOT NULL, rating INT NOT NULL, commentary VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6970EB0FB1A27A21 ON reviews (boardgame_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6970EB0FA76ED395 ON reviews (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON "user" (pseudo)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_boardgame (user_id INT NOT NULL, boardgame_id INT NOT NULL, PRIMARY KEY(user_id, boardgame_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_984156F9A76ED395 ON user_boardgame (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_984156F9B1A27A21 ON user_boardgame (boardgame_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.available_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN messenger_messages.delivered_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
                BEGIN
                    PERFORM pg_notify('messenger_messages', NEW.queue_name::text);
                    RETURN NEW;
                END;
            $$ LANGUAGE plpgsql;
        SQL);
        $this->addSql(<<<'SQL'
            DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category ADD CONSTRAINT FK_3E9DDF39B1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category ADD CONSTRAINT FK_3E9DDF3912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FB1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame ADD CONSTRAINT FK_984156F9A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame ADD CONSTRAINT FK_984156F9B1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE boardgame_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE category_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE reviews_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP SEQUENCE user_id_seq CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category DROP CONSTRAINT FK_3E9DDF39B1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category DROP CONSTRAINT FK_3E9DDF3912469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews DROP CONSTRAINT FK_6970EB0FB1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviews DROP CONSTRAINT FK_6970EB0FA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame DROP CONSTRAINT FK_984156F9A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame DROP CONSTRAINT FK_984156F9B1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boardgame
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boardgame_category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE category
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reviews
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE "user"
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_boardgame
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
