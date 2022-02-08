-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2022 a las 13:03:40
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
(1008, 'Lic Administracion de Desastres'),
(1009, 'Lic Administracion y Gestion Municipal '),
(1010, 'Lic Economia Social'),
(1011, 'Lic Educacion Integral'),
(1012, 'Lic Contaduria Publica'),
(1013, 'Ingenieria Civil '),
(1016, 'Ingenieria de Telecomunicaciones'),
(1018, 'Ingenieria Aeronautica'),
(1022, 'Ingenieria Electrica'),
(1023, 'Ingenieria Electronica'),
(1024, 'Ingenieria Mecanica'),
(1026, 'Ingenieria de Sistemas'),
(1027, 'Lic Turismo'),
(1030, 'Lic Enfermeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_entrada` int(8) NOT NULL,
  `cedula_est` int(8) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_entrada`, `cedula_est`, `fecha_hora`) VALUES
(30, 65865015, '2022-02-08 02:11:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiantes` int(10) NOT NULL,
  `periodo_id` int(10) NOT NULL,
  `nombre_est` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_est` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_est` int(8) NOT NULL,
  `cod_carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiantes`, `periodo_id`, `nombre_est`, `apellido_est`, `cedula_est`, `cod_carrera`) VALUES
(168, 10, 'rtydrty', 'ergesrg', 65865015, 1016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `periodo_id` int(5) NOT NULL,
  `tiempo` int(4) NOT NULL,
  `periodo` int(1) NOT NULL,
  `turno` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`periodo_id`, `tiempo`, `periodo`, `turno`) VALUES
(1, 2014, 1, 'D'),
(2, 2014, 1, 'N'),
(3, 2014, 2, 'D'),
(4, 2014, 2, 'N'),
(5, 2015, 1, 'D'),
(6, 2015, 1, 'N'),
(7, 2015, 2, 'D'),
(8, 2015, 2, 'N'),
(9, 2016, 1, 'D'),
(10, 2016, 1, 'N'),
(11, 2016, 2, 'D'),
(12, 2016, 2, 'N'),
(13, 2017, 1, 'D'),
(14, 2017, 1, 'N'),
(15, 2017, 2, 'D'),
(16, 2017, 2, 'N'),
(17, 2018, 1, 'D'),
(18, 2018, 1, 'N'),
(19, 2018, 2, 'D'),
(20, 2018, 2, 'N'),
(21, 2019, 1, 'D'),
(22, 2019, 1, 'N'),
(23, 2019, 2, 'D'),
(24, 2019, 2, 'N'),
(25, 2020, 1, 'D'),
(26, 2020, 1, 'N'),
(27, 2020, 2, 'D'),
(28, 2020, 2, 'N'),
(29, 2021, 1, 'D'),
(30, 2021, 1, 'N'),
(31, 2021, 2, 'D'),
(32, 2021, 2, 'N'),
(33, 2022, 1, 'D'),
(34, 2022, 1, 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion`
--

CREATE TABLE `relacion` (
  `id_relacion` int(11) NOT NULL,
  `id_estudiantes` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `cod_carrera` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`cod_carrera`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
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
-- Indices de la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD PRIMARY KEY (`id_relacion`),
  ADD KEY `id_estudiantes` (`id_estudiantes`,`periodo_id`,`cod_carrera`,`id_entrada`),
  ADD KEY `id_entrada` (`id_entrada`),
  ADD KEY `periodo_id` (`periodo_id`),
  ADD KEY `cod_carrera` (`cod_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_entrada` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiantes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `relacion`
--
ALTER TABLE `relacion`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD CONSTRAINT `relacion_ibfk_1` FOREIGN KEY (`id_entrada`) REFERENCES `entradas` (`id_entrada`),
  ADD CONSTRAINT `relacion_ibfk_2` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`periodo_id`),
  ADD CONSTRAINT `relacion_ibfk_3` FOREIGN KEY (`cod_carrera`) REFERENCES `carrera` (`cod_carrera`),
  ADD CONSTRAINT `relacion_ibfk_4` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`id_estudiantes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
