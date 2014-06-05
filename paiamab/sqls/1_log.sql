--
-- Database: `araruna_paiamab`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `1_log`
--

CREATE TABLE IF NOT EXISTS `1_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` timestamp NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_log` (`id_log`),
  KEY `fk_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `1_log`
--
ALTER TABLE `1_log`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `1_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
