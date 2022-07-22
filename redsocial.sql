-- MySQL Script generated by MySQL Workbench
-- Fri Jun 14 16:05:36 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema redsocial
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema redsocial
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redsocial` DEFAULT CHARACTER SET utf8 ;
USE `redsocial` ;

-- -----------------------------------------------------
-- Table `redsocial`.`privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`privilegios` (
    `idPerfil` INT NOT NULL AUTO_INCREMENT,
    `nombrePrivilegio` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idPerfil`))
  ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `idPrivilegio` INT NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(255) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `priviUser_idx` (`idPrivilegio` ASC),
  CONSTRAINT `priviUser`
    FOREIGN KEY (`idPrivilegio`) REFERENCES `redsocial`.`privilegios` (`idPerfil`) ON DELETE NO ACTION    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `redsocial`.`publicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`publicaciones` (
  `idpublicacion` INT NOT NULL AUTO_INCREMENT,
  `idUserPublico` INT NOT NULL,
  `contenidoPublicacion` LONGTEXT NOT NULL,
  `fechaPublicacion` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idpublicacion`),
  INDEX `publicacioesUser_idx` (`idUserPublico` ASC),
  CONSTRAINT `publicacioesUser`
    FOREIGN KEY (`idUserPublico`)
    REFERENCES `redsocial`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`tiposNotificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`tiposNotificaciones` (
  `idtiposNotificaciones` INT NOT NULL AUTO_INCREMENT,
  `nombreTipo` VARCHAR(60) NOT NULL,
  `mensajeNotificacion` LONGTEXT NOT NULL,
  PRIMARY KEY (`idtiposNotificaciones`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`notificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`notificaciones` (
  `idnotificacion` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `tipoNotificaion` INT NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  INDEX `usuarioNotificacion_idx` (`idUsuario` ASC),
  INDEX `fk_notificaciones_tiposNotificaciones1_idx` (`tipoNotificaion` ASC),
  CONSTRAINT `usuarioNotificacion`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `redsocial`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificaciones_tiposNotificaciones1`
    FOREIGN KEY (`tipoNotificaion`)
    REFERENCES `redsocial`.`tiposNotificaciones` (`idtiposNotificaciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`likes` (
  `idlike` INT NOT NULL AUTO_INCREMENT,
  `idPublicacion` INT NOT NULL,
  PRIMARY KEY (`idlike`),
  INDEX `publiLikes_idx` (`idPublicacion` ASC),
  CONSTRAINT `publiLikes`
    FOREIGN KEY (`idPublicacion`)
    REFERENCES `redsocial`.`publicaciones` (`idpublicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`comentarios` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `idPublicacion` INT NOT NULL,
  `contenidoComentario` LONGTEXT NOT NULL,
  `fechaComentario` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `comentarioPublicacion_idx` (`idPublicacion` ASC),
  CONSTRAINT `comentarioPublicacion`
    FOREIGN KEY (`idPublicacion`)
    REFERENCES `redsocial`.`publicaciones` (`idpublicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`fotos` (
  `idFoto` INT NOT NULL AUTO_INCREMENT,
  `nombreFoto` VARCHAR(200) NOT NULL,
  `rutaFoto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idFoto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`perfil` (
  `idperfil` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `idFoto` INT NOT NULL,
  `nombreCompleto` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idperfil`),
  INDEX `perfilUser_idx` (`idUsuario` ASC),
  INDEX `fotoUsuario_idx` (`idFoto` ASC),
  CONSTRAINT `perfilUser`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `redsocial`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fotoUsuario`
    FOREIGN KEY (`idFoto`)
    REFERENCES `redsocial`.`fotos` (`idFoto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redsocial`.`mensajes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redsocial`.`mensajes` (
  `idmensaje` INT NOT NULL AUTO_INCREMENT,
  `usuarios_idusuario` INT NOT NULL,
  `usuarioMando` INT NOT NULL,
  `contenido` LONGTEXT NOT NULL,
  `fechaMensaje` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idmensaje`),
  INDEX `fk_mensajes_usuarios1_idx` (`usuarios_idusuario` ASC),
  CONSTRAINT `fk_mensajes_usuarios1`
    FOREIGN KEY (`usuarios_idusuario`)
    REFERENCES `redsocial`.`usuarios` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
