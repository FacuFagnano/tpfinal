CREATE DATABASE INFONETE;
USE INFONETE;

CREATE TABLE `password` (
  `ID_PASS` int(11) PRIMARY KEY,
  `PASS` varchar(200) NOT NULL,
  `DATE_CADUCATE` date DEFAULT NULL,
  `VALIDATED_STATUS` tinyint(1) DEFAULT 0,
  `HASH_VALIDATOR` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(30) NOT NULL);

CREATE TABLE `role` (
  `ID_ROLE` int(10) PRIMARY KEY,
  `DESCRIPTION` varchar(50) NOT NULL);

CREATE TABLE `user` (
  `ID` int(11) AUTO_INCREMENT PRIMARY KEY,
  `NAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `GEOPOSITION` varchar(500) DEFAULT NULL,
  `ROL` int(20) DEFAULT NULL,
  `ESTATE` varchar(50) DEFAULT NULL);
  
CREATE TABLE dailyType (
`typeId` int (10) PRIMARY KEY ,
`typeDescription` varchar(20) NOT NULL);

CREATE TABLE daily (
`dailyId` int (10) auto_increment PRIMARY KEY ,
`dailyName` varchar (20) NOT NULL,
`dailyImageUrl` varchar (200),
`dailyDescription` varchar (100),
`idTypeTable` int (10),
foreign key (`idTypeTable`) references dailyType(typeId));

CREATE TABLE `usersDaily`(
`usersDailyId` int (10) auto_increment primary key,
`userIdTable` int (11),
`dailyIdTable` int (10),
foreign key (`userIdTable`) references user (ID),
foreign key (`dailyIdTable`) references daily (dailyId));

CREATE TABLE edition(
`editionId` int (10) AUTO_INCREMENT PRIMARY KEY,
`editionPrice` float (10) NOT NULL,
`editionDescription` varchar (200) NOT NULL,
`editionImageUrl` varchar (200) NOT NULL,
`idDailyTable` int (10),
foreign key (`idDailyTable`) references daily(dailyId));

CREATE TABLE sectionType (
`idSectionType` int (10) auto_increment primary key,
`sectionTypeDescription` varchar (200) NOT NULL);

CREATE TABLE section (
`sectionId` int (10) auto_increment primary key,
`sectionDescription` varchar (200),
`sectionImageUrl` varchar (200),
`idSectionTypeTable` int (10),
`idEditionTable` int (10),
foreign key(`idSectionTypeTable`) references sectionType(idSectionType),
foreign key(`idEditionTable`) references edition(editionId));

CREATE TABLE noteStatus (
`idNoteStatus` int (10) auto_increment primary key,
`statusDescription` varchar(50));

CREATE TABLE articles (
  `idArticles` int(10) auto_increment primary key,
  `articleTitle` varchar(50) NOT NULL,
  `articleContent` varchar(5000) NOT NULL,
  `articleImage` varchar(50) NOT NULL,
  `articleEditorComment` varchar (300),
  `idSectionTable` int(10) NOT NULL,
  `idNoteStatusTable` int (10) NOT NULL,
  foreign key(`idSectionTable`) references section (sectionId),
  foreign key(`idNoteStatusTable`) references noteStatus (idNoteStatus));
  
  
ALTER TABLE `daily` ADD `dailyPrice` INT(100) NOT NULL AFTER `dailyDescription`;

SELECT * 
FROM usersDaily;

SELECT *  from daily where dailyId not in (SELECT dailyIdTable  FROM usersdaily WHERE userIdTable = 3);

UPDATE `daily` SET `dailyPrice`='500' WHERE dailyId = 5; 

DELETE FROM `usersDaily` WHERE userIdTable = 1;

DELETE FROM usersdaily WHERE userIdTable = 1 and dailyIdTable = 1;

INSERT INTO dailyType (`typeId`, `typeDescription`) VALUES
(1, 'Interes General'),
(2, 'Deportes'),
(3, 'Regionales'),
(4, 'Economía y Política');

INSERT INTO `daily` (`dailyName`, `dailyImageUrl`, `dailyDescription`, `idTypeTable`) VALUES
('Ambito', '/public/diarios/ambito.png', 'El diario de la gente',1),
('Pronto', '/public/diarios/pronto.png', 'Noticias del espectaculo',1),
('Infobae', '/public/diarios/infobae.png', 'Hacemos Periodismo',4),
('Clarin', '/public/diarios/clarin.jpg', 'El gran diario Argentino',1),
('La Nacion', '/public/diarios/laNacion.png', 'Informate distinto',2);

INSERT INTO `edition` (`editionPrice`,`editionDescription`, `editionImageUrl`, `idDailyTable`) VALUES
(100, "Edicion del Lunes" ,'/public/diarios/tapa/seccion/seccion.png',1),
(200, "Edicion del Martes" ,'/public/diarios/tapa/seccion/seccion.png',1),
(300, "Edicion del Miercoles" ,'/public/diarios/tapa/seccion/seccion.png',1),
(400, "Edicion del Jueves" ,'/public/diarios/tapa/seccion/seccion.png',1),
(500, "Edicion del Viernes" ,'/public/diarios/tapa/seccion/seccion.png',1),
(600, "Edicion del Sabado" ,'/public/diarios/tapa/seccion/seccion.png',1),
(700, "Edicion del Domingo" ,'/public/diarios/tapa/seccion/seccion.png',1);

INSERT INTO `sectionType` (`sectionTypeDescription`) VALUES
("Deportes"),
("Politica"),
("Economia"),
("Tecnologia");

INSERT INTO `section` (`sectionDescription`, `sectionImageUrl`,`idSectionTypeTable`, `idEditionTable`) VALUES
("Lo mejor sobre deportes", "hola.png", 1, 1);

INSERT INTO `noteStatus` (`statusDescription`) VALUES
("Para Verificar"),
("Devuelta al Escritor"),
("Postear"),
("Eliminar");

INSERT INTO `articles` (`articleTitle`, `articleContent`, `articleImage`, `idSectionTable`, `idNoteStatusTable`) VALUES
('BRASIL CAMPEON', 'alemania segundo', '/public/w3images/boca.jpeg', 1, 1);















INSERT INTO `dailyType`(`typeId`,`description`) VALUES
(01,'Interes General'),
(02,'Deportes'),
(03,'Regionales'),
(04,'Economía y Política');

INSERT INTO `daily` (`dailyId`, `name`, `idTypeTable`) VALUES
(001, 'Clarín', 01),
(002, 'La Nación', 01), 
(003, 'Crónica', 01),
(004, 'Página 12', 01),
(005, 'Olé', 02),
(006, 'Cancha Llena', 02),
(007, 'Los Andes', 03),
(008, 'La Voz', 03),
(009, 'La Gaceta', 03),
(010, 'El Litoral', 03),
(011, 'Ámbito', 04),
(012, 'Cronista', 04),
(013, 'Cripto', 04),
(014, 'El Economista Diario', 04);
  
  
INSERT INTO `password` (`ID_PASS`, `PASS`, `DATE_CADUCATE`, `VALIDATED_STATUS`, `HASH_VALIDATOR`, `EMAIL`) VALUES
(1, '$2y$10$jRFEOaToRiqoNa1e.nryxOKnb4ZQwowgwHTWP74Y.h7fpENLsfNWG', NULL, 0, '100', 'santiago.opera@gmail.com');

INSERT INTO `user` (`ID`, `NAME`, `LASTNAME`, `GEOPOSITION`, `ROL`, `ESTATE`) VALUES
(1, 'Santiago', 'Reta', 'Villa Luzuriaga', 1, '1');

INSERT INTO `role` (`ID_ROLE`, `DESCRIPTION`) VALUES
(1, 'Administrador'),
(2, 'Lector'),
(3, 'Escritor'),
(4, 'Editor');

INSERT INTO `publications` (`id_publications`, `titulo_pub`, `descripcion`, `pub_img_url`, `id_section`) VALUES
(1, 'BOCA Perdio con Patronato', 'Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.', '/public/w3images/boca.jpeg', 3),
(3, 'Notebook 2 X1', 'des', '', 1);

INSERT INTO `section` (`id`, `titulo`, `descripcion`, `precio`) VALUES
(1, 'Tecnologia', 'Descripcion Tecnologia', 17),
(2, 'Economia', 'Descripcion Economia', 22),
(3, 'Deportes', 'Descripcion Deportes', 20);





