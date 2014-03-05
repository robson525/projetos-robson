-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Mar-2014 às 02:56
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `lionsdla6`
--
CREATE DATABASE IF NOT EXISTS `lionsdla6` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lionsdla6`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `xv_convencao`
--

DROP TABLE IF EXISTS `xv_convencao`;
CREATE TABLE IF NOT EXISTS `xv_convencao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `xv_convencao`
--

INSERT INTO `xv_convencao` (`id`, `nome`, `matricula`, `cpf`, `email`, `nascimento`, `endereco`, `complemento`, `estado`, `cidade`, `clube`, `delegado`, `cargo_clube`, `qual_cc`, `cargo_distrito`, `qual_cd`, `cl_mj`, `prefixo`, `camisa`) VALUES
(2, 'ROBSON CLAUDIO VALENTE DA SILVA', '0000000000', '847.012.002-63', 'robson.cao@hotmail.com', '1990-05-06', 'TV 25 DE JUNHO', '525', 'PARÁ', 'BELÉM', 'LIONS CLUBE DE BELÉM BATISTA CAMPOS', 'SIM', 'OUTRO', 'OUTRO CARGO', 'OUTRO', 'OUTRO CARGO', 'SIM', 'Cal', 'P');
