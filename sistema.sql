-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 04:54:10
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
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(20) NOT NULL,
  `apellido_paterno_cliente` varchar(20) NOT NULL,
  `apellido_materno_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `direccion_cliente` varchar(50) NOT NULL,
  `genero_cliente` varchar(20) NOT NULL,
  `telefono_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellido_paterno_cliente`, `apellido_materno_cliente`, `email_cliente`, `direccion_cliente`, `genero_cliente`, `telefono_cliente`) VALUES
(3, 'Sofía', 'Gómez', 'Morales', 'sofia.gomez@example.com', 'Plaza Mayor 5', 'F', '555-8765'),
(4, 'Carlos', 'Fernández', 'López', 'carlos.fernandez@example.com', 'Calle del Río 20', 'M', '555-4321'),
(5, 'Laura', 'Díaz', 'Ramírez', 'laura.diaz@example.com', 'Boulevard de los Sueños 15', 'F', '555-6789'),
(6, 'Marta', 'López', 'Salazar', 'marta.lopez@example.com', 'Calle del Sol 8', 'F', '555-9876'),
(7, 'Javier', 'Sánchez', 'Moreno', 'javier.sanchez@example.com', 'Calle de la Luna 11', 'M', '555-3456'),
(8, 'Isabel', 'Morales', 'Fernández', 'isabel.morales@example.com', 'Calle del Mar 3', 'F', '555-2345'),
(9, 'Miguel', 'García', 'Vega', 'miguel.garcia@example.com', 'Calle del Norte 7', 'M', '555-8765'),
(10, 'Claudia', 'Torres', 'Vásquez', 'claudia.torres@example.com', 'Avenida del Parque 6', 'F', '555-6543'),
(11, 'Fernando', 'Jiménez', 'Cruz', 'fernando.jimenez@example.com', 'Calle de la Paz 4', 'M', '555-1122'),
(12, 'Patricia', 'Romero', 'Márquez', 'patricia.romero@example.com', 'Calle de la Esperanza 9', 'F', '555-2233'),
(13, 'Oscar', 'Hernández', 'Rivas', 'oscar.hernandez@example.com', 'Avenida Libertad 2', 'M', '555-3344'),
(14, 'Elena', 'García', 'Mendoza', 'elena.garcia@example.com', 'Calle del Oso 12', 'F', '555-4455'),
(15, 'Rafael', 'Torres', 'Aguilar', 'rafael.torres@example.com', 'Calle del Bosque 6', 'M', '555-5566'),
(16, 'Monica', 'Paredes', 'Gutiérrez', 'monica.paredes@example.com', 'Calle del Campo 13', 'F', '555-6677'),
(17, 'Sergio', 'Vásquez', 'Moreno', 'sergio.vasquez@example.com', 'Calle de la Sombra 8', 'M', '555-7788'),
(18, 'Carmen', 'Salinas', 'Valdez', 'carmen.salinas@example.com', 'Avenida del Sol 14', 'F', '555-8899'),
(19, 'Antonio', 'Mendoza', 'Bermúdez', 'antonio.mendoza@example.com', 'Calle de la Luna 5', 'M', '555-9900'),
(20, 'Juana', 'Castro', 'Paniagua', 'juana.castro@example.com', 'Calle del Ángel 7', 'F', '555-1010'),
(21, 'Jorge', 'Ríos', 'Riviera', 'jorge.rios@example.com', 'Calle de la Niebla 11', 'M', '555-2020'),
(22, 'Laura', 'García', 'Serrano', 'laura.garcia@example.com', 'Calle del Cielo 10', 'F', '555-3030'),
(23, 'Miguel', 'Soto', 'Cordero', 'miguel.soto@example.com', 'Calle del Lirio 4', 'M', '555-4040'),
(24, 'Sara', 'Vera', 'Reyes', 'sara.vera@example.com', 'Avenida de la Alegría 8', 'F', '555-5050'),
(25, 'Raúl', 'Núñez', 'Castillo', 'raul.nunez@example.com', 'Calle de los Tulipanes 6', 'M', '555-6060'),
(26, 'Patricia', 'Pérez', 'Aranda', 'patricia.perez@example.com', 'Calle de la Selva 12', 'F', '555-7070'),
(27, 'Luis', 'Cano', 'Palacios', 'luis.cano@example.com', 'Calle del Valle 9', 'M', '555-8080'),
(28, 'Gabriela', 'Jaramillo', 'Cruz', 'gabriela.jaramillo@example.com', 'Avenida del Viento 14', 'F', '555-9090'),
(29, 'Andrés', 'Díaz', 'González', 'andres.diaz@example.com', 'Calle de la Sierra 15', 'M', '555-0101'),
(31, 'Héctor', 'Pérez', 'García', 'hector.perez@example.com', 'Calle del Árbol 11', 'M', '555-2323'),
(32, 'Valeria', 'Serrano', 'Bravo', 'valeria.serrano@example.com', 'Avenida de los Pinos 7', 'F', '555-3434'),
(33, 'Julio', 'Castillo', 'López', 'julio.castillo@example.com', 'Calle del Río 16', 'M', '555-4545'),
(34, 'Lucía', 'Martínez', 'Henao', 'lucia.martinez@example.com', 'Calle de la Primavera 5', 'F', '555-5656'),
(35, 'Felipe', 'Zapata', 'Roldán', 'felipe.zapata@example.com', 'Calle de los Rosales 9', 'M', '555-6767'),
(36, 'Alejandra', 'Jiménez', 'Ortiz', 'alejandra.jimenez@example.com', 'Avenida de la Luna 3', 'F', '555-7878'),
(37, 'Víctor', 'Gómez', 'Pérez', 'victor.gomez@example.com', 'Calle del Lago 8', 'M', '555-8989'),
(38, 'Cecilia', 'Muñoz', 'Mendoza', 'cecilia.munoz@example.com', 'Calle del Sol 6', 'F', '555-9090'),
(39, 'Jairo', 'Castaño', 'Cano', 'jairo.castano@example.com', 'Calle de la Estrella 12', 'M', '555-0101'),
(40, 'Carolina', 'Álvarez', 'Gallego', 'carolina.alvarez@example.com', 'Calle de la Cabaña 7', 'F', '555-1212'),
(41, 'Santiago', 'Quintero', 'Gómez', 'santiago.quintero@example.com', 'Avenida del Bosque 14', 'M', '555-2323'),
(42, 'Catalina', 'Guerrero', 'García', 'catalina.guerrero@example.com', 'Calle del Mar 10', 'F', '555-3434'),
(43, 'Mateo', 'Arbeláez', 'Gutiérrez', 'mateo.arbelaez@example.com', 'Calle de la Roca 6', 'M', '555-4545'),
(44, 'Diana', 'Córdoba', 'Márquez', 'diana.cordoba@example.com', 'Avenida de los Cedros 9', 'F', '555-5656'),
(45, 'Esteban', 'Londoño', 'Ramírez', 'esteban.londono@example.com', 'Calle del Valle 11', 'M', '555-6767'),
(46, 'Gabriela', 'Sánchez', 'Toro', 'gabriela.sanchez@example.com', 'Calle de la Alegría 3', 'F', '555-7878'),
(47, 'juan ', 'perez', 'cruz', 'juan@gmail.com', 'san pedro', 'M', '558456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `imagen_producto` varchar(50) NOT NULL,
  `modelo_producto` varchar(50) NOT NULL,
  `estado_producto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion_producto`, `precio_producto`, `cantidad_producto`, `imagen_producto`, `modelo_producto`, `estado_producto`) VALUES
(1, '   Laptop HP Pavilion 15', 7000, 100, '   laptop_hp_pavilion_15.jpg', 'hp', 'Disponible'),
(2, 'Laptop Dell Inspiron 14', 800, 15, 'laptop_dell_inspiron_14.jpg', 'DELL14INS', 'Nuevo'),
(6, 'Laptop Acer Aspire 5', 600, 20, 'laptop_acer_aspire_5.jpg', 'ACER5AS', 'Nuevo'),
(7, 'Laptop MSI GF63 Thin', 850, 12, 'laptop_msi_gf63_thin.jpg', 'MSIGF63', 'Nuevo'),
(8, 'Laptop HP Envy 13', 900, 15, 'laptop_hp_envy_13.jpg', 'HP13ENV', 'Nuevo'),
(9, 'Laptop Dell XPS 13', 1200, 8, 'laptop_dell_xps_13.jpg', 'DELLXPS13', 'Nuevo'),
(10, 'Laptop Apple MacBook Pro 16', 2400, 5, 'laptop_apple_macbook_pro_16.jpg', 'MACPRO16', 'Nuevo'),
(11, 'Laptop Lenovo ThinkPad X1', 1100, 10, 'laptop_lenovo_thinkpad_x1.jpg', 'LENOVOX1', 'Nuevo'),
(12, 'Laptop ASUS ROG Zephyrus G14', 1400, 7, 'laptop_asus_rog_zephyrus_g14.jpg', 'ASUSG14', 'Nuevo'),
(13, 'Laptop Acer Swift 3', 700, 20, 'laptop_acer_swift_3.jpg', 'ACERSWIFT3', 'Nuevo'),
(14, 'Laptop HP Spectre x360', 1200, 12, 'laptop_hp_spectre_x360.jpg', 'HPSPECTRE', 'Nuevo'),
(15, 'Laptop Dell Latitude 7420', 1300, 8, 'laptop_dell_latitude_7420.jpg', 'DELL7420', 'Nuevo'),
(16, 'Laptop Apple MacBook Air M2', 1200, 10, 'laptop_apple_macbook_air_m2.jpg', 'MACAIR-M2', 'Nuevo'),
(17, 'Laptop Lenovo Yoga 7i', 1000, 15, 'laptop_lenovo_yoga_7i.jpg', 'LENOVO7I', 'Nuevo'),
(18, 'Laptop ASUS ZenBook 14', 850, 20, 'laptop_asus_zenbook_14.jpg', 'ASUSZEN14', 'Nuevo'),
(19, 'Laptop Acer Predator Helios 300', 1500, 6, 'laptop_acer_predator_helios_300.jpg', 'ACERHELIOS', 'Nuevo'),
(20, 'Laptop HP Omen 15', 1200, 10, 'laptop_hp_omen_15.jpg', 'HPOMEN15', 'Nuevo'),
(21, 'Laptop Dell G5 15', 1300, 12, 'laptop_dell_g5_15.jpg', 'DELLG515', 'Nuevo'),
(22, 'Laptop Apple MacBook Pro M1', 1300, 10, 'laptop_apple_macbook_pro_m1.jpg', 'MACPRO-M1', 'Nuevo'),
(23, 'Laptop Lenovo Legion 5', 1400, 7, 'laptop_lenovo_legion_5.jpg', 'LENOVOLEGION5', 'Nuevo'),
(24, 'Laptop ASUS TUF Gaming A15', 1400, 9, 'laptop_asus_tuf_gaming_a15.jpg', 'ASUSTUF15', 'Nuevo'),
(25, 'Laptop Acer Aspire 7', 800, 15, 'laptop_acer_aspire_7.jpg', 'ACER7AS', 'Nuevo'),
(26, 'Laptop HP Pavilion x360', 850, 14, 'laptop_hp_pavilion_x360.jpg', 'HPX360', 'Nuevo'),
(27, 'Laptop Dell Inspiron 15 3000', 680, 20, 'laptop_dell_inspiron_15_3000.jpg', 'DELL15INS', 'Nuevo'),
(28, 'Laptop Apple MacBook Pro 13', 1400, 10, 'laptop_apple_macbook_pro_13.jpg', 'MACPRO13', 'Nuevo'),
(29, 'Laptop Lenovo IdeaPad Gaming 3', 1100, 15, 'laptop_lenovo_ideapad_gaming_3.jpg', 'LENOVO3GAMING', 'Nuevo'),
(30, 'Laptop ASUS ROG Strix Scar 15', 1700, 6, 'laptop_asus_rog_strix_scar_15.jpg', 'ASUSSCAR15', 'Nuevo'),
(31, 'Laptop Acer Nitro 5', 1300, 8, 'laptop_acer_nitro_5.jpg', 'ACERNITRO5', 'Nuevo'),
(32, 'Laptop HP Elite Dragonfly', 1900, 7, 'laptop_hp_elite_dragonfly.jpg', 'HPDRAGONFLY', 'Nuevo'),
(33, 'Laptop Dell XPS 15', 1600, 9, 'laptop_dell_xps_15.jpg', 'DELLXPS15', 'Nuevo'),
(34, 'Laptop Apple MacBook Pro 14', 1700, 8, 'laptop_apple_macbook_pro_14.jpg', 'MACPRO14', 'Nuevo'),
(35, 'Laptop Lenovo ThinkPad T14', 1100, 12, 'laptop_lenovo_thinkpad_t14.jpg', 'LENOVOT14', 'Nuevo'),
(36, 'Laptop ASUS ZenBook Flip 14', 950, 15, 'laptop_asus_zenbook_flip_14.jpg', 'ASUSFLIP14', 'Nuevo'),
(37, 'Laptop Acer Swift X', 900, 18, 'laptop_acer_swift_x.jpg', 'ACERX', 'Nuevo'),
(38, 'Laptop HP Spectre x360 14', 1200, 10, 'laptop_hp_spectre_x360_14.jpg', 'HPSPECTRE14', 'Nuevo'),
(39, 'Laptop Dell Precision 5550', 1800, 6, 'laptop_dell_precision_5550.jpg', 'DELL5550', 'Nuevo'),
(40, 'Laptop Apple MacBook Air 2024', 1100, 15, 'laptop_apple_macbook_air_2024.jpg', 'MACAIR2024', 'Nuevo'),
(41, 'Laptop Lenovo Yoga Slim 7', 1000, 20, 'laptop_lenovo_yoga_slim_7.jpg', 'LENOVO7SLIM', 'Nuevo'),
(42, 'Laptop ASUS ROG Flow X13', 1600, 8, 'laptop_asus_rog_flow_x13.jpg', 'ROGFLOW13', 'Nuevo'),
(43, 'Laptop Acer ConceptD 3', 1500, 10, 'laptop_acer_conceptd_3.jpg', 'ACERCONCEPTD3', 'Nuevo'),
(44, 'Laptop HP ProBook 450', 800, 22, 'laptop_hp_probook_450.jpg', 'HP450PRO', 'Nuevo'),
(45, 'Laptop Dell Latitude 5520', 1300, 15, 'laptop_dell_latitude_5520.jpg', 'DELL5520', 'Nuevo'),
(46, 'Laptop Apple MacBook Pro 2024', 2400, 7, 'laptop_apple_macbook_pro_2024.jpg', 'MACPRO2024', 'Nuevo'),
(47, 'Laptop Lenovo ThinkBook 14', 850, 18, 'laptop_lenovo_thinkbook_14.jpg', 'LENOVO14BOOK', 'Nuevo'),
(48, 'Laptop ASUS ExpertBook B9', 1400, 9, 'laptop_asus_expertbook_b9.jpg', 'ASUSEB9', 'Nuevo'),
(49, 'Laptop Acer Aspire 9', 750, 25, 'laptop_acer_aspire_9.jpg', 'ACER9AS', 'Nuevo'),
(50, 'modelo hp full core i3', 4500, 12, 'ruta.png', 'prueba', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `password_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `password_usuario`) VALUES
(1, 'keyty', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
