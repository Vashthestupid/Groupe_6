-- MySQL Script generated by MySQL Workbench
-- Wed May 13 15:18:30 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema DivertiBuy
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `DivertiBuy` ;

-- -----------------------------------------------------
-- Schema DivertiBuy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DivertiBuy` DEFAULT CHARACTER SET utf8 ;
USE `DivertiBuy` ;

-- -----------------------------------------------------
-- Table `DivertiBuy`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`users` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`users` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `nomUser` VARCHAR(45) NOT NULL,
  `prenomUser` VARCHAR(45) NOT NULL,
  `mailUser` VARCHAR(45) NOT NULL,
  `mdpUser` VARCHAR(100) NOT NULL,
  `adresseUser` VARCHAR(255) NOT NULL,
  `ville` VARCHAR(100) NOT NULL,
  `pays` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `idUser_UNIQUE` (`idUser` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`banques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`banques` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`banques` (
  `idBanque` INT NOT NULL AUTO_INCREMENT,
  `nomBanque` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idBanque`),
  UNIQUE INDEX `idbanque_UNIQUE` (`idBanque` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`users_has_banques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`users_has_banques` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`users_has_banques` (
  `users_idUser` INT NOT NULL,
  `banques_idBanque` INT NOT NULL,
  INDEX `fk_users_has_banques_banques1_idx` (`banques_idBanque` ASC),
  INDEX `fk_users_has_banques_users1_idx` (`users_idUser` ASC),
  CONSTRAINT `fk_users_has_banques_users1`
    FOREIGN KEY (`users_idUser`)
    REFERENCES `DivertiBuy`.`users` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_has_banques_banques1`
    FOREIGN KEY (`banques_idBanque`)
    REFERENCES `DivertiBuy`.`banques` (`idBanque`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`livres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`livres` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`livres` (
  `idLivre` INT NOT NULL AUTO_INCREMENT,
  `titreLivre` VARCHAR(100) NOT NULL,
  `auteurLivre` VARCHAR(45) NOT NULL,
  `resumeLivre` TEXT NOT NULL,
  `prixLivre` INT NOT NULL,
  `imageLivre` VARCHAR(100) NOT NULL,
  `genreLivre` VARCHAR(55) NOT NULL,
  `dateAjout` DATETIME NOT NULL,
  PRIMARY KEY (`idLivre`),
  UNIQUE INDEX `idLivre_UNIQUE` (`idLivre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`jeux`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`jeux` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`jeux` (
  `idJeu` INT NOT NULL AUTO_INCREMENT,
  `titreJeu` VARCHAR(100) NOT NULL,
  `studioJeu` VARCHAR(100) NOT NULL,
  `resumeJeu` TEXT NOT NULL,
  `prixJeu` INT NOT NULL,
  `nombreJoueurMax` INT NOT NULL,
  `onlineJeu` TINYINT NOT NULL,
  `imageJeu` VARCHAR(100) NOT NULL,
  `genreJeu` VARCHAR(55) NOT NULL,
  `dateAjout` DATETIME NOT NULL,
  PRIMARY KEY (`idJeu`),
  UNIQUE INDEX `idJeux_UNIQUE` (`idJeu` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`film`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`film` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`film` (
  `idFilm` INT NOT NULL AUTO_INCREMENT,
  `titreFilm` VARCHAR(100) NOT NULL,
  `realisateurFilm` VARCHAR(100) NOT NULL,
  `resumeFilm` TEXT NOT NULL,
  `prixFilm` INT NOT NULL,
  `imageFilm` VARCHAR(100) NOT NULL,
  `genreFilm` VARCHAR(55) NOT NULL,
  `dateAjout` DATETIME NOT NULL,
  PRIMARY KEY (`idFilm`),
  UNIQUE INDEX `idDvd_UNIQUE` (`idFilm` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`panier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`panier` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`panier` (
  `idPanier` INT NOT NULL AUTO_INCREMENT,
  `livres_idLivre` INT NULL,
  `jeux_idJeu` INT NULL,
  `film_idFilm` INT NULL,
  PRIMARY KEY (`idPanier`),
  UNIQUE INDEX `idpanier_UNIQUE` (`idPanier` ASC),
  INDEX `fk_panier_livres1_idx` (`livres_idLivre` ASC),
  INDEX `fk_panier_jeux1_idx` (`jeux_idJeu` ASC),
  INDEX `fk_panier_film1_idx` (`film_idFilm` ASC),
  CONSTRAINT `fk_panier_livres1`
    FOREIGN KEY (`livres_idLivre`)
    REFERENCES `DivertiBuy`.`livres` (`idLivre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_panier_jeux1`
    FOREIGN KEY (`jeux_idJeu`)
    REFERENCES `DivertiBuy`.`jeux` (`idJeu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_panier_film1`
    FOREIGN KEY (`film_idFilm`)
    REFERENCES `DivertiBuy`.`film` (`idFilm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DivertiBuy`.`commandes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DivertiBuy`.`commandes` ;

CREATE TABLE IF NOT EXISTS `DivertiBuy`.`commandes` (
  `idCommandes` INT NOT NULL AUTO_INCREMENT,
  `panier_idpanier` INT NOT NULL,
  PRIMARY KEY (`idCommandes`),
  UNIQUE INDEX `idCommandes_UNIQUE` (`idCommandes` ASC),
  INDEX `fk_commandes_panier1_idx` (`panier_idpanier` ASC),
  CONSTRAINT `fk_commandes_panier1`
    FOREIGN KEY (`panier_idpanier`)
    REFERENCES `DivertiBuy`.`panier` (`idPanier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
