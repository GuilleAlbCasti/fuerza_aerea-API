-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2024 a las 22:22:04
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
-- Base de datos: `fuerzaaerea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `id` int(11) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `anio` int(11) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `horas_vuelo` int(11) NOT NULL,
  `base_fk` int(11) NOT NULL,
  `categoria_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`id`, `modelo`, `anio`, `origen`, `horas_vuelo`, `base_fk`, `categoria_fk`) VALUES
(21, 'IA-63 Pampa III', 2018, 'Argentina', 1500, 1, 1),
(22, 'IA-58 Pucará', 1975, 'Argentina', 8000, 2, 2),
(23, 'FMA IA-50 Guaraní II', 1966, 'Argentina', 6500, 1, 3),
(24, 'Lockheed C-130 Hercu', 1968, 'Estados Unidos', 12000, 3, 4),
(25, 'Embraer EMB-312 Tuca', 1987, 'Brasil', 9000, 2, 1),
(26, 'Beechcraft T-6C Texa', 2017, 'Estados Unidos', 2500, 1, 5),
(27, 'Bell 412', 1980, 'Estados Unidos', 7000, 4, 6),
(28, 'Cessna 182', 1963, 'Estados Unidos', 4500, 5, 7),
(29, 'Fokker F-28', 1975, 'Países Bajos', 10500, 3, 8),
(30, 'Learjet 35A', 1982, 'Estados Unidos', 9500, 5, 9),
(31, 'Sikorsky S-70 Black ', 1994, 'Estados Unidos', 3000, 4, 6),
(32, 'Boeing 737-700', 2004, 'Estados Unidos', 8000, 6, 10),
(33, 'Saab 340', 1999, 'Suecia', 6800, 3, 8),
(34, 'DHC-6 Twin Otter', 1966, 'Canadá', 6000, 6, 13),
(35, 'IA-58D Pucará Delta', 2011, 'Argentina', 1000, 2, 2),
(36, 'FMA IA-63 Pampa II', 2007, 'Argentina', 4000, 1, 1),
(37, 'McDonnell Douglas A-', 1998, 'Estados Unidos', 9500, 7, 11),
(38, 'Boeing KC-135 Strato', 1967, 'Estados Unidos', 11000, 6, 12),
(39, 'FMA IA-38 Naranjero', 1960, 'Argentina', 5000, 2, 13),
(40, 'SIAI-Marchetti SM-10', 1970, 'Italia', 7500, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `base`
--

CREATE TABLE `base` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `base`
--

INSERT INTO `base` (`id`, `nombre`, `ubicacion`, `capacidad`) VALUES
(1, 'Base Aérea Militar El Palomar', 'Buenos Aires', 50),
(2, 'Base Aérea Militar Reconquista', 'Santa Fe', 40),
(3, 'Base Aérea Militar Tandil', 'Buenos Aires', 60),
(4, 'Base Aérea Militar Córdoba', 'Córdoba', 100),
(5, 'Base Aérea Militar Río Gallegos', 'Santa Cruz', 30),
(6, 'Base Aérea Militar Comodoro Rivadavia', 'Chubut', 40),
(7, 'Base Aérea Militar Villa Reynolds', 'San Luis', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(2, 'Ataque ligero'),
(4, 'Carga pesada'),
(11, 'Caza'),
(1, 'Entrenamiento'),
(5, 'Entrenamiento avanzado'),
(6, 'Helicóptero'),
(7, 'Ligero'),
(12, 'Reabastecimiento'),
(3, 'Transporte'),
(10, 'Transporte comercial'),
(9, 'Transporte ejecutivo'),
(13, 'Transporte ligero'),
(8, 'Transporte mediano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `email`) VALUES
(1, 'webadmin', '$2y$10$7WWJ5F4ksbjEhlJdzPWGNO9JM1NsZp12OuoH/ZZ.wVMPdsCR0aHey', 'webadmin@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `base_fk` (`base_fk`),
  ADD KEY `fk_categoria` (`categoria_fk`);

--
-- Indices de la tabla `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `base`
--
ALTER TABLE `base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`base_fk`) REFERENCES `base` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_fk`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
