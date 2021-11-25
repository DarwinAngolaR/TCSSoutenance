<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125220556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyages ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE voyages ADD CONSTRAINT FK_30F7F9F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_30F7F9F675F31B ON voyages (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyages DROP FOREIGN KEY FK_30F7F9F675F31B');
        $this->addSql('DROP INDEX IDX_30F7F9F675F31B ON voyages');
        $this->addSql('ALTER TABLE voyages DROP author_id');
    }
}
