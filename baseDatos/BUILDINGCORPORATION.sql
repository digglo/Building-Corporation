-- MySQL Script generated by MySQL Workbench
-- Wed Sep  1 18:18:01 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema proyecto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `proyecto`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`rol` (
  `rol_id_rol` INT(10) NOT NULL,
  `rol_tipo_rol` VARCHAR(10) NOT NULL,
  `rol_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `rol_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `rol_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`rol_id_rol`),
  UNIQUE INDEX `rol_tipo_rol_UNIQUE` (`rol_tipo_rol` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`usuario_s`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`usuario_s` (
  `usuId` INT NOT NULL,
  `usuLogin` VARCHAR(45) NOT NULL,
  `usuPassword` VARCHAR(45) NOT NULL,
  `usuUsuSesion` VARCHAR(45) NULL,
  `usuEstado` INT NOT NULL,
  `usuRemember_Token` VARCHAR(45) NOT NULL,
  `usu_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuId`),
  UNIQUE INDEX `usuLogin_UNIQUE` (`usuLogin` ASC),
  UNIQUE INDEX `usuPassword_UNIQUE` (`usuPassword` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario_s_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario_s_rol` (
  `estado` INT NOT NULL,
  `fechaUserRol` TIMESTAMP NOT NULL,
  `obsFechaUserRol` VARCHAR(45) NULL,
  `usuRolUsuSesion` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol_rol_id_rol` INT(10) NOT NULL,
  `usuario_s_usuId` INT NOT NULL,
  INDEX `fk_usuario_s_rol_rol_idx` (`rol_rol_id_rol` ASC),
  INDEX `fk_usuario_s_rol_usuario_s1_idx` (`usuario_s_usuId` ASC),
  CONSTRAINT `fk_usuario_s_rol_rol`
    FOREIGN KEY (`rol_rol_id_rol`)
    REFERENCES `proyecto`.`rol` (`rol_id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_s_rol_usuario_s1`
    FOREIGN KEY (`usuario_s_usuId`)
    REFERENCES `proyecto`.`usuario_s` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `proyecto` ;

-- -----------------------------------------------------
-- Table `proyecto`.`tipo_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`tipo_documento` (
  `tip_id` INT(10) NOT NULL,
  `tip_sigla` VARCHAR(10) NULL DEFAULT NULL,
  `tip_nombre_documento` VARCHAR(10) NULL DEFAULT NULL,
  `tip_estado` VARCHAR(10) NULL DEFAULT NULL,
  `tip_aud_estado` TINYINT(1) NULL DEFAULT NULL,
  `tip_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `tip_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tip_UsuSesion` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`tip_id`),
  UNIQUE INDEX `tip_sigla_UNIQUE` (`tip_sigla` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`constructora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`constructora` (
  `con_id` INT(10) NOT NULL,
  `con_estado` VARCHAR(10) NOT NULL,
  `con_nombre_empresa` VARCHAR(10) NOT NULL,
  `con_id_tipo_documento` INT(10) NOT NULL,
  `con_id_system_user` INT(10) NOT NULL,
  `con_numero_documento` VARCHAR(10) NOT NULL,
  `con_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `con_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `con_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `con_autEstado` TINYINT(1) NULL DEFAULT NULL,
  `usuario_s_usuId` INT NOT NULL,
  PRIMARY KEY (`con_id`, `con_id_tipo_documento`, `con_id_system_user`),
  INDEX `fk_tipo_documento_has_system_user_tipo_documento1_idx` (`con_id_tipo_documento` ASC),
  UNIQUE INDEX `con_nombre_empresa_UNIQUE` (`con_nombre_empresa` ASC),
  UNIQUE INDEX `con_numero_documento_UNIQUE` (`con_numero_documento` ASC),
  INDEX `fk_constructora_usuario_s1_idx` (`usuario_s_usuId` ASC),
  CONSTRAINT `fk_tipo_documento_has_system_user_tipo_documento1`
    FOREIGN KEY (`con_id_tipo_documento`)
    REFERENCES `proyecto`.`tipo_documento` (`tip_id`)
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
  `ubi_id` INT(10) NOT NULL,
  `ubi_direccion` VARCHAR(50) NOT NULL,
  `ubi_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `ubi_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ubi_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `ubi_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`ubi_id`),
  UNIQUE INDEX `ubi_direccion_UNIQUE` (`ubi_direccion` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`sede` (
  `sed_id` INT(10) NOT NULL,
  `sed_fecha_modificacion` TIMESTAMP NOT NULL,
  `sed_estado` VARCHAR(50) NULL DEFAULT NULL,
  `sed_ubicacion_id` INT(10) NOT NULL,
  `sed_nombre_sede` VARCHAR(50) NOT NULL,
  `sed_constructora_id` INT(10) NOT NULL,
  `sed_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `sed_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sed_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `sed_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`sed_id`, `sed_ubicacion_id`, `sed_constructora_id`),
  INDEX `fk_sede_ubicacion1_idx` (`sed_ubicacion_id` ASC),
  INDEX `fk_sede_constructora1_idx` (`sed_constructora_id` ASC),
  CONSTRAINT `fk_sede_ubicacion1`
    FOREIGN KEY (`sed_ubicacion_id`)
    REFERENCES `proyecto`.`ubicacion` (`ubi_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sede_constructora1`
    FOREIGN KEY (`sed_constructora_id`)
    REFERENCES `proyecto`.`constructora` (`con_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`material_construccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`material_construccion` (
  `mat_id` INT(10) NOT NULL,
  `mat_nombre_material` VARCHAR(50) NOT NULL,
  `mat_tipo_material` VARCHAR(10) NOT NULL,
  `mat_precio` INT(10) NOT NULL,
  `mat_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `mat_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mat_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`mat_id`),
  UNIQUE INDEX `mat_nombre_material_UNIQUE` (`mat_nombre_material` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`recibido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`recibido` (
  `rec_id` INT(10) NOT NULL,
  `rec_num_factura` VARCHAR(50) NOT NULL,
  `rec_cantidad_recibido` INT(10) NOT NULL,
  `rec_fecha_recibido` DATE NOT NULL,
  `rec_fecha_modificacion` TIMESTAMP NOT NULL,
  `rec_material_construccion_id` INT(10) NOT NULL,
  `rec_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `rec_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rec_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `rec_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`rec_id`),
  INDEX `fk_recibido_material_construccion1_idx` (`rec_material_construccion_id` ASC),
  UNIQUE INDEX `rec_material_construccion_id_UNIQUE` (`rec_material_construccion_id` ASC),
  UNIQUE INDEX `rec_num_factura_UNIQUE` (`rec_num_factura` ASC),
  CONSTRAINT `fk_recibido_material_construccion1`
    FOREIGN KEY (`rec_material_construccion_id`)
    REFERENCES `proyecto`.`material_construccion` (`mat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`trabajador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`trabajador` (
  `tra_id` INT(10) NOT NULL,
  `tra_primer_nombre` VARCHAR(20) NOT NULL,
  `tra_segundo_nombre` VARCHAR(20) NULL DEFAULT NULL,
  `tra_primer_apellido` VARCHAR(20) NOT NULL,
  `tra_segundo_apellido` VARCHAR(20) NULL DEFAULT NULL,
  `tra_estado` VARCHAR(20) NOT NULL,
  `tra_sede_id` INT(10) NOT NULL,
  `tra_tipo_documento_id` INT(10) NOT NULL,
  `tra_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `tra_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tra_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `tra_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`tra_id`),
  INDEX `fk_trabajador_sede1_idx` (`tra_sede_id` ASC),
  INDEX `fk_trabajador_tipo_documento1_idx` (`tra_tipo_documento_id` ASC),
  CONSTRAINT `fk_trabajador_sede1`
    FOREIGN KEY (`tra_sede_id`)
    REFERENCES `proyecto`.`sede` (`sed_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_tipo_documento1`
    FOREIGN KEY (`tra_tipo_documento_id`)
    REFERENCES `proyecto`.`tipo_documento` (`tip_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`proyecto` (
  `pro_id` INT(10) NOT NULL,
  `material_construccion_mat_id` INT(10) NOT NULL,
  `pro_tipo_proyecto` VARCHAR(50) NOT NULL,
  `pro_nombre_proyecto` VARCHAR(50) NOT NULL,
  `pro_numero_proyecto` VARCHAR(50) NOT NULL,
  `pro_descripcion_proyecto` VARCHAR(100) NOT NULL,
  `pro_fecha_inicio` DATE NOT NULL,
  `pro_fecha_fin` DATE NOT NULL,
  `pro_estado` VARCHAR(50) NULL DEFAULT NULL,
  `pro_sede_id` INT(10) NOT NULL,
  `pro_recibido_id` INT(10) NOT NULL,
  `pro_trabajador_id` INT(10) NOT NULL,
  `pro_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `pro_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `pro_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  INDEX `fk_proyecto_material_construccion1_idx` (`material_construccion_mat_id` ASC),
  UNIQUE INDEX `material_construccion_mat_id_UNIQUE` (`material_construccion_mat_id` ASC),
  UNIQUE INDEX `pro_nombre_proyecto_UNIQUE` (`pro_nombre_proyecto` ASC),
  UNIQUE INDEX `pro_numero_proyecto_UNIQUE` (`pro_numero_proyecto` ASC),
  INDEX `fk_proyecto_sede1_idx` (`pro_sede_id` ASC),
  INDEX `fk_proyecto_recibido1_idx` (`pro_recibido_id` ASC),
  INDEX `fk_proyecto_trabajador1_idx` (`pro_trabajador_id` ASC),
  CONSTRAINT `fk_proyecto_material_construccion1`
    FOREIGN KEY (`material_construccion_mat_id`)
    REFERENCES `proyecto`.`material_construccion` (`mat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyecto_sede1`
    FOREIGN KEY (`pro_sede_id`)
    REFERENCES `proyecto`.`sede` (`sed_id`)
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
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `proyecto`.`utilizado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`utilizado` (
  `uti_id` INT(10) NOT NULL,
  `uti_cantidad_utilizado` INT(10) NOT NULL,
  `uti_fecha_uso` DATE NOT NULL,
  `uti_fecha_modificacion` TIMESTAMP NOT NULL,
  `uti_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `uti_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uti_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `uti_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`uti_id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`.`stock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto`.`stock` (
  `sto_id` INT(10) NOT NULL,
  `sto_cantidad_almacenado` INT(10) NOT NULL,
  `sto_fecha_modificacion` TIMESTAMP NOT NULL,
  `sto_estado` VARCHAR(20) NOT NULL,
  `sto_recibido_id` INT(10) NOT NULL,
  `sto_utilizado_id` INT(10) NOT NULL,
  `sto_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `sto_updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sto_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `sto_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`sto_id`),
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
  `reg_id` INT(10) NOT NULL,
  `reg_numero_registro` INT(10) NOT NULL,
  `reg_fecha_modificacion` TIMESTAMP NOT NULL,
  `reg_comentarios` VARCHAR(50) NOT NULL,
  `reg_stock_id` INT(10) NOT NULL,
  `reg_created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_updated_at` TIMESTAMP NULL DEFAULT NULL,
  `reg_usuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `reg_autEstado` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`reg_id`),
  INDEX `fk_registro_stock1_idx` (`reg_stock_id` ASC),
  CONSTRAINT `fk_registro_stock1`
    FOREIGN KEY (`reg_stock_id`)
    REFERENCES `proyecto`.`stock` (`sto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
