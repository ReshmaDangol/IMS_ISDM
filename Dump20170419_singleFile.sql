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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `username` varchar(100) NOT NULL,
  `hashedPassword` binary(60) NOT NULL,
  `LastLoginDate` date DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignedhistory`
--

DROP TABLE IF EXISTS `assignedhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignedhistory` (
  `hardwareID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `assignedDate` date DEFAULT NULL,
  PRIMARY KEY (`hardwareID`),
  KEY `StaffID_idx` (`StaffID`),
  CONSTRAINT `StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staffs` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hardwareID` FOREIGN KEY (`hardwareID`) REFERENCES `items` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignedhistory`
--

LOCK TABLES `assignedhistory` WRITE;
/*!40000 ALTER TABLE `assignedhistory` DISABLE KEYS */;
INSERT INTO `assignedhistory` VALUES (64,4,'2017-04-04'),(65,7,'2017-04-18'),(68,3,'0000-00-00'),(71,4,'2017-04-19'),(72,3,'2017-04-19');
/*!40000 ALTER TABLE `assignedhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardwares`
--

DROP TABLE IF EXISTS `hardwares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardwares` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MacAddress` varchar(255) DEFAULT NULL,
  `hardwareType` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `hardwareType_fk` (`hardwareType`),
  CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `items` (`itemID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `hardwareType_fk` FOREIGN KEY (`hardwareType`) REFERENCES `hardwaretypes` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardwares`
--

LOCK TABLES `hardwares` WRITE;
/*!40000 ALTER TABLE `hardwares` DISABLE KEYS */;
INSERT INTO `hardwares` VALUES (64,'12345',2),(65,'adsf',3),(68,'jhggjkhg',4),(70,'84527suh',1),(71,'adsjfhh',4),(72,'l',3),(75,'test',1);
/*!40000 ALTER TABLE `hardwares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardwaretypes`
--

DROP TABLE IF EXISTS `hardwaretypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardwaretypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardwaretypes`
--

LOCK TABLES `hardwaretypes` WRITE;
/*!40000 ALTER TABLE `hardwaretypes` DISABLE KEYS */;
INSERT INTO `hardwaretypes` VALUES (1,'Laptops'),(2,'VoIP Phones'),(3,'Printer'),(4,'PC');
/*!40000 ALTER TABLE `hardwaretypes` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `repaireditems`
--

DROP TABLE IF EXISTS `repaireditems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repaireditems` (
  `ID` int(11) NOT NULL,
  `dateOfRepair` datetime DEFAULT NULL,
  `DealerInfo` varchar(45) DEFAULT NULL,
  `receiptImage` varchar(255) DEFAULT NULL,
  KEY `ID` (`ID`),
  CONSTRAINT `repaireditems_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `items` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repaireditems`
--

LOCK TABLES `repaireditems` WRITE;
/*!40000 ALTER TABLE `repaireditems` DISABLE KEYS */;
/*!40000 ALTER TABLE `repaireditems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staffs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `staffPicture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (3,'Shyam',NULL,'Bhattarai','123456','Developer',NULL),(4,'Rohan',NULL,'Reddy','321654','GUI Designer',NULL),(5,'Reshma',NULL,'Dangol','987456','Project Manager',NULL),(6,'Junar',NULL,'Landicho','741852','Network Specialist',NULL),(7,'Nikita',NULL,'Valluri','963258','Data Analyist',NULL),(8,'Aditya',NULL,'Capalasetty','74589','QA Engineer',NULL);
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'In-Use'),(2,'Needs Repair'),(3,'Available'),(4,'Terminated'),(5,'Donated'),(6,'Sent to Repair');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vm`
--

DROP TABLE IF EXISTS `vm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vm` (
  `ID` int(11) NOT NULL,
  `serverImage` varchar(255) DEFAULT NULL,
  `hostname` varchar(45) DEFAULT NULL,
  `dataCenter` varchar(45) DEFAULT NULL,
  `OSInstalled` varchar(255) DEFAULT NULL,
  `softwaresInstalled` varchar(255) DEFAULT NULL,
  `RAM` varchar(45) DEFAULT NULL,
  `HDD` varchar(45) DEFAULT NULL,
  `CPU` varchar(45) DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `subnet` varchar(45) DEFAULT NULL,
  `gateway` varchar(45) DEFAULT NULL,
  `virtualMachine` varchar(45) DEFAULT NULL,
  `SoftwareVersion` varchar(255) DEFAULT NULL,
  `OSVersion` varchar(255) DEFAULT NULL,
  `vmID` varchar(100) DEFAULT NULL,
  KEY `ID` (`ID`),
  CONSTRAINT `vm_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `items` (`itemID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vm`
--

LOCK TABLES `vm` WRITE;
/*!40000 ALTER TABLE `vm` DISABLE KEYS */;
INSERT INTO `vm` VALUES (73,NULL,'ims.dotarai.com','DC1','Windows Server','PHP , Mysql ','32GB','5TB','3.0 Ghz','192.168.0.1','255.255.255.255','dotarai','192.25.1.36','PHP 6, Mysql 5.7','3.12','12345');
/*!40000 ALTER TABLE `vm` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-19 21:52:11
