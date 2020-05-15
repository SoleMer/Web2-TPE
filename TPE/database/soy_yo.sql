-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2020 a las 23:35:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soy_yo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection`
--

CREATE TABLE `collection` (
  `id_collection` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `collection`
--

INSERT INTO `collection` (`id_collection`, `name`) VALUES
(1, 'Pekes'),
(2, 'COVID-19'),
(3, 'Estudiar'),
(4, 'Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `id_collection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_product`, `name`, `cost`, `id_collection`) VALUES
(1, 'Mochila emoji', '1500', 3),
(2, 'mochila Simpson', '1500', 3),
(3, 'Individuales', '150', 4),
(4, 'Estuche higienico', '250', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id_collection`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `collection`
--
ALTER TABLE `collection`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
