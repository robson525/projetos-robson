--
-- Base de Dados: `araruna_paiamab`
--
CREATE DATABASE IF NOT EXISTS `araruna_paiamab` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `araruna_paiamab`;

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
(1, 'controle', 'nome', 'ida', 'Masculino', 'sus', 'prontuario', 'rg', 'cpf', 'cuidador', 'endereco', 'telefone', 'pai', 'mae', 'outros', 'quem mora', 'mais', 'mais filhosasdsadsa', 'Esta Aposentado(a)', 'Própria', 'mai', 'mp1', 'Ensino Fundamental Incomp', 'Até R$ 610,00', 'BPC - Benefício de Prestação Continuada / Pessoa com Deficiência', 'Sim', 'vitima', 'entrevistador', 'data', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_form_usuario`
--

CREATE TABLE IF NOT EXISTS `1_form_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `ultima_sessao` timestamp NULL DEFAULT NULL,
  `admin` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `1_form_usuario`
--

INSERT INTO `1_form_usuario` (`id_usuario`, `login`, `senha`, `nome`, `ultima_sessao`, `admin`) VALUES
(1, 'robson', 'e10adc3949ba59abbe56e057f20f883e', 'Robson Claudio', NULL, '1');
