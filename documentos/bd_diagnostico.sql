-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 06:43:49
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_diagnostico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_enfermedades`
--

CREATE TABLE `tb_enfermedades` (
  `id_enfermedades` int(11) NOT NULL,
  `enfermedad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_enfermedades`
--

INSERT INTO `tb_enfermedades` (`id_enfermedades`, `enfermedad`) VALUES
(1, 'PARALISIS'),
(2, 'DIABETES'),
(3, 'CISTITIS'),
(4, 'ARTRITIS'),
(5, 'ADDISON'),
(6, 'TETANOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_manuales`
--

CREATE TABLE `tb_manuales` (
  `id_manual` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `definicion` varchar(2000) NOT NULL,
  `url` varchar(50) NOT NULL,
  `claves` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_manuales`
--

INSERT INTO `tb_manuales` (`id_manual`, `titulo`, `definicion`, `url`, `claves`) VALUES
(1, 'Modelo entidad relacion', 'Es una herramienta para el modelado de datos que permite representar las entidades relevantes de un sistema de informacion así como sus interrelaciones y propiedades.', 'imagenes/modelo.PNG', 'base de datos, manual tecnico, ayuda, uml'),
(2, 'casos de uso', 'En el Lenguaje de Modelado Unificado, un diagrama de casos de uso es una forma de diagrama de comportamiento UML mejorado. El Lenguaje de Modelado Unificado (UML), define una notacion grafica para representar casos de uso llamada modelo de casos de uso.', 'imagenes/caaa.JPG', 'manual tecnico, ayuda, uml'),
(3, 'Clases del proyecto', 'Es un tipo de diagrama de estructura estatica que describe la estructura de un sistema demostrando las clases del sistema, sus atributos, operaciones y las relaciones entre los objetos.', 'imagenes/clases.png', 'manual tecnico, ayuda, uml'),
(4, 'diagrama de componentes', 'Es un diagrama tipo del lenguaje unificado de modelado. Representa como un sistema de software es dividido en componentes y muestra las dependencias entre estos componentes.', 'imagenes/diagrama.png', 'manual tecnico, ayuda, uml'),
(5, 'Diagrama de distribucion', 'Es donde representamos la estructura de hardware donde estará nuestro sistema o software, para ello cada componente lo podemos representar como nodos, el nodo es cualquier elemento que sea un recurso de hardware, es decir, es nuestra denominacion generica para nuestros equipos.', 'imagenes/distribucion.PNG', 'manual tecnico, ayuda, uml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_resultados`
--

CREATE TABLE `tb_resultados` (
  `id_resultados` int(11) NOT NULL,
  `id_signos` int(11) NOT NULL,
  `id_enfermedades` int(11) NOT NULL,
  `fecha_resultado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_resultados`
--

INSERT INTO `tb_resultados` (`id_resultados`, `id_signos`, `id_enfermedades`, `fecha_resultado`) VALUES
(1, 2, 3, '2017-03-16'),
(2, 1, 2, '2017-03-21'),
(3, 3, 1, '2017-03-14'),
(4, 5, 4, '2017-03-16'),
(5, 4, 6, '2017-03-20'),
(6, 6, 5, '2017-01-25'),
(7, 7, 1, '2017-03-02'),
(8, 2, 5, '2017-03-07'),
(9, 1, 6, '2017-03-30'),
(10, 3, 4, '2017-04-13'),
(11, 5, 1, '2017-03-27'),
(12, 4, 3, '2017-01-17'),
(13, 7, 2, '2017-03-29'),
(14, 3, 5, '2017-01-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_signos_y_sintomas`
--

CREATE TABLE `tb_signos_y_sintomas` (
  `id_signos` int(11) NOT NULL,
  `signos_y_sintomas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_signos_y_sintomas`
--

INSERT INTO `tb_signos_y_sintomas` (`id_signos`, `signos_y_sintomas`) VALUES
(1, 'DIARREA'),
(2, 'INFECCIONES'),
(3, 'DEBILIDAD\r\n'),
(4, 'INFLAMACION\r\n'),
(5, 'VOMITOS'),
(6, 'PICOR'),
(7, 'FIEBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `documento` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_resultados` int(11) NOT NULL,
  `id_manual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_enfermedades`
--
ALTER TABLE `tb_enfermedades`
  ADD PRIMARY KEY (`id_enfermedades`);

--
-- Indices de la tabla `tb_manuales`
--
ALTER TABLE `tb_manuales`
  ADD PRIMARY KEY (`id_manual`);

--
-- Indices de la tabla `tb_resultados`
--
ALTER TABLE `tb_resultados`
  ADD PRIMARY KEY (`id_resultados`),
  ADD KEY `indice_enfermedades` (`id_enfermedades`),
  ADD KEY `indice_signos` (`id_signos`) USING BTREE;

--
-- Indices de la tabla `tb_signos_y_sintomas`
--
ALTER TABLE `tb_signos_y_sintomas`
  ADD PRIMARY KEY (`id_signos`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `index_resultado` (`id_resultados`),
  ADD KEY `index_manual` (`id_manual`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_manuales`
--
ALTER TABLE `tb_manuales`
  MODIFY `id_manual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_resultados`
--
ALTER TABLE `tb_resultados`
  MODIFY `id_resultados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_resultados`
--
ALTER TABLE `tb_resultados`
  ADD CONSTRAINT `tb_resultados_ibfk_1` FOREIGN KEY (`id_enfermedades`) REFERENCES `tb_enfermedades` (`id_enfermedades`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resultados_ibfk_2` FOREIGN KEY (`id_signos`) REFERENCES `tb_signos_y_sintomas` (`id_signos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_manual`) REFERENCES `tb_manuales` (`id_manual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usuarios_ibfk_2` FOREIGN KEY (`id_resultados`) REFERENCES `tb_resultados` (`id_resultados`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
