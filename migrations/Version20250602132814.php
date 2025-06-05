<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250602132814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE boardgame_category (boardgame_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_3E9DDF39B1A27A21 (boardgame_id), INDEX IDX_3E9DDF3912469DE2 (category_id), PRIMARY KEY(boardgame_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category ADD CONSTRAINT FK_3E9DDF39B1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category ADD CONSTRAINT FK_3E9DDF3912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category DROP FOREIGN KEY FK_3E9DDF39B1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boardgame_category DROP FOREIGN KEY FK_3E9DDF3912469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boardgame_category
        SQL);
    }
}
