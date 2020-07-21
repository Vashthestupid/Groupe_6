-- MySQL Script generated by MySQL Workbench
-- Mon Jul 20 09:55:44 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema lunettes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `lunettes` ;

-- -----------------------------------------------------
-- Schema lunettes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lunettes` DEFAULT CHARACTER SET utf8 ;
USE `lunettes` ;

-- -----------------------------------------------------
-- Table `lunettes`.`type_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`type_user` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`type_user` (
  `idType` INT NOT NULL AUTO_INCREMENT,
  `nomType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idType`),
  UNIQUE INDEX `id_UNIQUE` (`idType` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`user` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomUser` VARCHAR(45) NOT NULL,
  `prenomUser` VARCHAR(45) NOT NULL,
  `mailUser` VARCHAR(45) NOT NULL,
  `mdpUser` VARCHAR(100) NOT NULL,
  `adresseUser` VARCHAR(100) NOT NULL,
  `cpUser` VARCHAR(5) NOT NULL,
  `villeUser` VARCHAR(45) NOT NULL,
  `type_user_idType` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_user_type_user1_idx` (`type_user_idType` ASC),
  CONSTRAINT `fk_user_type_user1`
    FOREIGN KEY (`type_user_idType`)
    REFERENCES `lunettes`.`type_user` (`idType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`status` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomStatus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`type` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`type` (
  `idtype` INT NOT NULL AUTO_INCREMENT,
  `nomType` VARCHAR(145) NULL,
  `status_id` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idtype`),
  UNIQUE INDEX `idtype_UNIQUE` (`idtype` ASC),
  INDEX `fk_type_status1_idx` (`status_id` ASC),
  CONSTRAINT `fk_type_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `lunettes`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`produit` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`produit` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomProduit` VARCHAR(100) NOT NULL,
  `prixProduit` DECIMAL(5,2) NOT NULL,
  `descProduit` TEXT(200) NOT NULL,
  `type_idtype` INT NOT NULL,
  `imageProduit` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_produit_type1_idx` (`type_idtype` ASC),
  CONSTRAINT `fk_produit_type1`
    FOREIGN KEY (`type_idtype`)
    REFERENCES `lunettes`.`type` (`idtype`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`panier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`panier` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`panier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantite` INT NOT NULL,
  `statutCommande` TINYINT(2) NOT NULL DEFAULT 1,
  `dateCommande` DATETIME NOT NULL,
  `produit_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_panier_produit1_idx` (`produit_id` ASC),
  INDEX `fk_panier_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_panier_produit1`
    FOREIGN KEY (`produit_id`)
    REFERENCES `lunettes`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_panier_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `lunettes`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lunettes`.`commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lunettes`.`commande` ;

CREATE TABLE IF NOT EXISTS `lunettes`.`commande` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `panier_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_commande_panier1_idx` (`panier_id` ASC),
  CONSTRAINT `fk_commande_panier1`
    FOREIGN KEY (`panier_id`)
    REFERENCES `lunettes`.`panier` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
