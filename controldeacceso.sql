-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2022 a las 21:20:21
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controldeacceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `cod_carrera` int(10) NOT NULL,
  `carreras` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`cod_carrera`, `carreras`) VALUES
(1004, 'TSU Hoteleria'),
(1008, 'Lic Administración de Desastres'),
(1009, 'Lic Administración y Gestión Municipal '),
(1010, 'Lic Economía Social'),
(1011, 'Lic Educación Integral'),
(1012, 'Lic Contaduría Pública'),
(1013, 'Ingeniería Civil '),
(1016, 'Ingeniería en Telecomunicaciones'),
(1018, 'Ingeniería Aeronáutica'),
(1022, 'Ingeniería Eléctrica'),
(1023, 'Ingeniería Electrónica'),
(1024, 'Ingeniería Mecánica'),
(1026, 'Ingeniería en Sistemas'),
(1027, 'Lic Turismo'),
(1030, 'Lic Enfermería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `cedula_est` int(10) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `cedula_est`, `fecha_hora`) VALUES
(9, 25565616, '2022-01-19 15:15:06'),
(10, 25565678, '2022-01-19 15:15:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiantes` int(10) NOT NULL,
  `periodo_id` int(10) NOT NULL,
  `nombre_est` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_est` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_est` int(10) NOT NULL,
  `cod_carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiantes`, `periodo_id`, `nombre_est`, `apellido_est`, `cedula_est`, `cod_carrera`) VALUES
(64, 20142, 'Wenderly', 'Castellano', 25565616, 1026),
(65, 20142, 'Amanda', 'Garcia', 25565678, 1026);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `periodo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`periodo_id`) VALUES
(20141),
(20142),
(20151),
(20152),
(20161),
(20162),
(20171),
(20172),
(20181),
(20182),
(20191),
(20192),
(20201),
(20202),
(20211),
(20212),
(20221);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`cod_carrera`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD UNIQUE KEY `cedula_est` (`cedula_est`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiantes`),
  ADD UNIQUE KEY `cedula_est` (`cedula_est`),
  ADD KEY `cod_carrera` (`cod_carrera`),
  ADD KEY `periodo` (`periodo_id`),
  ADD KEY `periodo_id` (`periodo_id`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`periodo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiantes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`cod_carrera`) REFERENCES `carrera` (`cod_carrera`),
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
