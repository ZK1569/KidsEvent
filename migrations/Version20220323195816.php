<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323195816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase ADD purchased_at DATETIME, ADD reserve_for DATETIME');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        
        $this->addSql('UPDATE purchase SET purchased_at = NOW()');
        $this->addSql('UPDATE purchase SET reserve_for = NOW()');

        $this->addSql('ALTER TABLE purchase MODIFY purchased_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE purchase MODIFY reserve_for DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13BA76ED395');
        $this->addSql('ALTER TABLE purchase DROP purchased_at, DROP reserve_for');
    }
}
