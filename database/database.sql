-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema saep_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema saep_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `saep_db` DEFAULT CHARACTER SET utf8 ;
USE `saep_db` ;

-- -----------------------------------------------------
-- Table `saep_db`.`entrada_saida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saep_db`.`entrada_saida` (
  `identrada_saida` INT(11) NOT NULL AUTO_INCREMENT,
  `fk_produto` INT(11) NOT NULL,
  `tipo_fluxo` VARCHAR(45) NULL DEFAULT NULL,
  `fluxo_data` DATE NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`identrada_saida`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `saep_db`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saep_db`.`produtos` (
  `idprodutos` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_produto` VARCHAR(45) NULL DEFAULT NULL,
  `modelo_produto` VARCHAR(45) NULL DEFAULT NULL,
  `numero_serie` VARCHAR(45) NULL DEFAULT NULL,
  `data_fabricacao` DATE NULL DEFAULT NULL,
  `quantidade` INT(11) NULL DEFAULT NULL,
  `foto_produto` VARCHAR(255) NULL DEFAULT NULL,
  `preco` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idprodutos`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `saep_db`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saep_db`.`usuarios` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_usuarios` VARCHAR(45) NULL DEFAULT NULL,
  `usuario` VARCHAR(45) NULL DEFAULT NULL,
  `senha` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
