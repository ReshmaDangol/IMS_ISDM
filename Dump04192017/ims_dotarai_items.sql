-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: ims_dotarai
-- ------------------------------------------------------
-- Server version	5.7.14-log

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(80) DEFAULT NULL,
  `itemImage` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateOfInitialization` date DEFAULT NULL,
  `purchasedDealer` varchar(255) DEFAULT NULL,
  `purchasedReceiptImage` varchar(255) DEFAULT NULL,
  `projectedDateOfTermination` date DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `productID` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemID`),
  KEY `Status` (`Status`),
  CONSTRAINT `Status` FOREIGN KEY (`Status`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (64,'Panasonic VoIP Phone',NULL,'test description for the Panasonic VoIP phone','2017-04-13','',NULL,'2017-04-13',1,'67890',''),(65,'adsfasdf',NULL,'adsfsdfasdfasdf','2017-04-19','',NULL,'2017-04-20',4,'sdf','adsf'),(68,'Dell Studio PC',NULL,'kjhfklajsdfkh','2017-04-19','',NULL,'2017-04-20',1,'kjhgkjgjkg','asfsafasdf'),(70,'Macbook Pro',NULL,'aksdjfhlsadhf','2017-04-01','AIT : 58 Moo 9, Km. 42, Paholyothin Highway, Klong Luang, Pathumthani 12120 Thailand',NULL,'2017-04-30',3,'3306',NULL),(71,'Dell PC',NULL,'sfdgsg','2017-04-01','sfgsdfgsfdg',NULL,'2017-04-30',1,'ljhjh',NULL),(72,'ahdfkashfd',NULL,'adhfkjahfkljahfh','2017-04-01','laskjhflkjadhf',NULL,'2017-04-30',5,'khlkhlkhkjh','lkjdhflkajhfdhs'),(73,'192.25.1.36',NULL,'adhgfahgdfkhagf','2017-04-01','some dealer',NULL,'2017-04-30',3,'12345','adfadsfasdf'),(75,'test',NULL,'asdfsadf','2017-04-19','asdfasdf',NULL,'2017-04-20',3,'test','adsfasdf');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 21:26:48
