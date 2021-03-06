-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2021 a las 01:19:05
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rent_a_profesional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` char(40) NOT NULL,
  `fechaNac` date NOT NULL,
  `contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fechaNac`, `contador`) VALUES
(14, 'Victor ', 'Reyna', 'ree@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-01', 1),
(15, 'Cristian ', 'Pineda', 'campos@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-16', 0),
(16, 'Rodriguez', 'Angel', 'Ann@gmail.com', 'c0bbf74c375d6d2e0eeb57a03a6dd603', '2021-08-30', 1),
(17, 'Fernando', 'Torres', 'torres@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-06', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminitradorfoto`
--

CREATE TABLE `adminitradorfoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adminitradorfoto`
--

INSERT INTO `adminitradorfoto` (`id`, `foto`, `idAdministrador`) VALUES
(5, '../foto/IMG_20210909_104309.jpg', 14),
(6, '../foto/IMG_20210909_104309.jpg', 14),
(7, '../foto/IMG_20210909_104309.jpg', 14),
(8, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(9, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(10, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(11, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(12, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(13, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(14, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(15, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 16),
(16, '../foto/IMG_20210909_104309.jpg', 14),
(17, '../foto/IMG_20210909_104309.jpg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `extencion` varchar(5) NOT NULL,
  `idchat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nameP` varchar(15) NOT NULL,
  `nameC` varchar(15) NOT NULL,
  `idC` int(6) NOT NULL,
  `idP` int(6) NOT NULL,
  `apeP` varchar(11) NOT NULL,
  `apeC` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `nameP`, `nameC`, `idC`, `idP`, `apeP`, `apeC`) VALUES
(86, 'Uniqua', 'Fernando', 18, 63, 'Umbreon', 'Rodriguez'),
(87, 'Uniqua', 'Juan', 19, 63, 'Umbreon', 'es'),
(88, 'Uniqua', 'Fernando', 18, 63, '13', 'Rodriguez'),
(89, 'Uniqua', 'Fernando', 18, 63, '14', 'Rodriguez'),
(90, 'rro', 'Fernando', 18, 61, 'douuu', 'Rodriguez'),
(91, 'rro', 'Juan', 19, 61, 'douuu', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `fecha_nac` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha_nac`, `estado`) VALUES
(18, 'Fernando', 'Rodriguez', 'ferr@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-01', 0),
(19, 'Juan', 'es', 'es@gmail.com', '698d51a19d8a121ce581499d7b701668', '2022-12-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clietefoto`
--

CREATE TABLE `clietefoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clietefoto`
--

INSERT INTO `clietefoto` (`id`, `foto`, `idCliente`) VALUES
(4, '../foto/86eed9823f4a0a0a3f582fc1204f4f60.jpg', 19),
(5, '../foto/86eed9823f4a0a0a3f582fc1204f4f60.jpg', 19),
(6, '../foto/86eed9823f4a0a0a3f582fc1204f4f60.jpg', 19),
(7, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curri`
--

CREATE TABLE `curri` (
  `id` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `idProfesional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curri`
--

INSERT INTO `curri` (`id`, `direccion`, `nombre`, `extension`, `idProfesional`) VALUES
(10, '../uploads/63', 'MEMBRETADA.pdf', 'pdf', 63),
(11, '../uploads/64', 'Diagnostic Test 3 Richmond.pdf', 'pdf', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `idProfesional` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `user`, `msg`, `idProfesional`, `idCliente`, `tipo`, `estado`) VALUES
(1, 'rro', 'Hola Estoy Interesado en el trabajo', 61, 18, 1, '0'),
(2, 'rro', 'Hola Estoy Interesado en el trabajo', 61, 19, 1, '0'),
(3, 'rro', 'Hola Estoy Interesado en el trabajo', 0, 18, 1, ''),
(4, 'rro', 'Hola Estoy Interesado en el trabajo', 0, 18, 1, ''),
(5, 'rro', 'Hola Estoy Interesado en el trabajo', 0, 18, 1, ''),
(6, 'rro', 'Hola Estoy Interesado en el trabajo', 0, 18, 1, ''),
(7, 'Uniqua', 'Hola Estoy Interesado en el trabajo', 0, 0, 1, ''),
(8, 'Uniqua', 'Hola Estoy Interesado en el trabajo', 0, 0, 1, ''),
(9, 'Uniqua', 'Hola Estoy Interesado en el trabajo', 0, 0, 1, ''),
(10, 'Uniqua', 'Hola Estoy Interesado en el trabajo', 0, 0, 1, ''),
(11, 'Uniqua', 'Hola Estoy Interesado en el trabajo', 0, 0, 1, ''),
(12, 'Uniqua', 'HOLAAA', 63, 18, 1, ''),
(13, 'Uniqua', 'GOIL', 63, 19, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(35) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `Calificacion` decimal(5,0) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `profesion`, `fecha_nac`, `Calificacion`, `estado`) VALUES
(61, 'rro', 'douuu', 'rr@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-01', NULL, 0),
(62, 'Juan ', 'fernandez ', 'ju@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-01', NULL, 0),
(63, 'Uniqua', 'Umbreon', 'un@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-01', NULL, 0),
(64, 'austin ', 'Juan', 'uss@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-01', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionalfoto`
--

CREATE TABLE `profesionalfoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `idProfesional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesionalfoto`
--

INSERT INTO `profesionalfoto` (`id`, `foto`, `idProfesional`) VALUES
(1, '../foto/st,small,507x507-pad,600x600,f8f8f8.jpg', 63),
(2, '../foto/st,small,507x507-pad,600x600,f8f8f8.jpg', 63),
(3, '../foto/st,small,507x507-pad,600x600,f8f8f8.jpg', 63),
(4, '../foto/bd5d3ace36ad7195e36029718f147fdc.jpg', 64),
(5, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 61),
(6, '../foto/0bdbcecdd451354a7c6bc13006c2ab03.jpg', 61),
(7, '../foto/bd5d3ace36ad7195e36029718f147fdc.jpg', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `idcliente`, `precio`, `estado`) VALUES
(13, 'gkkjhkjhkjhkjhkjhkjhkj', 'kjhkjhkjhkjhkjhkjhkjhkj', 18, 120, 0),
(14, 'xd', 'wwqdwqdwqdwqd', 18, 2147483647, 0),
(15, 'Pintura Realista', 'sasadsadasdsadsa', 19, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idClient` int(11) NOT NULL,
  `idPro` int(11) NOT NULL,
  `reportado` varchar(6) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id`, `titulo`, `descripcion`, `idClient`, `idPro`, `reportado`) VALUES
(50, 'Pintura Realista2143213', '421421421421421421', 18, 61, 'Prof'),
(52, 'ASSADADADASD', '2312321ASDASDASFSAFSAFZXZVZVZXVZ', 18, 61, 'Prof');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adminitradorfoto`
--
ALTER TABLE `adminitradorfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idchat` (`idchat`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clietefoto`
--
ALTER TABLE `clietefoto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curri`
--
ALTER TABLE `curri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesional` (`idProfesional`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesionalfoto`
--
ALTER TABLE `profesionalfoto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idPro` (`idPro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `adminitradorfoto`
--
ALTER TABLE `adminitradorfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `clietefoto`
--
ALTER TABLE `clietefoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `curri`
--
ALTER TABLE `curri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `profesionalfoto`
--
ALTER TABLE `profesionalfoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idchat`) REFERENCES `chat` (`id`);

--
-- Filtros para la tabla `curri`
--
ALTER TABLE `curri`
  ADD CONSTRAINT `curri_ibfk_1` FOREIGN KEY (`idProfesional`) REFERENCES `profesional` (`id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `profesional` (`id`),
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
