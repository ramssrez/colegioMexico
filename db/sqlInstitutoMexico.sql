
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
  INDEX `fk_pagos_usuarios_idx` (`idUsuario` ASC),
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
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (2, 'CP950ENE', 'Colegiatura primaria', 'Enero', 6500, '2024/01/07');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (2, 'AE950ENE', 'Actividad extraescolar', 'Enero', 580, '2024/01/05');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (2, 'DE950ENE', 'Desayuno', 'Enero', 1000, '2024/01/09');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (2, 'VM905FEB', 'Visita museo de cera', 'Febrero', 980, '2024/02/1');

INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (3, 'VM905FEB', 'Visita museo de cera', 'Febrero', 980, '2024/02/1');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (3, 'VA905MAR', 'Visita acuario', 'Marzo', 1200, '2024/01/12');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (3, 'CA905ABR', 'Campamento', 'Abril', '2750', '2024/01/15');

INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'CP950ENE', 'Colegiatura primaria', 'Enero', 6500, '2024/01/07');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'AE950ENE', 'Actividad extraescolar', 'Enero', 580, '2024/01/05');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'DE950ENE', 'Desayuno', 'Enero', 1000, '2024/01/09');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'VM905FEB', 'Visita museo de cera', 'Febrero', 980, '2024/02/1');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'VA905MAR', 'Visita acuario', 'Marzo', 1200, '2024/01/12');
INSERT INTO pagos (idUsuario, FolioPago, Concepto, MesPagado, Monto, FechaPago) VALUES (5, 'CA905ABR', 'Campamento', 'Abril', '2750', '2024/01/15');