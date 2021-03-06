-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 27-Jul-2014 às 20:49
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de Dados: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_anexo1`
--

CREATE TABLE IF NOT EXISTS `1_anexo1` (
  `id_ficha` int(11) NOT NULL,
  `tab1_p1` int(11) DEFAULT NULL,
  `tab2_p1` int(11) DEFAULT NULL,
  `tab2_p2` int(11) DEFAULT NULL,
  `tab3_p1` int(11) DEFAULT NULL,
  `tab3_p2` int(11) DEFAULT NULL,
  `tab3_p3` int(11) DEFAULT NULL,
  `tab3_p4` int(11) DEFAULT NULL,
  `tab3_p5` int(11) DEFAULT NULL,
  `tab3_p6` int(11) DEFAULT NULL,
  `tab3_p7` int(11) DEFAULT NULL,
  `tab3_p8` int(11) DEFAULT NULL,
  `tab3_p9` int(11) DEFAULT NULL,
  `tab3_p10` int(11) DEFAULT NULL,
  `tab3_p11` int(11) DEFAULT NULL,
  `tab3_p12` int(11) DEFAULT NULL,
  `tab4_p1` int(11) DEFAULT NULL,
  `tab4_p2` int(11) DEFAULT NULL,
  `tab4_p3` int(11) DEFAULT NULL,
  `tab4_p4` int(11) DEFAULT NULL,
  `tab4_p5` int(11) DEFAULT NULL,
  `tab4_p6` int(11) DEFAULT NULL,
  `tab4_p7` int(11) DEFAULT NULL,
  `tab4_p8` int(11) DEFAULT NULL,
  `tab4_p9` int(11) DEFAULT NULL,
  `tab4_p10` int(11) DEFAULT NULL,
  `entrevistador` varchar(100) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_anexo1`
--
ALTER TABLE `1_anexo1`
  ADD CONSTRAINT `pk1_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `1_ficha` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk1_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
