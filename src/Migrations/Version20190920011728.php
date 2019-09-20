<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920011728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subsector ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE comuna ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL, ADD descripcion VARCHAR(255) DEFAULT NULL, ADD altura VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE localidad ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL, ADD altura VARCHAR(255) DEFAULT NULL, ADD descripcion VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE region ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL, ADD altura VARCHAR(255) DEFAULT NULL, ADD descripcion VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sector ADD latitud VARCHAR(255) DEFAULT NULL, ADD longitud VARCHAR(255) DEFAULT NULL, ADD altura VARCHAR(255) DEFAULT NULL, ADD descripcion VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comuna DROP latitud, DROP longitud, DROP descripcion, DROP altura');
        $this->addSql('ALTER TABLE localidad DROP latitud, DROP longitud');
        $this->addSql('ALTER TABLE provincia DROP latitud, DROP longitud, DROP altura, DROP descripcion');
        $this->addSql('ALTER TABLE region DROP latitud, DROP longitud, DROP altura, DROP descripcion');
        $this->addSql('ALTER TABLE sector DROP latitud, DROP longitud, DROP altura, DROP descripcion');
        $this->addSql('ALTER TABLE subsector DROP latitud, DROP longitud');
    }
}
