-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2021 a las 23:05:27
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
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `cargo` varchar(500) NOT NULL,
  `funcion` varchar(500) NOT NULL,
  `resumen` text NOT NULL,
  `biografia` text NOT NULL,
  `correo` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `tiktok` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `imagen`, `cargo`, `funcion`, `resumen`, `biografia`, `correo`, `instagram`, `facebook`, `tiktok`, `linkedin`) VALUES
(5, 'JOSE JAVIER CASTRO MEDINA', '/AB-technology/recursos/imagenes/javier.webp', 'Cofundador de AB TECHNOLOGY GROUP', 'Area de Marketing digital', 'Como Administrador de Empresas especializado en Gerencia Estratégica, me he apasionado por el marketing, en especial el Digital, por toda la revolución que tenemos actualmente en la manera de  comunicarnos, con la convicción que ésta es una de las áreas más interesantes en las que se pueda trabajar y desarrollarse para lograr el objetivo de captar, retener y fidelizar a los clientes a través de la satisfacción de sus necesidades.\n\nMe resulta muy satisfactorio utilizar mi creatividad en anuncios, imágenes y eventos que logren la comercialización, comunicación, exposición y ofrecimiento de un servicio o un producto de una forma más directa, solo con una publicación en redes sociales o a través de una campaña de email marketing.', 'Nací en la ciudad de Bogotá en el año 1989 y desde niño resido en la ciudad de Cúcuta. Me gradué de bachiller en el Gimnasio Domingo Savio en el año 2006, luego de haber cursado allí todos mis estudios de Primaria y Bachillerato.\n\nPosteriormente adelanté mis estudios presencialmente en Administración de Empresas, en la UNAB - Universidad autónoma de Bucaramanga, lo que me formó como un ciudadano competente académicamente, con sólida formación ética, respetuoso de los valores fundamentales del desarrollo humano, capacitándome para contribuir al mejoramiento de la sociedad en áreas de la Administración en los sectores público y privado.\n\nRecibí mi título profesional como Administrador de Empresas en diciembre de 2013, en la ciudad de Bucaramanga.\n\nDel año 2014 al 2019 laboré como Contratista independiente en la Corporación autónoma regional de la Frontera Nororiental – CORPONOR en la ciudad de Cúcuta mediante ordenes de prestación de servicios cuyo objeto principal fue: Apoyo a la subdirección Financiera, lo que me permitió adquirir una perspectiva global del área administrativa de la Corporación.\n\nDurante esta etapa realicé una especialización en Gerencia Estratégica con la “Universidad De La Sabana” mediante convenio con la Cámara de Comercio de Cúcuta, obteniendo el titulo de Especialista en Gerencia Estratégica en noviembre de 2017. Esto me fortaleció en el conocimiento propio del area de estrategia, con énfasis en los procesos de análisis y direccionamiento estratégico, implementación y evaluación de la estrategia empresarial.\n\nDesde 2019 a la fecha me he dedicado al marketing digital como cofundador de una emprendimiento con una empresa de desarrollo de software denominada AB Technology, aplicando estrategias de comercialización en los medios digitales, trabajando en mejorar la visibilidad de nuestros clientes en las redes sociales, mediante la comercialización, comunicación, exposición y ofrecimiento de un servicio o un producto que logren la venta de una forma más directa.\n\nEl término Marketing digital es usado para resumir todos tus esfuerzos de marketing en el ambiente online.\n\nComplementé mis estudios con un curso virtual de 40 horas en Google Actívate con examen de certificación del 09/11/2020, y un Diplomado presencial en “Estrategias Comerciales en el Marketing de Negocios Internacionales” en la Fundación de Estudios Superiores FESC de 120 horas en julio de 2019. Ejercí como Community Manager de “Cúcuta Motors” concesionario de vehículos Toyota, a finales de 2019.\n\nA lo largo de mi formación, he potenciado mi espíritu de trabajo en equipo, iniciativa e implicación en las tareas.\n\nMi objetivo principal es conseguir mediante diversas estrategias y técnicas de marketing, que el consumidor que haya adquirido con anterioridad alguno de nuestros productos o servicios, nos siga comprando y se convierta en un cliente habitual. - Un cliente satisfecho y fidelizado es la mejor comunicación que pueda tener una empresa.\n\nEl marketing digital representa la evolución del marketing tradicional, y el marketing por el que deberían apostar las empresas si no quieren perder la oportunidad de subirse al tren del futuro. Además cuenta con muchos medios que logran transmitir un mensaje a millones de personas, con solo una publicación en un blog, en redes sociales o a través de una campaña de email marketing.\n\nCada vez más los influencers digitales nos hemos consolidado como asociados estratégicos de las empresas para aumentar su alcance y visibilidad online.\n\nEn el Marketing Digital, la viralidad es la capacidad que tiene un contenido, difundido en Internet, de compartirse o recibir muchas visitas en un período corto del tiempo.\n\nHoy mismo las pequeñas marcas pueden hacer buenas campañas y atraer consumidores del otro lado de la ciudad, del país y del mundo.', 'jcastro@ab-sistemas.com', '@javiercastrom1', 'notiene', 'notiene', 'notiene'),
(6, 'Kevin Enrique Jimenez Sanchez', '/AB-technology/recursos/imagenes/e12ae6687c0154b4dfd79e28ae33580e.jpg', 'Desarrollador', 'Desarrollador Backend', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\n\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', '    ¿Qué es Lorem Ipsum?\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\n\n¿Por qué lo usamos?\nEs un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\n\n\n¿De dónde viene?\nAl contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\n\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.\n\n¿Dónde puedo conseguirlo?\nHay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.    ', 'kevin@gmail.com', '@kevin', 'kevin', 'notiene', 'notiene'),
(7, 'Hans ', '/AB-technology/recursos/imagenes/e12ae6687c0154b4dfd79e28ae33580e.jpg', 'Desarrollador', 'Desarrollador lider', 'l contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\n\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', '¿Qué es Lorem Ipsum?\nLorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.\n\n¿Por qué lo usamos?\nEs un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).\n\n\n¿De dónde viene?\nAl contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\n\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.\n\n¿Dónde puedo conseguirlo?\nHay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.', 'hans@gmail.com', '@hans', 'hans', 'hasnt', 'notiene');

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
(1, 'kevin', '$2y$10$QslbbRiSXV3ra7fKW/85auFDKNVBD24yUz76EaBVK.jw23NN12/By', 'kevin@gmail.com', 'yes', 'kevin', 'jimenez', '3124327475', '', 1, NULL, 'No'),
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
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
