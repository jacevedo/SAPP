-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2013 a las 20:20:14
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`ID_ALUMNO`, `ID_CURSO`, `NOMBRE`, `APP_PATERNO`, `APP_MATERNO`, `RUT`, `TELEFONO`, `CORREO`) VALUES
(1, 2, 'undefined', 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(2, 2, 'pablo', 'marmol', 'asd', '17383182-3', 1231321, 'asd@asd.com'),
(4, 2, 'Juan', 'Peres', 'espinosa', '17892323-2', 7780186, 'asd@asd.com'),
(5, 2, 'Juan', 'Peres', 'espinosa', '17892323-2', 7780186, 'asd@asd.com'),
(6, 1, 'Jaime', 'Acevedo', 'Cerna', '178973592', 7780184, 'jaim.acevedoc@gmail.com'),
(7, 2, 'Jaime Andres', 'Acevedo', 'Cerna', '178973592', 7780184, 'jaim.acevedo@gmail.com');

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
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `ID_CLASE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UNIDAD` int(11) NOT NULL,
  `OBJETIVO` varchar(500) NOT NULL,
  `DURACION` int(11) NOT NULL,
  `CONTENIDO_CONCEPTUAL` varchar(500) NOT NULL,
  `CONTENIDO_PROCEDIMENTALES` varchar(500) NOT NULL,
  `CONTENIDO_ACTITUDINAL` varchar(500) NOT NULL,
  `INICIO_CLASE` varchar(500) NOT NULL,
  `DESARROLLO_CLASE` varchar(500) NOT NULL,
  `CIERRE_CLASE` varchar(500) NOT NULL,
  `TIPO_EVALUACION` varchar(500) NOT NULL,
  `INSTRUMENTO_EVALUACION` varchar(500) NOT NULL,
  `RECURSO_INICIO` varchar(500) NOT NULL,
  `RECURSO_DESARROLLO` varchar(500) NOT NULL,
  `RECURSO_CIERRE` varchar(500) NOT NULL,
  PRIMARY KEY (`ID_CLASE`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `clases`
--

INSERT INTO `clases` (`ID_CLASE`, `ID_UNIDAD`, `OBJETIVO`, `DURACION`, `CONTENIDO_CONCEPTUAL`, `CONTENIDO_PROCEDIMENTALES`, `CONTENIDO_ACTITUDINAL`, `INICIO_CLASE`, `DESARROLLO_CLASE`, `CIERRE_CLASE`, `TIPO_EVALUACION`, `INSTRUMENTO_EVALUACION`, `RECURSO_INICIO`, `RECURSO_DESARROLLO`, `RECURSO_CIERRE`) VALUES
(1, 1, 'enseñar raizes', 90, 'a operar raisez', 'Ejercicios Repetitivos', 'Para el futuro', 'ejercicios', 'ejercicios', 'ejercicios', 'pueba escrita', 'papel', 'lapiz Papel', 'lapiz papel tijeras', 'lapiz Papel tijeras'),
(3, 1, 'enseñar raizes', 90, 'a operar raisez', 'Ejercicios Repetitivos', 'Para el futuro', 'ejercicios', 'ejercicios', 'ejercicios', 'pueba escrita', 'papel', 'lapiz Papel', 'lapiz papel', 'lapiz Papel');

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
  `MATERIA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_CURSO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_CURSO`, `ID_INSTITUCION`, `ID_PROFESOR`, `NIVEL`, `NUMERO`, `LETRA`, `MATERIA`) VALUES
(1, 1, 4, 'Basico', 4, 'B', 'Matematicas'),
(2, 1, 4, 'Medio', 1, 'C', 'Lenguaje');

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
-- Estructura de tabla para la tabla `institucion_profesor`
--

CREATE TABLE IF NOT EXISTS `institucion_profesor` (
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_INSTITUCION` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `institucion_profesor`
--

INSERT INTO `institucion_profesor` (`ID_PROFESOR`, `ID_INSTITUCION`) VALUES
(1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROFESOR`, `NOMBRE`, `APP_PATERNO`, `APP_MATERNO`, `CORREO`, `PASS`, `BIOGRAFIA`, `TELEFONO`) VALUES
(3, 'Viviana', 'Garrido', 'Sanches', '  vi.garrido@forjadores.cl', '$2a$08$sFKDgfoHn8DTh9CGQiBd6e13fXlymaiC/ZRz6MjSlyI8jBcKdyLji', 'asdasd', 7780184),
(4, 'Jaime', 'Acevedo', 'Cerna', '  jaim.acevedoc@gmail.com', '$2a$08$sFKDgfoHn8DTh9CGQiBd6e13fXlymaiC/ZRz6MjSlyI8jBcKdyLji', 'asd', 12);

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

CREATE TABLE IF NOT EXISTS `Session` (
  `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROFESOR` int(11) NOT NULL,
  `KEY_SESSION` text NOT NULL,
  `FECHA_HORA_INGRESO` datetime NOT NULL,
  `FECHA_HORA_CADUCIDAD` datetime NOT NULL,
  PRIMARY KEY (`ID_SESSION`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Volcar la base de datos para la tabla `Session`
--

INSERT INTO `Session` (`ID_SESSION`, `ID_PROFESOR`, `KEY_SESSION`, `FECHA_HORA_INGRESO`, `FECHA_HORA_CADUCIDAD`) VALUES
(1, 1, '$2a$08$CeC1WsgtmYneiTRV3uDa3eAAVUcZ6t2TUV8arPwop/.3MfFrkhw/S', '2013-10-11 17:22:12', '2013-10-11 17:22:12'),
(2, 1, '$2a$08$yEt3yhwDJ1yJutzFVkdD6eJwY4E2JFfKA6w0aTHcygF59rg5.ogMq', '2013-10-11 18:03:08', '2013-10-11 18:03:08'),
(3, 1, '$2a$08$ZBa6C1F9xDWOWJnzIWJnqe0iImN9JLZ8ZCuiRopBL4T0hi.B/zIBG', '2013-10-11 18:13:08', '2013-10-11 18:13:08'),
(4, 1, '$2a$08$PKHsmpKRNiCZANUfNc7.Q.Lx0pPuPFRne3T9BgyC02OKiix7Frb66', '2013-10-11 18:13:43', '2013-10-11 18:13:43'),
(5, 1, '$2a$08$ifYU2Fu7xuW.7u7ypxWMW.w.yA/I9msMTARWDYSade6WQDkPt980i', '2013-10-11 18:14:43', '2013-10-11 18:14:43'),
(6, 1, '$2a$08$FUdRN0RpUGVoQqIzCLCO5uH873U1RK2Wu1mVv0Oc6mAYOoufl1GWC', '2013-10-11 18:24:13', '2013-10-11 18:24:13'),
(7, 1, '$2a$08$NURoRVyUFU1ikyDXAwcvPuje5n9GK0CiWty3FyCZjwuihdqV4csgK', '2013-10-11 18:36:32', '2013-10-11 18:36:32'),
(8, 1, '$2a$08$YDu4aALfum18mylMaslTg.yyJxF6sEN3oLvhnRIS7fTiEY58kWYCi', '2013-10-11 18:48:55', '2013-10-11 18:48:55'),
(9, 1, '$2a$08$FuFdQO.itbom8e/hxQIBu.oaTy811RDRgC23JP6vtpcZSkWk/XAC6', '2013-10-11 19:38:18', '2013-10-11 19:38:18'),
(10, 1, '$2a$08$EReexfZlpZjfQGmAx5t/Yeb/JAg.Ka9j8tkIoRtcQxLpRQvPpFgiu', '2013-10-11 19:39:45', '2013-10-11 19:39:45'),
(11, 1, '$2a$08$TG2ajmD9MX0Ai.oCJwrMe.cc2gjRC2Ty0wJLcSXhpLVpsao6txfZK', '2013-10-12 10:42:31', '2013-10-12 10:42:31'),
(12, 1, '$2a$08$r23yWbTWjQSO/R95QzNJA.81OUa4e1YK0v2mCo5thggkR463xKK1m', '2013-10-12 11:15:27', '2013-10-12 11:15:27'),
(13, 1, '$2a$08$g0Y1JX9hTIsLx1lLXLz.FOIiKOSihU0PnDGwhWLJnvFNJjt1GMvx6', '2013-10-12 11:35:11', '2013-10-12 11:35:11'),
(14, 1, '$2a$08$dLdio47CSena5IL.NvbxPuF/54nuvdLuI2lS0cFUgvU/KauWDQ2wq', '2013-10-12 11:36:37', '2013-10-12 11:36:37'),
(15, 1, '$2a$08$kbzS5cV5mId.pm49FD.qTux77mrYab8S/V8PvKhteMcmBMeeukh5C', '2013-10-12 11:39:21', '2013-10-12 11:39:21'),
(16, 1, '$2a$08$l9EFoq94O2yeF2ykcWlufOSaMnFQfgDxw7E9cFoip/yCGU0mk.DA6', '2013-10-12 11:43:26', '2013-10-12 11:43:26'),
(17, 1, '$2a$08$UV9wFn8SgsBbXG8mzLLNau6.2bI5S0P4rKTLqVQ9NDCDKoKqFOQl6', '2013-10-12 11:52:56', '2013-10-12 11:52:56'),
(18, 1, '$2a$08$ldyszXsn5wlOBL8ZJJI1bukcg4aWcVxxwww0v/zzelYs8cfAfKPCG', '2013-10-12 11:57:01', '2013-10-12 11:57:01'),
(19, 1, '$2a$08$eXDtVBFwRTmGXySfN12j9OV5ghiS84WzuU3ic6mHAF.aSJU7gXd3i', '2013-10-12 12:02:45', '2013-10-12 12:02:45'),
(20, 1, '$2a$08$lSi/2z2ZzPauXaDwbxTceeFX0U9WNsZrO1PDxERUABHG3IovMAGla', '2013-10-12 12:09:30', '2013-10-12 12:09:30'),
(21, 1, '$2a$08$pQtUGXlgChiaX8CkTLPJmujUNAmmjdnrtBxmDyvgcRIgFrvk3LKTa', '2013-10-12 12:13:39', '2013-10-12 12:13:39'),
(22, 1, '$2a$08$DcHt6C/tM6jhtcMHWVaQi.Argy6kawKiIfUoTS5zwRz35dYJ5cuy.', '2013-10-12 12:13:39', '2013-10-12 12:13:39'),
(23, 1, '$2a$08$fFRkIzmr9WOVNggsMbMOw.SM01ooH/bwxxfZCqda3d4mFpA4dy.XG', '2013-10-12 12:15:15', '2013-10-12 12:15:15'),
(24, 1, '$2a$08$iJyIF9Ut/uv2rS/ZCnmrXujqNFnLC4lGqfVusD341QKTucgEjGI9S', '2013-10-12 12:16:41', '2013-10-12 12:16:41'),
(25, 1, '$2a$08$/kfpaniK.vlL4gRBfJLkNu19C28HUt1wysuc.yKi3SkesnO.5M0Mi', '2013-10-12 12:25:28', '2013-10-12 12:25:28'),
(26, 1, '$2a$08$ClOQfWqsXYBP/xIQ8ehiW.CbDrbfYOXTZ.dGk1YdY1gmmEEeF9teK', '2013-10-12 12:27:05', '2013-10-12 12:27:05'),
(27, 1, '$2a$08$l0S6pb0mHsHLIhZnCxl2levPhenPQohVcH3BEQw70FYYkNCE99L4K', '2013-10-12 12:33:10', '2013-10-12 12:33:10'),
(28, 1, '$2a$08$.RojfV4cmXvu2xXJ9nXp.OSgGTkI2tE.Tc3YnRh6pWfRMxTreXgBi', '2013-10-12 12:35:31', '2013-10-12 12:35:31'),
(29, 1, '$2a$08$SyKeaR08BkSsjIDydW6CfuQYN2Xw9v6piiAclcTKg39EAIJ4bP5sa', '2013-10-12 12:38:51', '2013-10-12 12:38:51'),
(30, 1, '$2a$08$k674PvE7moX4fLKjkbIRceGJrNaelGDrenuGh0pUDNdusCs67TRwm', '2013-10-12 12:54:21', '2013-10-12 12:54:21'),
(31, 1, '$2a$08$xPkaqFtMTbYaEzQXa/ysJeuyyE94oCyC7cDIVgrw1EcZabTk/k3Ci', '2013-10-12 12:55:02', '2013-10-12 12:55:02'),
(32, 1, '$2a$08$bKCrBLqvr3t2/O5qsz7NFOuqJBkRsIccCXuRLp7fCS3EiClazQulC', '2013-10-12 13:16:46', '2013-10-12 13:16:46'),
(33, 1, '$2a$08$3bJYk1cg8i.p57TAkP6RC.0DJwC4GoCrw4aHhk61SsRclkEuVTqF.', '2013-10-12 13:17:28', '2013-10-12 13:17:28'),
(34, 1, '$2a$08$cNUPGiJWZAwGMsKqrClcF.zMjQGBf.Smf0eP.48Gb61tJm6/hEjKW', '2013-10-12 13:19:07', '2013-10-12 13:19:07'),
(35, 1, '$2a$08$ySG.0b/Delj80C/qSCNLS.D7LJFqhlSbwO3gF50nXuKzExL05wBJa', '2013-10-12 13:37:21', '2013-10-12 13:37:21'),
(36, 1, '$2a$08$8cfVp4NfyGCdDiTCJnMbb.95749T4Lgow7PqW4Fzc6iPriHLeJYzy', '2013-10-12 13:38:32', '2013-10-12 13:38:32'),
(37, 1, '$2a$08$VDcRrH3r22N96iO4hVVHMuA11ylR6UP0tw5xhZX.YIZsE9.PZ1UAq', '2013-10-12 13:39:33', '2013-10-12 13:39:33'),
(38, 1, '$2a$08$gu/Gd9wvlR6UQ0swhr3po.XRX.EmRLNYN9s9gDlhm/X.5tr9KPCXO', '2013-10-12 13:43:59', '2013-10-12 13:43:59'),
(39, 1, '$2a$08$cD7bg834OL.Ti.Hm2rxByeWANZ.FVRT96U5kQuVhdGSKcqynH4m7u', '2013-10-12 13:45:44', '2013-10-12 13:45:44'),
(40, 1, '$2a$08$8IueVBA0/0hrjmFfhrtKPu8kKOXc3fxfmNzl3q82Dqn3lNHNy7b4a', '2013-10-12 13:46:39', '2013-10-12 13:46:39'),
(41, 1, '$2a$08$A7sE65SYxrRx9eURjZQWSesS98LYnsei6tvvcBUioAfFDtZZxTWia', '2013-10-12 13:47:14', '2013-10-12 13:47:14'),
(42, 1, '$2a$08$2.tuw4MtK9yyfQucOxjUb.hUlscCaNKJUb29xE.7Z1QcILh5E6T8i', '2013-10-12 13:48:00', '2013-10-12 13:48:00'),
(43, 1, '$2a$08$OlmUGvXVKgmCSpW.BsUj5O1eW/Na7REWjY70IksSLTvX3eVamHkoO', '2013-10-12 13:50:30', '2013-10-12 13:50:30'),
(44, 1, '$2a$08$ndF5PaBTchoiRkSJdLmhyOMeL0yYr5rgwugRC6L3alHuOWEU4LD5e', '2013-10-12 13:51:05', '2013-10-12 13:51:05'),
(45, 1, '$2a$08$CEt9kwFBnAPjnnoC1F.H3Obje4yadQlkK5fpx1kzEA6k0Tf4v7Voa', '2013-10-12 13:52:21', '2013-10-12 13:52:21'),
(46, 1, '$2a$08$39luH34DUOKlWEYBUpL3ueATf42PVxSueAiuuPfLe1rWeFuPlXlgm', '2013-10-12 13:57:44', '2013-10-12 13:57:44'),
(47, 1, '$2a$08$zakfr89cn8Zk52Oh8JGmGut.EwC2vxEcHDvii0lykYMbfp5gaNIhS', '2013-10-12 14:00:14', '2013-10-12 14:00:14'),
(48, 1, '$2a$08$dD14xTjIXQINN1bMKuoMN.3nwFLT.Rklm0zJkg4MxTx5tq4whsZym', '2013-10-12 14:04:37', '2013-10-12 14:04:37'),
(49, 1, '$2a$08$vH6xv3guXb6IPSW/n7kHDObSNIlOGoRBTYbrOF59O81oVRqxX3kdO', '2013-10-12 14:05:54', '2013-10-12 14:05:54'),
(50, 1, '$2a$08$hjh3mtzCqPZeP2yzS76u1.AhfaQYerPa7/6bSCJdpCRJZiWlhjW1e', '2013-10-12 14:08:31', '2013-10-12 14:08:31'),
(51, 1, '$2a$08$QQGGTums87qbRtP/6p5qwOL5GRjJqTu.Fxz54K16FE4hLYF6IwCV6', '2013-10-12 14:10:42', '2013-10-12 14:10:42'),
(52, 1, '$2a$08$FNkKpuN.yy1QFUr7azuz..7OdG62KNSAMvmEuPonQSFzTmYTbfjXi', '2013-10-12 14:12:08', '2013-10-12 14:12:08'),
(53, 1, '$2a$08$0Wmjc6n43k84m5iA2Tjb3uS9GFI4YmwjN9m01Tv.HXkaiat1C4Yv2', '2013-10-12 14:16:07', '2013-10-12 14:16:07'),
(54, 1, '$2a$08$6D7J3vZ8kGcISAAMQ3.sH.jf3vC1Lr8p4kqpFpoBo8uOuRX4oE9lC', '2013-10-12 14:17:41', '2013-10-12 14:17:41'),
(55, 1, '$2a$08$w/X5wIE5JKk2gd09h16/h.ILY/96xNgTinX7Nzu7g/PMW0LYufEyS', '2013-10-12 14:18:33', '2013-10-12 14:18:33'),
(56, 1, '$2a$08$oTj11pdqz33qf7SJIXchpOM8QoUQhcHl7EUXCxJXfipmQgLqWm5xC', '2013-10-12 14:21:34', '2013-10-12 14:21:34'),
(57, 1, '$2a$08$0pmY5xPisXuRKz2zCtgvIuJG1YZ92lZ7R6HCNVv9XcU/Fx0D3.9zu', '2013-10-12 14:25:17', '2013-10-12 14:25:17'),
(58, 1, '$2a$08$C83qo.MJ37Ypq8h0zEv8auASoujnFX97ShdhR4Vx9j1iIGxQwbWwu', '2013-10-12 14:25:56', '2013-10-12 14:25:56'),
(59, 1, '$2a$08$CPxMy9.L3EZHCfqL2PbHY.lb9sxLMkXiPI08OMtciB6.eMUL3umLa', '2013-10-12 16:24:48', '2013-10-12 16:24:48'),
(60, 1, '$2a$08$HorbEozbnNs75xIdz3KuiO08ZAYoBecsnU68JMxHJxOolO/msD0/m', '2013-10-12 16:25:47', '2013-10-12 16:25:47'),
(61, 1, '$2a$08$hwBPUhlUKAKiYnu5HqvJKuItXyt/2DENMw52pmvaJqXELkOQVCcnG', '2013-10-12 16:26:38', '2013-10-12 16:26:38'),
(62, 1, '$2a$08$aFrb/YMYn49sEZ4XmztBx.9a6xumgpB4BeibsobZfAt3Y9LuD6Tw6', '2013-10-12 16:30:54', '2013-10-12 16:30:54'),
(63, 1, '$2a$08$CLl9RE4irpDljYR3syhOnef7fQCAayS9pD2iQj0w4w9KUDBVeHa3a', '2013-10-12 21:15:16', '2013-10-12 21:15:16'),
(64, 1, '$2a$08$3c7XlxGHLqvIg/kbjSfibu8rO99PkoKgbBjGXSWjakePhYpAO3FSO', '2013-10-12 21:17:07', '2013-10-12 21:17:07'),
(65, 1, '$2a$08$UYk7s4QzrVR6QLr/4r2xZuqfwKfqsZoLti3am7fp2r4jXrnHPZ3QK', '2013-10-12 21:18:41', '2013-10-12 21:18:41'),
(66, 1, '$2a$08$ybo0jtG3wqqvxY7t4M65JOPyRmy8Ra8V7JNqdeSOqoKLEVIt6s8Gu', '2013-10-12 21:20:46', '2013-10-12 21:20:46'),
(67, 1, '$2a$08$NXrzP4dkxzzMxCVMhnLHX.zAd6gnxfvEAzHjsO3M5moBbf/uz8Ole', '2013-10-12 21:21:42', '2013-10-12 21:21:42'),
(68, 1, '$2a$08$2.NcHfIdle3Qgg3cm2wzDufoN4mtAPtYJcHMkhB3vF114ptip4pyC', '2013-10-12 21:24:22', '2013-10-12 21:24:22'),
(69, 1, '$2a$08$7mi/UXyogIWrqUNKJ3GiIeMz0xsyAvguPnI8dwtonQa/5Iez9ngZW', '2013-10-12 21:36:36', '2013-10-12 21:36:36'),
(70, 1, '$2a$08$mkiyoFpeYjVAIqcfpxwHceYamFhV8FRzgJerWNwm0UPk5yaYAN.U2', '2013-10-12 21:39:21', '2013-10-12 21:39:21'),
(71, 1, '$2a$08$gcdhhcqlTPivrku7lR6EAeDy9gHiArqyn.r0dEgFaaghTa6cwYntC', '2013-10-12 21:40:19', '2013-10-12 21:40:19'),
(72, 1, '$2a$08$TGF.g.LF0t.TO/50RZ3EvO/cylbPOo6vcfsZv8bx9NRugsBv2zQwu', '2013-10-12 21:41:10', '2013-10-12 21:41:10'),
(73, 1, '$2a$08$nVC9ekF6c7HhYejE8FY01eWr.o1wVAP6MPxo59bIdFm6vX/V6gw1W', '2013-10-12 21:43:34', '2013-10-12 21:43:34'),
(74, 1, '$2a$08$joZMrdSAK6zw3Sz3nmy85OS/zrGWvS7tYFxpPjiyFi5mQ4989SD4m', '2013-10-12 21:45:00', '2013-10-12 21:45:00'),
(75, 1, '$2a$08$cN2FZDsoPrG/VEskMyuTZ.hntRJMMgEnoKxTcM.g4vBnAYO3qAyHW', '2013-10-16 10:43:38', '2013-10-16 10:43:38'),
(76, 1, '$2a$08$KQ1BcT41i.uzcqOyzBjFyOxCHSlHMzJtQZ4dZhp4tpGGySXPT1Bl6', '2013-10-16 13:07:57', '2013-10-16 13:07:57'),
(77, 1, '$2a$08$IuiZ7/TqSFtHrFjxQaUs4.5cF73BixGGVCN5mCBHD3WctKcVchZUa', '2013-10-16 13:14:32', '2013-10-16 13:14:32'),
(78, 1, '$2a$08$phTX4mUrgF/Vqc7kkgppJu0bqlWDRdjqegwyHYw/LStjKigukEof2', '2013-10-16 16:17:51', '2013-10-16 16:17:51'),
(79, 1, '$2a$08$dvghR5tEUJtuM7x8UcSnwum7mKuF2boeaz36gBelJoxlCcQ64bJKq', '2013-10-16 16:19:02', '2013-10-16 16:19:02'),
(80, 1, '$2a$08$dXU3t9ulkSR9R6mWVEd3buZUdAq5Ojpv/XGKmpAaAtpV4hVcFzTjW', '2013-10-16 16:19:58', '2013-10-16 16:19:58'),
(81, 1, '$2a$08$V/zkOY.1o6nN6A9A9wdnOuqU4Raj7Imaiq9r61HIvouYmzfIqf0Se', '2013-10-16 16:20:49', '2013-10-16 16:20:49'),
(82, 1, '$2a$08$Lsg5LZNc/wpVDhc8ZnqHGe5ymdY/.hCKYMq2iorR9H/79U6xrvVFG', '2013-10-16 16:23:26', '2013-10-16 16:23:26'),
(83, 1, '$2a$08$mNUG5IHj5ASpkRQi7F3rQ.A.zjLRewlt7unjh0aYm7zs/oGolQGPG', '2013-10-16 16:29:33', '2013-10-16 16:29:33'),
(84, 1, '$2a$08$kQoV7XN7MXOU7/Uv/32.fui9v263lJZD0I2YlcQqbfKTzCn47gMd6', '2013-10-16 16:30:08', '2013-10-16 16:30:08'),
(85, 1, '$2a$08$JtnFigzxNBuGnAGfGZCv7e8PlQKVmZPPG1FpSnP//qnlqGb00ymxi', '2013-10-16 16:31:56', '2013-10-16 16:31:56'),
(86, 1, '$2a$08$5yu611V8jRWg8c5hdKQKJ.izv633CAGSrg1qiVwwJ18D.3Gn9oBc6', '2013-10-16 16:32:29', '2013-10-16 16:32:29'),
(87, 1, '$2a$08$6mUbeG46fLAQrJve13gv9eBpMSGTCh7caUbpOHIGg6RK5bAxYo8oW', '2013-10-16 16:32:48', '2013-10-16 16:32:48'),
(88, 1, '$2a$08$F/f05bjw4voc8rgnNFmkHulyBwi24Aek6oFC8G6hMLNunP.zwocv6', '2013-10-16 16:33:20', '2013-10-16 16:33:20'),
(89, 1, '$2a$08$IdBqrRC.AByKkoq/CiOrzOKbpxjnkxkAKaBpWmhYUPdw5DUA6qQnW', '2013-10-16 16:38:41', '2013-10-16 16:38:41'),
(90, 1, '$2a$08$uWXIuSW5vAGb4VWxK76q4.4q6QgyNArldLDwXNxNKzIGeENZzq46G', '2013-10-16 16:39:22', '2013-10-16 16:39:22'),
(91, 1, '$2a$08$IMIE.klVTykZ6p5faaimoOJ3DeVIp0pVzgN3rPISPVQlGmSz6doZW', '2013-10-16 16:41:32', '2013-10-16 16:41:32'),
(92, 1, '$2a$08$wZsel1ffK/qIj6KNZBSRye6YfgI4jF3eJ3OrgLaS5kj4BhUskGcUa', '2013-10-16 16:44:55', '2013-10-16 16:44:55'),
(93, 1, '$2a$08$MMO3Qks5saJj2syjWwgbxOUv1pPUwLDB6blCH3GxVNCQKYPEAf2yK', '2013-10-16 16:45:48', '2013-10-16 16:45:48'),
(94, 1, '$2a$08$Rglg5KwemTCYx26Ay9krY.e4Sra1xRWvJLf0z9tbv.gLqC/n1rcTm', '2013-10-17 15:22:46', '2013-10-17 15:22:46'),
(95, 2, '$2a$08$13e20/mZYNRkRK8lL6Bj..NbjDt42PcRooJHNJTCuPR/xC8R51FuG', '2013-10-17 16:38:59', '2013-10-17 16:38:59'),
(96, 3, '$2a$08$F9oAeX6Jz3pA8YdS2R4pq.evQ/oW9nyulC3RpLpCjCdHRlZ1s8mGG', '2013-10-17 16:40:34', '2013-10-17 16:40:34'),
(97, 4, '$2a$08$Iy2qi7D/BxJTrrQaLGFv/.tNyRu7mRhtdgNJRVOmQ9o9GMdoasRZ2', '2013-10-18 17:39:10', '2013-10-18 17:39:10'),
(98, 4, '$2a$08$HJrbxARB05MMSeCi7OrJeO22ezJ1qWnjTOUO5zInrrv2rJKr8iBVi', '2013-10-18 17:39:37', '2013-10-18 17:39:37'),
(99, 4, '$2a$08$OPNn2gtfTKr4DLvd08lQm.MSw2wJs4q1ve2135Pl/LPC3If.ljLKS', '2013-10-18 17:40:00', '2013-10-18 17:40:00'),
(100, 4, '$2a$08$rVOg8f0lbBkr7UZV4VFZwOa/hQLE8OksCeSjzXBCRdSAFcescfgsi', '2013-10-18 17:40:59', '2013-10-18 17:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `ID_UNIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_CURSO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CANT_CLASES` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_TERMINO` date NOT NULL,
  PRIMARY KEY (`ID_UNIDAD`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`ID_UNIDAD`, `ID_PROFESOR`, `ID_CURSO`, `NOMBRE`, `CANT_CLASES`, `FECHA_INICIO`, `FECHA_TERMINO`) VALUES
(1, 1, 1, 'NUMEROS', 10, '2013-10-12', '2013-10-19'),
(3, 1, 1, 'Lenguaje', 3, '2013-04-04', '2013-04-10');
