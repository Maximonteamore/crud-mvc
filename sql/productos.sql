-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2025 a las 20:50:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(50, 'Aceite de girasol', 120.50, 15);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(51, 'Harina 0000', 1800.00, 50);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(52, 'Yerba mate 1kg', 7500.00, 25);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(53, 'Leche entera', 2000.00, 60);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(54, 'Azucar blanca', 2500.00, 60);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(55, 'Fideos 1kg', 1200.00, 60);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(56, 'Agua mineral', 1200.00, 60);
INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`) VALUES(57, 'Arroz largo fino', 1500.00, 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
