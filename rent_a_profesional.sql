-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2021 a las 04:16:58
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

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `extencion`, `idchat`) VALUES
(1, 'casa', '.jpg', 4),
(2, 'Poema amorso', '.pdf', 2),
(3, 'Agregado del poema romantico', '.pdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idprofesional` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `idprofesional`, `idcliente`) VALUES
(2, 1, 2),
(4, 3, 3),
(9, 32, 4),
(3, 50, 2);

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
(1, 'Ruben', 'Alvarado', 'rubensin@gmail.com', '2222', '0000-00-00'),
(2, 'Juan', 'salvatore', 'salvado@gmail.com', '4444', '0000-00-00'),
(3, 'Rion', 'Juanson', 'rayon@gmail.com', '9999', '0000-00-00'),
(4, 'pepe', 'setch', 'victor@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '2021-08-18'),
(5, 'Victor', 'Reyna', 'sss@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-06'),
(6, 'Victor', 'Reyna', 'sss@gmail.com', '698d51a19d8a121ce581499d7b701668', '2021-09-06'),
(7, 'Angel', 'SAT', 'opa@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2021-09-02'),
(8, 'Angel', 'SAT', 'opa@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', '2021-09-02'),
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
(1, '', 'ALICIA RAMIREZ, CURRRICULUM VITAE', '.pdf', 1),
(2, '', 'Curriculum Vitae', '.pdf', 3),
(3, '', 'Ornn-Curriculum', '.docx', 2),
(6, '../uploads/55', 'articulo emprendedor.pdf', 'pdf', 55),
(7, '../uploads/55', 'articulo emprendedor.pdf', 'pdf', 55),
(8, '../uploads/55', 'articulo emprendedor.pdf', 'pdf', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `idchat` int(11) NOT NULL,
  `idprofesional` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `mensaje`, `idchat`, `idprofesional`, `idcliente`) VALUES
(1, 'Hola, cuanto es el precio que estas pagando por ese trabajo?', 4, NULL, NULL),
(2, 'pues fijate que pago 50$ ', 4, NULL, NULL),
(3, 'Vale me interesa tomar el trabajo', 4, NULL, NULL);

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
(1, 'Alicia', 'De Reyna', 'easteregg@gmail.com', '224455', 'Escritor', '0000-00-00', '0'),
(2, 'Ornn', 'Zeus', 'ornnstar@gmail.com', '222444', 'Maquetador web', '0000-00-00', '0'),
(3, 'Reed', 'Cazz', 'Cazzred@gmail.com', '111444', 'Pintor', '0000-00-00', '0'),
(32, 'Cristian', 'Pineda', 'cristian@a.com', 'e58aea67b01fa747687f038dfde066f6', 'Doctor', '2021-06-30', NULL),
(49, 'a', 'a', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Diseñador', '2021-08-19', NULL),
(50, 'Victor', 'reyna', 'culero@gmail.com', 'e58aea67b01fa747687f038dfde066f6', 'Desarrollador de Software', '2003-08-23', NULL),
(51, 'r', 'r', 'r@r.com', 'b59c67bf196a4758191e42f76670ceba', 'Diseñador', '2021-08-03', NULL),
(52, 'Victor ', 'Reynaa', 'ree@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Desarrollador de Software', '2003-01-09', NULL),
(53, 'Victor ', 'Reynaa', 'ree@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Desarrollador de Software', '2003-01-09', NULL),
(54, 'ekisde', 'apellido', 'arriba@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Desarrollador de Software', '2021-09-14', NULL),
(55, 'Fernando', 'Lara', 'xd@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'Diseñador', '2021-09-01', NULL),
(56, 'Fernando', 'Lara', 'xd@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 'Diseñador', '2021-09-01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `nomProfesion` varchar(50) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `nomProfesion`, `idcliente`) VALUES
(1, 'Pintura Realista', 'Necesito que me pinten una casa de forma realista', 'Pintor', 1),
(2, 'html para pagína web', 'necesito la ayuda de un maquetador de paginas web, ya que mi proyecto necesita ser maquetado y quiero a un profesional haciendolo', 'Maquetador web', 3),
(3, 'Un Poema bonito', 'Necesito que me escriban un poema bonito para regalarsela a mi pareja, quiero que aborde la naturaleza.', 'Escritor', 2);

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
  ADD KEY `idchat` (`idchat`);

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
  ADD KEY `nomProfesion` (`nomProfesion`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`idchat`) REFERENCES `chat` (`id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
