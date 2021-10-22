-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 02:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_elecciones`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidato` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_candidato` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos_candidato` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ci_candidato` int(10) UNSIGNED NOT NULL,
  `ci_dpto_candidato` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono_candidato` int(15) NOT NULL,
  `perfil_candidato` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `candidatos`
--

INSERT INTO `candidatos` (`id_candidato`, `nombre_candidato`, `apellidos_candidato`, `ci_candidato`, `ci_dpto_candidato`, `fecha_nacimiento`, `telefono_candidato`, `perfil_candidato`, `estado`) VALUES
(0000000001, 'Lorenzo Santiago', 'Villegas', 32132132, 'SC', '1998-03-13', 222222, 'view/img/candidate/lorenzosantiagosaulariasvillegas-130821_173434000/perfil.jpg', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_evento` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_evento`, `nombre_categoria`, `estado`) VALUES
(0000000001, 0000000001, 'Presidencia', b'1'),
(0000000002, 0000000002, 'Secretaría', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_candidato`
--

CREATE TABLE `categoria_candidato` (
  `id_categoria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_candidato` int(10) UNSIGNED ZEROFILL NOT NULL,
  `cantidad_votos` int(10) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categoria_candidato`
--

INSERT INTO `categoria_candidato` (`id_categoria`, `id_candidato`, `cantidad_votos`, `estado`) VALUES
(0000000001, 0000000001, 2, b'1'),
(0000000002, 0000000001, 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(10) UNSIGNED NOT NULL,
  `nombre_evento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_evento` date NOT NULL,
  `inicio_elecciones` datetime NOT NULL,
  `final_elecciones` datetime NOT NULL,
  `final_evento` date NOT NULL,
  `estado` binary(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre_evento`, `inicio_evento`, `inicio_elecciones`, `final_elecciones`, `final_evento`, `estado`) VALUES
(1, 'Elecciones generales gestión 2021', '2021-08-15', '2021-08-15 08:00:00', '2021-08-15 18:00:00', '2021-08-25', 0x31),
(2, 'Elecciones secundarias 2021', '2021-08-21', '2021-08-19 08:00:00', '2021-08-19 18:00:00', '2021-08-25', 0x31);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ci_usuario` int(10) NOT NULL,
  `ci_dpto_usuario` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_usuario` int(10) DEFAULT NULL,
  `email_usuario` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'operador',
  `usuario_acceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave_acceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `votacion`
--

CREATE TABLE `votacion` (
  `id_votante` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_cateogria` int(10) UNSIGNED ZEROFILL NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `votantes`
--

CREATE TABLE `votantes` (
  `id_votante` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nombre_votante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_votante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ci_votante` int(10) NOT NULL,
  `codigo_socio` int(10) NOT NULL,
  `clave_acceso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_votante` int(10) DEFAULT NULL,
  `email_votante` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`) USING BTREE,
  ADD KEY `id_evento` (`id_evento`);

--
-- Indexes for table `categoria_candidato`
--
ALTER TABLE `categoria_candidato`
  ADD KEY `evento` (`id_categoria`) USING BTREE,
  ADD KEY `FK_categoria_candidato_candidatos` (`id_candidato`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `votacion`
--
ALTER TABLE `votacion`
  ADD KEY `id_votante` (`id_votante`),
  ADD KEY `id_evento` (`id_cateogria`) USING BTREE;

--
-- Indexes for table `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`id_votante`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidato` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votantes`
--
ALTER TABLE `votantes`
  MODIFY `id_votante` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `FK_categoria_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Constraints for table `categoria_candidato`
--
ALTER TABLE `categoria_candidato`
  ADD CONSTRAINT `FK_categoria_candidato_candidatos` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id_candidato`),
  ADD CONSTRAINT `FK_categoria_candidato_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `FK_votacion_categoria` FOREIGN KEY (`id_cateogria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `FK_votacion_votantes` FOREIGN KEY (`id_votante`) REFERENCES `votantes` (`id_votante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
