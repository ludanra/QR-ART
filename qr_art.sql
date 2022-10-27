-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 14:54:28
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qr_art`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE `extra` (
  `cod_extra` int(6) NOT NULL,
  `categ_extra` text NOT NULL,
  `nombre_extra` text NOT NULL,
  `precio_extra` decimal(11,0) NOT NULL,
  `foto_extra` text NOT NULL,
  `estado_extra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `extra`
--

INSERT INTO `extra` (`cod_extra`, `categ_extra`, `nombre_extra`, `precio_extra`, `foto_extra`, `estado_extra`) VALUES
(1, '1', 'Cheddar', '200', 'chedar.jpg', 0),
(2, '2', 'Bacon', '200', 'bacon.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `cod_mesa` int(6) NOT NULL,
  `ubicacion_mesa` text NOT NULL,
  `categoria_mesa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(11) NOT NULL,
  `estado_ped` text NOT NULL,
  `cant_prod` int(2) NOT NULL,
  `fecha_hora_ped` datetime NOT NULL,
  `ult_act_ped` datetime NOT NULL,
  `forma_pago` text NOT NULL,
  `cod_pago_ped` int(20) NOT NULL,
  `cod_prod` int(6) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nro_item_ped` int(3) NOT NULL,
  `cod_extra` int(6) NOT NULL,
  `notas_ped` text NOT NULL,
  `cod_mesa` int(2) NOT NULL,
  `est_prod_ped` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `cod_perfil` int(6) NOT NULL,
  `nombre_perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`cod_perfil`, `nombre_perfil`) VALUES
(1, 'Administador'),
(2, 'Cocina'),
(3, 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_prod` int(6) NOT NULL,
  `categoria_prod` text NOT NULL,
  `nombre_prod` text NOT NULL,
  `precio_prod` decimal(10,0) NOT NULL,
  `detalle_prod` text NOT NULL,
  `foto_prod` text NOT NULL,
  `prod_disponible` tinyint(1) NOT NULL,
  `requiere_cocina` tinyint(1) NOT NULL,
  `est_baja_prod` tinyint(1) NOT NULL,
  `categ_extra` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_prod`, `categoria_prod`, `nombre_prod`, `precio_prod`, `detalle_prod`, `foto_prod`, `prod_disponible`, `requiere_cocina`, `est_baja_prod`, `categ_extra`) VALUES
(4, '4', 'Prueba Foto', '540', 'Prueba de foto', 'ok.jpg', 0, 0, 0, '3'),
(5, '1', 'prueba foto 2', '658', 'prueba foto 2', 'ok.jpg', 0, 0, 0, '1'),
(7, '1', 'Hamburguesa 1', '980', 'Hamburguesa Clásica con lechuga, tomate y cheddar', 'Hamburguesa1.jpg', 0, 0, 0, '1'),
(8, '3', 'Producto de prueba 24-10', '700', 'Producto de prueba', 'Hamburguesa2.jpg', 0, 0, 0, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` text NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `cod_perfil` int(2) NOT NULL,
  `nombre_usu` text NOT NULL,
  `apellido_usu` text NOT NULL,
  `est_baja_usu` text NOT NULL,
  `email_usu` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`, `cod_perfil`, `nombre_usu`, `apellido_usu`, `est_baja_usu`, `email_usu`, `id_usuario`, `token`) VALUES
('Mia19', 'b59c67bf196a4758191e42f76670ceba', 2, 'Mia', 'fleita', '', 'miafleita12@gmail.com', 47, '633ed1bd2c1a2'),
('antoo', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'antonella', 'alfonso', 'ACTIVO', 'antoo@gmail.com', 56, '634577ce44021'),
('Marting', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Martin', 'fleita', 'INACTIVO', 'Martingerardo@gmail.com', 68, '63457003e3c65'),
('Boca', 'b84bd99d065f6aab6fcd590ec1b5fe16', 3, 'Boca', 'Juniors', 'INACTIVO', 'bocajuniors@gmail.com', 70, ''),
('nicole', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Nicole', 'fleita', 'ACTIVO', 'nicole@gmail.com', 71, ''),
('tana', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Nicole', 'fleita', 'ACTIVO', 'tana@gmail.com', 72, ''),
('pepe', 'e10adc3949ba59abbe56e057f20f883e', 2, 'Nicole', 'fleita', 'ACTIVO', 'pepe@gmail.com', 73, ''),
('tina', '4124bc0a9335c27f086f24ba207a4912', 3, 'aaaa', 'asss', 'ACTIVO', 'ssdfgt@sllslsl', 74, ''),
('ludanra', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Luis Daniel', 'Ramos', 'ACTIVO', 'luidanramos@gmail.com', 75, '6356fecbc4d25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`cod_extra`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`cod_mesa`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `usuario` (`id_usuario`),
  ADD KEY `cod_mesa` (`cod_mesa`),
  ADD KEY `cod_extra` (`cod_extra`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_prod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `cod_perfil` (`cod_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `extra`
--
ALTER TABLE `extra`
  MODIFY `cod_extra` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `cod_perfil` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_prod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cod_mesa`) REFERENCES `mesa` (`cod_mesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
