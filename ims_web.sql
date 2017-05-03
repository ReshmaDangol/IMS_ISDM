-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2017 at 04:59 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ims_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(100) NOT NULL,
  `hashedPassword` binary(60) NOT NULL,
  `LastLoginDate` date DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignedHistory`
--

CREATE TABLE IF NOT EXISTS `assignedHistory` (
  `hardwareID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `assignedDate` date DEFAULT NULL,
  PRIMARY KEY (`hardwareID`),
  KEY `StaffID_idx` (`StaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignedHistory`
--

INSERT INTO `assignedHistory` (`hardwareID`, `StaffID`, `assignedDate`) VALUES
(88, 5, '0000-00-00'),
(90, 3, '2017-04-24'),
(91, NULL, NULL),
(92, 6, '0000-00-00'),
(93, 7, '0000-00-00'),
(99, 4, '2017-05-02'),
(101, 5, '2017-05-03'),
(102, 8, '2017-05-03'),
(104, 7, '2017-05-02'),
(111, 3, '2017-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `hardwares`
--

CREATE TABLE IF NOT EXISTS `hardwares` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MacAddress` varchar(255) DEFAULT NULL,
  `hardwareType` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `hardwareType_fk` (`hardwareType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `hardwares`
--

INSERT INTO `hardwares` (`ID`, `MacAddress`, `hardwareType`) VALUES
(88, ' fe80::1de5:8372:2b55:2fd3013', 1),
(89, ' ae90::13a5:8372:o855:3sf786', 1),
(90, ' al80::1de5:8372:2b55:2fd344', 1),
(91, '69-54-87-23-5p-8y', 3),
(92, '00-68-98-55-a9-7p', 3),
(93, ' 00-80-77-90-0a-8c', 3),
(96, '1234', 1),
(97, 'a1:c8:84:b0:6c:55 ', 2),
(99, '245.253.245.0', 1),
(101, '255.255.254.0', 2),
(102, 'al20::1de6:4352:2cd4:2543', 1),
(104, 'al19::1deg4:12345:dec54:2546', 1),
(111, '11::EEfD::123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hardwareTypes`
--

CREATE TABLE IF NOT EXISTS `hardwareTypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hardwareTypes`
--

INSERT INTO `hardwareTypes` (`ID`, `Type`) VALUES
(1, 'Laptops'),
(2, 'VoIP Phones'),
(3, 'Printer'),
(4, 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE IF NOT EXISTS `Items` (
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
  KEY `Status` (`Status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`itemID`, `itemName`, `itemImage`, `description`, `dateOfInitialization`, `purchasedDealer`, `purchasedReceiptImage`, `projectedDateOfTermination`, `Status`, `productID`, `remarks`) VALUES
(88, 'Lenovo Thinkpad X1 Carbon', NULL, 'Specs:\r\nCore i7 5400HQ, 16GB Ram, 1TB HDD', '2017-04-01', '', NULL, '2022-04-24', 1, '256', 'The order date was placed on April 1st, 2017.\r\nLaptop was delivered on April 4th, 2017.\r\nTermination period is 5 years from the date of purchase.'),
(89, 'Asus Zenbook 3 Deluxe', NULL, 'Core i7 400HQ, 8GB Ram, 512GB HDD', '2017-04-01', '', NULL, '2017-04-24', 3, 'Ah67GMM8', 'Purchased date is on April 1st, 2017.\r\nAssigned to Rohan on the April 24th, 2017\r\n'),
(90, 'Toshiba Portege 15', NULL, 'Core i7 vPRO 7800HQ, 16GB Ram, 1TB HDD', '2017-04-03', '', NULL, '2018-10-31', 1, 'LTP11865F', 'Battery issue. The battery backup is lower than others. Just gives 3hrs of battery backup.\r\nNeeds to be sent for repair later.'),
(91, 'Canon Inkjet 3234', NULL, 'Resolution 4800x1200dpi,USB 3.0,Color printer', '2017-04-07', '', NULL, '2022-04-14', 3, 'IP27701244', 'Cartridge issue'),
(92, 'Canon Laserjet 8187', NULL, 'Resolution 4800x1200dpi,USB 3.0,Black and white\r\n', '2017-08-09', '', NULL, '2020-08-09', 1, 'IP27701244', ''),
(93, 'HP InkAdvantage 2200', NULL, 'Resolution 3600x1200dpi,USB 2.0,Color printer\r\n', '2017-05-15', '', NULL, '2020-05-15', 1, 'YS2123852', ''),
(94, 'vm16', NULL, '', '2017-08-19', '', NULL, '2020-08-19', 4, '1003', 'accidental failure'),
(95, 'vm24', NULL, '', '2017-08-09', '', NULL, '2020-08-09', 4, '1002', 'invalid entry'),
(96, 'dell studio', NULL, '2 GHZ ', '2017-04-24', '', NULL, '2022-04-27', 3, '3521', 'machine not working'),
(97, 'SIP Box', NULL, 'Two RJ-11 FXS, 1 WAN 100Base-T RJ-45 Port\r\n', '2017-08-02', '', NULL, '2020-08-02', 3, 'MLB1120H', 'Port failure\r\n'),
(99, 'Dell Inspiron 14 7000', NULL, '-New', '2017-05-02', '', NULL, '2018-02-02', 1, '1330', 'Good'),
(100, 'vm1', NULL, '-New', '2017-05-03', 'ABC', NULL, '2017-08-26', 1, '1004', '-Good'),
(101, 'Cisco VOIP', NULL, '-Cisco Voip', '2017-05-02', 'ABC Lmtd.', NULL, '2018-01-05', 3, '2345', '-New product'),
(102, 'HP Envy 13 Ultrabook', NULL, 'Core i7 vPRO 7800HQ, 16GB Ram, 1TB HDD', '2017-05-02', 'ABC Computer Center', NULL, '2018-03-02', 3, 'HP1234', 'New device purchsed'),
(103, 'vm2', NULL, '', '2017-05-02', 'ABC Computer Center', NULL, '2018-02-03', 3, '1006', '-New VM for client 1003'),
(104, 'Dell Vostro 3468', NULL, 'Core i7 5400HQ, 16GB Ram, 1TB HDD', '2017-05-02', 'ABC Computer Shop', NULL, '2018-03-03', 3, 'DELL1234', 'New purchased laptop for new staff'),
(105, 'vm1', NULL, '', '2017-05-02', 'ABC Computer Shop', NULL, '2017-11-03', 1, '1007', 'Consider as good. '),
(111, 'Dell PC', NULL, 'test description', '2017-05-03', '', NULL, '2018-08-08', 1, 'PC1234', 'device is repaired on May 3rd, 2017.');

-- --------------------------------------------------------

--
-- Table structure for table `repaireditems`
--

CREATE TABLE IF NOT EXISTS `repaireditems` (
  `ID` int(11) NOT NULL,
  `dateOfRepair` datetime DEFAULT NULL,
  `DealerInfo` varchar(45) DEFAULT NULL,
  `receiptImage` varchar(255) DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `contactNumber` varchar(45) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `staffPicture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`ID`, `firstName`, `middleName`, `lastName`, `contactNumber`, `designation`, `staffPicture`) VALUES
(3, 'Shyam', NULL, 'Bhattarai', '123456', 'Developer', NULL),
(4, 'Rohan', NULL, 'Reddy', '321654', 'GUI Designer', NULL),
(5, 'Reshma', NULL, 'Dangol', '987456', 'Project Manager', NULL),
(6, 'Junar', NULL, 'Landicho', '741852', 'Network Specialist', NULL),
(7, 'Nikita', NULL, 'Valluri', '963258', 'Data Analyist', NULL),
(8, 'Aditya', NULL, 'Capalasetty', '74589', 'QA Engineer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Name`) VALUES
(1, 'In-Use'),
(2, 'Needs Repair'),
(3, 'Available'),
(4, 'Terminated'),
(5, 'Donated'),
(6, 'Sent to Repair');

-- --------------------------------------------------------

--
-- Table structure for table `VM`
--

CREATE TABLE IF NOT EXISTS `VM` (
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
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VM`
--

INSERT INTO `VM` (`ID`, `serverImage`, `hostname`, `dataCenter`, `OSInstalled`, `softwaresInstalled`, `RAM`, `HDD`, `CPU`, `ipAddress`, `subnet`, `gateway`, `virtualMachine`, `SoftwareVersion`, `OSVersion`) VALUES
(94, NULL, 'ns2.dotarai.biz', 'idc1', 'Windows ', 'Vsphear', '2GB', '256GB', '1.8Ghz dual core ', '192.168.197.162', '255.255.255.240', '192.168.197.3', 'vm16', 'v6.1', '7 pro'),
(95, NULL, 'ns1.dotarai.biz', 'idc2', 'Windows', 'apache', '4GB', '500GB', '2.5Ghz Quad core', '192.168.197.170', '255.255.255.278', '192.168.197.5', 'vm24', 'v2', 'Server'),
(100, NULL, 'ns3.dotarai.biz ', 'idc3', 'Windows', 'vSphear', '124', '5', '2', '192.168.1.2', '255.255.255.0', '192.168.1.1', 'vm1', '1.2', '7 Premium'),
(103, NULL, 'ns4.dotarai.biz', 'idc3', 'Windows', 'vsphear', '2GB', '256GB', '1.86Ghz ', '192.168.197.162', '255.255.255.240', '192.168.197.1', 'vm2', 'v6.1', '7 Pro'),
(105, NULL, 'ns5.dotarai.biz', 'idc3', 'Windows', 'vsphear', '2GB', '256GB', '1.8Ghz Dual Core', '192.168.197.165', '255.255.240.0', '192.168.197.1', 'vm1', 'v6.1', '7 Pro');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignedHistory`
--
ALTER TABLE `assignedHistory`
  ADD CONSTRAINT `StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staffs` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hardwareID` FOREIGN KEY (`hardwareID`) REFERENCES `Items` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hardwares`
--
ALTER TABLE `hardwares`
  ADD CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `Items` (`itemID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `hardwareType_fk` FOREIGN KEY (`hardwareType`) REFERENCES `hardwareTypes` (`ID`);

--
-- Constraints for table `Items`
--
ALTER TABLE `Items`
  ADD CONSTRAINT `Status` FOREIGN KEY (`Status`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `repaireditems`
--
ALTER TABLE `repaireditems`
  ADD CONSTRAINT `repaireditems_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`itemID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `VM`
--
ALTER TABLE `VM`
  ADD CONSTRAINT `VM_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Items` (`itemID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
