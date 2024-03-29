SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `tams` ;
CREATE SCHEMA IF NOT EXISTS `tams` DEFAULT CHARACTER SET utf8;
USE `tams` ;

-- -----------------------------------------------------
-- Table `tams`.`location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`location` ;

CREATE  TABLE IF NOT EXISTS `tams`.`location` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `City` VARCHAR(45) NULL DEFAULT NULL ,
  `Street` VARCHAR(45) NULL DEFAULT NULL ,
  `Coordinates` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`products` ;

CREATE  TABLE IF NOT EXISTS `tams`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL DEFAULT NULL ,
  `Description` VARCHAR(100) NULL DEFAULT NULL ,
  `Price` DOUBLE NULL DEFAULT NULL ,
  `Image` BINARY(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`roles` ;

CREATE  TABLE IF NOT EXISTS `tams`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `RoleName` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`status` ;

CREATE  TABLE IF NOT EXISTS `tams`.`status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `NoGoods` TINYINT(1) NULL DEFAULT NULL ,
  `FullCashStorage` TINYINT(1) NULL DEFAULT NULL ,
  `Fault` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`users` ;

CREATE  TABLE IF NOT EXISTS `tams`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL DEFAULT NULL ,
  `Surname` VARCHAR(45) NULL DEFAULT NULL ,
  `Role` INT(11) NULL DEFAULT NULL ,
  `Login` VARCHAR(15) NULL DEFAULT NULL ,
  `Password` VARCHAR(45) NULL DEFAULT NULL ,
  `Email` VARCHAR(45) NULL DEFAULT NULL ,
  `Balance` DOUBLE NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `RoleFK` (`Role` ASC) ,
  CONSTRAINT `RoleFK`
    FOREIGN KEY (`Role` )
    REFERENCES `tams`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`tradelist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`tradelist` ;

CREATE  TABLE IF NOT EXISTS `tams`.`tradelist` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ProductId` INT(11) NULL DEFAULT NULL ,
  `AutomateId` INT(11) NULL DEFAULT NULL ,
  `Quantity` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `AutomatId` (`AutomateId` ASC) ,
  INDEX `ProductId` (`ProductId` ASC) ,
  CONSTRAINT `AutomatId`
    FOREIGN KEY (`AutomateId` )
    REFERENCES `tams`.`trade_automats` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ProductId`
    FOREIGN KEY (`ProductId` )
    REFERENCES `tams`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tams`.`tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`tasks` ;

CREATE  TABLE IF NOT EXISTS `tams`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `TradeAutomatID` INT NULL ,
  `UserID` INT NULL ,
  `Description` VARCHAR(100) NULL ,
  `CreationTime` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `ta_fk` (`TradeAutomatID` ASC) ,
  INDEX `us_fk` (`UserID` ASC) ,
  CONSTRAINT `ta_fk`
    FOREIGN KEY (`TradeAutomatID` )
    REFERENCES `tams`.`trade_automats` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `us_fk`
    FOREIGN KEY (`UserID` )
    REFERENCES `tams`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`transactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`transactions` ;

CREATE  TABLE IF NOT EXISTS `tams`.`transactions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `product` INT NULL ,
  `amount` INT NULL ,
  `receivedMoney` DOUBLE NULL ,
  `change` DOUBLE NULL ,
  `automat` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `prod_fk` (`product` ASC) ,
  INDEX `autom_fk` (`automat` ASC) ,
  CONSTRAINT `prod_fk`
    FOREIGN KEY (`product` )
    REFERENCES `tams`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `autom_fk`
    FOREIGN KEY (`automat` )
    REFERENCES `tams`.`trade_automats` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`trade_automats`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tams`.`trade automats` ;
DROP TABLE IF EXISTS `tams`.`trade_automats` ;

CREATE  TABLE IF NOT EXISTS `tams`.`trade_automats` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `Type` VARCHAR(45) NULL DEFAULT NULL ,
  `Owner` INT(11) NULL DEFAULT NULL ,
  `Location` INT(11) NULL DEFAULT NULL ,
  `Status` INT(11) NULL DEFAULT NULL ,
  `Cash` DOUBLE NULL DEFAULT '0' ,
  `Service` INT(11) NULL DEFAULT NULL ,
  `SellAmount` DOUBLE NULL DEFAULT '0' ,
  `RegistrationDate` DATETIME NULL DEFAULT NULL ,
  `IsWorking` TINYINT(1) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `OwnerUser` (`Owner` ASC) ,
  INDEX `Service` (`Service` ASC) ,
  INDEX `Status` (`Status` ASC) ,
  INDEX `Location` (`Location` ASC) ,
  CONSTRAINT `Location`
    FOREIGN KEY (`Location` )
    REFERENCES `tams`.`location` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `OwnerUser`
    FOREIGN KEY (`Owner` )
    REFERENCES `tams`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Service`
    FOREIGN KEY (`Service` )
    REFERENCES `tams`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Status` 
    FOREIGN KEY (`Status` )
    REFERENCES `tams`.`status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
