-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 10:12:47
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
-- Base de datos: `regalatodo`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AceptarEntrega` (IN `id_s` INT)   BEGIN
  UPDATE solicitudentrega SET status = 2 WHERE idSolicitudEntrega = id_s;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AceptarSolicitud` (IN `id_s` INT)   BEGIN
  UPDATE solicitudentrega SET status = 1 WHERE idSolicitudEntrega = id_s;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearReporte` (IN `id_s` INTEGER)   BEGIN
  INSERT INTO reporte(id_Solicitud) VALUES(id_s);
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearSolicitud` (IN `ent` VARCHAR(45), IN `id_a` INTEGER, IN `id_s` INTEGER)   BEGIN
    INSERT INTO solicitudentrega(entrega, id_Artculo, id_Solicitante) VALUES(ent,id_a,id_s);
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SolicitudesAceptadas` (IN `id_c` INT)   BEGIN
  SELECT solicitudentrega.*, cliente.nombre, articulo.nombre as nombre_c FROM solicitudentrega INNER JOIN articulo ON articulo.idArticulo = solicitudentrega.id_Artculo INNER JOIN cliente ON articulo.id_Cliente = cliente.idCliente AND solicitudentrega.id_Solicitante = id_c AND solicitudentrega.status = 1;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SolicitudesEntregadas` (IN `id_c` INTEGER)   BEGIN
  SELECT solicitudentrega.*, cliente.nombre, articulo.nombre as nombre_c FROM solicitudentrega INNER JOIN cliente ON solicitudentrega.id_Solicitante=cliente.idCliente INNER JOIN articulo ON articulo.id_Cliente = id_c AND articulo.idArticulo=solicitudentrega.id_Artculo AND solicitudentrega.status=2;
  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SolicitudesRecibidas` (IN `id_c` INT)   BEGIN
  SELECT solicitudentrega.*, cliente.nombre, articulo.nombre as nombre_c FROM solicitudentrega INNER JOIN cliente ON solicitudentrega.id_Solicitante=cliente.idCliente INNER JOIN articulo ON articulo.id_Cliente = id_c AND articulo.idArticulo=solicitudentrega.id_Artculo AND solicitudentrega.status=0;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `disponibilidad` int(11) NOT NULL DEFAULT 0,
  `localidad` varchar(45) NOT NULL,
  `publicacion` datetime NOT NULL,
  `id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `nombre`, `descripcion`, `disponibilidad`, `localidad`, `publicacion`, `id_Cliente`) VALUES
(10, 'PASTEL', 'pastel de chocolate', 0, 'Puebla', '2024-12-03 19:51:39', 1),
(11, 'Pantalon', 'Pantalon seminuevo.', 0, 'Hidalgo', '2024-12-03 19:57:52', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `username`, `password`, `tipo`) VALUES
(1, 'J Eduardo', 'Lalitho', '123', 0),
(2, 'Hugo', 'Hugol', '0000', 0),
(3, 'admin', 'admin', 'root', 1),
(4, 'Miryam', 'Miryam', '1111', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesarticulo`
--

CREATE TABLE `imagenesarticulo` (
  `idImagenesArticulo` int(11) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `id_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `imagenesarticulo`
--

INSERT INTO `imagenesarticulo` (`idImagenesArticulo`, `ruta`, `id_Articulo`) VALUES
(19, '../imagenes/pastel.jpg', 10),
(20, '../imagenes/pantalon1.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `id_Solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Disparadores `reporte`
--
DELIMITER $$
CREATE TRIGGER `PonerFecha` BEFORE INSERT ON `reporte` FOR EACH ROW BEGIN
    SET NEW.fecha_entrega = current_timestamp;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudentrega`
--

CREATE TABLE `solicitudentrega` (
  `idSolicitudEntrega` int(11) NOT NULL,
  `entrega` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `id_Artculo` int(11) NOT NULL,
  `id_Solicitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `imagenesarticulo`
--
ALTER TABLE `imagenesarticulo`
  ADD PRIMARY KEY (`idImagenesArticulo`),
  ADD KEY `id_Articulo` (`id_Articulo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `id_Solicitud` (`id_Solicitud`);

--
-- Indices de la tabla `solicitudentrega`
--
ALTER TABLE `solicitudentrega`
  ADD PRIMARY KEY (`idSolicitudEntrega`),
  ADD KEY `id_Artculo` (`id_Artculo`),
  ADD KEY `id_Solicitante` (`id_Solicitante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenesarticulo`
--
ALTER TABLE `imagenesarticulo`
  MODIFY `idImagenesArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudentrega`
--
ALTER TABLE `solicitudentrega`
  MODIFY `idSolicitudEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenesarticulo`
--
ALTER TABLE `imagenesarticulo`
  ADD CONSTRAINT `imagenesarticulo_ibfk_1` FOREIGN KEY (`id_Articulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`id_Solicitud`) REFERENCES `solicitudentrega` (`idSolicitudEntrega`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudentrega`
--
ALTER TABLE `solicitudentrega`
  ADD CONSTRAINT `solicitudentrega_ibfk_1` FOREIGN KEY (`id_Artculo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudentrega_ibfk_2` FOREIGN KEY (`id_Solicitante`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
