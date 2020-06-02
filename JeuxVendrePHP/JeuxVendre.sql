-- MySQL Script generated by MySQL Workbench
-- Tue Jun  2 10:49:45 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema jeuxvendre
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `jeuxvendre` ;

-- -----------------------------------------------------
-- Schema jeuxvendre
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jeuxvendre` DEFAULT CHARACTER SET utf8 ;
USE `jeuxvendre` ;

-- -----------------------------------------------------
-- Table `jeuxvendre`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jeuxvendre`.`users` ;

CREATE TABLE IF NOT EXISTS `jeuxvendre`.`users` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `nomUser` VARCHAR(45) NOT NULL,
  `prenomUser` VARCHAR(45) NOT NULL,
  `mailUser` VARCHAR(45) NOT NULL,
  `mdpUser` VARCHAR(75) NOT NULL,
  `adresseUser` VARCHAR(100) NOT NULL,
  `cpUser` VARCHAR(5) NOT NULL,
  `villeUser` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeuxvendre`.`consoles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jeuxvendre`.`consoles` ;

CREATE TABLE IF NOT EXISTS `jeuxvendre`.`consoles` (
  `idConsole` INT NOT NULL AUTO_INCREMENT,
  `nomConsole` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idConsole`),
  UNIQUE INDEX `idConsole_UNIQUE` (`idConsole` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jeuxvendre`.`jeux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `jeuxvendre`.`jeux` ;

CREATE TABLE IF NOT EXISTS `jeuxvendre`.`jeux` (
  `idJeu` INT NOT NULL AUTO_INCREMENT,
  `titreJeu` VARCHAR(100) NOT NULL,
  `prixJeu` DECIMAL(2) NOT NULL,
  `commentaireJeu` TEXT(150) NULL,
  `users_idUser` INT NOT NULL,
  `consoles_idConsole` INT NOT NULL,
  PRIMARY KEY (`idJeu`),
  UNIQUE INDEX `idJeu_UNIQUE` (`idJeu` ASC),
  INDEX `fk_jeux_users_idx` (`users_idUser` ASC),
  INDEX `fk_jeux_consoles1_idx` (`consoles_idConsole` ASC),
  CONSTRAINT `fk_jeux_users`
    FOREIGN KEY (`users_idUser`)
    REFERENCES `jeuxvendre`.`users` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_jeux_consoles1`
    FOREIGN KEY (`consoles_idConsole`)
    REFERENCES `jeuxvendre`.`consoles` (`idConsole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;