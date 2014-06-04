-- 
-- Banco de Dados: `araruna_paiamab`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `1_usuario`
-- 

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `1_form_usuario`
-- 

INSERT INTO `1_form_usuario` (`id_usuario`, `login`, `senha`, `nome`, `ultima_sessao`, `admin`) VALUES 
(1, 'robson', '123456', 'Robson Claudio', NULL, 0x31);
