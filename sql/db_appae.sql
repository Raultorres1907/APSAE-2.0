-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2017 a las 03:00:10
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_appae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templeado`
--

CREATE TABLE `templeado` (
  `idtempleado` int(11) NOT NULL,
  `nombre_emp` varchar(45) NOT NULL,
  `apellido_emp` varchar(45) NOT NULL,
  `estatus_emp` tinyint(1) NOT NULL,
  `correo_emp` varchar(45) NOT NULL,
  `cargo_emp` varchar(45) NOT NULL,
  `idtinstitucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `templeado`
--

INSERT INTO `templeado` (`idtempleado`, `nombre_emp`, `apellido_emp`, `estatus_emp`, `correo_emp`, `cargo_emp`, `idtinstitucion`) VALUES
(26035677, 'Raul', 'Torres', 1, 'raultorres1907@hotmail.com', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testado`
--

CREATE TABLE `testado` (
  `idtestado` int(11) NOT NULL,
  `nombre_est` varchar(45) NOT NULL,
  `estatus_est` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `testado`
--

INSERT INTO `testado` (`idtestado`, `nombre_est`, `estatus_est`) VALUES
(1, 'Portuguesa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstitucion`
--

CREATE TABLE `tinstitucion` (
  `idtinstitucion` int(11) NOT NULL,
  `nombre_inst` varchar(45) NOT NULL,
  `estatus_ins` tinyint(1) NOT NULL,
  `idtmunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tinstitucion`
--

INSERT INTO `tinstitucion` (`idtinstitucion`, `nombre_inst`, `estatus_ins`, `idtmunicipio`) VALUES
(1, 'E.B Los Cortijos', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmenu`
--

CREATE TABLE `tmenu` (
  `idtmenu` int(11) NOT NULL,
  `nombre_me` char(255) NOT NULL,
  `estatus_me` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmenu`
--

INSERT INTO `tmenu` (`idtmenu`, `nombre_me`, `estatus_me`) VALUES
(1, 'Pan con queso', 1),
(2, 'Pan con carne', 1),
(3, 'caraota con yuca', 1),
(4, 'probando', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmenudetalle`
--

CREATE TABLE `tmenudetalle` (
  `idtmenudetalle` int(11) NOT NULL,
  `idtproducto` int(11) NOT NULL,
  `proporcion_menu` varchar(45) NOT NULL,
  `idtmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmenudetalle`
--

INSERT INTO `tmenudetalle` (`idtmenudetalle`, `idtproducto`, `proporcion_menu`, `idtmenu`) VALUES
(59, 96, '100', 1),
(60, 96, '200', 1),
(61, 95, '100', 1),
(62, 93, '123', 1),
(63, 93, '11', 2),
(64, 95, '123', 2),
(65, 95, '30', 3),
(66, 93, '155', 3),
(72, 94, '12', 4),
(73, 94, '12', 4),
(74, 99, '12', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmovimiento`
--

CREATE TABLE `tmovimiento` (
  `idtmovimiento` int(11) NOT NULL,
  `tipo_mov` varchar(45) NOT NULL,
  `fecha_mov` date NOT NULL,
  `idtempleado` int(11) NOT NULL,
  `concepto_mov` varchar(45) NOT NULL,
  `cantpersona_mov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmovimiento`
--

INSERT INTO `tmovimiento` (`idtmovimiento`, `tipo_mov`, `fecha_mov`, `idtempleado`, `concepto_mov`, `cantpersona_mov`) VALUES
(168, 'Entrada', '2017-02-22', 26035677, '', 0),
(169, 'Entrada', '2017-02-22', 26035677, 'llega comida del mercal', 0),
(170, 'Entrada', '2017-02-22', 26035677, 'llega comida del mercal', 0),
(171, 'Entrada', '2017-02-22', 26035677, 'llega comida del mercal', 0),
(172, 'Entrada', '2017-02-27', 26035677, 'Regalo', 0),
(173, 'Salida', '2017-02-28', 26035677, 'regalo', 0),
(174, 'Salida', '2017-02-28', 26035677, 'aja', 0),
(175, 'Entrada', '2017-03-06', 26035677, 'Regalo', 0),
(176, 'Entrada', '2017-03-06', 26035677, 'Regalo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmunicipio`
--

CREATE TABLE `tmunicipio` (
  `idtmunicipio` int(11) NOT NULL,
  `nombre_mun` varchar(45) NOT NULL,
  `estatus_mun` tinyint(1) NOT NULL,
  `idtestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tmunicipio`
--

INSERT INTO `tmunicipio` (`idtmunicipio`, `nombre_mun`, `estatus_mun`, `idtestado`) VALUES
(1, 'Paez', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE `tproducto` (
  `idtproducto` int(11) NOT NULL,
  `nombre_pro` varchar(45) NOT NULL,
  `existencia_pro` int(11) NOT NULL,
  `estatus_pro` tinyint(1) NOT NULL,
  `idttipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tproducto`
--

INSERT INTO `tproducto` (`idtproducto`, `nombre_pro`, `existencia_pro`, `estatus_pro`, `idttipo`) VALUES
(93, 'caraota', 14000, 1, 63),
(94, 'frijoles', 34000, 0, 63),
(95, 'cebolla', 21000, 0, 61),
(96, 'sardinas', 43000, 0, 65),
(97, 'yuca', 113000, 0, 64),
(98, 'pen', 14000, 0, 63),
(99, 'funciona', 1212000, 1, 63),
(100, 'guayaba', 19000, 1, 62),
(101, 'mango', 14000, 1, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsustituto`
--

CREATE TABLE `tsustituto` (
  `idtsustituto` int(11) NOT NULL,
  `ingrediente_sus` varchar(45) NOT NULL,
  `ingredienteII_sus` varchar(45) NOT NULL,
  `estatus_sus` tinyint(1) NOT NULL,
  `idtproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo`
--

CREATE TABLE `ttipo` (
  `idttipo` int(11) NOT NULL,
  `categoria_tipo` varchar(45) NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ttipo`
--

INSERT INTO `ttipo` (`idttipo`, `categoria_tipo`, `estatus`) VALUES
(61, 'Verduras', 0),
(62, 'Frutas', 1),
(63, 'Leguminosa', 1),
(64, 'Tuberculo', 0),
(65, 'Pescados', 1),
(66, 'probando', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `idtusuario` int(11) NOT NULL,
  `login_usu` varchar(45) NOT NULL,
  `clave_usu` varchar(45) NOT NULL,
  `pregunta_usu` char(255) NOT NULL,
  `respuesta_usu` varchar(45) NOT NULL,
  `idtempleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idtusuario`, `login_usu`, `clave_usu`, `pregunta_usu`, `respuesta_usu`, `idtempleado`) VALUES
(12, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '¿Que tocas?', 'Guitarra', 26035677);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_mov_detalle`
--

CREATE TABLE `t_mov_detalle` (
  `idt_mov_detalle` int(11) NOT NULL,
  `idtproducto` int(11) NOT NULL,
  `gramaje_total` float NOT NULL,
  `idtmovimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_mov_detalle`
--

INSERT INTO `t_mov_detalle` (`idt_mov_detalle`, `idtproducto`, `gramaje_total`, `idtmovimiento`) VALUES
(1, 98, 11, 173),
(2, 99, 145, 174),
(3, 100, 0, 175),
(4, 101, 0, 176);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `templeado`
--
ALTER TABLE `templeado`
  ADD PRIMARY KEY (`idtempleado`),
  ADD KEY `fk_templeado_tinstitucion1_idx` (`idtinstitucion`);

--
-- Indices de la tabla `testado`
--
ALTER TABLE `testado`
  ADD PRIMARY KEY (`idtestado`);

--
-- Indices de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  ADD PRIMARY KEY (`idtinstitucion`),
  ADD KEY `fk_tinstitucion_tmunicipio1_idx` (`idtmunicipio`);

--
-- Indices de la tabla `tmenu`
--
ALTER TABLE `tmenu`
  ADD PRIMARY KEY (`idtmenu`);

--
-- Indices de la tabla `tmenudetalle`
--
ALTER TABLE `tmenudetalle`
  ADD PRIMARY KEY (`idtmenudetalle`),
  ADD KEY `fk_tmenu_detalle_tmenu1_idx` (`idtmenu`),
  ADD KEY `fk_tmenudetalle_tproducto1_idx` (`idtproducto`);

--
-- Indices de la tabla `tmovimiento`
--
ALTER TABLE `tmovimiento`
  ADD PRIMARY KEY (`idtmovimiento`),
  ADD KEY `fk_tmovimiento_templeado1_idx` (`idtempleado`);

--
-- Indices de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD PRIMARY KEY (`idtmunicipio`),
  ADD KEY `fk_tmunicipio_testado1_idx` (`idtestado`);

--
-- Indices de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD PRIMARY KEY (`idtproducto`),
  ADD KEY `fk_tproducto_ttipo1_idx` (`idttipo`);

--
-- Indices de la tabla `tsustituto`
--
ALTER TABLE `tsustituto`
  ADD PRIMARY KEY (`idtsustituto`),
  ADD KEY `fk_tsustituto_tproducto1_idx` (`idtproducto`);

--
-- Indices de la tabla `ttipo`
--
ALTER TABLE `ttipo`
  ADD PRIMARY KEY (`idttipo`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`idtusuario`),
  ADD KEY `fk_tusuario_templeado1_idx` (`idtempleado`);

--
-- Indices de la tabla `t_mov_detalle`
--
ALTER TABLE `t_mov_detalle`
  ADD PRIMARY KEY (`idt_mov_detalle`),
  ADD KEY `fk_t_mov_detalle_tproducto1_idx` (`idtproducto`),
  ADD KEY `fk_t_mov_detalle_tmovimiento1_idx` (`idtmovimiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `testado`
--
ALTER TABLE `testado`
  MODIFY `idtestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  MODIFY `idtinstitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tmenu`
--
ALTER TABLE `tmenu`
  MODIFY `idtmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tmenudetalle`
--
ALTER TABLE `tmenudetalle`
  MODIFY `idtmenudetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `tmovimiento`
--
ALTER TABLE `tmovimiento`
  MODIFY `idtmovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT de la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  MODIFY `idtmunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tproducto`
--
ALTER TABLE `tproducto`
  MODIFY `idtproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT de la tabla `tsustituto`
--
ALTER TABLE `tsustituto`
  MODIFY `idtsustituto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ttipo`
--
ALTER TABLE `ttipo`
  MODIFY `idttipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `idtusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `t_mov_detalle`
--
ALTER TABLE `t_mov_detalle`
  MODIFY `idt_mov_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `templeado`
--
ALTER TABLE `templeado`
  ADD CONSTRAINT `fk_templeado_tinstitucion1` FOREIGN KEY (`idtinstitucion`) REFERENCES `tinstitucion` (`idtinstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tinstitucion`
--
ALTER TABLE `tinstitucion`
  ADD CONSTRAINT `fk_tinstitucion_tmunicipio1` FOREIGN KEY (`idtmunicipio`) REFERENCES `tmunicipio` (`idtmunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tmenudetalle`
--
ALTER TABLE `tmenudetalle`
  ADD CONSTRAINT `fk_tmenu_detalle_tmenu1` FOREIGN KEY (`idtmenu`) REFERENCES `tmenu` (`idtmenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tmenudetalle_tproducto1` FOREIGN KEY (`idtproducto`) REFERENCES `tproducto` (`idtproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tmovimiento`
--
ALTER TABLE `tmovimiento`
  ADD CONSTRAINT `fk_tmovimiento_templeado1` FOREIGN KEY (`idtempleado`) REFERENCES `templeado` (`idtempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tmunicipio`
--
ALTER TABLE `tmunicipio`
  ADD CONSTRAINT `fk_tmunicipio_testado1` FOREIGN KEY (`idtestado`) REFERENCES `testado` (`idtestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD CONSTRAINT `fk_tproducto_ttipo1` FOREIGN KEY (`idttipo`) REFERENCES `ttipo` (`idttipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tsustituto`
--
ALTER TABLE `tsustituto`
  ADD CONSTRAINT `fk_tsustituto_tproducto1` FOREIGN KEY (`idtproducto`) REFERENCES `tproducto` (`idtproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `fk_tusuario_templeado1` FOREIGN KEY (`idtempleado`) REFERENCES `templeado` (`idtempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_mov_detalle`
--
ALTER TABLE `t_mov_detalle`
  ADD CONSTRAINT `fk_t_mov_detalle_tmovimiento1` FOREIGN KEY (`idtmovimiento`) REFERENCES `tmovimiento` (`idtmovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_t_mov_detalle_tproducto1` FOREIGN KEY (`idtproducto`) REFERENCES `tproducto` (`idtproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
