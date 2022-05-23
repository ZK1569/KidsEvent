<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523141352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B59027487');
        $this->addSql('DROP INDEX IDX_6117D13B59027487 ON purchase');
        $this->addSql('ALTER TABLE purchase DROP theme_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B59027487 FOREIGN KEY (theme_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6117D13B59027487 ON purchase (theme_id)');
    }
}
