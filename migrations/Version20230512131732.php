<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512131732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gateau ADD images_id INT NOT NULL');
        $this->addSql('ALTER TABLE gateau ADD CONSTRAINT FK_F6A921E9D44F05E5 FOREIGN KEY (images_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_F6A921E9D44F05E5 ON gateau (images_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FE3E72046');
        $this->addSql('DROP INDEX IDX_C53D045FE3E72046 ON image');
        $this->addSql('ALTER TABLE image DROP gateau_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gateau DROP FOREIGN KEY FK_F6A921E9D44F05E5');
        $this->addSql('DROP INDEX IDX_F6A921E9D44F05E5 ON gateau');
        $this->addSql('ALTER TABLE gateau DROP images_id');
        $this->addSql('ALTER TABLE image ADD gateau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FE3E72046 FOREIGN KEY (gateau_id) REFERENCES gateau (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FE3E72046 ON image (gateau_id)');
    }
}
