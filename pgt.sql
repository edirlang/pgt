-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-04-2015 a las 05:21:12
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pgt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `cod_estudiante` varchar(9) NOT NULL,
  `cedula` varchar(12) DEFAULT NULL,
  `ape_estudiante` varchar(10) DEFAULT NULL,
  `nom_estudiante` varchar(10) DEFAULT NULL,
  `cod_proyecto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_estudiante`, `cedula`, `ape_estudiante`, `nom_estudiante`, `cod_proyecto`) VALUES
('123', '123', '123', '123', '20151.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_correo`
--

CREATE TABLE IF NOT EXISTS `estudiante_correo` (
  `cod_estudiante` varchar(9) NOT NULL DEFAULT '',
  `nom_correo` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_correo`
--

INSERT INTO `estudiante_correo` (`cod_estudiante`, `nom_correo`) VALUES
('123', '123@123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_telefono`
--

CREATE TABLE IF NOT EXISTS `estudiante_telefono` (
  `cod_estudiante` varchar(9) NOT NULL DEFAULT '',
  `num_telefono` varchar(13) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_telefono`
--

INSERT INTO `estudiante_telefono` (`cod_estudiante`, `num_telefono`) VALUES
('123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `cod_linea` varchar(10) NOT NULL DEFAULT '',
  `nom_linea` varchar(50) DEFAULT NULL,
  `cod_programa` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`cod_linea`, `nom_linea`, `cod_programa`) VALUES
('1', 'Ingeniera de software', '1'),
('2', 'Robotica', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_proyecto`
--

CREATE TABLE IF NOT EXISTS `linea_proyecto` (
  `cod_linea` varchar(10) NOT NULL DEFAULT '',
  `cod_proyecto` varchar(10) NOT NULL DEFAULT '',
  `cod_programa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_proyecto`
--

INSERT INTO `linea_proyecto` (`cod_linea`, `cod_proyecto`, `cod_programa`) VALUES
('1', '20151.1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `cedula` varchar(15) NOT NULL,
  `cargo` varchar(10) DEFAULT NULL,
  `nom_profesor` varchar(20) DEFAULT NULL,
  `ape_profesor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cedula`, `cargo`, `nom_profesor`, `ape_profesor`) VALUES
('123', 'Docente', 'Fernando', 'Sotelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_correo`
--

CREATE TABLE IF NOT EXISTS `profesor_correo` (
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `nom_correo` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_correo`
--

INSERT INTO `profesor_correo` (`cod_profesor`, `nom_correo`) VALUES
('123', '123@123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_proyecto`
--

CREATE TABLE IF NOT EXISTS `profesor_proyecto` (
  `cod_proyecto` varchar(10) NOT NULL DEFAULT '',
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `rol` varchar(8) DEFAULT NULL,
  `calificacion` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_proyecto`
--

INSERT INTO `profesor_proyecto` (`cod_proyecto`, `cod_profesor`, `rol`, `calificacion`) VALUES
('20151.1', '123', 'director', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_telefono`
--

CREATE TABLE IF NOT EXISTS `profesor_telefono` (
  `cod_profesor` varchar(15) NOT NULL DEFAULT '',
  `num_telefono` varchar(13) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_telefono`
--

INSERT INTO `profesor_telefono` (`cod_profesor`, `num_telefono`) VALUES
('123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `cod_programa` varchar(6) NOT NULL,
  `nom_programa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`cod_programa`, `nom_programa`) VALUES
('1', 'Ingenieria de Sistemas'),
('2', 'Ingeniería Electronica');

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
  `fecha_aprovacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`cod_proyecto`, `titulo`, `resumen`, `estado`, `fecha_inicio`, `fecha_aprovacion`) VALUES
('20151.1', 'lal', 'es un lal', 'En Proceso', '2015-12-31', '2014-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `contrasena`) VALUES
('1', '1', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
 ADD PRIMARY KEY (`cod_estudiante`), ADD KEY `estudiante_proyecto` (`cod_proyecto`);

--
-- Indices de la tabla `estudiante_correo`
--
ALTER TABLE `estudiante_correo`
 ADD PRIMARY KEY (`cod_estudiante`,`nom_correo`);

--
-- Indices de la tabla `estudiante_telefono`
--
ALTER TABLE `estudiante_telefono`
 ADD PRIMARY KEY (`cod_estudiante`,`num_telefono`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
 ADD PRIMARY KEY (`cod_linea`,`cod_programa`), ADD KEY `proyecto_linea` (`cod_programa`);

--
-- Indices de la tabla `linea_proyecto`
--
ALTER TABLE `linea_proyecto`
 ADD PRIMARY KEY (`cod_linea`,`cod_proyecto`), ADD KEY `cod_proyecto` (`cod_proyecto`), ADD KEY `cod_linea` (`cod_linea`,`cod_programa`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `profesor_correo`
--
ALTER TABLE `profesor_correo`
 ADD PRIMARY KEY (`cod_profesor`,`nom_correo`);

--
-- Indices de la tabla `profesor_proyecto`
--
ALTER TABLE `profesor_proyecto`
 ADD PRIMARY KEY (`cod_proyecto`,`cod_profesor`), ADD KEY `cod_profesor` (`cod_profesor`);

--
-- Indices de la tabla `profesor_telefono`
--
ALTER TABLE `profesor_telefono`
 ADD PRIMARY KEY (`cod_profesor`,`num_telefono`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
 ADD PRIMARY KEY (`cod_programa`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
 ADD PRIMARY KEY (`cod_proyecto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`cedula`);

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
ADD CONSTRAINT `proyecto_linea` FOREIGN KEY (`cod_programa`) REFERENCES `programa` (`cod_programa`);

--
-- Filtros para la tabla `linea_proyecto`
--
ALTER TABLE `linea_proyecto`
ADD CONSTRAINT `linea_proyecto_ibfk_1` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`),
ADD CONSTRAINT `linea_proyecto_ibfk_2` FOREIGN KEY (`cod_linea`, `cod_programa`) REFERENCES `linea` (`cod_linea`, `cod_programa`);

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
