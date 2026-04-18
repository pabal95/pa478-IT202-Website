-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: laptop
-- ------------------------------------------------------
-- Server version	8.0.44

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
-- Table structure for table `laptop_types`
--

DROP TABLE IF EXISTS `laptop_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laptop_types` (
  `laptop_type_id` int NOT NULL,
  `laptop_type_name` varchar(255) NOT NULL,
  `laptop_type_code` varchar(255) NOT NULL,
  `laptop_ShelfNumber` int NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`laptop_type_id`),
  UNIQUE KEY `laptop_type_code` (`laptop_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laptop_types`
--

LOCK TABLES `laptop_types` WRITE;
/*!40000 ALTER TABLE `laptop_types` DISABLE KEYS */;
INSERT INTO `laptop_types` VALUES (1,'Apple Laptop','APPLE',1,'2026-04-18 03:24:49','2026-04-18 03:24:49'),(2,'2-in-1 Laptop','2IN1',2,'2026-04-18 03:24:49','2026-04-18 03:24:49'),(3,'Chromebook','CHROME',3,'2026-04-18 03:24:49','2026-04-18 03:24:49');
/*!40000 ALTER TABLE `laptop_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laptop_users`
--

DROP TABLE IF EXISTS `laptop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laptop_users` (
  `laptop_user_id` int NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_number` varchar(60) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`laptop_user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laptop_users`
--

LOCK TABLES `laptop_users` WRITE;
/*!40000 ALTER TABLE `laptop_users` DISABLE KEYS */;
INSERT INTO `laptop_users` VALUES (1,'john117@laptops.com','795847ef6a2c3be4c8eba801e7c76ec97e03945571c26a1b6cb6933ee36d571c','He/Him','Master','Chief','343-117-2892','2026-04-18 03:24:37','2026-04-18 03:24:37'),(2,'donkeykong@laptops.com','6adf6558e08fcefd02129cc541e46a37e01e4c10cfb9891c1f27f96f815bb0dd','He/Him','Donkey','Kong','501-245-2255','2026-04-18 03:24:40','2026-04-18 03:24:40'),(3,'samusaran@laptops.com','6fa1cdda961a9dab0b7c5ba26d13f778b7545dec4e0d670541ccfeead8f0f36b','She/Her','Samus','Aran','454-102-0000','2026-04-18 03:24:41','2026-04-18 03:24:41'),(4,'pabal@laptops.com','fc41dc102b3b9691a4df134dae5ce887377e0f251a177b203d463cb2461aac1f','He/Him','Pabal','Ahmed','973-123-4567','2026-04-18 03:24:43','2026-04-18 03:24:43');
/*!40000 ALTER TABLE `laptop_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laptops`
--

DROP TABLE IF EXISTS `laptops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laptops` (
  `laptop_id` int NOT NULL,
  `laptop_code` varchar(10) NOT NULL,
  `laptop_name` varchar(255) NOT NULL,
  `laptop_description` text NOT NULL,
  `ram` int NOT NULL,
  `storage_capacity` int NOT NULL,
  `inch_dimension` int NOT NULL,
  `laptop_type_id` int DEFAULT '0',
  `laptop_buy_price` decimal(10,2) NOT NULL,
  `laptop_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`laptop_id`),
  KEY `laptop_type_id` (`laptop_type_id`),
  CONSTRAINT `laptops_ibfk_1` FOREIGN KEY (`laptop_type_id`) REFERENCES `laptop_types` (`laptop_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laptops`
--

LOCK TABLES `laptops` WRITE;
/*!40000 ALTER TABLE `laptops` DISABLE KEYS */;
INSERT INTO `laptops` VALUES (1,'MACPRO','MacBook Pro 2025','The latest MacBook Pro with M3 chip and improved battery life.',16,512,14,1,1999.99,2499.99,'2026-04-18 03:25:03','2026-04-18 03:25:03'),(2,'LENYOGA','Lenovo Yoga 2025','A versatile 2-in-1 laptop with a flexible hinge and touchscreen.',16,256,13,2,1099.99,1399.99,'2026-04-18 03:25:03','2026-04-18 03:25:03'),(3,'DELLCHROME','Dell Chromebook 2025','A lightweight and affordable Chromebook for everyday tasks.',8,128,11,3,299.99,399.99,'2026-04-18 03:25:03','2026-04-18 03:25:03');
/*!40000 ALTER TABLE `laptops` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-17 23:27:33
