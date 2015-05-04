-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2015 a las 04:52:51
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pgt`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addAutomovil`(IN nombre VARCHAR(50),IN plazas INT)
BEGIN
 IF plazas < 6 THEN
   INSERT INTO coche VALUES(nombre,plazas);
 ELSE
    INSERT INTO monovolumen VALUES(nombre,plazas);
  END IF;
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CalificarProyecto`( IN codigo varchar(10), IN calificacion1 varchar(8), IN calificacion2 varchar(8))
BEGIN

	IF calificacion1 = "Aprovado" && calificacion2 = "Aprovado" then
    	UPDATE proyecto SET estado = "Aprovado" WHERE cod_proyecto = codigo;
    else
    	UPDATE proyecto SET estado="Rechazado" WHERE cod_proyecto=codigo ;
    end IF;
    
    
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `cod_estudiante` varchar(9) NOT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `ape_estudiante` varchar(10) DEFAULT NULL,
  `nom_estudiante` varchar(10) DEFAULT NULL,
  `cod_proyecto` varchar(10) NOT NULL,
  PRIMARY KEY (`cod_estudiante`),
  KEY `estudiante_proyecto` (`cod_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_estudiante`, `cedula`, `ape_estudiante`, `nom_estudiante`, `cod_proyecto`) VALUES
('1221', '32323223', 'ricaurte', 'Alejandro', '20151.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_correo`
--

CREATE TABLE IF NOT EXISTS `estudiante_correo` (
  `cod_estudiante` varchar(9) NOT NULL DEFAULT '',
  `nom_correo` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_estudiante`,`nom_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_correo`
--

INSERT INTO `estudiante_correo` (`cod_estudiante`, `nom_correo`) VALUES
('1221', 'alejandro@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_telefono`
--

CREATE TABLE IF NOT EXISTS `estudiante_telefono` (
  `cod_estudiante` varchar(9) NOT NULL DEFAULT '',
  `num_telefono` varchar(13) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_estudiante`,`num_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_telefono`
--

INSERT INTO `estudiante_telefono` (`cod_estudiante`, `num_telefono`) VALUES
('1221', '3422323');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `cod_linea` varchar(10) NOT NULL DEFAULT '',
  `nom_linea` varchar(50) DEFAULT NULL,
  `cod_programa` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_linea`,`cod_programa`),
  KEY `programa_linea` (`cod_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`cod_linea`, `nom_linea`, `cod_programa`) VALUES
('1', 'Software', '1'),
('121', 'codigo limpio', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_proyecto`
--

CREATE TABLE IF NOT EXISTS `linea_proyecto` (
  `cod_linea` varchar(10) NOT NULL DEFAULT '',
  `cod_proyecto` varchar(10) NOT NULL DEFAULT '',
  `cod_programa` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cod_linea`,`cod_proyecto`),
  KEY `proyecto_linea` (`cod_proyecto`),
  KEY `linea_proyecto` (`cod_linea`,`cod_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_proyecto`
--

INSERT INTO `linea_proyecto` (`cod_linea`, `cod_proyecto`, `cod_programa`) VALUES
('1', '20151.1', '1'),
('1', '20151.2', '1'),
('1', '20151.3', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `cedula` varchar(15) NOT NULL,
  `nom_profesor` varchar(20) DEFAULT NULL,
  `ape_profesor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cedula`, `nom_profesor`, `ape_profesor`) VALUES
('3245', 'Fernando', 'Sotelo'),
('6245', 'Andres', 'Novoa'),
('7845', 'Juan', 'Botero'),
('9546', 'Miguel', 'Ojeda'),
('9856', 'Esperanza', 'Merchan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_correo`
--

CREATE TABLE IF NOT EXISTS `profesor_correo` (
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `nom_correo` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_profesor`,`nom_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_correo`
--

INSERT INTO `profesor_correo` (`cod_profesor`, `nom_correo`) VALUES
('3245', 'sotelo@hotmail.com'),
('6245', 'novoa@hotmail.com'),
('7845', 'botero@hotmail.com'),
('9546', 'ojeda@hotmail.com'),
('9856', 'merchan@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_proyecto`
--

CREATE TABLE IF NOT EXISTS `profesor_proyecto` (
  `cod_proyecto` varchar(10) NOT NULL DEFAULT '',
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `rol` varchar(8) DEFAULT NULL,
  `calificacion` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`cod_proyecto`,`cod_profesor`),
  KEY `cod_profesor` (`cod_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_proyecto`
--

INSERT INTO `profesor_proyecto` (`cod_proyecto`, `cod_profesor`, `rol`, `calificacion`) VALUES
('20151.1', '7845', 'director', ''),
('20151.2', '7845', 'director', ''),
('20151.3', '3245', 'director', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_telefono`
--

CREATE TABLE IF NOT EXISTS `profesor_telefono` (
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `num_telefono` varchar(13) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_profesor`,`num_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `cod_programa` varchar(6) NOT NULL,
  `nom_programa` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`cod_programa`, `nom_programa`) VALUES
('1', 'Ingenieria de Sistemas'),
('21', 'Ingeniería Ambiental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `cod_proyecto` varchar(10) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_aprovacion` date DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`cod_proyecto`, `titulo`, `resumen`, `estado`, `fecha_inicio`, `fecha_aprovacion`, `archivo`) VALUES
('20151.1', 'Nanaotecnologia', 'Nanaotecnologia', 'En Proceso', '2015-05-10', '2015-05-14', 'archivo/algebra1.pdf'),
('20151.2', 'hUELLA DE CARBONO', 'E', 'En Proceso', '2015-05-09', '2015-05-12', 'archivo/algebra1.pdf'),
('20151.3', 'SAOFTWARE erP', 'dfd', 'En Proceso', '2015-05-08', '2015-05-14', 'archivo/algebra1.pdf');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_proyecto` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`);

--
-- Filtros para la tabla `estudiante_correo`
--
ALTER TABLE `estudiante_correo`
  ADD CONSTRAINT `correo_estudiante` FOREIGN KEY (`cod_estudiante`) REFERENCES `estudiante` (`cod_estudiante`);

--
-- Filtros para la tabla `estudiante_telefono`
--
ALTER TABLE `estudiante_telefono`
  ADD CONSTRAINT `estudiante_telefono` FOREIGN KEY (`cod_estudiante`) REFERENCES `estudiante` (`cod_estudiante`);

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
  ADD CONSTRAINT `programa_linea` FOREIGN KEY (`cod_programa`) REFERENCES `programa` (`cod_programa`);

--
-- Filtros para la tabla `linea_proyecto`
--
ALTER TABLE `linea_proyecto`
  ADD CONSTRAINT `proyecto_linea` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`),
  ADD CONSTRAINT `linea_proyecto` FOREIGN KEY (`cod_linea`, `cod_programa`) REFERENCES `linea` (`cod_linea`, `cod_programa`);

--
-- Filtros para la tabla `profesor_correo`
--
ALTER TABLE `profesor_correo`
  ADD CONSTRAINT `profesor_correo` FOREIGN KEY (`cod_profesor`) REFERENCES `profesor` (`cedula`);

--
-- Filtros para la tabla `profesor_proyecto`
--
ALTER TABLE `profesor_proyecto`
  ADD CONSTRAINT `profesor_proyecto_ibfk_1` FOREIGN KEY (`cod_profesor`) REFERENCES `profesor` (`cedula`),
  ADD CONSTRAINT `profesor_proyecto_ibfk_2` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`);

--
-- Filtros para la tabla `profesor_telefono`
--
ALTER TABLE `profesor_telefono`
  ADD CONSTRAINT `profesor_telefono` FOREIGN KEY (`cod_profesor`) REFERENCES `profesor` (`cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
