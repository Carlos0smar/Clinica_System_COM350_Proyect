-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2023 a las 08:40:54
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `nivel` varchar(60) DEFAULT 'Administrador',
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `password`, `nombre`, `nivel`, `email`) VALUES
(1, '6060', 'Jose', 'Administrador', 'jgms@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `fechaCita` time DEFAULT NULL,
  `estado` enum('Disponible','No Disponible') DEFAULT NULL,
  `fecha_mes` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `medico_id`, `fechaCita`, `estado`, `fecha_mes`) VALUES
(4, 52, 1, '09:00:00', NULL, '2023-09-03'),
(6, 51, 1, '08:00:00', NULL, '2023-09-03'),
(20, 50, 2, '13:00:00', NULL, '2023-09-03'),
(29, 50, 4, '16:00:00', NULL, '2023-09-04'),
(30, 50, 1, '08:00:00', NULL, '2023-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion`
--

CREATE TABLE `descripcion` (
  `id` int(11) NOT NULL,
  `sintomas` varchar(300) DEFAULT NULL,
  `diagnostico` varchar(300) DEFAULT NULL,
  `tratamiento` varchar(300) DEFAULT NULL,
  `receta` varchar(300) DEFAULT NULL,
  `fecha` date DEFAULT curdate(),
  `id_historia` int(11) DEFAULT NULL,
  `id_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `sintomas`, `diagnostico`, `tratamiento`, `receta`, `fecha`, `id_historia`, `id_medico`) VALUES
(1, 'Prueba S', 'Prueba D', 'Prueba T', 'Prueba R', '2023-09-02', 1, 1),
(2, 'Prueba S2', 'Prueba D2', 'Prueba T2', 'Prueba R2', '2023-09-05', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE `historia` (
  `id` int(11) NOT NULL,
  `altura` varchar(60) DEFAULT NULL,
  `peso` varchar(60) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `num_emergencia` varchar(60) DEFAULT NULL,
  `tipo_sanngre` varchar(60) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `alergia` varchar(200) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historia`
--

INSERT INTO `historia` (`id`, `altura`, `peso`, `direccion`, `num_emergencia`, `tipo_sanngre`, `id_paciente`, `alergia`, `fecha_nac`) VALUES
(1, '1.80', '78', 'Calle Mancesped 22', '70707070', 'O+', 50, 'nueces', '1999-06-25'),
(2, '1.80', '80', 'Calle Loa 25', '72707070', 'A', 51, 'Mani', '1998-10-03'),
(3, '1.55', '50', 'Av. Americas 78', '73707070', 'AB', 52, 'Camaron', '2002-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `edad` varchar(60) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `informacion` varchar(200) DEFAULT NULL,
  `especialidad` varchar(20) DEFAULT NULL,
  `nivel` varchar(60) DEFAULT 'Medico',
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `password`, `nombre`, `apellido`, `edad`, `telefono`, `informacion`, `especialidad`, `nivel`, `email`) VALUES
(1, '8080', 'Carlos', 'Garcia', '38', 65656565, 'Estudios Terminados en 2012', 'Medico General', 'Medico', 'carlosgar@gmail.com'),
(2, '6060', 'Pablo', 'Vargas', '50', 60606060, 'Estudios Terminados en 2005', 'Medico General', 'Medico', 'pvar@gmail.com'),
(3, '6565', 'Alejandra', 'Gonzales', '35', 62606060, 'Estudios Terminados en 2013', 'Medico General', 'Medico', 'alegon@gmail.com'),
(4, NULL, 'Marco', 'Pace', '0520-04-13', 78999, 'j9kk', 'Medico General', 'Medico', 'ikikik@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `administrador_id` int(11) DEFAULT NULL,
  `nivel` varchar(60) DEFAULT 'Paciente',
  `historia` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `password`, `nombre`, `apellido`, `genero`, `direccion`, `telefono`, `email`, `medico_id`, `administrador_id`, `nivel`, `historia`) VALUES
(50, '7070', 'Felipe', 'Perez', 'Masculino', 'Calle Mancesped 22', 70707070, 'fperez@gmail.com', 1, 1, 'Paciente', 'Resfriado con dolor de gargant'),
(51, '5151', 'Juan', 'Dias', 'Masculino', 'Calle Loa 25', 72707070, 'juand@gmail.com', 2, 1, 'Paciente', NULL),
(52, '8800', 'Valeria', 'Ortega', 'Femenino', 'Av. Americas 78', 73707070, 'valeortega@gmail.com', 1, 1, 'Paciente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `num_consultorio` varchar(30) DEFAULT NULL,
  `estado` enum('Disponible','No Disponible') DEFAULT 'Disponible',
  `id_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `num_consultorio`, `estado`, `id_medico`) VALUES
(1, 'C-001', 'Disponible', NULL),
(2, 'C-002', 'Disponible', 2),
(3, 'C-003', 'Disponible', 3),
(4, 'C-004', 'Disponible', NULL),
(5, 'C-005', 'Disponible', NULL),
(6, 'C-005', 'No Disponible', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- Indices de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_historia` (`id_historia`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico_id` (`medico_id`),
  ADD KEY `administrador_id` (`administrador_id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `descripcion`
--
ALTER TABLE `descripcion`
  ADD CONSTRAINT `descripcion_ibfk_1` FOREIGN KEY (`id_historia`) REFERENCES `historia` (`id`),
  ADD CONSTRAINT `descripcion_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`);

--
-- Filtros para la tabla `historia`
--
ALTER TABLE `historia`
  ADD CONSTRAINT `historia_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `paciente_ibfk_2` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
