-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 27-Jul-2014 às 20:48
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_anexo2`
--

CREATE TABLE IF NOT EXISTS `1_anexo2` (
  `id_ficha` int(11) NOT NULL,
  `tab1_p1` int(11) DEFAULT NULL,
  `tab1_p2` int(11) DEFAULT NULL,
  `tab1_p3` int(11) DEFAULT NULL,
  `tab1_p4` int(11) DEFAULT NULL,
  `tab1_p5` int(11) DEFAULT NULL,
  `tab1_p6` int(11) DEFAULT NULL,
  `tab1_p7` int(11) DEFAULT NULL,
  `tab1_p8` int(11) DEFAULT NULL,
  `tab1_p9` int(11) DEFAULT NULL,
  `tab1_p10` int(11) DEFAULT NULL,
  `tab1_p11` int(11) DEFAULT NULL,
  `tab1_p12` int(11) DEFAULT NULL,
  `tab1_p13` int(11) DEFAULT NULL,
  `tab1_p14` int(11) DEFAULT NULL,
  `tab2_p1` int(11) DEFAULT NULL,
  `tab2_p2` int(11) DEFAULT NULL,
  `tab2_p3` int(11) DEFAULT NULL,
  `tab2_p4` int(11) DEFAULT NULL,
  `tab2_p5` int(11) DEFAULT NULL,
  `tab2_p6` int(11) DEFAULT NULL,
  `tab2_p7` int(11) DEFAULT NULL,
  `tab2_p8` int(11) DEFAULT NULL,
  `tab2_p9` int(11) DEFAULT NULL,
  `tab2_p10` int(11) DEFAULT NULL,
  `tab2_p11` int(11) DEFAULT NULL,
  `tab2_p12` int(11) DEFAULT NULL,
  `tab2_p13` int(11) DEFAULT NULL,
  `tab2_p14` int(11) DEFAULT NULL,
  `entrevistador` varchar(100) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  KEY `id_ficha` (`id_ficha`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_anexo2`
--
ALTER TABLE `1_anexo2`
  ADD CONSTRAINT `pk2_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `1_ficha` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk2_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
