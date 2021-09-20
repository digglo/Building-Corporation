-- MySQL Script generated by MySQL Workbench
-- Wed Sep 15 18:32:00 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- Schema proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `proyecto`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`rol` (
  `rol_id_rol` INT NOT NULL DEFAULT 1,
  `rol_tipo_rol` VARCHAR(10) NOT NULL,
  `rol_estado` TINYINT NOT NULL DEFAULT 1,
  `rol_created_at` TIMESTAMP(6) NULL,
  `rol_updated_at` TIMESTAMP(6) NULL,
  `rol_usuSesion` VARCHAR(6) NULL,
  PRIMARY KEY (`rol_id_rol`),
  UNIQUE INDEX `tipoRol_UNIQUE` (`rol_tipo_rol` ASC))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `proyecto`.`usuario_s`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`usuario_s` (
  `usuId` INT NOT NULL,
  `usulogin` VARCHAR(45) NULL,
  `usuPassword` VARCHAR(45) NULL,
  `usuSesion` VARCHAR(20) NULL,
  `usuEstado` INT NULL,
  `usuRemenber_token` VARCHAR(45) NULL,
  `usu_created_at` TIMESTAMP NULL,
  `usuario_updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`usuId`),
  UNIQUE INDEX `usulogin_UNIQUE` (`usulogin` ASC),
  UNIQUE INDEX `usuPassword_UNIQUE` (`usuPassword` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`identificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`identificacion` (
  `ide_id` INT NOT NULL,
  `ide_sigla` VARCHAR(45) NULL,
  `ide_descripcion` VARCHAR(45) NULL,
  `ide_estado` TINYINT NOT NULL DEFAULT 1,
  `ide_created_at` TIMESTAMP NULL,
  `ide_updated_at` TIMESTAMP NULL,
  `ide_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`ide_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`constructora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`constructora` (
  `con_id` INT NOT NULL,
  `con_estado` TINYINT NOT NULL DEFAULT 1,
  `con_nombre_empresa` VARCHAR(10) NULL,
  `con_numero documento` INT NULL,
  `con_id_identificacion` INT NULL,
  `con_created_at` TIMESTAMP NULL,
  `con_updated_at` TIMESTAMP NULL,
  `con_usuSesion` VARCHAR(20) NULL,
  `usuario_s_usuId` INT NULL,
  PRIMARY KEY (`con_id`),
  INDEX `fk_constructora_identificacion1_idx` (`con_id_identificacion` ASC),
  INDEX `fk_constructora_usuario_s1_idx` (`usuario_s_usuId` ASC),
  CONSTRAINT `fk_constructora_identificacion1`
    FOREIGN KEY (`con_id_identificacion`)
    REFERENCES `proyecto`.`identificacion` (`ide_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_constructora_usuario_s1`
    FOREIGN KEY (`usuario_s_usuId`)
    REFERENCES `proyecto`.`usuario_s` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`ubicacion` (
  `ubi_id` INT NOT NULL AUTO_INCREMENT,
  `ubi_estado` TINYINT NOT NULL DEFAULT 1,
  `ubi_direccion` VARCHAR(50) NULL,
  `ubi_created_at` TIMESTAMP NULL,
  `ubi_updated_at` TIMESTAMP NULL,
  `ubi_usuSesion` VARCHAR(20) NULL,
  `ubicacioncol` VARCHAR(45) NULL,
  PRIMARY KEY (`ubi_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`sede` (
  `sede_id` INT NULL AUTO_INCREMENT,
  `sede_fecha_modificacion` VARCHAR(45) NULL,
  `sede_estado` TINYINT NOT NULL DEFAULT 1,
  `sede_ubicacion_id` INT NULL,
  `sede_nombre_sede` VARCHAR(45) NULL,
  `sede_constructora_id` INT NULL,
  `sede_created_at` TIMESTAMP NULL,
  `sede_updated_at` TIMESTAMP NULL,
  `sede_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`sede_id`),
  UNIQUE INDEX `sede_ide_UNIQUE` (`sede_id` ASC),
  INDEX `fk_sede_constructora1_idx` (`sede_constructora_id` ASC),
  INDEX `fk_sede_ubicacion1_idx` (`sede_ubicacion_id` ASC),
  CONSTRAINT `fk_sede_constructora1`
    FOREIGN KEY (`sede_constructora_id`)
    REFERENCES `proyecto`.`constructora` (`con_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sede_ubicacion1`
    FOREIGN KEY (`sede_ubicacion_id`)
    REFERENCES `proyecto`.`ubicacion` (`ubi_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`material_construccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`material_construccion` (
  `mat_id` INT NOT NULL AUTO_INCREMENT,
  `mat_nombre_material` VARCHAR(50) NULL,
  `mat_tipo_material` VARCHAR(30) NULL,
  `mat_precio` DOUBLE NULL,
  `mat_estado` TINYINT NOT NULL DEFAULT 1,
  `mat_created_at` TIMESTAMP NULL,
  `mat_updated_at` TIMESTAMP NULL,
  `mat_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`mat_id`),
  UNIQUE INDEX `mat_id_UNIQUE` (`mat_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`recibido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`recibido` (
  `rec_id` INT NOT NULL AUTO_INCREMENT,
  `rec_numero_factura` VARCHAR(50) NULL,
  `rec_cantidad_recibido` INT NULL,
  `rec_fecha_recibido` DATE NULL,
  `rec_fecha_modificacion` TIMESTAMP NULL,
  `rec_mat_id` INT NULL,
  `rec_created_at` TIMESTAMP NULL,
  `rec_updated_at` TIMESTAMP NULL,
  `rec_usuSesion` VARCHAR(20) NULL,
  `rec_estado` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`rec_id`),
  INDEX `fk_recibido_material_construccion1_idx` (`rec_mat_id` ASC),
  CONSTRAINT `fk_recibido_material_construccion1`
    FOREIGN KEY (`rec_mat_id`)
    REFERENCES `proyecto`.`material_construccion` (`mat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`trabajador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`trabajador` (
  `tra_id` INT NOT NULL AUTO_INCREMENT,
  `tra_primer_nombre` VARCHAR(20) NULL,
  `tra_segundo_nombre` VARCHAR(20) NULL,
  `tra_primer_apellido` VARCHAR(20) NULL,
  `tra_segundo_apellido` VARCHAR(20) NULL,
  `tra_estado` TINYINT NOT NULL DEFAULT 1,
  `tra_sede_id` INT NULL,
  `tra_identificacion_id` INT NULL,
  `tra_created_at` TIMESTAMP NULL,
  `tra_updated_at` TIMESTAMP NULL,
  `tra_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`tra_id`),
  UNIQUE INDEX `tra_id_UNIQUE` (`tra_id` ASC),
  INDEX `fk_trabajador_identificacion1_idx` (`tra_identificacion_id` ASC),
  INDEX `fk_trabajador_sede1_idx` (`tra_sede_id` ASC),
  CONSTRAINT `fk_trabajador_identificacion1`
    FOREIGN KEY (`tra_identificacion_id`)
    REFERENCES `proyecto`.`identificacion` (`ide_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_sede1`
    FOREIGN KEY (`tra_sede_id`)
    REFERENCES `proyecto`.`sede` (`sede_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`proyecto` (
  `pro_id` INT NOT NULL AUTO_INCREMENT,
  `material_construccion_mat_id` INT NULL,
  `pro_tipo_proyecto` VARCHAR(50) NULL,
  `pro_nombre_proyecto` VARCHAR(50) NULL,
  `pro_numero_proyecto` INT NULL,
  `pro_descripcion_proyecto` VARCHAR(100) NULL,
  `pro_fecha_inicio` DATE NULL,
  `pro_fecha_fin` DATE NULL,
  `pro_estado` TINYINT NOT NULL DEFAULT 1,
  `pro_sede_id` INT NULL,
  `pro_recibido_id` INT NULL,
  `pro_trabajador_id` INT NULL,
  `pro_created_at` TIMESTAMP NULL,
  `pro_updated_at` TIMESTAMP NULL,
  `pro_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`pro_id`),
  INDEX `fk_proyecto_sede1_idx` (`pro_sede_id` ASC),
  INDEX `fk_proyecto_recibido1_idx` (`pro_recibido_id` ASC),
  INDEX `fk_proyecto_trabajador1_idx` (`pro_trabajador_id` ASC),
  INDEX `fk_proyecto_material_construccion1_idx` (`material_construccion_mat_id` ASC),
  CONSTRAINT `fk_proyecto_sede1`
    FOREIGN KEY (`pro_sede_id`)
    REFERENCES `proyecto`.`sede` (`sede_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_recibido1`
    FOREIGN KEY (`pro_recibido_id`)
    REFERENCES `proyecto`.`recibido` (`rec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_trabajador1`
    FOREIGN KEY (`pro_trabajador_id`)
    REFERENCES `proyecto`.`trabajador` (`tra_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_material_construccion1`
    FOREIGN KEY (`material_construccion_mat_id`)
    REFERENCES `proyecto`.`material_construccion` (`mat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`utilizado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`utilizado` (
  `uti_id` INT NOT NULL AUTO_INCREMENT,
  `uti_cantidad_utilizado` INT NULL,
  `uti_fecha_uso` DATE NULL,
  `uti_fecha_modificacion` TIMESTAMP NULL,
  `uti_estado` TINYINT NOT NULL DEFAULT 1,
  `uti_created_at` TIMESTAMP NULL,
  `uti_updated_at` TIMESTAMP NULL,
  `uti_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`uti_id`),
  UNIQUE INDEX `uti_id_UNIQUE` (`uti_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`stock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`stock` (
  `sto_id` INT NOT NULL AUTO_INCREMENT,
  `sto_cantidad_almacenada` INT NULL,
  `sto_fecha_modificacion` TIMESTAMP NULL,
  `sto_estado` TINYINT NOT NULL DEFAULT 1,
  `sto_recibido_id` INT NULL,
  `sto_utilizado_id` INT NULL,
  `sto_created_at` TIMESTAMP NULL,
  `sto_updated_at` TIMESTAMP NULL,
  `sto_usuSesion` VARCHAR(20) NULL,
  PRIMARY KEY (`sto_id`),
  UNIQUE INDEX `sto_id_UNIQUE` (`sto_id` ASC),
  INDEX `fk_stock_recibido1_idx` (`sto_recibido_id` ASC),
  INDEX `fk_stock_utilizado1_idx` (`sto_utilizado_id` ASC),
  CONSTRAINT `fk_stock_recibido1`
    FOREIGN KEY (`sto_recibido_id`)
    REFERENCES `proyecto`.`recibido` (`rec_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_utilizado1`
    FOREIGN KEY (`sto_utilizado_id`)
    REFERENCES `proyecto`.`utilizado` (`uti_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `proyecto`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`registro` (
  `reg_id` INT NOT NULL AUTO_INCREMENT,
  `reg_numero_registro` INT NULL,
  `reg_fecha_modificacion` TIMESTAMP NULL,
  `reg_comentarios` VARCHAR(50) NULL,
  `reg_stock_id` INT NULL,
  `reg_estado` TINYINT NOT NULL DEFAULT 1,
  `reg_created_at` TIMESTAMP NULL,
  `reg_updated_at` TIMESTAMP NULL,
  `reg_usuSesion` VARCHAR(20) NULL,
  `reg_autEstado` TINYINT NULL,
  PRIMARY KEY (`reg_id`),
  INDEX `fk_registro_stock1_idx` (`reg_stock_id` ASC),
  CONSTRAINT `fk_registro_stock1`
    FOREIGN KEY (`reg_stock_id`)
    REFERENCES `proyecto`.`stock` (`sto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`usuario_s_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`usuario_s_roles` (
  `rol_rol_id_rol` INT NOT NULL,
  `usuario_s_usuId` INT NOT NULL,
  INDEX `fk_usuario_s_roles_rol1_idx` (`rol_rol_id_rol` ASC),
  INDEX `fk_usuario_s_roles_usuario_s1_idx` (`usuario_s_usuId` ASC),
  CONSTRAINT `fk_usuario_s_roles_rol1`
    FOREIGN KEY (`rol_rol_id_rol`)
    REFERENCES `proyecto`.`rol` (`rol_id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_s_roles_usuario_s1`
    FOREIGN KEY (`usuario_s_usuId`)
    REFERENCES `proyecto`.`usuario_s` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
