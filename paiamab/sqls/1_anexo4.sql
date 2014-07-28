-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 27-Jul-2014 às 20:47
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_anexo4`
--

CREATE TABLE IF NOT EXISTS `1_anexo4` (
  `id_ficha` int(11) NOT NULL,
  `tab1_p1` varchar(2) DEFAULT NULL,
  `tab1_p1_q` varchar(100) DEFAULT NULL,
  `tab1_p2` varchar(2) DEFAULT NULL,
  `tab1_p2_q` varchar(100) DEFAULT NULL,
  `tab1_p3` varchar(2) DEFAULT NULL,
  `tab1_p3_q` varchar(100) DEFAULT NULL,
  `tab1_p4` varchar(2) DEFAULT NULL,
  `tab1_p4_q` varchar(100) DEFAULT NULL,
  `tab1_p5` varchar(2) DEFAULT NULL,
  `tab1_p5_q` varchar(100) DEFAULT NULL,
  `tab1_p6_1` varchar(2) DEFAULT NULL,
  `tab1_p6_2` varchar(2) DEFAULT NULL,
  `tab1_p6_3` varchar(2) DEFAULT NULL,
  `tab1_p6_4` varchar(100) DEFAULT NULL,
  `tab1_p6_5` varchar(2) DEFAULT NULL,
  `tab1_p6_6` varchar(100) DEFAULT NULL,
  `tab1_p7` varchar(2) DEFAULT NULL,
  `tab1_p8` varchar(2) DEFAULT NULL,
  `tab1_p8_q` varchar(100) DEFAULT NULL,
  `tab1_p9` varchar(2) DEFAULT NULL,
  `tab1_p9_1` varchar(2) DEFAULT NULL,
  `tab1_p9_2` varchar(100) DEFAULT NULL,
  `tab1_p10` varchar(2) DEFAULT NULL,
  `tab1_p10_q` varchar(100) DEFAULT NULL,
  `tab1_p11` varchar(2) DEFAULT NULL,
  `tab1_p11_q` varchar(100) DEFAULT NULL,
  `tab1_p12` varchar(2) DEFAULT NULL,
  `tab1_p12_q` varchar(100) DEFAULT NULL,
  `tab2_p1` varchar(2) DEFAULT NULL,
  `tab2_p2` varchar(2) DEFAULT NULL,
  `tab2_p3` varchar(100) DEFAULT NULL,
  `tab3_p1` varchar(2) DEFAULT NULL,
  `tab3_p2` varchar(100) DEFAULT NULL,
  `tab3_p3` varchar(100) DEFAULT NULL,
  `tab3_p4` varchar(100) DEFAULT NULL,
  `tab3_p5` varchar(2) DEFAULT NULL,
  `tab3_p6` varchar(2) DEFAULT NULL,
  `tab3_p7` varchar(2) DEFAULT NULL,
  `tab3_p8` varchar(2) DEFAULT NULL,
  `entrevistador` varchar(100) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_anexo4`
--
ALTER TABLE `1_anexo4`
  ADD CONSTRAINT `pk4_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `1_ficha` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk4_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
