-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 23:52:07
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
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `idArticles` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `articleContent` varchar(500) NOT NULL,
  `articleImage` varchar(50) NOT NULL,
  `idSectionTable` int(10) NOT NULL,
  `idNoteStatusTable` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`idArticles`, `title`, `articleContent`, `articleImage`, `idSectionTable`, `idNoteStatusTable`) VALUES
(1, 'ARGENTINA CAMPEON', 'ARGENTINA Se CONSAGRO  CAMPEON', '/public/w3images/boca.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `daily`
--

CREATE TABLE `daily` (
  `dailyId` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `idTypeTable` int(10) DEFAULT NULL,
  `dailyImageUrl` varchar(50) DEFAULT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `daily`
--

INSERT INTO `daily` (`dailyId`, `name`, `idTypeTable`, `dailyImageUrl`, `description`) VALUES
(1, 'Ambito', 1, '/public/diarios/ambito.png', 'El diario de la gente'),
(2, 'Pronto', 1, '/public/diarios/pronto.png', 'Noticias del espectaculo'),
(3, 'Infobae', 4, '/public/diarios/infobae.png', 'Hacemos Periodismo'),
(4, 'Clarin', 1, '/public/diarios/clarin.jpg', 'El gran diario Argentino'),
(5, 'La Nacion', 2, '/public/diarios/laNacion.png', 'Informate distinto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dailytype`
--

CREATE TABLE `dailytype` (
  `typeId` int(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dailytype`
--

INSERT INTO `dailytype` (`typeId`, `description`) VALUES
(1, 'Interes General'),
(2, 'Deportes'),
(3, 'Regionales'),
(4, 'Economía y Política');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edition`
--

CREATE TABLE `edition` (
  `id_edition` int(10) NOT NULL,
  `price` float NOT NULL,
  `idDailyTable` int(10) DEFAULT NULL,
  `editionImageUrl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edition`
--

INSERT INTO `edition` (`id_edition`, `price`, `idDailyTable`, `editionImageUrl`) VALUES
(1, 10, 1, '/public/diarios/tapa/seccion/seccion.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notestatus`
--

CREATE TABLE `notestatus` (
  `idNoteStatus` int(10) NOT NULL,
  `toVerify` int(1) DEFAULT NULL,
  `backToWriter` int(1) DEFAULT NULL,
  `post` int(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notestatus`
--

INSERT INTO `notestatus` (`idNoteStatus`, `toVerify`, `backToWriter`, `post`, `deleted`) VALUES
(1, 1, 1, NULL, NULL);

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
(20, '$2y$10$CoCID7jasX3E87RI9699neh5hPjcN8SJMPOCEAZsSG2HNgyCgLBH2', NULL, 1, '0', 'lucasjorgereta@gmail.com'),
(21, '$2y$10$GzHOmV4DIeI99B4VJSfW0.En8a2aTCInXprpZJ/.JKVhIjCQvc.36', NULL, 1, '0', 'santiago.opera@hotmail.com');

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
  `idSection` int(10) NOT NULL,
  `idSectionTypeTable` int(10) DEFAULT NULL,
  `idEditionTable` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`idSection`, `idSectionTypeTable`, `idEditionTable`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectiontype`
--

CREATE TABLE `sectiontype` (
  `idSectionType` int(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sectiontype`
--

INSERT INTO `sectiontype` (`idSectionType`, `description`) VALUES
(1, 'Deportes'),
(2, 'Economia'),
(3, 'Tecnologia');

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
(14, 'lucas', 'reta', 'bsas', 1, '1'),
(15, 'lucas', 'reta', 'bsas', 1, '1'),
(16, 'Pablo', 'pablo', 'BSAS', 1, '1'),
(17, 'lucas', 'reta', 'BSAS', 1, '1'),
(19, 'Lucas', 'Reta', 'bsas', 1, '1'),
(20, 'lucas', 'Reta', 'bsas', 1, '1'),
(21, 'Santiago', 'Opera', 'Villa Luzuriaga', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usersdaily`
--

CREATE TABLE `usersdaily` (
  `idUsersDaily` int(10) NOT NULL,
  `UserIdTable` int(11) DEFAULT NULL,
  `DailyIdTable` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usersdaily`
--

INSERT INTO `usersdaily` (`idUsersDaily`, `UserIdTable`, `DailyIdTable`) VALUES
(1, 20, 1),
(2, 20, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticles`),
  ADD KEY `idSectionTable` (`idSectionTable`),
  ADD KEY `idNoteStatusTable` (`idNoteStatusTable`);

--
-- Indices de la tabla `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`dailyId`),
  ADD KEY `idTypeTable` (`idTypeTable`);

--
-- Indices de la tabla `dailytype`
--
ALTER TABLE `dailytype`
  ADD PRIMARY KEY (`typeId`);

--
-- Indices de la tabla `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`id_edition`),
  ADD KEY `idDailyTable` (`idDailyTable`);

--
-- Indices de la tabla `notestatus`
--
ALTER TABLE `notestatus`
  ADD PRIMARY KEY (`idNoteStatus`);

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
  ADD PRIMARY KEY (`idSection`),
  ADD KEY `idSectionTypeTable` (`idSectionTypeTable`),
  ADD KEY `idEditionTable` (`idEditionTable`);

--
-- Indices de la tabla `sectiontype`
--
ALTER TABLE `sectiontype`
  ADD PRIMARY KEY (`idSectionType`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usersdaily`
--
ALTER TABLE `usersdaily`
  ADD PRIMARY KEY (`idUsersDaily`),
  ADD KEY `UserIdTable` (`UserIdTable`),
  ADD KEY `DailyIdTable` (`DailyIdTable`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticles` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `edition`
--
ALTER TABLE `edition`
  MODIFY `id_edition` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notestatus`
--
ALTER TABLE `notestatus`
  MODIFY `idNoteStatus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `idSection` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sectiontype`
--
ALTER TABLE `sectiontype`
  MODIFY `idSectionType` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usersdaily`
--
ALTER TABLE `usersdaily`
  MODIFY `idUsersDaily` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idSectionTable`) REFERENCES `section` (`idSection`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`idNoteStatusTable`) REFERENCES `notestatus` (`idNoteStatus`);

--
-- Filtros para la tabla `daily`
--
ALTER TABLE `daily`
  ADD CONSTRAINT `daily_ibfk_1` FOREIGN KEY (`idTypeTable`) REFERENCES `dailytype` (`typeId`);

--
-- Filtros para la tabla `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `edition_ibfk_1` FOREIGN KEY (`idDailyTable`) REFERENCES `daily` (`dailyId`);

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`id_section`) REFERENCES `section` (`idSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`idSectionTypeTable`) REFERENCES `sectiontype` (`idSectionType`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`idEditionTable`) REFERENCES `edition` (`id_edition`);

--
-- Filtros para la tabla `usersdaily`
--
ALTER TABLE `usersdaily`
  ADD CONSTRAINT `usersdaily_ibfk_1` FOREIGN KEY (`UserIdTable`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `usersdaily_ibfk_2` FOREIGN KEY (`DailyIdTable`) REFERENCES `daily` (`dailyId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
