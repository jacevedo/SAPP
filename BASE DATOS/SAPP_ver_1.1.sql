-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-10-2013 a las 13:36:40
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
  `NOMBRE` varchar(50) NOT NULL,
  `APP_PATERNO` varchar(50) NOT NULL,
  `APP_MATERNO` varchar(50) NOT NULL,
  `RUT` varchar(11) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ALUMNO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `alumno`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asistencia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `ID_CURSO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INSTITUCION` int(11) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_ALUMNO` int(11) NOT NULL,
  `NIVEL` varchar(50) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `LETRA` varchar(1) NOT NULL,
  PRIMARY KEY (`ID_CURSO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `curso`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `institucion`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `profesor`
--


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

