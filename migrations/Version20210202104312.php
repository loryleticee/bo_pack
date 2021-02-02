<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202104312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_category_user');
        $this->addSql('DROP TABLE user_reason');
        $this->addSql('ALTER TABLE user DROP phone, DROP job, DROP localisation, DROP img');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_category_user (user_id INT NOT NULL, category_user_id INT NOT NULL, INDEX IDX_E886015E60B693EB (category_user_id), INDEX IDX_E886015EA76ED395 (user_id), PRIMARY KEY(user_id, category_user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_reason (user_id INT NOT NULL, reason_id INT NOT NULL, INDEX IDX_5EEA933159BB1592 (reason_id), INDEX IDX_5EEA9331A76ED395 (user_id), PRIMARY KEY(user_id, reason_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_category_user ADD CONSTRAINT FK_E886015E60B693EB FOREIGN KEY (category_user_id) REFERENCES category_user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_category_user ADD CONSTRAINT FK_E886015EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reason ADD CONSTRAINT FK_5EEA933159BB1592 FOREIGN KEY (reason_id) REFERENCES reason (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_reason ADD CONSTRAINT FK_5EEA9331A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD job VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD localisation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
