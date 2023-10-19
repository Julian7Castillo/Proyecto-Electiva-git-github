-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lecheriadb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lecheriadb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lecheriadb` DEFAULT CHARACTER SET utf8mb4 ;
USE `lecheriadb` ;

-- -----------------------------------------------------
-- Table `lecheriadb`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lecheriadb`.`roles` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `lecheriadb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lecheriadb`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `id_rol` INT(11) NOT NULL,
  `nombre_usuario` VARCHAR(50) NOT NULL,
  `apellido_usuario` VARCHAR(20) NOT NULL,
  `direccion` VARCHAR(30) NOT NULL,
  `celular` VARCHAR(10) NOT NULL,
  `correo` VARCHAR(50) NULL DEFAULT NULL,
  `clave` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `id_rol` (`id_rol` ASC) VISIBLE,
  CONSTRAINT `usuarios_ibfk_1`
    FOREIGN KEY (`id_rol`)
    REFERENCES `lecheriadb`.`roles` (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `lecheriadb`.`historial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lecheriadb`.`historial` (
  `id_usuario` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `accion` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `historial_ibfk_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `lecheriadb`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `lecheriadb`.`recolecciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lecheriadb`.`recolecciones` (
  `id_recoleccion` INT(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` INT(11) NOT NULL,
  `litros_leche` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`id_recoleccion`),
  INDEX `id_cliente` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `recolecciones_ibfk_1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `lecheriadb`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `lecheriadb`.`rutas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lecheriadb`.`rutas` (
  `id_ruta` INT(11) NOT NULL AUTO_INCREMENT,
  `sector` VARCHAR(30) NOT NULL,
  `descripcion` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id_ruta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
