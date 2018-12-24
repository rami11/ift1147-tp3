-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: film_store
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (9,'Action'),(10,'Anime'),(5,'Documentaire'),(2,'Drames'),(8,'Enfants et Famille'),(6,'Horreur'),(7,'Policier'),(4,'Romantique'),(11,'Thriller');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) DEFAULT NULL,
  `director` varchar(25) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `preview` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (28,'the mining','Stanley Kubrick','Horreur',100,20,'84442d3849a504ec7489e0a1d2e2e4b2c8a7a4a3.jpg','https://www.youtube.com/embed/n9DwoQ7HWvI'),(62,'Batman','Christopher Nolan','Action',100,10,'avatar.png',NULL),(63,'aaa','bb','Documentaire',10,10,'avatar.png',NULL),(64,'tt','tt','Romantique',10,10,'avatar.png',NULL),(65,'yyy','yy','Anime',30,30,'avatar.png',NULL),(66,'jgioejr','egjldgj','Horreur',50,50,'avatar.png',NULL),(67,'r','r','Anime',9,10,'avatar.png',NULL),(68,'t','t','Drames',90,90,'avatar.png',NULL),(69,'t','t','Drames',90,90,'avatar.png',NULL),(70,'ee','ee','Action',10,10,'avatar.png',NULL),(71,'a','a','Action',1,1,'avatar.png',NULL),(72,'b','b','Anime',2,2,'avatar.png',NULL),(73,'c','c','Documentaire',3,3,'avatar.png',NULL),(74,'d','d','Drames',4,4,'avatar.png',NULL),(75,'e','e','Enfants et Famille',5,5,'avatar.png',NULL);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'admin','admin@gmail.com','d333fd8aa112f5f3187db93edcf87e456bf8586d37965647cdaf1f8513e6765a','ea9985a056e9f3c8f73056aa284d166cef1afa416f446550c61220aa13724d73',1),(15,'rami','rami@rami.com','42e6a9cac3ac88839f2662cc9ba402d46b95deaf8c792bdbd3305eac8ae9ae38','573cc68e465437b80d6225db7f543c5b72107e9ff462604542248e8094193bd4',0),(16,'fadi','fadi@fadi.com','f6688e3b081173cd05d5d92e488d23685842e60c4c634c61d1641c86f0511301','d7a28e38633320973ef53d63fe35e5cb336fd464ee0ac4768e9b65e403935da5',0),(17,'camille','camille@camille.com','beffc44fd7dac79ea293a8a19b45cfec92a9bbcc99046a552dbccb0116eb010c','850739bb4c0de925284f6e351c247d9513902aa23caf6fd55be034e863dded3e',0),(18,'bassel','bassel@bassel.com','407a2c3856e30d68f29151ba4573ab108e7e3fe153e41f25b8cc2bbd3840b34b','f93cba2733d38edba176e06e2d7182921e61952b2bf1424f6937f7be05423804',0),(19,'aaa','aaa@aaa.com','5910906e7bde7eef6bc6d1a2e4e303b041c0e971bcd1c80a0aa58524bcae17c8','8990c719ba5241962b4924e6be1a84f75b773d13e58fa8e7e47cd800e0cfef5b',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-24 16:46:54
