-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2021 a las 19:39:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senasoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas`
--

CREATE TABLE `cartas` (
  `id_carta` int(12) NOT NULL,
  `titulo` varchar(32) NOT NULL,
  `imagen` varchar(32) NOT NULL,
  `categoria` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_asig`
--

CREATE TABLE `cartas_asig` (
  `id_room` int(12) NOT NULL,
  `id_jugador` int(12) NOT NULL,
  `id_carta1` varchar(32) NOT NULL,
  `id_carta2` varchar(32) NOT NULL,
  `id_carta3` varchar(32) NOT NULL,
  `id_carta4` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_sistem`
--

CREATE TABLE `cartas_sistem` (
  `id_room` int(12) NOT NULL,
  `id_carta1` varchar(32) NOT NULL,
  `id_carta2` varchar(32) NOT NULL,
  `id_carta3` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `id_player` int(12) NOT NULL,
  `name` varchar(28) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`id_player`, `name`, `status`) VALUES
(1, 'Juan', 'Activo'),
(2, 'Jose', 'Activo'),
(3, 'Julian', 'Activo'),
(4, 'Bot', 'Activo'),
(5, 'Juan', 'Activo'),
(6, 'Pedro', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room`
--

CREATE TABLE `room` (
  `id_room` int(12) NOT NULL,
  `hexadecimal` varchar(200) NOT NULL,
  `player_1` int(12) DEFAULT NULL,
  `player_2` int(12) DEFAULT NULL,
  `player_3` int(12) DEFAULT NULL,
  `player_4` int(12) DEFAULT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `room`
--

INSERT INTO `room` (`id_room`, `hexadecimal`, `player_1`, `player_2`, `player_3`, `player_4`, `status`) VALUES
(2, 'fffff', 1, 2, 3, 4, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`id_carta`);

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`);

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `fk_player1` (`player_1`),
  ADD KEY `fk_player2` (`player_2`),
  ADD KEY `fk_player3` (`player_3`),
  ADD KEY `fk_player4` (`player_4`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartas`
--
ALTER TABLE `cartas`
  MODIFY `id_carta` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
  MODIFY `id_player` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`player_1`) REFERENCES `players` (`id_player`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`player_2`) REFERENCES `players` (`id_player`),
  ADD CONSTRAINT `room_ibfk_3` FOREIGN KEY (`player_3`) REFERENCES `players` (`id_player`),
  ADD CONSTRAINT `room_ibfk_4` FOREIGN KEY (`player_4`) REFERENCES `players` (`id_player`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
