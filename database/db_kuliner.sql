-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_gis_kuliner
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `tb_admins`
--

DROP TABLE IF EXISTS `tb_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admins` (
  `id` int(11) NOT NULL DEFAULT uuid(),
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birth_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admins`
--

LOCK TABLES `tb_admins` WRITE;
/*!40000 ALTER TABLE `tb_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_culinaries`
--

DROP TABLE IF EXISTS `tb_culinaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_culinaries` (
  `id` varchar(100) NOT NULL DEFAULT uuid(),
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `history` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_culinaries`
--

LOCK TABLES `tb_culinaries` WRITE;
/*!40000 ALTER TABLE `tb_culinaries` DISABLE KEYS */;
INSERT INTO `tb_culinaries` VALUES ('1499521e-84d8-11ed-b2f5-8030499c85f7','Nasi boran',NULL,NULL),('65465cc0-84de-11ed-b2f5-8030499c85f7','Soto Lamongan',NULL,NULL),('b19120d9-8582-11ed-9f95-8030499c85f7','Tahu Campur',NULL,NULL),('b19124a6-8582-11ed-9f95-8030499c85f7','Asem Bandeng',NULL,NULL),('b191256f-8582-11ed-9f95-8030499c85f7','Perkedel Lamongan',NULL,NULL),('b19125d7-8582-11ed-9f95-8030499c85f7','Jumbrek',NULL,NULL),('b191262e-8582-11ed-9f95-8030499c85f7','Pecel Lele',NULL,NULL),('b1912680-8582-11ed-9f95-8030499c85f7','Marning Jagung',NULL,NULL),('b19126cb-8582-11ed-9f95-8030499c85f7','Wingko Babat',NULL,NULL),('b1912711-8582-11ed-9f95-8030499c85f7','Rawon',NULL,NULL),('b19127a5-8582-11ed-9f95-8030499c85f7','Bandeng Colo',NULL,NULL);
/*!40000 ALTER TABLE `tb_culinaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_reports`
--

DROP TABLE IF EXISTS `tb_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_reports` (
  `id` varchar(100) NOT NULL DEFAULT uuid(),
  `id_user` varchar(100) NOT NULL,
  `id_culinary` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `owner_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `report_time` bigint(20) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `status` varchar(15) DEFAULT 'pending',
  `nama_kecamatan` varchar(100) NOT NULL,
  `report_thumb` varchar(100) DEFAULT NULL,
  `open_time` varchar(100) DEFAULT NULL,
  `close_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_reports`
--

LOCK TABLES `tb_reports` WRITE;
/*!40000 ALTER TABLE `tb_reports` DISABLE KEYS */;
INSERT INTO `tb_reports` VALUES ('299b47c1-8668-11ed-979c-8030499c85f7','45788418-84de-11ed-b2f5-8030499c85f7','1499521e-84d8-11ed-b2f5-8030499c85f7','Nasi Boran Alun-alun','lorem','Bu Narti','Alun alun depan gedung pemda',1672201745111,'-7.1213891193160395','112.41556674242021','pending','Lamongan','index2.jpeg','11:01','11:01'),('49a0a797-8662-11ed-979c-8030499c85f7','908941f2-865f-11ed-979c-8030499c85f7','1499521e-84d8-11ed-b2f5-8030499c85f7','Nasi Boran Alun-alun','lorem','Bu Narti','Alun alun depan gedung pemda',1672199221853,'-6.980599','112.325913','pending','Lamongan','Screenshot_20221228_0954181.png','11:01','11:01');
/*!40000 ALTER TABLE `tb_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `id` varchar(100) NOT NULL DEFAULT uuid(),
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birth_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` char(1) NOT NULL,
  `join_date` bigint(20) NOT NULL,
  `profile_pict` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES ('45788418-84de-11ed-b2f5-8030499c85f7','tes2','Jhon','Doe','tes2@gmail.com','$2y$10$PKMqqOjHmD8kdqPY7CJvB.Nx9zJW0DfFopYYAW128QqRGB2AUO0YC','Lamongan','0000-00-00 00:00:00','l',1672032570148,'Screenshot_20221228_095418.png'),('908941f2-865f-11ed-979c-8030499c85f7','tes3','Lorem','Ipsum','tes3@gmail.com','$2y$10$c1VAFD411Ve1Fo4Kla8.rO7QhgV2GqG0LzHlwyOFKppY3yeHTGBt2','Lamongan','0000-00-00 00:00:00','l',1672198052328,''),('91eb227e-84d8-11ed-b2f5-8030499c85f7','tes','tes','tes','tes@gmail.com','$2y$10$HF7lcy.QXNrwhLE0TYS2De5QCYrEofQGWllkeUhIxbrrDEXS5oYfW','','2022-12-26 04:48:41','',1672030121425,'');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-28 11:33:25
