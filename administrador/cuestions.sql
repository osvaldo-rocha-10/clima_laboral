-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-08-2018 a las 04:55:20
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuestions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos`
--

DROP TABLE IF EXISTS `campos`;
CREATE TABLE IF NOT EXISTS `campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campos`
--

INSERT INTO `campos` (`id`, `titulo`, `fecha`, `cantidad`, `tipo`) VALUES
(13, 'Institucion2', '2018-07-26', 3, 0),
(14, 'Institucion7', '2018-07-26', 2, 1),
(15, '6767', '2018-07-27', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `iden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`, `valor`, `iden`) VALUES
(15, 'ppp', 0, 13),
(16, 'ooo', 0, 13),
(18, 'jhj8', 0, 14),
(19, 'hjhjh', 0, 14),
(20, 'wqqewr', 0, 15),
(21, 'qeqe', 0, 15),
(22, 'wweqeq', 0, 15),
(23, 'qeqeq', 0, 15),
(24, 'qeqrqe', 0, 15),
(25, 'qeqeqeq', 0, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(50) DEFAULT NULL,
  `clave` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `IDpregunta` int(11) DEFAULT NULL,
  `Pregunta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `clave`, `Numero`, `IDpregunta`, `Pregunta`) VALUES
(117, 'esta ', 6, 1, 15, 'ppp'),
(118, 'loco de la cabeza', 6, 2, 16, 'ooo'),
(119, 'casi siempre', 2, 1, 18, 'jhj8'),
(120, 'casi siempre', 2, 2, 19, 'hjhjh'),
(121, 'nunca', 5, 1, 20, 'wqqewr'),
(122, 'nunca', 5, 2, 21, 'qeqe'),
(123, 'nunca', 5, 3, 22, 'wweqeq'),
(124, 'siempre', 1, 4, 23, 'qeqeq'),
(125, 'siempre', 1, 5, 24, 'qeqrqe'),
(126, 'siempre', 1, 6, 25, 'qeqeqeq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `clave`, `area`) VALUES
(1, '2550', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
