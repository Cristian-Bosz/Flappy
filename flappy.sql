DROP DATABASE IF EXISTS flappy;
CREATE DATABASE IF NOT EXISTS flappy;
USE flappy;


CREATE TABLE IF NOT EXISTS privilegios(
    privilegio_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombrePrivilegio    VARCHAR(80) NOT NULL

) ENGINE = innoDB;

INSERT INTO privilegios 
VALUES (1, 'Administrador'),
       (2, 'Común');



CREATE TABLE IF NOT EXISTS usuarios (
  usuario_id INT UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  correo VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  fecha_registro TIMESTAMP NOT NULL,
  privilegio_id_fk INT UNSIGNED NOT NULL,

    FOREIGN KEY (privilegio_id_fk) REFERENCES privilegios (privilegio_id) ON DELETE RESTRICT ON UPDATE CASCADE)
ENGINE = InnoDB;
