<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190912111623 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto_proyecto (proyecto_id INT NOT NULL, producto_id INT NOT NULL, INDEX IDX_4741736CF625D1BA (proyecto_id), INDEX IDX_4741736C7645698E (producto_id), PRIMARY KEY(proyecto_id, producto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE producto_proyecto ADD CONSTRAINT FK_4741736CF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE producto_proyecto ADD CONSTRAINT FK_4741736C7645698E FOREIGN KEY (producto_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY fk_proyecto_localidad1');
        $this->addSql('DROP INDEX fk_proyecto_localidad1_idx ON proyecto');
        $this->addSql('ALTER TABLE proyecto ADD subsector_id INT DEFAULT NULL, DROP localidad_id, DROP codigo, DROP nombre, DROP codigo_bip, DROP tipologia_accion, DROP justificacion, DROP descripcion, DROP programa, DROP beneficiarios_directos, DROP beneficiarios_indirectos, DROP estimado_viviendas, DROP fecha');
        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT FK_6FD202B94AFA635E FOREIGN KEY (subsector_id) REFERENCES subsector (id)');
        $this->addSql('CREATE INDEX fk_proyecto_subsector1_idx ON proyecto (subsector_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

//        $this->addSql('DROP TABLE producto_proyecto');
//        $this->addSql('ALTER TABLE proyecto DROP FOREIGN KEY FK_6FD202B94AFA635E');
//        $this->addSql('DROP INDEX fk_proyecto_subsector1_idx ON proyecto');
        $this->addSql('ALTER TABLE proyecto ADD codigo VARCHAR(45) DEFAULT NULL COLLATE utf8_spanish2_ci, ADD nombre VARCHAR(100) NOT NULL COLLATE utf8_spanish2_ci, ADD codigo_bip VARCHAR(45) DEFAULT NULL COLLATE utf8_spanish2_ci, ADD tipologia_accion LONGTEXT DEFAULT NULL COLLATE utf8_spanish2_ci, ADD justificacion LONGTEXT DEFAULT NULL COLLATE utf8_spanish2_ci, ADD descripcion LONGTEXT DEFAULT NULL COLLATE utf8_spanish2_ci, ADD programa LONGTEXT DEFAULT NULL COLLATE utf8_spanish2_ci, ADD beneficiarios_indirectos INT DEFAULT NULL, ADD estimado_viviendas INT DEFAULT NULL, ADD fecha DATE DEFAULT NULL, ADD beneficiarios_directos INT DEFAULT NULL');
//        $this->addSql('ALTER TABLE proyecto ADD CONSTRAINT fk_proyecto_localidad1 FOREIGN KEY (localidad_id) REFERENCES localidad (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
//        $this->addSql('CREATE INDEX fk_proyecto_localidad1_idx ON proyecto (localidad_id)');
    }
}
