<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190920004809 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE producto_proyecto');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B94AFA635E');
        $this->addSql('DROP INDEX fk_proyecto_subsector1_idx ON proyecto');
        $this->addSql('ALTER TABLE proyecto ADD codigo VARCHAR(45) DEFAULT NULL, ADD nombre VARCHAR(100) NOT NULL, ADD codigo_bip VARCHAR(45) DEFAULT NULL, ADD tipologia_accion LONGTEXT DEFAULT NULL, ADD justificacion LONGTEXT DEFAULT NULL, ADD descripcion LONGTEXT DEFAULT NULL, ADD programa LONGTEXT DEFAULT NULL, ADD beneficiarios_directos INT DEFAULT NULL, ADD beneficiarios_indirectos INT DEFAULT NULL, ADD estimado_viviendas INT DEFAULT NULL, ADD fecha DATE DEFAULT NULL, CHANGE subsector_id localidad_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B967707C89 FOREIGN KEY (localidad_id) REFERENCES localidad (id)');
        $this->addSql('CREATE INDEX fk_proyecto_localidad1_idx ON proyecto (localidad_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto_proyecto (proyecto_id INT NOT NULL, producto_id INT NOT NULL, INDEX IDX_4741736CF625D1BA (proyecto_id), INDEX IDX_4741736C7645698E (producto_id), PRIMARY KEY(proyecto_id, producto_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE producto_proyecto ADD CONSTRAINT FK_4741736C7645698E FOREIGN KEY (producto_id) REFERENCES producto (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE producto_proyecto ADD CONSTRAINT FK_4741736CF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B967707C89');
        $this->addSql('DROP INDEX fk_proyecto_localidad1_idx ON proyecto');
        $this->addSql('ALTER TABLE proyecto ADD subsector_id INT DEFAULT NULL, DROP localidad_id, DROP codigo, DROP nombre, DROP codigo_bip, DROP tipologia_accion, DROP justificacion, DROP descripcion, DROP programa, DROP beneficiarios_directos, DROP beneficiarios_indirectos, DROP estimado_viviendas, DROP fecha');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B94AFA635E FOREIGN KEY (subsector_id) REFERENCES subsector (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_proyecto_subsector1_idx ON proyecto (subsector_id)');
    }
}
