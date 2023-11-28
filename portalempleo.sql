-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 18:56:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portalempleo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_empresa`, `id_usuario`) VALUES
(4, 35, 74),
(5, 35, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `id_gerente` int(11) DEFAULT NULL,
  `nombre_empresa` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `aprobada` varchar(2) NOT NULL DEFAULT 'no',
  `borrado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `id_gerente`, `nombre_empresa`, `created_at`, `aprobada`, `borrado`) VALUES
(35, 72, 'Ilerna online', '2023-11-24 16:30:38', 'si', 0),
(36, 72, 'Ilerna presencial 2023', '2023-11-24 16:30:38', 'si', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_ofertas`
--

CREATE TABLE `inscripcion_ofertas` (
  `id` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rechazado` varchar(4) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion_ofertas`
--

INSERT INTO `inscripcion_ofertas` (`id`, `id_oferta`, `id_usuario`, `rechazado`) VALUES
(10, 32, 73, 'No'),
(11, 33, 73, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(2) NOT NULL DEFAULT 'si',
  `borrado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `id_empresa`, `descripcion`, `tipo`, `fecha_inicio`, `fecha_fin`, `estado`, `borrado`) VALUES
(32, 35, 'Actualmente estamos a la búsqueda de Administrador de Sistemas Linux ', 'Indefinido', '2023-11-24', '2024-11-24', '1', 0),
(33, 35, 'administrador de sistemsas\r\ncasa csa\r\n', 'Parcial', '2023-11-24', '2023-12-01', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `perfil` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `baneado` int(1) NOT NULL DEFAULT 0,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `apellidos`, `email`, `imagen`, `perfil`, `created_at`, `last_login`, `last_modified`, `baneado`, `borrado`) VALUES
(71, 'Yols', 'f8032d5cae3de20fcec887f395ec9a6a', 'Yolanda', 'Almagro Aranda', 'yuyi.almagro@gmail.com', NULL, 4, '2023-11-24 16:21:08', '2023-11-24 21:05:22', NULL, 0, 0),
(72, 'ManGran', 'f8032d5cae3de20fcec887f395ec9a6a', 'Manuel', 'Grande Cuadra', 'mangran@gmail.com', NULL, 3, '2023-11-24 16:30:38', '2023-11-28 16:43:47', NULL, 0, 0),
(73, 'Pilar', 'f8032d5cae3de20fcec887f395ec9a6a', 'Pilar', 'Aranda Molina', 'pilar.aranda@gmail.com', NULL, 1, '2023-11-24 19:17:14', '2023-11-28 15:57:18', NULL, 0, 0),
(74, 'Carlitos', 'ce8f43b69c80a71a21759089092d8f60', 'Carlos', 'Grande', 'carlos.grande@gmail.com', NULL, 2, '2023-11-24 20:56:09', '2023-11-24 20:44:20', '2023-11-24 20:56:09', 0, 0),
(75, 'javi', 'f8032d5cae3de20fcec887f395ec9a6a', 'javi', 'meh meh', 'javi.meh@gmail.com', NULL, 1, '2023-11-24 19:35:13', '2023-11-24 19:45:56', NULL, 0, 0),
(78, 'javito', '14f87ec1e760d16c0380c74ec7678b04', 'javito', 'memememe mememe', 'javi.me@gmail.com', NULL, 1, '2023-11-24 19:35:13', '2023-11-24 19:41:43', '2023-11-24 20:04:23', 0, 1),
(79, 'yolanda', 'f8032d5cae3de20fcec887f395ec9a6a', 'Yolanda', 'Almagro Aranda', 'yolanda.almagro@gmail.com', NULL, 1, '2023-11-24 20:39:06', '2023-11-28 18:28:29', NULL, 0, 0),
(80, 'Juanito', 'f8032d5cae3de20fcec887f395ec9a6a', 'Juan', 'almagro lombardo', 'juan.lombardo@gmail.com', NULL, 2, '2023-11-24 20:57:06', '2023-11-24 20:57:57', '2023-11-24 20:57:46', 0, 0),
(81, 'Carmen', 'f8032d5cae3de20fcec887f395ec9a6a', 'Carmen', 'Rubiales', 'carmen.rubiales@gmail.com', NULL, 1, '2023-11-24 20:59:14', NULL, NULL, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gerente` (`id_gerente`);

--
-- Indices de la tabla `inscripcion_ofertas`
--
ALTER TABLE `inscripcion_ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `inscripcion_ofertas`
--
ALTER TABLE `inscripcion_ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
