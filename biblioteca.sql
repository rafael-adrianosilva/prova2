-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autorcadastro`
--

DROP TABLE IF EXISTS `autorcadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autorcadastro` (
  `idautorCadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAutor` varchar(175) NOT NULL,
  `nacionalidade` varchar(125) NOT NULL,
  PRIMARY KEY (`idautorCadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autorcadastro`
--

LOCK TABLES `autorcadastro` WRITE;
/*!40000 ALTER TABLE `autorcadastro` DISABLE KEYS */;
INSERT INTO `autorcadastro` VALUES (1,'Stephen King','Estados Unidos'),(2,'Mario Puzo','Estados Unidos'),(3,'Machado de Assis','Brasil'),(4,'Monteiro Lobato','Brasil'),(5,'Paulo Coelho','Brasil'),(6,'Richard Matheson	','Estados Unidos'),(7,'J.R.R. Tolkien','Inglaterra'),(8,'William Shakespeare','Inglaterra');
/*!40000 ALTER TABLE `autorcadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editoracadastro`
--

DROP TABLE IF EXISTS `editoracadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editoracadastro` (
  `ideditora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`ideditora`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoracadastro`
--

LOCK TABLES `editoracadastro` WRITE;
/*!40000 ALTER TABLE `editoracadastro` DISABLE KEYS */;
INSERT INTO `editoracadastro` VALUES (1,'Suma'),(2,'HarperCollins'),(3,'Record'),(4,'DarkSide'),(5,'Aleph'),(6,'Nova Fronteira'),(7,'Paralela'),(8,'Globo'),(9,'Penguin Classics');
/*!40000 ALTER TABLE `editoracadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimocadastro`
--

DROP TABLE IF EXISTS `emprestimocadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimocadastro` (
  `idemprestimoCadastro` int(11) NOT NULL AUTO_INCREMENT,
  `dataEmprestimo` datetime NOT NULL,
  `dataPrevistaDevolucao` date NOT NULL,
  `dataDevolucao` datetime NOT NULL,
  `usuarioCadastro_idusuarioCadastro` int(11) NOT NULL,
  `obraCadastro_idobraCadastro` int(11) NOT NULL,
  `emprestimoStatus` varchar(80) NOT NULL,
  PRIMARY KEY (`idemprestimoCadastro`,`usuarioCadastro_idusuarioCadastro`,`obraCadastro_idobraCadastro`),
  KEY `fk_emprestimoCadastro_usuarioCadastro_idx` (`usuarioCadastro_idusuarioCadastro`),
  KEY `fk_emprestimoCadastro_obraCadastro1_idx` (`obraCadastro_idobraCadastro`),
  CONSTRAINT `fk_emprestimoCadastro_obraCadastro1` FOREIGN KEY (`obraCadastro_idobraCadastro`) REFERENCES `obracadastro` (`idobraCadastro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimoCadastro_usuarioCadastro` FOREIGN KEY (`usuarioCadastro_idusuarioCadastro`) REFERENCES `usuariocadastro` (`idusuarioCadastro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimocadastro`
--

LOCK TABLES `emprestimocadastro` WRITE;
/*!40000 ALTER TABLE `emprestimocadastro` DISABLE KEYS */;
INSERT INTO `emprestimocadastro` VALUES (1,'2025-12-10 17:13:00','2025-12-11','0000-00-00 00:00:00',2,1,'');
/*!40000 ALTER TABLE `emprestimocadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obracadastro`
--

DROP TABLE IF EXISTS `obracadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obracadastro` (
  `idobraCadastro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `anoPublicacao` varchar(4) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `editoraCadastro_ideditora` int(11) NOT NULL,
  `autorCadastro_idautorCadastro` int(11) NOT NULL,
  PRIMARY KEY (`idobraCadastro`,`editoraCadastro_ideditora`,`autorCadastro_idautorCadastro`),
  KEY `fk_obraCadastro_editoraCadastro1_idx` (`editoraCadastro_ideditora`),
  KEY `fk_obraCadastro_autorCadastro1_idx` (`autorCadastro_idautorCadastro`),
  CONSTRAINT `fk_obraCadastro_autorCadastro1` FOREIGN KEY (`autorCadastro_idautorCadastro`) REFERENCES `autorcadastro` (`idautorCadastro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_obraCadastro_editoraCadastro1` FOREIGN KEY (`editoraCadastro_ideditora`) REFERENCES `editoracadastro` (`ideditora`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obracadastro`
--

LOCK TABLES `obracadastro` WRITE;
/*!40000 ALTER TABLE `obracadastro` DISABLE KEYS */;
INSERT INTO `obracadastro` VALUES (1,'Memórias Póstumas de Brás Cubas','1881','Romance',6,3),(2,'O Iluminado','1977','Terror',1,1);
/*!40000 ALTER TABLE `obracadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariocadastro`
--

DROP TABLE IF EXISTS `usuariocadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariocadastro` (
  `idusuarioCadastro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(200) NOT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idusuarioCadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariocadastro`
--

LOCK TABLES `usuariocadastro` WRITE;
/*!40000 ALTER TABLE `usuariocadastro` DISABLE KEYS */;
INSERT INTO `usuariocadastro` VALUES (1,'RAFAEL ADRIANO OLIVEIRA DA SILVA','2006-01-28','João Lourenço Fefin','+5517997247514','2025-12-10 15:52:00',''),(2,'Josue Coraspe','2008-03-01','Avn 9 de julho, 4008, votuporanga','1799999999','2025-12-10 17:13:00','');
/*!40000 ALTER TABLE `usuariocadastro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-10 17:23:59
