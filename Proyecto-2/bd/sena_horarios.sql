-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2025 a las 04:58:35
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
-- Base de datos: `sena_horarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` enum('aula','taller') NOT NULL,
  `id_programa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id`, `nombre`, `tipo`, `id_programa`) VALUES
(1, 'Aula 101', 'aula', 1),
(2, 'Taller de Hardware', 'taller', 2),
(3, 'Sistemas 2', 'aula', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_ficha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id`, `nombre`, `email`, `id_ficha`) VALUES
(1, 'Andrés Torres', 'andres.torres@sena.edu.co', 1),
(2, 'Laura Martínez', 'laura.martinez@sena.edu.co', 1),
(3, 'Pedro Sánchez', 'pedro.sanchez@sena.edu.co', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `id_aprendiz` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `estado` enum('presente','ausente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `id_aprendiz`, `fecha`, `estado`) VALUES
(1, 1, '2023-10-01', 'presente'),
(2, 1, '2023-10-02', 'ausente'),
(4, 2, '2023-10-01', 'presente'),
(5, 2, '2023-10-02', 'presente'),
(6, 3, '2023-10-01', 'ausente'),
(7, 3, '2023-10-02', 'ausente'),
(8, 3, '2023-10-03', 'presente'),
(9, 3, '2025-03-16', 'presente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_regional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id`, `nombre`, `id_regional`) VALUES
(1, 'Centro de Formación Norte', 1),
(2, 'Centro de Formación Sur', 2),
(3, 'CPIC', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_programa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id`, `nombre`, `id_programa`) VALUES
(1, 'Ficha 2023-01', 1),
(2, 'Ficha 2023-02', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores_fichas`
--

CREATE TABLE `instructores_fichas` (
  `id` int(11) NOT NULL,
  `id_instructor` int(11) DEFAULT NULL,
  `id_ficha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instructores_fichas`
--

INSERT INTO `instructores_fichas` (`id`, `id_instructor`, `id_ficha`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_coordinador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `id_coordinador`) VALUES
(1, 'Programación Web', 2),
(2, 'Mantenimiento de Sistemas', 2),
(3, 'ADSO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regionales`
--

CREATE TABLE `regionales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regionales`
--

INSERT INTO `regionales` (`id`, `nombre`) VALUES
(1, 'Regional Norte'),
(2, 'Regional Sur'),
(4, 'Caldas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('super_admin','coordinador','instructor') NOT NULL,
  `id_centro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `id_centro`) VALUES
(1, 'Juan Pérez', 'juan.perez@sena.edu.co', '123', 'super_admin', 1),
(2, 'María Gómez', 'maria.gomez@sena.edu.co', '123', 'coordinador', 1),
(3, 'Carlos Ruiz', 'carlos.ruiz@sena.edu.co', '123', 'instructor', 1),
(5, 'Juan ', 'juan@example.com', '$2y$10$p5MPYWBTRUBfpy2zVVBwN.akXweMdkHhV1e1QqCiKSz0zuris12g.', 'super_admin', 1),
(6, 'daniel', 'daniel@example.com', '$2y$10$A07aH7w/3GVyBPzE78mToOLap.D3dYIRe0/XvzdVI2GPtXQIB0W.i', 'coordinador', 1),
(7, 'jeferson', 'jeferson@example.com', '$2y$10$W7JkJcWj3KwBXAn7Dc4QPeI.CYh06djoFy1dLgSnx7sn/mioHtu7y', 'instructor', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aprendiz` (`id_aprendiz`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_regional` (`id_regional`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `instructores_fichas`
--
ALTER TABLE `instructores_fichas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instructor` (`id_instructor`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coordinador` (`id_coordinador`);

--
-- Indices de la tabla `regionales`
--
ALTER TABLE `regionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_centro` (`id_centro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `centros`
--
ALTER TABLE `centros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instructores_fichas`
--
ALTER TABLE `instructores_fichas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `regionales`
--
ALTER TABLE `regionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD CONSTRAINT `ambientes_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id`);

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `aprendices_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `fichas` (`id`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendices` (`id`);

--
-- Filtros para la tabla `centros`
--
ALTER TABLE `centros`
  ADD CONSTRAINT `centros_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regionales` (`id`);

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id`);

--
-- Filtros para la tabla `instructores_fichas`
--
ALTER TABLE `instructores_fichas`
  ADD CONSTRAINT `instructores_fichas_ibfk_1` FOREIGN KEY (`id_instructor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `instructores_fichas_ibfk_2` FOREIGN KEY (`id_ficha`) REFERENCES `fichas` (`id`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`id_coordinador`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
