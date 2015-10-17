-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2015 a las 22:34:36
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `manosdeoro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`idadministrador` int(11) NOT NULL,
  `primerNom` varchar(80) COLLATE utf8_bin NOT NULL,
  `segundoNom` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `primerApe` varchar(80) COLLATE utf8_bin NOT NULL,
  `segundoApe` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(80) COLLATE utf8_bin NOT NULL,
  `password` varchar(80) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `primerNom`, `segundoNom`, `primerApe`, `segundoApe`, `username`, `password`, `email`, `tipo`) VALUES
(3, 'felix', 'camargo', 'camrgo', 'camrgo', 'fx', '123', 'felix@gmail.com', 0),
(4, 'jeferson', 'jeferson', 'jeferson', 'jeferson', 'jf', '123', 'jf@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artesano`
--

CREATE TABLE IF NOT EXISTS `artesano` (
`idArtesano` int(11) NOT NULL,
  `TipoDoc` int(11) NOT NULL,
  `NroDoc` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(30) COLLATE utf8_bin NOT NULL,
  `telefono2` varchar(25) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `celular` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `certificacion` tinyint(4) NOT NULL,
  `nivelestudio` int(11) NOT NULL,
  `aprendices` text COLLATE utf8_bin,
  `cursos` text COLLATE utf8_bin,
  `formatofoto` int(11) DEFAULT NULL,
  `departamento` varchar(22) COLLATE utf8_bin NOT NULL,
  `ciudad` varchar(22) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `artesano`
--

INSERT INTO `artesano` (`idArtesano`, `TipoDoc`, `NroDoc`, `password`, `direccion`, `telefono`, `telefono2`, `username`, `estado`, `nombre`, `celular`, `email`, `certificacion`, `nivelestudio`, `aprendices`, `cursos`, `formatofoto`, `departamento`, `ciudad`) VALUES
(60, 0, '1061788569', 'abcdef', 'Cra 5 E No 57 N 03', '', '', '1061788569', 2, 'Sebastián  Landinez Garcia', '3002695941', 'slandinezg@gmail.com', 0, 2, '', '', 2, '10', '414');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_lim` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `foto`, `descripcion`, `fecha_lim`, `horario`) VALUES
(4, 'fotoCursocapacitaciÃ³n sobre tejidos artesanales.jpg', 'capacitaciÃ³n sobre tejidos artesanales', '2015-09-24', 'De 7 a 9 pm.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int(5) NOT NULL,
  `descripcion` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `descripcion`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlantico'),
(5, 'Bolivar'),
(6, 'Boyaca'),
(7, 'Caldas'),
(8, 'Caqueta'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Choco'),
(13, 'Cordoba'),
(14, 'Cundinamarca'),
(15, 'Guainia'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Narino'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindo'),
(25, 'Risaralda'),
(26, 'San Andres y Providenc'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupes'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE IF NOT EXISTS `inscritos` (
  `curso` varchar(33) NOT NULL,
  `nombre` varchar(22) NOT NULL,
  `cedula` int(15) NOT NULL,
  `email` varchar(22) NOT NULL,
  `celular` int(15) NOT NULL,
  `direccion` varchar(22) NOT NULL,
  `ciudad` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`curso`, `nombre`, `cedula`, `email`, `celular`, `direccion`, `ciudad`) VALUES
('Manillas', 'q', 0, 'pablosanjuanm@gmail.co', 0, 'q', 'q'),
('Manillas', 'hhHH', 0, 'pablosanjuanm@gmail.co', 0, 'JJ', 'JJ'),
('sds', 'pablo', 1111, 'pablosanjuanm@gmail.co', 321, 'calle', 'popa'),
('sds', 'cesar', 22, 'correo@coro.com', 123, 'po', 'cali'),
('sds', 'cesar', 22, 'correo@coro.com', 123, 'po', 'cali'),
('Camisas', 'jeferson', 123, 'jefer@hotmail.com', 313122323, 'calllll', 'popayan'),
('Camisas', 'felix', 33333, 'f@h.com', 555, 'cll4', 'padto'),
('Camisas', 'qwe qew qe lkm', 2, 'sew@hom.com', 0, 'qweq', 'popayan'),
('Camisas', 'prueba', 123456789, 'tester@dstec.co', 2147483647, 'Calle 45 ', 'Popa'),
('Camisas', 'qwe qew qe lkm', 2, 'sew@hom.com', 0, 'qweq', 'pop'),
('capacitaciÃ³n sobre tejidos artes', 'Pedro  Perez ', 12345678, 'jefersonandresb@hotmai', 0, 'calle 1a # 10 - 20', 'Pasto'),
('capacitaciÃ³n sobre tejidos artes', 'jeferson  bolaÃ±os ', 12345, 'jefersonandresb@hotmai', 0, 'calleb', 'popayÃ¡n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` int(5) NOT NULL,
  `id_departamento` int(5) NOT NULL,
  `descripcion` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `id_departamento`, `descripcion`) VALUES
(1, 1, 'Leticia'),
(2, 1, 'Puerto Narino'),
(3, 2, 'Abejorral'),
(4, 2, 'Abriaqui'),
(5, 2, 'Alejandria'),
(6, 2, 'Amaga'),
(7, 2, 'Amalfi'),
(8, 2, 'Andes'),
(9, 2, 'Angelopolis'),
(10, 2, 'Angostura'),
(11, 2, 'Anori'),
(12, 2, 'Anza'),
(13, 2, 'Apartado'),
(14, 2, 'Arboletes'),
(15, 2, 'Argelia'),
(16, 2, 'Armenia'),
(17, 2, 'Barbosa'),
(18, 2, 'Bello'),
(19, 2, 'Belmira'),
(20, 2, 'Betania'),
(21, 2, 'Betulia'),
(22, 2, 'Bolivar'),
(23, 2, 'Briceno'),
(24, 2, 'Buritica'),
(25, 2, 'Caicedo'),
(26, 2, 'Caldas'),
(27, 2, 'Campamento'),
(28, 2, 'Caracoli'),
(29, 2, 'Caramanta'),
(30, 2, 'Carepa'),
(31, 2, 'Carmen de Viboral'),
(32, 2, 'Carolina'),
(33, 2, 'Caucasia'),
(34, 2, 'Canasgordas'),
(35, 2, 'Chigorodo'),
(36, 2, 'Cisneros'),
(37, 2, 'Cocorna'),
(38, 2, 'Concepcion'),
(39, 2, 'Concordia'),
(40, 2, 'Copacabana'),
(41, 2, 'Caceres'),
(42, 2, 'Dabeiba'),
(43, 2, 'Don Matias'),
(44, 2, 'Ebejico'),
(45, 2, 'El Bagre'),
(46, 2, 'Entrerrios'),
(47, 2, 'Envigado'),
(48, 2, 'Fredonia'),
(49, 2, 'Frontino'),
(50, 2, 'Giraldo'),
(51, 2, 'Girardota'),
(52, 2, 'Granada'),
(53, 2, 'Guadalupe'),
(54, 2, 'Guarne'),
(55, 2, 'Guatape'),
(56, 2, 'Gomez Plata'),
(57, 2, 'Heliconia'),
(58, 2, 'Hispania'),
(59, 2, 'Itagüi'),
(60, 2, 'Ituango'),
(61, 2, 'Jardin'),
(62, 2, 'Jerico'),
(63, 2, 'La Ceja'),
(64, 2, 'La Estrella'),
(65, 2, 'La Pintada'),
(66, 2, 'La Union'),
(67, 2, 'Liborina'),
(68, 2, 'Maceo'),
(69, 2, 'Marinilla'),
(70, 2, 'Medellin'),
(71, 2, 'Montebello'),
(72, 2, 'Murindo'),
(73, 2, 'Mutata'),
(74, 2, 'Narino'),
(75, 2, 'Nechi'),
(76, 2, 'Necocli'),
(77, 2, 'Olaya'),
(78, 2, 'Peque'),
(79, 2, 'Penol'),
(80, 2, 'Pueblorrico'),
(81, 2, 'Puerto Berrio'),
(82, 2, 'Puerto Nare'),
(83, 2, 'Puerto Triunfo'),
(84, 2, 'Remedios'),
(85, 2, 'Retiro'),
(86, 2, 'Rionegro'),
(87, 2, 'Sabanalarga'),
(88, 2, 'Sabaneta'),
(89, 2, 'Salgar'),
(90, 2, 'San Andres de Cuerquia'),
(91, 2, 'San Carlos'),
(92, 2, 'San Francisco'),
(93, 2, 'San Jeronimo'),
(94, 2, 'San Jose de Montana'),
(95, 2, 'San Juan de Uraba'),
(96, 2, 'San Luis'),
(97, 2, 'San Pedro'),
(98, 2, 'San Pedro de Uraba'),
(99, 2, 'San Rafael'),
(100, 2, 'San Roque'),
(101, 2, 'San Vicente'),
(102, 2, 'Santa Barbara'),
(103, 2, 'Santa Fe de Antioquia'),
(104, 2, 'Santa Rosa de Osos'),
(105, 2, 'Santo Domingo'),
(106, 2, 'Santuario'),
(107, 2, 'Segovia'),
(108, 2, 'Sonson'),
(109, 2, 'Sopetran'),
(110, 2, 'Taraza'),
(111, 2, 'Tarso'),
(112, 2, 'Titiribi'),
(113, 2, 'Toledo'),
(114, 2, 'Turbo'),
(115, 2, 'Tamesis'),
(116, 2, 'Uramita'),
(117, 2, 'Urrao'),
(118, 2, 'Valdivia'),
(119, 2, 'Valparaiso'),
(120, 2, 'Vegachi'),
(121, 2, 'Venecia'),
(122, 2, 'Vigia del Fuerte'),
(123, 2, 'Yali'),
(124, 2, 'Yarumal'),
(125, 2, 'Yolombo'),
(126, 2, 'Yondo (Casabe)'),
(127, 2, 'Zaragoza'),
(128, 3, 'Arauca'),
(129, 3, 'Arauquita'),
(130, 3, 'Cravo Norte'),
(131, 3, 'Fortul'),
(132, 3, 'Puerto Rondon'),
(133, 3, 'Saravena'),
(134, 3, 'Tame'),
(135, 4, 'Baranoa'),
(136, 4, 'Barranquilla'),
(137, 4, 'Campo de la Cruz'),
(138, 4, 'Candelaria'),
(139, 4, 'Galapa'),
(140, 4, 'Juan de Acosta'),
(141, 4, 'Luruaco'),
(142, 4, 'Malambo'),
(143, 4, 'Manati'),
(144, 4, 'Palmar de Varela'),
(145, 4, 'Piojo'),
(146, 4, 'Polonuevo'),
(147, 4, 'Ponedera'),
(148, 4, 'Puerto Colombia'),
(149, 4, 'Repelon'),
(150, 4, 'Sabanagrande'),
(151, 4, 'Sabanalarga'),
(152, 4, 'Santa Lucia'),
(153, 4, 'Santo Tomas'),
(154, 4, 'Soledad'),
(155, 4, 'Suan'),
(156, 4, 'Tubara'),
(157, 4, 'Usiacuri'),
(158, 5, 'Achi'),
(159, 5, 'Altos del Rosario'),
(160, 5, 'Arenal'),
(161, 5, 'Arjona'),
(162, 5, 'Arroyohondo'),
(163, 5, 'Barranco de Loba'),
(164, 5, 'Calamar'),
(165, 5, 'Cantagallo'),
(166, 5, 'Cartagena'),
(167, 5, 'Cicuco'),
(168, 5, 'Clemencia'),
(169, 5, 'Cordoba'),
(170, 5, 'El Carmen de Bolivar'),
(171, 5, 'El Guamo'),
(172, 5, 'El Penon'),
(173, 5, 'Hatillo de Loba'),
(174, 5, 'Magangue'),
(175, 5, 'Mahates'),
(176, 5, 'Margarita'),
(177, 5, 'Maria la Baja'),
(178, 5, 'Mompos'),
(179, 5, 'Montecristo'),
(180, 5, 'Morales'),
(181, 5, 'Norosi'),
(182, 5, 'Pinillos'),
(183, 5, 'Regidor'),
(184, 5, 'Rio Viejo'),
(185, 5, 'San Cristobal'),
(186, 5, 'San Estanislao'),
(187, 5, 'San Fernando'),
(188, 5, 'San Jacinto'),
(189, 5, 'San Jacinto del Cauca'),
(190, 5, 'San Juan de Nepomuceno'),
(191, 5, 'San Martin de Loba'),
(192, 5, 'San Pablo'),
(193, 5, 'Santa Catalina'),
(194, 5, 'Santa Rosa '),
(195, 5, 'Santa Rosa del Sur'),
(196, 5, 'Simiti'),
(197, 5, 'Soplaviento'),
(198, 5, 'Talaigua Nuevo'),
(199, 5, 'Tiquisio (Puerto Rico)'),
(200, 5, 'Turbaco'),
(201, 5, 'Turbana'),
(202, 5, 'Villanueva'),
(203, 5, 'Zambrano'),
(204, 6, 'Almeida'),
(205, 6, 'Aquitania'),
(206, 6, 'Arcabuco'),
(207, 6, 'Belen'),
(208, 6, 'Berbeo'),
(209, 6, 'Beteitiva'),
(210, 6, 'Boavita'),
(211, 6, 'Boyaca'),
(212, 6, 'Briceno'),
(213, 6, 'Buenavista'),
(214, 6, 'Busbanza'),
(215, 6, 'Caldas'),
(216, 6, 'Campohermoso'),
(217, 6, 'Cerinza'),
(218, 6, 'Chinavita'),
(219, 6, 'Chiquinquira'),
(220, 6, 'Chiscas'),
(221, 6, 'Chita'),
(222, 6, 'Chitaraque'),
(223, 6, 'Chivata'),
(224, 6, 'Chiquiza'),
(225, 6, 'Chivor'),
(226, 6, 'Cienaga'),
(227, 6, 'Coper'),
(228, 6, 'Corrales'),
(229, 6, 'Covarachia'),
(230, 6, 'Cubara'),
(231, 6, 'Cucaita'),
(232, 6, 'Cuitiva'),
(233, 6, 'Combita'),
(234, 6, 'Duitama'),
(235, 6, 'El Cocuy'),
(236, 6, 'El Espino'),
(237, 6, 'Firavitoba'),
(238, 6, 'Floresta'),
(239, 6, 'Gachantiva'),
(240, 6, 'Garagoa'),
(241, 6, 'Guacamayas'),
(242, 6, 'Guateque'),
(243, 6, 'Guayata'),
(244, 6, 'Guican'),
(245, 6, 'Gameza'),
(246, 6, 'Iza'),
(247, 6, 'Jenesano'),
(248, 6, 'Jerico'),
(249, 6, 'La Capilla'),
(250, 6, 'La Uvita'),
(251, 6, 'La Victoria'),
(252, 6, 'Labranzagrande'),
(253, 6, 'Macanal'),
(254, 6, 'Maripi'),
(255, 6, 'Miraflores'),
(256, 6, 'Mongua'),
(257, 6, 'Mongui'),
(258, 6, 'Moniquira'),
(259, 6, 'Motavita'),
(260, 6, 'Muzo'),
(261, 6, 'Nobsa'),
(262, 6, 'Nuevo Colon'),
(263, 6, 'Oicata'),
(264, 6, 'Otanche'),
(265, 6, 'Pachavita'),
(266, 6, 'Paipa'),
(267, 6, 'Pajarito'),
(268, 6, 'Panqueba'),
(269, 6, 'Pauna'),
(270, 6, 'Paya'),
(271, 6, 'Paz de Rio'),
(272, 6, 'Pesca'),
(273, 6, 'Pisva'),
(274, 6, 'Puerto Boyaca'),
(275, 6, 'Paez'),
(276, 6, 'Quipama'),
(277, 6, 'Ramiriqui'),
(278, 6, 'Rondon'),
(279, 6, 'Raquira'),
(280, 6, 'Saboya'),
(281, 6, 'Samaca'),
(282, 6, 'San Eduardo'),
(283, 6, 'San Jose de Pare'),
(284, 6, 'San Luis de Gaceno'),
(285, 6, 'San Mateo'),
(286, 6, 'San Miguel de Sema'),
(287, 6, 'San Pablo de Borbur'),
(288, 6, 'Santa Maria'),
(289, 6, 'Santa Rosa de Viterbo'),
(290, 6, 'Santa Sofia'),
(291, 6, 'Santana'),
(292, 6, 'Sativanorte'),
(293, 6, 'Sativasur'),
(294, 6, 'Siachoque'),
(295, 6, 'Soata'),
(296, 6, 'Socha'),
(297, 6, 'Socota'),
(298, 6, 'Sogamoso'),
(299, 6, 'Somondoco'),
(300, 6, 'Sora'),
(301, 6, 'Soraca'),
(302, 6, 'Sotaquira'),
(303, 6, 'Susacon'),
(304, 6, 'Sutamarchan'),
(305, 6, 'Sutatenza'),
(306, 6, 'Sachica'),
(307, 6, 'Tasco'),
(308, 6, 'Tenza'),
(309, 6, 'Tibana'),
(310, 6, 'Tibasosa'),
(311, 6, 'Tinjaca'),
(312, 6, 'Tipacoque'),
(313, 6, 'Toca'),
(314, 6, 'Togui'),
(315, 6, 'Topaga'),
(316, 6, 'Tota'),
(317, 6, 'Tunja'),
(318, 6, 'Tunungua'),
(319, 6, 'Turmeque'),
(320, 6, 'Tuta'),
(321, 6, 'Tutasa'),
(322, 6, 'Ventaquemada'),
(323, 6, 'Villa de Leiva'),
(324, 6, 'Viracacha'),
(325, 6, 'Zetaquira'),
(326, 6, 'Umbita'),
(327, 7, 'Aguadas'),
(328, 7, 'Anserma'),
(329, 7, 'Aranzazu'),
(330, 7, 'Belalcazar'),
(331, 7, 'Chinchina'),
(332, 7, 'Filadelfia'),
(333, 7, 'La Dorada'),
(334, 7, 'La Merced'),
(335, 7, 'La Victoria'),
(336, 7, 'Manizales'),
(337, 7, 'Manzanares'),
(338, 7, 'Marmato'),
(339, 7, 'Marquetalia'),
(340, 7, 'Marulanda'),
(341, 7, 'Neira'),
(342, 7, 'Norcasia'),
(343, 7, 'Palestina'),
(344, 7, 'Pensilvania'),
(345, 7, 'Pacora'),
(346, 7, 'Risaralda'),
(347, 7, 'Rio Sucio'),
(348, 7, 'Salamina'),
(349, 7, 'Samana'),
(350, 7, 'San Jose'),
(351, 7, 'Supia'),
(352, 7, 'Villamaria'),
(353, 7, 'Viterbo'),
(354, 8, 'Albania'),
(355, 8, 'Belen de los Andaquies'),
(356, 8, 'Cartagena del Chaira'),
(357, 8, 'Curillo'),
(358, 8, 'El Doncello'),
(359, 8, 'El Paujil'),
(360, 8, 'Florencia'),
(361, 8, 'La Montanita'),
(362, 8, 'Milan'),
(363, 8, 'Morelia'),
(364, 8, 'Puerto Rico'),
(365, 8, 'San Jose del Fragua'),
(366, 8, 'San Vicente del Caguan'),
(367, 8, 'Solano'),
(368, 8, 'Solita'),
(369, 8, 'Valparaiso'),
(370, 9, 'Aguazul'),
(371, 9, 'Chameza'),
(372, 9, 'Hato Corozal'),
(373, 9, 'La Salina'),
(374, 9, 'Mani'),
(375, 9, 'Monterrey'),
(376, 9, 'Nunchia'),
(377, 9, 'Orocue'),
(378, 9, 'Paz de Ariporo'),
(379, 9, 'Pore'),
(380, 9, 'Recetor'),
(381, 9, 'Sabanalarga'),
(382, 9, 'San Luis de Palenque'),
(383, 9, 'Sacama'),
(384, 9, 'Tauramena'),
(385, 9, 'Trinidad'),
(386, 9, 'Tamara'),
(387, 9, 'Villanueva'),
(388, 9, 'Yopal'),
(389, 10, 'Almaguer'),
(390, 10, 'Argelia'),
(391, 10, 'Balboa'),
(392, 10, 'Bolivar'),
(393, 10, 'Buenos Aires'),
(394, 10, 'Cajibio'),
(395, 10, 'Caldono'),
(396, 10, 'Caloto'),
(397, 10, 'Corinto'),
(398, 10, 'El Tambo'),
(399, 10, 'Florencia'),
(400, 10, 'Guachene'),
(401, 10, 'Guapi'),
(402, 10, 'Inza'),
(403, 10, 'Jambalo'),
(404, 10, 'La Sierra'),
(405, 10, 'La Vega'),
(406, 10, 'Lopez (Micay)'),
(407, 10, 'Mercaderes'),
(408, 10, 'Miranda'),
(409, 10, 'Morales'),
(410, 10, 'Padilla'),
(411, 10, 'Patia (El Bordo)'),
(412, 10, 'Piamonte'),
(413, 10, 'Piendamo'),
(414, 10, 'Popayan'),
(415, 10, 'Puerto Tejada'),
(416, 10, 'Purace (Coconuco)'),
(417, 10, 'Paez (Belalcazar)'),
(418, 10, 'Rosas'),
(419, 10, 'San Sebastian'),
(420, 10, 'Santa Rosa'),
(421, 10, 'Santander de Quilichao'),
(422, 10, 'Silvia'),
(423, 10, 'Sotara (Paispamba)'),
(424, 10, 'Sucre'),
(425, 10, 'Suarez'),
(426, 10, 'Timbiqui'),
(427, 10, 'Timbio'),
(428, 10, 'Toribio'),
(429, 10, 'Totoro'),
(430, 10, 'Villa Rica'),
(431, 11, 'Aguachica'),
(432, 11, 'Agustin Codazzi'),
(433, 11, 'Astrea'),
(434, 11, 'Becerril'),
(435, 11, 'Bosconia'),
(436, 11, 'Chimichagua'),
(437, 11, 'Chiriguana'),
(438, 11, 'Curumani'),
(439, 11, 'El Copey'),
(440, 11, 'El Paso'),
(441, 11, 'Gamarra'),
(442, 11, 'Gonzalez'),
(443, 11, 'La Gloria'),
(444, 11, 'La Jagua de Ibirico'),
(445, 11, 'La Paz (Robles)'),
(446, 11, 'Manaure Balcon del Ces'),
(447, 11, 'Pailitas'),
(448, 11, 'Pelaya'),
(449, 11, 'Pueblo Bello'),
(450, 11, 'Rio de oro'),
(451, 11, 'San Alberto'),
(452, 11, 'San Diego'),
(453, 11, 'San Martin'),
(454, 11, 'Tamalameque'),
(455, 11, 'Valledupar'),
(456, 12, 'Acandi'),
(457, 12, 'Alto Baudo (Pie de Pat'),
(458, 12, 'Atrato (Yuto)'),
(459, 12, 'Bagado'),
(460, 12, 'Bahia Solano (Mutis)'),
(461, 12, 'Bajo Baudo (Pizarro)'),
(462, 12, 'Belen de Bajira'),
(463, 12, 'Bojaya (Bellavista)'),
(464, 12, 'Canton de San Pablo'),
(465, 12, 'Carmen del Darien (CUR'),
(466, 12, 'Condoto'),
(467, 12, 'Certegui'),
(468, 12, 'El Carmen de Atrato'),
(469, 12, 'Istmina'),
(470, 12, 'Jurado'),
(471, 12, 'Lloro'),
(472, 12, 'Medio Atrato'),
(473, 12, 'Medio Baudo'),
(474, 12, 'Medio San Juan (ANDAGO'),
(475, 12, 'Novita'),
(476, 12, 'Nuqui'),
(477, 12, 'Quibdo'),
(478, 12, 'Rio Iro'),
(479, 12, 'Rio Quito'),
(480, 12, 'Riosucio'),
(481, 12, 'San Jose del Palmar'),
(482, 12, 'Santa Genoveva de Doco'),
(483, 12, 'Sipi'),
(484, 12, 'Tado'),
(485, 12, 'Unguia'),
(486, 12, 'Union Panamericana (AN'),
(487, 13, 'Ayapel'),
(488, 13, 'Buenavista'),
(489, 13, 'Canalete'),
(490, 13, 'Cerete'),
(491, 13, 'Chima'),
(492, 13, 'Chinu'),
(493, 13, 'Cienaga de Oro'),
(494, 13, 'Cotorra'),
(495, 13, 'La Apartada y La Front'),
(496, 13, 'Lorica'),
(497, 13, 'Los Cordobas'),
(498, 13, 'Momil'),
(499, 13, 'Montelibano'),
(500, 13, 'Monteria'),
(501, 13, 'Monitos'),
(502, 13, 'Planeta Rica'),
(503, 13, 'Pueblo Nuevo'),
(504, 13, 'Puerto Escondido'),
(505, 13, 'Puerto Libertador'),
(506, 13, 'Purisima'),
(507, 13, 'Sahagun'),
(508, 13, 'San Andres Sotavento'),
(509, 13, 'San Antero'),
(510, 13, 'San Bernardo del Vient'),
(511, 13, 'San Carlos'),
(512, 13, 'San Jose de Ure'),
(513, 13, 'San Pelayo'),
(514, 13, 'Tierralta'),
(515, 13, 'Tuchin'),
(516, 13, 'Valencia'),
(517, 14, 'Agua de Dios'),
(518, 14, 'Alban'),
(519, 14, 'Anapoima'),
(520, 14, 'Anolaima'),
(521, 14, 'Apulo'),
(522, 14, 'Arbelaez'),
(523, 14, 'Beltran'),
(524, 14, 'Bituima'),
(525, 14, 'Bogota D.C.'),
(526, 14, 'Bojaca'),
(527, 14, 'Cabrera'),
(528, 14, 'Cachipay'),
(529, 14, 'Cajica'),
(530, 14, 'Caparrapi'),
(531, 14, 'Carmen de Carupa'),
(532, 14, 'Chaguani'),
(533, 14, 'Chipaque'),
(534, 14, 'Choachi'),
(535, 14, 'Choconta'),
(536, 14, 'Chia'),
(537, 14, 'Cogua'),
(538, 14, 'Cota'),
(539, 14, 'Cucunuba'),
(540, 14, 'Caqueza'),
(541, 14, 'El Colegio'),
(542, 14, 'El Penon'),
(543, 14, 'El Rosal'),
(544, 14, 'Facatativa'),
(545, 14, 'Fosca'),
(546, 14, 'Funza'),
(547, 14, 'Fusagasuga'),
(548, 14, 'Fomeque'),
(549, 14, 'Fuquene'),
(550, 14, 'Gachala'),
(551, 14, 'Gachancipa'),
(552, 14, 'Gacheta'),
(553, 14, 'Gama'),
(554, 14, 'Girardot'),
(555, 14, 'Granada'),
(556, 14, 'Guacheta'),
(557, 14, 'Guaduas'),
(558, 14, 'Guasca'),
(559, 14, 'Guataqui'),
(560, 14, 'Guatavita'),
(561, 14, 'Guayabal de Siquima'),
(562, 14, 'Guayabetal'),
(563, 14, 'Gutierrez'),
(564, 14, 'Jerusalen'),
(565, 14, 'Junin'),
(566, 14, 'La Calera'),
(567, 14, 'La Mesa'),
(568, 14, 'La Palma'),
(569, 14, 'La Pena'),
(570, 14, 'La Vega'),
(571, 14, 'Lenguazaque'),
(572, 14, 'Macheta'),
(573, 14, 'Madrid'),
(574, 14, 'Manta'),
(575, 14, 'Medina'),
(576, 14, 'Mosquera'),
(577, 14, 'Narino'),
(578, 14, 'Nemocon'),
(579, 14, 'Nilo'),
(580, 14, 'Nimaima'),
(581, 14, 'Nocaima'),
(582, 14, 'Pacho'),
(583, 14, 'Paime'),
(584, 14, 'Pandi'),
(585, 14, 'Paratebueno'),
(586, 14, 'Pasca'),
(587, 14, 'Puerto Salgar'),
(588, 14, 'Puli'),
(589, 14, 'Quebradanegra'),
(590, 14, 'Quetame'),
(591, 14, 'Quipile'),
(592, 14, 'Ricaurte'),
(593, 14, 'San Antonio de Tequend'),
(594, 14, 'San Bernardo'),
(595, 14, 'San Cayetano'),
(596, 14, 'San Francisco'),
(597, 14, 'San Juan de Rio Seco'),
(598, 14, 'Sasaima'),
(599, 14, 'Sesquile'),
(600, 14, 'Sibate'),
(601, 14, 'Silvania'),
(602, 14, 'Simijaca'),
(603, 14, 'Soacha'),
(604, 14, 'Sopo'),
(605, 14, 'Subachoque'),
(606, 14, 'Suesca'),
(607, 14, 'Supata'),
(608, 14, 'Susa'),
(609, 14, 'Sutatausa'),
(610, 14, 'Tabio'),
(611, 14, 'Tausa'),
(612, 14, 'Tena'),
(613, 14, 'Tenjo'),
(614, 14, 'Tibacuy'),
(615, 14, 'Tibirita'),
(616, 14, 'Tocaima'),
(617, 14, 'Tocancipa'),
(618, 14, 'Topaipi'),
(619, 14, 'Ubala'),
(620, 14, 'Ubaque'),
(621, 14, 'Ubate'),
(622, 14, 'Une'),
(623, 14, 'Venecia (Ospina Perez)'),
(624, 14, 'Vergara'),
(625, 14, 'Viani'),
(626, 14, 'Villagomez'),
(627, 14, 'Villapinzon'),
(628, 14, 'Villeta'),
(629, 14, 'Viota'),
(630, 14, 'Yacopi'),
(631, 14, 'Zipacon'),
(632, 14, 'Zipaquira'),
(633, 14, 'Utica'),
(634, 15, 'Inirida'),
(635, 16, 'Calamar'),
(636, 16, 'El Retorno'),
(637, 16, 'Miraflores'),
(638, 16, 'San Jose del Guaviare'),
(639, 17, 'Acevedo'),
(640, 17, 'Agrado'),
(641, 17, 'Aipe'),
(642, 17, 'Algeciras'),
(643, 17, 'Altamira'),
(644, 17, 'Baraya'),
(645, 17, 'Campoalegre'),
(646, 17, 'Colombia'),
(647, 17, 'Elias'),
(648, 17, 'Garzon'),
(649, 17, 'Gigante'),
(650, 17, 'Guadalupe'),
(651, 17, 'Hobo'),
(652, 17, 'Isnos'),
(653, 17, 'La Argentina'),
(654, 17, 'La Plata'),
(655, 17, 'Neiva'),
(656, 17, 'Nataga'),
(657, 17, 'Oporapa'),
(658, 17, 'Paicol'),
(659, 17, 'Palermo'),
(660, 17, 'Palestina'),
(661, 17, 'Pital'),
(662, 17, 'Pitalito'),
(663, 17, 'Rivera'),
(664, 17, 'Saladoblanco'),
(665, 17, 'San Agustin'),
(666, 17, 'Santa Maria'),
(667, 17, 'Suaza'),
(668, 17, 'Tarqui'),
(669, 17, 'Tello'),
(670, 17, 'Teruel'),
(671, 17, 'Tesalia'),
(672, 17, 'Timana'),
(673, 17, 'Villavieja'),
(674, 17, 'Yaguara'),
(675, 17, 'Iquira'),
(676, 18, 'Albania'),
(677, 18, 'Barrancas'),
(678, 18, 'Dibulla'),
(679, 18, 'Distraccion'),
(680, 18, 'El Molino'),
(681, 18, 'Fonseca'),
(682, 18, 'Hatonuevo'),
(683, 18, 'La Jagua del Pilar'),
(684, 18, 'Maicao'),
(685, 18, 'Manaure'),
(686, 18, 'Riohacha'),
(687, 18, 'San Juan del Cesar'),
(688, 18, 'Uribia'),
(689, 18, 'Urumita'),
(690, 18, 'Villanueva'),
(691, 19, 'Algarrobo'),
(692, 19, 'Aracataca'),
(693, 19, 'Ariguani (El Dificil)'),
(694, 19, 'Cerro San Antonio'),
(695, 19, 'Chivolo'),
(696, 19, 'Cienaga'),
(697, 19, 'Concordia'),
(698, 19, 'El Banco'),
(699, 19, 'El Pinon'),
(700, 19, 'El Reten'),
(701, 19, 'Fundacion'),
(702, 19, 'Guamal'),
(703, 19, 'Nueva Granada'),
(704, 19, 'Pedraza'),
(705, 19, 'Pijino'),
(706, 19, 'Pivijay'),
(707, 19, 'Plato'),
(708, 19, 'Puebloviejo'),
(709, 19, 'Remolino'),
(710, 19, 'Sabanas de San Angel ('),
(711, 19, 'Salamina'),
(712, 19, 'San Sebastian de Buena'),
(713, 19, 'San Zenon'),
(714, 19, 'Santa Ana'),
(715, 19, 'Santa Barbara de Pinto'),
(716, 19, 'Santa Marta'),
(717, 19, 'Sitionuevo'),
(718, 19, 'Tenerife'),
(719, 19, 'Zapayan (PUNTA DE PIED'),
(720, 19, 'Zona Bananera (PRADO -'),
(721, 20, 'Acacias'),
(722, 20, 'Barranca de Upia'),
(723, 20, 'Cabuyaro'),
(724, 20, 'Castilla la Nueva'),
(725, 20, 'Cubarral'),
(726, 20, 'Cumaral'),
(727, 20, 'El Calvario'),
(728, 20, 'El Castillo'),
(729, 20, 'El Dorado'),
(730, 20, 'Fuente de Oro'),
(731, 20, 'Granada'),
(732, 20, 'Guamal'),
(733, 20, 'La Macarena'),
(734, 20, 'Lejanias'),
(735, 20, 'Mapiripan'),
(736, 20, 'Mesetas'),
(737, 20, 'Puerto Concordia'),
(738, 20, 'Puerto Gaitan'),
(739, 20, 'Puerto Lleras'),
(740, 20, 'Puerto Lopez'),
(741, 20, 'Puerto Rico'),
(742, 20, 'Restrepo'),
(743, 20, 'San Carlos de Guaroa'),
(744, 20, 'San Juan de Arama'),
(745, 20, 'San Juanito'),
(746, 20, 'San Martin'),
(747, 20, 'Uribe'),
(748, 20, 'Villavicencio'),
(749, 20, 'Vista Hermosa'),
(750, 21, 'Alban (San Jose)'),
(751, 21, 'Aldana'),
(752, 21, 'Ancuya'),
(753, 21, 'Arboleda (Berruecos)'),
(754, 21, 'Barbacoas'),
(755, 21, 'Belen'),
(756, 21, 'Buesaco'),
(757, 21, 'Chachagui'),
(758, 21, 'Colon (Genova)'),
(759, 21, 'Consaca'),
(760, 21, 'Contadero'),
(761, 21, 'Cuaspud (Carlosama)'),
(762, 21, 'Cumbal'),
(763, 21, 'Cumbitara'),
(764, 21, 'Cordoba'),
(765, 21, 'El Charco'),
(766, 21, 'El Penol'),
(767, 21, 'El Rosario'),
(768, 21, 'El Tablon de Gomez'),
(769, 21, 'El Tambo'),
(770, 21, 'Francisco Pizarro'),
(771, 21, 'Funes'),
(772, 21, 'Guachaves'),
(773, 21, 'Guachucal'),
(774, 21, 'Guaitarilla'),
(775, 21, 'Gualmatan'),
(776, 21, 'Iles'),
(777, 21, 'Imues'),
(778, 21, 'Ipiales'),
(779, 21, 'La Cruz'),
(780, 21, 'La Florida'),
(781, 21, 'La Llanada'),
(782, 21, 'La Tola'),
(783, 21, 'La Union'),
(784, 21, 'Leiva'),
(785, 21, 'Linares'),
(786, 21, 'Magüi (Payan)'),
(787, 21, 'Mallama (Piedrancha)'),
(788, 21, 'Mosquera'),
(789, 21, 'Narino'),
(790, 21, 'Olaya Herrera'),
(791, 21, 'Ospina'),
(792, 21, 'Policarpa'),
(793, 21, 'Potosi'),
(794, 21, 'Providencia'),
(795, 21, 'Puerres'),
(796, 21, 'Pupiales'),
(797, 21, 'Ricaurte'),
(798, 21, 'Roberto Payan (San Jos'),
(799, 21, 'Samaniego'),
(800, 21, 'San Bernardo'),
(801, 21, 'San Juan de Pasto'),
(802, 21, 'San Lorenzo'),
(803, 21, 'San Pablo'),
(804, 21, 'San Pedro de Cartago'),
(805, 21, 'Sandona'),
(806, 21, 'Santa Barbara (Iscuand'),
(807, 21, 'Sapuyes'),
(808, 21, 'Sotomayor (Los Andes)'),
(809, 21, 'Taminango'),
(810, 21, 'Tangua'),
(811, 21, 'Tumaco'),
(812, 21, 'Tuquerres'),
(813, 21, 'Yacuanquer'),
(814, 22, 'Arboledas'),
(815, 22, 'Bochalema'),
(816, 22, 'Bucarasica'),
(817, 22, 'Chinacota'),
(818, 22, 'Chitaga'),
(819, 22, 'Convencion'),
(820, 22, 'Cucutilla'),
(821, 22, 'Cachira'),
(822, 22, 'Cacota'),
(823, 22, 'Cucuta'),
(824, 22, 'Durania'),
(825, 22, 'El Carmen'),
(826, 22, 'El Tarra'),
(827, 22, 'El Zulia'),
(828, 22, 'Gramalote'),
(829, 22, 'Hacari'),
(830, 22, 'Herran'),
(831, 22, 'La Esperanza'),
(832, 22, 'La Playa'),
(833, 22, 'Labateca'),
(834, 22, 'Los Patios'),
(835, 22, 'Lourdes'),
(836, 22, 'Mutiscua'),
(837, 22, 'Ocana'),
(838, 22, 'Pamplona'),
(839, 22, 'Pamplonita'),
(840, 22, 'Puerto Santander'),
(841, 22, 'Ragonvalia'),
(842, 22, 'Salazar'),
(843, 22, 'San Calixto'),
(844, 22, 'San Cayetano'),
(845, 22, 'Santiago'),
(846, 22, 'Sardinata'),
(847, 22, 'Silos'),
(848, 22, 'Teorama'),
(849, 22, 'Tibu'),
(850, 22, 'Toledo'),
(851, 22, 'Villa Caro'),
(852, 22, 'Villa del Rosario'),
(853, 22, 'Abrego'),
(854, 23, 'Colon'),
(855, 23, 'Mocoa'),
(856, 23, 'Orito'),
(857, 23, 'Puerto Asis'),
(858, 23, 'Puerto Caicedo'),
(859, 23, 'Puerto Guzman'),
(860, 23, 'Puerto Leguizamo'),
(861, 23, 'San Francisco'),
(862, 23, 'San Miguel'),
(863, 23, 'Santiago'),
(864, 23, 'Sibundoy'),
(865, 23, 'Valle del Guamuez'),
(866, 23, 'Villagarzon'),
(867, 24, 'Armenia'),
(868, 24, 'Buenavista'),
(869, 24, 'Calarca'),
(870, 24, 'Circasia'),
(871, 24, 'Cordoba'),
(872, 24, 'Filandia'),
(873, 24, 'Genova'),
(874, 24, 'La Tebaida'),
(875, 24, 'Montenegro'),
(876, 24, 'Pijao'),
(877, 24, 'Quimbaya'),
(878, 24, 'Salento'),
(879, 25, 'Apia'),
(880, 25, 'Balboa'),
(881, 25, 'Belen de Umbria'),
(882, 25, 'Dos Quebradas'),
(883, 25, 'Guatica'),
(884, 25, 'La Celia'),
(885, 25, 'La Virginia'),
(886, 25, 'Marsella'),
(887, 25, 'Mistrato'),
(888, 25, 'Pereira'),
(889, 25, 'Pueblo Rico'),
(890, 25, 'Quinchia'),
(891, 25, 'Santa Rosa de Cabal'),
(892, 25, 'Santuario'),
(893, 26, 'Providencia'),
(894, 27, 'Aguada'),
(895, 27, 'Albania'),
(896, 27, 'Aratoca'),
(897, 27, 'Barbosa'),
(898, 27, 'Barichara'),
(899, 27, 'Barrancabermeja'),
(900, 27, 'Betulia'),
(901, 27, 'Bolivar'),
(902, 27, 'Bucaramanga'),
(903, 27, 'Cabrera'),
(904, 27, 'California'),
(905, 27, 'Capitanejo'),
(906, 27, 'Carcasi'),
(907, 27, 'Cepita'),
(908, 27, 'Cerrito'),
(909, 27, 'Charala'),
(910, 27, 'Charta'),
(911, 27, 'Chima'),
(912, 27, 'Chipata'),
(913, 27, 'Cimitarra'),
(914, 27, 'Concepcion'),
(915, 27, 'Confines'),
(916, 27, 'Contratacion'),
(917, 27, 'Coromoro'),
(918, 27, 'Curiti'),
(919, 27, 'El Carmen'),
(920, 27, 'El Guacamayo'),
(921, 27, 'El Penon'),
(922, 27, 'El Playon'),
(923, 27, 'Encino'),
(924, 27, 'Enciso'),
(925, 27, 'Floridablanca'),
(926, 27, 'Florian'),
(927, 27, 'Galan'),
(928, 27, 'Giron'),
(929, 27, 'Guaca'),
(930, 27, 'Guadalupe'),
(931, 27, 'Guapota'),
(932, 27, 'Guavata'),
(933, 27, 'Guepsa'),
(934, 27, 'Gambita'),
(935, 27, 'Hato'),
(936, 27, 'Jesus Maria'),
(937, 27, 'Jordan'),
(938, 27, 'La Belleza'),
(939, 27, 'La Paz'),
(940, 27, 'Landazuri'),
(941, 27, 'Lebrija'),
(942, 27, 'Los Santos'),
(943, 27, 'Macaravita'),
(944, 27, 'Matanza'),
(945, 27, 'Mogotes'),
(946, 27, 'Molagavita'),
(947, 27, 'Malaga'),
(948, 27, 'Ocamonte'),
(949, 27, 'Oiba'),
(950, 27, 'Onzaga'),
(951, 27, 'Palmar'),
(952, 27, 'Palmas del Socorro'),
(953, 27, 'Pie de Cuesta'),
(954, 27, 'Pinchote'),
(955, 27, 'Puente Nacional'),
(956, 27, 'Puerto Parra'),
(957, 27, 'Puerto Wilches'),
(958, 27, 'Paramo'),
(959, 27, 'Rio Negro'),
(960, 27, 'Sabana de Torres'),
(961, 27, 'San Andres'),
(962, 27, 'San Benito'),
(963, 27, 'San Gil'),
(964, 27, 'San Joaquin'),
(965, 27, 'San Jose de Miranda'),
(966, 27, 'San Miguel'),
(967, 27, 'San Vicente del Chucur'),
(968, 27, 'Santa Barbara'),
(969, 27, 'Santa Helena del Opon'),
(970, 27, 'Simacota'),
(971, 27, 'Socorro'),
(972, 27, 'Suaita'),
(973, 27, 'Sucre'),
(974, 27, 'Surata'),
(975, 27, 'Tona'),
(976, 27, 'Valle de San Jose'),
(977, 27, 'Vetas'),
(978, 27, 'Villanueva'),
(979, 27, 'Velez'),
(980, 27, 'Zapatoca'),
(981, 28, 'Buenavista'),
(982, 28, 'Caimito'),
(983, 28, 'Chalan'),
(984, 28, 'Coloso (Ricaurte)'),
(985, 28, 'Corozal'),
(986, 28, 'Covenas'),
(987, 28, 'El Roble'),
(988, 28, 'Galeras (Nueva Granada'),
(989, 28, 'Guaranda'),
(990, 28, 'La Union'),
(991, 28, 'Los Palmitos'),
(992, 28, 'Majagual'),
(993, 28, 'Morroa'),
(994, 28, 'Ovejas'),
(995, 28, 'Palmito'),
(996, 28, 'Sampues'),
(997, 28, 'San Benito Abad'),
(998, 28, 'San Juan de Betulia'),
(999, 28, 'San Marcos'),
(1000, 28, 'San Onofre'),
(1001, 28, 'San Pedro'),
(1002, 28, 'Sincelejo'),
(1003, 28, 'Since'),
(1004, 28, 'Sucre'),
(1005, 28, 'Tolu'),
(1006, 28, 'Tolu Viejo'),
(1007, 29, 'Alpujarra'),
(1008, 29, 'Alvarado'),
(1009, 29, 'Ambalema'),
(1010, 29, 'Anzoategui'),
(1011, 29, 'Armero (Guayabal)'),
(1012, 29, 'Ataco'),
(1013, 29, 'Cajamarca'),
(1014, 29, 'Carmen de Apicala'),
(1015, 29, 'Casabianca'),
(1016, 29, 'Chaparral'),
(1017, 29, 'Coello'),
(1018, 29, 'Coyaima'),
(1019, 29, 'Cunday'),
(1020, 29, 'Dolores'),
(1021, 29, 'Espinal'),
(1022, 29, 'Falan'),
(1023, 29, 'Flandes'),
(1024, 29, 'Fresno'),
(1025, 29, 'Guamo'),
(1026, 29, 'Herveo'),
(1027, 29, 'Honda'),
(1028, 29, 'Ibague'),
(1029, 29, 'Icononzo'),
(1030, 29, 'Lerida'),
(1031, 29, 'Libano'),
(1032, 29, 'Mariquita'),
(1033, 29, 'Melgar'),
(1034, 29, 'Murillo'),
(1035, 29, 'Natagaima'),
(1036, 29, 'Ortega'),
(1037, 29, 'Palocabildo'),
(1038, 29, 'Piedras'),
(1039, 29, 'Planadas'),
(1040, 29, 'Prado'),
(1041, 29, 'Purificacion'),
(1042, 29, 'Rioblanco'),
(1043, 29, 'Roncesvalles'),
(1044, 29, 'Rovira'),
(1045, 29, 'Saldana'),
(1046, 29, 'San Antonio'),
(1047, 29, 'San Luis'),
(1048, 29, 'Santa Isabel'),
(1049, 29, 'Suarez'),
(1050, 29, 'Valle de San Juan'),
(1051, 29, 'Venadillo'),
(1052, 29, 'Villahermosa'),
(1053, 29, 'Villarrica'),
(1054, 30, 'Alcala'),
(1055, 30, 'Andalucia'),
(1056, 30, 'Ansermanuevo'),
(1057, 30, 'Argelia'),
(1058, 30, 'Bolivar'),
(1059, 30, 'Buenaventura'),
(1060, 30, 'Buga'),
(1061, 30, 'Bugalagrande'),
(1062, 30, 'Caicedonia'),
(1063, 30, 'Calima (Darien)'),
(1064, 30, 'Cali'),
(1065, 30, 'Candelaria'),
(1066, 30, 'Cartago'),
(1067, 30, 'Dagua'),
(1068, 30, 'El Cairo'),
(1069, 30, 'El Cerrito'),
(1070, 30, 'El Dovio'),
(1071, 30, 'El Aguila'),
(1072, 30, 'Florida'),
(1073, 30, 'Ginebra'),
(1074, 30, 'Guacari'),
(1075, 30, 'Jamundi'),
(1076, 30, 'La Cumbre'),
(1077, 30, 'La Union'),
(1078, 30, 'La Victoria'),
(1079, 30, 'Obando'),
(1080, 30, 'Palmira'),
(1081, 30, 'Pradera'),
(1082, 30, 'Restrepo'),
(1083, 30, 'Riofrio'),
(1084, 30, 'Roldanillo'),
(1085, 30, 'San Pedro'),
(1086, 30, 'Sevilla'),
(1087, 30, 'Toro'),
(1088, 30, 'Trujillo'),
(1089, 30, 'Tulua'),
(1090, 30, 'Ulloa'),
(1091, 30, 'Versalles'),
(1092, 30, 'Vijes'),
(1093, 30, 'Yotoco'),
(1094, 30, 'Yumbo'),
(1095, 30, 'Zarzal'),
(1096, 31, 'Caruru'),
(1097, 31, 'Mitu'),
(1098, 31, 'Taraira'),
(1099, 32, 'Cumaribo'),
(1100, 32, 'La Primavera'),
(1101, 32, 'Puerto Carreno'),
(1102, 32, 'Santa Rosalia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`idNoticia` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `contenido`) VALUES
(-1, 'comision', '10'),
(1, '¿Quiénes somos?', 'El Centro de Desarrollo Artesanal Manos de Oro PopayÃ¡n  pertenece a la Junta Pro â€“ Semana Santa de PopayÃ¡n, es una entidad sin Ã¡nimo de lucro que vela continuamente por mantener el arte, las tradiciones y la cultura en nuestra comunidad. El CDA (Centro de Desarrollo Artesanal) Manos de Oro es un programa abierto a todos los artesanos del Cauca y pretende contribuir al mejoramiento integral del sector artesanal estimulando la creatividad, el desarrollo profesional y el amor por nuestra cultura.'),
(2, 'Misión', 'Impulsar el sector artesanal caucano, a travÃ©s del perfeccionamiento del recurso humano, preservando el patrimonio cultural tangible e intangible de nuestra regiÃ³n garantizando la sostenibilidad y conservaciÃ³n del medio ambiente.'),
(3, 'Visión', 'Manos de oro en el 2015 serÃ¡ un centro promotor y de desarrollo del sector artesanal Caucano, posicionado a nivel nacional e internacional. AsÃ­ mismo incentivarÃ¡ el  empresarismo artesanal en la regiÃ³n, la defensa y conservaciÃ³n de nuestra riqueza cultural y nuestras tradiciones.'),
(6, 'En pleno el XIII Congreso GastronÃ³mico de PopayÃ¡n', 'La mesa estÃ¡ servida,  propios y visitantes; disfrutan de los  dÃ­as mÃ¡s deliciosos, en el evento de gastronomÃ­a mÃ¡s importante del paÃ­s.  El XIII Congreso de PopayÃ¡n, reÃºne como en todas sus versiones como bien lo menciona en su escrito â€œDonde el fogÃ³n es el centro de la culturaâ€ el doctor Ãlvaro GarzÃ³n miembro de la Junta directiva; a gastrÃ³nomos, intelectuales, investigadores, industriales, chef, estudiantes y a la ciudadanÃ­a de la capital caucana. AÃ±o tras aÃ±o, los asistentes tienen la oportunidad de degustar exquisitos platos regionales e internacionales y este 2015 no podrÃ­a ser la excepciÃ³n, para quienes viven la experiencia podrÃ­an contarla incansablemente ya que se trata nada mÃ¡s y nada menos de la cultura intangible de los pueblos: su gastronomÃ­a.'),
(7, 'En pleno el XIII Congreso GastronÃ³mico de PopayÃ¡n', 'La mesa estÃ¡ servida, propios y visitantes; disfrutan de los dÃ­as mÃ¡s deliciosos, en el evento de gastronomÃ­a mÃ¡s importante del paÃ­s. El XIII Congreso de PopayÃ¡n, reÃºne como en todas sus versiones como bien lo menciona en su escrito â€œDonde el fogÃ³n es el centro de la culturaâ€ el doctor Ãlvaro GarzÃ³n miembro de la Junta directiva; a gastrÃ³nomos, intelectuales, investigadores, industriales, chef, estudiantes y a la ciudadanÃ­a de la capital caucana. AÃ±o tras aÃ±o, los asistentes tienen la oportunidad de degustar exquisitos platos regionales e internacionales y este 2015 no podrÃ­a ser la excepciÃ³n, para quienes viven la experiencia podrÃ­an contarla incansablemente ya que se trata nada mÃ¡s y nada menos de la cultura intangible de los pueblos: su gastronomÃ­a.'),
(8, 'Festival Gastronomico Valle del Cauca', 'ContÃ¡ctenos PolicÃ­a Nacional de Colombia  DirecciÃ³n de Bienestar Social Centro Social de Agentes y Patrulleros PBX: (57 + 1) 605 44 47'),
(9, 'PASEO DOMINICAL POR EL CAMINO ARTESANAL', 'Era un plan para curiosos, para desprogramados o para que la familia reunida saliera y se fuera a buscar desde un algodÃ³n de azÃºcar hasta una chaqueta de cuero.  Hoy en dÃ­a esa modalidad se cambiÃ³: las anunciadas ferias de calle desaparecieron. Ahora los artesanos se han localizado en lugares fijos a manera de pequeÃ±os centros comerciales artesanales.  Por ejemplo, hoy usted puede encontrar cinco centros artesanales de este tipo a lo largo de la carrera sÃ©ptima, entre las calles 12 y 26; uno mÃ¡s en Cedritos y dos mercados de San Pelayo, uno totalmente artesanal en UsaquÃ©n.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
`idPerfil` int(11) NOT NULL,
  `nomPerfil` varchar(100) NOT NULL,
  `valorPerfil` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomPerfil`, `valorPerfil`) VALUES
(3, 'Perfil de prueba', 22),
(4, 'perfil_nuevo', 26),
(5, 'perfil_perfil', 33),
(6, 'carntanta', 18),
(7, 'secretario', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idproducto` int(11) NOT NULL,
  `nombproducto` varchar(300) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_bin NOT NULL,
  `link` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `idartesano` int(11) NOT NULL,
  `aceptado` tinyint(4) NOT NULL,
  `empresa` varchar(150) COLLATE utf8_bin NOT NULL,
  `nroenvio` varchar(30) COLLATE utf8_bin NOT NULL,
  `notificado` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `ventas` int(11) DEFAULT NULL,
  `formatofoto` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL DEFAULT '0',
  `mostrar` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comision` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombproducto`, `descripcion`, `link`, `idartesano`, `aceptado`, `empresa`, `nroenvio`, `notificado`, `stock`, `ventas`, `formatofoto`, `precio`, `mostrar`, `fecha`, `comision`) VALUES
(53, 'Manillas hermosas divinas', 'Manillas', '', 60, 2, 'Deprisa', '123', 1, 17, 8, 1, 7500, 1, '0000-00-00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
`idSolicitud` int(11) NOT NULL,
  `idArtesano` int(11) NOT NULL,
  `idStand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stand`
--

CREATE TABLE IF NOT EXISTS `stand` (
`idStand` int(11) NOT NULL,
  `idArtesano` int(11) DEFAULT NULL,
  `reservado` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `stand`
--

INSERT INTO `stand` (`idStand`, `idArtesano`, `reservado`) VALUES
(1, 48, 1),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 49, 1),
(12, 0, 0),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0),
(16, 0, 0),
(17, 0, 0),
(18, 0, 0),
(19, 0, 0),
(20, 53, 1),
(21, 54, 1),
(22, 0, 0),
(23, 0, 0),
(24, 0, 0),
(25, 0, 0),
(26, 0, 0),
(27, 0, 0),
(28, 0, 0),
(29, 0, 0),
(30, 0, 0),
(31, 0, 0),
(32, 0, 0),
(33, 0, 0),
(34, 0, 0),
(35, 0, 0),
(36, 0, 0),
(37, 0, 0),
(38, 0, 0),
(39, 0, 0),
(40, 0, 0),
(41, 0, 0),
(42, 0, 0),
(43, 0, 0),
(44, 0, 0),
(45, 0, 0),
(46, 0, 0),
(47, 0, 0),
(48, 0, 0),
(49, 0, 0),
(50, 0, 0),
(51, 0, 0),
(52, 0, 0),
(53, 0, 0),
(54, 0, 0),
(55, 0, 0),
(56, 0, 0),
(57, 0, 0),
(58, 0, 0),
(59, 0, 0),
(60, 0, 0),
(61, 45, 1),
(62, 0, 0),
(63, 0, 0),
(64, 0, 0),
(65, 0, 0),
(66, 0, 0),
(67, 0, 0),
(68, 0, 0),
(69, 0, 0),
(70, 46, 1),
(71, 0, 0),
(72, 0, 0),
(73, 0, 0),
(74, 0, 0),
(75, 0, 0),
(76, 0, 0),
(77, 0, 0),
(78, 0, 0),
(79, 0, 0),
(80, 0, 0),
(81, 0, 0),
(82, 0, 0),
(83, 0, 0),
(84, 0, 0),
(85, 0, 0),
(86, 0, 0),
(87, 0, 0),
(88, 0, 0),
(89, 0, 0),
(90, 0, 0),
(91, 0, 0),
(92, 0, 0),
(93, 0, 0),
(94, 0, 0),
(95, 0, 0),
(96, 0, 0),
(97, 0, 0),
(98, 0, 0),
(99, 0, 0),
(100, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nroProductosVendidos` int(11) NOT NULL,
  `comision` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `idProducto`, `fecha`, `nroProductosVendidos`, `comision`) VALUES
(1, 53, '2015-09-16', 2, 10),
(2, 53, '2015-10-16', 4, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `artesano`
--
ALTER TABLE `artesano`
 ADD PRIMARY KEY (`idArtesano`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idproducto`), ADD KEY `foreignkey` (`idartesano`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
 ADD PRIMARY KEY (`idSolicitud`);

--
-- Indices de la tabla `stand`
--
ALTER TABLE `stand`
 ADD PRIMARY KEY (`idStand`), ADD KEY `idArtesano` (`idArtesano`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`idVenta`), ADD KEY `fkeyIndex` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `artesano`
--
ALTER TABLE `artesano`
MODIFY `idArtesano` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stand`
--
ALTER TABLE `stand`
MODIFY `idStand` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idartesano`) REFERENCES `artesano` (`idArtesano`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
