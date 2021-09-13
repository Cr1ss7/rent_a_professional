-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 06:12:32
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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
  `fechaNac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fechaNac`) VALUES
(14, 'Victor ', 'Reyna', 'ree@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-01'),
(15, 'Cristian ', 'Pineda', 'campos@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-16'),
(16, 'Angel', 'Rodriguez', 'An@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-08-30'),
(17, 'Fernando', 'Torres', 'torres@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-06');

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
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha_nac`) VALUES
(4, 'pepe', 'setch', 'victor@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '2021-08-18'),
(5, 'Victor', 'Reyna', 'sss@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-06'),
(7, 'Angel', 'SAT', 'opa@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2021-09-02'),
(9, 'Ali', 'Bea', 'bea@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2021-09-22');

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
(8, '../uploads/55', 'articulo emprendedor.pdf', 'pdf', 55),
(9, '../uploads/57', 'Cristian Omar Pineda Campos #11 2C.docx', 'docx', 57),
(12, '../uploads/58', 'DEVELOPMENT.pdf', 'pdf', 58),
(13, '../uploads/59', 'Naranja Negro Carros Carretera Aventura Portada de Revista.pdf', 'pdf', 59),
(14, '../uploads/60', 'matematica 2005.pdf', 'pdf', 60);

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

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `user`, `msg`, `idProfesional`, `idCliente`, `tipo`) VALUES
(9, 'popopopo', 'hola', 57, 9, 1),
(10, 'Ali', 'hola', 57, 9, 0),
(11, 'popopopo', 'como tas?', 57, 9, 1),
(12, 'Ali', 'bien', 57, 9, 0);

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
  `Calificacion` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `profesion`, `fecha_nac`, `Calificacion`) VALUES
(32, 'Cristian', 'Pineda', 'cristian@a.com', 'e58aea67b01fa747687f038dfde066f6', 'Doctor', '2021-06-30', NULL),
(49, 'a', 'a', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Diseñador', '2021-08-19', NULL),
(50, 'Victor', 'reyna', 'culero@gmail.com', 'e58aea67b01fa747687f038dfde066f6', 'Desarrollador de Software', '2003-08-23', NULL),
(51, 'r', 'r', 'r@r.com', 'b59c67bf196a4758191e42f76670ceba', 'Diseñador', '2021-08-03', NULL),
(52, 'Victor ', 'Reynaa', 'ree@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Desarrollador de Software', '2003-01-09', NULL),
(54, 'ekisde', 'apellido', 'arriba@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-14', NULL),
(55, 'Fernando', 'Lara', 'xd@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'Diseñador', '2021-09-01', NULL),
(56, 'Fernando', 'Lara', 'xd@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'Diseñador', '2021-09-01', NULL),
(57, 'popopopo', 'pipipipi', 'pipipopo@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Desarrollador de Software', '2021-09-13', NULL),
(58, 'Ibai', 'Llanos', 'ibai@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 'Desarrollador de Software', '2021-09-20', NULL),
(59, 'jose', 'cuervo', 'cuervo@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Desarrollador de Software', '2021-09-14', NULL),
(60, 'lolito', 'chido', 'lolo@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Desarrollador de Software', '2021-09-21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `precio`, `idcliente`) VALUES
(4, 'Puta barata', 'Diler mamamela te pago con centavos', '0.01', 9),
(5, 'Paginita', 'Quiero una paginita adonde se puedan vender menore de edad de una forma muy barata y esquivando las autoridades del pais', '1', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(545) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPro` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id`, `titulo`, `descripcion`, `idPro`, `idClient`) VALUES
(1, 'Epale mi piernita', 'Epico', 2, 1),
(16, 'Epale mi piernita', 'SADSADSAD', 2, 1),
(17, '213213', 'xzdzsdsadsad', 2, 1),
(18, 'XD', 'epic', 2, 1),
(19, 'XD', '123213123123', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
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
-- Indices de la tabla `curri`
--
ALTER TABLE `curri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesional` (`idProfesional`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesional` (`idProfesional`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomProfesion` (`precio`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `curri`
--
ALTER TABLE `curri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
