<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170222100441 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY participant_ibfk_1');
        $this->addSql('ALTER TABLE participant CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE created_by created_by INT NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11DE12AB56 FOREIGN KEY (created_by) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE feedback CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE created_by created_by INT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feedback CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE created_by created_by INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11DE12AB56');
        $this->addSql('ALTER TABLE participant CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE created_by created_by INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT participant_ibfk_1 FOREIGN KEY (created_by) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
    }
}
