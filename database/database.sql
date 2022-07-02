-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema pms
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pms
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pms` DEFAULT CHARACTER SET latin1 ;
USE `pms` ;

-- -----------------------------------------------------
-- Table `pms`.`closingstocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`closingstocks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `price` VARCHAR(255) NULL DEFAULT NULL,
  `quantity` VARCHAR(255) NULL DEFAULT NULL,
  `date` VARCHAR(255) NULL DEFAULT NULL,
  `set_date` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 388
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pms`.`openingstocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`openingstocks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `price` VARCHAR(255) NULL DEFAULT NULL,
  `quantity` VARCHAR(255) NULL DEFAULT NULL,
  `date` VARCHAR(255) NULL DEFAULT NULL,
  `set_date` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 388
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pms`.`stocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`stocks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `price` VARCHAR(255) NULL DEFAULT NULL,
  `quantity` VARCHAR(255) NULL DEFAULT NULL,
  `date` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pms`.`stockstates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`stockstates` (
  `date` VARCHAR(255) NOT NULL,
  `stocks` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`date`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pms`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`transactions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `unit_price` VARCHAR(255) NULL DEFAULT NULL,
  `quantity` VARCHAR(255) NULL DEFAULT NULL,
  `total` VARCHAR(255) NULL DEFAULT NULL,
  `date` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `pms`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pms`.`users` (
  `name` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `userType` VARCHAR(255) NULL DEFAULT NULL,
  `default_password` VARCHAR(255) NULL DEFAULT NULL,
  `is_password_default` VARCHAR(255) NULL DEFAULT NULL,
  `level` VARCHAR(255) NULL DEFAULT NULL,
  `date` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
