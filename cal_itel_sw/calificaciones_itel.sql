-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2018 a las 16:38:56
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `calificaciones_itel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_pass`
--

CREATE TABLE IF NOT EXISTS `alumno_pass` (
  `Num_control` int(11) NOT NULL,
  `Password` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_reguistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `Num_control` (`Num_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno_pass`
--

INSERT INTO `alumno_pass` (`Num_control`, `Password`, `fecha_reguistro`) VALUES
(16900137, 'hola2', '2018-05-17 10:14:05'),
(16900157, 'carmen', '2018-05-24 22:20:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alum_mat`
--

CREATE TABLE IF NOT EXISTS `alum_mat` (
  `id_inscripcion` int(11) NOT NULL,
  `clave_mat` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `num_control` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_inscripcion`),
  UNIQUE KEY `num_control` (`num_control`),
  KEY `clave_mat` (`clave_mat`),
  KEY `num_control_2` (`num_control`),
  KEY `semestre` (`semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alum_tics`
--

CREATE TABLE IF NOT EXISTS `alum_tics` (
  `Num_control` int(11) NOT NULL,
  `Nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido_pat` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido_mat` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Crrera` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `semestre` int(11) NOT NULL,
  `Fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Num_control`),
  UNIQUE KEY `Num_control` (`Num_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alum_tics`
--

INSERT INTO `alum_tics` (`Num_control`, `Nombre`, `Apellido_pat`, `Apellido_mat`, `Crrera`, `semestre`, `Fecha_ingreso`) VALUES
(16900103, 'Antonio de Jesús ', 'Rodríguez ', 'Esparza', 'Tecnologías de la Información y Comunicaciones', 4, '2018-06-05 03:06:25'),
(16900125, 'Ellery ', 'Pedroza ', 'Lechuga', 'Tecnologías de la información y Comunicaciones', 4, '2018-06-05 03:06:30'),
(16900137, 'Jorge Armando', 'Rivera', 'Camacho', 'Tecnologias de la Informacion y Comunicacion', 4, '2018-06-05 03:06:36'),
(16900157, 'Guadalupe del Carmen ', 'Aguilar ', 'Cedeño', 'Tecnologías de la Información y Comunicaciones', 4, '2018-06-05 03:06:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cal_tics`
--

CREATE TABLE IF NOT EXISTS `cal_tics` (
  `id_cal` int(11) NOT NULL,
  `num_control` int(11) NOT NULL,
  `clave_mat` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `cal_1` double NOT NULL,
  `cal_2` double NOT NULL,
  `cal_3` double NOT NULL,
  `cal_4` double NOT NULL,
  `cal_5` double NOT NULL,
  `cal_gen` double NOT NULL,
  `fecha_matricula` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cal`),
  KEY `num_control` (`num_control`),
  KEY `clave_materia` (`clave_mat`),
  KEY `clave_mat` (`clave_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cal_tics`
--

INSERT INTO `cal_tics` (`id_cal`, `num_control`, `clave_mat`, `cal_1`, `cal_2`, `cal_3`, `cal_4`, `cal_5`, `cal_gen`, `fecha_matricula`) VALUES
(3001, 16900137, 'TIC-1014', 10, 9.7, 8, 8, 9, 7, '2018-06-05 03:20:02'),
(3002, 16900137, 'TID-1008', 7, 8, 9.6, 8.8, 7.7, 7, '2018-06-05 03:20:02'),
(3003, 16900137, 'TID-1004', 7, 7, 7.8, 7.5, 8, 9, '2018-06-05 03:20:02'),
(3004, 16900137, 'TIF-1021', 10, 10, 10, 10, 10, 10, '2018-06-05 03:20:02'),
(3005, 16900137, 'AEC-1061', 9, 8.7, 8, 8.5, 8, 9, '2018-06-05 03:20:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_tics`
--

CREATE TABLE IF NOT EXISTS `mat_tics` (
  `clave_mat` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nom_mat` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `semestre` int(11) NOT NULL,
  PRIMARY KEY (`clave_mat`),
  KEY `clave_mat` (`clave_mat`),
  KEY `clave_mat_2` (`clave_mat`),
  KEY `clave_mat_3` (`clave_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mat_tics`
--

INSERT INTO `mat_tics` (`clave_mat`, `nom_mat`, `semestre`) VALUES
('ACA-0907', 'TALLER DE ÉTICA', 1),
('ACA-0909', 'TALLER DE INVESTIGACIÓN I', 6),
('ACA-0910', 'TALLER DE INVESTIGACIÓN II', 7),
('ACC-0906', 'FUNDAMENTOS DE INVESTIGACIÓN', 1),
('ACD-0908', 'DESARROLLO SUSTENTABLE ', 7),
('ACF-0901', 'CALCULO DIFERENCIAL', 1),
('ACF-0902', 'CALCULO INTEGRAL', 2),
('ACF-0903\n', 'ÁLGEBRA LINEAL', 3),
('AEB-1011', 'DESARROLLO DE APLICACIONES PARA DISPOSITIVOS ', 7),
('AEB-1054', 'PROGRAMACIÓN ORIENTADA A OBJETOS', 2),
('AEC-1061', 'SISTEMAS OPERATIVOS I', 6),
('AED-1062', 'SISTEMAS OPERATIVOS II', 7),
('AEF-1031', 'FUNDAMENTOS DE BASES DE DATOS', 3),
('AEF-1032', 'FUNDAMENTOS DE PROGRAMACIÓN', 1),
('AEF-1052', 'PROBABILIDAD Y ESTADÍSTICA', 2),
('AEH-1063', 'TALLER DE BASES DE DATOS', 4),
('RPF-1000', 'RESIDENCIAS PROFESIONALES', 9),
('SSC-1000', 'SERVICIO SOCIAL', 6),
('THI-1016', 'INTERACCIÓN HUMANO COMPUTADORA', 8),
('TIB-1003', 'ADMINISTRACIÓN Y SEGURIDAD DE REDES', 8),
('TIB-1024', 'PROGRAMACIÓN II', 4),
('TIB-1025', 'PROGRAMACIÓN WEB', 6),
('TIC-1002', 'ADMINISTRACIÓN GERENCIAL', 3),
('TIC-1005', 'ARQUITECTURA DE COMPUTADORAS', 5),
('TIC-1006', 'AUDITORIA EN TECNOLOGÍAS DE INFORMACIÓN', 8),
('TIC-1011', 'ELECTRICIDAD Y MAGNETISMO', 3),
('TIC-1014', 'INGENIERÍA DE SOFTWARE', 4),
('TIC-1015', 'INGENIERÍA DEL CONOCIMIENTO', 8),
('TIC-1022', 'NEGOCIOS ELECTRÓNICOS', 7),
('TIC-1023', 'NEGOCIOS ELECTRÓNICOS II', 8),
('TIC-1027', 'TALLER DE INGENIERÍA DE SOFTWARE', 5),
('TIC-1028', 'TECNOLOGÍAS INALÁMBRICAS', 6),
('TID-1004', 'ANÁLISIS DE SEÑALES Y SISTEMAS DE COMUNICACIÓN', 4),
('TID-1008', 'CIRCUITOS ELÉCTRICOS Y ELECTRÓNICOS', 4),
('TID-1010', 'DESARROLLO DE EMPRENDEDORES', 6),
('TID-1012', 'ESTRUCTURA Y ORGANIZACIONES DATOS', 3),
('TIE-1018', 'MATEMÁTICAS APLICADAS A LAS COMUNICACIONES', 3),
('TIF-1001', 'ADMINISTRACIÓN DE PROYECTOS', 5),
('TIF-1007', 'BASES DE DATOS DISTRIBUIDAS', 5),
('TIF-1009', 'CONTABILIDAD Y COSTOS', 2),
('TIF-1013', 'FUNDAMENTOS DE REDES', 5),
('TIF-1019', 'MATEMÁTICAS DISCRETAS', 1),
('TIF-1020', 'MATEMÁTICAS DISCRETAS II', 2),
('TIF-1021', 'MATEMÁTICAS PARA LA TOMA DE DECISIONES', 4),
('TIF-1025', 'REDES DE COMPUTADORAS', 6),
('TIF-1027', 'REDES EMERGENTES ', 7),
('TIF-1029', 'TELECOMUNICACIONES ', 5),
('TIP-1017', 'INTRODUCCIÓN A LAS TIC’S', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_pass`
--
ALTER TABLE `alumno_pass`
  ADD CONSTRAINT `alumno_pass_ibfk_1` FOREIGN KEY (`Num_control`) REFERENCES `alum_tics` (`Num_control`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `alum_mat`
--
ALTER TABLE `alum_mat`
  ADD CONSTRAINT `alum_mat_ibfk_1` FOREIGN KEY (`num_control`) REFERENCES `alum_tics` (`Num_control`);

--
-- Filtros para la tabla `cal_tics`
--
ALTER TABLE `cal_tics`
  ADD CONSTRAINT `cal_tics_ibfk_1` FOREIGN KEY (`num_control`) REFERENCES `alum_tics` (`Num_control`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
