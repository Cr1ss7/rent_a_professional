-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 07:08:02
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
(14, 'Victor ', 'Reyna', 'ree@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-01', 0),
(15, 'Cristian ', 'Pineda', 'campos@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-16', 0),
(16, 'Angel', 'Rodriguez', 'An@gmail.com', 'ce8cd0c9dac97d8d0b29b24ffbfcaba0', '2021-08-30', 1),
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
  `idprofesional` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'Fernando', 'Rodriguez', 'ferr@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clietefoto`
--

CREATE TABLE `clietefoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(62, 'Juan ', 'fernandez ', 'ju@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-01', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionalfoto`
--

CREATE TABLE `profesionalfoto` (
  `id` int(11) NOT NULL,
  `foto` varchar(5000) NOT NULL,
  `idProfesional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `idcliente`, `precio`) VALUES
(13, 'gkkjhkjhkjhkjhkjhkjhkj', 'kjhkjhkjhkjhkjhkjhkjhkj', 18, 120),
(14, 'xd', 'wwqdwqdwqdwqd', 18, 2147483647);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idAdministrador` (`idAdministrador`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idprofesional_2` (`idprofesional`,`idcliente`),
  ADD UNIQUE KEY `idprofesional_3` (`idprofesional`,`idcliente`),
  ADD KEY `idprofesional` (`idprofesional`),
  ADD KEY `idusuario` (`idcliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clietefoto`
--
ALTER TABLE `clietefoto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `curri`
--
ALTER TABLE `curri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesional` (`idProfesional`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesionalfoto`
--
ALTER TABLE `profesionalfoto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idProfesional` (`idProfesional`);

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
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `curri`
--
ALTER TABLE `curri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idprofesional`) REFERENCES `profesional` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

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
