-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2013 a las 20:41:43
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `SAPP`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `ID_ALUMNO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CURSO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APP_PATERNO` varchar(50) NOT NULL,
  `APP_MATERNO` varchar(50) NOT NULL,
  `RUT` varchar(11) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ALUMNO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`ID_ALUMNO`, `ID_CURSO`, `NOMBRE`, `APP_PATERNO`, `APP_MATERNO`, `RUT`, `TELEFONO`, `CORREO`) VALUES
(1, 1, 'Pedro', 'Perez ', 'Peres', '12312123-2', 7780184, 'asd@asd.com'),
(2, 2, 'pablo', 'marmol', 'asd', '17383182-3', 1231321, 'asd@asd.com'),
(4, 2, 'Juan', 'Peres', 'espinosa', '17892323-2', 7780186, 'asd@asd.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anotacion`
--

CREATE TABLE IF NOT EXISTS `anotacion` (
  `ID_ANOTACION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` datetime NOT NULL,
  `CAUSA` varchar(100) NOT NULL,
  `ES_POSITIVA` int(11) NOT NULL,
  PRIMARY KEY (`ID_ANOTACION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `anotacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado`
--

CREATE TABLE IF NOT EXISTS `apoderado` (
  `ID_APODERADO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `RELACION_ESTUDIANTE` varchar(50) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_APODERADO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `apoderado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `ID_ASISTENCIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ASISTIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ASISTENCIA`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ID_ASISTENCIA`, `ID_ALUMNO`, `FECHA`, `ASISTIO`) VALUES
(1, 1, '2013-12-12', 0),
(2, 2, '2013-12-12', 0),
(3, 3, '2013-12-12', 0),
(4, 4, '2013-12-12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INSTITUCION` int(11) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  `NIVEL` varchar(50) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `LETRA` varchar(1) NOT NULL,
  PRIMARY KEY (`ID_CURSO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_CURSO`, `ID_INSTITUCION`, `ID_PROFESOR`, `NIVEL`, `NUMERO`, `LETRA`) VALUES
(1, 1, 1, 'Basico', 4, 'B'),
(2, 1, 1, 'Medio', 1, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `ID_HORARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CURSO` int(11) NOT NULL,
  `DIA` varchar(100) NOT NULL,
  `HORA_INICIO` int(11) NOT NULL,
  `HORA_TERMINO` int(11) NOT NULL,
  `NOM_CLASE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_HORARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `horario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `ID_INSTITUCION` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(150) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `CONTACTO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_INSTITUCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`ID_INSTITUCION`, `NOMBRE`, `DIRECCION`, `DESCRIPCION`, `TELEFONO`, `CORREO`, `CONTACTO`) VALUES
(1, 'Forjadores', 'asd 123 ', 'colegio malo', 7780184, 'forjadores@forjadores.cl', 'Juan Peres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `ID_MATERIAL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROFESOR` int(11) NOT NULL,
  `URL_MATERIA` varchar(150) NOT NULL,
  `TIPO` varchar(150) NOT NULL,
  `TITULO` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_MATERIAL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `material`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ID_NOTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALUMNO` int(11) NOT NULL,
  `NOTA` double NOT NULL,
  `CONCEPTO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_NOTA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `nota`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `ID_OPCIONES` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PREGUNTAS` int(11) NOT NULL,
  `OPCION` varchar(2) NOT NULL,
  `ES_CORRECTA` int(11) NOT NULL,
  `GLOSA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_OPCIONES`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `opciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `ID_PREGUNTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRUEBA` int(11) NOT NULL,
  `NUM_PREGUNTA` int(11) NOT NULL,
  `PREGUNTA` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_PREGUNTA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `preguntas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `ID_PROFESOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APP_PATERNO` varchar(50) NOT NULL,
  `APP_MATERNO` varchar(50) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `PASS` text NOT NULL,
  `BIOGRAFIA` text NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PROFESOR`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROFESOR`, `NOMBRE`, `APP_PATERNO`, `APP_MATERNO`, `CORREO`, `PASS`, `BIOGRAFIA`, `TELEFONO`) VALUES
(1, 'Viviana', 'Garrido', 'Sanches', 'vi.garrido@forjadores.cl', '$2a$08$sFKDgfoHn8DTh9CGQiBd6e13fXlymaiC/ZRz6MjSlyI8jBcKdyLji', 'asdasdasd', 123123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
  `ID_PRUEBA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CURSO` int(11) NOT NULL,
  `NOM_PRUEBA` varchar(100) NOT NULL,
  `FECHA` varchar(50) NOT NULL,
  `PORCENTAJE_PRUEBA` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRUEBA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pruebas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROFESOR` int(11) NOT NULL,
  `KEY_SESSION` text NOT NULL,
  `FECHA_HORA_INGRESO` datetime NOT NULL,
  `FECHA_HORA_CADUCIDAD` datetime NOT NULL,
  PRIMARY KEY (`ID_SESSION`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `Session`
--

INSERT INTO `session` (`ID_SESSION`, `ID_PROFESOR`, `KEY_SESSION`, `FECHA_HORA_INGRESO`, `FECHA_HORA_CADUCIDAD`) VALUES
(1, 1, '$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S', '2013-10-11 17:22:12', '2013-10-11 17:22:12');
