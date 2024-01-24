-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2024 a las 08:28:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_ci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `marca`, `precio`) VALUES
(1, 'asdafs', 'asfasf', 123),
(2, 'Epokhe', 'Iphone', 1000),
(3, 'qqweqwe', 'qweqwe', 0),
(4, 'Bicicleta', 'La mejor', 394),
(5, 'javi', 'humilde', 0),
(6, 'Álvaro', 'humilde', 0),
(7, 'aasd', 'aasd', 0),
(8, 'Jordan', 'humilde', 0),
(9, 'diez', 'qqe', 0),
(10, 'x', 'x', 0),
(11, 'x', 'x', 0),
(12, 'x', 'x', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña1`) VALUES
(1, 'asd', 'asd'),
(2, 'asd', 'asd'),
(3, 'asd', 'asd'),
(4, 'Erwin', 'Madrid'),
(5, 'asd', ''),
(6, 'Erwin', ''),
(7, 'Erwin', ''),
(8, 'Erwin', ''),
(9, 'Erwin', ''),
(10, 'asd', ''),
(11, 'asd', ''),
(12, 'asd', ''),
(13, 'asd', ''),
(14, 'asd', ''),
(15, 'erwin', '1234'),
(16, 'asd', '1234'),
(17, 'qwe', '1234'),
(18, 'Erwin Llanos', '12345'),
(19, 'asd', 'asd'),
(20, 'Erwin', 'asdd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
