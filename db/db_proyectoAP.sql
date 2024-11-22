-- MySQL Script generated by MySQL Workbench
-- Fri Nov 22 11:29:30 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema regalatodo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema regalatodo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `regalatodo` DEFAULT CHARACTER SET utf8 ;
USE `regalatodo` ;

-- -----------------------------------------------------
-- Table `regalatodo`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regalatodo`.`Cliente` ;

CREATE TABLE IF NOT EXISTS `regalatodo`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `tipo` TINYINT(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idCliente`));


-- -----------------------------------------------------
-- Table `regalatodo`.`Articulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regalatodo`.`Articulo` ;

CREATE TABLE IF NOT EXISTS `regalatodo`.`Articulo` (
  `idArticulo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `localidad` VARCHAR(45) NOT NULL,
  `publicacion` DATETIME NOT NULL,
  `id_Cliente` INT NOT NULL,
  PRIMARY KEY (`idArticulo`),
  FOREIGN KEY (`id_Cliente`)
  REFERENCES `regalatodo`.`Cliente` (`idCliente`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
);


-- -----------------------------------------------------
-- Table `regalatodo`.`ImagenesArticulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regalatodo`.`ImagenesArticulo` ;

CREATE TABLE IF NOT EXISTS `regalatodo`.`ImagenesArticulo` (
  `idImagenesArticulo` INT NOT NULL AUTO_INCREMENT,
  `ruta` VARCHAR(45) NOT NULL,
  `id_Articulo` INT NOT NULL,
  PRIMARY KEY (`idImagenesArticulo`),
  FOREIGN KEY (`id_Articulo`)
  REFERENCES `regalatodo`.`Articulo` (`idArticulo`)
  ON DELETE CASCADE
  ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `regalatodo`.`SolicitudEntrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regalatodo`.`SolicitudEntrega` ;

CREATE TABLE IF NOT EXISTS `regalatodo`.`SolicitudEntrega` (
  `idSolicitudEntrega` INT NOT NULL AUTO_INCREMENT,
  `entrega` VARCHAR(45) NOT NULL,
  `status` INT NOT NULL DEFAULT 0,
  `id_Artculo` INT NOT NULL,
  `id_Solicitante` INT NOT NULL,
  PRIMARY KEY (`idSolicitudEntrega`),
  FOREIGN KEY (`id_Artculo`)
  REFERENCES `regalatodo`.`Articulo` (`idArticulo`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (`id_Solicitante`)
  REFERENCES `regalatodo`.`Cliente` (`idCliente`)
  ON DELETE CASCADE
  ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `regalatodo`.`Reporte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `regalatodo`.`Reporte` ;

CREATE TABLE IF NOT EXISTS `regalatodo`.`Reporte` (
  `idReporte` INT NOT NULL AUTO_INCREMENT,
  `fecha_entrega` DATETIME NOT NULL,
  `id_Solicitud` INT NOT NULL,
  PRIMARY KEY (`idReporte`),
  FOREIGN KEY (`id_Solicitud`)
  REFERENCES `regalatodo`.`SolicitudEntrega` (`idSolicitudEntrega`)
  ON DELETE CASCADE
  ON UPDATE CASCADE);
