-- 
-- Banco de Dados: `araruna_paiamab`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `1_form_usuario`
-- 

CREATE TABLE `1_form_usuario` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `ultima_sessao` timestamp NULL default NULL,
  `admin` binary(1) NOT NULL default '0',
  UNIQUE KEY `id_usuario` (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `1_form_usuario`
-- 

INSERT INTO `1_form_usuario` (`id_usuario`, `login`, `senha`, `nome`, `ultima_sessao`, `admin`) VALUES 
(1, 'robson', '123456', 'Robson Claudio', NULL, 0x31);
