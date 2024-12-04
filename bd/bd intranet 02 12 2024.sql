/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `intranet_notas`;
CREATE DATABASE IF NOT EXISTS `intranet_notas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `intranet_notas`;

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `carrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

DELETE FROM `carrera`;

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `docente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estado` enum('Activo','Bloqueado') DEFAULT 'Activo',
  PRIMARY KEY (`docente_id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DELETE FROM `docente`;

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `estudiante_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `estado` enum('activo','bloqueado') DEFAULT 'activo',
  PRIMARY KEY (`estudiante_id`),
  UNIQUE KEY `dni` (`dni`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DELETE FROM `estudiante`;

DROP TABLE IF EXISTS `estuidante_docente_modulo`;
CREATE TABLE IF NOT EXISTS `estuidante_docente_modulo` (
  `estuidante_docente_modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `modulo_id` int(11) DEFAULT NULL,
  `estado` enum('Iniciado','Finalizado') DEFAULT NULL,
  `fechaRegistro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`estuidante_docente_modulo_id`),
  KEY `FK_estuidante_docente_modulo_estudiante` (`estudiante_id`),
  KEY `FK_estuidante_docente_modulo_docente` (`docente_id`),
  KEY `FK_estuidante_docente_modulo_modulo` (`modulo_id`),
  CONSTRAINT `FK_estuidante_docente_modulo_docente` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`docente_id`),
  CONSTRAINT `FK_estuidante_docente_modulo_estudiante` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`estudiante_id`),
  CONSTRAINT `FK_estuidante_docente_modulo_modulo` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`modulo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

DELETE FROM `estuidante_docente_modulo`;

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  PRIMARY KEY (`modulo_id`),
  KEY `carrera_id` (`carrera_id`),
  CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

DELETE FROM `modulo`;

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `nota_id` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` decimal(4,2) DEFAULT NULL,
  `nota2` decimal(4,2) DEFAULT NULL,
  `nota3` decimal(4,2) DEFAULT NULL,
  `nota4` decimal(4,2) DEFAULT NULL,
  `promedio` decimal(4,2) GENERATED ALWAYS AS ((`nota1` + `nota2` + `nota3` + `nota4`) / 4) STORED,
  `estuidante_docente_modulo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`nota_id`),
  KEY `FK_notas_estuidante_docente_modulo` (`estuidante_docente_modulo_id`),
  CONSTRAINT `FK_notas_estuidante_docente_modulo` FOREIGN KEY (`estuidante_docente_modulo_id`) REFERENCES `estuidante_docente_modulo` (`estuidante_docente_modulo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DELETE FROM `notas`;

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `pago_id` int(11) NOT NULL AUTO_INCREMENT,
  `estudiante_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` enum('pendiente','pagado') DEFAULT 'pendiente',
  PRIMARY KEY (`pago_id`),
  KEY `estudiante_id` (`estudiante_id`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`estudiante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DELETE FROM `pago`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
