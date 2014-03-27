/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.6.12-log : Database - st_pse1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`st_pse1` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `st_pse1`;

/*Table structure for table `1_formulario` */

DROP TABLE IF EXISTS `1_formulario`;

CREATE TABLE `1_formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(20) NOT NULL,
  `profissao` varchar(20) NOT NULL,
  `outra_profissao` varchar(50) DEFAULT NULL,
  `orgao` varchar(70) NOT NULL,
  `escola` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `1_formulario` */

insert  into `1_formulario`(`id`,`nome`,`cpf`,`email`,`telefone`,`nascimento`,`endereco`,`complemento`,`cidade`,`profissao`,`outra_profissao`,`orgao`,`escola`) values (8,'ROBSON CLAUDIO VALENTE DA SILVA','847.012.002-63','robson.cao@hotmail.com','(91) 3249-4601','1990-01-01','TV 25 DE JUNHO','Nº 525','BELÉM','PROFESSOR','','SECRETARIA DE EDUCAÇÃO - SEDUC','ESCOLA1'),(9,'ROBSON CLAUDIO VALENTE DA SILVA','847.012.002-63','robson.cao@hotmail.com','(91) 3249-4601','1990-01-01','TV 25 DE JUNHO','Nº 525','BELÉM','PROFESSOR','','SECRETARIA DE EDUCAÇÃO - SEDUC','ESCOLA1'),(10,'ROMARIO ROBERT VALENTE DA SILVA','847.012.002-63','romario@hotmail.com','(91) 3249-4601','1987-02-03','TV 25 DE JUNHO','Nº 525','BELÉM','GESTOR','','SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC','ESCOLA2'),(11,'RAYARA CLAUDIA VALENTE DA SILVA','847.012.002-63','rayara@hotmail.com','(91) 3249-4601','1987-07-06','TV 25 DE JUNHO','Nº 525','BELÉM','OUTRO','OUTRO','SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED','ESCOLA3'),(12,'ANA MARIA','847.012.002-63','rayara@hotmail.com','(91) 3249-4601','1987-07-06','TV 25 DE JUNHO','Nº 525','BELÉM','OUTRO','OUTRO','SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED','ESCOLA3'),(14,'JULIANOS','847.012.002-63','rayara@hotmail.com','(91) 3249-4601','1987-07-06','TV 25 DE JUNHO','Nº 525','BELÉM','GESTOR','OUTRO','SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED','ESCOLA4'),(15,'ROBSON 2','847.012.002-63','rayara@hotmail.com','(91) 3249-4601','1987-07-06','TV 25 DE JUNHO','Nº 525','BELÉM','GESTOR','OUTRO','SECRETARIA DE EDUCAÇÃO- SEDUC','ESCOLA4'),(16,'ROBSON 2','847.012.002-63','rayara@hotmail.com','(91) 3249-4601','1987-07-06','TV 25 DE JUNHO','Nº 525','BELÉM','OUTRO','OUTRO','SECRETARIA DE EDUCAÇÃO- SEDUC','ESCOLA4');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
