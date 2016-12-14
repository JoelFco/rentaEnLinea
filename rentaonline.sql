-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2016 a las 06:22:28
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rentaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_producto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cantidadPedido` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `carrito`:
--   `id_producto`
--       `productos` -> `id`
--   `id_user`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `created_at`, `updated_at`) VALUES
(5, 'Infantil', '2016-12-14 02:47:06', '2016-12-14 02:47:06'),
(6, 'Adolecentes', '2016-12-14 02:47:17', '2016-12-14 02:47:17'),
(7, 'Adultos', '2016-12-14 02:47:33', '2016-12-14 02:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `totalCompra` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `compras`:
--   `id_user`
--       `users` -> `id`
--

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_user`, `totalCompra`, `created_at`, `updated_at`) VALUES
(45, 9, '50', '2016-12-14 02:52:39', '2016-12-14 02:52:39'),
(46, 9, '50', '2016-12-14 03:06:47', '2016-12-14 03:06:47'),
(47, 10, '50', '2016-12-14 10:03:14', '2016-12-14 10:03:14'),
(48, 11, '100', '2016-12-14 10:20:05', '2016-12-14 10:20:05'),
(49, 11, '50', '2016-12-14 10:43:15', '2016-12-14 10:43:15'),
(50, 9, '100', '2016-12-14 10:57:15', '2016-12-14 10:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_productos`
--

CREATE TABLE `compras_productos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `compras_productos`:
--   `id_compra`
--       `compras` -> `id`
--   `id_producto`
--       `productos` -> `id`
--

--
-- Volcado de datos para la tabla `compras_productos`
--

INSERT INTO `compras_productos` (`id`, `id_producto`, `id_compra`, `cantidad`, `importe`, `created_at`, `updated_at`) VALUES
(59, 26, 45, 1, '50', '2016-12-14 02:52:39', '2016-12-14 02:52:39'),
(60, 24, 45, 1, '50', '2016-12-14 03:06:48', '2016-12-14 03:06:48'),
(61, 24, 46, 1, '50', '2016-12-14 03:06:48', '2016-12-14 03:06:48'),
(62, 26, 47, 1, '50', '2016-12-14 10:03:14', '2016-12-14 10:03:14'),
(63, 30, 48, 2, '100', '2016-12-14 10:20:05', '2016-12-14 10:20:05'),
(64, 25, 49, 1, '50', '2016-12-14 10:43:15', '2016-12-14 10:43:15'),
(65, 23, 50, 2, '100', '2016-12-14 10:57:15', '2016-12-14 10:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `migrations`:
--

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `password_resets`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `productos`:
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `codigo`, `created_at`, `updated_at`) VALUES
(23, 'Snowden', 'Basada en el libro "The Snowden files.', 50, 2, 'snowden.jpg', 1234, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(24, 'Pete''s Dragon', 'Durante años el Sr. Meacham, un viejo tallador de madera, ha fascinado a los niños de la región', 50, 2, 'pete.jpg', 1254, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(25, 'Sausage Party', 'Salchichas, bollos, panecillos, pan de pita… Todos los alimentos viven felices en los estantes de un supermercado', 50, 2, 'salchi.jpg', 2345, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(26, 'Ben-Hur', 'Judah Ben-Hur (Jack Huston) es un príncipe falsamente acusado de traición por su hermano adoptivo Messala (Toby Kebbell)', 50, 2, 'ben.jpg', 2345, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(27, 'Finding Dory', 'Un año después de los acontecimientos narrados en "Buscando a Nemo", Dory vive apaciblemente con Marlin y su hijo Nemo', 50, 2, 'dory.jpg', 4456, '2016-12-13 20:48:53', '2016-12-14 02:45:04'),
(28, 'Sharknado', 'Fin y los suyos se enfrentan a un tornado de tiburones..', 50, 2, 'sharknado.jpg', 34565, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(29, 'I Am Bolt', 'Documental sobre el atleta Usain Bolt.', 50, 2, 'bolt.jpg', 2345, '2016-12-14 02:45:04', '2016-12-14 02:45:04'),
(30, 'Nemo', 'En las profundidades del gran Arrecife de Coral, Marlin, un pez payaso sobreprotector, se embarca en una peligrosa misión de rescate cuando su amado hijo, Nemo, es capturado por un buzo.', 50, 5, 'nemo.jpg', 10, '2016-12-14 04:18:43', '2016-12-14 04:19:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_categorias`
--

CREATE TABLE `productos_categorias` (
  `id_pc` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `productos_categorias`:
--   `id_categoria`
--       `categorias` -> `id`
--   `id_producto`
--       `productos` -> `id`
--

--
-- Volcado de datos para la tabla `productos_categorias`
--

INSERT INTO `productos_categorias` (`id_pc`, `id_producto`, `id_categoria`, `created_at`, `updated_at`) VALUES
(14, 23, 7, '2016-12-14 02:47:43', '2016-12-14 02:47:43'),
(15, 24, 5, '2016-12-14 02:47:48', '2016-12-14 02:47:48'),
(16, 25, 7, '2016-12-14 02:47:52', '2016-12-14 02:47:52'),
(17, 26, 6, '2016-12-14 02:47:55', '2016-12-14 02:47:55'),
(18, 27, 5, '2016-12-14 02:47:59', '2016-12-14 02:47:59'),
(19, 28, 6, '2016-12-14 02:48:03', '2016-12-14 02:48:03'),
(20, 29, 6, '2016-12-14 02:48:06', '2016-12-14 02:48:06'),
(21, 30, 5, '2016-12-14 04:20:18', '2016-12-14 04:20:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `membresia` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `address`, `phone`, `email`, `password`, `remember_token`, `membresia`, `created_at`, `updated_at`) VALUES
(9, 'humberto', 23, 'mina magistral', '6672013917', 'hummer12_12@hotmail.com', '$2y$10$oSditgvIkZtJWRSBgry78uHXUodhXeF5uDjpOddoQ255gcm56u7ta', 'cnyR76Zn7PnhTTPRcEbqwAEWjIKLAve6AmqoSx8q2mvOkaYb8nJ1bNNbVxw4', 1, '2016-12-14 02:44:25', '2016-12-14 10:58:15'),
(10, 'joel', 34, 'barrancos', '34521223445', 'joel@hotmail.com', '$2y$10$rfsjDa9R3Sc2aO.FM7TF7eYq9uh0F0B3vosB1qcfuq80nTy/omjAO', 'yDsyG6mCRvMlAKy1qEbW4K3CsTB9xoEzZWYrcbPUMbtjc9W4hKH62iPL4FhG', 0, '2016-12-14 09:55:07', '2016-12-14 11:09:32'),
(11, 'dani', 23, 'loma bella', '23456545677', 'dani@gmail.com', '$2y$10$kzWVPkHAQANxL6dAnGw1peKIHsuw/hy9HBSbo21JsbJKv0n3BUxXe', 'vklCI7QbtGhC6d0fy4foPI1PHuTfsUMJ60zH0NZbq1Y3oofcpHvdjlyeHgkD', 1, '2016-12-14 10:04:20', '2016-12-14 10:54:57'),
(12, 'jose', 34, 'chulavista', '345676544567', 'jose@gmail.com', '$2y$10$ji4FLzZZ082gZ.gVj9MaGeswA5wwrRrp6Bwp17RQyeC6IZw5Ma6am', 'lSdEXvgT1Us2nvJr5aWhA1fgg5FVnNe6qIHcICxZ5TpELNAbTsIFD6ynyZsk', 0, '2016-12-14 11:04:45', '2016-12-14 11:08:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras_productos`
--
ALTER TABLE `compras_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  ADD PRIMARY KEY (`id_pc`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `compras_productos`
--
ALTER TABLE `compras_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `productos_categorias`
--
ALTER TABLE `productos_categorias`
  MODIFY `id_pc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
