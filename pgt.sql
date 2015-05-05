-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-05-2015 a las 07:24:56
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CalificarProyecto`( IN codigo varchar(10), IN calificacion1 varchar(8), IN calificacion2 varchar(8))
BEGIN

	IF calificacion1 = "Aprovado" && calificacion2 = "Aprovado" then
    	UPDATE proyecto SET estado = "Aprovado" WHERE cod_proyecto = codigo;
    else
    	UPDATE proyecto SET estado="Rechazado" WHERE cod_proyecto=codigo ;
    end IF;
    
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `profesor_proyecto`(IN id VARCHAR(10), IN rol varchar(8))
SELECT nom_profesor,ape_profesor from profesor_proyecto,profesor where profesor_proyecto.cod_profesor=profesor.cedula AND profesor_proyecto.cod_proyecto=id and profesor_proyecto.rol=rol$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `directores`
--
CREATE TABLE IF NOT EXISTS `directores` (
`director` varchar(41)
,`cod_proyecto` varchar(10)
);
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
('123', '123', 'Hernandez', 'Edixon', '20151.1'),
('1264', '444', 'Lizeth', 'Contreras', '1511'),
('1612', '111', 'Borja', 'Martinez', '1501'),
('1784', '222', 'Carlos', 'Gutierrez', '1511'),
('6254', '333', 'Daniela', 'Guzman', '1512');

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
-- Estructura Stand-in para la vista `jurados`
--
CREATE TABLE IF NOT EXISTS `jurados` (
`jurado` varchar(41)
,`cod_proyecto` varchar(10)
);
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
('1', '20151.1', '1'),
('1', '20151.2', '1'),
('2', '20151.2', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `cedula` varchar(15) NOT NULL,
  `nom_profesor` varchar(20) DEFAULT NULL,
  `ape_profesor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`cedula`, `nom_profesor`, `ape_profesor`) VALUES
('124376', 'Duvan', 'Ordiñez'),
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
  `nom_correo` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_correo`
--

INSERT INTO `profesor_correo` (`cod_profesor`, `nom_correo`) VALUES
('124376', 'duvan@gmail.com'),
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
  `calificacion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor_proyecto`
--

INSERT INTO `profesor_proyecto` (`cod_proyecto`, `cod_profesor`, `rol`, `calificacion`) VALUES
('1501', '7845', 'director', 'activo'),
('1502', '9856', 'jurado', 'inactivo'),
('1512', '9546', 'jurado', 'activo'),
('20151.1', '3245', 'director', 'activo'),
('20151.2', '124376', 'director', 'En Proceso');

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
('124376', '312321');

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
('1501', 'titulo1_proy', 'resumen1_proy', '1/1/2015', '0000-00-00', '0000-00-00'),
('1502', 'titulo2_proy', 'resumen2_proy', '1/6/2015', '0000-00-00', '0000-00-00'),
('1511', 'titulo3_proy', 'resumen3_proy', '1/1/2016', '0000-00-00', '0000-00-00'),
('1512', 'titulo4_proy', 'resumen4_proy', '1/6/2016', '0000-00-00', '0000-00-00'),
('20151.1', 'lal', 'es un lal', 'Aprovado', '2015-12-31', '2014-12-31'),
('20151.2', 'Scrum Educado', 'Resumen', 'En Proceso', '2014-07-27', '2015-02-02');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyectos`
--
CREATE TABLE IF NOT EXISTS `proyectos` (
`cod_proyecto` varchar(10)
,`titulo` varchar(20)
,`estudiante` varchar(21)
,`jurado` varchar(41)
,`director` varchar(41)
);
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

-- --------------------------------------------------------

--
-- Estructura para la vista `directores`
--
DROP TABLE IF EXISTS `directores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `directores` AS select concat(`profesor`.`nom_profesor`,' ',`profesor`.`ape_profesor`) AS `director`,`profesor_proyecto`.`cod_proyecto` AS `cod_proyecto` from (`profesor` join `profesor_proyecto`) where ((`profesor`.`cedula` = `profesor_proyecto`.`cod_profesor`) and (`profesor_proyecto`.`rol` = 'director'));

-- --------------------------------------------------------

--
-- Estructura para la vista `jurados`
--
DROP TABLE IF EXISTS `jurados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jurados` AS select concat(`profesor`.`nom_profesor`,' ',`profesor`.`ape_profesor`) AS `jurado`,`profesor_proyecto`.`cod_proyecto` AS `cod_proyecto` from (`profesor` join `profesor_proyecto`) where ((`profesor`.`cedula` = `profesor_proyecto`.`cod_profesor`) and (`profesor_proyecto`.`rol` = 'jurado'));

-- --------------------------------------------------------

--
-- Estructura para la vista `proyectos`
--
DROP TABLE IF EXISTS `proyectos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectos` AS select `proyecto`.`cod_proyecto` AS `cod_proyecto`,`proyecto`.`titulo` AS `titulo`,concat(`estudiante`.`nom_estudiante`,' ',`estudiante`.`ape_estudiante`) AS `estudiante`,`jurados`.`jurado` AS `jurado`,`directores`.`director` AS `director` from (((`estudiante` join `proyecto`) join `jurados`) join `directores`) where ((`proyecto`.`cod_proyecto` = `estudiante`.`cod_proyecto`) and ((`proyecto`.`cod_proyecto` = `jurados`.`cod_proyecto`) or (`proyecto`.`cod_proyecto` = `directores`.`cod_proyecto`))) order by `proyecto`.`cod_proyecto`;

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
