SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `tams` ;
CREATE SCHEMA IF NOT EXISTS `tams` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `tams` ;

-- -----------------------------------------------------
-- Table `tams`.`Roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Roles` (
  `idRoles` INT NOT NULL AUTO_INCREMENT ,
  `RoleName` VARCHAR(45) NULL ,
  PRIMARY KEY (`idRoles`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL ,
  `Surname` VARCHAR(45) NULL ,
  `Role` INT NULL ,
  `Login` VARCHAR(15) NULL ,
  `Password` VARCHAR(15) NULL ,
  `Email` VARCHAR(45) NULL ,
  `Balance` DOUBLE NULL ,
  PRIMARY KEY (`idUsers`) ,
  INDEX `RoleFK` (`Role` ASC) ,
  CONSTRAINT `RoleFK`
    FOREIGN KEY (`Role` )
    REFERENCES `tams`.`Roles` (`idRoles` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`Status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Status` (
  `idStatus` INT NOT NULL AUTO_INCREMENT ,
  `NoGoods` TINYINT(1)  NULL ,
  `FullCashStorage` TINYINT(1)  NULL ,
  `Fault` TINYINT(1)  NULL ,
  PRIMARY KEY (`idStatus`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`Location`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Location` (
  `idLocation` INT NOT NULL AUTO_INCREMENT ,
  `City` VARCHAR(45) NULL ,
  `Street` VARCHAR(45) NULL ,
  `Coordinates` VARCHAR(45) NULL ,
  PRIMARY KEY (`idLocation`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`Trade Automats`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Trade Automats` (
  `idTrade Automats` INT NOT NULL AUTO_INCREMENT ,
  `Type` VARCHAR(45) NULL ,
  `Owner` INT NULL ,
  `Location` INT NULL ,
  `Status` INT NULL ,
  `Cash` DOUBLE NULL DEFAULT 0 ,
  `Service` INT NULL ,
  `SellAmount` DOUBLE NULL DEFAULT 0 ,
  `RegistrationDate` DATETIME NULL ,
  `IsWorking` TINYINT(1)  NULL ,
  PRIMARY KEY (`idTrade Automats`) ,
  INDEX `OwnerUser` (`Owner` ASC) ,
  INDEX `Service` (`Service` ASC) ,
  INDEX `Status` (`Status` ASC) ,
  INDEX `Location` (`Location` ASC) ,
  CONSTRAINT `OwnerUser`
    FOREIGN KEY (`Owner` )
    REFERENCES `tams`.`Users` (`idUsers` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Service`
    FOREIGN KEY (`Service` )
    REFERENCES `tams`.`Users` (`idUsers` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Status`
    FOREIGN KEY (`Status` )
    REFERENCES `tams`.`Status` (`idStatus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Location`
    FOREIGN KEY (`Location` )
    REFERENCES `tams`.`Location` (`idLocation` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`Products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`Products` (
  `idProducts` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL ,
  `Description` VARCHAR(100) NULL ,
  `Price` DOUBLE NULL ,
  `Image` BINARY NULL ,
  PRIMARY KEY (`idProducts`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tams`.`TradeList`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tams`.`TradeList` (
  `idTradeList` INT NOT NULL AUTO_INCREMENT ,
  `ProductId` INT NULL ,
  `AutomateId` INT NULL ,
  `Quantity` VARCHAR(45) NULL ,
  PRIMARY KEY (`idTradeList`) ,
  INDEX `AutomatId` (`AutomateId` ASC) ,
  INDEX `ProductId` (`ProductId` ASC) ,
  CONSTRAINT `AutomatId`
    FOREIGN KEY (`AutomateId` )
    REFERENCES `tams`.`Trade Automats` (`idTrade Automats` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ProductId`
    FOREIGN KEY (`ProductId` )
    REFERENCES `tams`.`Products` (`idProducts` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
