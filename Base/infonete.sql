-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 21:01:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

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
  `id_con` int(11) NOT NULL,
  `id_con_user` int(11) NOT NULL,
  `id_con_publications` int(11) NOT NULL,
  `id_con_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`id_con`, `id_con_user`, `id_con_publications`, `id_con_section`) VALUES
(1, 5, 1, 3),
(2, 5, 1, 3);

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
(1, '$2y$10$jRFEOaToRiqoNa1e.nryxOKnb4ZQwowgwHTWP74Y.h7fpENLsfNWG', NULL, 0, '1001', 'santiago.opera@gmail.com'),
(4, '$2y$10$/waXiya7oAi9EqixsGXQyeOzGm7PT/lv0SIsKe3pJKDTX2R.V7Yi.', NULL, 0, '1001', 'asd@asd.com'),
(5, '$2y$10$oU7PXcTlJBZwnEbgaLVkNeUNQENRCMntt/NfSUC.O/l0TtViJqkZK', NULL, 0, '1002', 'lreta@lreta.com.ar'),
(13, '$2y$10$buM1c6EY3QIb8FkySxtpAekv/8WpDuw9KQVrzTREMeCAU9jb8i4xW', NULL, 0, '1002', 'lreta@lreta.com.awr'),
(14, '$2y$10$4XnTFNyCIQBETXJj9d21uezRyXnlP487hMVgybLnYMoKZeoI1zPh.', NULL, 0, '100', 'lucasjorgereta@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id_publications` int(11) NOT NULL,
  `titulo_pub` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `pub_img_url` varchar(50) NOT NULL,
  `id_section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id_publications`, `titulo_pub`, `descripcion`, `pub_img_url`, `id_section`) VALUES
(1, 'BOCA Perdio con Patronato', 'Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.', '/public/w3images/boca.jpeg', 3),
(3, 'Notebook 2 X1', 'des', '', 1);

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
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`id`, `titulo`, `descripcion`, `precio`) VALUES
(1, 'Tecnologia', 'Descripcion Tecnologia', 17),
(2, 'Economia', 'Descripcion Economia', 22),
(3, 'Deportes', 'Descripcion Deportes', 20);

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
(1, 'Santiago', 'Reta', 'Villa Luzuriaga', 1, '1'),
(4, 'sad', 'asd', 'asd', 1, '1'),
(5, 'asd', 'asd', 'asd', 1, '1'),
(14, 'lucas', 'reta', 'bsas', 1, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_con`),
  ADD KEY `fk_user` (`id_con_user`),
  ADD KEY `fk_content_section` (`id_con_section`),
  ADD KEY `fk_content_publications` (`id_con_publications`);

--
-- Indices de la tabla `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`ID_PASS`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_publications`),
  ADD KEY `fk_section` (`id_section`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk_content_publications` FOREIGN KEY (`id_con_publications`) REFERENCES `publications` (`id_publications`),
  ADD CONSTRAINT `fk_content_section` FOREIGN KEY (`id_con_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_con_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
