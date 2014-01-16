-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 10-Jan-2014 às 15:37
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `lionsdla6`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `xv_convencao`
--

CREATE TABLE IF NOT EXISTS `xv_convencao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `clube` varchar(100) NOT NULL,
  `delegado` varchar(10) NOT NULL,
  `cargo_clube` varchar(20) DEFAULT NULL,
  `qual_cc` varchar(30) DEFAULT NULL,
  `cargo_distrito` varchar(20) DEFAULT NULL,
  `qual_cd` varchar(30) DEFAULT NULL,
  `cl_mj` varchar(10) NOT NULL,
  `prefixo` varchar(10) NOT NULL,
  `camisa` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
