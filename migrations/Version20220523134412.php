<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523134412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase ADD theme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B59027487 FOREIGN KEY (theme_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6117D13B59027487 ON purchase (theme_id)');
        $this->addSql('ALTER TABLE purchase_item DROP FOREIGN KEY FK_6FA8ED7D4584665A');
        $this->addSql('ALTER TABLE purchase_item CHANGE supplement_name supplement_name VARCHAR(255) NOT NULL, CHANGE supplement_price supplement_price INT NOT NULL');
        $this->addSql('ALTER TABLE purchase_item ADD CONSTRAINT FK_6FA8ED7D7793FA21 FOREIGN KEY (supplement_id) REFERENCES supplement (id)');
        $this->addSql('ALTER TABLE purchase_item RENAME INDEX idx_6fa8ed7d4584665a TO IDX_6FA8ED7D7793FA21');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B59027487');
        $this->addSql('DROP INDEX IDX_6117D13B59027487 ON purchase');
        $this->addSql('ALTER TABLE purchase DROP theme_id');
        $this->addSql('ALTER TABLE purchase_item DROP FOREIGN KEY FK_6FA8ED7D7793FA21');
        $this->addSql('ALTER TABLE purchase_item CHANGE supplement_name supplement_name VARCHAR(255) DEFAULT NULL, CHANGE supplement_price supplement_price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase_item ADD CONSTRAINT FK_6FA8ED7D4584665A FOREIGN KEY (supplement_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE purchase_item RENAME INDEX idx_6fa8ed7d7793fa21 TO IDX_6FA8ED7D4584665A');
    }
}
