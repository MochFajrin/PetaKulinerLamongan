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
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admins`
--

LOCK TABLES `tb_admins` WRITE;
/*!40000 ALTER TABLE `tb_admins` DISABLE KEYS */;
INSERT INTO `tb_admins` VALUES ('1','Admin','Admin','Admin','admin@gmail.com','$2y$10$baLnR8fNiR57xrlx6BiBEO2JLwbwvsIpZUJ7D/ooW4bBhqQ3CDNfS','Lamongan','0000-00-00','l');
/*!40000 ALTER TABLE `tb_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_culinaries`
--

DROP TABLE IF EXISTS `tb_culinaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_culinaries` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `id_admin` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_culinary_admin` (`id_admin`),
  CONSTRAINT `fk_culinary_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admins` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_culinaries`
--

LOCK TABLES `tb_culinaries` WRITE;
/*!40000 ALTER TABLE `tb_culinaries` DISABLE KEYS */;
INSERT INTO `tb_culinaries` VALUES ('08e567c6-8b09-11ed-a2d0-8030499c85f7','1','Nasi goreng'),('37c2c229-8bde-11ed-bc32-eb1296bdee74','1','Soto Lamongan'),('37c2c87d-8bde-11ed-bc32-eb1296bdee74','1','Nasi Boranan'),('37c2c978-8bde-11ed-bc32-eb1296bdee74','1','Tahu Campur'),('37c2ca24-8bde-11ed-bc32-eb1296bdee74','1','Asem Bandeng'),('37c2cac1-8bde-11ed-bc32-eb1296bdee74','1','Perkedel Lamongan'),('37c2cb43-8bde-11ed-bc32-eb1296bdee74','1','Jumbrek'),('37c2cbe3-8bde-11ed-bc32-eb1296bdee74','1','Wingko'),('37c2cc7b-8bde-11ed-bc32-eb1296bdee74','1','Pecel Lele'),('37c2cd20-8bde-11ed-bc32-eb1296bdee74','1','Marning Jagung'),('37c2cdd2-8bde-11ed-bc32-eb1296bdee74','1','Rawon'),('37c2ce72-8bde-11ed-bc32-eb1296bdee74','1','Bandeng Calo');
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
  PRIMARY KEY (`id`),
  KEY `fk_report_user` (`id_user`),
  KEY `fk_report_culinary` (`id_culinary`),
  CONSTRAINT `fk_report_culinary` FOREIGN KEY (`id_culinary`) REFERENCES `tb_culinaries` (`id`),
  CONSTRAINT `fk_report_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_reports`
--

LOCK TABLES `tb_reports` WRITE;
/*!40000 ALTER TABLE `tb_reports` DISABLE KEYS */;
INSERT INTO `tb_reports` VALUES ('619997bf-8c51-11ed-8ebb-d72017162a8e','91eb227e-84d8-11ed-b2f5-8030499c85f7','37c2c229-8bde-11ed-bc32-eb1296bdee74','ppyNpdnuCt','WCyCU1pU5X','JpDsfnFw63','U5Fd6WPm7P',1672851668626,'-6.980599','112.325913','approved','Karangbinangun','download_(7).jpeg','11:11','11:01'),('72bd43a6-8c51-11ed-8ebb-d72017162a8e','91eb227e-84d8-11ed-b2f5-8030499c85f7','37c2c229-8bde-11ed-bc32-eb1296bdee74','GC0lYR8p3s','2V8HHJu6Gl','3J4BiSE0En','VKdXBsZKAM',1672851697381,'-6.980599','112.325913','approved','Karangbinangun','','11:11','11:01'),('8c2f290a-8c52-11ed-8ebb-d72017162a8e','91eb227e-84d8-11ed-b2f5-8030499c85f7','37c2c229-8bde-11ed-bc32-eb1296bdee74','3yAAc30Y5C','ZahWRLSnlJ','Emr2UhrRji','X97BhlBQ41',1672852169567,'-7.117245472370001','112.4340160472973','approved','Karangbinangun','','11:11','11:01'),('9711d2fc-8c51-11ed-8ebb-d72017162a8e','91eb227e-84d8-11ed-b2f5-8030499c85f7','37c2c229-8bde-11ed-bc32-eb1296bdee74','DrwBqjBFL1','pEPYPWqR0A','2wtR2LgxkO','rcLCEFZcuv',1672851758333,'-7.216712425345295','112.26881972304338','approved','Karangbinangun','','11:11','11:01'),('a09a1fdf-8b1e-11ed-a2d0-8030499c85f7','91eb227e-84d8-11ed-b2f5-8030499c85f7','08e567c6-8b09-11ed-a2d0-8030499c85f7','Boranan mantap','Mantap','salsa','sasasa',1672720323396,'-7.121537','112.415543','approved','Sukorame','wallpaperflare_com_wallpaper1.jpg','11:01','08:01');
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
INSERT INTO `tb_users` VALUES ('45788418-84de-11ed-b2f5-8030499c85f7','tes2','Jhon','Doe','tes2@gmail.com','$2y$10$jXFB1KxIrabUhrMRUFhBUuiWosKHtxm6FQ96Jf2tdBow.8FUHFK6W','Lamongan','0000-00-00 00:00:00','l',1672032570148,'IMG_20221106_113605.jpg'),('908941f2-865f-11ed-979c-8030499c85f7','tes3','Lorem','Ipsum','tes3@gmail.com','$2y$10$c1VAFD411Ve1Fo4Kla8.rO7QhgV2GqG0LzHlwyOFKppY3yeHTGBt2','Lamongan','0000-00-00 00:00:00','l',1672198052328,''),('91eb227e-84d8-11ed-b2f5-8030499c85f7','tes','The','Rock','tes@gmail.com','$2y$10$baLnR8fNiR57xrlx6BiBEO2JLwbwvsIpZUJ7D/ooW4bBhqQ3CDNfS','lamongan','2001-11-30 17:00:00','l',1672030121425,'dwayne-the-rock-.jpg');
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

-- Dump completed on 2023-01-05 12:52:48
