-- MySQL dump 10.13  Distrib 8.0.32, for macos13.0 (arm64)
--
-- Host: localhost    Database: blog_application
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(6500) NOT NULL,
  `user_id` int NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (20,'Google Search','Yes, you might have guessed it already, but a good start to search for relevant blogs is to run a Google search query. If you search for the term “beauty blog” you will get an endless list of blogs. With Google search tools you have the ability to further refine your search to entries within a certain country, thereby you are able to receive more relevant blogs in terms of location. If you look for queries with the last 24 hours or any other time frame you will receive a different list for each time frame.',21,'2023-02-25 21:00:04'),(21,'Twitter','Another good way to find bloggers is to search in their preferred social network. Twitter is a popular platform among bloggers as they use it to share their content and engage with their community. There are three ways to find relevant bloggers. Easiest way is to again search for them through the Twitter search. Search for “beauty blogger” in the category accounts and you will find all profiles that feature the search term in their bio. With advanced search you can further refine the list by adding a search place. The second option is to look for relevant bloggers among the accounts followed by a blogger that you already know. With +1k followers, this task can become quite time consuming task. If you scroll down to the end of the list you can however use STRG+F to search the site. Finally, there are Twitter profiles like UK Blogger RT, that are dedicated to sharing blog posts.',17,'2023-02-25 21:00:36'),(22,'Computer Network','Computer Network tutorial provides basic and advanced concepts of Data Communication & Networks (DCN). Our Computer Networking Tutorial is designed for beginners and professionals.  Our Computer Network tutorial includes all topics of Computer Network such as introduction, features, types of computer network, architecture, hardware, software, internet, intranet, website, LAN, WAN, etc.',17,'2023-02-25 21:03:47'),(23,'What is Transmission media?','Transmission media is a communication channel that carries the information from the sender to the receiver. Data is transmitted through the electromagnetic signals. The main functionality of the transmission media is to carry the information in the form of bits through LAN(Local Area Network). It is a physical path between transmitter and receiver in data communication. In a copper-based network, the bits in the form of electrical signals. In a fibre based network, the bits in the form of light pulses. In OSI(Open System Interconnection) phase, transmission media supports the Layer 1. Therefore, it is considered to be as a Layer 1 component. The electrical signals can be sent through the copper wire, fibre optics, atmosphere, water, and vacuum. The characteristics and quality of data transmission are determined by the characteristics of medium and signal. Transmission media is of two types are wired media and wireless media. In wired media, medium characteristics are more important whereas, in wireless media, signal characteristics are more important. Different transmission media have different properties such as bandwidth, delay, cost and ease of installation and maintenance. The transmission media is available in the lowest layer of the OSI reference model, i.e., Physical layer.',23,'2023-02-25 21:05:03'),(24,'Computer Network Security','Computer network security consists of measures taken by business or some organizations to monitor and prevent unauthorized access from the outside attackers.  Different approaches to computer network security management have different requirements depending on the size of the computer network. For example, a home office requires basic network security while large businesses require high maintenance to prevent the network from malicious attacks.  Network Administrator controls access to the data and software on the network. A network administrator assigns the user ID and password to the authorized person.',22,'2023-02-25 21:06:17');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(6500) NOT NULL,
  `creation_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'nnknk','knknk','knknk',NULL);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isAdmin` varchar(5) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (17,'vidya1','$2y$12$VDk6pabjbGOKFmQnoeZUZOo2.lk5b/zyxu5P868w1hKzIHuolgc06','true','vidya@gmail.com',NULL),(20,'alex','$2y$12$1yMZVil2Tt7K9CJjZ1.yCOBHhsVYAOgiVSGtrOhITZjEBuqi1m5sO','false','alex@gmail.com','2023-02-25 20:45:33'),(21,'rohan','$2y$12$IFhlBb5NbKUoNPGG2e2Hd.YWjPJ5zooSw97atoy2MjaTvuqcr8osO','false','rohan@gmail.com','2023-02-25 20:45:50'),(22,'santhosh','$2y$12$WXWyQJpoX4MnPY1b4UDNDeTNuugON6ZVglNBd5rqRPGOVxrlIA.mO','false','yennamsanthosh82@gmail.com','2023-02-25 20:46:12'),(23,'sandy','$2y$12$Ii2V0M9BExRjuLjqyiInYuGLmgh5.7B5MO8snlDGwpmWFfUESQ3pq','true','sandysanthosh045@gmail.com','2023-02-25 20:46:28');
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

-- Dump completed on 2023-02-25 21:57:03
