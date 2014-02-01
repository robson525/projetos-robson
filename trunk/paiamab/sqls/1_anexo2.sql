-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Fev 01, 2014 as 12:03 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `araruna_paiamab`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `1_anexo2`
-- 

CREATE TABLE `1_anexo2` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) default NULL,
  `id_paciente` int(11) NOT NULL,
  `tab1_p1` int(11) default NULL,
  `tab1_p2` int(11) default NULL,
  `tab1_p3` int(11) default NULL,
  `tab1_p4` int(11) default NULL,
  `tab1_p5` int(11) default NULL,
  `tab1_p6` int(11) default NULL,
  `tab1_p7` int(11) default NULL,
  `tab1_p8` int(11) default NULL,
  `tab1_p9` int(11) default NULL,
  `tab1_p10` int(11) default NULL,
  `tab1_p11` int(11) default NULL,
  `tab1_p12` int(11) default NULL,
  `tab1_p13` int(11) default NULL,
  `tab1_p14` int(11) default NULL,
  `tab2_p1` int(11) default NULL,
  `tab2_p2` int(11) default NULL,
  `tab2_p3` int(11) default NULL,
  `tab2_p4` int(11) default NULL,
  `tab2_p5` int(11) default NULL,
  `tab2_p6` int(11) default NULL,
  `tab2_p7` int(11) default NULL,
  `tab2_p8` int(11) default NULL,
  `tab2_p9` int(11) default NULL,
  `tab2_p10` int(11) default NULL,
  `tab2_p11` int(11) default NULL,
  `tab2_p12` int(11) default NULL,
  `tab2_p13` int(11) default NULL,
  `tab2_p14` int(11) default NULL,
  UNIQUE KEY `id` (`id`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `1_anexo2`
-- 

