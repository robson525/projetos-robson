-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Fev-2014 às 06:29
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_ficha`
--

CREATE TABLE IF NOT EXISTS `1_ficha` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `n_controle` varchar(15) DEFAULT '',
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
  `moram_casa` varchar(3) DEFAULT '',
  `moram_casa_mais` varchar(3) DEFAULT '',
  `escolaridade` varchar(25) DEFAULT '',
  `renda` varchar(50) DEFAULT '',
  `programa` varchar(100) DEFAULT '',
  `violencia` varchar(25) DEFAULT '',
  `qual_violencia` varchar(25) DEFAULT '',
  `entrevistador` varchar(100) DEFAULT '',
  `data` varchar(10) DEFAULT '',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `id_ficha` (`id_ficha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `1_ficha`
--

INSERT INTO `1_ficha` (`id_ficha`, `n_controle`, `nome`, `idade`, `sexo`, `n_sus`, `n_prontuario`, `rg`, `cpf`, `cuidador`, `endereco`, `telefone`, `pai`, `mae`, `c_q_mora`, `c_q_mora_outro`, `q_filhos`, `q_filhos_mais`, `atualmente`, `residencia`, `moram_casa`, `moram_casa_mais`, `escolaridade`, `renda`, `programa`, `violencia`, `qual_violencia`, `entrevistador`, `data`, `id_usuario`) VALUES
(1, 'controle', 'nome', 'ida', 'Masculino', 'sus', 'prontuario', 'rg', 'cpf', 'cuidador', 'endereco', 'telefone', 'pai', 'mae', 'outros', 'quem mora', 'mais', 'mais filhosasdsadsa', 'Esta Aposentado(a)', 'Própria', 'mai', 'mp1', 'Ensino Fundamental Incomp', 'Até R$ 610,00', 'BPC - Benefício de Prestação Continuada / Pessoa com Deficiência', 'Sim', 'vitima', 'entrevistador', 'data', 1),
(2, 'controle', 'nome', 'ida', 'Masculino', 'sus', 'prontuario', 'rg', 'cpf', 'cuidador', 'endereco', 'telefone', 'pai', 'mae', 'outros', 'quem mora', 'mais', 'mais filhosasdsadsa', 'Esta Aposentado(a)', 'Própria', 'mai', 'mp1', 'Ensino Fundamental Incomp', 'Até R$ 610,00', 'BPC - Benefício de Prestação Continuada / Pessoa com Deficiência', 'Sim', 'vitima', 'entrevistador', 'data', 1),
(3, 'controle', 'nome', 'ida', 'Masculino', 'sus', 'prontuario', 'rg', 'cpf', 'cuidador', 'endereco', 'telefone', 'pai', 'mae', 'outros', 'quem mora', 'mais', 'mais filhosasdsadsa', 'Esta Aposentado(a)', 'Própria', 'mai', 'mp1', 'Ensino Fundamental Incomp', 'Até R$ 610,00', 'BPC - Benefício de Prestação Continuada / Pessoa com Deficiência', 'Sim', 'vitima', 'entrevistador', 'data', 1),
(4, 'controle', 'nome', 'ida', 'Masculino', 'sus', 'prontuario', 'rg', 'cpf', 'cuidador', 'endereco', 'telefone', 'pai', 'mae', 'outros', 'quem mora', 'mais', 'mais filhosasdsadsa', 'Esta Aposentado(a)', 'Própria', 'mai', 'mp1', 'Ensino Fundamental Incomp', 'Até R$ 610,00', 'BPC - Benefício de Prestação Continuada / Pessoa com Deficiência', 'Sim', 'vitima', 'entrevistador', 'data', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
