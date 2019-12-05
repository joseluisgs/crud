-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2019 a las 18:47:33
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CRUD`
--
CREATE DATABASE IF NOT EXISTS `CRUD` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `CRUD`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnado`
--
-- Creación: 06-11-2019 a las 08:14:40
--

DROP TABLE IF EXISTS `alumnado`;
CREATE TABLE IF NOT EXISTS `alumnado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnado`
--

INSERT INTO `alumnado` (`id`, `nombre`, `apellidos`, `email`) VALUES
(1, 'Alumno a', 'Odio PHP Mucho', 'ana@anayaw.com'),
(2, 'Jose', 'Jamon Pedroches', 'jose@pedroches.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnadocrud`
--
-- Creación: 13-11-2019 a las 16:51:13
-- Última actualización: 13-11-2019 a las 16:53:59
--

DROP TABLE IF EXISTS `alumnadocrud`;
CREATE TABLE IF NOT EXISTS `alumnadocrud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `idioma` text COLLATE utf8_spanish_ci NOT NULL,
  `matricula` text COLLATE utf8_spanish_ci NOT NULL,
  `lenguaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni_unique` (`dni`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnadocrud`
--

INSERT INTO `alumnadocrud` (`id`, `dni`, `nombre`, `email`, `password`, `idioma`, `matricula`, `lenguaje`, `fecha`, `imagen`) VALUES
(1, '12345678A', 'Pedro Pedrinez', 'pedro@pedrinez.com', 'fcea920f7412b5da7be0cf42b8c93759', 'castellano, ingles', 'completa', 'JAVA', '13/11/2019', '4ed5ba7721a45eb76be40a38458201f4.jpeg'),
(2, '98765432S', 'Ana Anaya', 'ana@anita.es', '25d55ad283aa400af464c76d713c07ad', 'castellano, frances, chino', 'modular', 'PHP', '13/11/2019', 'b9cf8ca16069b3ce31c74ec2faf4cebd.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
