-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Jun-2014 às 20:48
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

--
-- Base de Dados: `araruna_paiamab`
--
CREATE DATABASE IF NOT EXISTS `araruna_paiamab` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `araruna_paiamab`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_anexo1`
--

DROP TABLE IF EXISTS `1_anexo1`;
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_anexo2`
--

DROP TABLE IF EXISTS `1_anexo2`;
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_backup`
--

DROP TABLE IF EXISTS `1_backup`;
CREATE TABLE IF NOT EXISTS `1_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contador` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arquivo` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_ficha`
--

DROP TABLE IF EXISTS `1_ficha`;
CREATE TABLE IF NOT EXISTS `1_ficha` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `n_controle` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `idade` varchar(3) DEFAULT '',
  `sexo` varchar(10) DEFAULT '',
  `n_sus` varchar(15) DEFAULT '',
  `n_prontuario` varchar(15) DEFAULT '',
  `rg` varchar(15) DEFAULT '',
  `cpf` varchar(15) DEFAULT '',
  `cuidador` varchar(100) DEFAULT '',
  `endereco` varchar(150) DEFAULT '',
  `telefone` varchar(15) DEFAULT '',
  `pai` varchar(100) DEFAULT '',
  `mae` varchar(100) DEFAULT '',
  `c_q_mora` varchar(50) DEFAULT '',
  `c_q_mora_outro` varchar(50) DEFAULT '',
  `q_filhos` varchar(20) DEFAULT '',
  `q_filhos_mais` varchar(20) DEFAULT '',
  `atualmente` varchar(20) DEFAULT '',
  `residencia` varchar(20) DEFAULT '',
  `moram_casa` varchar(10) DEFAULT NULL,
  `moram_casa_mais` varchar(10) DEFAULT NULL,
  `escolaridade` varchar(25) DEFAULT '',
  `renda` varchar(50) DEFAULT '',
  `programa` varchar(100) DEFAULT '',
  `violencia` varchar(25) DEFAULT '',
  `qual_violencia` varchar(25) DEFAULT '',
  `entrevistador` varchar(100) DEFAULT '',
  `data` varchar(10) DEFAULT '',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ficha`),
  UNIQUE KEY `n_controle` (`n_controle`),
  KEY `id_ficha` (`id_ficha`),
  KEY `pk_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_log`
--

DROP TABLE IF EXISTS `1_log`;
CREATE TABLE IF NOT EXISTS `1_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` int(11) NOT NULL COMMENT '1 = login de Usuario 	2 = Cadastro de Usuario 	3 = Exclusão de Usuario 	 	4 = Criação de Prontuario  	5 = Edição de Prontuario 	6 = Exclusão de Prontuario',
  `id_ficha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_log` (`id_log`),
  KEY `fk_usuario` (`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_ficha` (`id_ficha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_usuario`
--

DROP TABLE IF EXISTS `1_usuario`;
CREATE TABLE IF NOT EXISTS `1_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `ultima_sessao` timestamp NULL DEFAULT NULL,
  `admin` binary(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_anexo1`
--
ALTER TABLE `1_anexo1`
  ADD CONSTRAINT `pk1_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `1_ficha` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk1_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `1_anexo2`
--
ALTER TABLE `1_anexo2`
  ADD CONSTRAINT `pk2_id_ficha` FOREIGN KEY (`id_ficha`) REFERENCES `1_ficha` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk2_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `1_ficha`
--
ALTER TABLE `1_ficha`
  ADD CONSTRAINT `pk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `1_log`
--
ALTER TABLE `1_log`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
