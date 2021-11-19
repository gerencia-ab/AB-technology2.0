-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2021 a las 22:20:11
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
-- Base de datos: `AB_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `comentario_id` int(11) NOT NULL,
  `parent_comentario_id` int(11) DEFAULT NULL,
  `comment` varchar(200) CHARACTER SET latin1 NOT NULL,
  `comment_sender_name` varchar(40) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `telefono` varchar(500) NOT NULL,
  `correo` varchar(500) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla Comentarios';

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`comentario_id`, `parent_comentario_id`, `comment`, `comment_sender_name`, `date`, `telefono`, `correo`, `estado`) VALUES
(1, 0, 'asdasdad', 'fsdadasdas', '2021-10-30 19:16:40', '', '', 1),
(6, 0, '  sfdsfsdfs', 'dfsdf', '2021-11-05 20:53:41', '234234', 'fsdfsf', 1),
(9, 0, 'dsadasdasd', 'dasdasd', '2021-11-05 21:17:13', '313131', 'dasda', 1),
(10, 0, 'asdasda', 'dasdas', '2021-11-05 21:18:26', '31312312', 'dsadasd', 1),
(11, 0, '  sdfsfs', 'fsdfsf', '2021-11-05 21:19:01', '4322342', 'fdfssdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `active` varchar(255) CHARACTER SET latin1 NOT NULL,
  `rol` int(10) UNSIGNED NOT NULL,
  `resetToken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `resetComplete` varchar(3) CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla Miembros' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `rol`, `resetToken`, `resetComplete`) VALUES
(1, 'kevin', '$2y$10$QslbbRiSXV3ra7fKW/85auFDKNVBD24yUz76EaBVK.jw23NN12/By', 'kevin@gmail.com', 'yes', 1, NULL, 'No'),
(2, 'kevin2', '$2y$10$KUPCkEMZ07twY2emiBbpi.xRTtCqJw1LFHHs1HXVjj1YaGEdTblUy', 'kevin2@gmail.com', 'yes', 1, NULL, 'No'),
(3, 'hans', '$2y$10$3JZ/B/Xa7wdn47vMaO1kIenPl9irA5mZUgbif4pUXro4fA9xZilua', 'hans@gmail.com', 'yes', 1, NULL, 'No'),
(4, 'mateo', '$2y$10$0joosT1Xsou.mt4UeEcrsuGI6gPqWLqG3r4Uqbd4Es76IXSyXrEZG', 'mateo@gmail.com', 'yes', 2, NULL, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Personal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
