-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2015 a las 15:50:13
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `CalificarProyecto`(IN codigo varchar(10), In calificacion1 varchar(10), IN calificacion2 varchar(10))
BEGIN
	IF calificacion1 = "Aprobado" && calificacion2 = "Aprobado" then
    	UPDATE proyecto 
        SET estado = "Aprobado", fecha_aprovacion = CURDATE() 
        WHERE cod_proyecto = codigo;
    else
    	UPDATE proyecto 
        SET estado="Rechazado", fecha_aprovacion = CURDATE()  
        WHERE cod_proyecto=codigo ;
    end IF;
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `calificar_proyecto_director`(IN `var1` VARCHAR(10), IN `var2` VARCHAR(15), IN `var3` VARCHAR(12))
begin
	UPDATE persona_proyecto SET calificacion = var3 WHERE cod_proyecto = var1 AND cod_persona = var2;
    UPDATE proyecto SET estado = var3 WHERE cod_proyecto = var1;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProyectosEstado`()
begin
select proyecto.cod_proyecto, proyecto.titulo, estudiantes.estudiante, directores.director, proyecto.estado, linea.nom_linea as linea, programa.nom_programa as programa
from proyecto, estudiantes, directores, linea_proyecto, linea, programa 
where proyecto.cod_proyecto = estudiantes.cod_proyecto and proyecto.cod_proyecto = directores.cod_proyecto and linea_proyecto.cod_proyecto = proyecto.cod_proyecto and linea_proyecto.cod_linea = linea.cod_linea and linea_proyecto.cod_programa = programa.cod_programa;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProyectosLinea`(IN `codigo` VARCHAR(10))
SELECT proyectos2.cod_proyecto, proyectos2.titulo, proyectos2.estudiante, proyectos2.director, proyectos.jurado FROM proyectos2 LEFT OUTER JOIN proyectos ON proyectos.cod_proyecto = proyectos2.cod_proyecto where proyectos2.linea=codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProyectosPrograma`(IN `codigo` VARCHAR(6))
SELECT proyectos2.cod_proyecto, proyectos2.titulo, proyectos2.estudiante, proyectos2.director, proyectos.jurado FROM proyectos2 LEFT OUTER JOIN proyectos ON proyectos.cod_proyecto = proyectos2.cod_proyecto where proyectos2.programa=codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `profesor_proyecto`(IN id VARCHAR(10), IN rol varchar(8))
BEGIN
SELECT nom_persona,ape_persona from persona_proyecto,persona where persona_proyecto.cod_persona=persona.cedula AND persona_proyecto.cod_proyecto=id and persona_proyecto.rol=rol;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `directores`
--
CREATE TABLE IF NOT EXISTS `directores` (
`cedula` varchar(12)
,`director` varchar(21)
,`cod_proyecto` varchar(10)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estudiantes`
--
CREATE TABLE IF NOT EXISTS `estudiantes` (
`cedula` varchar(12)
,`estudiante` text
,`cod_proyecto` varchar(10)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculta`
--

CREATE TABLE IF NOT EXISTS `faculta` (
  `cod_facultad` varchar(6) NOT NULL DEFAULT '',
  `nom_facultad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_facultad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faculta`
--

INSERT INTO `faculta` (`cod_facultad`, `nom_facultad`) VALUES
('1', 'Facultad de Ingenieria');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `jurados`
--
CREATE TABLE IF NOT EXISTS `jurados` (
`cedula` varchar(12)
,`jurado` text
,`cod_proyecto` varchar(10)
);
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
('1', 'Bases de datos', '1'),
('2', 'Ingenieria de Software', '1');

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
('1', '20152.1', '1'),
('1', '20152.2', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `cedula` varchar(12) NOT NULL DEFAULT 'not null',
  `cod_persona` varchar(9) DEFAULT NULL,
  `nom_persona` varchar(10) DEFAULT NULL,
  `ape_persona` varchar(10) DEFAULT NULL,
  `creditos` varchar(3) NOT NULL,
  `programa` varchar(6) NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `programa` (`programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cedula`, `cod_persona`, `nom_persona`, `ape_persona`, `creditos`, `programa`) VALUES
('09877', 'kjkjkj', 'kjkjkj', 'kjkjkj', '', ''),
('12', 'doc', 'Fernando', 'Sotelo', '', ''),
('13', '123', 'edixon2', 'hernand3', '', ''),
('161212', '161212', 'die2g3o', 'f3r2anco', '', ''),
('232332', 'doc', 'Alejandro', 'Ruiz', '', ''),
('2332', 'fernando', 'sdds', 'dsdssd', '', ''),
('3223', '323', 'Fernando2', 'Ricaurte', '', ''),
('4344', '2131', 'fernado', 'ricaurte', '', ''),
('7845', 'doc', 'Fernando', 'Sotelo', '', ''),
('898989', '89898', 'jkjkjk', 'jkjkj', '', ''),
('9856', 'doc', 'Fernando', 'Sotelo', '', ''),
('kjkjkjkj', '898978', 'kjjkj', 'kjkj', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_correo`
--

CREATE TABLE IF NOT EXISTS `persona_correo` (
  `cod_persona` varchar(9) NOT NULL DEFAULT '',
  `nom_correo` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_persona`,`nom_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_correo`
--

INSERT INTO `persona_correo` (`cod_persona`, `nom_correo`) VALUES
('12', '323'),
('12', 'dewwe'),
('161212', 'email3@uni'),
('2332', 'fdfdfd@fdgfdg'),
('3223', 'sdsd@ftttt'),
('3223', 'ttttt@eeeee'),
('4344', 'fernado@gmail.2com'),
('7845', 'botero@botero'),
('9856', 'esperanza@gmail.com'),
('kjkjkjkj', 'jkj@kkl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_proyecto`
--

CREATE TABLE IF NOT EXISTS `persona_proyecto` (
  `cod_proyecto` varchar(10) NOT NULL DEFAULT '',
  `cod_persona` varchar(15) NOT NULL DEFAULT '',
  `rol` varchar(12) DEFAULT NULL,
  `calificacion` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`cod_proyecto`,`cod_persona`),
  KEY `cod_persona` (`cod_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_proyecto`
--

INSERT INTO `persona_proyecto` (`cod_proyecto`, `cod_persona`, `rol`, `calificacion`) VALUES
('20151.1', '12', 'director', 'finalizado'),
('20151.1', '13', 'estudiante', ''),
('20151.1', '232332', 'jurado', 'Aprovado'),
('20151.1', '3223', 'estudiante', ''),
('20151.1', '9856', 'jurado', 'Aprovado'),
('20152.1', '12', 'jurado', 'Aprovado'),
('20152.1', '161212', 'estudiante', ''),
('20152.1', '232332', 'director', 'finalizado'),
('20152.1', '3223', 'estudiante', ''),
('20152.1', '7845', 'jurado', 'Aprovado'),
('20152.2', '12', 'jurado', 'Aprovado'),
('20152.2', '13', 'estudiante', ''),
('20152.2', '232332', 'director', 'finalizado'),
('20152.2', '9856', 'jurado', 'Aprovado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_telefono`
--

CREATE TABLE IF NOT EXISTS `persona_telefono` (
  `cod_persona` varchar(9) NOT NULL DEFAULT '',
  `num_telefono` varchar(13) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_persona`,`num_telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_telefono`
--

INSERT INTO `persona_telefono` (`cod_persona`, `num_telefono`) VALUES
('12', '22222'),
('12', '222222'),
('161212', '2222'),
('2332', '434343'),
('3223', '111111'),
('3223', '444444'),
('3223', '6666'),
('4344', '2222'),
('kjkjkjkj', '7878');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `cod_programa` varchar(6) NOT NULL,
  `nom_programa` varchar(30) DEFAULT NULL,
  `creditos` varchar(3) NOT NULL,
  `faculta` varchar(6) NOT NULL,
  PRIMARY KEY (`cod_programa`),
  KEY `faculta` (`faculta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`cod_programa`, `nom_programa`, `creditos`, `faculta`) VALUES
('1', 'Ingenieria de sistemas', '180', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `cod_proyecto` varchar(10) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `resumen` varchar(2500) DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_aprovacion` date DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`cod_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`cod_proyecto`, `titulo`, `resumen`, `estado`, `fecha_inicio`, `fecha_aprovacion`, `archivo`) VALUES
('20151.1', 'huella', 'huellapara captura emisiones de Co2e2', 'Aprobado', '2015-05-09', '2015-05-06', 'archivo/f-ci-120923120127-phpapp02.pdf'),
('20152.1', 'ffffffffffffffffffff', 'yyyyy', 'Aprobado', '2015-05-29', '2015-12-02', 'archivo/cc_20150503_184446.reg'),
('20152.2', 'iiii', 'iii', 'Rechazado', '2015-05-29', '2015-06-02', 'archivo/Nuevo Documento de Microsoft Word (2).docx');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyectos`
--
CREATE TABLE IF NOT EXISTS `proyectos` (
`cod_proyecto` varchar(10)
,`titulo` varchar(20)
,`estudiante` text
,`director` varchar(21)
,`jurado` text
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyectos2`
--
CREATE TABLE IF NOT EXISTS `proyectos2` (
`cod_proyecto` varchar(10)
,`titulo` varchar(20)
,`estudiante` text
,`director` varchar(21)
,`estado` varchar(12)
,`linea` varchar(10)
,`programa` varchar(6)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`cedula`)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `directores` AS select `persona`.`cedula` AS `cedula`,concat(`persona`.`nom_persona`,' ',`persona`.`ape_persona`) AS `director`,`persona_proyecto`.`cod_proyecto` AS `cod_proyecto` from (`persona` join `persona_proyecto`) where ((`persona`.`cedula` = `persona_proyecto`.`cod_persona`) and (`persona_proyecto`.`rol` = 'director'));

-- --------------------------------------------------------

--
-- Estructura para la vista `estudiantes`
--
DROP TABLE IF EXISTS `estudiantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estudiantes` AS select `persona`.`cedula` AS `cedula`,group_concat(`persona`.`nom_persona`,' ',`persona`.`ape_persona` separator ',') AS `estudiante`,`persona_proyecto`.`cod_proyecto` AS `cod_proyecto` from (`persona` join `persona_proyecto`) where ((`persona`.`cedula` = `persona_proyecto`.`cod_persona`) and (`persona_proyecto`.`rol` = 'estudiante')) group by `persona_proyecto`.`cod_proyecto`;

-- --------------------------------------------------------

--
-- Estructura para la vista `jurados`
--
DROP TABLE IF EXISTS `jurados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jurados` AS select `persona`.`cedula` AS `cedula`,group_concat(`persona`.`nom_persona`,' ',`persona`.`ape_persona` separator ',') AS `jurado`,`persona_proyecto`.`cod_proyecto` AS `cod_proyecto` from (`persona` join `persona_proyecto`) where ((`persona`.`cedula` = `persona_proyecto`.`cod_persona`) and (`persona_proyecto`.`rol` = 'jurado')) group by `persona_proyecto`.`cod_proyecto`;

-- --------------------------------------------------------

--
-- Estructura para la vista `proyectos`
--
DROP TABLE IF EXISTS `proyectos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectos` AS select `proyecto`.`cod_proyecto` AS `cod_proyecto`,`proyecto`.`titulo` AS `titulo`,`estudiantes`.`estudiante` AS `estudiante`,`directores`.`director` AS `director`,`jurados`.`jurado` AS `jurado` from (((`proyecto` join `estudiantes`) join `jurados`) join `directores`) where ((`proyecto`.`cod_proyecto` = `estudiantes`.`cod_proyecto`) and (`proyecto`.`cod_proyecto` = `jurados`.`cod_proyecto`) and (`proyecto`.`cod_proyecto` = `directores`.`cod_proyecto`)) group by `proyecto`.`cod_proyecto`;

-- --------------------------------------------------------

--
-- Estructura para la vista `proyectos2`
--
DROP TABLE IF EXISTS `proyectos2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proyectos2` AS select `proyecto`.`cod_proyecto` AS `cod_proyecto`,`proyecto`.`titulo` AS `titulo`,`estudiantes`.`estudiante` AS `estudiante`,`directores`.`director` AS `director`,`proyecto`.`estado` AS `estado`,`linea`.`cod_linea` AS `linea`,`programa`.`cod_programa` AS `programa` from (((((`proyecto` join `estudiantes`) join `directores`) join `linea_proyecto`) join `linea`) join `programa`) where ((`proyecto`.`cod_proyecto` = `estudiantes`.`cod_proyecto`) and (`proyecto`.`cod_proyecto` = `directores`.`cod_proyecto`) and (`linea_proyecto`.`cod_proyecto` = `proyecto`.`cod_proyecto`) and (`linea_proyecto`.`cod_linea` = `linea`.`cod_linea`) and (`linea_proyecto`.`cod_programa` = `programa`.`cod_programa`));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `linea`
--
ALTER TABLE `linea`
  ADD CONSTRAINT `programa_linea` FOREIGN KEY (`cod_programa`) REFERENCES `programa` (`cod_programa`);

--
-- Filtros para la tabla `linea_proyecto`
--
ALTER TABLE `linea_proyecto`
  ADD CONSTRAINT `linea_proyecto` FOREIGN KEY (`cod_linea`, `cod_programa`) REFERENCES `linea` (`cod_linea`, `cod_programa`),
  ADD CONSTRAINT `proyecto_linea` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`);

--
-- Filtros para la tabla `persona_correo`
--
ALTER TABLE `persona_correo`
  ADD CONSTRAINT `correo_persona` FOREIGN KEY (`cod_persona`) REFERENCES `persona` (`cedula`);

--
-- Filtros para la tabla `persona_proyecto`
--
ALTER TABLE `persona_proyecto`
  ADD CONSTRAINT `persona_proyecto_ibfk_1` FOREIGN KEY (`cod_persona`) REFERENCES `persona` (`cedula`),
  ADD CONSTRAINT `persona_proyecto_ibfk_2` FOREIGN KEY (`cod_proyecto`) REFERENCES `proyecto` (`cod_proyecto`);

--
-- Filtros para la tabla `persona_telefono`
--
ALTER TABLE `persona_telefono`
  ADD CONSTRAINT `persona_telefono` FOREIGN KEY (`cod_persona`) REFERENCES `persona` (`cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
