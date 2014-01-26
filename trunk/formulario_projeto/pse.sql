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
  `cpf` varchar(14) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(20) NOT NULL,
  `profissao` varchar(20) NOT NULL,
  `outra_profissao` varchar(50) DEFAULT NULL,
  `orgao` varchar(70) NOT NULL,
  `escola` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `1_formulario`
--

INSERT INTO `1_formulario` (`id`, `nome`, `cpf`, `email`, `telefone`, `nascimento`, `endereco`, `complemento`, `cidade`, `profissao`, `outra_profissao`, `orgao`, `escola`) VALUES
(8, 'ROBSON CLAUDIO VALENTE DA SILVA', '847.012.002-63', 'robson.cao@hotmail.com', '(91) 3249-4601', '1990-01-01', 'TV 25 DE JUNHO', 'Nº 525', 'BELÉM', 'PROFESSOR', '', 'SECRETARIA DE EDUCAÇÃO- SEDUC', 'ESCOLA1'),
(9, 'ROBSON CLAUDIO VALENTE DA SILVA', '847.012.002-63', 'robson.cao@hotmail.com', '(91) 3249-4601', '1990-01-01', 'TV 25 DE JUNHO', 'Nº 525', 'BELÉM', 'PROFESSOR', '', 'SECRETARIA DE EDUCAÇÃO- SEDUC', 'ESCOLA1'),
(10, 'ROMARIO ROBERT VALENTE DA SILVA', '847.012.002-63', 'romario@hotmail.com', '(91) 3249-4601', '1987-02-03', 'TV 25 DE JUNHO', 'Nº 525', 'BELÉM', 'GESTOR', '', 'SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC', 'ESCOLA2'),
(11, 'RAYARA CLAUDIA VALENTE DA SILVA', '847.012.002-63', 'rayara@hotmail.com', '(91) 3249-4601', '1987-07-06', 'TV 25 DE JUNHO', 'Nº 525', 'BELÉM', 'OUTRO', 'OUTRO', 'SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED', 'ESCOLA3'),
(12, 'ANA MARIA', '847.012.002-63', 'rayara@hotmail.com', '(91) 3249-4601', '1987-07-06', 'TV 25 DE JUNHO', 'Nº 525', 'BELÉM', 'OUTRO', 'OUTRO', 'SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED', 'ESCOLA3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
