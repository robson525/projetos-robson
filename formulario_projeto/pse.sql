-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Jan-2014 às 16:27
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `st_pse`
--
CREATE DATABASE IF NOT EXISTS `st_pse` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `st_pse`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_formulario`
--

CREATE TABLE IF NOT EXISTS `1_formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `orgao` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` date NOT NULL,
  `pai` varchar(100) NOT NULL,
  `mae` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) NOT NULL,
  `escolaridade` varchar(40) NOT NULL,
  `extensao` varchar(5) NOT NULL,
  `inep` varchar(8) NOT NULL,
  `secretaria` varchar(50) NOT NULL,
  `reserva` varchar(20) NOT NULL,
  `nivel_ensino` varchar(40) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `outra_funcao` varchar(50) NOT NULL,
  `programa` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
