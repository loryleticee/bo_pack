<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205094941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_category_document DROP FOREIGN KEY FK_7AFDFC674A43A5C');
        $this->addSql('ALTER TABLE congres_user DROP FOREIGN KEY FK_BCC0194826421E35');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7626421E35');
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E13926421E35');
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E1399395C3F3');
        $this->addSql('ALTER TABLE document_category_document DROP FOREIGN KEY FK_7AFDFC6C33F7837');
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E13959BB1592');
        $this->addSql('DROP TABLE category_document');
        $this->addSql('DROP TABLE category_user');
        $this->addSql('DROP TABLE congres');
        $this->addSql('DROP TABLE congres_user');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_category_document');
        $this->addSql('DROP TABLE meeting');
        $this->addSql('DROP TABLE reason');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_document (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category_user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE congres (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, created_at DATETIME NOT NULL, security_code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, duration_meeting TIME NOT NULL, hour_min TIME NOT NULL, hour_max TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE congres_user (congres_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_BCC0194826421E35 (congres_id), INDEX IDX_BCC01948A76ED395 (user_id), PRIMARY KEY(congres_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, civility VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, localisation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, congres_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, about LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, doc_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, img VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number_download INT DEFAULT NULL, ref VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, size VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, INDEX IDX_D8698A7626421E35 (congres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE document_category_document (document_id INT NOT NULL, category_document_id INT NOT NULL, INDEX IDX_7AFDFC674A43A5C (category_document_id), INDEX IDX_7AFDFC6C33F7837 (document_id), PRIMARY KEY(document_id, category_document_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE meeting (id INT AUTO_INCREMENT NOT NULL, congres_id INT NOT NULL, user_id INT NOT NULL, reason_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME DEFAULT NULL, is_open TINYINT(1) NOT NULL, is_reserved TINYINT(1) NOT NULL, is_cancel TINYINT(1) DEFAULT NULL, reason_cancel LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_F515E13926421E35 (congres_id), INDEX IDX_F515E13959BB1592 (reason_id), INDEX IDX_F515E139A76ED395 (user_id), UNIQUE INDEX UNIQ_F515E1399395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reason (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE congres_user ADD CONSTRAINT FK_BCC0194826421E35 FOREIGN KEY (congres_id) REFERENCES congres (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE congres_user ADD CONSTRAINT FK_BCC01948A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7626421E35 FOREIGN KEY (congres_id) REFERENCES congres (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE document_category_document ADD CONSTRAINT FK_7AFDFC674A43A5C FOREIGN KEY (category_document_id) REFERENCES category_document (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_category_document ADD CONSTRAINT FK_7AFDFC6C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E13926421E35 FOREIGN KEY (congres_id) REFERENCES congres (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E13959BB1592 FOREIGN KEY (reason_id) REFERENCES reason (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E1399395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E139A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
