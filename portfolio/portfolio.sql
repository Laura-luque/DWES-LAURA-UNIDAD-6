-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2024 a las 20:48:01
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
-- Base de datos: `portfolio`
--
CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `portfolio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_skills`
--

CREATE TABLE `categorias_skills` (
  `categoria` varchar(32) NOT NULL COMMENT 'categoria de las skills'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_skills`
--

INSERT INTO `categorias_skills` (`categoria`) VALUES
('diseño'),
('php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(5) NOT NULL COMMENT 'id del proyecto',
  `titulo` varchar(128) NOT NULL COMMENT 'título del proyecto',
  `descripcion` varchar(256) NOT NULL COMMENT 'descripción del proyecto',
  `logo` varchar(128) NOT NULL COMMENT 'logo del proyecto',
  `tecnologias` varchar(256) NOT NULL COMMENT 'tecnologías (array) del proyecto',
  `visible` tinyint(4) NOT NULL COMMENT 'el proyecto puede estar visible (1) o no (0)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación del proyecto',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de modificación del proyecto',
  `usuarios_id` int(5) NOT NULL COMMENT 'id del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(11) NOT NULL COMMENT 'id de la red social',
  `url` varchar(256) NOT NULL COMMENT 'url de la red social',
  `visible` tinyint(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación de la red social',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de modificación de la red social ',
  `usuarios_id` int(5) NOT NULL COMMENT 'clave del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` int(5) NOT NULL COMMENT 'id de las skills',
  `habilidades` varchar(256) NOT NULL COMMENT 'habilidades (array) guardadas',
  `visible` tinyint(4) DEFAULT NULL COMMENT 'las skills pueden estar visibles (1) o no (0)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación de las skills',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de modificación de las skills',
  `categorias_skills_categoria` varchar(32) DEFAULT NULL COMMENT 'categoría de las skills',
  `usuarios_id` int(5) NOT NULL COMMENT 'id del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`id`, `habilidades`, `visible`, `created_at`, `updated_at`, `categorias_skills_categoria`, `usuarios_id`) VALUES
(3, 'programar', 0, '2024-03-09 18:20:43', '2024-03-09 18:20:43', 'diseño', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL COMMENT 'id del trabajo',
  `titulo` varchar(128) NOT NULL COMMENT 'nombre del trabajo',
  `descripcion` varchar(256) NOT NULL COMMENT 'descripción del trabajo',
  `fecha_inicio` date NOT NULL COMMENT 'fecha de inicio del trabajo',
  `fecha_final` date NOT NULL COMMENT 'fecha de fin del trabajo',
  `logros` varchar(512) NOT NULL COMMENT 'logros (array) obtenidos en el trabajo',
  `visible` tinyint(4) NOT NULL COMMENT 'El trabajo estará visible (1) o no (0)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de creación del trababjo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha de modificación del trabajo',
  `usuarios_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `titulo`, `descripcion`, `fecha_inicio`, `fecha_final`, `logros`, `visible`, `created_at`, `updated_at`, `usuarios_id`) VALUES
(2, 'Diseñador front-end', '', '2024-03-01', '2024-03-08', '', 1, '2024-03-09 17:42:33', '2024-03-09 17:42:33', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL COMMENT 'id del usuario',
  `nombre` varchar(128) NOT NULL COMMENT 'nombre del usuario',
  `apellidos` varchar(128) NOT NULL COMMENT 'apellidos del usuario',
  `foto` varchar(128) NOT NULL COMMENT 'foto del usuario',
  `categorias_profesional` varchar(64) DEFAULT NULL COMMENT 'categorías (array) profesionales del usuario',
  `email` varchar(64) NOT NULL COMMENT 'email del usuario',
  `resumen_perfil` tinytext NOT NULL COMMENT 'resumen del perfil del usuario',
  `password` varchar(64) NOT NULL COMMENT 'contraseña del usuario',
  `visible` tinyint(4) NOT NULL COMMENT 'Indica si el perfil está visible (1) o no (0)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha en la que se creo el perfil',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha en la que se actualizó el perfil',
  `token` varchar(128) NOT NULL COMMENT 'token del usuario',
  `fecha_creacion_token` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'fecha en la que se creó el token',
  `cuenta_activa` tinyint(4) NOT NULL COMMENT 'indica si la cuenta está activa (1)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `foto`, `categorias_profesional`, `email`, `resumen_perfil`, `password`, `visible`, `created_at`, `updated_at`, `token`, `fecha_creacion_token`, `cuenta_activa`) VALUES
(10, 'Laura', 'Luque Bravo', 'img/yo.jpg', NULL, 'a22lubrla@iesgrancapitan.org', 'Este es el resumen de mi portfolio.', '1234', 0, '2024-03-09 17:40:29', '2024-03-09 17:40:29', '65ec9f0d366531.00766389dxf68UTPmJDrR+dlOnuYB5hQxmOZoH1sIF9K2626hl8=', '2024-03-09 17:40:29', 1),
(12, 'rafa', 'perez garcia', '', NULL, 'a22lubrla@iesgrancapitan.org', 'Resumen', '1234', 0, '2024-03-09 17:51:53', '2024-03-09 17:51:53', '65eca1b9b9ddd0.79306194Tvz5MKyEswi2HOFId+SXyt7TEn3lj9Gu1HWcuKKH968=', '2024-03-09 17:51:53', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_skills`
--
ALTER TABLE `categorias_skills`
  ADD PRIMARY KEY (`categoria`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_id` (`usuarios_id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FOREIGN` (`usuarios_id`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_id` (`usuarios_id`),
  ADD KEY `categorias_skills_categoria` (`categorias_skills_categoria`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_id` (`usuarios_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id del proyecto', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la red social', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id de las skills', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del trabajo', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id del usuario', AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD CONSTRAINT `redes_sociales_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`categorias_skills_categoria`) REFERENCES `categorias_skills` (`categoria`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `trabajos_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
