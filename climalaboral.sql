-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2018 a las 21:17:08
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `climalaboral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `password`, `rol`) VALUES
(2, 'Rmagana', 'M@rhrm18', 8),
(3, 'prueba', 'prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos`
--

CREATE TABLE `campos` (
  `id` int(11) NOT NULL,
  `titulo` text,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campos`
--

INSERT INTO `campos` (`id`, `titulo`, `fecha`, `cantidad`, `tipo`) VALUES
(6, 'LA INSTITUCIÓN ', '2018-09-24', 6, 1),
(7, 'ESTRUCTURA DE LA INSTITUCIÓN.  ', '2018-09-24', 4, 1),
(8, 'RELACIONES INTERPERSONALES', '2018-09-24', 6, 1),
(9, 'MI JEFE INMEDIATO', '2018-09-24', 11, 1),
(10, 'COMUNICACIÓN ', '2018-09-24', 4, 1),
(12, 'COMPENSACIONES ', '2018-10-06', 5, 1),
(13, 'SATISFACCIÓN EN EL TRABAJO ', '2018-10-06', 5, 1),
(14, 'CAPACITACIÓN Y DESARROLLO ', '2018-10-06', 6, 1),
(15, 'RECONOCIMIENTO', '2018-10-06', 4, 1),
(16, 'CONDICIONES DE TRABAJO ', '2018-10-06', 9, 1),
(17, 'PREGUNTAS ABIERTAS', '2018-10-06', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_depto` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_jefe_depto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_depto`, `nombre`, `id_jefe_depto`) VALUES
(1, 'ADMINISTRACIÓN  GENERAL', 1),
(2, 'COLECCIONES', 192),
(3, 'CONTABILIDAD', 127),
(4, 'DIRECCIÓN EJECUTIVA', 426),
(5, 'INTERPRETACIÓN Y DIFUSIÓN', 301),
(6, 'MANTENIMIENTO', 8000),
(7, 'MANTENIMIENTO DE INSTALACIONES', 655),
(8, 'MANTENIMIENTO Y SERVICIOS GENERALES', 54),
(9, 'MUSEOGRAFÍA', 53),
(10, 'SEGURIDAD', 614),
(11, 'TECNOLOGÍAS DE LA INFORMACIÓN', 749),
(12, 'RECURSOS HUMANOS', 806),
(13, 'OPERACIONESCCV', 786),
(14, 'ADMINISTRACIONCCV', 189),
(15, 'SEGURIDADCCV', 34),
(16, 'MANTENIMIENTOCCV', 328);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puesto` varchar(200) NOT NULL,
  `contraseña` varchar(25) DEFAULT NULL,
  `ubicacion` varchar(40) DEFAULT NULL,
  `id_depto` int(11) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `ID_departamento` varchar(80) NOT NULL,
  `ID_DEP` varchar(90) DEFAULT '0',
  `encuesta_terminada` int(11) DEFAULT '0',
  `id_jefe` int(11) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `id_coordinador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `puesto`, `contraseña`, `ubicacion`, `id_depto`, `correo`, `ID_departamento`, `ID_DEP`, `encuesta_terminada`, `id_jefe`, `tipo`, `id_coordinador`) VALUES
(1, 'ESPINOSA FÉLIX MARTHA LAURA', 'ADMINISTRADORA GENERAL', 'M@010001', 'MUSEO AMPARO ', 1, 'laura@museoamparo.com', 'AG1', 'SDAG1\r\n', 0, 0, 1, 426),
(34, 'MORENO HERNÁNDEZ CARLOS ', 'ENCARGADO DE OPERACIONES DE SEGURIDAD ', 'F@150034', 'CENTRO COMERCIAL LA VICTORIA', 15, NULL, '', '0', 1, 786, 1, 0),
(43, 'ENZASTIGA FLORES OFELIA LETICIA', 'SECRETARIA DE DIRECCIÓN', 'M@040043', 'MUSEO AMPARO ', 4, 'leticia@museoamparo.com', 'SD1', 'SD1', 0, 1, 2, 426),
(47, 'KURI MORALES JUAN', 'CHOFER TITULAR', 'M@030047', 'MUSEO AMPARO ', 3, NULL, 'CH1', 'AGCGJCCH1\r\n', 0, 107, 1, 0),
(48, 'LOPEZ GRIMALDO MARÍA DEL CARMEN', 'AUXILIAR DE TIENDA E INVENTARIOS', 'M@030048', 'MUSEO AMPARO ', 3, 'marylopez@museoamparo.com', 'XV1', 'AGCGENXV1\r\n', 0, 67, 1, 0),
(53, 'REYES GONZÁLEZ BLAS ANDRÉS', 'COORDINADOR DE MUSEOGRAFÍA', 'M@090053', 'MUSEO AMPARO ', 9, 'andres@museoamparo.com', 'CM1', 'SDDECM1\r\n', 0, 1, 2, 426),
(54, 'REYERO MUÑOZ AGUSTIN', 'COORDINADOR DE MANTENIMIENTO Y SERVICIOS GENERALES', 'M@080054', 'MUSEO AMPARO ', 8, 'agustin.reyero@museoamparo.com', 'CS1', 'SDDECS1\r\n', 0, 1, 2, 426),
(56, 'REYES IBARRA LILIANA DEL ROSARIO', 'AUXILIAR DE GUARDAROPA ', 'M@100056', 'MUSEO AMPARO ', 10, NULL, 'XG1', 'SDDEJSSOXG1\r\n', 0, 614, 1, 0),
(65, 'VARILLAS CONTRERAS JUAN CARLOS', 'JEFE DE FOTOGRAFÍA Y ARCHIVO FOTOGRÁFICO', 'M@020065', 'MUSEO AMPARO ', 2, 'varillas@museoamparo.com', 'JF1', 'SDDECCJF1\r\n', 0, 0, 1, 192),
(67, 'ZAVALETA CASTAÑEDA LUZ DEL CONSUELO', 'ENCARGADA DE TIENDA', 'M@030067', 'MUSEO AMPARO ', 3, 'consuelo@museoamparo.com', 'EN1', 'AGCGCTEN1\r\n', 0, 0, 1, 127),
(107, 'TORRES AMADOR SUSANA', 'JEFA DE COMPRAS ', 'M@030107', 'MUSEO AMPARO ', 3, 'susana@museoamparo.com', 'JC1', 'AGCGJC1\r\n', 0, 0, 1, 127),
(117, 'PÉREZ HERNÁNDEZ FEDERICO', 'JARDINERO ', 'M@080117', 'MUSEO AMPARO ', 8, NULL, 'JD1', 'SDDECSJD1\r\n', 0, 0, 1, 54),
(127, 'LOPEZ CASTILLERO ALMA DELIA', 'CONTADORA GENERAL', 'M@030127', 'MUSEO AMPARO ', 3, 'alma@museoamparo.com', 'CG1', 'AGCG1\r\n', 0, 0, 1, 1),
(155, 'HERNÁNDEZ CRUZ JAIME', 'SUPERVISOR DE MANTENIMIENTO GENERAL', 'M@080155', 'MUSEO AMPARO ', 8, 'mantenimientoma@museoamparo.com', 'SM1', 'SDDECSSM1\r\n', 0, 0, 1, 54),
(184, 'CARRETO REYES ROXANA', 'AUXILIAR DE SERVICIOS GENERALES B', 'F@160184', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 224, 1, 0),
(189, 'REYES SANTOS MARÍA ELENA ', 'JEFE ADMINISTRATIVO CCLV', 'F@140189', 'CENTRO COMERCIAL LA VICTORIA', 14, NULL, '', '0', 0, 0, 1, 1),
(192, 'ROJAS BERMÚDEZ CAROLINA', 'COORDINADORA DE COLECCIONES Y EXPOSICIONES', 'M@020192', 'MUSEO AMPARO ', 2, 'carolina@museoamparo.com', 'CC1', 'SDDECC1\r\n', 0, 1, 2, 426),
(200, 'PÉREZ MONTIEL VICTORIA ', 'AUXILIAR DE SERVICIOS GENERALES A', 'F@160200', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(224, 'SEDEÑO UREÑA MAGDALENA ', 'AUXILIAR DE SERVICIOS GENERALES A', 'F@160224', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(246, 'HUERTA HERNÁNDEZ MARÍA TERESA ', 'AUXILIAR DE SERVICIOS GENERALES B', 'F@160246', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 224, 1, 0),
(256, 'GUARNEROS ARROYO MARÍA ESTHER NORMA', 'JEFA DE NÓMINAS', 'M@030256', 'MUSEO AMPARO ', 3, 'nguarneros@museoamparo.com', 'JN1', 'AGCGJN1\r\n', 0, 0, 1, 127),
(284, 'NÁJERA GÓMEZ ANTONIO ', 'AUXILIAR DE MANTENIMIENTO GENERAL ', 'F@160284', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(285, 'TÉLLEZ MERINO MARÍA ELENA', 'JEFA DE BIBLIOTECA', 'M@050285', 'MUSEO AMPARO ', 5, 'biblioteca@museoamparo.com', 'JB1', 'SDDECDJB1\r\n', 0, 0, 1, 301),
(295, 'PATIÑO DENICIA MARÍA DE JESÚS ', 'AUXILIAR DE SERVICIOS GENERALES B ', 'F@160295', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 200, 1, 0),
(301, 'RODRIGUEZ MOLINA SILVIA', 'COORDINADORA DE INTERPRETACIÓN Y DIFUSIÓN', 'M@050301', 'MUSEO AMPARO ', 5, 'silvia.rodriguez@museoamparo.com ', 'CD1', 'SDDECD1\r\n', 0, 1, 2, 426),
(328, 'SALAZAR ELÍAS FRANCISCO ', 'ENCARGADO DE MANTENIMIENTO', 'F@160328', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 786, 1, 0),
(338, 'REYERO MUÑOS JOSÉ ALBERTO', 'AUXILIAR DE OPERACIONES DE SEGURIDAD ', 'F@150338', 'CENTRO COMERCIAL LA VICTORIA', 15, NULL, '', '0', 0, 34, 2, 786),
(354, 'DE PABLO  DE LA CRUZ MARGARITO ', 'AUXILIAR DE SERVICIOS GENERALES B', 'F@160354', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 224, 1, 0),
(382, 'AGUILAR DE LA LUZ CELIA', 'AUXILIAR DE TIENDA', 'M@030382', 'MUSEO AMPARO', 3, NULL, 'XT1', 'AGCGENXT1\r\n', 0, 67, 1, 0),
(383, 'ORDAZ BONILLA JOSE PEDRO BERNARDO', 'AUXILIAR DE MANTENIMIENTO GENERAL', 'M@080383', 'MUSEO AMPARO ', 8, NULL, 'XM1', 'SDDECSSMXM1\r\n', 0, 155, 1, 0),
(426, 'MARTINEZ ESTRADA RAMIRO', 'DIRECTOR EJECUTIVO', 'M@040426', 'MUSEO AMPARO ', 4, 'rmartinez@museoamparo.com', 'DE1', 'SDDE1\r\n', 0, 0, 1, 1),
(478, 'FLORES MARTINEZ SERGIO CARLOS', 'JEFE DE PROYECTOS', 'M@020478', 'MUSEO AMPARO ', 2, 'sergio@museoamparo.com', 'JY1', 'SDDECCJY1\r\n', 0, 0, 1, 192),
(494, 'PÉREZ SANCHEZ JOSUÉ ARNULFO', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090494', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU1', 'SDDECMEMXU1\r\n', 0, 740, 2, 53),
(512, 'ZAVALETA RAMÍREZ GLORIA', 'AUXILIAR ADMINISTRATIVO', 'M@030512', 'MUSEO AMPARO ', 3, 'gloria@museoamparo.com', 'XD1', 'AGCGXD1\r\n', 0, 0, 1, 127),
(513, 'JUAREZ RAMOS ISMAEL', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090513', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU2', 'SDDECMEMXU2', 0, 740, 2, 53),
(526, 'ORTEGA DURÁN JOSÉ ANTONIO ', 'AUXILIAR DE MANTENIMIENTO GENERAL ', 'F@160526', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(533, 'ATENCO OCHOA MARISOL', 'JEFA DE INGRESOS ', 'M@030533', 'MUSEO AMPARO ', 3, 'marisol@museoamparo.com', 'JG1', '		AGCGJG1\r\n', 0, 0, 1, 127),
(537, 'RUIZ VÁZQUEZ EDUARDO', 'SUPERVISOR DE MANTENIMIENTO DE INSTALACIONES', 'M@070537', 'MUSEO AMPARO ', 7, 'instalacionesma@museoamparo.com', 'SM1', 'SDDECSSM1\r\n', 0, 0, 1, 655),
(539, 'PÉREZ MORENO FRANCISCO', 'AUXILIAR DE SERVICIOS GENERALES A', 'M@080539', 'MUSEO AMPARO ', 8, NULL, 'XS1', 'SDDECSXS1\r\n', 0, 0, 1, 54),
(551, 'CRUZ GUERRA MARTHA SILVIA', 'AUXILIAR DE SERVICIOS GENERALES ', 'M@030551', 'MUSEO AMPARO ', 3, NULL, 'XE1', 'AGCGXE1\r\n', 0, 0, 1, 127),
(557, 'RAMOS SÁNCHEZ LUIS ALBERTO ', 'AUXILIAR DE MANTENIMIENTO GENERAL ', 'F@160557', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(588, 'CANARIOS HERNÁNDEZ JOSÉ LUIS ', 'AUXILIAR DE OPERACIONES DE SEGURIDAD ', 'F@150588', 'CENTRO COMERCIAL LA VICTORIA', 15, NULL, '', '0', 0, 34, 2, 786),
(599, 'FLORES LAGUNES ELIZABETH', 'JEFA DE WEB Y REDES', 'M@050599', 'MUSEO AMPARO ', 5, 'redessociales@museoamparo.com', 'JW1', 'SDDECDJW1\r\n', 0, 0, 1, 301),
(606, 'PERALTA SANCHEZ YAZMIN', 'AUXILIAR DE BIBLIOTECA', 'M@050606', 'MUSEO AMPARO ', 5, 'auxbiblioteca@museoamparo.com ', 'XB1', 'SDDECDJBXB1\r\n', 0, 285, 1, 0),
(608, 'QUEVEDO CAMPOS MELVIN EDUARDO', 'AUXILIAR DE MANTENIMIENTO GENERAL', 'M@080608', 'MUSEO AMPARO ', 8, 'mantenimientoma@museoamparo.com', 'XM1', 'SDDECSSMXM1\r\n', 0, 155, 1, 0),
(612, 'BARRALES PIENE JORGE ELI', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090612', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU3', 'SDDECMEMXU3', 0, 740, 1, 53),
(613, 'SOLÍS GONZÁLEZ TEODOSIO SERGIO', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090613', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU4', 'SDDECMEMXU4', 0, 740, 2, 53),
(614, 'COSME HERNÁNDEZ JAIME', 'JEFE DE OPERACIONES DE SEGURIDAD', 'M@100614', 'MUSEO AMPARO ', 10, 'jaime@museoamparo.com', 'JS1', 'SDDEJS1\r\n', 0, 1, 2, 426),
(632, 'TRUJILLO MÉNDEZ SILVIA', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090632', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU5', 'SDDECMEMXU5', 0, 740, 2, 53),
(639, 'VIVEROS SANDOVAL CONCEPCIÓN', 'MONITORISTA CCTV', 'M@100639', 'MUSEO AMPARO ', 10, NULL, 'MC1', 'SDDEJSSOMC1\r\n', 0, 614, 1, 0),
(642, 'AYALA PÉREZ MARIANA', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100642', 'MUSEO AMPARO ', 10, NULL, 'XO1', 'SDDEJSSOXO1\r\n', 0, 614, 1, 0),
(643, 'PLACENCIA VETZ RICARDO ENRIQUE', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090643', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU6', 'SDDECMEMXU6', 0, 740, 2, 53),
(645, 'MORALES MORALES MARÍA BELEM', 'MONITORISTA CCTV', 'M@100645', 'MUSEO AMPARO ', 10, NULL, 'MC2', 'SDDEJSSOMC2', 0, 614, 1, 0),
(655, 'CASTELLANOS CARRETO CARLOS FLORENTINO', 'COORDINADOR DE MANTENIMIENTO DE INSTALACIONES', 'M@070655', 'MUSEO AMPARO ', 7, 'carloscc@museoamparo.com', 'CI1', 'SDDECI1\r\n', 0, 1, 2, 426),
(656, 'CASTAÑEDA CASTELLANOS JULIETA', 'JEFA DE MEDIOS Y RELACIONES PÚBLICAS', 'M@050656', 'MUSEO AMPARO ', 5, 'medios@museoamparo.com', 'JM1', 'SDDECDJM1\r\n', 0, 0, 1, 301),
(658, 'SIMBRO RAMÍREZ JOEL', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100658', 'MUSEO AMPARO ', 10, NULL, 'XO2', 'SDDEJSSOXO2\r\n\r\n', 0, 614, 1, 0),
(667, 'MEDINA GARCÍA JESUS MOISÉS', 'AUXILIAR DE MANTENIMIENTO CCTV', 'M@100667', 'MUSEO AMPARO ', 10, NULL, 'XC1', 'SDDEJSSOXC1\r\n', 0, 614, 1, 0),
(677, 'QUIROZ MIRANDA ANTONIO', 'ASISTENTE DE DIRECCIÓN EJECUTIVA', 'M@040677', 'MUSEO AMPARO ', 4, 'antonio.quiroz@museoamparo.com', 'AD1', 'SDDEAD1', 0, 0, 1, 426),
(689, 'PARRA MÉNDEZ JESUS JHONATAN', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100689', 'MUSEO AMPARO ', 10, NULL, 'XO5', 'SDDEJSSOXO5', 0, 614, 1, 0),
(691, 'LOPEZ DE JESUS GRISELDA', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100691', 'MUSEO AMPARO ', 10, NULL, 'XO6', 'SDDEJSSOXO6', 0, 614, 1, 0),
(692, 'ZAYAS GARCÍA DANIEL', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100692', 'MUSEO AMPARO ', 10, NULL, 'XO7', 'SDDEJSSOXO7', 0, 614, 1, 0),
(699, 'CERQUEDA ORTEGA ARELI', 'AUXILIAR DE FOTOGRAFÍA Y ARCHIVO FOTOGRÁFICO', 'M@020699', 'MUSEO AMPARO ', 2, 'areli.cerqueda@museoamparo.com', 'XA1', 'SDDECCJFXA1\r\n', 0, 65, 1, 0),
(703, 'LOPEZ TLAPALTOTOLI CESAR', 'AUXILIAR DE MANTENIMIENTO DE INSTALACIONES', 'M@070703', 'MUSEO AMPARO ', 7, NULL, 'XI1', 'SDDECISIXI1\r\n', 0, 537, 1, 0),
(706, 'AGUILAR MUÑOZ CLAUDIA IVONNE', 'SUPERVISORA TÉCNICO ADMINISTRATIVO', 'M@070706', 'MUSEO AMPARO', 7, 'arqclaudia@museoamparo.com', 'ST1', 'SDDECIST1\r\n', 0, 0, 1, 655),
(708, 'FORTIS HINOJOSA LUIS ÁNGEL', 'AUXILIAR DE MUSEOGRAFÍA', 'M@090708', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'XU7', 'SDDECMEMXU7', 0, 740, 2, 53),
(710, 'ALARCÓN ESPINOSA ANGÉLICA GUADALUPE', 'DISEÑADORA', 'M@050710', 'MUSEO AMPARO ', 5, 'diseno@museoamparo.com', 'DÑ1', 'SDDECDDÑ1\r\n', 0, 0, 1, 301),
(712, 'ARENAS PROSPERI MARÍA TERESA', 'JEFA DE PROGRAMAS AL PÚBLICO', 'M@050712', 'MUSEO AMPARO ', 5, 'programasalpublico@museoamparo.com', 'JP1', 'SDDECDJP1\r\n', 0, 0, 1, 301),
(715, 'ARENAS AMADOR JUAN PABLO', 'CHOFER AUXILIAR', 'M@030715', 'MUSEO AMPARO ', 3, NULL, 'CH2', 'AGCGJCCH2', 0, 107, 1, 0),
(718, 'CRUZ LOPEZ GUADALUPE RUBÍ', 'ANALISTA DE EGRESOS ', 'M@030718', 'MUSEO AMPARO ', 3, 'rubi@museoamparo.com', 'AE1', 'AGCGAE1\r\n', 0, 0, 1, 127),
(719, 'CERVANTES JUAREZ GUADALUPE', 'ENCARGADA DE TAQUILLA', 'M@030719', 'MUSEO AMPARO ', 3, 'taquilla@museoamparo.com', 'ET1', 'AGCGJGET1\r\n', 0, 533, 1, 0),
(726, 'VÉLEZ SILVA EMILIA QUIYAHUI', 'ASISTENTE DE COLECCIONES Y REGISTRO', 'M@020726', 'MUSEO AMPARO ', 2, 'emilia.silva@museoamparo.com', 'AO1', 'SDDECCAO1\r\n', 0, 0, 1, 192),
(727, 'MEJÍA MUÑOZ JAQUELINE', 'AUXILIAR  CONTABLE', 'M@030727', 'MUSEO AMPARO ', 3, 'contabilidad@museoamparo.com', 'XN1', 'AGCGJCXN1\r\n', 0, 107, 1, 0),
(728, 'LANGUER LUNA JESUS MANUEL', 'MONITORISTA CCTV', 'M@100728', 'MUSEO AMPARO ', 10, NULL, 'MC3', 'SDDEJSSOMC3', 0, 614, 1, 0),
(739, 'RIVERA CUEVAS LILIANA ', 'MONITORISTA CCTV', 'F@150739', 'CENTRO COMERCIAL LA VICTORIA', 15, NULL, '', '0', 0, NULL, 1, 786),
(740, 'GRACIA LOZADA RICARDO', 'ENCARGADO DE TALLER Y PRODUCCIÓN MUSEOGRÁFICA ', 'M@090740', 'MUSEO AMPARO ', 9, 'museografia@museoamparo.com', 'EM1', 'SDDECMEM1\r\n', 0, 0, 1, 53),
(749, 'AGUILAR LORIA SERGIO IVAN', 'JEFE DE TECNOLOGÍAS DE LA INFORMACIÓN', 'M@110749', 'MUSEO AMPARO', 11, 'sergio.aguilar@museoamparo.com', 'JT1', 'SDDEAGJT1\r\n', 2, 1, 2, 426),
(756, 'ROMERO OLIVARES GONZALO ALEJANDRO ', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100756', 'MUSEO AMPARO ', 10, NULL, 'XO8', 'SDDEJSSOXO8', 0, 614, 1, 0),
(757, 'MÉNDEZ CUANALO LETICIA ', 'RECEPCIONISTA', 'M@030757', 'MUSEO AMPARO ', 3, NULL, 'RE1', 'AGCGRE1\r\n', 0, 0, 1, 127),
(759, 'MALPICA SOSA MARÍA FERNANDA', 'JEFA DE ACTIVIDADES INTERPRETATIVAS', 'M@050759', 'MUSEO AMPARO ', 5, 'auxinterpretacion@museoamparo.com', 'JA1', 'SDDECDJA1\r\n', 0, 0, 1, 301),
(767, 'RAMOS VILLEGAS MARIANA', 'GUÍA', 'M@050767', 'MUSEO AMPARO ', 5, 'recorridos@museoamparo.com', 'GU1', 'SDDECDJPAVGU1\r\n', 0, 712, 1, 0),
(771, 'CHAVEZ GARCÍA ANA ITZEL', 'AUXILIAR DE PROGRAMACIÓN DE GRUPOS ', 'M@050771', 'MUSEO AMPARO ', 5, 'programacion@museoamparo.com', 'XP1', 'SDDECDJPXP1\r\n', 0, 712, 1, 0),
(772, 'VALERIO BARRADAS YANELLI', 'ASISTENTE  ADMINISTRATIVO', 'M@050772', 'MUSEO AMPARO ', 5, 'asistentecid@museoamparo.com', 'AS1', 'SDDECDAS1\r\n', 0, 0, 1, 301),
(774, 'CASTILLO ORTEGA KEVIN MIGUEL', 'MONITORISTA CCTV', 'M@100774', 'MUSEO AMPARO ', 10, NULL, 'MC5', 'SDDEJSSOMC5', 0, 614, 1, 0),
(785, 'GARCÍA CELAYA JESÚS MANUEL', 'ANALISTA DE ACTIVOS FIJOS', 'M@030785', 'MUSEO AMPARO ', 3, 'controldeactivos@museoamparo.com', 'AF1', 'AGCGJCAF1\r\n', 0, 107, 1, 0),
(786, 'HERNÁNDEZ CALDERÓN GONZALO ', 'JEFE DE OPERACIONES DEL CENTRO COMERCIAL LA VICTORIA  ', 'F@130786', 'CENTRO COMERCIAL LA VICTORIA', 13, NULL, '', '0', 0, 0, 1, 1),
(789, 'MARISCAL RAMOS RICARDO ARTURO ', 'ANALISTA DE TECNOLOGÍAS DE LA INFORMACIÓN', 'M@110789', 'MUSEO AMPARO ', 11, 'sistemas@museoamparo.com', 'AT1', 'SDDEJTAT1\r\n', 0, 749, 1, 0),
(790, 'ANAYA LOPEZ  EDGAR FRANCISCO ', 'AUXILIAR DE MANTENIMIENTO DE INSTALACIONES', 'M@070790', 'MUSEO AMPARO ', 7, NULL, 'XI2', 'SDDECISIXI2', 0, 537, 1, 0),
(791, 'ARCE ARCE JOSE LUIS RODRIGO ', 'AUXILIAR DE MANTENIMIENTO DE INSTALACIONES', 'M@070791', 'MUSEO AMPARO ', 7, NULL, 'XI3', 'SDDECISIXI3', 0, 537, 1, 0),
(797, 'PALLARES GARCIA LUCIA', 'GUÍA', 'M@050797', 'MUSEO AMPARO ', 5, 'auxinterpretacion@museoamparo.com', 'AA1', 'SDDECDJAAA1\r\n', 0, 712, 1, 0),
(798, 'USCANGA AVILA JULIO DE JESUS', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100798', 'MUSEO AMPARO ', 10, NULL, 'XO9', 'SDDEJSSOXO9', 0, 614, 1, 0),
(800, 'AGUAS SERRANO FACUNDO', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@100800', 'MUSEO AMPARO', 10, NULL, 'XO10', 'SDDEJSSOXO10', 0, 614, 1, 0),
(804, 'GUTIÉRREZ GARCÍA IVONNE', 'ANALISTA DE COMPRAS', 'M@030804', 'MUSEO AMPARO ', 3, 'analista.compras@museoamparo.com', 'AM1', 'AGCGJCAM1\r\n', 0, 107, 1, 0),
(805, 'RAMÍREZ GONZÁLEZ RAQUEL', 'ANALISTA DE RECURSOS HUMANOS ', 'M@120805', 'MUSEO AMPARO ', 12, 'serviciosocial@museoamparo.com', 'AH1', 'AGCRAH1\r\n', 0, 0, 1, 806),
(806, 'MAGAÑA ZEPEDA RUBÉN DAVID', 'COORDINADOR DE RECURSOS HUMANOS ', 'M@010806', 'MUSEO AMPARO ', 1, 'recursoshumanos@museoamparo.com', 'CR1', 'AGCR1\r\n', 0, 1, 2, 426),
(810, 'REIGADAS SANCHEZ ELIZABETH ', 'ANALISTA DE ACTIVIDADES COMPLEMENTARIAS', 'M@050810', 'MUSEO AMPARO ', 5, 'actividades@museoamparo.com', 'AC1', 'SDDECDJPAC1\r\n', 0, 712, 1, 0),
(815, 'MARÍN BERTTOLINI CLAUDIA CRISTELL', 'JEFA DEL PROGRAMA DE INVESTIGACIÓN DE LA COLECCIÓN', 'M@050815', 'INVESTIGACIÓN', 5, 'investigacion@museoamparo.com ', 'JI1', 'SDDECDJI1\r\n', 0, 0, 1, 301),
(818, 'AGUILAR MARCIAL ANDREA', 'ANALISTA DE EGRESOS JR.', 'M@030818', '', 3, NULL, '', '0', 0, 718, 1, 0),
(822, 'GARCIA HERNANDEZ ALBERTO', 'AUXILIAR DE MANTENIMIENTO GENERAL', 'F@160822', 'CENTRO COMERCIAL LA VICTORIA', 16, NULL, '', '0', 0, 328, 2, 786),
(826, 'ELIZONDO CANTU EDITH GUADALUPE', 'ANALISTA DE ACTIVIDADES INTERPRETATIVAS', 'M@050826', NULL, 5, NULL, '', '0', 0, 759, 1, 0),
(827, 'ARCIGA TELLEZ PABLO ARTURO', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'F@150827', 'CENTRO COMERCIAL LA VICTORIA', 15, NULL, 'XO11', 'SDDEJSSOXO11', 0, 34, 2, 786),
(836, 'MENDOZA EUGENIO HIPOLITO', 'AUXILIAR DE OPERACIONES DE SEGURIDAD', 'M@1008367', 'MUSEO AMPARO', 10, NULL, 'XO12', 'SDDEJSSOXO12', 0, 614, 1, 0),
(837, 'LIRA HERNANDEZ ERNESTO', 'AUXILIAR CAPTURISTA BASE DE DATOS ', 'M@020837', 'MUSEO AMPARO', 2, NULL, '', '0', 0, 0, 1, 192),
(848, 'CASTILLO HERNÁNDEZ LUIS ALBERTO ', 'ANALISTA DE EGRESOS JR.', 'M@030848', 'MUSEO AMPARO', 3, NULL, '', '0', 0, 718, 1, 0),
(849, 'BERMEO LÓPEZ NADIA SELENE', 'GUIA', 'M@050849', 'MUSEO AMPARO', 5, NULL, '', '0', 0, 712, 1, 0),
(851, 'PALACIOS JUÁREZ LUIS JAVIER', 'MONITORISTA CCTV', 'M@100851', 'MUSEO AMPARO', 10, NULL, '', '0', 0, 614, 1, 0),
(857, 'MARTÍNEZ RODRÍGUEZ MICHELLE', 'AUXILIAR DE ACTIVIDADES COMPLEMENTARIAS ', 'M@050857', 'MUSEO AMPARO', 5, NULL, '', '0', 0, 810, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `pregunta` text,
  `valor` int(11) DEFAULT NULL,
  `iden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`, `valor`, `iden`) VALUES
(53, '1.Me siento orgulloso y feliz de trabajar en esta Institución.', 0, 6),
(54, '2.El trato que recibo es cordial y respetuoso.', 0, 6),
(55, '3.Yo recomiendo a otros que trabajen aquí.', 0, 6),
(56, '4.Conozco cuál es la misión y visión de la Institución.', 0, 6),
(57, '5.Yo pienso que estaré trabajando en esta Institución por muchos años.', 0, 6),
(58, '6.Mis objetivos personales contribuyen claramente a los objetivos de la Institución.', 0, 6),
(59, '7.Conozco cuáles son las funciones de mi puesto.', 0, 7),
(60, '8.Los procedimientos de la Institución me permiten darle a mis clientes un servicio excelente.', 0, 7),
(61, '9.Conozco las normas y reglamentos de la Institución.', 0, 7),
(62, '10.Los objetivos específicos  de mi puesto están claramente definidos.', 0, 7),
(63, '11.Los problemas se resuelven efectiva, honesta y rápidamente.', 0, 8),
(64, '12.Las personas de mi equipo de trabajo están comprometidas en el logro de los objetivos. ', 0, 8),
(65, '13.Los departamentos en la Institución cooperan entre sí para realizar un buen trabajo.', 0, 8),
(66, '14.Todos dentro de la Institución somos tratados de la misma manera (no hay favoritismo).', 0, 8),
(67, '15.Los problemas se resuelven enfocándose en encontrar soluciones y no en buscar culpables.', 0, 8),
(68, '16.Cuando ingresas a la Institución te hacen sentir bienvenido.', 0, 8),
(69, '17.Mi jefe ha logrado que lo respete por su comportamiento y ejemplo.', 0, 9),
(70, '18.Mi jefe inmediato me enseña cómo realizar mejor mi trabajo.', 0, 9),
(71, '19.Mi opinión es tomada en cuenta para la toma de decisiones.', 0, 9),
(72, '20.Mi jefe estimula mi creatividad e innovación para mejorar en el trabajo.', 0, 9),
(73, '21.Mi jefe inmediato propicia un clima de cordialidad y confianza dentro de nuestro equipo de trabajo. ', 0, 9),
(74, '22.Mi jefe fomenta el trabajo en equipo para resolver los problemas del departamento.', 0, 9),
(75, '23.Cuando realizo bien mi trabajo, mi jefe inmediato me lo reconoce.', 0, 9),
(76, '24.Mi jefe inmediato aplica las normas y reglamentos de forma justa.', 0, 9),
(77, '25.Mi jefe inmediato da instrucciones claras y precisas.', 0, 9),
(78, '26.Mi jefe delega el trabajo eficientemente.', 0, 9),
(79, '27.Recibo retroalimentación acerca de mi desempeño por parte de mi jefe.', 0, 9),
(80, '28.Yo me entero oportunamente de todo lo que sucede dentro de la Institución.', 0, 10),
(81, '29.Todas las instrucciones que recibo son claras y comprensibles.', 0, 10),
(82, '30.En esta Institución tengo acceso a la toda información que necesito para realizar bien mi trabajo. ', 0, 10),
(83, '31.Mi jefe inmediato informa claramente las decisiones y/o cambios que ocurren en la Institución.', 0, 10),
(86, '32.Las prestaciones que ofrece la Institución son satisfactorias.', 0, 12),
(87, '33.El sueldo que recibo es comparable a lo que otras personas reciben en puestos similares dentro de la Institución.', 0, 12),
(88, '34.Los aumentos salariales se otorgan de manera justa.  ', 0, 12),
(89, '35.Las políticas de compensaciones y prestaciones están de acuerdo al mercado laboral en giros similares.   ', 0, 12),
(90, '36.Entiendo los criterios utilizados para asignar y definir el sueldo de acuerdo a mi puesto (sueldo deducciones, etc.)', 0, 12),
(91, '37.Todos los empleados son tratados con respeto en esta Institución.', 0, 13),
(92, '38.Me gusta mucho mi trabajo y sus funciones.', 0, 13),
(93, '39.El trabajo que realizo, me hace sentir que contribuyo a los objetivos de la Institución.', 0, 13),
(94, '40.Conozco los objetivos de mi puesto y lo que se espera de mí.', 0, 13),
(95, '41.La carga de trabajo y el horario me permiten mantener un equilibrio entre mi vida laboral y personal.', 0, 13),
(96, '42.La Institución me ha proporcionado  capacitación y entrenamiento para desempeñar mi trabajo con calidad.', 0, 14),
(97, '43.La capacitación que recibo me ayuda a hacer mejor mi trabajo.', 0, 14),
(98, '44.La capacitación que recibo me ayuda a proporcionar un mejor servicio/producto a los clientes.', 0, 14),
(99, '45.Considero que la Institución conoce, aprovecha y desarrolla todas mis capacidades.', 0, 14),
(100, '46.Yo recibo capacitación para usar y manejar correctamente el nuevo equipo, materiales y/o  programas.', 0, 14),
(101, '47.Considero que mis habilidades van acordes a mis responsabilidades y la función que desempeño y me ayuda a cumplir con los objetivos del puesto que ocupo.', 0, 14),
(102, '48.Las promociones se otorgan basados en el desempeño /resultados.', 0, 15),
(103, '49.Estoy satisfecho con las oportunidades de crecimiento en la Institución.', 0, 15),
(104, '50. Las promociones son justas y equitativas en esta Institución.', 0, 15),
(105, '51.La Institución premia y reconoce a aquellos que hacen bien su trabajo.', 0, 15),
(106, '52.Cuento con las herramientas, materiales y equipo para desarrollar mi trabajo.', 0, 16),
(107, '53.Me siento seguro dentro de las instalaciones de la Institución.', 0, 16),
(108, '54.Estoy satisfecho con las condiciones de iluminación con las que trabajo.', 0, 16),
(109, '55.Estoy satisfecho con las condiciones de espacio en las que trabajo.', 0, 16),
(110, '56.Estoy satisfecho con las condiciones de temperatura con las que trabajo.', 0, 16),
(111, '57.Estoy satisfecho con los servicios de sanitarios con las que cuento.', 0, 16),
(112, '58.Estoy satisfecho con los espacios para comer con los que cuento.', 0, 16),
(113, '59.Mi espacio de trabajo cuenta con las medidas de seguridad necesarias para protegerme en caso de algún incidente.(incendio, accidente, temblor, etc.)', 0, 16),
(114, '60.Conozco los procedimientos a seguir en caso de emergencia.', 0, 16),
(115, 'Lo que más me gusta de la institución.', 0, 17),
(116, 'Lo que menos me gusta de la institución.', 0, 17),
(117, 'Lo que más me gusta de mi jefe inmediato.', 0, 17),
(118, 'Lo que menos me gusta de mi jefe inmediato.', 0, 17),
(119, 'Estamos trabajando para mejorar tus condiciones laborales y nos gustaría saber tus comentarios.', 0, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `respuesta` text,
  `clave` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `IDpregunta` int(11) DEFAULT NULL,
  `Pregunta` text,
  `campo` varchar(50) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `empleado` int(11) DEFAULT NULL,
  `id_jefe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `clave`, `Numero`, `IDpregunta`, `Pregunta`, `campo`, `area`, `empleado`, `id_jefe`) VALUES
(14535, 'siempre', 1, 1, 53, '1.Me siento orgulloso y feliz de trabajar en esta Institución.', '6', 11, 749, 0),
(14536, 'casi siempre', 2, 2, 54, '2.El trato que recibo es cordial y respetuoso.', '6', 11, 749, 0),
(14537, 'siempre', 1, 3, 55, '3.Yo recomiendo a otros que trabajen aquí.', '6', 11, 749, 0),
(14538, 'siempre', 1, 4, 56, '4.Conozco cuál es la misión y visión de la Institución.', '6', 11, 749, 0),
(14539, 'siempre', 1, 5, 57, '5.Yo pienso que estaré trabajando en esta Institución por muchos años.', '6', 11, 749, 0),
(14540, 'siempre', 1, 6, 58, '6.Mis objetivos personales contribuyen claramente a los objetivos de la Institución.', '6', 11, 749, 0),
(14541, 'siempre', 1, 1, 59, '7.Conozco cuáles son las funciones de mi puesto.', '7', 11, 749, 0),
(14542, 'algunas veces', 3, 2, 60, '8.Los procedimientos de la Institución me permiten darle a mis clientes un servicio excelente.', '7', 11, 749, 0),
(14543, 'casi siempre', 2, 3, 61, '9.Conozco las normas y reglamentos de la Institución.', '7', 11, 749, 0),
(14544, 'siempre', 1, 4, 62, '10.Los objetivos específicos  de mi puesto están claramente definidos.', '7', 11, 749, 0),
(14545, 'casi siempre', 2, 1, 63, '11.Los problemas se resuelven efectiva, honesta y rápidamente.', '8', 11, 749, 0),
(14546, 'casi nunca', 4, 2, 64, '12.Las personas de mi equipo de trabajo están comprometidas en el logro de los objetivos. ', '8', 11, 749, 0),
(14547, 'casi nunca', 4, 3, 65, '13.Los departamentos en la Institución cooperan entre sí para realizar un buen trabajo.', '8', 11, 749, 0),
(14548, 'siempre', 1, 4, 66, '14.Todos dentro de la Institución somos tratados de la misma manera (no hay favoritismo).', '8', 11, 749, 0),
(14549, 'casi siempre', 2, 5, 67, '15.Los problemas se resuelven enfocándose en encontrar soluciones y no en buscar culpables.', '8', 11, 749, 0),
(14550, 'casi siempre', 2, 6, 68, '16.Cuando ingresas a la Institución te hacen sentir bienvenido.', '8', 11, 749, 0),
(14551, 'casi siempre', 2, 1, 80, '28.Yo me entero oportunamente de todo lo que sucede dentro de la Institución.', '10', 11, 749, 0),
(14552, 'casi nunca', 4, 2, 81, '29.Todas las instrucciones que recibo son claras y comprensibles.', '10', 11, 749, 0),
(14553, 'algunas veces', 3, 3, 82, '30.En esta Institución tengo acceso a la toda información que necesito para realizar bien mi trabajo. ', '10', 11, 749, 0),
(14554, 'algunas veces', 3, 4, 83, '31.Mi jefe inmediato informa claramente las decisiones y/o cambios que ocurren en la Institución.', '10', 11, 749, 0),
(14555, 'algunas veces', 3, 1, 86, '32.Las prestaciones que ofrece la Institución son satisfactorias.', '12', 11, 749, 0),
(14556, 'casi nunca', 4, 2, 87, '33.El sueldo que recibo es comparable a lo que otras personas reciben en puestos similares dentro de la Institución.', '12', 11, 749, 0),
(14557, 'siempre', 1, 3, 88, '34.Los aumentos salariales se otorgan de manera justa.  ', '12', 11, 749, 0),
(14558, 'algunas veces', 3, 4, 89, '35.Las políticas de compensaciones y prestaciones están de acuerdo al mercado laboral en giros similares.   ', '12', 11, 749, 0),
(14559, 'algunas veces', 3, 5, 90, '36.Entiendo los criterios utilizados para asignar y definir el sueldo de acuerdo a mi puesto (sueldo deducciones, etc.)', '12', 11, 749, 0),
(14560, 'algunas veces', 3, 1, 91, '37.Todos los empleados son tratados con respeto en esta Institución.', '13', 11, 749, 0),
(14561, 'siempre', 1, 2, 92, '38.Me gusta mucho mi trabajo y sus funciones.', '13', 11, 749, 0),
(14562, 'siempre', 1, 3, 93, '39.El trabajo que realizo, me hace sentir que contribuyo a los objetivos de la Institución.', '13', 11, 749, 0),
(14563, 'siempre', 1, 4, 94, '40.Conozco los objetivos de mi puesto y lo que se espera de mí.', '13', 11, 749, 0),
(14564, 'siempre', 1, 5, 95, '41.La carga de trabajo y el horario me permiten mantener un equilibrio entre mi vida laboral y personal.', '13', 11, 749, 0),
(14565, 'casi siempre', 2, 1, 96, '42.La Institución me ha proporcionado  capacitación y entrenamiento para desempeñar mi trabajo con calidad.', '14', 11, 749, 0),
(14566, 'siempre', 1, 2, 97, '43.La capacitación que recibo me ayuda a hacer mejor mi trabajo.', '14', 11, 749, 0),
(14567, 'casi siempre', 2, 3, 98, '44.La capacitación que recibo me ayuda a proporcionar un mejor servicio/producto a los clientes.', '14', 11, 749, 0),
(14568, 'algunas veces', 3, 4, 99, '45.Considero que la Institución conoce, aprovecha y desarrolla todas mis capacidades.', '14', 11, 749, 0),
(14569, 'algunas veces', 3, 5, 100, '46.Yo recibo capacitación para usar y manejar correctamente el nuevo equipo, materiales y/o  programas.', '14', 11, 749, 0),
(14570, 'algunas veces', 3, 6, 101, '47.Considero que mis habilidades van acordes a mis responsabilidades y la función que desempeño y me ayuda a cumplir con los objetivos del puesto que ocupo.', '14', 11, 749, 0),
(14571, 'casi nunca', 4, 1, 102, '48.Las promociones se otorgan basados en el desempeño /resultados.', '15', 11, 749, 0),
(14572, 'casi nunca', 4, 2, 103, '49.Estoy satisfecho con las oportunidades de crecimiento en la Institución.', '15', 11, 749, 0),
(14573, 'casi nunca', 4, 3, 104, '50. Las promociones son justas y equitativas en esta Institución.', '15', 11, 749, 0),
(14574, 'casi siempre', 2, 4, 105, '51.La Institución premia y reconoce a aquellos que hacen bien su trabajo.', '15', 11, 749, 0),
(14575, 'casi siempre', 2, 1, 106, '52.Cuento con las herramientas, materiales y equipo para desarrollar mi trabajo.', '16', 11, 749, 0),
(14576, 'siempre', 1, 2, 107, '53.Me siento seguro dentro de las instalaciones de la Institución.', '16', 11, 749, 0),
(14577, 'siempre', 1, 3, 108, '54.Estoy satisfecho con las condiciones de iluminación con las que trabajo.', '16', 11, 749, 0),
(14578, 'casi nunca', 4, 4, 109, '55.Estoy satisfecho con las condiciones de espacio en las que trabajo.', '16', 11, 749, 0),
(14579, 'algunas veces', 3, 5, 110, '56.Estoy satisfecho con las condiciones de temperatura con las que trabajo.', '16', 11, 749, 0),
(14580, 'siempre', 1, 6, 111, '57.Estoy satisfecho con los servicios de sanitarios con las que cuento.', '16', 11, 749, 0),
(14581, 'algunas veces', 3, 7, 112, '58.Estoy satisfecho con los espacios para comer con los que cuento.', '16', 11, 749, 0),
(14582, 'casi siempre', 2, 8, 113, '59.Mi espacio de trabajo cuenta con las medidas de seguridad necesarias para protegerme en caso de algún incidente.(incendio, accidente, temblor, etc.)', '16', 11, 749, 0),
(14583, 'algunas veces', 3, 9, 114, '60.Conozco los procedimientos a seguir en caso de emergencia.', '16', 11, 749, 0),
(14584, 'sd', 6, 1, 115, 'Lo que más me gusta de la institución.', '17', 11, 749, 0),
(14585, 'sd', 6, 2, 116, 'Lo que menos me gusta de la institución.', '17', 11, 749, 0),
(14586, 'sd', 6, 3, 117, 'Lo que más me gusta de mi jefe inmediato.', '17', 11, 749, 0),
(14587, 'sd', 6, 4, 118, 'Lo que menos me gusta de mi jefe inmediato.', '17', 11, 749, 0),
(14588, 'sd', 6, 5, 119, 'Estamos trabajando para mejorar tus condiciones laborales y nos gustaría saber tus comentarios.', '17', 11, 749, 0),
(14589, 'casi siempre', 2, 1, 69, '17.Mi jefe ha logrado que lo respete por su comportamiento y ejemplo.', '9', 11, 749, 426),
(14590, 'casi nunca', 4, 2, 70, '18.Mi jefe inmediato me enseña cómo realizar mejor mi trabajo.', '9', 11, 749, 426),
(14591, 'algunas veces', 3, 3, 71, '19.Mi opinión es tomada en cuenta para la toma de decisiones.', '9', 11, 749, 426),
(14592, 'algunas veces', 3, 4, 72, '20.Mi jefe estimula mi creatividad e innovación para mejorar en el trabajo.', '9', 11, 749, 426),
(14593, 'algunas veces', 3, 5, 73, '21.Mi jefe inmediato propicia un clima de cordialidad y confianza dentro de nuestro equipo de trabajo. ', '9', 11, 749, 426),
(14594, 'algunas veces', 3, 6, 74, '22.Mi jefe fomenta el trabajo en equipo para resolver los problemas del departamento.', '9', 11, 749, 426),
(14595, 'casi siempre', 2, 7, 75, '23.Cuando realizo bien mi trabajo, mi jefe inmediato me lo reconoce.', '9', 11, 749, 426),
(14596, 'casi siempre', 2, 8, 76, '24.Mi jefe inmediato aplica las normas y reglamentos de forma justa.', '9', 11, 749, 426),
(14597, 'algunas veces', 3, 9, 77, '25.Mi jefe inmediato da instrucciones claras y precisas.', '9', 11, 749, 426),
(14598, 'casi nunca', 4, 10, 78, '26.Mi jefe delega el trabajo eficientemente.', '9', 11, 749, 426),
(14599, 'casi siempre', 2, 11, 79, '27.Recibo retroalimentación acerca de mi desempeño por parte de mi jefe.', '9', 11, 749, 426),
(14600, 'casi siempre', 2, 1, 69, '17.Mi jefe ha logrado que lo respete por su comportamiento y ejemplo.', '9', 11, 749, 1),
(14601, 'algunas veces', 3, 2, 70, '18.Mi jefe inmediato me enseña cómo realizar mejor mi trabajo.', '9', 11, 749, 1),
(14602, 'algunas veces', 3, 3, 71, '19.Mi opinión es tomada en cuenta para la toma de decisiones.', '9', 11, 749, 1),
(14603, 'siempre', 1, 4, 72, '20.Mi jefe estimula mi creatividad e innovación para mejorar en el trabajo.', '9', 11, 749, 1),
(14604, 'siempre', 1, 5, 73, '21.Mi jefe inmediato propicia un clima de cordialidad y confianza dentro de nuestro equipo de trabajo. ', '9', 11, 749, 1),
(14605, 'siempre', 1, 6, 74, '22.Mi jefe fomenta el trabajo en equipo para resolver los problemas del departamento.', '9', 11, 749, 1),
(14606, 'siempre', 1, 7, 75, '23.Cuando realizo bien mi trabajo, mi jefe inmediato me lo reconoce.', '9', 11, 749, 1),
(14607, 'siempre', 1, 8, 76, '24.Mi jefe inmediato aplica las normas y reglamentos de forma justa.', '9', 11, 749, 1),
(14608, 'siempre', 1, 9, 77, '25.Mi jefe inmediato da instrucciones claras y precisas.', '9', 11, 749, 1),
(14609, 'casi siempre', 2, 10, 78, '26.Mi jefe delega el trabajo eficientemente.', '9', 11, 749, 1),
(14610, 'casi siempre', 2, 11, 79, '27.Recibo retroalimentación acerca de mi desempeño por parte de mi jefe.', '9', 11, 749, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_depto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `campos`
--
ALTER TABLE `campos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14611;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
