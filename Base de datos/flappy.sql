DROP DATABASE IF EXISTS flappy;
CREATE DATABASE IF NOT EXISTS flappy;
USE flappy;


CREATE TABLE IF NOT EXISTS privilegios(
    privilegio_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombrePrivilegio  VARCHAR(80) NOT NULL
)ENGINE = innoDB;

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
    FOREIGN KEY (privilegio_id_fk) REFERENCES privilegios (privilegio_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE = InnoDB;

INSERT INTO usuarios 
VALUES (1, 'cristianbosz@hotmail.com', 'Cristian', '$2y$10$v/S24tCZcj7oTgcpHA1XCOFTVmlkRsn9Xqmd8LDnywh9IKZUmEQVW', '2022-07-24 12:08:33', 1),
      (2, 'agustinzoric@gmail.com', 'Agustin', '$2y$10$v/S24tCZcj7oTgcpHA1XCOFTVmlkRsn9Xqmd8LDnywh9IKZUmEQVW', '2022-07-24 12:08:43', 1),
      (3, 'santiago_gallino@davinci.edu.ar', 'Gallino', '$2y$10$v/S24tCZcj7oTgcpHA1XCOFTVmlkRsn9Xqmd8LDnywh9IKZUmEQVW', '2022-07-24 12:08:43', 1);



CREATE TABLE IF NOT EXISTS perfil (
  perfil_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombreCompleto VARCHAR(100) NOT NULL,
  fotoPerfil VARCHAR(250) NOT NULL,
  estado VARCHAR(250) NOT NULL,
  usuario_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) ON DELETE NO ACTION  ON UPDATE NO ACTION
)ENGINE = InnoDB;

INSERT INTO perfil 
VALUES (1, 	'Cristian Bösz', 	'img/imagenesPerfil/jaskier.jpg','El arte más noble es hacer felices a los demás', 1),
       (2, 	'Agustin Zoric', 	'img/imagenesPerfil/miguel.jpg','El saber no ocupa espacio', 	2),
       (3, 	'Santiago Gallino', 'img/imagenesPerfil/revan.jpg','Concéntrate en el momento. Siente, no pienses, usa tu instinto.', 3);

     

CREATE TABLE IF NOT EXISTS publicaciones (
  publicacion_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  contenidoPublicacion TEXT NOT NULL,
  fechaPublicacion TIMESTAMP NOT NULL,
  fotoPublicacion VARCHAR(255),
  num_likes FLOAT,
  usuario_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE 
)ENGINE = InnoDB;

INSERT INTO publicaciones 
VALUES (1, '-Frase de Gandalf: ¿Final? No este no es el final de la jornada, La muerte es solo otro camino que todos recorren. La cortina de lluvia gris del mundo se abre y se transforma en plata y cristal. Después lo ves… blancas costas, y más allá, un país lejano y verde a la luz de un amanecer.', '2022-07-24 12:08:43', 'img/imagenesPublicaciones/gandalf.jpg
', '0', 2);


CREATE TABLE IF NOT EXISTS tiposNotificaciones (
  tiposNotificaciones_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombreTipo VARCHAR(60) NOT NULL,
  mensajeNotificacion LONGTEXT NOT NULL
)ENGINE = InnoDB;

INSERT INTO tiposNotificaciones 
VALUES (1, 	'Like', 	'le ha dado me gusta a tu publicación'),
       (2, 	'Comentario', 	'ha comentado tu publicación'),
       (3, 	'Mensaje', 	'te envió un mensaje');
     


CREATE TABLE IF NOT EXISTS notificaciones (
  notificacion_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuarioAccion INT NOT NULL, 
  usuario_id_fk INT UNSIGNED NOT NULL, 
  tipoNotificaciones_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) 
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION,

    FOREIGN KEY (tipoNotificaciones_id_fk) REFERENCES tiposNotificaciones (tiposNotificaciones_id) 
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION
)ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS likes (
  likes_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id_fk INT UNSIGNED NOT NULL,
  publicacion_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE,

    FOREIGN KEY (publicacion_id_fk) REFERENCES publicaciones (publicacion_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE
)ENGINE = InnoDB;



  CREATE TABLE IF NOT EXISTS comentarios (
  comentarios_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  contenidoComentario  VARCHAR(255) NOT NULL,
  fechaComentario TIMESTAMP NOT NULL,
  usuario_id_fk INT UNSIGNED NOT NULL,
  publicacion_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE,

    FOREIGN KEY (publicacion_id_fk) REFERENCES publicaciones (publicacion_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE
)ENGINE = InnoDB;

INSERT INTO comentarios 
VALUES (1, 'Esa frase siempre me llega al corazón', '2022-07-24 12:08:43', 1, 1);



CREATE TABLE IF NOT EXISTS mensajes (
  mensaje_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuarioEmisor INT NOT NULL,
  contenido LONGTEXT NOT NULL,
  fechaMensaje TIMESTAMP NOT NULL,
  usuarioReceptor INT UNSIGNED NOT NULL,
       FOREIGN KEY (usuarioReceptor) REFERENCES usuarios (usuario_id) ON DELETE NO ACTION  ON UPDATE NO ACTION
  )ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS eventos (
  evento_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  contenidoEvento VARCHAR(255) NOT NULL,
  fechaEvento TIMESTAMP NOT NULL,
  diaEvento DATE,
  ubicacion VARCHAR(255) NOT NULL, 
  num_asistencia FLOAT,
  usuario_id_fk INT UNSIGNED NOT NULL,
  FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) ON DELETE NO ACTION  ON UPDATE NO ACTION  
)ENGINE = InnoDB;

INSERT INTO eventos 
VALUES (1, 'Vamos a ver Thor love and thunder, ¿Quien se copa?', '2022-07-24 12:08:43', '2022-07-24 12:08:43','Showcase Cinema IMAX Norcenter', '0', 1);

CREATE TABLE IF NOT EXISTS asistencias (
  asistencia_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id_fk INT UNSIGNED NOT NULL,
  evento_id_fk INT UNSIGNED NOT NULL,
    FOREIGN KEY (usuario_id_fk) REFERENCES usuarios (usuario_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE,

    FOREIGN KEY (evento_id_fk) REFERENCES eventos (evento_id) 
    ON DELETE CASCADE  
    ON UPDATE CASCADE
)ENGINE = InnoDB;