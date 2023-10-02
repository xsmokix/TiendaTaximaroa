-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2023 a las 22:45:15
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taximaroa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes_inventario`
--

CREATE TABLE `ajustes_inventario` (
  `id` int(5) NOT NULL,
  `concepto` varchar(120) NOT NULL,
  `fecha` datetime NOT NULL,
  `clave_producto` int(15) NOT NULL,
  `nombre_producto` varchar(120) NOT NULL,
  `codigo_fabricante` varchar(50) NOT NULL,
  `existencia_anterior` varchar(20) NOT NULL,
  `ajustado_a` varchar(20) NOT NULL,
  `diferencia` varchar(20) NOT NULL,
  `precio_compra` float(10,2) NOT NULL,
  `monto` float(10,2) NOT NULL,
  `precio_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ajustes_inventario`
--

INSERT INTO `ajustes_inventario` (`id`, `concepto`, `fecha`, `clave_producto`, `nombre_producto`, `codigo_fabricante`, `existencia_anterior`, `ajustado_a`, `diferencia`, `precio_compra`, `monto`, `precio_venta`) VALUES
(1, 'Entrada', '2021-10-29 13:27:16', 13911, 'REPUESTO P/RODILLO MICROFIBRA 4', 'R-ROPI-420N', '0', '1', '1', 10.00, 10.00, 12.00),
(2, 'Entrada', '2021-10-29 13:27:16', 13911, 'REPUESTO P/RODILLO MICROFIBRA 4', 'R-ROPI-420N', '1', '10', '9', 15.00, 135.00, 20.00),
(3, 'Entrada', '2021-10-29 13:27:16', 13911, 'REPUESTO P/RODILLO MICROFIBRA 4', 'R-ROPI-420N', '10', '8', '-2', 18.00, -36.00, 24.00),
(4, 'Salida', '2021-10-29 13:27:16', 12097, 'CINCEL SDS, PLANO GRUESO', 'SDS-C2', '0', '0', '0', 10.00, 0.00, 15.00),
(5, 'Error inventario', '2021-10-29 13:27:16', 12097, 'CINCEL SDS, PLANO GRUESO', 'SDS-C2', '5', '3', '-2', 15.00, -30.00, 30.00),
(6, 'Caducidad', '2021-10-29 13:27:16', 12097, 'CINCEL SDS, PLANO GRUESO', 'SDS-C2', '3', '0', '0', 0.00, 0.00, 0.00),
(7, 'Entrada', '2021-10-29 13:27:16', 16821, 'MARTILLO FORJADO UNA PIEZA', 'MXR-20', '5', '0', '0', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(4) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1,
  `icono` varchar(25) NOT NULL DEFAULT 'fa-plug',
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `estado`, `icono`, `nombre`, `imagen`) VALUES
(1, 1, 'fa-plug', 'Material eléctrico', 'assets/images/categorias/Materialelectrico30.jpg'),
(2, 1, 'fa-toolbox', 'Ferretería 1', 'assets/images/categorias/ferreteria.jpg'),
(4, 1, 'fa-tools', 'Herramientas', 'assets/images/categorias/herramienta-electrica.jpg'),
(6, 1, 'fa-faucet', 'Plomería y grifería', 'assets/images/categorias/plomeria.jpg'),
(8, 1, 'fa-plug', 'Iluminación', 'assets/images/categorias/tornilleria.jpg'),
(9, 1, 'fa-tree', 'Jardinería', 'assets/images/categorias/categoria-2.jpg'),
(10, 1, 'fa-hand-sparkles', 'Limpieza', 'assets/images/categorias/infraestructura.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(6) NOT NULL,
  `id_productos` int(6) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `aprobado` int(1) NOT NULL DEFAULT 0,
  `leido` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_productos`, `usuario`, `comentario`, `fecha`, `aprobado`, `leido`) VALUES
(1, 13, '', 'Excelente calidad', '2021-04-01', 1, 1),
(2, 13, '', 'Excelente para exterior', '2021-04-01', 1, 1),
(4, 13, '', 'Excelente precio', '2021-04-01', 1, 1),
(5, 23, '', 'La bomba es de excelente calidad, ideal para espacios de 10m2', '2021-04-01', 0, 1),
(6, 12, '', 'Muy buen prioducto', '2021-04-01', 0, 1),
(7, 13, '', 'Buen producto', '2021-07-30', 1, 1),
(8, 11, '', 'Buen producto', '2021-07-30', 0, 1),
(9, 28, '', 'g', '2021-07-30', 1, 1),
(11, 11, '', 'Buen Producto', '2021-12-20', 0, 1),
(12, 11, 'osvaldo', 'Bien', '2022-01-06', 1, 1),
(13, 15, 'osvaldo', 'Buen producto', '2022-02-05', 0, 0),
(14, 17, 'OSVALDO', 'Muy buen producto', '2023-01-25', 1, 1),
(15, 17, 'OSVALDO', 'Excelente Produto', '2023-01-25', 1, 1),
(16, 17, 'Invitado', 'Comentario Prueba', '2023-01-25', 1, 1),
(17, 54, 'osvaldo', 'Excelente calidad del producto', '2023-05-16', 1, 1),
(18, 54, 'osvaldo', 'El producto cumple con su función', '2023-05-16', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES
(1, 'Osvaldo1 Ortiz1 Ortiz1', 'osvaldo1@gmail.com', 'este es mi mensaje, gracias', '2021-02-28'),
(2, 'Osvaldo1 Ortiz1 Ortiz1', 'osvaldo1@gmail.com', 'mensaje 2 gracias', '2021-02-28'),
(3, 'Osvaldo1 Ortiz1 Ortiz1', 'osvaldo1@gmail.com', 'mensaje de contacto 3 gracias', '2021-02-28'),
(4, 'Diana', 'berenice.maro29@gmail.com', 'hola', '2021-04-16'),
(5, 'Diana', 'berenice.maro29@gmail.com', 'Prueba', '2021-04-21'),
(6, 'asd', 'asdsa', 'asdasd', '2021-04-26'),
(7, 'asd', 'asdsa', 'asdasd', '2021-04-26'),
(8, 'asd', 'asdsa', 'asdasd', '2021-04-26'),
(9, 'asd', 'asdsa@gmail.com', 'asdasd', '2021-04-26'),
(10, 'Diana', 'berenice.maro29@gmail.com', 'hi', '2021-07-30'),
(11, 'A', 'GG', '545', '2021-09-01'),
(12, 'OMAR LEMUS', 'tecnimontacargasdemichoacan@hotmail.com', 'necesito facturar un tiket me podrian apoyar por favor', '2021-10-08'),
(13, 'Diana', 'berenice.maro@gmail.com', 'Holaa guapa!', '2021-12-17'),
(14, 'Jonathan Gabriel Froylán', 'jonathangf@live.com', 'Mensaje de Contacto', '2022-01-17'),
(15, 'Jonathan ', 'jonathangf@live.com', 'Consulta', '2022-02-05'),
(16, 'osvaldo ortiz', 'ortizortizosvaldo@gmail.com', 'test', '2022-11-03'),
(17, 'test', 'contacto@unasolucion.com.mx', 'test', '2022-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_clientes`
--

CREATE TABLE `datos_clientes` (
  `id` int(8) NOT NULL,
  `nombreCompleto` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `anuncios` int(1) NOT NULL DEFAULT 1,
  `fecha_registro` date NOT NULL,
  `hash` varchar(32) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `visto` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datos_clientes`
--

INSERT INTO `datos_clientes` (`id`, `nombreCompleto`, `telefono`, `correo`, `anuncios`, `fecha_registro`, `hash`, `activo`, `visto`) VALUES
(1, 'Osvaldo Ortiz Ortiz1', '4433399334', 'ultimocorreo@gmail.com', 1, '2020-03-14', '', 1, 1),
(2, 'Jorge Diaz Lopez', '4433445566', 'jorge@gmail.com', 1, '2020-04-12', '', 0, 1),
(4, 'Maribel Juarez Diaz', '4455667788', 'm.lopez@hotmail.com', 1, '2020-04-03', '', 0, 1),
(5, 'José Luis Navarro Lopez', '4455224411', 'juan.diaz@hotmail.com', 1, '2020-04-02', '', 0, 1),
(6, 'Julion Lopez Diaz', '4433564789', 'julio_lopex12@hotmail.com', 1, '2020-04-14', '', 0, 1),
(7, 'Maria Juarez Lopez', '4433221122', 'mariajua_12@gmail.com', 1, '2020-04-14', '', 0, 1),
(8, 'Mario Garcia Conejo', '4433909876', 'mariog12@gmail.com', 1, '2020-04-14', '', 0, 1),
(32, 'osvaldo ortiz', '44333333333', 'contacto@unasolucion.com.mx', 1, '2022-11-07', '7ce3284b743aefde80ffd9aec500e085', 1, 1),
(33, 'Jonathan', '4431047543', 'jonathangf@live.com', 1, '2022-11-15', 'cc1aa436277138f61cda703991069eaf', 1, 1),
(37, 'osvaldo oriz ortiz', '4433399334', 'ortizortizosvaldo1@gmail.com', 1, '2023-02-28', '23ce1851341ec1fa9e0c259de10bf87c', 0, 1),
(38, 'osvaldo ortiz ortiz', '4433399334', 'ortizortizosvaldo@gmail.com', 0, '2023-02-28', '8f121ce07d74717e0b1f21d122e04521', 1, 1),
(39, 'Gabriel Contreras', '4433270827', 'gerenciacomercial@taximaroamorelia.com.mx', 1, '2023-02-28', '92977ae4d2ba21425a59afb269c2a14e', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(10) NOT NULL,
  `id_datos_cliente` varchar(10) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero_exterior` int(8) NOT NULL,
  `numero_interior` int(8) DEFAULT NULL,
  `colonia` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `id_datos_cliente`, `calle`, `numero_exterior`, `numero_interior`, `colonia`, `cp`, `ciudad`, `municipio`, `estado`, `tipo`) VALUES
(1, '1', 'Av. Madero', 0, 0, 'Centro', 58150, 'Morelia', 'Morelia', 'Michoacán', 'alternativa'),
(9, '20', 'Av madero', 100, 0, 'Centro', 44100, 'Guadalajara', 'Guadalajara', 'Jalisco', ''),
(20, '', 'Laureles', 232, 2, 'Centro', 58000, 'a', 'b', 'Chihuahua', 'alternativa'),
(26, '1', 'Av madero', 0, 0, 'Centro', 58123, 'Aguascalientes', 'Aguascalientes', 'Aguascalientes', 'alternativa'),
(27, '1', '', 0, 0, '', 0, '', '', '', 'alternativa'),
(37, '32', '0', 0, 0, '0', 0, '0', '0', '0', 'principal'),
(38, '33', 'Insurgentes', 145, 0, 'Centro', 58830, 'Capacho', 'Huandacareo', 'Michoacán', 'alternativa'),
(39, '33', 'Carlos A. Madrazo', 75, 0, 'Puerta Blanca', 58096, 'MORELIA', 'Morelia', 'Michoacán', 'alternativa'),
(40, '33', 'Avenida 8 Poniente', 909, 0, 'San Pedro de los Frailes', 72000, 'Puebla', 'Puebla', 'Puebla', 'principal'),
(44, '37', '0', 0, 0, '0', 0, '0', '0', '0', 'principal'),
(45, '38', 'Av madero', 100, 0, 'Centro', 58150, 'Morelia', 'Morelia', 'Michoacán', 'alternativa'),
(46, '39', '0', 0, 0, '0', 0, '0', '0', '0', 'principal'),
(48, '1', 'Av madero', 5, 5, 'centro', 55555, 'Aguascalientes', 'Carmen', 'Campeche', 'alternativa'),
(49, '1', '5', 5, 5, '5', 5, '5sadsadsa', 'Selecciona tu municipio', 'Chiapas', 'alternativa'),
(50, '1', 'Av madero', 12, 5, 'centro', 58000, 'Aguascalientes', 'Champotón', 'Campeche', 'principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id` int(10) NOT NULL,
  `regimen` varchar(75) NOT NULL,
  `id_datos_clientes` int(10) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `colonia` varchar(35) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `correo_alt` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cfdi` varchar(50) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id`, `regimen`, `id_datos_clientes`, `razon_social`, `rfc`, `calle`, `numero`, `colonia`, `cp`, `correo`, `correo_alt`, `ciudad`, `municipio`, `estado`, `pais`, `cfdi`, `tipo`) VALUES
(1, 'RIF', 1, 'OSVALDO ORTIZ ORTIZ1', 'OIOO840719', 'Av madero', 1000, 'Centro', '58150', 'ortizortizosvaldo@gmail.com', '', 'Morelia', 'Morelia', 'Michoacán', 'México', 'I01', 'alternativa'),
(2, 'Personas Físicas con Actividades Empresariales y Profesionales', 1, 'Totam accusamus veni', 'Cupiditate co', 'Proident tenetur vo', 26, 'Illo ut iste est sed', '56', 'qimixaqa@mailinator.com', '0', 'Eius non proident v', 'Selecciona tu municipio', 'Jalisco', 'Beatae est nulla vol', 'G03', 'alternativa'),
(3, 'Personas Físicas con Actividades Empresariales y Profesionales', 38, 'OSVALDO ORTIZ ORTIZ', 'OIOO840719', 'Av madero', 100, 'Centro', '58150', 'ortizortizosvaldo@gmail.com', '', 'Morelia', 'Morelia', 'Michoacán', 'México', 'G02', 'principal'),
(4, 'RIF', 1, 'OSVALDO ORTIZ ORTIZ', 'OIOO840719', '', 0, '', '', 'ddd@dd.com', '', '', 'Selecciona tu municipio', 'Selecciona estado...', '', '', 'alternativa'),
(5, 'Consolidación', 1, '', 'OIOO840719', '', 0, '', '', 'ddd@dd.com', '', '', 'Selecciona tu municipio', 'Selecciona estado...', '', '', 'alternativa'),
(6, '$regimen', 12345, '$razonsocial', '$rfc', '$calle', 12, '$colonia', '11234', '$correo', '$correo_alt', '$ciudad', '$municipio', '$estado', '$pais', '$usocfdi', 'principal'),
(7, 'RIF', 1, 'NUEVA RAZON', 'OEDH823974', 'Av madero nva', 1, 'Centronva', '58000', 'ortizortizosvaldo@gmail.com', '', 'Morelianva', 'Aguascalientes', 'Aguascalientes', 'Méxiconva', 'I01', 'alternativa'),
(8, 'RIF', 1, 'nuevarazonsocial2', 'OIOO8407192', 'Av madero2', 12, 'Centro2', '58000', 'ortizortizosvaldo@gmail.com', '', 'Morelia2', 'Carmen', 'Campeche', 'México2', 'G03', 'alternativa'),
(9, 'Personas Morales con Fines no Lucrativos', 1, 'nuevarazonsocial3', 'OIOO8407193', 'Av madero3', 3, 'Centro3', '58000', 'ortizortizosvaldo@gmail.com', '', 'Morelia3', 'Asientos', 'Aguascalientes', 'México3', 'G02', 'alternativa'),
(10, 'Arrendamiento', 1, 'nuevarazon99', 'OIOO840719', 'Av madero', 12, 'Centro', '58000', 'ddd@dd.com', '', 'Morelia', 'San Miguel de Allende', 'Guanajuato', 'México', 'G02', 'principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapasitio`
--

CREATE TABLE `mapasitio` (
  `id` int(4) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mapasitio`
--

INSERT INTO `mapasitio` (`id`, `nombre`, `url`) VALUES
(1, 'Truper', 'ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=TRUPER'),
(2, 'Bosch', 'ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=BOSCH'),
(3, 'Dewalt', 'ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=DEWALT'),
(4, 'Makita', 'ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=MAKITA'),
(5, 'Skil', 'ver_categoria.php?categoria_seleccionada=todas&marca_seleccionada=SKIL'),
(6, 'Misión', 'nosotros.php'),
(7, 'Visión', 'nosotros.php'),
(8, 'Contacto', 'contacto.php'),
(9, 'Envíos', 'preguntas-frecuentes-envios.php'),
(10, 'Facturación', 'preguntas-frecuentes-facturacion.php'),
(11, 'Compras', 'preguntas-frecuentes-compra.php'),
(12, 'Devoluciones', 'preguntas-frecuentes-devoluciones.php'),
(13, 'Aviso de privacidad', 'aviso-de-privacidad.php'),
(14, 'Términos y condiciones', 'terminos-y-condiciones.php'),
(15, 'Nueva cuenta de usuario', 'clientes/registrarse.php'),
(16, 'Iniciar sesión', 'clientes/registrarse.php'),
(17, 'Ubicación', 'contacto.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(3) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `marca` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `orden` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `estado`, `marca`, `imagen`, `orden`) VALUES
(2, 1, 'BOSCH', 'bosch.jpg', 5),
(3, 1, 'DEWALT', 'dewalt.jpg', 2),
(4, 1, 'MAKITA', 'makita.jpg', 3),
(5, 1, 'SKIL', 'skil.jpg', 4),
(8, 1, 'TRUPER', 'TRUPER76.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `id_categoria` int(2) NOT NULL,
  `icono` varchar(25) NOT NULL DEFAULT 'fa-plug',
  `nombre` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `id_categoria`, `icono`, `nombre`, `orden`, `activo`) VALUES
(10, 4, 'fa-tools', 'Herramientas', 5, 1),
(11, 2, 'fa-toolbox', 'Ferretería 1', 1, 0),
(12, 9, 'fa-tree', 'Jardinería', 2, 1),
(13, 6, 'fa-faucet', 'Plomería y Grifería', 4, 1),
(15, 8, 'fa-plug', 'Iluminación', 3, 1),
(16, 10, 'fa-hand-sparkles', 'Limpieza', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_datos_cliente` int(10) NOT NULL,
  `numero_pedido` varchar(250) NOT NULL,
  `PaypalDatos` text NOT NULL,
  `fecha` datetime NOT NULL,
  `correo` varchar(100) NOT NULL,
  `total` float(10,2) NOT NULL,
  `costoEnvio` float(10,2) NOT NULL,
  `paqueteria` varchar(50) NOT NULL,
  `direccion_entrega` int(6) NOT NULL,
  `id_facturacion` int(6) NOT NULL,
  `metodoPago` varchar(50) NOT NULL,
  `guia` varchar(45) NOT NULL,
  `estatus` varchar(35) NOT NULL,
  `pagovalido` int(1) NOT NULL DEFAULT 0,
  `motivo` text NOT NULL,
  `leido` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `id_datos_cliente`, `numero_pedido`, `PaypalDatos`, `fecha`, `correo`, `total`, `costoEnvio`, `paqueteria`, `direccion_entrega`, `id_facturacion`, `metodoPago`, `guia`, `estatus`, `pagovalido`, `motivo`, `leido`) VALUES
(1, 1, 1, 'fff4a37a', 'PaypalDatos', '2021-10-14 13:23:04', 'correo', 1873.53, 94.53, '', 1, 0, 'Stripe', '12342134', 'proceso', 1, '', 1),
(3, 1, 1, '4efeb148', 'PaypalDatos', '2021-10-14 13:24:46', 'correo', 2933.22, 134.22, '', 1, 0, '', '', 'proceso', 0, '', 1),
(4, 1, 1, 'b358b0ff', 'PaypalDatos', '2021-10-14 13:25:44', 'correo', 8003.22, 134.22, '', 1, 0, 'MercadoPago', '', 'proceso', 0, '', 1),
(5, 1, 1, '7053af24', 'PaypalDatos', '2021-10-14 14:10:09', 'correo', 104.53, 94.53, '', 1, 0, 'Stripe', '', 'proceso', 0, '', 1),
(6, 1, 1, '9efd9c16', 'PaypalDatos', '2021-10-14 14:40:23', 'correo', 208.09, 136.97, '', 1, 0, 'MercadoPago', '', 'creado', 0, '', 1),
(7, 1, 1, 'cc0b71c1', 'PaypalDatos', '2021-10-14 18:00:51', 'correo', 6883.32, 94.53, '', 1, 1, 'Stripe', '', 'creado', 0, '', 1),
(8, 0, 0, 'aca8af25', 'PaypalDatos', '2021-10-16 19:57:01', 'correo', 1873.53, 94.53, '', 1, 0, '', '', 'creado', 0, '', 1),
(9, 0, 0, '393b2012', 'PaypalDatos', '2021-10-16 20:17:55', 'correo', 1873.53, 94.53, '', 1, 0, '', '', 'creado', 0, '', 1),
(10, 0, 0, '4d1c78cf', 'PaypalDatos', '2021-10-17 23:24:23', 'correo', 1873.53, 94.53, '', 0, 0, '', '', 'creado', 0, '', 1),
(12, 1, 1, '811d58cd', 'PaypalDatos', '2021-10-18 13:57:01', 'correo', 146.97, 136.97, '', 1, 0, '', '', 'creado', 0, '', 1),
(13, 1, 1, 'afc46a4f', 'PaypalDatos', '2021-10-19 09:18:51', 'correo', 205.34, 134.22, '', 9, 0, '', '', 'creado', 0, '', 1),
(14, 1, 1, '1640ea44', 'PaypalDatos', '2021-10-19 11:48:36', 'correo', 231.20, 134.22, '', 9, 0, '', '', 'creado', 0, '', 1),
(17, 1, 1, '86e1d4c5', 'PaypalDatos', '2021-10-22 10:57:19', 'correo', 3185.88, 121.80, '', 9, 0, '', '', 'creado', 0, '', 1),
(24, 1, 1, '33a9f29b', 'PaypalDatos', '2021-10-22 11:11:11', 'correo', 235.30, 121.80, '', 9, 0, 'Stripe', '', 'creado', 0, '', 1),
(26, 0, 20, '379a9f2d', 'PaypalDatos', '2021-10-23 10:48:16', 'correo', 632.50, 139.17, 'REDPACK', 0, 0, '', '', 'creado', 0, '', 1),
(27, 1, 1, '868cf9e5', 'PaypalDatos', '2021-10-23 12:27:35', 'correo', 1341.19, 117.19, 'AMPM', 9, 0, 'Stripe', '', 'creado', 0, '', 1),
(28, 1, 1, 'b6e27aa8', 'PaypalDatos', '2021-10-27 12:02:47', 'correo', 421.07, 117.19, 'AMPM', 9, 0, '', '', 'creado', 0, '', 1),
(29, 1, 1, 'eb29c4be', 'PaypalDatos', '2021-10-31 12:12:21', 'correo', 159.17, 139.17, 'REDPACK', 9, 0, '', '', 'creado', 0, '', 1),
(30, 1, 1, 'f76979de', 'PaypalDatos', '2021-11-12 18:03:20', 'correo', 2058.17, 139.17, 'REDPACK', 9, 0, 'Stripe', '', 'creado', 0, '', 1),
(31, 0, 0, '90e5df89', 'PaypalDatos', '2021-11-15 17:46:55', 'correo', 104.53, 94.53, '', 0, 0, '', '', 'creado', 0, '', 1),
(36, 1, 1, '028c18c2', 'PaypalDatos', '2021-11-25 13:34:25', 'correo', 133.71, 117.19, 'AMPM', 9, 0, 'Stripe', '', 'cancelado', 0, 'agregué un producto erroneo quiero hacer el pedido de nuevo gracias', 1),
(37, 1, 1, '7792782b', 'PaypalDatos', '2021-11-25 15:26:16', 'correo', 155.69, 139.17, 'REDPACK', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(40, 1, 1, '49bc19be', 'PaypalDatos', '2021-11-29 10:47:58', 'correo', 519.48, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(41, 1, 1, '7c8024b5', 'PaypalDatos', '2021-11-29 11:31:55', 'correo', 210.29, 139.17, 'REDPACK', 1, 0, '', '', 'creado', 0, '', 1),
(42, 1, 1, '286599df', 'PaypalDatos', '2021-11-30 11:23:23', 'correo', 141.19, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(43, 1, 1, '986f02b9', 'PaypalDatos', '2021-12-03 09:39:30', 'correo', 141.19, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(45, 1, 1, 'dba90a62', 'PaypalDatos', '2021-12-03 10:29:49', 'correo', 524.64, 149.64, 'ESTAFETA', 1, 0, '', '', 'creado', 0, '', 1),
(46, 1, 1, '41945ead', 'PaypalDatos', '2021-12-03 11:34:13', 'correo', 4216.19, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(47, 1, 1, 'e0528073', 'PaypalDatos', '2021-12-06 15:01:21', 'correo', 4216.19, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(50, 1, 1, '5638dba5', 'PaypalDatos', '2021-12-06 16:29:34', 'correo', 141.19, 117.19, 'AMPM', 1, 0, '', '', 'creado', 0, '', 1),
(52, 0, 1, '559759d8', 'PaypalDatos', '2021-12-07 16:07:30', 'correo', 155.69, 139.17, 'REDPACK', 1, 0, '', '', 'creado', 0, '', 1),
(54, 1, 1, '89e07b76', 'PaypalDatos', '2021-12-14 15:17:46', 'correo', 4698.17, 139.17, 'REDPACK', 9, 0, '', '', 'creado', 0, '', 1),
(58, 0, 1, '83a16e54', 'PaypalDatos', '2021-12-14 15:37:48', 'correo', 5087.36, 139.17, 'REDPACK', 9, 0, '', '', 'creado', 0, '', 1),
(59, 1, 1, '0625c299', 'PaypalDatos', '2021-12-14 15:40:17', 'correo', 29604.82, 117.19, 'AMPM', 9, 0, '', '', 'creado', 0, '', 1),
(60, 1, 1, '1a9f22d3', 'PaypalDatos', '2021-12-16 15:39:58', 'correo', 330.55, 117.19, 'AMPM', 9, 0, '', '', 'creado', 0, '', 1),
(66, 1, 1, 'bcf8d569', 'PaypalDatos', '2021-12-22 13:31:15', 'correo', 198.69, 94.53, 'AMPM', 9, 0, 'Stripe', '', 'cancelacionsolicitada', 0, 'Prueba', 1),
(67, 1, 1, 'bf080786', 'PaypalDatos', '2022-01-06 13:07:45', 'correo', 111.05, 94.53, 'AMPM', 9, 0, '', '', 'creado', 0, '', 1),
(68, 0, 0, '1dadee03', 'PaypalDatos', '2022-01-07 21:47:06', 'correo', 0.00, 0.00, '', 9, 0, '', '', 'creado', 0, '', 1),
(69, 1, 1, 'de865164', 'PaypalDatos', '2022-02-17 13:28:58', 'correo', 182.77, 158.77, 'AMPM', 9, 0, '', '', 'cancelacionaceptada', 0, 'ME PODRIAN CANCELAR EL PEDIDO', 1),
(70, 0, 0, 'ce5bfbdc', 'PaypalDatos', '2022-02-24 09:51:51', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(71, 0, 0, '6db5224a', 'PaypalDatos', '2022-03-14 11:53:28', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(72, 0, 0, '53e5fb2b', 'PaypalDatos', '2022-03-20 12:22:50', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(73, 0, 0, '6e8b2f9d', 'PaypalDatos', '2022-03-22 09:22:58', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(74, 0, 0, '41bfd2fb', 'PaypalDatos', '2022-04-05 13:32:00', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(75, 0, 0, '7853aee5', 'PaypalDatos', '2022-04-13 11:41:28', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(76, 0, 0, '5fdf34f5', 'PaypalDatos', '2022-04-14 17:31:09', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(77, 0, 0, 'baeaf11a', 'PaypalDatos', '2022-04-21 09:38:59', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(78, 0, 0, '0d6a3c64', 'PaypalDatos', '2022-05-08 02:23:17', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(79, 0, 0, '7af15f44', 'PaypalDatos', '2022-06-29 15:40:39', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(80, 0, 0, 'c98ed4b5', 'PaypalDatos', '2022-09-09 11:17:11', 'correo', 0.00, 0.00, '', 1, 0, '', '', 'creado', 0, '', 1),
(81, 0, 0, 'c55aebb1', 'PaypalDatos', '2022-09-12 09:31:59', 'correo', 0.00, 0.00, '', 9, 0, '', '', 'creado', 0, '', 1),
(82, 1, 1, '224e9219', 'PaypalDatos', '2022-09-23 13:58:28', 'correo', 533.19, 180.69, 'AMPM', 26, 0, '', '', 'cancelado', 0, '', 1),
(83, 1, 1, '6ef82dab', 'PaypalDatos', '2022-09-29 10:07:43', 'correo', 97.07, 93.07, '99MINUTOS', 1, 0, '', '234234234', 'proceso', 1, '', 1),
(85, 1, 1, '47664B6D', 'PaypalDatos', '2022-12-27 18:40:27', 'correo', 71.00, 59.00, 'taximaroa', 27, 0, '', '896234896234', 'finalizado', 0, '', 1),
(87, 34, 38, '351BF91D', 'PaypalDatos', '2023-03-04 11:54:56', 'correo', 1637.97, 108.97, 'AMPM', 0, 3, '', '', 'creado', 0, '', 1),
(113, 1, 1, '517A87E0', 'PaypalDatos', '2023-03-07 17:09:39', 'correo', 544.00, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(114, 1, 1, 'c5dc4224', 'PaypalDatos', '2023-03-07 17:20:40', 'correo', 544.00, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(115, 1, 1, '7ac77782', 'PaypalDatos', '2023-03-07 17:22:26', 'correo', 2249.00, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(117, 1, 1, 'C5ED4E5E', 'PaypalDatos', '2023-03-07 17:32:53', 'correo', 4511.93, 0.00, 'tienda', 1, 0, 'Mercadopago', '', 'creado', 0, '', 1),
(118, 1, 1, 'fe8c4ffa', 'PaypalDatos', '2023-03-07 17:57:34', 'correo', 1357.75, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(119, 1, 1, '2f33d013', 'PaypalDatos', '2023-03-07 17:59:34', 'correo', 3809.00, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(120, 1, 1, 'bf6f97b6', 'PaypalDatos', '2023-03-07 18:14:31', 'correo', 2586.20, 0.00, 'tienda', 1, 0, 'Stripe', '', 'creado', 0, '', 1),
(123, 1, 1, '81CBB314', 'PaypalDatos', '2023-03-08 14:30:49', 'correo', 546.00, 0.00, 'tienda', 1, 0, 'Paypal', '', 'cancelacionaceptada', 0, 'me equivoque', 1),
(124, 1, 1, '7fac1261', 'PaypalDatos', '2023-03-08 15:06:42', 'correo', 3809.00, 0.00, 'tienda', 1, 0, '', '', 'creado', 0, '', 1),
(126, 1, 1, '484B87A6', 'PaypalDatos', '2023-03-14 12:36:34', 'correo', 552.00, 0.00, 'tienda', 50, 9, 'Stripe', '', 'creado', 0, '', 1),
(136, 1, 1, 'D8AF0806', 'PaypalDatos', '2023-04-20 14:50:17', 'correo', 71.60, 69.60, '99MINUTOS', 50, 0, 'MercadoPago', '', 'creado', 0, '', 0),
(139, 1, 1, 'A8937869', 'PaypalDatos', '2023-04-20 15:05:57', 'correo', 71.60, 69.60, '99MINUTOS', 50, 10, '', '', 'creado', 0, '', 0),
(141, 1, 1, '78EC1960', 'PaypalDatos', '2023-04-20 15:31:37', 'correo', 2332.53, 69.60, '99MINUTOS', 50, 10, '', '', 'creado', 0, '', 0),
(142, 1, 1, '4886339a', 'PaypalDatos', '2023-04-24 15:42:57', 'correo', 613.60, 69.60, '99MINUTOS', 50, 0, '', '', 'creado', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalles`
--

CREATE TABLE `pedidos_detalles` (
  `id` int(10) NOT NULL,
  `numero_pedido` varchar(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos_detalles`
--

INSERT INTO `pedidos_detalles` (`id`, `numero_pedido`, `id_producto`, `precio`, `cantidad`) VALUES
(1, 'fff4a37a', 43, 1779.00, 1),
(3, '4efeb148', 51, 2799.00, 1),
(4, 'b358b0ff', 53, 7869.00, 1),
(5, '7053af24', 11, 10.00, 1),
(6, '9efd9c16', 12, 71.12, 1),
(7, 'cc0b71c1', 23, 2262.93, 3),
(9, '811d58cd', 11, 10.00, 1),
(10, 'afc46a4f', 12, 71.12, 1),
(11, '1640ea44', 14, 96.98, 1),
(16, '86e1d4c5', 51, 2799.00, 1),
(17, '86e1d4c5', 12, 71.12, 1),
(18, '86e1d4c5', 14, 96.98, 2),
(21, '33a9f29b', 14, 96.98, 1),
(22, '33a9f29b', 13, 16.52, 1),
(25, '379a9f2d', 14, 96.98, 1),
(26, '379a9f2d', 18, 9.70, 5),
(27, '379a9f2d', 17, 347.85, 1),
(28, '868cf9e5', 42, 1224.00, 1),
(29, 'b6e27aa8', 16, 303.88, 1),
(30, 'eb29c4be', 11, 20.00, 1),
(31, 'f76979de', 39, 1919.00, 1),
(36, '028c18c2', 13, 16.52, 1),
(37, '7792782b', 13, 16.52, 1),
(40, '49bc19be', 11, 24.00, 1),
(41, '49bc19be', 12, 71.12, 2),
(42, '49bc19be', 13, 16.52, 2),
(43, '49bc19be', 14, 96.98, 2),
(44, '49bc19be', 15, 9.05, 1),
(45, '7c8024b5', 12, 71.12, 1),
(46, '286599df', 11, 24.00, 1),
(47, '986f02b9', 11, 24.00, 1),
(50, 'dba90a62', 12, 71.12, 1),
(51, 'dba90a62', 16, 303.88, 1),
(52, '41945ead', 52, 4099.00, 1),
(53, 'e0528073', 52, 4099.00, 1),
(56, '5638dba5', 11, 24.00, 1),
(58, '559759d8', 13, 16.52, 1),
(60, '89e07b76', 44, 4559.00, 1),
(67, '83a16e54', 13, 16.52, 2),
(68, '83a16e54', 12, 71.12, 1),
(69, '83a16e54', 11, 24.00, 1),
(70, '83a16e54', 20, 1635.00, 1),
(71, '83a16e54', 24, 1228.45, 1),
(72, '83a16e54', 19, 19.40, 1),
(73, '83a16e54', 29, 1879.00, 1),
(74, '83a16e54', 26, 58.18, 1),
(75, '0625c299', 46, 4009.00, 1),
(76, '0625c299', 16, 303.88, 4),
(77, '0625c299', 26, 58.18, 1),
(78, '0625c299', 33, 1529.00, 1),
(79, '0625c299', 11, 24.00, 1),
(80, '0625c299', 12, 71.12, 2),
(81, '0625c299', 13, 16.52, 1),
(82, '0625c299', 14, 96.98, 3),
(83, '0625c299', 15, 9.05, 1),
(84, '0625c299', 20, 1635.00, 2),
(85, '0625c299', 24, 1228.45, 1),
(86, '0625c299', 32, 5199.00, 1),
(87, '0625c299', 17, 347.85, 2),
(88, '0625c299', 21, 2573.28, 1),
(89, '0625c299', 22, 1357.75, 1),
(90, '0625c299', 53, 7869.00, 1),
(91, '1a9f22d3', 12, 71.12, 3),
(98, 'bcf8d569', 12, 71.12, 1),
(99, 'bcf8d569', 13, 16.52, 2),
(100, 'bf080786', 13, 16.52, 1),
(101, 'de865164', 11, 24.00, 1),
(102, '224e9219', 16, 303.88, 1),
(103, '6ef82dab', 56, 2.00, 1),
(104, '6ef82dab', 57, 2.00, 1),
(106, '47664B6D', 55, 12.00, 1),
(108, '351BF91D', 33, 1529.00, 1),
(134, '517A87E0', 54, 544.00, 1),
(135, 'c5dc4224', 54, 544.00, 1),
(136, '7ac77782', 35, 2249.00, 1),
(139, 'C5ED4E5E', 23, 2262.93, 1),
(140, 'C5ED4E5E', 35, 2249.00, 1),
(141, 'fe8c4ffa', 22, 1357.75, 1),
(142, '2f33d013', 36, 3809.00, 1),
(143, 'bf6f97b6', 24, 1228.45, 1),
(144, 'bf6f97b6', 22, 1357.75, 1),
(147, '81CBB314', 57, 2.00, 1),
(148, '81CBB314', 54, 544.00, 1),
(150, '484B87A6', 57, 2.00, 4),
(151, '484B87A6', 54, 544.00, 1),
(161, 'D8AF0806', 57, 2.00, 1),
(164, 'A8937869', 57, 2.00, 1),
(166, '78EC1960', 25, 2262.93, 1),
(167, '4886339a', 54, 544.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(4) NOT NULL,
  `usuario` varchar(70) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `pregunta` text NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `usuario`, `correo`, `pregunta`, `fecha`, `estado`) VALUES
(1, 'Osvaldo', '', 'asdassad', '2021-08-26', 1),
(2, 'Osvaldo', '', 'asdsada', '2021-08-26', 1),
(3, 'Osvaldo', '', 'pregunta', '2021-08-26', 1),
(4, 'Osvaldo', '', 'sdsddds', '2021-08-26', 1),
(5, 'Osvaldo', '', 'sadasds', '2021-08-26', 1),
(6, 'Osvaldo', '', 'ioh', '2021-08-26', 1),
(7, 'Osvaldo', '', 'asdsad', '2021-08-26', 1),
(8, 'Osvaldo', '', 'ÑJLKJÑ', '2021-09-01', 1),
(9, 'Osvaldo', '', 'JKLJKL', '2021-09-01', 1),
(10, 'Osvaldo', '', '5455454', '2021-09-01', 1),
(11, 'Osvaldo', '', 'esfdgsdfg', '2021-09-03', 1),
(12, 'Osvaldo', '', 'DAFAD', '2021-09-08', 1),
(13, 'Osvaldo Ortiz Ortiz', 'jkadajlk@gmail.com', 'PREGUNTA DE PRUEBA', '2023-01-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_frecuentes`
--

CREATE TABLE `preguntas_frecuentes` (
  `id` int(8) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` text NOT NULL,
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas_frecuentes`
--

INSERT INTO `preguntas_frecuentes` (`id`, `categoria`, `pregunta`, `respuesta`, `estado`) VALUES
(1, 'envios', '¿Cuánto debo esperar para recibir mi pedido?', 'El tiempo de recepción del pedido, esta determinado por la cobertura de la paquetería dentro de la región de entrega. Sin embargo, durante el proceso de tu compra, al seleccionar la paquetería se muestra, el tempo en días aproximados de entrega.', 1),
(2, 'envios', '¿Dónde puedo consultar la ubicación de mi pedido?', 'Posterior a la confirmación de pedido, debería consultar la recepción de un correo con el número de guía de su pedido. Al disponer con el número de guía de su pedido, podrá consultar en el sitio web de la paquetería seleccionada la ubicación de su pedido.', 1),
(3, 'envios', '¿Qué pasa si no se encuentra nadie en mi domicilio durante la entrega? ', 'Se notificará en el domicilio, el intento de entrega, el cual incluirá las indicaciones para completar la recepción de su pedido.\r\n\r\n', 1),
(4, 'envios', '¿Qué puedo hacer si no recibí mi pedido? ', 'Se debe tomar en cuenta que el tiempo de entrega es variable dependiendo de la región seleccionada. En caso de que exceda el tiempo estimado de entrega. Le pedimos se comunique a la brevedad a contacto@taximaroamorelia.com.mx\r\n\r\n', 1),
(5, 'envios', '¿Mi pedido llegó incompleto, dañado, o no coincide con lo que pedí?', 'En caso de que su pedido presente alguna de estas situaciones. Le pedimos se comunique a contacto@taximaroamorelia.com.mx\r\n\r\n', 1),
(6, 'facturacion', '¿Cómo puedo facturar? ', 'Al finalizar el pedido, se mostrará la opción de solicitar el documento fiscal de tu compra completando la información requerida. La entregará de la factura se realizará mediante su correo electrónico proporcionado (s)', 1),
(7, 'compra', '¿Cómo puedo realizar una compra? ', '• Seleccione él/los productos de tu pedido.\r\n• Agréguelos al carrito de compra.\r\n• Regístrese o inicie sesión cual sea el caso.\r\n• Verificar el domicilio de entrega y seleccionar la paquetería.\r\n• Seleccionar la forma y método de pago a utilizar.', 1),
(8, 'compra', '¿Qué formas o métodos de pago están disponibles en su sitio web?', '• Tarjeta de débito y crédito.\r\n• Deposito OXXO.\r\n• Transferencia interbancaria.\r\n• Mercado Pago.\r\n• Paypal', 1),
(9, 'compra', '¿Cuentan con el tipo de venta de mayoreo? ', 'Para obtener información a detalle contacte a ventas@taximaroamorelia.com.mx o al TEL: (443) 3230827 EXT. 103\r\n\r\n', 1),
(10, 'facturacion', 'Pregunta de PRUEBA', 'Todas', 1),
(11, 'devoluciones', '¿Cómo puedo devolver mi pedido?', 'Si desea realizar el proceso de devolución. Le pedimos se contacte al TEL: (443) 3 230827 EXT. 107 o al correo electrónico <a href=\"mailto:contacto@taximaroamorelia.com.mx\">contacto@taximaroamorelia.com.mx', 1),
(12, 'devoluciones', '¿En qué casos puedo solicitar la devolución de mi pedido?', 'Cuando se encuentre en su pedido un defecto de fabricación o defectos descritos en la garantía del producto.', 1),
(13, 'devoluciones', '¿Tiene cargo adicional el envío de la devolución?', 'La devoluciones cuentan con un cargo adicional de acuerdo a las circunstancias de la devolución. ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1,
  `clave_producto` int(10) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `marca` varchar(75) NOT NULL,
  `categoria` int(5) NOT NULL,
  `submenu` int(2) NOT NULL,
  `descripcion_corta` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `codigo_fabricante` varchar(35) NOT NULL,
  `precio_compra` float(10,2) NOT NULL,
  `precio_venta` float(10,2) NOT NULL,
  `impuesto` float(10,2) NOT NULL,
  `IVA` float(10,2) NOT NULL,
  `existencia` int(10) NOT NULL,
  `clave_unidad` varchar(35) NOT NULL,
  `clave_linea` varchar(35) NOT NULL,
  `clave_marca` varchar(35) NOT NULL,
  `foto1` varchar(120) NOT NULL,
  `foto2` varchar(120) NOT NULL,
  `foto3` varchar(120) NOT NULL,
  `maximo` int(5) NOT NULL,
  `minimo` int(5) NOT NULL,
  `ubicacion_zona` varchar(75) NOT NULL,
  `ubicacion_pasillo` varchar(75) NOT NULL,
  `ubicacion_anaquel` varchar(75) NOT NULL,
  `ubicacion_repisa` varchar(75) NOT NULL,
  `descuento` float(10,2) NOT NULL DEFAULT 0.00,
  `producto_inactivo` varchar(10) NOT NULL,
  `valorcfdi` varchar(35) NOT NULL,
  `ancho` float(10,2) NOT NULL,
  `alto` float(10,2) NOT NULL,
  `largo` float(10,2) NOT NULL,
  `peso` float(10,2) NOT NULL,
  `persCalificaron` int(8) NOT NULL,
  `calificacion` int(8) NOT NULL,
  `tipo_envio` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `activo`, `clave_producto`, `nombre`, `marca`, `categoria`, `submenu`, `descripcion_corta`, `descripcion`, `codigo_fabricante`, `precio_compra`, `precio_venta`, `impuesto`, `IVA`, `existencia`, `clave_unidad`, `clave_linea`, `clave_marca`, `foto1`, `foto2`, `foto3`, `maximo`, `minimo`, `ubicacion_zona`, `ubicacion_pasillo`, `ubicacion_anaquel`, `ubicacion_repisa`, `descuento`, `producto_inactivo`, `valorcfdi`, `ancho`, `alto`, `largo`, `peso`, `persCalificaron`, `calificacion`, `tipo_envio`) VALUES
(13, 1, 12500, 'CINTAS DE AISLAR 18 m x 19 mm', 'TRUPER', 1, 2, 'Fabricada en PVC con base de adhesivo acrílico es retardante de flama e inhibe la corrosión de conductores eléctricos', 'Cintas fabricadas en PVC con base de adhesivo acrílico\r\nRetardantes a la flama y autoextinguibles\r\nInhiben la corrosión de conductores eléctricos\r\nAislamiento eléctrico en alambres y cables con capacidad nominal de hasta 500V', 'M-33', 0.00, 16.52, 0.00, 0.00, 5, 'Pieza', '', '', 'assets/images/productos/M3334.jpg', 'assets/images/productos/M3394.jpg', 'assets/images/productos/M3334.jpg', 0, 0, '', '', '', '', 5.00, '0', '', 0.00, 0.00, 0.00, 0.00, 2, 9, 'paqueteria'),
(14, 1, 12097, 'CINCEL SDS, PLANO GRUESO', 'TRUPER', 1, 0, 'Descripción corta del producto...', 'Fabricado en acero al cromo.\r\nCincel plano grueso 1 1/2\".\r\nPara rotomartillos electroneumáticos modelos ROEL-50N y ROEL-20N marca Truper®.', 'SDS-C2', 0.00, 0.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/SDSC262.jpg', 'assets/images/productos/SDSC262.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'paqueteria'),
(15, 1, 12501, 'CINTAS DE AISLAR 9 m x 19 mm', 'TRUPER', 1, 0, 'Descripción corta del producto...', 'Cintas fabricadas en PVC con base de adhesivo acrílico\r\nRetardantes a la flama y autoextinguibles\r\nInhiben la corrosión de conductores eléctricos\r\nAislamiento eléctrico en alambres y cables con capacidad nominal de hasta 500V', 'M-22', 0.00, 9.05, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/M227.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 2, 6, 'taximaroa'),
(16, 1, 15503, 'LLAVE AJUSTABLE PERICA', 'TRUPER', 1, 2, 'Descripción corta del producto...', 'Forjados en acero al cromo vanadio.\r\nCon acabado pavonado.\r\nGraduación en pulgadas y milímetros.\r\nDiseño ergonómico.\r\nIdeales para mecánicos y herreros.', 'PET-12', 0.00, 303.88, 0.00, 0.00, 5, 'Litro', '', '', 'assets/images/productos/PET1266.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'paqueteria'),
(17, 1, 16821, 'MARTILLO FORJADO UNA PIEZA', 'TRUPER', 2, 0, 'Descripción corta del producto...', 'Forjados en una sola pieza de acero alto carbono.\r\nMango con neopreno.\r\nPara uso en carpintería, construcción, albañilería y hogar.', 'MXR-20', 0.00, 0.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/MXR2032.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 2, 8, 'taximaroa'),
(18, 1, 19857, 'MANGUERA PARA JARDÍN', 'TRUPER', 2, 7, 'Descripción corta del producto...', 'Mangueras de PVC fabricadas en 3 capas\r\nRefuerzos de hilo de alta tenacidad\r\nSin conexiones\r\nJardinería', 'MAN-1/2R', 0.00, 9.70, 0.00, 0.00, 10, '', '', '', 'assets/images/productos/MAN12R48.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'paqueteria'),
(19, 1, 19859, 'MANGUERA PARA JARDÍN', 'TRUPER', 2, 0, 'Descripción corta del producto...', 'Mangueras de PVC fabricadas en 3 capas\r\nRefuerzos de hilo de alta tenacidad\r\nSin conexiones\r\nJardinería', 'MAN-3/4R', 0.00, 19.40, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/MAN34R2.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(20, 1, 10887, 'FUMIGADOR DE MOCHILA tipo 425, 15 LITROS', 'TRUPER', 2, 0, 'Descripción corta del producto...', 'Pipeta de latón, manguera de PVC y tanque traslúcido de polietileno de alta densidad que permite ver el nivel del líquido\r\nBoquilla de plástico ajustable (chorro-cono), empaques de nitrilo NBR resistentes a químicos, aceites y solventes\r\nSistema de bombeo de pistón central y agitador mecánico\r\nAgrícola\r\nPara fertilización y control de insectos', 'FM-425', 0.00, 1635.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/FM42590.jpg', 'assets/images/productos/FM42537.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(21, 1, 16295, 'MOTOSIERRA ELÉCTRICA 18\"', 'TRUPER', 4, 0, 'Descripción corta del producto...', 'Sistema automático de lubricación para la barra y la cadena\r\nBarra y cadena de bajo contragolpe\r\nPerilla para ajuste de tensión de la cadena y depósito de aceite con ventana para revisión del nivel\r\nProtector de barra para mayor seguridad y cuidado de la cadena\r\nLigero, para diámetros de corte en una sola operación de hasta 18\" (457.2mm)', 'MOTE-18', 0.00, 2573.28, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/MOTE1816.jpg', 'assets/images/productos/MOTE1865.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(22, 1, 12600, 'BOMBA SUMERGIBLE PLÁSTICA PARA AGUA LIMPIA 3/4 HP', 'TRUPER', 6, 0, 'Descripción corta del producto...', 'Motor con bobinas de cobre, 2 veces mayor durabilidad\r\nCapacitor para mayor potencia al arranque\r\nBalero metálico\r\nUso doméstico\r\nPara instalaciones en cisternas y llenado de tinacos', 'BOS-3/4LP', 0.00, 1357.75, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/BOS34LP28.jpg', 'assets/images/productos/BOS34LP76.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(23, 1, 12608, 'BOMBA SUMERGIBLE METÁLICA PARA AGUA SUCIA 1-1/2 HP', 'TRUPER', 6, 0, 'Descripción corta del producto...', 'Motor con bobinas de cobre, 2 veces mayor durabilidad\r\nCapacitor para mayor potencia al arranque\r\nBalero metálico\r\nRecomendada para uso doméstico, granjas, desagües, fuentes y albercas\r\nPara trabajar con agua sucia para bombeo en sistema de desagüe doméstico, fuentes, aguas negras y líquidos con sólidos de hasta 34mm', 'BOS-1-1/2SM', 0.00, 2262.93, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/BOS112SM84.jpg', 'assets/images/productos/BOS112SM48.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 1, 4, 'paqueteria'),
(24, 1, 12601, 'BOMBA SUMERGIBLE PLÁSTICA PARA AGUA LIMPIA 1/2 HP', 'TRUPER', 6, 0, 'Descripción corta del producto...', 'Motor con bobinas de cobre, 2 veces mayor durabilidad\r\nCapacitor para mayor potencia al arranque\r\nBalero metálico\r\nUso doméstico\r\nPara instalaciones en cisternas y llenado de tinacos', 'BOS-1/2LP', 0.00, 1228.45, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/BOS12LP86.jpg', 'assets/images/productos/BOS12LP56.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(25, 1, 15001, 'BOMBA SUMERGIBLE METÁLICA PARA AGUA LIMPIA USO RUDO 1/2 HP', 'TRUPER', 6, 0, 'Descripción corta del producto...', 'Motor con bobinas de cobre, 2 veces mayor durabilidad\r\nCapacitor para mayor potencia al arranque\r\nBalero metálico\r\nRecomendada para uso doméstico, granjas, desagües, fuentes y albercas\r\nPara bombear agua fresca y limpia de manantiales, pozos y otras reservas de agua y cisternas', 'BOS-1/2LPX', 0.00, 2262.93, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/BOS12LPX72.jpg', 'assets/images/productos/BOS12LPX32.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'paqueteria'),
(26, 1, 13295, 'GUANTES DE NYLON TRUPER 13295 - GUX-NIT-L', 'TRUPER', 2, 0, 'Descripción corta del producto...', 'Nylon elástico, recubiertos con nitrilo\r\nMáxima sensibilidad\r\nResistentes al corte\r\nSujeción firme en entornos secos y ligeramente aceitosos\r\nUsos en metalmecánica\r\n\r\nTalla: Grande', '', 0.00, 58.18, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/8.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(27, 1, 0, 'MINIESMERILADORA DE 900W GWS 9-115 BOSCH 06017900G0', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Motor de alta potencia de 900 vatios para un avance de trabajo más rápido.\r\nGran eficiencia de trabajo gracias a la larga vida útil y duración de las escobillas.\r\nForma ergonómica para el máximo control en diferentes posiciones de sujeción.\r\nEnfriamiento directo para una elevada capacidad de sobrecarga y una larga vida útil.\r\nCaperuza protectora con seguro contra torsión: para ajustes rápidos y sencillos, además de una mayor protección.', '06017900G0', 0.00, 2429.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/06017900G064.jpg', 'assets/images/productos/06017900G036.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 1, 4, 'taximaroa'),
(28, 1, 0, 'ROTOMARTILLO 1/2 V.V. RE. 550W GSB 550 RE BOSCH', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Potente motor 550W, resistente y robusto, perforaciones con y sin impacto, reversible y control de velocidad electrónica. Resistente mandril de metal de alta calidad.\r\n\r\nManejo confortable y ergonómico.\r\nNuevo diseño compacto y mejorado.\r\nSin percusión/ con percusión.\r\nLimitador de profundidad y empuñadura auxiliar ergonómica.\r\nInterruptor electrónico: Facilita el uso de la herramienta adecuando la rotación al\r\nmaterial.\r\nLlave de mandril más resistente, vida útil más larga.', '06017900G0', 0.00, 1709.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/06017900G041.jpg', 'assets/images/productos/06017900G037.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 1, 5, 'taximaroa'),
(29, 1, 0, 'TALADRO ROTOMARTILLO BOSCH GSB 13 RE 1/2 PULG + MALETÍN', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Perforación máxima hasta 13 mm en concreto / albañilería\r\nBotón de conmutación para perforación con y sin percusión.\r\nHerramienta versátil para perforaciones en diferentes materiales\r\nPotencia: 650 W\r\nRevoluciones: 0-3,150 min.', '060123D5G1', 0.00, 1879.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/060123D5G173.jpg', 'assets/images/productos/060123D5G158.jpg', 'assets/images/productos/060123D5G134.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(30, 1, 0, 'TALADRO ROTOMARTILLO BOSCH GSB 20-2 RE DE 800 W', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Ideal para hormigón, ladrillo, acero y madera.\r\n\r\n\r\nPotente motor de 800 W para diversas aplicaciones\r\nHerramienta versátil con capacidad de 20 mm de perforación\r\nRevoluciones: 0-1100/3000 rpm\r\nCapacidad del portabrocas: 1.5 - 13 mm\r\n', '06011A21G0', 0.00, 4369.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/06011A21G077.jpg', 'assets/images/productos/06011A21G041.jpg', 'assets/images/productos/06011A21G091.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(31, 1, 0, 'MARTILLO PERFORADOR BOSCH GBH 2-26 DRE DE 800 WATTS', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Sistema electro-neumático de percusión\r\nSistema de encaje SDS-Plus\r\nPorta escobillas giratorio (misma potencia en el giro reversible)\r\nDiámetro de cuello de husillo de 50 m para una mayor robustez\r\nEmpuñadura suave Softgrip en la empuñadura principal y auxiliar', '0611253734', 0.00, 5169.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/061125373446.jpg', 'assets/images/productos/06112537344.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'paqueteria'),
(32, 1, 0, 'MARTILLO PERFORADOR PROFESIONAL GBH 2-24D + ATORNILLADOR BOSCH GO', 'BOSCH', 4, 0, 'Descripción corta del producto...', 'Realiza todo tipo de tareas gracias a este increíble martillo perforador\r\nSDS Plus trabaja en mampostería, metal y madera, más Atornillador diseñado para apretar y aflojar tornillos.\r\n\r\nMartillo Perforador Bosch GBH 2-24 D Professional.\r\n\r\nCaracterísticas:\r\nLarga vida útil y componentes del motor de alta calidad.\r\nVario Lock para ajuste del cincel y del escoplo.\r\nEmbrague de seguridad y velocidad variable.\r\nAlta capacidad de perforación.\r\nAlto rendimiento de trabajo.\r\nSeguridad a la máquina y al usuario al cincelar (pequeñas demoliciones).\r\nPortaherramientas SDS-plus.\r\n1 año de garantía.', '1619GBHBGO', 0.00, 5199.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/1619GBHBGO93.jpg', 'assets/images/productos/1619GBHBGO25.jpg', 'assets/images/productos/1619GBHBGO34.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(33, 1, 0, ' LIJADORA ORBITAL DE 5', 'DEWALT', 1, 0, 'Descripción corta del producto...', 'Mango de goma sobremoldeado para un mayor confort y control.\r\nEl diseño de contrapeso separado reduce la vibración.\r\nPuerto de acople innovador para bolsa de recolección de polvo y aspiradora.', 'DWE6421', 0.00, 1529.00, 0.00, 0.00, 5, ' ', '', ' ', 'assets/images/productos/DWE642188.jpg', 'assets/images/productos/DWE642130.jpg', 'assets/images/productos/DWE642120.jpg', 0, 0, '', ' ', ' ', '', 0.00, '0', ' ', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(34, 1, 0, 'ROTOMARTILLO ATORILLADOR DE 1/2\" INALÁMBRICO 20V', 'DEWALT', 4, 0, 'Descripción corta del producto...', 'Taladro/atornillador potente motor entrega 300 UWO de poder. Dos velocidades, 0 - 450 / 1.500 RPM. Doble función, atornillador y martillo percutor. Mandril Auto ajustable, permite cambios de accesorios en forma rápida. Luz led, permite al usuario mayor visibilidad en el área de trabajo. Compacto y liviano, permite al usuario acceder a lugares estrechos. Mango ergonómico provee control y comodidad.', 'DCD776C2-B3', 0.00, 3939.00, 0.00, 0.00, 5, '', '', '', 'assets/images/productos/DCD776C2B351.jpg', 'assets/images/productos/DCD776C2B336.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(35, 1, 0, 'ATORNILLADOR PARA TABLAROCA', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Atornillador para Tablaroca Makita FS4200\r\n\r\nEl Atornillador para Tabla-Roca FS4200 de Makita (0-4,000 RPM) ofrece velocidad, potencia y ergonomía para trabajos en tabla-roca. Es ideal para atornillar de tabla-roca a pernos de acero.\r\nMotor de 6 Amperes Produce 4,000 RPM\r\nEl FS4200 tiene un motor con potencia de 6 amperes que produce 0-4,000 RPM e incluye gatillo de velocidad variable con botón fijador para uso continuo. El localizador ajustable de profundidad con Sure-Lock™ de Makita está diseñado para atornillar a una profundidad constante.', 'FS4200A', 0.00, 2249.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/FS4200A83.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(36, 1, 0, 'CORTADORA DE METAL DE 14\" ', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Potencia: 2000W\r\nEmpuñadura en forma D para una fácil manipulación\r\nGuarda para desviación de chispas da seguridad al operador\r\nPlaca guía ajustable a 45 grados izquierda y derecha en 3 posiciones\r\nPrensa de rápido ajuste', '2414NB', 0.00, 3809.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/2414NB78.jpg', 'assets/images/productos/2414NB68.jpg', 'assets/images/productos/2414NB23.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(37, 1, 0, 'MINIESMERILADORA DE 4 1/2\"', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Diámetro del disco: 115 mm (4 1/2\")\r\nGrosor máximo del disco: 6,4 mm (1/4\")\r\nVelocidad sin carga: 11,000 rpm\r\nLongitud total: 266 mm (10 1/2\")\r\nRosca del eje: 5/8\"', 'GA4530', 0.00, 1979.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/GA453069.jpg', 'assets/images/productos/GA453011.jpg', 'assets/images/productos/GA453060.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(38, 1, 0, 'ESMERILADORA DE 115 MM (4-1/2\") ', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Potencia: 720 w\r\nDisco: 115 x 6 x 22.23 mm (4-1/2\"x 1/4\" x 7/8\")\r\nInterruptor de paleta fácil de operar con una mano sosteniendo la carcasa del motor.\r\nCuerpo de circunferencia pequeña y empuñadura lateral ergonómicamente diseñados para un fácil manejo.\r\nConstrucción de laberinto protege todos los baleros del polvo y restos de material.', 'GA4534', 0.00, 1619.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/GA453448.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(39, 1, 0, 'LIJADORA ORBITAL DE 5', 'MAKITA', 1, 0, 'Descripción corta del producto...', 'La Lijadora de 5\" con Órbita Aleatoria (modelo BO5030) de Makita, ofrece rapidez con un suave desempeño con mejor ajuste y control.\r\n\r\nLa BO5030 es ideal para trabajadores de madera y carpinteros de terminados que requieren la mejor lijadora con órbita aleatoria en su clase.\r\n\r\nLa BO5030 presenta un sistema de control de la base que controla la velocidad desde el inicio, con un poderoso motor de 3 amperes para una operación continua, acción orbital de aleatoria de 1/8\" y 12,000 OPM para un lijado suave y rápido.\r\n\r\nLa BO5030 tiene una construcción de baleros con ingeniería de precisión para mayor duración de la herramienta.', 'BO5030', 0.00, 1919.00, 0.00, 0.00, 0, '   ', '', '   ', 'assets/images/productos/BO503029.jpg', '', '', 0, 0, '', '   ', '   ', '', 0.00, '0', '   ', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(40, 1, 0, 'MINIESMERILADORA ANGULAR  4 1/2 PULG', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Herramienta potente de 10,000 RPM para operación de cortes, desbastes y lijados.\r\n\r\nCaracterísticas:\r\nGuarda protectora.\r\nLlave de contratuerca.\r\nBotón de bloqueo en el centro del interruptor.\r\nInterruptor ergonómico de paleta.\r\nCuerpo delgado para una fácil maniobrabilidad con la derecha o izquierda.\r\nInterruptor largo proporciona confort a los dedos.', '9557HPG', 0.00, 1549.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/9557HPG41.jpg', 'assets/images/productos/9557HPG90.jpg', 'assets/images/productos/9557HPG42.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(41, 1, 0, 'MINI ESMERILADORA ANGULAR SSP 4-1/2 720W', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Alto rendimiento y durabilidad a menor costo\r\nDiseño compacto', 'M9507G', 0.00, 1239.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/M9507G7.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(42, 1, 0, 'MINIESMERILADORA DE 4 1/2\"', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Compacta y poderosa\r\nControl con solo una mano\r\nCuerpo pequeño para fácil manipulación\r\nAgarre ergonómico\r\nPotencia: 540 W\r\n\r\n', 'M0901G', 0.00, 1224.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/M0901G76.jpg', 'assets/images/productos/M0901G95.jpg', 'assets/images/productos/M0901G49.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(43, 1, 0, 'ROTOMARTILLO DE 5/8\" Y 710 WATTS', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Poderoso motor de 710 Watts\r\nGolpes por minuto: 0 - 48000 gpm\r\nLongitud total: 296 mm (11- 5/8\")\r\nEmpuñadura diseñada ergonómicamente con neopreno\r\nFuerte carcasa del motor en forma cilíndrica', 'HP1630', 0.00, 1779.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/HP163073.jpg', 'assets/images/productos/HP16308.jpg', 'assets/images/productos/HP163020.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(44, 1, 0, 'ROTOMARTILLO SDS PLUS 15/16\" 780W ', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Diseño nuevo, más resistente, preparado para trabajos más duros.\r\n3 modos de trabajo, taladro percutor, taladro y cincelador.\r\nSistema neumático más resistente y fuerte.\r\nSistema eléctrico simplificado, más fácil de reparar.\r\nBloqueo de marcha en vacio.', 'HR2470', 0.00, 4559.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/HR247069.jpg', 'assets/images/productos/HR247020.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(45, 1, 0, 'ROTOMARTILLO ATORNILLADOR DE 1/2PULG', 'MAKITA', 4, 0, 'Descripción corta del producto...', '- Realiza todo tipo de tareas en casa gracias a este increíble martillo, mampostería, madera, acero etc.\r\n\r\nRotormatillo atornillador inalámbrico 18 V.\r\nCaja de rodamiento de aluminio sólido.\r\nRanuras de ventilación diseñadas para dirigir el escape de aire lejos del operador.\r\nCarcasa fácil para agarrar con una pequeña circunferencia.\r\nMás control y confort.', 'PH02', 0.00, 3619.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/PH0228.jpg', 'assets/images/productos/PH0233.jpg', 'assets/images/productos/PH0270.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(46, 1, 0, 'ROTOMARTILLO INALAMBRICO 1/2 18V LI-ION', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Caja de rodamiento de aluminio sólido.\r\n\r\n·Ranuras de ventilación diseñadas para dirigir el escape de aire lejos del operador\r\n\r\n·Carcasa fácil para agarrar con una pequeña circunferencia', 'PH02X2', 0.00, 4009.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/PH02X267.jpg', 'assets/images/productos/PH02X234.jpg', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(47, 1, 0, 'ROTOMARTILLO DE 1/2\" DE 710 W', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Potencia: 710 W\r\nVoltaje: 120 V\r\nAmper: 6,2 A\r\nVelocidad sin carga: 0-3,200 rpm\r\nGolpes por minuto: 0-48,000 gpm\r\n\r\n\r\nFrecuencia: 50/60 Hz\r\nCapacidades en concreto: 16 mm (5/8\")\r\nCapacidades en madera: 30 mm (1 3/16\")\r\nCapacidades en acero: 13 mm (1/2\")\r\nLongitud total: 296 mm (11 5/8\")\r\nConsumo de energía en operación: 0,2901 kWh', 'M8100G', 0.00, 1749.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/M8100G8.jpg', 'assets/images/productos/M8100G70.jpg', 'assets/images/productos/M8100G71.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(48, 1, 0, 'SIERRA CALADORA DE 450W', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Modelo: 4327K\r\nLigera con potencia de entrada de 450W.\r\nEmpuñadura ergonómicamente diseñada con neopreno para mayor control y confort.\r\nPuede ser usada una sierra de calar gruesa.\r\nInclinación de corte de 0 a 45 grados a la derecha o izquierda.\r\n\r\n\r\nCubierta para polvo previene la dispersión de polvo.\r\nSilenciosa y menor vibración.', '4327K', 0.00, 2429.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/4327K35.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(49, 1, 0, 'SIERRA CIRCULAR DE 7 1/4\" + ESTUCHE', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Motor poderoso de 15 amp, demostrado para suministrar 2.300 W en el lugar de trabajo.\r\nProfundidad máxima del corte: 90° (2 1/2\"), 45° (1 3/4\")\r\nSoplador de polvo incorporado\r\nVelocidad sin carga: 5,800 rpm\r\nLongitud total: 12 1/2\"', '5007NK', 0.00, 3669.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/5007NK84.jpg', 'assets/images/productos/5007NK5.jpg', 'assets/images/productos/5007NK46.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(50, 1, 0, 'PULIDORA DE 5 PULG 470 W + DISCO DE GOMA', 'SKIL', 4, 0, 'Descripción corta del producto...', 'La pulidora Skil de 470 Watts brinda el mayor desempeño profesional al mejor costo y beneficio, diseñada para uso en talleres como lavados de autos para encerados y pulidos, carrocería, pulidor de fibra de vidrio, pulido de vidrio y metal de pulido con los accesorios adecuados.', 'F0129051AA', 0.00, 1399.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/F0129051AA35.jpg', 'assets/images/productos/F0129051AA72.jpg', 'assets/images/productos/F0129051AA27.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(51, 1, 0, 'SIERRA CIRCULAR SKIL 5200 DE 7 1/4 PULG 1200 W', 'SKIL', 4, 0, 'Descripción corta del producto...', 'Sierra Circular especialmente diseñada para uso profesional de cortes longitudinales o transversales en madera, incluye un disco de carburo de tungsteno para cortes limpios y perfectos a 45 grados máximo 45 mm de profundidad y a 90 grados hasta 65 mm de profundidad.', 'F0125200AA', 0.00, 2799.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/F0125200AA97.jpg', 'assets/images/productos/F0125200AA35.jpg', 'assets/images/productos/F0125200AA37.jpg', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 3, 10, 'taximaroa'),
(52, 1, 0, 'TALADRO DE 1/2 740W', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Velocidad variable para controlar la perforación.\r\nBotón de trabajo continuo grande y localizado convenientemente.\r\nLa empuñadura lateral, puede ser sujetada por cualquiera de los dos lados de la herramienta para mejorar el control.\r\nPotencia 740W\r\nCapacidad: Acero 13mm (1/2\"), Madera 36mm (1-3/8\")\r\nVelocidad sin carga 0-550rpm\r\nLongitud total 285mm\r\nPeso neto: 2.2kg', '6302H', 0.00, 4099.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/6302H57.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(53, 1, 0, 'TALADRO MEZCLADOR DE HELICE ', 'MAKITA', 4, 0, 'Descripción corta del producto...', 'Mezcladora UT2204 Makita\r\n\r\nMezcladora de trabajo pesado y alta velocidad.\r\n· Mango de neopreno ergonómicamente diseñado para una operación confortable.\r\n·La cubierta anti-polvo protege el motor y las partes de la trasmisión. Mezclador de trabajo pesado y alta velocidad.\r\nPotencia 850W\r\nDiámetro del disco 220mm (8-5/8?)\r\nVelocidad sin carga 550rpm\r\nDimensiones (LxAxA) 929x89x152mm (36-1/2?x3-1/2?x6?)\r\nPeso neto 3.4kg (7.5lbs)\r\nCable de conexión 2.5 m (8.2 ft)', 'UT2204', 0.00, 7869.00, 0.00, 0.00, 0, '', '', '', 'assets/images/productos/UT220452.jpg', '', '', 0, 0, '', '', '', '', 0.00, '0', '', 0.00, 0.00, 0.00, 0.00, 0, 0, 'taximaroa'),
(54, 1, 14432, 'ARNES DE CUERPO COMPLETO CON 1 ANILLO', 'TRUPER', 2, 16, 'Descripción corta del producto...', 'Arnés De Cuerpo Completo, 1 Anillo, Ansi', 'ARN-5435', 329.74, 544.00, 16.00, 16.00, 3, 'Pieza', 'FERRETERIA', 'TR', 'assets/images/productos/ARN543525.jpg', 'assets/images/productos/ARN543550.jpg', '', 1, 10, 'ZW', 'PW', 'AW', '2', 100.00, '0', '46182306', 30.00, 30.00, 30.00, 2.68, 1, 5, 'paqueteria'),
(55, 1, 121212, 'EnvioLocal', 'TRUPER', 1, 2, 'Descripción corta del producto...', 'Envio local', '1', 11.00, 12.00, 0.00, 16.00, 1, '1', '0', '0', 'assets/images/productos/148.jpg', '', '', 2, 1, '1', '1', '1', '11', 0.00, '0', '1', 11.00, 11.00, 11.00, 2.00, 0, 0, 'taximaroa'),
(56, 1, 121213, 'EnvioNacional', 'TRUPER', 1, 2, 'Descripción corta del producto...', 'envio solo nacional', '1', 1.00, 2.00, 0.00, 16.00, 1, '1', '0', '0', 'assets/images/productos/115.jpg', '', '', 2, 1, '1', '1', '1', '1', 0.00, '0', '1', 1.00, 1.00, 1.00, 1.00, 0, 0, 'paqueteria'),
(57, 1, 121214, 'EnvioLocalNacional', 'TRUPER', 1, 2, 'Descripción corta del producto...', 'envio local o nacional', '1', 1.00, 2.00, 0.00, 16.00, 1, '1', '0', '0', 'assets/images/productos/11.jpg', '', '', 1, 1, '1', '1', '1', '1', 0.00, '0', '1', 0.00, 0.00, 0.00, 1.00, 0, 0, 'paqtax'),
(58, 1, 48006, 'EXTENSION ELECTRICA 3M TRUPER', 'BOSCH', 2, 7, 'Descripción corta del producto...', 'ADSFRAFGAFDG JFAGGGGGGGGGJJAFKKJFGJKFADKJFKAG', 'EX-3', 10.00, 20.00, 0.00, 16.00, 3, 'PZ', '0', '0', 'assets/images/productos/EX393.jpg', 'assets/images/productos/EX354.jpg', 'assets/images/productos/EX358.jpg', 0, 0, 'ALMACEN', '6', 'A2', '5', 0.00, '0', '00001111001', 10.00, 15.00, 20.00, 1.50, 0, 0, 'paqtax');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(4) NOT NULL,
  `promocion` varchar(150) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `url` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `promocion`, `imagen`, `url`, `estado`) VALUES
(8, 'Combo de impermiabilizantes de 4 productos', 'assets/images/promociones/activas/15.jpg', 'https://ferreteriataximaroa.com.mx/ver_producto.php?id_producto=17', 1),
(9, 'Combo de adhesivos de 3 productos', 'assets/images/promociones/activas/218.jpg', '2', 1),
(10, 'Combo de impermiabilizado para casa', 'assets/images/promociones/activas/372.jpg', '3', 1),
(11, 'Combo de productos Sika', 'assets/images/promociones/activas/490.jpg', '4', 1),
(12, 'Paquete de 4 productos Fester y Sika', 'assets/images/promociones/activas/545.jpg', '5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendados`
--

CREATE TABLE `recomendados` (
  `id` int(8) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `url` varchar(120) NOT NULL,
  `orden` int(3) NOT NULL DEFAULT 0,
  `imagen` varchar(150) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `recomendados`
--

INSERT INTO `recomendados` (`id`, `producto`, `url`, `orden`, `imagen`, `estado`) VALUES
(1, 'Recomendado en Martillo', 'https://ferreteriataximaroa.com.mx/ver_producto.php?id_producto=17', 3, 'assets/images/recomendados/activos/Recomendadoherreros98.jpg', 1),
(2, 'Recomendado herreros', 'https://ferreteriataximaroa.com/ver_producto.php?id_producto=44', 4, 'assets/images/recomendados/activos/Recomendadoherreros98.jpg', 1),
(3, 'Recomendados carpitería', 'https://ferreteriataximaroa.com/ver_producto.php?id_producto=44', 2, 'assets/images/recomendados/activos/Recomendadoscarpitera52.jpg', 1),
(4, 'Recomendados jardinería', 'https://ferreteriataximaroa.com/ver_producto.php?id_producto=44', 2, 'assets/images/recomendados/activos/Recomendadosjardinera22.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen` varchar(75) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `nombre`, `imagen`, `estado`) VALUES
(2, '', 'assets/images/slider/19', 1),
(5, '', 'assets/images/slider/48', 1),
(8, 'Test1', 'assets/images/slider/Test16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `id` int(2) NOT NULL,
  `idmenu` int(2) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `url` varchar(100) NOT NULL,
  `orden` int(2) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`id`, `idmenu`, `nombre`, `url`, `orden`, `activo`) VALUES
(2, 1, 'Compresores', 'http://ferreteriataximaroa.com.mx/ver_producto.php?id_producto=12', 0, 1),
(3, 1, 'Sockets', '', 0, 1),
(4, 1, 'Interruptores', '', 0, 1),
(5, 1, 'Sockets', '', 0, 1),
(6, 1, 'Clavijas', '', 0, 1),
(7, 2, 'Martillos', '', 3, 1),
(8, 2, 'Desarmadores', '', 4, 1),
(9, 2, 'Tornillos', '', 1, 1),
(10, 4, 'Lijadoras', '', 0, 1),
(11, 4, 'Pulidoras', '', 0, 1),
(12, 4, 'Sierras', '', 0, 1),
(13, 4, 'Esmeriladoras', '', 0, 1),
(16, 2, 'Seguridad', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(3) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `clave` varchar(3) DEFAULT NULL,
  `nombre` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `tipo`, `clave`, `nombre`) VALUES
(1, 'Múltiplos / Fracciones / Decimales', 'H87', 'Pieza'),
(2, 'Unidades de venta', 'EA', 'Elemento'),
(3, 'Unidades específicas de la industria (varias)', 'E48', 'Unidad de Servicio'),
(4, 'Unidades de venta', 'ACT', 'Actividad'),
(5, 'Mecánica', 'KGM', 'Kilogramo'),
(6, 'Unidades específicas de la industria (varias)', 'E51', 'Trabajo'),
(7, 'Diversos', 'A9', 'Tarifa'),
(8, 'Tiempo y Espacio', 'MTR', 'Metro'),
(9, 'Diversos', 'AB', 'Paquete a granel'),
(10, 'Unidades específicas de la industria (varias)', 'BB', 'Caja base'),
(11, 'Unidades de venta', 'KT', 'Kit'),
(12, 'Unidades de venta', 'SET', 'Conjunto'),
(13, 'Tiempo y Espacio', 'LTR', 'Litro'),
(14, 'Unidades de empaque', 'XBX', 'Caja'),
(15, 'Tiempo y Espacio', 'MON', 'Mes'),
(16, 'Tiempo y Espacio', 'HUR', 'Hora'),
(17, 'Tiempo y Espacio', 'MTK', 'Metro cuadrado'),
(18, 'Diversos', '11', 'Equipos'),
(19, 'Mecánica', 'MGM', 'Miligramo'),
(20, 'Unidades de empaque', 'XPK', 'Paquete'),
(21, 'Unidades de empaque', 'XKI', 'Kit (Conjunto de piezas)'),
(22, 'Diversos', 'AS', 'Variedad'),
(23, 'Mecánica', 'GRM', 'Gramo'),
(24, 'Números enteros / Números / Ratios', 'PR', 'Par'),
(25, 'Unidades de venta', 'DPC', 'Docenas de piezas'),
(26, 'Unidades de empaque', 'xun', 'Unidad'),
(27, 'Tiempo y Espacio', 'DAY', 'Día'),
(28, 'Unidades de empaque', 'XLT', 'Lote'),
(29, 'Diversos', '10', 'Grupos'),
(30, 'Tiempo y Espacio', 'MLT', 'Mililitro'),
(31, 'Unidades específicas de la industria (varias)', 'E54', 'Viaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `id_datos_clientes` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_datos_clientes`, `usuario`, `password`, `activo`) VALUES
(1, 1, 'osvaldo', '$2y$10$nQXE77XQS1uy63OdGGGh5.5DNlE/USxpdCLPUa9a0MpH2Xxu.1GvG', 1),
(2, 6, 'juliol', '$2y$10$TvBbT1TtL.cWZoppZC5UGOAiWwhNF.bNatvDC0ZV7RkM8qLxBpKy6', 0),
(3, 7, 'mariajuarez', '$2y$10$asQJkPSqZ79iFtkln.cGROhRLRICtpd6gEECL3WER/muZm73ItTl.', 0),
(4, 8, 'mariog', '$2y$10$Tzm4yK9KKN5B7XONo2KvYu1FAuK3baFsv9RICE/9gcknqETrSC4ne', 0),
(9, 13, 'diana', '$2y$10$o7uP4EUQeNPJv9bZxBh8Iusot6bpTuEO46FIKZy8h428/DOWZgVC.', 0),
(10, 14, 'dia_feo', '$2y$10$dON8lVYTOFc255zVBHNj4uLdACw.5LBV4O0cBw4534eouvEQDFAF2', 0),
(28, 32, 'xsmokix', '$2y$10$WetIrUtfPtSoxX14EWdUHej9epHULe1RO4AjUcJ0Df5gKg6y0F74u', 1),
(29, 33, 'Jonathan Gfr', '$2y$10$.0M2V61RPJmk29NptLOpUelJTufUOwXoes8NEoy8zZPeAfC3YlBle', 1),
(33, 37, 'osvaldo1', '$2y$10$CxOLJNUgplgT142Ig4nZ8eA.IHsUdyC7qQHidOSEav9mlFJZzXCfq', 0),
(34, 38, 'osvaldo2', '$2y$10$wTwsmSOH.bh64wMZb8Ryj.ol14kvdwtDPTQk6rfxJfbCi8gqMz2Te', 1),
(35, 39, 'Gabriel', '$2y$10$ojVvX9jGFB6.42BD1crgv.qF0A1iGiZnkoiJByq3v5F1CR6SEuFCG', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

CREATE TABLE `usuarios_admin` (
  `id` int(10) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privilegio` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id`, `nombre`, `usuario`, `password`, `privilegio`, `estado`) VALUES
(2, 'Jose Luis Perez1', 'jose1', '123', 'visor', 0),
(3, 'Pedro Diaz', 'pedro', '123', 'administrador', 1),
(4, 'Guadalupe Lopez', 'lupita', '123', 'visor', 0),
(5, 'Rodolfo Diaz', 'rodo', '$2y$10$TqF3W.NZ5yDup5ZOWcUrVeu5ibRK17OMY6os2fDBn9oN2KWxvPvsy', 'administrador', 1),
(6, 'Osvaldo Ortiz', 'osvaldo', '$2y$10$LhEsnREUULSBlqF8daJwqeHTZ/VlP2PwIhloyNZ.lFBRaRzIOA0rW', 'administrador', 1),
(7, 'Ferretería Taximaroa', 'taximaroa', '$2y$10$hZyjZWz4VJw28IqEZgxj1.b3KsOnc5znXcoSR3ELblURFToXg25yG', 'administrador', 1),
(9, 'test2', 'test2', '$2y$10$QsvkxsWV7OUTlp4.qFOXneAIOFr3glEAyODx6poayfHMEx4Y9nEty', 'administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes_inventario`
--
ALTER TABLE `ajustes_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_clientes`
--
ALTER TABLE `datos_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datos_cliente` (`id_datos_cliente`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mapasitio`
--
ALTER TABLE `mapasitio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_detalles`
--
ALTER TABLE `pedidos_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`numero_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recomendados`
--
ALTER TABLE `recomendados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datos_clientes` (`id_datos_clientes`);

--
-- Indices de la tabla `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes_inventario`
--
ALTER TABLE `ajustes_inventario`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `datos_clientes`
--
ALTER TABLE `datos_clientes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `mapasitio`
--
ALTER TABLE `mapasitio`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalles`
--
ALTER TABLE `pedidos_detalles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `preguntas_frecuentes`
--
ALTER TABLE `preguntas_frecuentes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `recomendados`
--
ALTER TABLE `recomendados`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
