<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260426200404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE registro_entrada (id INT AUTO_INCREMENT NOT NULL, fecha_entrada DATE NOT NULL, hora_entrada TIME NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, identificacion VARCHAR(100) DEFAULT NULL, persona_que_visita VARCHAR(255) DEFAULT NULL, departamento_que_visita VARCHAR(255) DEFAULT NULL, motivo_de_visita LONGTEXT DEFAULT NULL, fecha_salida DATE DEFAULT NULL, hora_salida TIME DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE registro_entrada');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }
}
