-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2026 a las 19:19:47
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
-- Base de datos: `test`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario_validar` (IN `usuario` VARCHAR(45), IN `password` VARCHAR(45))   SELECT * 
FROM administrador
WHERE 
  usuario_login = usuario AND
  usuario_password = password$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `usuario_id` int(11) NOT NULL,
  `usuario_login` varchar(45) DEFAULT NULL,
  `usuario_apellido` varchar(45) DEFAULT NULL,
  `usuario_nombre` varchar(45) DEFAULT NULL,
  `usuario_password` varchar(255) DEFAULT NULL,
  `clave_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario_id`, `usuario_login`, `usuario_apellido`, `usuario_nombre`, `usuario_password`, `clave_registro`) VALUES
(25, 'nicolas', 'barrero', 'nico12', '$2y$10$1/rueUrmI.wviIkAc3gOb.ZH0JYCTwwD6MnAESVrzGKgQYIY8feRG', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkin`
--

CREATE TABLE `checkin` (
  `idcheckin` int(11) NOT NULL,
  `Monto_total` varchar(45) DEFAULT NULL,
  `Fecha_ingreso` date DEFAULT NULL,
  `Fecha_egreso` date DEFAULT NULL,
  `Forma_pago` varchar(45) DEFAULT NULL,
  `Cantidad_personas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `checkin`
--

INSERT INTO `checkin` (`idcheckin`, `Monto_total`, `Fecha_ingreso`, `Fecha_egreso`, `Forma_pago`, `Cantidad_personas`) VALUES
(36, '50000', '2025-08-27', '2025-09-04', 'mercado pago', '2'),
(37, '34000', '2025-09-30', '2025-10-09', 'Efectivo', '1'),
(38, '25000', '2025-09-30', '2025-10-11', 'Efectivo', '1'),
(39, '40000', '2025-09-24', '2025-09-27', 'mercado pago', '5'),
(54, '32000', '2025-09-23', '2025-09-27', 'Efectivo', '3'),
(55, '56000', '2025-11-20', '2025-11-27', 'Mercado Pago', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `idhabitacion` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Numero_habitacion` varchar(45) DEFAULT NULL,
  `Estado_habitacion` varchar(20) DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idhabitacion`, `Tipo`, `Numero_habitacion`, `Estado_habitacion`) VALUES
(14, 'Doble', '8', 'Ocupada'),
(25, 'Doble', '9', 'Ocupada'),
(28, 'Doble', '5', 'Ocupada'),
(29, 'Cuadruple', '1', 'Ocupada'),
(32, 'Triple', '3', 'Ocupada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_x_huesped`
--

CREATE TABLE `habitacion_x_huesped` (
  `idhabitacion x huesped` int(11) NOT NULL,
  `idcheck` int(11) NOT NULL,
  `habitacion_idhabitacion` int(11) NOT NULL,
  `huesped_idhuesped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `habitacion_x_huesped`
--

INSERT INTO `habitacion_x_huesped` (`idhabitacion x huesped`, `idcheck`, `habitacion_idhabitacion`, `huesped_idhuesped`) VALUES
(3, 36, 14, 1),
(4, 37, 25, 2),
(5, 38, 28, 16),
(6, 39, 29, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

CREATE TABLE `huesped` (
  `idhuesped` int(11) NOT NULL,
  `DNI` int(45) DEFAULT NULL,
  `Telefono` int(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `huesped`
--

INSERT INTO `huesped` (`idhuesped`, `DNI`, `Telefono`, `Apellido`, `Nombre`, `Direccion`) VALUES
(1, 45009590, 2147483647, 'Barrero', 'Nicolas', 'San Lorenzo 1034'),
(2, 10085632, 11589963, 'Gomez', 'Martin', 'Lainez 125'),
(16, 25029144, 158580648, 'Fosaro', 'Noelia', 'San Lorenzo 1034'),
(18, 44531125, 265789854, 'acosta', 'jorge', 'atte'),
(19, 10085160, 2147483647, 'Ramirez', 'Juan', 'Leonismos Argentinos 334'),
(20, 45667124, 2147483647, 'Martinez', 'Daniel', 'Yrigoyen 334');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped_x_admin`
--

CREATE TABLE `huesped_x_admin` (
  `idhuesped x admin` int(11) NOT NULL,
  `huesped_idhuesped` int(11) NOT NULL,
  `administrador_idadministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`idcheckin`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`idhabitacion`),
  ADD UNIQUE KEY `Numero_habitacion` (`Numero_habitacion`);

--
-- Indices de la tabla `habitacion_x_huesped`
--
ALTER TABLE `habitacion_x_huesped`
  ADD PRIMARY KEY (`idhabitacion x huesped`),
  ADD UNIQUE KEY `idcheck` (`idcheck`),
  ADD KEY `check-in_idcheck-in` (`idcheck`,`habitacion_idhabitacion`,`huesped_idhuesped`),
  ADD KEY `habitacion_idhabitacion` (`habitacion_idhabitacion`),
  ADD KEY `huesped_idhuesped` (`huesped_idhuesped`);

--
-- Indices de la tabla `huesped`
--
ALTER TABLE `huesped`
  ADD PRIMARY KEY (`idhuesped`);

--
-- Indices de la tabla `huesped_x_admin`
--
ALTER TABLE `huesped_x_admin`
  ADD PRIMARY KEY (`idhuesped x admin`),
  ADD KEY `huesped_idhuesped` (`huesped_idhuesped`,`administrador_idadministrador`),
  ADD KEY `administrador_idadministrador` (`administrador_idadministrador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `checkin`
--
ALTER TABLE `checkin`
  MODIFY `idcheckin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `habitacion_x_huesped`
--
ALTER TABLE `habitacion_x_huesped`
  MODIFY `idhabitacion x huesped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `huesped`
--
ALTER TABLE `huesped`
  MODIFY `idhuesped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `huesped_x_admin`
--
ALTER TABLE `huesped_x_admin`
  MODIFY `idhuesped x admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion_x_huesped`
--
ALTER TABLE `habitacion_x_huesped`
  ADD CONSTRAINT `habitacion_x_huesped_ibfk_1` FOREIGN KEY (`idcheck`) REFERENCES `checkin` (`idcheckin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `habitacion_x_huesped_ibfk_2` FOREIGN KEY (`habitacion_idhabitacion`) REFERENCES `habitacion` (`idhabitacion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `habitacion_x_huesped_ibfk_3` FOREIGN KEY (`huesped_idhuesped`) REFERENCES `huesped` (`idhuesped`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `huesped_x_admin`
--
ALTER TABLE `huesped_x_admin`
  ADD CONSTRAINT `huesped_x_admin_ibfk_1` FOREIGN KEY (`administrador_idadministrador`) REFERENCES `administrador` (`usuario_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `huesped_x_admin_ibfk_2` FOREIGN KEY (`huesped_idhuesped`) REFERENCES `huesped` (`idhuesped`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
