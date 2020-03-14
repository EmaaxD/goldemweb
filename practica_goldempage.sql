-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 14-03-2020 a las 22:28:11
-- Versión del servidor: 5.7.29
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica_goldempage`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `fullname`, `password`, `editado`, `nivel`) VALUES
(46, 'admin', 'Emanuel Mamani', '$2y$12$h1KZGphppJYgoLclUtlorOmX0AAdQ.FNmK79zdUGXoIjn0plEMqnm', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_event` varchar(50) NOT NULL,
  `icons` varchar(25) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_event`, `icons`, `editado`) VALUES
(1, 'Seminario', 'fas fa-university', '0000-00-00 00:00:00'),
(2, 'Conferencias', 'fas fa-comment', '0000-00-00 00:00:00'),
(3, 'Talleres', 'fas fa-code', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_eventos` tinyint(10) NOT NULL,
  `name_event` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `date_event` date NOT NULL,
  `hour_event` time NOT NULL,
  `id_cat_event` tinyint(10) NOT NULL,
  `id_inv` tinyint(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `name_event`, `date_event`, `hour_event`, `id_cat_event`, `id_inv`, `clave`, `editado`) VALUES
(1, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', '0000-00-00 00:00:00'),
(2, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', '0000-00-00 00:00:00'),
(3, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(5, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(6, 'Como ser freelancer', '2016-12-09', '10:00:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(7, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(8, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(11, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(12, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(13, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(15, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(17, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(18, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(21, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(23, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14', '0000-00-00 00:00:00'),
(25, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(26, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(27, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(28, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(29, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(30, 'Manu', '2019-04-09', '07:00:00', 1, 3, '', '0000-00-00 00:00:00'),
(31, 'Todo re lokos', '2019-06-13', '19:06:00', 2, 3, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` tinyint(10) NOT NULL,
  `name_invitado` varchar(30) NOT NULL,
  `lastname_invitado` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `url_img` varchar(50) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `name_invitado`, `lastname_invitado`, `description`, `url_img`, `editado`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado1.jpg', '0000-00-00 00:00:00'),
(2, 'Shari', 'Herrrera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado2.jpg', '0000-00-00 00:00:00'),
(3, 'Emanuel', 'Mamani', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado3.jpg', '0000-00-00 00:00:00'),
(4, 'Gregorio', 'Sanches', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado4.jpg', '0000-00-00 00:00:00'),
(5, 'Thomas', 'Mamani', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado5.jpg', '0000-00-00 00:00:00'),
(6, 'Susan', 'Sanchez', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.', 'invitado6.jpg', '0000-00-00 00:00:00'),
(15, 'Thomas alejo', 'Mamani', '<p>asdasdasd</p>', 'adasd.jpg', '2019-05-02 17:01:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `name_regalo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `name_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id_registrado` bigint(20) UNSIGNED NOT NULL,
  `name_registrado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lastname_registrado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email_registrado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `date_registro` datetime NOT NULL,
  `pases_articulos` longtext COLLATE utf8_spanish_ci NOT NULL,
  `talleres_registrado` longtext COLLATE utf8_spanish_ci NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pagado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `name_registrado`, `lastname_registrado`, `email_registrado`, `date_registro`, `pases_articulos`, `talleres_registrado`, `regalo`, `total_pagado`, `pagado`) VALUES
(1, 'emanuel', 'mamani', 'ale21_lol_@hotmail.com', '2019-02-20 20:21:20', '{\"un_dia\":1,\"pase_completo\":2,\"camisas\":2,\"etiquetas\":5}', '{\"eventos\":[\"taller_01\",\"taller_02\",\"conf_01\",\"conf_02\",\"taller_06\",\"taller_07\",\"sem_03\",\"taller_12\"]}', 2, '158.6', 0),
(2, 'thomas', 'san', 'thomasin@hola.com', '2019-02-20 22:34:06', '{\"pase_completo\":1,\"camisas\":1,\"etiquetas\":3}', '{\"eventos\":[\"taller_01\",\"conf_03\",\"taller_06\",\"sem_03\",\"taller_12\"]}', 2, '65.3', 0),
(3, 'emanuel', 'mamani', 'ale11@as.com', '2019-04-07 04:40:52', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\"]}', 2, '41.3', 0),
(4, 'emanuel', 'mamani', 'asd@asd.com', '2019-04-07 04:45:56', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(5, 'emanuel', 'mamani', 'asd@asd.com', '2019-04-07 04:49:08', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(6, 'emanuel', 'mamani', 'asd@asd.com', '2019-04-07 04:49:47', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(7, 'emanuel', 'mamani', 'asd@asd.com', '2019-04-07 04:50:19', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 0),
(8, 'emanuel', 'mamani', 'asd@asd.com', '2019-04-07 04:54:48', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_02\"]}', 2, '41.3', 1),
(9, 'ema', 'mamani', 'ale21@as.com', '2019-05-02 22:22:53', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"taller_01\",\"taller_03\",\"conf_03\",\"sem_03\"]}', 2, '61.3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_eventos`),
  ADD KEY `id_cat_event` (`id_cat_event`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id_registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_eventos` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id_invitado` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_event`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`id_invitado`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
