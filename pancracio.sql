-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2022 a las 02:17:04
-- Versión del servidor: 5.6.45-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bases`
--

CREATE TABLE `bases` (
  `id_base` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bases`
--

INSERT INTO `bases` (`id_base`, `nombre`) VALUES
(1, 'default'),
(100, 'juanse'),
(3, 'M&uacute;sica'),
(2, 'El agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bases_pistas`
--

CREATE TABLE `bases_pistas` (
  `provincia` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `base` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bases_pistas`
--

INSERT INTO `bases_pistas` (`provincia`, `orden`, `base`) VALUES
(1, 1, 1),
(1, 1, 100),
(1, 3, 1),
(1, 3, 100),
(1, 4, 1),
(1, 4, 100),
(1, 5, 1),
(1, 5, 2),
(1, 5, 100),
(1, 6, 3),
(1, 7, 3),
(2, 1, 1),
(2, 1, 100),
(2, 2, 1),
(2, 2, 2),
(2, 2, 100),
(2, 3, 1),
(2, 3, 100),
(2, 4, 1),
(2, 4, 2),
(2, 4, 100),
(2, 5, 1),
(2, 5, 100),
(2, 6, 3),
(3, 1, 1),
(3, 1, 100),
(3, 2, 1),
(3, 2, 2),
(3, 2, 100),
(3, 3, 1),
(3, 3, 2),
(3, 3, 100),
(3, 4, 1),
(3, 4, 100),
(3, 5, 1),
(3, 5, 100),
(3, 6, 3),
(3, 7, 3),
(4, 1, 1),
(4, 1, 100),
(4, 2, 1),
(4, 2, 2),
(4, 2, 100),
(4, 3, 1),
(4, 3, 2),
(4, 3, 100),
(4, 4, 1),
(4, 4, 100),
(4, 5, 1),
(4, 5, 100),
(4, 6, 3),
(4, 6, 101),
(5, 1, 1),
(5, 1, 100),
(5, 2, 1),
(5, 2, 2),
(5, 2, 100),
(5, 3, 1),
(5, 3, 2),
(5, 3, 100),
(5, 4, 1),
(5, 4, 100),
(5, 5, 1),
(5, 5, 100),
(5, 6, 3),
(5, 7, 3),
(6, 1, 1),
(6, 1, 2),
(6, 1, 100),
(6, 2, 1),
(6, 2, 2),
(6, 2, 100),
(6, 3, 1),
(6, 3, 100),
(6, 4, 1),
(6, 4, 100),
(6, 5, 1),
(6, 5, 100),
(6, 6, 1),
(6, 6, 100),
(6, 7, 3),
(6, 8, 3),
(6, 9, 102),
(7, 1, 1),
(7, 1, 100),
(7, 2, 1),
(7, 2, 2),
(7, 2, 100),
(7, 3, 1),
(7, 3, 2),
(7, 3, 100),
(7, 4, 1),
(7, 4, 100),
(7, 5, 3),
(8, 1, 1),
(8, 1, 100),
(8, 2, 1),
(8, 2, 2),
(8, 2, 100),
(8, 3, 1),
(8, 3, 100),
(8, 4, 1),
(8, 4, 100),
(8, 5, 3),
(9, 1, 1),
(9, 1, 100),
(9, 2, 1),
(9, 2, 2),
(9, 2, 100),
(9, 3, 1),
(9, 3, 2),
(9, 3, 100),
(9, 4, 1),
(9, 4, 100),
(9, 5, 1),
(9, 5, 100),
(9, 6, 1),
(9, 6, 100),
(9, 7, 3),
(9, 8, 3),
(10, 1, 1),
(10, 1, 100),
(10, 2, 1),
(10, 2, 2),
(10, 2, 100),
(10, 3, 1),
(10, 3, 2),
(10, 3, 100),
(10, 4, 1),
(10, 4, 100),
(10, 5, 1),
(10, 5, 100),
(10, 6, 3),
(10, 7, 3),
(11, 1, 1),
(11, 1, 100),
(11, 2, 1),
(11, 2, 2),
(11, 2, 100),
(11, 3, 1),
(11, 3, 2),
(11, 3, 100),
(11, 4, 1),
(11, 4, 100),
(11, 5, 1),
(11, 5, 100),
(11, 6, 3),
(11, 7, 3),
(12, 1, 1),
(12, 1, 100),
(12, 2, 1),
(12, 2, 2),
(12, 2, 100),
(12, 3, 1),
(12, 3, 100),
(12, 4, 3),
(12, 5, 3),
(13, 1, 1),
(13, 1, 100),
(13, 2, 1),
(13, 2, 3),
(13, 2, 100),
(13, 3, 1),
(13, 3, 100),
(13, 4, 1),
(13, 4, 2),
(13, 4, 100),
(14, 1, 1),
(14, 1, 3),
(14, 1, 100),
(14, 2, 1),
(14, 2, 2),
(14, 2, 100),
(14, 3, 1),
(14, 3, 2),
(14, 3, 100),
(14, 4, 1),
(14, 4, 100),
(14, 5, 3),
(14, 6, 3),
(15, 1, 1),
(15, 1, 100),
(15, 2, 1),
(15, 2, 100),
(15, 3, 1),
(15, 3, 2),
(15, 3, 100),
(15, 4, 1),
(15, 4, 2),
(15, 4, 3),
(15, 4, 100),
(15, 5, 3),
(16, 1, 1),
(16, 1, 100),
(16, 2, 1),
(16, 2, 2),
(16, 2, 100),
(16, 3, 1),
(16, 3, 2),
(16, 3, 100),
(16, 4, 1),
(16, 4, 3),
(16, 4, 100),
(17, 1, 1),
(17, 1, 100),
(17, 2, 1),
(17, 2, 2),
(17, 2, 100),
(17, 3, 1),
(17, 3, 2),
(17, 3, 100),
(17, 4, 1),
(17, 4, 100),
(17, 5, 3),
(18, 1, 1),
(18, 1, 100),
(18, 2, 1),
(18, 2, 2),
(18, 2, 100),
(18, 3, 1),
(18, 3, 100),
(18, 4, 1),
(18, 4, 100),
(18, 5, 3),
(19, 1, 1),
(19, 1, 100),
(19, 2, 1),
(19, 2, 2),
(19, 2, 100),
(19, 3, 3),
(20, 1, 1),
(20, 1, 100),
(20, 2, 1),
(20, 2, 2),
(20, 2, 100),
(20, 3, 1),
(20, 3, 2),
(20, 3, 100),
(20, 4, 1),
(20, 4, 100),
(20, 5, 1),
(20, 5, 3),
(20, 5, 100),
(21, 1, 1),
(21, 1, 100),
(21, 2, 1),
(21, 2, 2),
(21, 2, 100),
(21, 4, 1),
(21, 4, 100),
(21, 5, 1),
(21, 5, 3),
(21, 5, 100),
(22, 1, 1),
(22, 1, 100),
(22, 2, 1),
(22, 2, 2),
(22, 2, 100),
(22, 3, 1),
(22, 3, 2),
(22, 3, 100),
(22, 4, 1),
(22, 4, 100),
(22, 5, 1),
(22, 5, 100),
(22, 6, 3),
(23, 1, 1),
(23, 1, 2),
(23, 1, 100),
(23, 2, 1),
(23, 2, 2),
(23, 2, 100),
(23, 3, 1),
(23, 3, 100),
(23, 4, 1),
(23, 4, 100),
(23, 5, 3),
(24, 1, 1),
(24, 1, 100),
(24, 2, 1),
(24, 2, 100),
(24, 3, 1),
(24, 3, 2),
(24, 3, 100),
(24, 4, 1),
(24, 4, 100),
(24, 5, 1),
(24, 5, 100),
(24, 6, 1),
(24, 6, 100),
(24, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `codigo` int(2) NOT NULL,
  `orden` int(10) UNSIGNED NOT NULL,
  `pista` varchar(200) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`codigo`, `orden`, `pista`, `autor`) VALUES
(1, 1, ' Me dijo que quer&iacute;a conocer la Casa Rosada.', 'juanse'),
(2, 1, 'Buscaba una gorra. Dijo que en Mar del Plata hay mucho sol.', 'juanse'),
(3, 1, ' Me estuvo haciendo preguntas sobre las ruinas de Cayast&aacute;.', 'juanse'),
(4, 1, ' Quer&iacute;a conocer la residencia de Justo Jos&eacute; de Urquiza.', 'juanse'),
(5, 1, ' Me dijo que quer&iacute;a conocer la ciudad en donde naci&oacute; San Mart&iacute;n.', 'juanse'),
(6, 1, ' Quer&iacute;a conocer las cataratas del Iguaz&uacute;.', 'juanse'),
(7, 1, 'Quer&iacute;a viajar a la ciudad de Clorinda.', 'juanse'),
(8, 1, 'Quer&iacute;a viajar a la ciudad de Resistencia.', 'juanse'),
(9, 1, ' Quer&iacute;a conocer la Quebrada de Humahuaca.', 'juanse'),
(10, 1, ' Estaba interesado en los vinos de Cafayate.', 'juanse'),
(11, 1, ' Estaba interesado en libros acerca de nuestra Independencia.', 'juanse'),
(12, 1, ' Quer&iacute;a conocer la Cuesta del Portezuelo.', 'juanse'),
(13, 1, 'Le&iacute;a un libro con la historia del caudillo Facundo Quiroga.', 'juanse'),
(14, 1, 'Ten&iacute;a un bombo leg&uuml;ero para tocar chacareras.', 'juanse'),
(15, 1, ' Quer&iacute;a conocer la Universidad m&aacute;s antigua de Argentina.', 'juanse'),
(16, 1, ' Me dijo que iba a visitar a un amigo puntano.', 'juanse'),
(17, 1, ' Me solicit&oacute; informaci&oacute;n acerca de Ischigualasto.', 'juanse'),
(18, 1, ' Me dijo que quer&iacute;a escalar el Aconcagua.', 'juanse'),
(19, 1, 'Quer&iacute;a viajar a General Pico.', 'juanse'),
(20, 1, ' Me dijo que pensaba escalar el volc&aacute;n Lan&iacute;n.', 'juanse'),
(21, 1, 'Quer&iacute;a viajar a Bariloche.', 'juanse'),
(22, 1, ' Me pidi&oacute; informaci&oacute;n acerca del Parque Nacional Los Alerces.', 'juanse'),
(23, 1, ' Quer&iacute;a conocer el Glaciar Perito Moreno.', 'juanse'),
(24, 1, 'Quer&iacute;a conocer la ciudad m&aacute;s austral del mundo.', 'juanse'),
(1, 6, ' Me dijo que quer&iacute;a conocer la casa de Gardel, en el Abasto.', 'musiquero'),
(1, 4, 'Quer&iacute;a conocer el Cabildo', 'juanse'),
(1, 5, 'Quer&iacute;a conocer la Biblioteca Nacional', 'juanse'),
(1, 3, 'Quer&iacute;a conocer el Obelisco.', 'juanse'),
(2, 2, 'Quer&iacute;a visitar la bah&iacute;a de Samboromb&oacute;n.', 'juanse'),
(2, 3, 'Quer&iacute;a ir a Pehuaj&oacute;, a ver el monumento a Manuelita.', 'juanse'),
(2, 4, 'Quer&iacute;a pescar en el r&iacute;o Quequ&eacute;n', 'juanse'),
(2, 5, 'Pergunt&oacute; d&oacute;nde queda Trenque Lauquen.', 'juanse'),
(3, 2, 'Quer&iacute;a pescar en el r&iacute;o Carcara&ntilde;&aacute;.', 'juanse'),
(3, 3, 'Quer&iacute;a ver la laguna Set&uacute;bal.', 'juanse'),
(3, 4, 'Quer&iacute;a conocer el Monumento a la Bandera.', 'juanse'),
(3, 5, 'Quer&iacute;a visitar la ciudad de Reconquista.', 'juanse'),
(4, 2, 'Quer&iacute;a conocer el R&iacute;o Gualeguay.', 'juanse'),
(4, 3, 'Iba a una provincia que queda al sur del r&iacute;o Guayquirar&oacute;.', 'juanse'),
(4, 4, 'Andaba preguntando c&oacute;mo es el clima en la ciudad de Paran&aacute;.', 'juanse'),
(4, 5, 'Estuvo estudiando la historia del caudillo Francisco Pancho Ram&iacute;rez.', 'juanse'),
(5, 2, 'Quer&iacute;a conocer los Esteros del Iber&aacute;.', 'juanse'),
(5, 3, 'Quer&iacute;a conocer la represa hidroel&eacute;ctrica de Yacyret&aacute;.', 'juanse'),
(5, 4, 'Me dijo que iba a la &uacute;nica provincia que tiene dos idiomas oficiales.', 'juanse'),
(5, 5, 'Iba a la ciudad de Goya.', 'juanse'),
(6, 2, 'Quer&iacute;a ver la desembocadura del r&iacute;o Iguaz&uacute; en el Paran&aacute;.', 'juanse'),
(6, 3, 'Iba a la ciudad de Ap&oacute;stoles.', 'juanse'),
(6, 4, 'Dijo que me iba a traer un poco de tierra colorada.', 'juanse'),
(6, 5, 'Estaba leyendo un libro de Horacio Quiroga.', 'juanse'),
(6, 6, 'Iba a visitar las ruinas de San Ignacio.', 'juanse'),
(7, 2, 'Quer&iacute;a conocer el r&iacute;o Pilcomayo.', 'juanse'),
(7, 3, 'Quer&iacute;a conocer el r&iacute;o Paraguay.', 'juanse'),
(7, 4, 'Iba a la ciudad de Piran&eacute;.', 'juanse'),
(8, 2, 'Iba al r&iacute;o Bermejito.', 'juanse'),
(8, 3, 'Pregunt&oacute; d&oacute;nde queda la ciudad de Quitilipi.', 'juanse'),
(8, 4, 'Estaba interesado en la cosecha del algod&oacute;n.', 'juanse'),
(9, 2, 'Quer&iacute;a conocer la Laguna de los Pozuelos.', 'juanse'),
(9, 3, 'Quer&iacute;a visitar el r&iacute;o Grande de Humahuaca.', 'juanse'),
(9, 4, 'Quer&iacute;a sacarse una foto en Purmamarca.', 'juanse'),
(9, 5, 'Dijo que pensaba irse a Chile por el paso de Jama.', 'juanse'),
(9, 6, 'Pregunt&oacute; por la historia del marqu&eacute;s de Yavi.', 'juanse'),
(10, 2, 'Iba a remar en el dique Cabra Corral.', 'juanse'),
(10, 3, 'Quer&iacute;a conocer la historia del r&iacute;o Juramento.', 'juanse'),
(10, 4, 'Estaba estudiando la historia de Mart&iacute;n G&uuml;emes.', 'juanse'),
(10, 5, 'Ten&iacute;a miedo de marearse en el Tren a las Nubes.', 'juanse'),
(11, 2, 'Iba a conocer el r&iacute;o Sal&iacute;.', 'juanse'),
(11, 3, 'Iba a acampar en el dique El Cadillal.', 'juanse'),
(11, 4, 'Quer&iacute;a comprar algo en la feria de Simoca.', 'juanse'),
(11, 5, 'Andaba buscando una postal de Taf&iacute; del Valle.', 'juanse'),
(12, 2, 'Le preocupaba la contaminaci&oacute;n del agua en la zona de Bel&eacute;n.', 'juanse'),
(12, 3, 'Dijo que iba para Andalgal&aacute;.', 'juanse'),
(13, 2, 'Pregunt&oacute; en qu&eacute; &eacute;poca es la fiesta de la Chaya.', 'juanse'),
(13, 3, 'Buscaba informaci&oacute;n sobre el Parque Nacional Talampaya.', 'juanse'),
(13, 4, 'Iba a la Quebrada del R&iacute;o Miranda.', 'juanse'),
(14, 2, 'Iba a una provincia surcada por los r&iacute;os Dulce y Salado.', 'juanse'),
(14, 3, 'Dijo que quer&iacute;a conocer las Termas de R&iacute;o Hondo.', 'juanse'),
(14, 4, 'Estaba aprendiendo algunas palabras en quichua.', 'juanse'),
(15, 2, 'Iba a visitar a un amigo en Traslasierra.', 'juanse'),
(15, 3, 'Dijo que iba a una capital a orillas del Suqu&iacute;a.', 'juanse'),
(15, 4, 'Cantaba una zamba: El viejo r&iacute;o Cosqu&iacute;n...', 'juanse'),
(16, 2, 'Iba a pasear al r&iacute;o Conlara.', 'juanse'),
(16, 3, 'Iba a nadar en el Embalse Potrero de los Funes.', 'juanse'),
(16, 4, 'Iba silbando la cueca Calle Angosta.', 'juanse'),
(17, 2, '&iquest;Pancracio el zorro? Me dijo que iba al r&iacute;o J&aacute;chal.', 'juanse'),
(17, 3, 'Me pregunt&oacute; por la pesca en el r&iacute;o de los Patos.', 'juanse'),
(17, 4, 'Escuchaba por radio un partido de Desamparados.', 'juanse'),
(18, 2, 'Iba a navegar por el ca&ntilde;&oacute;n del Atuel.', 'juanse'),
(18, 3, 'Iba a conocer el Puente del Inca.', 'juanse'),
(18, 4, '&iexcl;Yo lo vi a Pancracio el Zorro! Iba a Malarg&uuml;e.', 'juanse'),
(19, 2, 'Iba a una provincia que est&aacute; al norte del R&iacute;o Colorado.', 'juanse'),
(20, 2, '&iquest;Pancracio el Zorro? Me dijo que iba al Lago Alumin&eacute;.', 'juanse'),
(20, 3, 'Me dijo que se iba a pasear al Lago Traful.', 'juanse'),
(20, 4, 'Iba a visitar a un amigo mapuche, en Ruca Choroi.', 'juanse'),
(20, 5, 'Cantaba una canci&oacute;n muy triste: Pero est&aacute; tan fr&iacute;o en CutralC&oacute;...', 'juanse'),
(21, 2, 'Me pregunt&oacute; si hay islas en el lago Mascardi.', 'juanse'),
(1, 7, 'Quer&iacute;a aprender a bailar tango.', 'musiquero'),
(21, 4, 'Quer&iacute;a ir a ver la producci&oacute;n de manzanas en el Alto Valle.', 'juanse'),
(21, 3, '&iquest;Pancracio el Zorro? &iexcl;Me dijo que iba para Viedma!', 'juanse'),
(22, 2, 'Quer&iacute;a ir a conocer el Lago Puelo.', 'juanse'),
(22, 3, 'Iba a ver ballenas en la pen&iacute;nsula Vald&eacute;s.', 'juanse'),
(22, 4, '&iquest;Pancracio el Zorro? Me dijo que iba para Rawson.', 'juanse'),
(22, 5, 'Dijo que ten&iacute;a un amigo gal&eacute;s en Trevelin.', 'juanse'),
(23, 2, 'Me dijo que iba a saludar a los ping&uuml;inos en la bah&iacute;a de San Juli&aacute;n.', 'juanse'),
(23, 3, '&iquest;Pancracio el Zorro? Ten&iacute;a un pasaje para R&iacute;o Gallegos.', 'juanse'),
(23, 4, 'S&iacute;, yo lo vi a Pancracio. Iba a conocer la r&iacute;a Deseado.', 'juanse'),
(24, 2, 'Me dijo que iba por la ruta 3 hasta la bah&iacute;a Lapataia.', 'juanse'),
(24, 3, 'Creo que lo vi al Zorro... me coment&oacute; algo del Lago Fagnano.', 'juanse'),
(24, 4, 'Quer&iacute;a visitar las Islas Malvinas.', 'juanse'),
(24, 5, 'Buscaba una campera para ir a la base Marambio.', 'juanse'),
(24, 6, 'Yo estuve conversando con Pancracio. Me dijo que iba a estar en Tolhuin.', 'juanse'),
(2, 6, 'Quer&iacute;a conocer la ciudad natal de Astor Piazzolla.', 'musiquero'),
(3, 6, 'Cantaba el chamam&eacute; Merceditas.', 'musiquero'),
(3, 7, 'Cantaba un tema de Jorge Fandermole.', 'musiquero'),
(4, 6, 'Yo lo escuch&eacute; pasar a Pancracio. Silbaba una chamarrita.', 'musiquero'),
(5, 6, 'Iba cantando el chamam&eacute; Kil&oacute;metro 11.', 'musiquero'),
(5, 7, 'Iba cantando el rasguido doble Puente Pexoa.', 'musiquero'),
(6, 7, 'Escuchaba en su celular una polka del Chango Spasiuk.', 'musiquero'),
(6, 8, 'Cantaba Posade&ntilde;a linda, de Ram&oacute;n Ayala.', 'musiquero'),
(7, 5, 'Le o&iacute; cantar el final de un Chamam&eacute;: cantan las aves, el sol te quema miel maderera del litoral.', 'musiquero'),
(8, 5, 'Escuchaba un CD de Zitto Segovia.', 'musiquero'),
(9, 7, 'Tocaba en su charango el carnavalito El Humahuaque&ntilde;o.', 'musiquero'),
(9, 8, 'Me dijo que le gustaba la m&uacute;sica de Ricardo Vilca.', 'musiquero'),
(10, 6, 'Iba silbando una zamba del Cuchi Leguizam&oacute;n.', 'musiquero'),
(10, 7, 'Me cont&oacute; que hab&iacute;a estado en una de las despedidas de Los Chalchaleros.', 'musiquero'),
(11, 6, 'Me pregunt&oacute; d&oacute;nde hab&iacute;a nacido Mercedes Sosa.', 'musiquero'),
(11, 7, 'Cantaba: Para las otras no... pa las del norte s&iacute;....', 'musiquero'),
(12, 4, 'Cantaba una zamba: Un pueblito aqu&iacute;, otro m&aacute;s all&aacute;, y un camino largo que baja y se pierde.', 'musiquero'),
(12, 5, 'Cantaba una zamba: Tejedora belenista, telar en flor....', 'musiquero'),
(14, 5, 'Cantaba la chacarera A&ntilde;oranzas.', 'musiquero'),
(14, 6, 'Escuchaba una chacarera en quichua de don Sixto Palavecino.', 'musiquero'),
(15, 5, 'Cantaba un vals: Ciudad de mis amores, antigua y religiosa...', 'musiquero'),
(17, 5, 'Pancracio el Zorro iba cantando Por las tardes de sol y alamedas...', 'musiquero'),
(18, 5, 'Cantaba la cueca Los 60 granaderos.', 'musiquero'),
(19, 3, 'Me pregunt&oacute; d&oacute;nde naci&oacute; Alberto Cortez.', 'musiquero'),
(21, 5, 'Cantaba un loncomeo que habla de Allen.', 'musiquero'),
(22, 6, 'Cantaba una canci&oacute;n de Rub&eacute;n Patagonia.', 'musiquero'),
(23, 5, 'Pancracio cantaba: Aoniken, Chalt&eacute;n.', 'musiquero'),
(24, 7, 'Quer&iacute;a saber a qu&eacute; se refer&iacute;a Atahualpa con la hermanita perdida.', 'musiquero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posiciones`
--

CREATE TABLE `posiciones` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `km` bigint(20) NOT NULL,
  `base` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codigo` int(2) NOT NULL,
  `provincia` varchar(60) NOT NULL,
  `div` varchar(60) NOT NULL,
  `interlocutor` varchar(40) NOT NULL,
  `epigrafe_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`codigo`, `provincia`, `div`, `interlocutor`, `epigrafe_foto`) VALUES
(1, ' Capital Federal (Ciudad de Buenos Aires)', 'capital', 'Paloma', 'Cabildo'),
(2, ' Provincia de Buenos Aires', 'buenosaires', 'Caballo', 'Mar del Plata'),
(3, ' Provincia de Santa Fe', 'santafe', 'Vaca', 'Monumento a la Bandera - Rosario'),
(4, ' Provincia de Entre R&iacute;os', 'entrerios', 'Surub&iacute;', 'Palacio San Jos&eacute;'),
(5, ' Provincia de Corrientes', 'corrientes', 'Yacar&eacute;', 'Esteros del Iber&aacute;'),
(6, ' Provincia de Misiones', 'misiones', 'Yaguaret&eacute;', 'Cataratas del Iguaz&uacute;'),
(7, ' Provincia de Formosa', 'formosa', 'Tuc&aacute;n', 'Ba&ntilde;ado de la Estrella'),
(8, ' Provincia del Chaco', 'chaco', 'Carpincho', 'R&iacute;o Paran&aacute;'),
(9, ' Provincia de Jujuy', 'jujuy', 'Vicu&ntilde;a', 'Purmamarca'),
(10, ' Provincia de Salta', 'salta', 'Llama', 'Iglesia San Francisco'),
(11, ' Provincia de Tucum&aacute;n', 'tucuman', 'Hornero', 'Casa de la Independencia'),
(12, ' Provincia de Catamarca', 'catamarca', 'Suri', 'Balcozna'),
(13, ' Provincia de La Rioja', 'larioja', 'Cabra', 'R&iacute;o Miranda'),
(14, ' Provincia de Santiago del Estero', 'santiago', 'Quirquincho', 'Plaza Libertad'),
(15, ' Provincia de C&oacute;rdoba', 'cordoba', 'Burrito', 'Catedral'),
(16, ' Provincia de San Luis', 'sanluis', 'Venado de las pampas', 'Sierra de las Quijadas'),
(17, ' Provincia de San Juan', 'sanjuan', 'C&oacute;ndor', 'Ischigualasto (Valle de la luna)'),
(18, ' Provincia de Mendoza', 'mendoza', 'Mula', 'Aconcagua'),
(19, ' Provincia de La Pampa', 'lapampa', '&ntilde;and&uacute;', 'Caldenes'),
(20, ' Provincia del Neuqu&eacute;n', 'neuquen', 'Guanaco', 'Volc&aacute;n Lan&iacute;n'),
(21, ' Provincia de R&iacute;o Negro', 'rionegro', 'Pud&uacute;', 'Lago Nahuel Huapi'),
(22, ' Provincia del Chubut', 'chubut', 'Ballena', 'Ballena en Pen&iacute;nsula Vald&eacute;s'),
(23, ' Provincia de Santa Cruz', 'santacruz', 'Huemul', 'Glaciar Perito Moreno'),
(24, 'Provincia de Tierra del Fuego', 'fuego', 'Ping&uuml;ino', 'Ushuaia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `contras` varchar(255) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `escuela` varchar(200) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`id_base`);

--
-- Indices de la tabla `bases_pistas`
--
ALTER TABLE `bases_pistas`
  ADD PRIMARY KEY (`provincia`,`orden`,`base`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`codigo`,`orden`);

--
-- Indices de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bases`
--
ALTER TABLE `bases`
  MODIFY `id_base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `posiciones`
--
ALTER TABLE `posiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
