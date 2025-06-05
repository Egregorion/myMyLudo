<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250604141111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE user_boardgame (user_id INT NOT NULL, boardgame_id INT NOT NULL, INDEX IDX_984156F9A76ED395 (user_id), INDEX IDX_984156F9B1A27A21 (boardgame_id), PRIMARY KEY(user_id, boardgame_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame ADD CONSTRAINT FK_984156F9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame ADD CONSTRAINT FK_984156F9B1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame DROP FOREIGN KEY FK_984156F9A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_boardgame DROP FOREIGN KEY FK_984156F9B1A27A21
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_boardgame
        SQL);
    }
}
