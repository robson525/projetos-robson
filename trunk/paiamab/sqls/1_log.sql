-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 27-Jul-2014 às 20:50
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

--
-- Base de Dados: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_log`
--

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

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_log`
--
ALTER TABLE `1_log`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
