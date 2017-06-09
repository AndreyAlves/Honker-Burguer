CREATE DATABASE  IF NOT EXISTS `dbpc1620171` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbpc1620171`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbpc1620171
-- ------------------------------------------------------
-- Server version	5.6.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblambientes`
--

DROP TABLE IF EXISTS `tblambientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblambientes` (
  `idAmbientes` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) DEFAULT NULL,
  `endereco` text,
  `ambiente` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idAmbientes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblambientes`
--

LOCK TABLES `tblambientes` WRITE;
/*!40000 ALTER TABLE `tblambientes` DISABLE KEYS */;
INSERT INTO `tblambientes` VALUES (4,'arquivos/carro2.jpg','HONKER BURGUER - BARUERI\r\n\r\nENDEREÃ‡O: Av.Bluffington - nÂ°666 - SP\r\n\r\nCEP:0767-410','arquivos/honker2.jpg',1),(5,'arquivos/carro5.jpg','TEEEESTE','arquivos/carro4.jpg',1),(6,'arquivos/fundo2.jpg','TESTESTESTETSTET','arquivos/fundo2.jpg',1);
/*!40000 ALTER TABLE `tblambientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbanda`
--

DROP TABLE IF EXISTS `tblbanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbanda` (
  `idBanda` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(45) DEFAULT NULL,
  `texto1` text,
  `titulo1` varchar(45) DEFAULT NULL,
  `titulo2` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idBanda`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbanda`
--

LOCK TABLES `tblbanda` WRITE;
/*!40000 ALTER TABLE `tblbanda` DISABLE KEYS */;
INSERT INTO `tblbanda` VALUES (25,'arquivos/imgN.jpg','Nirvana Ã© o nome de uma banda de rock, criada em Aberdeen (estado de Washington), Estados Unidos, tendo como principal vocalista \r\n									e guitarrista o lendÃ¡rio Kurt Cobain. Foi uma banda de bastante sucesso nas dÃ©cadas 80 e 90 do sÃ©culo XX. A banda foi extinta com \r\n									o suicÃ­dio do seu lÃ­der Kurt Cobain, em 1994. ApÃ³s sua morte vÃ¡rios discos foram lanÃ§ados, perpetuando o sucesso da banda entre os fÃ£s.\r\n									Em 2004, Grohl e Novoselic apareceram em cena para apoiar a candidatura de John Kerry Ã  presidÃªncia dos Estados Unidos.Em 12 de dezembro de 2012, Dave\r\n									e Krist, com a participaÃ§Ã£o de Pat Smear, se apresentam em um show beneficente pelas vÃ­timas do furacÃ£o Sandy, no Madison Square Garden, em Nova Iorque. Esta apresentaÃ§Ã£o contou com os\r\n									vocais do ex-beatle Paul McCartney.','SOBRE','INTEGRANTES','Nirvana',1);
/*!40000 ALTER TABLE `tblbanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcadastro`
--

DROP TABLE IF EXISTS `tblcadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcadastro` (
  `idFaleconosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `obs` text,
  PRIMARY KEY (`idFaleconosco`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcadastro`
--

LOCK TABLES `tblcadastro` WRITE;
/*!40000 ALTER TABLE `tblcadastro` DISABLE KEYS */;
INSERT INTO `tblcadastro` VALUES (1,'Andrey','011 4002-8922','011 94002-8922','andrey@gmail.com','M','Programadorzão','D+');
/*!40000 ALTER TABLE `tblcadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategorias`
--

DROP TABLE IF EXISTS `tblcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcategorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategorias`
--

LOCK TABLES `tblcategorias` WRITE;
/*!40000 ALTER TABLE `tblcategorias` DISABLE KEYS */;
INSERT INTO `tblcategorias` VALUES (2,'Natural´s Burguer'),(3,'Monster Burguer'),(4,'Black Dog'),(5,'Shakes'),(11,'Daiane7');
/*!40000 ALTER TABLE `tblcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblintegrantes`
--

DROP TABLE IF EXISTS `tblintegrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblintegrantes` (
  `integrante` varchar(45) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL,
  `idintegrante` int(11) NOT NULL AUTO_INCREMENT,
  `idBanda` int(11) DEFAULT NULL,
  `statusIntegrante` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idintegrante`),
  KEY `idBanda` (`idBanda`),
  CONSTRAINT `idBanda` FOREIGN KEY (`idBanda`) REFERENCES `tblbanda` (`idBanda`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblintegrantes`
--

LOCK TABLES `tblintegrantes` WRITE;
/*!40000 ALTER TABLE `tblintegrantes` DISABLE KEYS */;
INSERT INTO `tblintegrantes` VALUES ('Dave Grohl','Bateria. 1990 - 1994',14,25,1),('Krist Novoselic','Baixista. 1987 - 1994',15,25,1),('Chad Channing','Bateria. 1988 - 1990',19,25,1);
/*!40000 ALTER TABLE `tblintegrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllanchedomes`
--

DROP TABLE IF EXISTS `tbllanchedomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllanchedomes` (
  `idLanchedomes` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLanchedomes`),
  KEY `idProduto_idx` (`idProduto`),
  CONSTRAINT `fk_produtos` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllanchedomes`
--

LOCK TABLES `tbllanchedomes` WRITE;
/*!40000 ALTER TABLE `tbllanchedomes` DISABLE KEYS */;
INSERT INTO `tbllanchedomes` VALUES (1,2,1);
/*!40000 ALTER TABLE `tbllanchedomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllogin`
--

DROP TABLE IF EXISTS `tbllogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllogin` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idNivel_idx` (`idNivel`),
  CONSTRAINT `idNivel` FOREIGN KEY (`idNivel`) REFERENCES `tblnivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllogin`
--

LOCK TABLES `tbllogin` WRITE;
/*!40000 ALTER TABLE `tbllogin` DISABLE KEYS */;
INSERT INTO `tbllogin` VALUES (50,'Andrey','andrey','123',1),(56,'Bia comilona','marmita','123',3),(57,'TESTE','teste','123',2);
/*!40000 ALTER TABLE `tbllogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnivel`
--

DROP TABLE IF EXISTS `tblnivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblnivel` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnivel`
--

LOCK TABLES `tblnivel` WRITE;
/*!40000 ALTER TABLE `tblnivel` DISABLE KEYS */;
INSERT INTO `tblnivel` VALUES (1,'Administrador'),(2,'Cataloguista'),(3,'Operador Basico');
/*!40000 ALTER TABLE `tblnivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnutricional`
--

DROP TABLE IF EXISTS `tblnutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblnutricional` (
  `idNutricional` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `calorias` float DEFAULT NULL,
  `proteinas` float DEFAULT NULL,
  `carboidratos` float DEFAULT NULL,
  `gordura` float DEFAULT NULL,
  `gorduras` float DEFAULT NULL,
  `gordurat` float DEFAULT NULL,
  `sodio` float DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `statusNutricional` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idNutricional`),
  KEY `idProduto_idx` (`idProduto`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnutricional`
--

LOCK TABLES `tblnutricional` WRITE;
/*!40000 ALTER TABLE `tblnutricional` DISABLE KEYS */;
INSERT INTO `tblnutricional` VALUES (1,NULL,10,10,10,10,10,10,10,1,1);
/*!40000 ALTER TABLE `tblnutricional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprodutos`
--

DROP TABLE IF EXISTS `tblprodutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblprodutos` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` text,
  `preco` float DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `idSubCat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `idSubCat_idx` (`idSubCat`),
  CONSTRAINT `idSubCat` FOREIGN KEY (`idSubCat`) REFERENCES `tblsubcat` (`idSubCat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprodutos`
--

LOCK TABLES `tblprodutos` WRITE;
/*!40000 ALTER TABLE `tblprodutos` DISABLE KEYS */;
INSERT INTO `tblprodutos` VALUES (1,'HONKER FLAVOR','PÃ£o com pedaÃ§os de gergilim saborosos, com dois andares de hambÃºrgueres, entre eles duas fatias de queijo cheddar derretido, alface fresca, trÃªs rodÃ©las de tomate e nosso molho especial.',13.99,'arquivos/honkerflavor.jpg',24),(2,'HONKER COMBINED','PÃ£o feito com massa da melhor qualidade com pedaÃ§os de gergilim com um delicioso\r\n										hambÃºrguer grelhado, muito cheddar derretido, alface fresca e um\r\n										saboroso molho especial. Acompanhado com nossas batatas fritas especiais e um refrigerante\r\n										Ã  sua escolha.',19.99,'arquivos/honkercombined.jpg',21);
/*!40000 ALTER TABLE `tblprodutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpromocoes`
--

DROP TABLE IF EXISTS `tblpromocoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpromocoes` (
  `idPromocoes` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `desconto` varchar(50) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPromocoes`),
  KEY `idProduto_idx` (`idProduto`),
  CONSTRAINT `idProduto` FOREIGN KEY (`idProduto`) REFERENCES `tblprodutos` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpromocoes`
--

LOCK TABLES `tblpromocoes` WRITE;
/*!40000 ALTER TABLE `tblpromocoes` DISABLE KEYS */;
INSERT INTO `tblpromocoes` VALUES (1,'PROMOÃ‡ÃƒO DO DIA DOS NAMORADOS','20%',1,1);
/*!40000 ALTER TABLE `tblpromocoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre`
--

DROP TABLE IF EXISTS `tblsobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsobre` (
  `idSobre` int(11) NOT NULL AUTO_INCREMENT,
  `titulo1` varchar(45) DEFAULT NULL,
  `texto1` text,
  `titulo2` varchar(45) DEFAULT NULL,
  `texto2` text,
  `imagem1` varchar(100) DEFAULT NULL,
  `imagem2` varchar(100) DEFAULT NULL,
  `imagem3` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idSobre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre`
--

LOCK TABLES `tblsobre` WRITE;
/*!40000 ALTER TABLE `tblsobre` DISABLE KEYS */;
INSERT INTO `tblsobre` VALUES (9,'HISTï¿½RIA DA EMPRESA','A empresa comeÃ§ou em 1953 com o nome Honker Burguer, uma cadeia de restaurantes com sede em Jacksonville. Depois que o Honker Burguer entra em dificuldades financeiras em 1954, seus dois franqueados localizados em Miami, David Edgerton e James McLamore, compram a empresa.\r\n							Ao longo do prÃ³ximo meio sÃ©culo, a empresa iria mudar de administraÃ§Ã£o quatro vezes. Em 2 de setembro de 2010, foi anunciada a venda da totalidade das aÃ§Ãµes da empresa para o fundo de investimentos brasileiro chamado 3G Capital, que tem sede no Rio de Janeiro, por 3.26 bilhÃµes de dÃ³lares. Os novos proprietÃ¡rios prontamente iniciaram uma reestruturaÃ§Ã£o da empresa para reverter sua situaÃ§Ã£o. A 3G, junto com o parceiro Berkshire Hathaway, terminou por fundir-se com a companhia canadense de Tim Hortons sob os auspÃ­cios de uma nova sociedade com sede no CanadÃ¡, o Restaurant Brands International.\r\n							No final do ano de 2013, o setor administrativo do Honker Burguer informou que tinha mais de 13 000 restaurantes em 79 paÃ­ses; destes, 66% estÃ£o nos Estados Unidos e 99% sÃ£o franqueados e operados de acordo com seus novos proprietÃ¡rios. O HB privado tem usado historicamente diversas variaÃ§Ãµes de franqueamento para expandir suas operaÃ§Ãµes. A maneira pela qual a empresa licencia seus franqueados varia dependendo da regiÃ£o; algumas franquias sÃ£o regionais, conhecidos como master-franquias, responsÃ¡veis pela venda de franquia sublicenciadas em nome da empresa. O relacionamento do Honker Burguer com suas franquias nem sempre foi harmonioso. Brigas ocasionais tÃªm causado inÃºmeros problemas e, em vÃ¡rios casos, a relaÃ§Ã£o dos seus licenciados da empresa e degeneraram em processos judiciais.','CONQUISTAS','CONCURSO LOCAL - Melhor molho para sanduÃ­ches. 1954; CONCURSO LOCAL - Preparo mais rÃ¡pido de um sanduÃ­che. 1960; CONCURSO LOCAL - Melhor hamburguer vegetariano. 1961; CONCURSO ESTUDUAL - SanduÃ­che mais saboroso. 1954; CONCURSO NACIONAL - Melhor combinaÃ§Ã£o de lanches. 1954;','arquivos/honker1.jpg','arquivos/honker2.jpg','arquivos/honker3.jpg',1);
/*!40000 ALTER TABLE `tblsobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcat`
--

DROP TABLE IF EXISTS `tblsubcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubcat` (
  `idSubCat` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) DEFAULT NULL,
  `subcat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSubCat`),
  KEY `idCategoria_idx` (`idCategoria`),
  CONSTRAINT `idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcat`
--

LOCK TABLES `tblsubcat` WRITE;
/*!40000 ALTER TABLE `tblsubcat` DISABLE KEYS */;
INSERT INTO `tblsubcat` VALUES (15,NULL,'Lanche Integral'),(16,2,'Lanche Integral'),(18,2,'Lanches Verdes'),(19,2,'Lanches Light'),(20,2,'Lanches Fitness'),(21,3,'Lanches no Prato'),(22,3,'Lanches 1K'),(23,3,'Gordinhos Burguer'),(24,3,'All the Burguer'),(25,4,'Dogs no Prato'),(26,4,'Dogão especial'),(27,4,'Dogs Simples'),(28,4,'Double Dogs'),(29,11,'Baixinha'),(30,5,'Shakes especial'),(31,5,'Shakes simples'),(32,5,'Double Shakes');
/*!40000 ALTER TABLE `tblsubcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_consulta_banda`
--

DROP TABLE IF EXISTS `vw_consulta_banda`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_banda`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_banda` AS SELECT 
 1 AS `idBanda`,
 1 AS `nome`,
 1 AS `imagem`,
 1 AS `titulo1`,
 1 AS `titulo2`,
 1 AS `status`,
 1 AS `texto1`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_integrantes`
--

DROP TABLE IF EXISTS `vw_consulta_integrantes`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_integrantes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_integrantes` AS SELECT 
 1 AS `idintegrante`,
 1 AS `integrante`,
 1 AS `funcao`,
 1 AS `imagem`,
 1 AS `statusIntegrante`,
 1 AS `texto1`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_lanche_mes`
--

DROP TABLE IF EXISTS `vw_consulta_lanche_mes`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_lanche_mes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_lanche_mes` AS SELECT 
 1 AS `idLanchedomes`,
 1 AS `imagem`,
 1 AS `nome`,
 1 AS `preco`,
 1 AS `status`,
 1 AS `descricao`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_nutricional`
--

DROP TABLE IF EXISTS `vw_consulta_nutricional`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_nutricional`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_nutricional` AS SELECT 
 1 AS `idNutricional`,
 1 AS `calorias`,
 1 AS `proteinas`,
 1 AS `carboidratos`,
 1 AS `gordura`,
 1 AS `gorduras`,
 1 AS `gordurat`,
 1 AS `sodio`,
 1 AS `statusNutricional`,
 1 AS `nome`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_promocao`
--

DROP TABLE IF EXISTS `vw_consulta_promocao`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_promocao`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_promocao` AS SELECT 
 1 AS `idPromocoes`,
 1 AS `titulo`,
 1 AS `desconto`,
 1 AS `status`,
 1 AS `nome`,
 1 AS `descricao`,
 1 AS `preco`,
 1 AS `imagem`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_sobre`
--

DROP TABLE IF EXISTS `vw_consulta_sobre`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_sobre`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_sobre` AS SELECT 
 1 AS `idSobre`,
 1 AS `titulo1`,
 1 AS `titulo2`,
 1 AS `imagem1`,
 1 AS `imagem2`,
 1 AS `imagem3`,
 1 AS `status`,
 1 AS `texto1`,
 1 AS `texto2`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_consulta_usuarios`
--

DROP TABLE IF EXISTS `vw_consulta_usuarios`;
/*!50001 DROP VIEW IF EXISTS `vw_consulta_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_consulta_usuarios` AS SELECT 
 1 AS `idUsuario`,
 1 AS `nome`,
 1 AS `login`,
 1 AS `senha`,
 1 AS `idNivel`,
 1 AS `nivel`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_consulta_banda`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_banda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_banda` AS select `tblbanda`.`idBanda` AS `idBanda`,`tblbanda`.`nome` AS `nome`,`tblbanda`.`imagem` AS `imagem`,`tblbanda`.`titulo1` AS `titulo1`,`tblbanda`.`titulo2` AS `titulo2`,`tblbanda`.`status` AS `status`,substr(`tblbanda`.`texto1`,1,100) AS `texto1` from `tblbanda` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_integrantes`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_integrantes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_integrantes` AS select `i`.`idintegrante` AS `idintegrante`,`i`.`integrante` AS `integrante`,`i`.`funcao` AS `funcao`,`b`.`imagem` AS `imagem`,`i`.`statusIntegrante` AS `statusIntegrante`,substr(`b`.`texto1`,1,100) AS `texto1`,`b`.`nome` AS `nome` from (`tblintegrantes` `i` join `tblbanda` `b` on((`i`.`idBanda` = `b`.`idBanda`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_lanche_mes`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_lanche_mes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_lanche_mes` AS select `l`.`idLanchedomes` AS `idLanchedomes`,`pr`.`imagem` AS `imagem`,`pr`.`nome` AS `nome`,`pr`.`preco` AS `preco`,`l`.`status` AS `status`,substr(`pr`.`descricao`,1,100) AS `descricao` from (`tbllanchedomes` `l` join `tblprodutos` `pr` on((`l`.`idProduto` = `pr`.`idProduto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_nutricional`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_nutricional`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_nutricional` AS select `n`.`idNutricional` AS `idNutricional`,`n`.`calorias` AS `calorias`,`n`.`proteinas` AS `proteinas`,`n`.`carboidratos` AS `carboidratos`,`n`.`gordura` AS `gordura`,`n`.`gorduras` AS `gorduras`,`n`.`gordurat` AS `gordurat`,`n`.`sodio` AS `sodio`,`n`.`statusNutricional` AS `statusNutricional`,`pr`.`nome` AS `nome` from (`tblnutricional` `n` join `tblprodutos` `pr` on((`n`.`idProduto` = `pr`.`idProduto`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_promocao`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_promocao`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_promocao` AS select `p`.`idPromocoes` AS `idPromocoes`,`p`.`titulo` AS `titulo`,`p`.`desconto` AS `desconto`,`p`.`status` AS `status`,`pr`.`nome` AS `nome`,`pr`.`descricao` AS `descricao`,`pr`.`preco` AS `preco`,`pr`.`imagem` AS `imagem` from (`tblpromocoes` `p` join `tblprodutos` `pr` on((`p`.`idProduto` = `pr`.`idProduto`))) order by `p`.`titulo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_sobre`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_sobre`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_sobre` AS select `tblsobre`.`idSobre` AS `idSobre`,`tblsobre`.`titulo1` AS `titulo1`,`tblsobre`.`titulo2` AS `titulo2`,`tblsobre`.`imagem1` AS `imagem1`,`tblsobre`.`imagem2` AS `imagem2`,`tblsobre`.`imagem3` AS `imagem3`,`tblsobre`.`status` AS `status`,substr(`tblsobre`.`texto1`,1,100) AS `texto1`,substr(`tblsobre`.`texto2`,1,100) AS `texto2` from `tblsobre` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_consulta_usuarios`
--

/*!50001 DROP VIEW IF EXISTS `vw_consulta_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_consulta_usuarios` AS select `l`.`idUsuario` AS `idUsuario`,`l`.`nome` AS `nome`,`l`.`login` AS `login`,`l`.`senha` AS `senha`,`l`.`idNivel` AS `idNivel`,`n`.`nivel` AS `nivel` from (`tbllogin` `l` join `tblnivel` `n` on((`l`.`idNivel` = `n`.`idNivel`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-09 16:12:25
