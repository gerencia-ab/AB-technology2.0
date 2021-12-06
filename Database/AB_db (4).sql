-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2021 a las 23:07:09
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
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `titulo`, `descripcion`) VALUES
(14, 'dsfsdfsdfsd', 'fsdfsfsdfsdfsdf'),
(15, '¿Qué es una tendencia tecnológica?', 'A causa de los aislamientos obligatorios por la COVID-19 en diferentes partes del mundo, la necesidad de sentirse acompañados cada vez es más fuerte, obligando a las empresas a estar presentes en todos los canales posibles tales como tiendas físicas, eCommerce, apps móviles, call centers y redes sociales; creando nuevos desafíos y cambios en la manera de relacionarse con clientes para responder a esa necesidad.\n\nLas tecnologías juegan un factor primordial, ya que una verdadera Omnicanalidad (entregar una experiencia unificada en cada uno de los canales) requiere, no sólo de un equipo de trabajo capacitado y con visión a futuro, sino de soluciones que optimicen las operaciones, agilicen la producción y salida del producto y sobre todo: mejoren la experiencia del cliente.\n\nLa industria de la tecnología evoluciona constantemente en una reacción en cadena de rápidos desarrollos tecnológicos de los que no podemos escapar ya que están remodelando la vida cotidiana.\n\nLa tecnología está evolucionando muy rápido, incluso se dice que desde hace algunos años los humanos giran en torno a ella y hoy te presentamos los temas que serán más sonados. Entonces, ¿cómo cambiará la tecnología su vida laboral y personal en los próximos 6 meses? Aquí te presentamos 12 tendencias tecnológicas que debes tener en cuenta para el 2021.');

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
(11, 0, '  sdfsfs', 'fsdfsf', '2021-11-05 21:19:01', '4322342', 'fdfssdf', 1),
(12, 0, '  dasdada', 'Kevin', '2021-11-12 20:10:36', '55656', 'dasdasda', 1),
(13, 0, '  asdasda', 'paquete', '2021-11-12 20:16:57', '231231', 'sdasdsad', 1),
(16, 0, '  si', 'paquete2.0', '2021-11-19 19:27:40', '32131231', 'dasdad@gmail.com', 1),
(17, 16, 'no', 'paquete3.0', '2021-11-19 19:28:40', '31231231', 'dasddasd@gmail.com', 1),
(18, 0, '  dsadada', 'asddasd', '2021-11-19 19:29:30', '13131', 'dasdqa@gmail.com', 0),
(19, 0, 'adsdasdadasdasdadadadsadasdadasdasdasdasdadas', 'Kevin', '2021-11-19 19:37:17', '3132052119', 'kevin@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_blog`
--

CREATE TABLE `imagen_blog` (
  `id` int(11) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen_blog`
--

INSERT INTO `imagen_blog` (`id`, `imagen`, `blog_id`) VALUES
(24, '/AB-technology/recursos/imagenes/adam-borkowski-ZMuLjz0RX1g-unsplash.jpg', 14),
(25, '/AB-technology/recursos/imagenes/oie_transparent.png', 14),
(26, '/AB-technology/recursos/imagenes/images.jpeg', 15);

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
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `rol` int(10) UNSIGNED NOT NULL,
  `resetToken` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `resetComplete` varchar(3) CHARACTER SET latin1 DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla Miembros' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `nombres`, `apellidos`, `telefono`, `imagen`, `rol`, `resetToken`, `resetComplete`) VALUES
(1, 'kevin', '$2y$10$QslbbRiSXV3ra7fKW/85auFDKNVBD24yUz76EaBVK.jw23NN12/By', 'kevin@gmail.com', 'yes', 'Kevin Enrique ', 'Jimenez Sanchez', '3124327475', '', 1, NULL, 'No'),
(10, 'kevin2', '$2y$10$K2JT8jPdpO8T0S9CK/4d6eH1CsyCexHgOBn8LNd1syrXVnMA0WtGy', 'kevin2@gmail.com', 'yes', 'kevin', 'Jimenez Sanchezz', '3132052119', '/AB-technology/recursos/imagenes/e12ae6687c0154b4dfd79e28ae33580e.jpg', 2, NULL, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 'leer'),
(2, 'registrar'),
(3, 'modificar'),
(4, 'eliminar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `id` int(11) NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`id`, `id_rol`, `id_permiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(13, 29, 1),
(14, 29, 2),
(15, 29, 3),
(16, 29, 4);

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
(2, 'Personal'),
(29, 'nuevo rol prueba2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indices de la tabla `imagen_blog`
--
ALTER TABLE `imagen_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `imagen_blog`
--
ALTER TABLE `imagen_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen_blog`
--
ALTER TABLE `imagen_blog`
  ADD CONSTRAINT `imagen_blog_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`);

--
-- Filtros para la tabla `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
