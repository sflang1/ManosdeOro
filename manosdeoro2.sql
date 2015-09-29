-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2015 a las 17:18:02
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `manosdeoro2`
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
  `formatofoto` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `artesano`
--

INSERT INTO `artesano` (`idArtesano`, `TipoDoc`, `NroDoc`, `password`, `direccion`, `telefono`, `telefono2`, `username`, `estado`, `nombre`, `celular`, `email`, `certificacion`, `nivelestudio`, `aprendices`, `cursos`, `formatofoto`) VALUES
(48, 0, '1234567', '321', 'Calle 3b', '203403', '203004', '1234567', 2, 'alan   bito ', '3132223454', 'alambrito@hotmail.com', 0, 0, '', '', 1),
(49, 0, '123456', '123', 'calle c', '', '', '123456', 2, 'jose  enao ', '3139999999', 'j@gmail.com', 0, 2, '', '', 1),
(50, 0, '2', '2', 'qweq', '123234', '24', '2', 2, 'qwe qew qe lkm', '3453', 'sew@hom.com', 0, 0, '', '', 1),
(51, 0, '39243', 'cc', 'dad', '394', '0934', '39243', 2, 'glfdmg lmdffgl lmds lmlsd', '342', 'mfsdmklmds@dffd.com', 0, 0, '', '', 1),
(52, 0, '590i490', 'skmfls', 'skmkl', '30909543', '34092', '590i490', 2, 'trokyr kreot msdfs lms', '2348209024', 'snkfwlem@dl.com', 0, 0, '', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `foto`, `descripcion`, `fecha_lim`, `horario`) VALUES
(3, 'fotoCursoMadera.jpg', 'Camisas', '2015-09-30', '8 - 10 am');

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
('Camisas', 'qwe qew qe lkm', 2, 'sew@hom.com', 0, 'qweq', 'popayan');

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
(-1, 'comision', '61'),
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
  `mostrar` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombproducto`, `descripcion`, `link`, `idartesano`, `aceptado`, `empresa`, `nroenvio`, `notificado`, `stock`, `ventas`, `formatofoto`, `precio`, `mostrar`) VALUES
(39, 'Anillos hechos en alum', 'Anillos', 'http://www.anillos.com', 48, 2, 'servientrega', '123456', 1, 1, 12, 1, 2200, 1),
(40, 'jarrones', 'hechos en vidrio', 'http://www.jarrones.com', 49, 2, 'envia', '1234566', 0, 13, 0, 1, 1000000, 1),
(41, '', 'anillos', '', 48, 2, 'enviaa', '12345666', 1, 6, 0, 1, 1150, 1),
(42, '', 'manjar', '', 48, 2, 'envia', '123456778', 1, 3, 0, 1, 150, 1),
(43, 'lsad', 'cmvcl', 'https://www.google.com.co/?gws_rd=ssl', 50, 2, 'dlsmsfa', '98332', 1, 123, 0, 1, 100, 1),
(44, 'jarron hecho en barro ', 'jarron', '', 51, 2, 'wqoeji', 'q232', 0, 3212, 0, 1, 150, 1),
(45, 'caballos hechos con palo para niños y tiene cuero', 'caballos', 'https://www.google.com.co/?gws_rd=ssl', 52, 2, 'mwerkelw', '23048', 0, 324, 0, 1, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
`idSolicitud` int(11) NOT NULL,
  `idArtesano` int(11) NOT NULL,
  `idStand` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `idArtesano`, `idStand`) VALUES
(1, 45, 61),
(2, 48, 1);

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
(1, 0, 0),
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
(20, 0, 0),
(21, 0, 0),
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
(61, 0, 0),
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
MODIFY `idArtesano` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
