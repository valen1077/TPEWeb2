-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2024 a las 00:37:54
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
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libreria`
--

CREATE TABLE `libreria` (
  `id_libreria` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libreria`
--

INSERT INTO `libreria` (`id_libreria`, `nombre`, `direccion`) VALUES
(12, 'Librería Tandil Centro', 'Av. Colón 123'),
(13, 'El Rincón del Libro', 'Calle Belgrano 456'),
(14, 'Libros y Más', 'Calle Alem 789'),
(15, 'Tandil Bookstore', 'Av. España 101'),
(16, 'El Estante Mágico', 'Calle Mitre 202'),
(17, 'La Pluma Dorada', 'Calle Sarmiento 303');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(70) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `editorial` varchar(70) NOT NULL,
  `id_libreria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre_libro`, `genero`, `editorial`, `id_libreria`) VALUES
(1, 'El Alquimista', 'Ficción', 'Planeta', 12),
(2, 'Los años de peregrinación del chico sin color', 'Ficción', 'Tusquets', 13),
(3, 'Cien años de soledad', 'Realismo mágico', 'Sudamericana', 14),
(4, '1984', 'Ciencia ficción', 'Secker & Warburg', 15),
(5, 'Crimen y castigo', 'Ficción', 'Penguin Classics', 16),
(6, 'Don Quijote de la Mancha', 'Clásico', 'Francisco de Robles', 17),
(7, 'El Gran Gatsby', 'Ficción', 'Scribner', 12),
(8, 'Orgullo y prejuicio', 'Romántico', 'T. Egerton', 13),
(9, 'El retrato de Dorian Gray', 'Ficción', 'Lippincott\'s Monthly Magazine', 14),
(10, 'La sombra del viento', 'Ficción', 'Planeta', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `mail`, `password`) VALUES
(1, 'webadmin', '$2y$10$J.JBLIWqkmxWPcLpiu/.e.yK00UeY5wQO0cIKebWfvsMaOOcgH.Oa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libreria`
--
ALTER TABLE `libreria`
  ADD PRIMARY KEY (`id_libreria`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_libreria` (`id_libreria`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libreria`
--
ALTER TABLE `libreria`
  MODIFY `id_libreria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_libreria`) REFERENCES `libreria` (`id_libreria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
