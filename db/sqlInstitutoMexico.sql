
CREATE SCHEMA IF NOT EXISTS `db_instituto_mexico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_instituto_mexico` ;

-- -----------------------------------------------------
-- Table `db_instituto_mexico`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_instituto_mexico`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `IDUsuario` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `ApellidoPaterno` VARCHAR(45) NOT NULL,
  `ApellidoMaterno` VARCHAR(45) NOT NULL,
  `Edad` INT NOT NULL,
  `Sexo` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `TipoUsuario` VARCHAR(45) NOT NULL,
  `Pasword` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `db_instituto_mexico`.`pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_instituto_mexico`.`pagos` (
  `idPago` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `FolioPago` VARCHAR(45) NOT NULL,
  `Concepto` VARCHAR(150) NOT NULL,
  `MesPagado` VARCHAR(45) NOT NULL,
  `Monto` DECIMAL(5,0) NOT NULL,
  `FechaPago` DATE NOT NULL,
  PRIMARY KEY (`idPago`),
  INDEX `fk_pagos_usuarios_idx` (`idUsuario` ASC) INVISIBLE,
  CONSTRAINT `fk_pagos_usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `db_instituto_mexico`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

INSERT INTO usuarios (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, TipoUsuario, Pasword) 
	VALUES ('0000', 'José', 'Sanchez', 'Hernandez', '25', 'Masculino', 'JSH@correo.com', 'PDC', 'Progweb2#');
INSERT INTO usuarios (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, TipoUsuario, Pasword) 
	VALUES ('9999', 'Diana', 'Medina', 'Herrera', '30', 'Femenino', 'DMH@correo.com', 'PF', 'Progweb2#');
