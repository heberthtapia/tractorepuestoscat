-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-07-2017 a las 03:17:28
-- Versión del servidor: 5.6.35
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_img`
--

CREATE TABLE IF NOT EXISTS `aux_img` (
  `id_img` int(10) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(20) NOT NULL,
  `depa` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apP` varchar(50) NOT NULL,
  `apM` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `dateNac` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `coorX` varchar(200) NOT NULL,
  `coorY` varchar(200) NOT NULL,
  `obser` varchar(500) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `dateReg` datetime NOT NULL,
  `statusEmp` enum('Activo','Inactivo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `depa`, `nombre`, `apP`, `apM`, `foto`, `dateNac`, `phone`, `celular`, `direccion`, `numero`, `email`, `coorX`, `coorY`, `obser`, `cargo`, `dateReg`, `statusEmp`) VALUES
(123456, 'lp', 'Heberth', 'tapia', 'andrade', '0e6770d5031ff78cd9757c0d1b588307.jpg', '1981-10-17', '', '77237022', 'El alto, rio seco', 113, 'ht.heberth@gmail.com', '-16.494655191364537', ' -68.21745872497559', 'ninguna observacion', 'adm', '0000-00-00 00:00:00', 'Activo'),
(456789, 'lp', 'Nacho', 'lopez', 'lopez', 'fa21fe91aeac4e9ed41e927845762ba1.jpg', '1982-07-08', '', '78878989', 'villa copacabana', 233, 'nacho@gmail.com', '-16.49562219520584', ' -68.11637163162231', 'ninguna observacion', 'ope', '2017-07-26 20:25:07', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `from` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `precio` float(15,2) NOT NULL,
  `dateReg` datetime NOT NULL,
  `status` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(20) NOT NULL,
  `id_empleado` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `timeReg` int(100) NOT NULL,
  `status` enum('Inactivo','Activo') NOT NULL DEFAULT 'Activo'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_empleado`, `user`, `pass`, `timeReg`, `status`) VALUES
(1, 123456, 'admin', 'admin', 1501091560, 'Inactivo'),
(2, 456789, 'nacho', 'nacho', 0, 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aux_img`
--
ALTER TABLE `aux_img`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aux_img`
--
ALTER TABLE `aux_img`
  MODIFY `id_img` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
