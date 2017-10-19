-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2017 a las 12:52:39
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `humangut`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familytool`
--

CREATE TABLE IF NOT EXISTS `familytool` (
  `idFamilyTool` int(12) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `idInfo` int(12) NOT NULL,
  `tool` varchar(500) DEFAULT NULL,
  `publicPrivate` varchar(50) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `osInfrastructure` varchar(256) DEFAULT NULL,
  `inputs` varchar(256) DEFAULT NULL,
  `outputs` varchar(256) DEFAULT NULL,
  `mainFeatures` varchar(256) DEFAULT NULL,
  `purpose` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `familyFK` int(12) NOT NULL,
  `revised` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2822 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositories`
--

CREATE TABLE IF NOT EXISTS `repositories` (
  `id` int(12) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `repository` varchar(256) DEFAULT NULL,
  `volume` varchar(256) DEFAULT NULL,
  `downloadable` varchar(100) DEFAULT NULL,
  `webService` varchar(256) DEFAULT NULL,
  `purpose` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `revised` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `familytool`
--
ALTER TABLE `familytool`
  ADD PRIMARY KEY (`idFamilyTool`);

--
-- Indices de la tabla `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`idInfo`), ADD KEY `familyFK` (`familyFK`);

--
-- Indices de la tabla `repositories`
--
ALTER TABLE `repositories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `familytool`
--
ALTER TABLE `familytool`
  MODIFY `idFamilyTool` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `info`
--
ALTER TABLE `info`
  MODIFY `idInfo` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2822;
--
-- AUTO_INCREMENT de la tabla `repositories`
--
ALTER TABLE `repositories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=260;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
