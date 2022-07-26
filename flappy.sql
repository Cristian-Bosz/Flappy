DROP DATABASE IF EXISTS flappy;
CREATE DATABASE IF NOT EXISTS flappy;
USE flappy;


CREATE TABLE IF NOT EXISTS privilegios(
    privilegio_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombrePrivilegio  VARCHAR(80) NOT NULL

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



INSERT INTO usuarios 
VALUES (1, 'cristianbosz@hotmail.com', 'cristian', '$2y$10$v/S24tCZcj7oTgcpHA1XCOFTVmlkRsn9Xqmd8LDnywh9IKZUmEQVW', '2022-07-24 12:08:33', 1),
      (2, 'agustinzoric@gmail.com', 'agustin', '$2y$10$v/S24tCZcj7oTgcpHA1XCOFTVmlkRsn9Xqmd8LDnywh9IKZUmEQVW', '2022-07-24 12:08:43', 1);



CREATE TABLE IF NOT EXISTS perfil (
  perfil_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombreCompleto VARCHAR(100) NOT NULL,
  fotoPerfil VARCHAR(250) NOT NULL,
  usuario_id_fk INT UNSIGNED NOT NULL,
 
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) ON DELETE NO ACTION  ON UPDATE NO ACTION)
 
ENGINE = InnoDB;

INSERT INTO perfil 
VALUES (1, 	'Cristian Bösz', 	'img/imagenesPerfil/tony.jpg', 	1),
       (2, 	'Agustin Zoric', 	'img/imagenesPerfil/miguel.jpg', 	2);
     

