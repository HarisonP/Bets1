SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `usersandbetts` ;
CREATE SCHEMA IF NOT EXISTS `usersandbetts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `usersandbetts` ;

-- -----------------------------------------------------
-- Table `usersandbetts`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usersandbetts`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT ,
  `Username` VARCHAR(45) NOT NULL ,
  `Hash` VARCHAR(45) NOT NULL ,
  `Salt` VARCHAR(20) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Confirmed` TINYINT(1) NULL DEFAULT False ,
  PRIMARY KEY (`idUsers`) ,
  UNIQUE INDEX `idUsers_UNIQUE` (`idUsers` ASC) ,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) ,
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usersandbetts`.`Betts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usersandbetts`.`Betts` (
  `idBetts` INT NOT NULL AUTO_INCREMENT ,
  `SenceOfTheBett` TEXT NOT NULL ,
  `Beers` INT UNSIGNED NULL ,
  `Levs` INT UNSIGNED NULL ,
  `Weed` INT UNSIGNED NULL ,
  `Condoms` INT UNSIGNED NULL ,
  `Coffees` INT UNSIGNED NULL ,
  `Chocolates` INT UNSIGNED NULL ,
  `other` TEXT NULL ,
  PRIMARY KEY (`idBetts`) ,
  UNIQUE INDEX `idBetts_UNIQUE` (`idBetts` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usersandbetts`.`Users_has_Betts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usersandbetts`.`Users_has_Betts` (
  `Users_idUsers` INT NOT NULL ,
  `Betts_idBetts` INT NOT NULL ,
  `Won` TINYINT(1) NULL ,
  `Lost` TINYINT(1) NULL ,
  `Accepted` TINYINT(1) NULL ,
  `Refused` TINYINT(1) NULL ,
  PRIMARY KEY (`Users_idUsers`, `Betts_idBetts`) ,
  INDEX `fk_Users_has_Betts_Betts1_idx` (`Betts_idBetts` ASC) ,
  INDEX `fk_Users_has_Betts_Users_idx` (`Users_idUsers` ASC) )
ENGINE = InnoDB;

USE `usersandbetts` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
