-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 07:07:18
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
  `estado` enum('Disponible','No Disponible') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `paciente_id`, `medico_id`, `fechaCita`, `estado`) VALUES
(4, 52, 1, '09:00:00', NULL),
(6, 51, 1, '08:00:00', NULL),
(15, 50, 3, '11:00:00', NULL),
(19, 50, 1, '15:00:00', NULL),
(20, 50, 2, '13:00:00', NULL),
(21, 51, 2, '13:00:00', NULL),
(22, 50, 2, '04:00:00', NULL),
(23, 50, 1, '14:00:00', NULL);

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_historia` int(11) DEFAULT NULL,
  `id_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descripcion`
--

INSERT INTO `descripcion` (`id`, `sintomas`, `diagnostico`, `tratamiento`, `receta`, `fecha`, `id_historia`, `id_medico`) VALUES
(1, 'Prueba S', 'Prueba D', 'Prueba T', 'Prueba R', '2023-09-02 04:58:50', 1, 1);

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
(1, '1.80', '78', 'Calle Mancesped 22', '70707070', 'O+', 50, 'nueces', '1999-06-25');

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
(4, NULL, 'Marco', 'Pace', '0520-04-13', 78999, 'j9kk', 'Medico General', 'Medico', 'ikikik@gmail.com'),
(5, NULL, '', '', '', 0, '', '', 'Medico', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `descripcion`
--
ALTER TABLE `descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
