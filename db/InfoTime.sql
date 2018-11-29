CREATE DATABASE  IF NOT EXISTS `InfoTime`;
USE `InfoTime`;
-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ASIXNews
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1
--
-- Table structure for table `Article`
--

DROP TABLE IF EXISTS `Noticia`;
CREATE TABLE `Noticia` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `Enlace` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Usuari_login` varchar(45) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  PRIMARY KEY (`idNoticia`),
  KEY `fk_Noticia_Usuari_idx` (`Usuari_login`),
  KEY `fk_Noticia_Categoria1_idx` (`Categoria_idCategoria`),
  CONSTRAINT `fk_Noticia_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `Categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Noticia_Usuari` FOREIGN KEY (`Usuari_login`) REFERENCES `Usuari` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
--
-- Dumping data for table `Article`
--

LOCK TABLES `Noticia` WRITE;
INSERT INTO `Noticia` VALUES (9,'https://elpais.com/internacional/2018/11/27/actualidad/1543344184_659828.html','2018-11-19','admin',1,'Ucrania prepara ofensiva contra Russia'),(10,'l2','2018-11-19','admin',1,'t2'),(11,'l3','2018-11-19','admin',1,'t3'),(12,'l4','2018-11-19','admin',1,'t4'),(13,'l5','2018-11-19','admin',1,'t5');
UNLOCK TABLES;

DROP TABLE IF EXISTS `Comentarios`;
CREATE TABLE `Comentarios` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Usuari_login` varchar(45) NOT NULL,
  `Contenido` varchar(150) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `fk_Comentario_Usuari_idx` (`Usuari_login`),
  KEY `fk_Comentario_Noticia_idx` (`idNoticia`),
  CONSTRAINT `fk_Comentario_Usuari` FOREIGN KEY (`Usuari_login`) REFERENCES `Usuari` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Noticia` FOREIGN KEY (`idNoticia`) REFERENCES `Noticia` (`idNoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) 
ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

LOCK TABLES `Comentarios` WRITE;
INSERT INTO `Comentarios` VALUES (1,'2018-11-19','Frank','Me parece muy bien');
UNLOCK TABLES;
--
-- Table structure for table `Categoria`
--

DROP TABLE IF EXISTS `Categoria`;
CREATE TABLE `Categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcio` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categoria`
--

LOCK TABLES `Categoria` WRITE;;
INSERT INTO `Categoria` VALUES (1,'Cat1'),(2,'Cat2');
UNLOCK TABLES;

--
-- Table structure for table `Usuari`
--

DROP TABLE IF EXISTS `Usuari`;
CREATE TABLE `Usuari` (
  `login` varchar(45) NOT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuari`
--

LOCK TABLES `Usuari` WRITE;
INSERT INTO `Usuari` VALUES ('Frank','admin','1234','admin@admin'),('user','1234','user','user@user');
UNLOCK TABLES;

-- Dump completed on 2018-11-19 12:11:19