-- MariaDB dump 10.17  Distrib 10.5.5-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projeto_web_2021
-- ------------------------------------------------------
-- Server version	10.5.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria_gif`
--

DROP TABLE IF EXISTS `categoria_gif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_gif` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_gif`
--

LOCK TABLES `categoria_gif` WRITE;
/*!40000 ALTER TABLE `categoria_gif` DISABLE KEYS */;
INSERT INTO `categoria_gif` VALUES (1,'Bom dia!'),(2,'Amizade'),(3,'Amor'),(4,'Engraçados');
/*!40000 ALTER TABLE `categoria_gif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado_id` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estado_id` (`estado_id`),
  CONSTRAINT `fk_estado_id` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (1,1,'Belo Horizonte'),(2,2,'São Paulo'),(3,3,'Rio de Janeiro');
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  `mensagem` varchar(200) NOT NULL,
  `data_hora` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_cidade_id` (`cidade_id`),
  CONSTRAINT `fk_cidade_id` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (1,'Ana','123','ana@ana',2,'Primeira msg','2021-06-20 12:14:16'),(2,'Ana','123','ana@ana',2,'Primeira msg','2021-06-20 12:15:48'),(3,'Ana','123','ana@ana',2,'Primeira msg','2021-06-20 13:32:08'),(4,'Ana','123','ana@ana',2,'Primeira msg','2021-06-20 13:32:29'),(5,'Joaozin','666','joazin@joaozin',1,'Sou eu, a Pfizer!','2021-06-20 13:37:15'),(6,'Thiaguin','456','thiaguin@thiaguin',3,'Ta passada?','2021-06-20 13:42:38'),(7,'zezin','456','zezin@zezin',3,'Nova mensagem','2021-06-20 13:58:11'),(8,'MARCELO REIS DE PAULA','35988172003','depaula.marcelo11@gmail.com',1,'ddddd','2021-06-20 14:07:46'),(9,'Pedro','123','pedro@pedro',2,'Mensagem infinita','2021-06-20 14:12:28'),(10,'MARCELO REIS DE PAULA','35988172003','marcel@marcel',1,'fffff','2021-06-20 15:20:17'),(11,'MARCELO REIS DE PAULA','35988172003','depaula.marcelo11@gmail.com',1,'ffff','2021-06-23 22:00:33');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Minas Gerais','MG'),(2,'São Paulo','SP'),(3,'Rio de Janeiro','RJ'),(4,'Bahia','BA'),(5,'Rondônia','RN');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gifs`
--

DROP TABLE IF EXISTS `gifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_id` (`categoria_id`),
  CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_gif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gifs`
--

LOCK TABLES `gifs` WRITE;
/*!40000 ALTER TABLE `gifs` DISABLE KEYS */;
INSERT INTO `gifs` VALUES (4,'Picachus amizade',2,'Picachus se comprimentando e comemorando','<img src=\'https://media.giphy.com/media/10LKovKon8DENq/giphy.gif\'></img>'),(5,'Personagens Friends',2,'Personagens da série Friends se abraçando','<img src=\'https://media.giphy.com/media/VbawWIGNtKYwOFXF7U/giphy.gif\'></img>'),(6,'Cachorros amigos',2,'Cachorros demonstrando sua amizade em várias situações','<img src=\'https://media.giphy.com/media/L0NBGdEtE8tUP6MVwH/giphy.gif\'></img>'),(7,'Tio Patinhas',3,'Tio Patinhas apaixonado com coração nos olhos ','<img src=\'https://media.giphy.com/media/zrxazUScjhxo4/giphy.gif\'></img>'),(11,'Menina confusa',4,'Menina pequena confusa por algum motivo','<img src=\'https://media.giphy.com/media/118p3q768COZhu/giphy.gif\'></img>'),(12,'Delete',4,'Caveira pedindo para apenas deletar tudo','<img src=\'https://media.giphy.com/media/xUOwFS49uv3A5U2Ooo/giphy.gif\'></img>'),(13,'Sol Bom dia',1,'Sol feliz escrito BOM DIA','<div class=\'imgtb\'><img src=\'https://media.giphy.com/media/7J7ncOYCSiHXwxfo3R/giphy.gif\'></img></div>'),(14,'Reporter Bom dia',1,'Mulher repórter dando bom dia','<div class=\'imgtb\'><img src=\'https://media.giphy.com/media/izyIpezgM6kIaBuq0H/giphy.gif\'></img></div>'),(15,'Felipe Neto',1,'Felipe Neto dando bom dia','<div class=\'imgtb\'><img src=\'https://media.giphy.com/media/xUOxeQhtve649e9AsM/giphy.gif\'></img></div>'),(16,'Gif coração',3,'Coração animado parecido com o do Chapolim','<div class=\'imgtb\'><img src=\'https://media.giphy.com/media/OJVQOfitCNNkI/giphy.gif\'></img></div>'),(17,'Rosa',3,'Gif de uma rosa simples','<div class=\'imgtb\'><img src=\'https://media.giphy.com/media/xT8qBhgUqOOWII72Pm/giphy.gif\'></img></div>'),(18,'Bolada nas crianças',4,'Bola bate duas vezes nas crianças por acidente (ambas estão bem)','<img src=\'https://media.giphy.com/media/nfLpqTrNPpqcE/giphy.gif\'></img>'),(19,'Cachorrinhos macarrão',3,'Cachorrinhos que se beijam comendo macarrão','<img src=\'https://media.giphy.com/media/vB6GQ7Ogc6j4I/giphy.gif\'></img>'),(20,'Minions guarda-chuva',2,'Minion abre guarda-chuva para seu amigo que fica feliz','<img src=\'https://media.giphy.com/media/xTmyuy12fkcqQ/giphy.gif\'></img>'),(21,'Cachorrinho bom dia',1,'Cachorrinho dá bom dia com placa \"I love you\"','<img src=\'https://media.giphy.com/media/jOzvyDcUTPOVM6WBFW/giphy.gif\'></img>');
/*!40000 ALTER TABLE `gifs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `acao` varchar(150) NOT NULL,
  `data_hora_atualização` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'Marcelão',' inseriu o usuario ID: 1','2021-06-23 13:15:34'),(2,'Marcelão',' atualizou o usuario ID: 1','2021-06-23 13:16:04'),(3,'Marcelão',' excluiu o usuario ID: 1','2021-06-23 13:16:10'),(4,'Marcelão',' inseriu o usuario ID: 2','2021-06-23 21:54:58'),(5,'Marcelão',' inseriu o usuario ID: 3','2021-06-23 21:55:12'),(6,'Marcelão',' inseriu o usuario ID: 4','2021-06-23 21:55:26'),(7,'Marcelão',' excluiu o usuario ID: 2','2021-06-23 21:55:47'),(8,'Marcelão',' atualizou o usuario ID: 4','2021-06-23 21:56:16'),(9,'Marcelão',' atualizou o usuario ID: ','2021-06-23 21:58:43'),(10,'Marcelão',' inseriu o usuario ID: 5','2021-06-23 21:59:28'),(11,'Marcelão',' atualizou o usuario ID: 3','2021-07-05 20:41:58');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_hora_criacao` datetime NOT NULL DEFAULT current_timestamp(),
  `data_hora_atualizacao` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'ana','ana1234','a3d2ce8a479d8fcdf2e1eadea6f883ed','2021-06-23 21:55:12','2021-07-05 20:41:58'),(4,'Carlos Silva','csilva123','a3d2ce8a479d8fcdf2e1eadea6f883ed','2021-06-23 21:55:26','2021-06-23 21:56:16'),(5,'Fernanda','fer123','95c6a478c93af0876a1e6916b2042fd2','2021-06-23 21:59:28','2021-06-23 21:59:28');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-05 22:24:43
