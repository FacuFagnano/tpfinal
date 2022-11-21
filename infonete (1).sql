-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 00:07:26
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infonete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE `content` (
  `ID_CON` int(11) NOT NULL,
  `CONTENT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password`
--

CREATE TABLE `password` (
  `ID_PASS` int(11) NOT NULL,
  `PASS` varchar(200) NOT NULL,
  `DATE_CADUCATE` date DEFAULT NULL,
  `VALIDATED_STATUS` tinyint(1) DEFAULT 0,
  `HASH_VALIDATOR` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `password`
--

INSERT INTO `password` (`ID_PASS`, `PASS`, `DATE_CADUCATE`, `VALIDATED_STATUS`, `HASH_VALIDATOR`, `EMAIL`) VALUES
(1, '$2y$10$jRFEOaToRiqoNa1e.nryxOKnb4ZQwowgwHTWP74Y.h7fpENLsfNWG', NULL, 0, '100', 'santiago.opera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(10) NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`ID_ROLE`, `DESCRIPTION`) VALUES
(1, 'Administrador'),
(2, 'Lector'),
(3, 'Escritor'),
(4, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `GEOPOSITION` varchar(500) DEFAULT NULL,
  `ROL` int(20) DEFAULT NULL,
  `ESTATE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `NAME`, `LASTNAME`, `GEOPOSITION`, `ROL`, `ESTATE`) VALUES
(1, 'Santiago', 'Reta', 'Villa Luzuriaga', 1, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`ID_PASS`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
