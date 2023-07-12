<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230712100628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, creator_id INT NOT NULL, difficulty_id INT NOT NULL, status_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_A412FA9261220EA6 (creator_id), INDEX IDX_A412FA92FCFA9DAE (difficulty_id), INDEX IDX_A412FA926BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz_theme (quiz_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_6B069E88853CD175 (quiz_id), INDEX IDX_6B069E8859027487 (theme_id), PRIMARY KEY(quiz_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA9261220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92FCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA926BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE quiz_theme ADD CONSTRAINT FK_6B069E88853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quiz_theme ADD CONSTRAINT FK_6B069E8859027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA9261220EA6');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92FCFA9DAE');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA926BF700BD');
        $this->addSql('ALTER TABLE quiz_theme DROP FOREIGN KEY FK_6B069E88853CD175');
        $this->addSql('ALTER TABLE quiz_theme DROP FOREIGN KEY FK_6B069E8859027487');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quiz_theme');
    }
}
