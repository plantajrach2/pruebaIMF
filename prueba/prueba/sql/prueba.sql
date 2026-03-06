-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-03-2026 a las 23:52:23
-- Versión del servidor: 8.4.3
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int NOT NULL,
  `nombre` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `hecha` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre`, `descripcion`, `fecha_apertura`, `fecha_cierre`, `hecha`) VALUES
(1, 'Rapel', 'El rapel es un sistema de descenso por superficies verticales utilizando técnicas de cuerdas.[1]​ Se utiliza en lugares donde el descenso de otra forma es complicado, o inseguro. El rapel es el sistema de descenso o ascenso autónomo ampliamente utili', '2025-06-12', '2025-06-30', 0),
(2, 'Alpinismo', 'El alpinismo es la más antigua y completa de las modalidades deportivas de montaña. Podría definirse como la acción de subir montañas, pero siempre por afán de superación, como respuesta a un impulso personal distinto en cada uno o por el placer de a', '2025-07-18', '2025-08-18', 0),
(3, 'Parachuting', 'Práctica de saltar desde una altura utilizando un paracaídas para amortiguar el impacto al aterrizar. Puede realizarse desde aviones, helicópteros o globos aerostáticos, y a menudo se practica como un deporte o actividad recreativa. ', '2025-08-07', '2025-12-12', 1),
(4, 'bungie', 'salto con liana, es una actividad en la cual una persona se lanza desde una altura elevada, con uno de los puntos de la cuerda elástica atada al torso o al tobillo, y el otro extremo sujetado al punto de partida del salto.', '2025-09-12', '2026-01-30', 0),
(5, 'Paracaidismo', 'La sensación de caída libre simplemente no tiene comparación, la adrenalina que recorre tu cuerpo y esa libertad plena,', '2025-05-31', '2025-07-01', 1),
(6, 'Kitesurf', 'Esta increíble actividad es relativamente nueva en México, sin embargo, ha tenido un éxito exponencial, ya que combina varias de las actividades favoritas de los entusiastas de los deportes extremos: surfing, wakeboarding y paragliding.', '2025-09-19', '2025-09-30', 0),
(7, 'Rafting', 'Juega y pelea contra fuertes corrientes de agua; no necesitas tener experiencia ni estar capacitado. Vive esta actividad en grupo y diviértete realizando el descenso en balsa en el río que elijas.', '2025-10-29', '2025-10-31', 0),
(8, 'Flyboard', 'Flota en el aire y haz todo tipo de piruetas, gracias a la presión de los chorros de agua de un jetski. Puede parecer una actividad muy difícil, pero después de varios intentos, pronto te convertirás en todo un experto.', '2025-10-08', '2026-10-30', 1),
(9, 'Tirolesa', 'Vence el miedo a las alturas, alcanza la cúspide de una montaña y deslízate a gran velocidad sobre las copas de los árboles; disfruta de una gran actividad que se ha convertido en la principal atracción de los amantes de la naturaleza y la aventura.', '2025-04-27', '2025-06-07', 0),
(10, 'Actividad', 'descripción actividad', '2026-03-09', '2026-03-25', 1),
(11, 'prueba 1', 'descripción de la actividad de prueba 1', '2026-03-09', '2026-04-01', 0),
(12, 'Prueba 2', 'Descripción de la actividad de prueba número 2.', '2026-03-12', '2026-03-26', 1),
(13, 'Actividad 3', 'Descripción de la actividad número 3.', '2020-12-02', '2026-03-26', 0),
(14, 'Actividad 4', 'Número de actividad número 4.', '2026-03-09', '2026-04-03', 1),
(15, 'Actividad 5', 'Descripción de actividad número 5.', '2026-03-04', '2026-03-25', 0),
(16, 'actividad 6', 'Descripción de actividad 6', '2026-03-19', '2026-03-30', 1),
(17, 'Actividad 7', 'Descripción de actividad numero 7 de pruebas.', '2026-03-26', '2026-03-31', 0),
(18, 'titulo 7', 'Descripción titulo 7 más descripciones.', '2026-03-16', '2026-03-26', 1),
(19, 'Titulo 8', 'Bien ahora titulo 8, pero sin realizado', '2026-03-24', '2026-03-31', 0),
(20, 'titulo 9', 'Titulo 9 sin hecha', '2026-03-17', '2026-03-27', 1),
(21, 'Tarea 10', 'veamos la tarea 10 si manda sin checked.', '2026-03-03', '2026-03-25', 0),
(22, 'act0', 'Actividdad de prueba', '2026-03-31', '2026-04-10', 0),
(23, 'Titulo 0', 'Titulo 0 para seguir pruebas', '2026-03-04', '2026-03-23', 0),
(24, 'tarea 11', 'Descripción de tarea 11', '2026-03-08', '2026-04-01', 1),
(25, 'Tarea 12', 'Descripción de tarea 12', '2026-03-17', '2026-03-20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int NOT NULL,
  `noempl` int DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `apprimero` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `apsegundo` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecing` date NOT NULL,
  `puesto` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `imss` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `curp` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `idEdoCivil` int NOT NULL,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `noempl`, `nombre`, `apprimero`, `apsegundo`, `fecing`, `puesto`, `imss`, `curp`, `idEdoCivil`, `direccion`, `updated_at`, `created_at`) VALUES
(1, 1, 'José', 'Huerta', 'Ramos', '1992-02-10', 'Gerente', 'KD124500185', 'CVOP899764GHNBVG09', 3, 'calle, colonia, #000', NULL, '2021-02-11 22:31:11'),
(2, 2, 'María', 'Cortes', 'Flores', '1990-02-14', 'Secretaria', 'IMSS1257000', 'XNKL012435609KN4', 1, 'calle, colonia, #000', NULL, '2021-02-11 22:32:36'),
(8, 1234, 'Bruno', 'Guzmán', 'Santiago', '1996-10-25', 'Soporte Informático', 'IMSSDBGS', 'GUSB251096XXX', 3, NULL, NULL, '2021-02-13 04:06:52'),
(10, 0, 'Estefnía', 'Flores', 'Estrada', '1995-05-12', 'Supervisora', 'KS6660147', 'KS666014709786yh', 1, NULL, NULL, '2025-05-11 19:05:51'),
(11, 18, 'Alejandro', 'Hernández', 'Cruz', '1989-12-01', 'Enfermero', '000000', 'AHC54321poiuvcx', 1, NULL, NULL, '2025-05-11 19:43:14'),
(12, 123, 'Paloma', 'Hurtado', '852', '2005-02-01', 'General', 'KS6660147', 'KS66601478552', 1, NULL, NULL, '2025-05-13 16:15:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEdoCivil` (`idEdoCivil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`idEdoCivil`) REFERENCES `estadocivil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
