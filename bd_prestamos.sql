-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2022 a las 19:56:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_prestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `num_serie` varchar(12) NOT NULL,
  `nombre_materiales` enum('camara','auricular','cable','microfono','tripode') NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `estado` enum('prestamo','reparacion','stock') NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `ruta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`num_serie`, `nombre_materiales`, `marca`, `modelo`, `estado`, `observaciones`, `ruta`) VALUES
('987654321', 'auricular', 'asdf', 'asdf', 'stock', '', 'img/materiales/'),
('995649872asd', 'auricular', 'asdfdfs', 'asdfsdfsda', 'stock', '', 'img/materiales/'),
('AG5872HY89', 'auricular', '001', '35 II', 'stock', '', 'img/materiales/AG5872HY89.png'),
('asasd6654321', 'camara', 'asdfasdf', 'asdfasdfa', 'stock', 'asdfasd', 'img/materiales/'),
('asdds', 'auricular', '', '', 'stock', 'zsdasd', 'img/materiales/'),
('AW3429FJ32', 'microfono', '002', 'MD441-U', 'stock', '', 'img/materiales/AW3429FJ32.png'),
('DJ3782NJ39', 'auricular', '003', 'ATHM50XBT', 'stock', '', 'img/materiales/DJ3782NJ39.png'),
('DU3784GD32', 'camara', '004', 'XF100', 'stock', '', 'img/materiales/DU3784GD32.png'),
('HR4568RS56', 'cable', 'VMC', '15FS', 'stock', '', 'img/materiales/HR4568RS56.png'),
('RE3847RF38', 'microfono', 'Shure', 'SM 7B', 'stock', '', 'img/materiales/RE3847RF38.png'),
('UY3783JK39', 'tripode', 'Manfrotto', 'MVK504XT', 'stock', '', 'img/materiales/UY3783JK39.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `dni` varchar(9) NOT NULL,
  `num_serie` varchar(12) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `fecha_maxima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`dni`, `num_serie`, `fecha_prestamo`, `fecha_devolucion`, `fecha_maxima`) VALUES
('12345678A', 'AG5872HY89', '2022-02-15', '2022-02-15', '2022-02-18'),
('12345678A', 'AW3429FJ32', '2022-02-15', '2022-02-19', '2022-02-18'),
('12345678A', 'DJ3782NJ39', '2022-02-15', '2022-02-15', '2022-02-18'),
('12345678A', 'DU3784GD32', '2022-02-15', '2022-02-15', '2022-02-18'),
('12345678A', 'HR4568RS56', '2022-02-15', '2022-02-15', '2022-02-18'),
('12345678A', 'RE3847RF38', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'AG5872HY89', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'AW3429FJ32', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'DJ3782NJ39', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'AG5872HY89', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'AW3429FJ32', '2022-02-15', '2022-02-15', '2022-02-18'),
('987654321', 'DJ3782NJ39', '2022-02-15', '2022-02-15', '2022-02-18'),
('12345678A', 'AG5872HY89', '2022-02-19', '2022-02-20', '2022-02-22'),
('12345678A', '987654321', '2022-02-20', '2022-02-20', '2022-02-23'),
('29254729Z', 'RE3847RF38', '2022-02-14', '2022-02-20', '2022-02-15'),
('29254729Z', 'RE3847RF38', '2022-02-14', '2022-02-20', '2022-02-15'),
('28894737E', 'asasd6654321', '2022-02-02', '2022-02-20', '2022-02-16'),
('12345678A', 'AG5872HY89', '2022-02-01', '2022-02-20', '2022-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(9) NOT NULL,
  `nombre_usuarios` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `curso` int(1) NOT NULL,
  `rol` enum('administrador','servicio_tecnico','usuario','') NOT NULL,
  `ciclo` varchar(10) NOT NULL,
  `moroso` tinyint(1) NOT NULL,
  `num_objetos` tinyint(4) NOT NULL,
  `contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre_usuarios`, `apellidos`, `curso`, `rol`, `ciclo`, `moroso`, `num_objetos`, `contrasenia`) VALUES
('', 'admin', '', 0, '', '', 0, 0, 'admin'),
('12345678A', 'barbeq', 'Llanos Garatea', 2, 'usuario', 'DAM', 0, 0, ''),
('28894737E', 'Joaquín', 'Sánchez Rodriguez', 1, 'usuario', 'A3D', 0, 0, ''),
('29254729Z', 'Nuria', 'Fuentes Fuentes', 1, 'usuario', 'DAM', 0, 0, ''),
('29507413T', 'pablo', 'lopez', 1, 'usuario', 'daw', 0, 0, ''),
('987654321', 'Manuel', 'Ruiz de Lopera', 2, 'usuario', 'RAE', 0, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`num_serie`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD KEY `foranea` (`num_serie`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `foranea` FOREIGN KEY (`num_serie`) REFERENCES `materiales` (`num_serie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
