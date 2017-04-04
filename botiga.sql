-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2017 a las 21:25:13
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `botiga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL,
  `descrip_cat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nom_cat`, `descrip_cat`) VALUES
(2, 'senallo', 'Cistella tradicional de les pitiuses'),
(5, 'Roba', 'Roba tradicional'),
(6, 'intruments', 'intruments tradicionals de les pitiusses'),
(7, 'Joies', 'joies tradicionals'),
(9, 'Gastronomia', 'Aliments tradicionals de les illes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `idComanda` int(11) NOT NULL,
  `idUsuari` int(11) NOT NULL,
  `estat` varchar(50) NOT NULL,
  `preuTotal` decimal(11,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `comentaris` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producte`
--

CREATE TABLE `producte` (
  `idProducte` int(11) NOT NULL,
  `nomProducte` varchar(50) NOT NULL,
  `descripcioProducte` varchar(300) NOT NULL,
  `preu` float NOT NULL,
  `stock` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producte`
--

INSERT INTO `producte` (`idProducte`, `nomProducte`, `descripcioProducte`, `preu`, `stock`, `idcat`, `imagen`) VALUES
(26, 'Castanyoles', 'Intrument de madera de Ginebra', 300, 20, 6, './imagenes/6castanyoles.jpg'),
(55, 'flauta', 'Intrument de vent', 300, 5, 6, './imagenes/6Flautas.jpg'),
(57, 'Espassi', 'Intrument de metall', 200, 4, 6, './imagenes/6espasi.jpg'),
(81, 'xeramia', 'Intrument de vent', 200, 10, 6, './imagenes/6xeremia.jpg'),
(82, 'Tambor', 'Intrument de percusio fet amb madera de pi', 300, 10, 6, './imagenes/6tambor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productecomanda`
--

CREATE TABLE `productecomanda` (
  `idComanda` int(11) NOT NULL,
  `idProducte` int(11) NOT NULL,
  `quantitat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `idUsuari` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `cognom` varchar(250) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `locale` varchar(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`idUsuari`, `rol`, `nom`, `email`, `user`, `password`, `cognom`, `oauth_provider`, `oauth_uid`, `gender`, `locale`, `picture`, `created`) VALUES
(1, 'administrador', 'pere', 'juan ', 'admin', 'admin', '', '', '', '', '', '', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`idComanda`),
  ADD UNIQUE KEY `idUsuari` (`idUsuari`);

--
-- Indices de la tabla `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`idProducte`),
  ADD KEY `idCategoria` (`idcat`) USING BTREE;

--
-- Indices de la tabla `productecomanda`
--
ALTER TABLE `productecomanda`
  ADD PRIMARY KEY (`idProducte`,`idComanda`),
  ADD KEY `idComanda` (`idComanda`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`idUsuari`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `idComanda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producte`
--
ALTER TABLE `producte`
  MODIFY `idProducte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `idUsuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`idUsuari`) REFERENCES `usuari` (`idUsuari`);

--
-- Filtros para la tabla `producte`
--
ALTER TABLE `producte`
  ADD CONSTRAINT `producte_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `productecomanda`
--
ALTER TABLE `productecomanda`
  ADD CONSTRAINT `productecomanda_ibfk_1` FOREIGN KEY (`idComanda`) REFERENCES `comanda` (`idComanda`),
  ADD CONSTRAINT `productecomanda_ibfk_2` FOREIGN KEY (`idProducte`) REFERENCES `producte` (`idProducte`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
