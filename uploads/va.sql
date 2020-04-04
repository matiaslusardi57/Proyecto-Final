-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 21:57:26
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `va`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `Usuario` varchar(45) NOT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Usuario`, `Contrasena`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `DNI_Alumno` int(11) NOT NULL,
  `NombreApellido` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Grado_Nro_grado` int(11) NOT NULL,
  PRIMARY KEY (`DNI_Alumno`),
  KEY `fk_Alumno_Grado1_idx` (`Grado_Nro_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`DNI_Alumno`, `NombreApellido`, `Direccion`, `Grado_Nro_grado`) VALUES
(23666987, 'Soledad Willi', 'Sarmiento 265', 7),
(26012443, 'Anibal Pacini', 'Belgrano 312', 5),
(29000125, 'Sergio Garcia', 'España 993', 2),
(29012444, 'Sandra Manzo', 'Moreno 2323', 5),
(29745123, 'Julieta Egidi', 'Rivadavia 54', 1),
(32667912, 'Alina Ocampo', 'España 732', 4),
(33098775, 'Analia Senigagliesi', 'Italia 692', 6),
(33123000, 'Gisello Mafini', 'Moreno 979', 3),
(33876678, 'Walter Suarez', 'Moreno 123', 7),
(33995832, 'Rodolfo Rios', 'Mitre 198', 5),
(34173480, 'Claudia Abalo', 'Estanislao Lopez 353', 1),
(34567881, 'Pedro Fei', 'Buenos Aires 123', 2),
(34769223, 'Sebastian Melo', 'Roca 1960', 4),
(35734999, 'Carlos Caceres', 'Entre Rios 349', 1),
(39123543, 'Cristian Toloza', 'Larrea 998', 6),
(39222455, 'Gerardo Baldessi', 'San Martin 838', 1),
(39876123, 'Damian Lusardi', 'Rivadavia 67', 6),
(40334780, 'Clara Diaz', 'Mitre 1432', 2),
(40987499, 'Florencia Guarrera', 'Urquiza 240', 3),
(43002365, 'Nora Rossi', 'San Martin 998', 5),
(43123845, 'Antonio Gentile', 'Sarmiento 1563', 3),
(43444870, 'Ana Uranga', 'Belgrano 901', 7),
(44365789, 'Natalia Correa', 'Larrea 341', 1),
(45000999, 'Franco Rossi', 'Dorrego 911', 2),
(45012444, 'Hugo Toscano', 'Sarmiento 102', 6),
(45876123, 'Oscar Villa', 'Mendoza 99', 7),
(45901777, 'Marcela Pereyra', 'Corrientes 5551', 4),
(49002200, 'Facundo Rossi', 'Pasco 331', 3),
(50876123, 'Rosa Zamarini', 'Los Pinos 123', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno/padre`
--

CREATE TABLE IF NOT EXISTS `alumno/padre` (
  `Alumno_DNI_Alumno` int(11) NOT NULL,
  `Padre_DNI_padre` int(11) NOT NULL,
  PRIMARY KEY (`Alumno_DNI_Alumno`,`Padre_DNI_padre`),
  KEY `fk_Alumno_has_Padre_Padre1_idx` (`Padre_DNI_padre`),
  KEY `fk_Alumno_has_Padre_Alumno_idx` (`Alumno_DNI_Alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno/padre`
--

INSERT INTO `alumno/padre` (`Alumno_DNI_Alumno`, `Padre_DNI_padre`) VALUES
(32667912, 6999112),
(43002365, 10011299),
(45000999, 10011299),
(49002200, 10011299),
(39876123, 10101119),
(26012443, 10990111),
(34567881, 22012444),
(23666987, 22123999),
(45876123, 30122444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `idAvisos` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Fecha` text NOT NULL,
  `Docente` varchar(50) NOT NULL,
  `Alumno_DNI_Alumno` int(11) NOT NULL,
  PRIMARY KEY (`idAvisos`),
  KEY `fk_Avisos_Alumno1_idx` (`Alumno_DNI_Alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`idAvisos`, `Numero`, `Descripcion`, `Fecha`, `Docente`, `Alumno_DNI_Alumno`) VALUES
(32, 1, 'sasa', '0000-00-00', 'Jorge Montenegro', 34173480),
(37, 0, '', '04/18/2016', 'Jorge Montenegro', 34173480),
(40, 21, 'asdadasdasd', '04/06/2016', 'Jorge Montenegro', 34173480),
(41, 1, 'falto clase', '04/18/2016', 'Jorge Montenegro', 26012443),
(42, 21, 'dadasd', '04/06/2016', 'Horacio Valentini', 34173480),
(44, 1, 'Le contesto mal al docente', '04/04/2016', 'Jorge Montenegro', 45000999),
(45, 2, 'Se peleo con un compañero', '04/01/2016', 'Jorge Montenegro', 45000999),
(46, 3, 'Anda flojo en matematica, tendra que ir a clases de consulta.', '04/05/2016', 'Jorge Montenegro', 45000999),
(47, 1, 'Esta a 2 faltas de quedarse libre.', '04/04/2016', 'Jorge Montenegro', 49002200),
(48, 1, 'El pasado jueves no asistió a la clase de apoyo.', '04/05/2016', 'Jorge Montenegro', 43002365),
(49, 2, 'Se quedo libre por no tener el porcentaje de asistencia mínimo.', '04/12/2016', 'Jorge Montenegro', 43002365),
(50, 4, 'dsas', '04/18/2016', 'Jorge Montenegro', 45000999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `DNI_docente` int(11) NOT NULL,
  `NombreApellido` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`DNI_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`DNI_docente`, `NombreApellido`, `Direccion`, `Telefono`, `Contrasena`) VALUES
(9123444, 'Alberto Carracedo', 'La Paz 4412', 34023355, ''),
(10991444, 'Horacio Valentini', 'Rosas 1299', 34021123, '5555'),
(12123123, 'Carlos Beggs', '1ro De Mayo', 340215, ''),
(13889001, 'Jorge Montenegro', 'Fracia 891', 3402123, '4444'),
(19000125, 'Fabiana Riva', 'Moreno 441', 93312555, ''),
(21444123, 'Lidia Nieto', 'Cordoba 1253', 492241, ''),
(22001211, 'Adrian Meca', 'Alem 4122', 12444124, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `idExamen` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Fecha_examen` text,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Nota` double DEFAULT NULL,
  `examen_grado` int(10) NOT NULL,
  `Materia_Cod_materia` int(11) NOT NULL,
  PRIMARY KEY (`idExamen`),
  KEY `fk_Examen_Materia1_idx` (`Materia_Cod_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `Numero`, `Fecha_examen`, `Descripcion`, `Nota`, `examen_grado`, `Materia_Cod_materia`) VALUES
(1, 0, '2016-03-31', 'lo dado hasta la fecha 14/4', 4.4, 2, 1),
(2, 1, '2016-04-21', 'Integrales', 3, 2, 1),
(3, 2, '2016-05-31', 'series', 3, 2, 1),
(5, 3, '2016-05-22', 'Funciones', 2.2, 2, 1),
(6, 2, '2016-04-01', 'series', 6, 1, 1),
(11, 0, '0000-00-00', '', 0, 3, 1),
(13, 1, '0000-00-00', '', 0, 3, 1),
(31, 22, '04/13/2016', 'Integrales 221', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `Nro_grado` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`Nro_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`Nro_grado`, `Cantidad`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_has_docente`
--

CREATE TABLE IF NOT EXISTS `grado_has_docente` (
  `Grado_Nro_grado` int(11) NOT NULL,
  `Docente_DNI_docente` int(11) NOT NULL,
  PRIMARY KEY (`Grado_Nro_grado`,`Docente_DNI_docente`),
  KEY `fk_Grado_has_Docente_Docente1_idx` (`Docente_DNI_docente`),
  KEY `fk_Grado_has_Docente_Grado1_idx` (`Grado_Nro_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado_has_docente`
--

INSERT INTO `grado_has_docente` (`Grado_Nro_grado`, `Docente_DNI_docente`) VALUES
(1, 10991444),
(2, 10991444),
(3, 10991444),
(4, 10991444),
(5, 10991444),
(6, 10991444),
(7, 10991444),
(1, 13889001),
(2, 13889001),
(3, 13889001),
(4, 13889001),
(5, 13889001),
(6, 13889001),
(7, 13889001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `Cod_materia` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Contenido` varchar(45) DEFAULT NULL,
  `Grado_Nro_grado` int(11) NOT NULL,
  `Docente_DNI_docente` int(10) NOT NULL,
  PRIMARY KEY (`Cod_materia`,`Grado_Nro_grado`),
  KEY `fk_Materia_Grado1_idx` (`Grado_Nro_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`Cod_materia`, `Descripcion`, `Contenido`, `Grado_Nro_grado`, `Docente_DNI_docente`) VALUES
(1, 'Matematica', 'Libro James Stewars', 1, 13889001),
(1, 'Matematica', 'Libro James Stewars', 2, 13889001),
(1, 'Matematica', 'Libro James Stewars', 3, 13889001),
(1, 'Matematica', 'Libro James Stewars', 4, 0),
(1, 'Matematica', 'Libro James Stewars', 5, 0),
(1, 'Matematica', 'Libro James Stewars', 6, 0),
(1, 'Matematica', 'Libro James Stewars', 7, 0),
(2, 'Lengua', 'Libro Word 1.1', 1, 0),
(2, 'Lengua', 'Libro Word 1.1', 2, 0),
(2, 'Lengua', 'Libro Word 1.1', 3, 0),
(2, 'Lengua', 'Libro Word 1.1', 4, 13889001),
(2, 'Lengua', 'Libro Word 1.1', 5, 0),
(2, 'Lengua', 'Libro Word 1.1', 6, 0),
(2, 'Lengua', 'Libro Word 1.1', 7, 0),
(3, 'Quimica', 'Estructura De Lewis', 1, 0),
(3, 'Quimica', 'Estructura De Lewis', 3, 0),
(3, 'Quimica', 'Estructura De Lewis', 4, 0),
(3, 'Quimica', 'Estructura De Lewis', 5, 0),
(3, 'Quimica', 'Estructura De Lewis', 6, 0),
(3, 'Quimica', 'Estructura De Lewis', 7, 0),
(4, 'Ingles', 'Open English', 1, 0),
(4, 'Ingles', 'Open English', 2, 0),
(4, 'Ingles', 'Open English', 3, 0),
(4, 'Ingles', 'Open English', 4, 13889001),
(4, 'Ingles', 'Open English', 5, 0),
(4, 'Ingles', 'Open English', 6, 0),
(4, 'Ingles', 'Open English', 7, 0),
(5, 'Historia', 'Historia Contemporanea', 1, 0),
(5, 'Historia', 'Historia Contemporanea', 2, 0),
(5, 'Historia', 'Historia Contemporanea', 3, 0),
(5, 'Historia', 'Historia Contemporanea', 4, 0),
(5, 'Historia', 'Historia Contemporanea', 5, 13889001),
(5, 'Historia', 'Historia Contemporanea', 6, 0),
(5, 'Historia', 'Historia Contemporanea', 7, 0),
(6, 'Geografia', 'Libro Hola Mundo', 1, 0),
(6, 'Geografia', 'Libro Hola Mundo', 2, 0),
(6, 'Geografia', 'Libro Hola Mundo', 3, 0),
(6, 'Geografia', 'Libro Hola Mundo', 4, 0),
(6, 'Geografia', 'Libro Hola Mundo', 5, 0),
(6, 'Geografia', 'Libro Hola Mundo', 6, 13889001),
(6, 'Geografia', 'Libro Hola Mundo', 7, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 1, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 2, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 3, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 4, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 5, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 6, 0),
(7, 'Educacion Fisica', 'Anatomia Del Cuerpo', 7, 0),
(8, 'Contabilidad', 'Libro Balances', 1, 0),
(8, 'Contabilidad', 'Libro Balances', 2, 0),
(8, 'Contabilidad', 'Libro Balances', 3, 0),
(8, 'Contabilidad', 'Libro Balances', 4, 0),
(8, 'Contabilidad', 'Libro Balances', 5, 0),
(8, 'Contabilidad', 'Libro Balances', 6, 0),
(8, 'Contabilidad', 'Libro Balances', 7, 0),
(9, 'Derecho', 'Derecho Penal ', 1, 0),
(9, 'Derecho', 'Derecho Penal ', 3, 0),
(9, 'Derecho', 'Derecho Penal ', 4, 0),
(9, 'Derecho', 'Derecho Penal ', 5, 0),
(9, 'Derecho', 'Derecho Penal ', 6, 0),
(9, 'Derecho', 'Derecho Penal ', 7, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 1, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 3, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 4, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 5, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 6, 0),
(10, 'Formacion Etica', 'Unidades De Lectura 2.2 y 3.1', 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasdeexamenes`
--

CREATE TABLE IF NOT EXISTS `notasdeexamenes` (
  `idExamen` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`idExamen`,`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otro`
--

CREATE TABLE IF NOT EXISTS `otro` (
  `idOtro` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Fecha` text NOT NULL,
  `Docente` varchar(50) NOT NULL,
  `Alumno_DNI_Alumno` int(11) NOT NULL,
  PRIMARY KEY (`idOtro`),
  KEY `fk_Otro_Alumno1_idx` (`Alumno_DNI_Alumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `otro`
--

INSERT INTO `otro` (`idOtro`, `Numero`, `Descripcion`, `Fecha`, `Docente`, `Alumno_DNI_Alumno`) VALUES
(2, 1, 'reunion', '2016-04-05', 'Jorge Montenegro', 34173480),
(5, 0, '', '04/26/2016', 'Jorge Montenegro', 34173480),
(6, 0, '', '04/18/2016', 'Jorge Montenegro', 34173480),
(7, 0, '', '04/25/2016', 'Jorge Montenegro', 34173480),
(8, 21, 'sdadaddas', '04/04/2016', 'Jorge Montenegro', 34173480),
(9, 12, 'asasass', '04/24/2016', 'Jorge Montenegro', 34173480),
(10, 1, 'sasas', '04/04/2016', 'Jorge Montenegro', 45876123),
(13, 1, 'Reunion de padres, para hablar sobre temas del próximo evento. La misma sera en la sala 4 a las 16hs. Saludos', '04/13/2016', 'Jorge Montenegro', 45000999),
(14, 1, 'Reunion de padres, para hablar sobre temas del próximo evento. La misma sera en la sala 4 a las 16hs. Saludos', '04/14/2016', 'Jorge Montenegro', 49002200),
(15, 1, 'Reunion de padres, para hablar sobre temas del próximo evento. La misma sera en la sala 4 a las 16hs. Saludos', '04/14/2016', 'Jorge Montenegro', 43002365);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE IF NOT EXISTS `padre` (
  `DNI_padre` int(11) NOT NULL,
  `NombreApellido` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`DNI_padre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`DNI_padre`, `NombreApellido`, `Direccion`, `Telefono`, `Contrasena`) VALUES
(6999112, 'Ana Ocampo', 'Larrea 3311', 12221111, '1234'),
(10011299, 'Matias Rossi', 'Dorrego 911', 41266124, '12345'),
(10101119, 'Bernardo Lusardi', 'España 9912', 4440012, '2222'),
(10990111, 'Pablo Pacini', 'Rivadavia 511', 2214441, '9898'),
(22012444, 'Noelia Fei', 'Alem 991', 4122002, ''),
(22123999, 'Alberto Willi', 'La Paz 331', 33121214, ''),
(30122444, 'Pablo Villa', 'Pasco 3312', 9901244, ''),
(34173480, 'Matias Lusardi', 'Rivadavia 57', 313131, '6666'),
(93720038, 'Pablo Cerretto', 'San Martin 540', 210210, '4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicos`
--

CREATE TABLE IF NOT EXISTS `practicos` (
  `idPracticos` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Resultado` varchar(100) DEFAULT NULL,
  `Fecha_entrega_practico` text,
  `practico_grado` int(10) NOT NULL,
  `Materia_Cod_materia` int(11) NOT NULL,
  PRIMARY KEY (`idPracticos`),
  KEY `fk_Practicos_Materia1_idx` (`Materia_Cod_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `practicos`
--

INSERT INTO `practicos` (`idPracticos`, `Numero`, `Descripcion`, `Resultado`, `Fecha_entrega_practico`, `practico_grado`, `Materia_Cod_materia`) VALUES
(1, 1, 'la historia de arg', 'volverlo a hacer', '2016-03-31', 2, 2),
(3, 2, 'asdasddas', 'dasdas', '2222-11-11', 1, 1),
(6, 0, '', '', '04/26/2016', 1, 1),
(8, 21, 'nada', '', '04/12/2016', 1, 1),
(9, 21, '', '', '04/21/2016', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTareas` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) DEFAULT NULL,
  `Fecha_entrega_tarea` text,
  `Descripcion` varchar(1000) DEFAULT NULL,
  `Correccion` varchar(1000) DEFAULT NULL,
  `tarea_grado` int(10) NOT NULL,
  `Materia_Cod_materia` int(11) NOT NULL,
  PRIMARY KEY (`idTareas`),
  KEY `fk_Tareas_Materia1_idx` (`Materia_Cod_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTareas`, `Numero`, `Fecha_entrega_tarea`, `Descripcion`, `Correccion`, `tarea_grado`, `Materia_Cod_materia`) VALUES
(19, 1, '2016-04-05', 'Ejercicio numero 1 pag 12', 'Muy bien', 2, 1),
(20, 2, '2016-04-05', 'Toda la unidad 3', 'Sin Corrección ', 2, 1),
(67, 0, '0000-00-00', '', '', 3, 1),
(70, 3, '0000-00-00', '', '', 3, 1),
(73, 22, '2016-04-02', 'jajaja', 'mal', 5, 1),
(74, 1, '04/13/2016', 'sumas', '', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_Alumno_Grado1` FOREIGN KEY (`Grado_Nro_grado`) REFERENCES `grado` (`Nro_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno/padre`
--
ALTER TABLE `alumno/padre`
  ADD CONSTRAINT `fk_Alumno_has_Padre_Alumno` FOREIGN KEY (`Alumno_DNI_Alumno`) REFERENCES `alumno` (`DNI_Alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alumno_has_Padre_Padre1` FOREIGN KEY (`Padre_DNI_padre`) REFERENCES `padre` (`DNI_padre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `fk_Avisos_Alumno1` FOREIGN KEY (`Alumno_DNI_Alumno`) REFERENCES `alumno` (`DNI_Alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `fk_Examen_Materia1` FOREIGN KEY (`Materia_Cod_materia`) REFERENCES `materia` (`Cod_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grado_has_docente`
--
ALTER TABLE `grado_has_docente`
  ADD CONSTRAINT `fk_Grado_has_Docente_Docente1` FOREIGN KEY (`Docente_DNI_docente`) REFERENCES `docente` (`DNI_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Grado_has_Docente_Grado1` FOREIGN KEY (`Grado_Nro_grado`) REFERENCES `grado` (`Nro_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_Materia_Grado1` FOREIGN KEY (`Grado_Nro_grado`) REFERENCES `grado` (`Nro_grado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `otro`
--
ALTER TABLE `otro`
  ADD CONSTRAINT `fk_Otro_Alumno1` FOREIGN KEY (`Alumno_DNI_Alumno`) REFERENCES `alumno` (`DNI_Alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `practicos`
--
ALTER TABLE `practicos`
  ADD CONSTRAINT `fk_Practicos_Materia1` FOREIGN KEY (`Materia_Cod_materia`) REFERENCES `materia` (`Cod_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_Tareas_Materia1` FOREIGN KEY (`Materia_Cod_materia`) REFERENCES `materia` (`Cod_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
