<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190910133212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE subsector ADD nombre VARCHAR(255) NOT NULL, ADD codigo VARCHAR(255) NOT NULL, CHANGE sector_id sector_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE casa CHANGE sector_id sector_id INT DEFAULT NULL, CHANGE subsector_id subsector_id INT DEFAULT NULL, CHANGE localidad_id localidad_id INT DEFAULT NULL, CHANGE propietario_id propietario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE caseta_sanitaria CHANGE subsector_id subsector_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comuna CHANGE provincia_id provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localidad CHANGE comuna_id comuna_id INT DEFAULT NULL, CHANGE sector_id sector_id INT DEFAULT NULL, CHANGE subsector_id subsector_id INT DEFAULT NULL, CHANGE personas personas INT NOT NULL, CHANGE casas casas INT NOT NULL, CHANGE pararrayos pararrayos INT NOT NULL');
        $this->addSql('ALTER TABLE panel_solar CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE casa_id casa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pararrayo CHANGE subsector_id subsector_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE provincia CHANGE region_id region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proyecto CHANGE subsector_id subsector_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE producto_proyecto RENAME INDEX fk_proyecto_has_producto_proyecto1_idx TO IDX_4741736CF625D1BA');
        $this->addSql('ALTER TABLE producto_proyecto RENAME INDEX fk_proyecto_has_producto_producto1_idx TO IDX_4741736C7645698E');
        $this->addSql('ALTER TABLE region DROP numero');
        $this->addSql('ALTER TABLE servicio_agua CHANGE casa_id casa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE servicio_luz CHANGE casa_id casa_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE casa CHANGE localidad_id localidad_id INT NOT NULL, CHANGE subsector_id subsector_id INT NOT NULL, CHANGE sector_id sector_id INT NOT NULL, CHANGE propietario_id propietario_id INT NOT NULL');
        $this->addSql('ALTER TABLE caseta_sanitaria CHANGE subsector_id subsector_id INT NOT NULL');
        $this->addSql('ALTER TABLE comuna CHANGE provincia_id provincia_id INT NOT NULL');
        $this->addSql('ALTER TABLE localidad CHANGE subsector_id subsector_id INT NOT NULL, CHANGE sector_id sector_id INT NOT NULL, CHANGE comuna_id comuna_id INT NOT NULL, CHANGE personas personas INT DEFAULT 0 NOT NULL, CHANGE casas casas INT DEFAULT 0 NOT NULL, CHANGE pararrayos pararrayos INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE panel_solar CHANGE id id INT NOT NULL, CHANGE casa_id casa_id INT NOT NULL');
        $this->addSql('ALTER TABLE pararrayo CHANGE subsector_id subsector_id INT NOT NULL');
        $this->addSql('ALTER TABLE producto_proyecto RENAME INDEX idx_4741736cf625d1ba TO fk_proyecto_has_producto_proyecto1_idx');
        $this->addSql('ALTER TABLE producto_proyecto RENAME INDEX idx_4741736c7645698e TO fk_proyecto_has_producto_producto1_idx');
        $this->addSql('ALTER TABLE provincia CHANGE region_id region_id INT NOT NULL');
        $this->addSql('ALTER TABLE proyecto CHANGE subsector_id subsector_id INT NOT NULL');
        $this->addSql('ALTER TABLE region ADD numero VARCHAR(45) NOT NULL COLLATE utf8_spanish2_ci');
        $this->addSql('ALTER TABLE servicio_agua CHANGE casa_id casa_id INT NOT NULL');
        $this->addSql('ALTER TABLE servicio_luz CHANGE casa_id casa_id INT NOT NULL');
        $this->addSql('ALTER TABLE subsector DROP nombre, DROP codigo, CHANGE sector_id sector_id INT NOT NULL');
    }
}
