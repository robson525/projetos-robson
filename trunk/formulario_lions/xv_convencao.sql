
--
-- Base de Dados: `lionsdla6`
--
CREATE DATABASE IF NOT EXISTS `lionsdla6` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lionsdla6`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jom0__usuario`
--

CREATE TABLE IF NOT EXISTS `jom0__usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `matricula` varchar(11) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `clube` varchar(100) NOT NULL,
  `delegado` varchar(10) NOT NULL,
  `cargo_clube` varchar(20) DEFAULT NULL,
  `qual_cc` varchar(30) DEFAULT NULL,
  `cargo_distrito` varchar(20) DEFAULT NULL,
  `qual_cd` varchar(30) DEFAULT NULL,
  `cl_mj` varchar(10) NOT NULL,
  `prefixo` varchar(10) NOT NULL,
  `camisa` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;



--
-- Estrutura da tabela `__convencao`
--

CREATE TABLE IF NOT EXISTS `__convencao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `aberta` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `__inscrito_convencao`
--

CREATE TABLE IF NOT EXISTS `__inscricao_convencao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `convencao_id` int(11) NOT NULL,
  `pago` bit(1) NOT NULL DEFAULT b'0',
  `comprovante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`,`convencao_id`),
  KEY `convencao_id` (`convencao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Constraints for dumped tables
--
ALTER TABLE `__inscricao_convencao`
  ADD CONSTRAINT `convercao_id_fk` FOREIGN KEY (`convencao_id`) REFERENCES `__convencao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id_fk` FOREIGN KEY (`usuario_id`) REFERENCES `jom0__usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
  
  
  --
-- Estrutura da tabela `__comprovante`
--

CREATE TABLE IF NOT EXISTS `__comprovante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `md5` varchar(32) NOT NULL,
  `local` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
