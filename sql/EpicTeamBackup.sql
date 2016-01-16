-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: EpicTeam
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Temporary table structure for view `ActiveWorkOrders`
--

DROP TABLE IF EXISTS `ActiveWorkOrders`;
/*!50001 DROP VIEW IF EXISTS `ActiveWorkOrders`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ActiveWorkOrders` (
  `WID` tinyint NOT NULL,
  `Title` tinyint NOT NULL,
  `Description` tinyint NOT NULL,
  `Project` tinyint NOT NULL,
  `Priority` tinyint NOT NULL,
  `Revision` tinyint NOT NULL,
  `Requestor` tinyint NOT NULL,
  `Receiver` tinyint NOT NULL,
  `AuthorID` tinyint NOT NULL,
  `DateCreated` tinyint NOT NULL,
  `DateNeedBy` tinyint NOT NULL,
  `Assigned` tinyint NOT NULL,
  `Approved` tinyint NOT NULL,
  `ApprovedByCap` tinyint NOT NULL,
  `Finished` tinyint NOT NULL,
  `Closed` tinyint NOT NULL,
  `Active` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `AllActiveUsersView`
--

DROP TABLE IF EXISTS `AllActiveUsersView`;
/*!50001 DROP VIEW IF EXISTS `AllActiveUsersView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `AllActiveUsersView` (
  `UserID` tinyint NOT NULL,
  `UserName` tinyint NOT NULL,
  `LastName` tinyint NOT NULL,
  `FirstName` tinyint NOT NULL,
  `NickName` tinyint NOT NULL,
  `Tags` tinyint NOT NULL,
  `IPT` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `AppendedData`
--

DROP TABLE IF EXISTS `AppendedData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AppendedData` (
  `WID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TextInfo` text,
  `DateCreated` date DEFAULT NULL,
  `Sequence` int(11) DEFAULT NULL,
  `PicID` int(11) DEFAULT NULL,
  `PrimaryFile` tinyint(1) DEFAULT NULL,
  `Removed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AppendedData`
--

LOCK TABLES `AppendedData` WRITE;
/*!40000 ALTER TABLE `AppendedData` DISABLE KEYS */;
INSERT INTO `AppendedData` VALUES (4,0,'New Assigment: \"Stan Granch\" assigned by Andrew Haitz','2016-01-15',1,0,0,0),(4,0,'New Assigment: \"Ginger DeVries\" assigned by Andrew Haitz','2016-01-15',2,0,0,0),(4,0,'New Assigment: \"Andrew Haitz\" assigned by Andrew Haitz','2016-01-15',3,0,0,0),(5,0,'Status \"Approved\" changed to true by Kyle Dominguez.','2016-01-15',1,0,0,0),(5,0,'New Assigment: \"Ricky Carranza\" assigned by Kyle Dominguez','2016-01-15',2,0,0,0),(5,0,'New Assigment: \"Yoel Ghebreyesus\" assigned by Kyle Dominguez','2016-01-15',3,0,0,0),(1,0,'Status \"Closed\" changed to true by Sarah Shibley.','2016-01-15',1,0,0,0),(7,0,'Status \"Approved\" changed to true by Sarah Shibley.','2016-01-15',1,0,0,0),(7,0,'New Assigment: \"Nathan Gardner\" assigned by Sarah Shibley','2016-01-15',2,0,0,0),(7,0,'New Assigment: \"Patrick Rose\" assigned by Sarah Shibley','2016-01-15',3,0,0,0),(8,0,'Status \"Approved\" changed to true by Sarah Shibley.','2016-01-15',1,0,0,0),(6,0,'Status \"Approved\" changed to true by Andrew Haitz.','2016-01-15',1,0,0,0),(6,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',2,0,0,0),(2,0,'Status \"Approved\" changed to true by Andrew Haitz.','2016-01-15',1,0,0,0),(2,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',2,0,0,0),(4,0,'New Assigment: \"Rob Dominik\" assigned by Andrew Haitz','2016-01-15',4,0,0,0),(5,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',4,0,0,0),(4,0,'Status \"Approved\" changed to true by Andrew Haitz.','2016-01-15',5,0,0,0),(4,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',6,0,0,0),(11,0,'New Assigment: \"Rose Habal\" assigned by Andrew Haitz','2016-01-15',1,0,0,0),(11,0,'New Assigment: \"Jessica Listi\" assigned by Andrew Haitz','2016-01-15',2,0,0,0),(11,0,'New Assigment: \"Danielle Lozada\" assigned by Andrew Haitz','2016-01-15',3,0,0,0),(11,0,'New Assigment: \"David O Toole\" assigned by Andrew Haitz','2016-01-15',4,0,0,0),(11,0,'New Assigment: \"Matthew Sigala\" assigned by Andrew Haitz','2016-01-15',5,0,0,0),(11,0,'New Assigment: \"Kristen Stock\" assigned by Andrew Haitz','2016-01-15',6,0,0,0),(3,0,'Status \"Approved\" changed to true by Andrew Haitz.','2016-01-15',1,0,0,0),(3,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',2,0,0,0),(3,0,'New Assigment: \"Ginger DeVries\" assigned by Andrew Haitz','2016-01-15',3,0,0,0),(10,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',1,0,0,0),(11,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',7,0,0,0),(9,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',1,0,0,0),(8,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',2,0,0,0),(7,0,'Status \"ApprovedByCap\" changed to true by Andrew Haitz.','2016-01-15',4,0,0,0);
/*!40000 ALTER TABLE `AppendedData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `AppendedDataView`
--

DROP TABLE IF EXISTS `AppendedDataView`;
/*!50001 DROP VIEW IF EXISTS `AppendedDataView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `AppendedDataView` (
  `WID` tinyint NOT NULL,
  `UserID` tinyint NOT NULL,
  `TextInfo` tinyint NOT NULL,
  `DateCreated` tinyint NOT NULL,
  `Sequence` tinyint NOT NULL,
  `PicID` tinyint NOT NULL,
  `PrimaryFile` tinyint NOT NULL,
  `Removed` tinyint NOT NULL,
  `LastName` tinyint NOT NULL,
  `FirstName` tinyint NOT NULL,
  `IPT` tinyint NOT NULL,
  `Tags` tinyint NOT NULL,
  `NickName` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `AssignedUsersView`
--

DROP TABLE IF EXISTS `AssignedUsersView`;
/*!50001 DROP VIEW IF EXISTS `AssignedUsersView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `AssignedUsersView` (
  `WID` tinyint NOT NULL,
  `UserID` tinyint NOT NULL,
  `UserName` tinyint NOT NULL,
  `LastName` tinyint NOT NULL,
  `FirstName` tinyint NOT NULL,
  `NickName` tinyint NOT NULL,
  `Tags` tinyint NOT NULL,
  `IPT` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Assignments`
--

DROP TABLE IF EXISTS `Assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Assignments` (
  `WID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assignments`
--

LOCK TABLES `Assignments` WRITE;
/*!40000 ALTER TABLE `Assignments` DISABLE KEYS */;
INSERT INTO `Assignments` VALUES (4,60),(4,4),(4,26),(5,17),(5,24),(7,22),(7,41),(4,8),(11,67),(11,30),(11,32),(11,36),(11,42),(11,46),(3,4);
/*!40000 ALTER TABLE `Assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `AssignmentsView`
--

DROP TABLE IF EXISTS `AssignmentsView`;
/*!50001 DROP VIEW IF EXISTS `AssignmentsView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `AssignmentsView` (
  `WID` tinyint NOT NULL,
  `Title` tinyint NOT NULL,
  `Description` tinyint NOT NULL,
  `Project` tinyint NOT NULL,
  `Priority` tinyint NOT NULL,
  `Revision` tinyint NOT NULL,
  `Requestor` tinyint NOT NULL,
  `Receiver` tinyint NOT NULL,
  `AuthorID` tinyint NOT NULL,
  `DateCreated` tinyint NOT NULL,
  `DateNeedBy` tinyint NOT NULL,
  `Assigned` tinyint NOT NULL,
  `Approved` tinyint NOT NULL,
  `ApprovedByCap` tinyint NOT NULL,
  `Finished` tinyint NOT NULL,
  `Closed` tinyint NOT NULL,
  `Active` tinyint NOT NULL,
  `UserID` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Pictures`
--

DROP TABLE IF EXISTS `Pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pictures` (
  `PicID` int(11) NOT NULL AUTO_INCREMENT,
  `DateOfUpload` datetime DEFAULT NULL,
  `FileStatus` int(11) DEFAULT NULL,
  `FileSize` int(11) DEFAULT NULL,
  `Width` int(11) DEFAULT NULL,
  `Height` int(11) DEFAULT NULL,
  PRIMARY KEY (`PicID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pictures`
--

LOCK TABLES `Pictures` WRITE;
/*!40000 ALTER TABLE `Pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prefs`
--

DROP TABLE IF EXISTS `Prefs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prefs` (
  `UserID` int(11) DEFAULT NULL,
  `PrefName` varchar(32) DEFAULT NULL,
  `PrefValue` varchar(256) DEFAULT NULL,
  KEY `fk_Users` (`UserID`),
  CONSTRAINT `fk_Users` FOREIGN KEY (`UserID`) REFERENCES `Users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prefs`
--

LOCK TABLES `Prefs` WRITE;
/*!40000 ALTER TABLE `Prefs` DISABLE KEYS */;
/*!40000 ALTER TABLE `Prefs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPics`
--

DROP TABLE IF EXISTS `UserPics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserPics` (
  `PicID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPics`
--

LOCK TABLES `UserPics` WRITE;
/*!40000 ALTER TABLE `UserPics` DISABLE KEYS */;
/*!40000 ALTER TABLE `UserPics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `UserView`
--

DROP TABLE IF EXISTS `UserView`;
/*!50001 DROP VIEW IF EXISTS `UserView`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `UserView` (
  `UserID` tinyint NOT NULL,
  `UserName` tinyint NOT NULL,
  `PasswordHash` tinyint NOT NULL,
  `LastName` tinyint NOT NULL,
  `FirstName` tinyint NOT NULL,
  `NickName` tinyint NOT NULL,
  `Title` tinyint NOT NULL,
  `Email` tinyint NOT NULL,
  `Tags` tinyint NOT NULL,
  `Active` tinyint NOT NULL,
  `IPT` tinyint NOT NULL,
  `PicID` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(40) NOT NULL,
  `PasswordHash` varchar(40) DEFAULT NULL,
  `LastName` varchar(80) DEFAULT NULL,
  `FirstName` varchar(80) DEFAULT NULL,
  `NickName` varchar(80) DEFAULT NULL,
  `Title` varchar(80) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Tags` varchar(120) DEFAULT NULL,
  `IPT` varchar(80) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'dbrandon','41w0Haer3yB3.','Brandon','Dalbert','Dal','Mentor','dalbrandon@gmail.com','Member/Editor/Admin','',1),(2,'jdeguzman','41oTpO8zgdh3.','De Guzman','Joni','Joni','Mentor','','Worker/Mentor/Editor','Programming',1),(3,'jdekker','41YxH1wDsZzy.','Dekker','Jim','Jim','Mentor','jim.dekker@gte.net','Worker/Mentor/Editor','Build',1),(4,'gdevries','41146q48HUmr.','DeVries','Ginger','Ginger','Mentor','ginger.devries@gmail.com','Worker/Editor/Mentor','IT',1),(5,'padevries','41T7fdpRoa7NQ','DeVries','Paul','Paul','Head Coach','phd.devries@gmail.com','Editor/Mentor/HeadCoach/Worker','Build',1),(6,'kdominguez','41.DwD7CuQ9mc','Dominguez','Kyle','Kyle','Mentor','robo.davinci7@gmail.com','Worker/Mentor/Editor','CAD',1),(7,'ddominik','416dIx95SUiLw','Dominik','Dan','Dan','Mentor','dandominik@ca.rr.com','Worker/Mentor','Strategy',1),(8,'rdominik','41pU0HB0bJdC6','Dominik','Rob','Rob','Chief Mentor','robjendominik@verizon.net','Editor/Mentor/HeadCoach/Worker','Business',1),(9,'dfieldhouse','41e60YsISVGGQ','Fieldhouse','David','David','Mentor','','Worker/Mentor','',1),(10,'kfleming','41cH3K9cbgcHo','Fleming','Kyle','Kyle','Mentor','','Worker/Mentor/Editor','Programming',1),(11,'wfurlong','41KPRUb8kpBqg','Furlong','William','William','Mentor','wrfiii@ca.rr.com','Worker/Mentor','Strategy',1),(12,'dlong','41X1qGlZXCme6','Long','Don','Don','Mentor','','Worker/Mentor','Build',1),(13,'bmadrid','41umSOzAdzQ5s','Madrid','Brian','Brian','Mentor','','Worker/Editor/Admin/Mentor','Admin Web',1),(14,'mormonde','41PswgXVrdOfI','Ormonde','Mike','Mike','Mentor','','Worker/Mentor','',1),(15,'sshibley','41DZB/fUGSWyc','Shibley','Sarah','Sarah','Mentor','sarahshib@outlook.com','Editor/Admin/Mentor','Admin Web',1),(16,'caardema','41U25PIyjs6UM','Aardema','Chase','Chase','','caardema18@student.vcschools.org','Worker','Programming',1),(17,'rcarranza','413acuRie4cm6','Carranza','Ricky','Ricky','','','Worker','CAD',1),(18,'dchen','41Gs9xQPI5ZwA','Chen','Derek','Derek','','','Worker','CNC',1),(19,'pedevries','41oHbSBRvGiBw','DeVries','Peter','Peter','IT Lead','','Worker/IPTLead','3D Printing',1),(20,'cdominik','41Ix7TMncS.0s','Dominik','Chris','Chris','CAD Lead','CDominik16@student.vcschools.org','Worker/IPTLead','CAD',1),(21,'gfua','41ZC0s.dDrD2Q','Fua','Gavin','Gavin','','','Worker/IPTLead','Programming',1),(22,'ngardner','41v2gJIT8cYM6','Gardner','Nathan','Nathan','Admin Web Lead','brytstahr@yahoo.com','Worker/Editor/Admin/IPTLead','Admin Web',1),(23,'tghebreyesus','41jAsVn8IPMtA','Ghebreyesus','Temesghen','Temesghen','','','Worker','Safety',1),(24,'yghebreyesus','41GGuu5zEXFpI','Ghebreyesus','Yoel','Yoel','','','Worker','CAD',1),(25,'cgranch','41X1qGlZXCme6','Granch','Caleb','Caleb','Build Lead','cgranch16@student.vcschools.org','Worker/IPTLead/Captain','Build',1),(26,'ahaitz','41QZbCCEJo4Kg','Haitz','Andrew','Andrew','Programming Lead','andrew.haitz@gmail.com','Worker/IPTLead/Captain','Programming',1),(27,'jkeeton','41FjvU41BT2x6','Keeton','Johnny','Johnny','','','Worker','Special Project',1),(28,'jkim','41wwuI3C1QICE','Kim','Jack','Jack','','','Worker','Programming',1),(29,'pkooi','413y.F7hhFPog','Kooi','Payton','Payton','','','Worker','Build',1),(30,'jlisti','41LvI8ruyURak','Listi','Jessica','Jessica','','','Worker','Business',1),(31,'blong','41zfRL2Y14HpY','Long','Brennan','Brennan','','blong19@student.vcschools.org','Worker','CAD',1),(32,'dlozada','41ddqxQfkQUY6','Lozada','Danielle','Danielle','','','Worker','Business',1),(33,'enagahashi','41XwkRHZfgv1c','Nagahashi','Ean','Ean','','','Worker','Programming',1),(34,'nnewbold','41ZbYW8JjyysI','Newbold','Nathaniel','Nathaniel','','','Worker','Build',1),(35,'dnichols','4129p0kuOtl3.','Nichols','Daniel','Daniel ','','','Worker','Build',1),(36,'dotoole','413tdubFocnms','O Toole','David','David','','','Worker','Business',1),(37,'jpoole','41qs7o.KZA3Zg','Poole','Jelani','Jelani','','','Worker','Build',1),(38,'grabideaux','41zecf6FsRJaA','Rabideaux','Grant','Grant','','','Worker','Build',1),(39,'srange','41hL/7QAtnT5U','Range','Samuel','Samuel','','','Worker','Special Project',1),(40,'krodriguez','418uqKDKo3Dg2','Rodriguez','Kaitlyn','Kaitlyn','','','Worker','Build',1),(41,'prose','41whopvetdwvk','Rose','Patrick','Patrick','','','Worker/Editor/Admin','Admin Web',1),(42,'msigala','41mgH2exyn4/I','Sigala','Matthew','Matthew','Business Lead','rimrockers25@gmail.com','Worker/IPTLead','Business',1),(43,'msilva','411F95WQh/Vjk','Silva','Madison','Madison','','','Worker','Safety',1),(44,'Spare1','41Ay.SZJ18Fkc','Spare1','Spare1','','','','Guest','',1),(45,'Spare2','41psP1Pv1EphM','Spare2','Spare2','','','','Guest','',1),(46,'kstock','41ehtypsJmQx2','Stock','Kristen','Kristen','','','Worker','Business',1),(47,'esu','41XCEkDxGe3gg','Su','Ellen','Ellen','','','Worker','CNC',1),(48,'stefera','41.gFXWQcTRPA','Tefera','Saron','Saron','','','Worker','CAD',1),(49,'cthacker','41fkCYzdq3t2U','Thacker','Caleb','Caleb','','','Worker/IPTLead','Programming',1),(50,'rvreeke','41ZaAFdheLBf6','Vreeke','Ryan','Ryan','','','Worker','Programming',1),(51,'swang','41E0Jhxg7ZoME','Wang','Sam','Sam','','','Worker','CAD',1),(52,'rward','41LHHGFMXWa02','Ward','Rebecca','Rebecca','','','Worker','Admin Web',1),(53,'tward','41Tn8KnWfhVgw','Ward','Tucker','Tucker','','','Worker','',0),(54,'jwu','41g0lqKSk3Geg','Wu','Jack','Jack','','','Worker','CNC',1),(55,'tzhang','41q1DR8Bi5ICQ','Zhang','Tab','Tab','Web Lead','tabtianyizhang@gmail.com','Worker/IPTLead','Web',1),(56,'rhabol','41uARX8GFAx4g','Habol','Rose','Rose','','','Worker','Business',0),(57,'kmeade','419tGpzXxkprA','Meade','Khalil','Khalil','','','Worker','Build',1),(58,'chuckaardema','4113KjlenIJkw','Aardema','Charles','Charles','Mentor','','Worker/Mentor/Editor','Build',1),(59,'jrabideaux','41OgB5wJ5PwOo','Rabideaux','Jeff','Jeff','Mentor','','Worker/Mentor','Build',1),(60,'sgranch','41ICP62gviliA','Granch','Stan','Stan','Mentor','','Worker/Mentor','Business',1),(61,'drupprecht','4165DoIfG69Po','Rupprecht','Dan','Dan','Mentor','','Worker/Mentor','CNC ',1),(62,'ebennett','41FKwBumYJIUs','Bennett','Ethan','Ethan','Mentor','','Worker/Mentor','',1),(63,'shoekstra','419AZwdu.FeGQ','Hoekstra','Steve','Steve','Mentor','','Worker/Mentor','',1),(64,'teeghebreyesus','41zeEWzdv1uzc','Ghebreyesus','Tesfa','Tesfa','Mentor','','Worker/Mentor','Build',1),(65,'lfurlong','41v3b1805Tw8U','Furlong','Logan','Logan','Mentor','','Worker/Mentor','',1),(66,'jstratton','41fM.nF0LEr0I','Jerry','Stratton','Jerry','Mentor','','Worker/Mentor','CNC',1),(67,'rhabal','41uARX8GFAx4g','Habal','Rose','Rose','','','Worker','Business',1);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `WorkOrders`
--

DROP TABLE IF EXISTS `WorkOrders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `WorkOrders` (
  `WID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(80) NOT NULL,
  `Description` text,
  `Priority` varchar(80) DEFAULT NULL,
  `Project` varchar(80) DEFAULT NULL,
  `Revision` int(11) DEFAULT NULL,
  `Requestor` varchar(80) DEFAULT NULL,
  `Receiver` varchar(80) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `DateNeedBy` date DEFAULT NULL,
  `Assigned` tinyint(1) DEFAULT NULL,
  `Approved` tinyint(1) DEFAULT NULL,
  `ApprovedByCap` tinyint(1) DEFAULT NULL,
  `Finished` tinyint(1) DEFAULT NULL,
  `Closed` tinyint(1) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`WID`),
  UNIQUE KEY `Title` (`Title`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `WorkOrders`
--

LOCK TABLES `WorkOrders` WRITE;
/*!40000 ALTER TABLE `WorkOrders` DISABLE KEYS */;
INSERT INTO `WorkOrders` VALUES (1,'test1','test','Routine','General',0,'Admin Web','Admin Web',1,'2016-01-15','2016-01-20',0,0,0,0,1,0),(2,'Ensure that the database is backed-up regularly','The database for this website MUST be backed-up REGULARLY!\r\n\r\n - Schedule backups as fit - daily, or more often.','Urgent','General',1,'Admin Web','Admin Web',41,'2016-01-15','2016-01-20',0,1,1,0,0,1),(3,'Fix Ricky\'s Computer','Ricky\'s computer can no long recognize USB devices. It doesn\'t matter what sort of USB device it is his computer will not be able to interface with it. I looked at the Device Manager and it showed the USBs but they had errors. When you opened each one it showed an Error Code 28. Upon Googling this the main solutions were to 1) Update the driver or 2) Rollback the driver. The Rollback option was grayed out for these. When I attempted to update the drivers, the update failed. The computer has been restarted several times to no avail. \r\n\r\nPlease look into this further and figure out how to solve this issue. ','High','General',1,'CAD','IT',6,'2016-01-15','2016-01-16',1,1,1,0,0,1),(4,'Fundraiser 2016','I have created a strategy for fundraising for Vegas in 2016. We will discuss this A.S.A.P. (Once the business mentors return)','Urgent','Fund Rasing',1,'Management','Business',26,'2016-01-15','2016-01-28',1,1,1,0,0,1),(5,'Research Shooting devices','Research previous games shooters for similar objects. \r\n\r\nAdditionally look at all the Robot in 3 Days videos and document your findings in a word or similar program. Grab screen shoots of the various shooters you find and list the pros/cons of each design. Looking into both wheel shooters and catapults. \r\n\r\nUpload this file to the following path on Google Drive\r\nGoogle Drive\\EPIC Robotz\\2015-2016 Season\\Robot Design\\Research','High','Manipulator',1,'CAD','CAD',6,'2016-01-15','2016-01-16',1,1,1,0,0,1),(6,'Outreach','St. Marks possible presentation','Routine','General',1,'Business','Business',42,'2016-01-15','2016-01-20',0,1,1,0,0,1),(7,'enable WO search for keyword','in Find/List allow users to search for a Work Order by a specific word.','Routine','General',1,'Admin Web','Admin Web',15,'2016-01-15','2016-02-10',1,1,1,0,0,1),(8,'Work Order Emails','Email users when a work order is assigned to them.','Routine','General',1,'Admin Web','Admin Web',15,'2016-01-15','2016-01-20',0,1,1,0,0,1),(9,'Create scouting website','=======================\r\n    The Stuff to Do\r\n=======================\r\n\r\n - A \"scouting\" website is to be created for the team.\r\n    + A server will need to be purchased in order to host the site.\r\n    + Github repository will need to be created in order to place development files as they are being worked on.\r\n\r\n=======================\r\n    Purpose and Use\r\n=======================\r\n\r\nIt will allow team \"scouts\" to gather information on other opposing teams and potential allies during competitions.\r\nThis includes recording their skill level with regards to specific game-related tasks, general team information, and photos of their robot. This website will be optimized in design and appearance for mobile devices.\r\n\r\nThis website will need to have several features, for both regular users, and for administrators. They are, so far, as follows:\r\n\r\n=======================\r\n General User Features\r\n=======================\r\n\r\n - A way to upload team information, on a simple, easy to understand page. Team information would include:\r\n    + Firstly, the team\'s number; e.g. 4415.\r\n    + Q&A options regarding the team\'s skill in game tasks.\r\n    + Other team information and comments\r\n    + Ability to upload relevant pictures, such as a photo of the team\'s robot.\r\n\r\n - A way to log in, with a username and password.\r\n    + A way for users to change their passwords, if they so \r\nchoose.\r\n\r\n - A way to view any previously made records.\r\n    + A list, displaying reports by team number. A \"quick search\" function, by team number, would also be an important feature. The list would also show details next to each entry, such as the user who uploaded, and the time it was uploaded.\r\n\r\n=======================\r\n  Admin only Features\r\n=======================\r\n\r\nAdministrators would be able to access all features that a general user could access, along with these features:\r\n\r\n - A way to list all users, and view their respective information\r\n - A way to edit user information, add users, and remove users.\r\n - Bulk-uploading capabilities\r\n    + Bulk uploading of users, and team info\r\n - An ability to view a website log - a log of all website activity; uploads, log-ins, pages viewed, etc, etc.\r\n','Routine','General',1,'Admin Web','Admin Web',41,'2016-01-15','2016-03-15',0,0,1,0,0,1),(10,'Change team view layout of names','Change layout of names in \"Teamview\" > \"Organization\" to display names with Leaders grouped at the top, Members in the middle, and Mentors at the bottom.','Low','General',1,'Admin Web','Admin Web',41,'2016-01-15','2016-01-21',0,0,1,0,0,1),(11,'Design and Create a Team Mascot Costume','Brainstorm, design, and create a team mascot costume. When designing the costume, please take the following into account: \r\n\r\n-This year\'s competition is medieval themed.\r\n-Who will be our team mascot? I believe an individual with an exceptional amount of team spirit paired with a very high stamina and the desire to be a mascot would be an ideal candidate.\r\n-The costume MUST be completed before our first regional.','Routine','Advertising',1,'Management','Business',26,'2016-01-15','2016-03-05',1,0,1,0,0,1);
/*!40000 ALTER TABLE `WorkOrders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `ActiveWorkOrders`
--

/*!50001 DROP TABLE IF EXISTS `ActiveWorkOrders`*/;
/*!50001 DROP VIEW IF EXISTS `ActiveWorkOrders`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ActiveWorkOrders` AS select `WorkOrders`.`WID` AS `WID`,`WorkOrders`.`Title` AS `Title`,`WorkOrders`.`Description` AS `Description`,`WorkOrders`.`Project` AS `Project`,`WorkOrders`.`Priority` AS `Priority`,`WorkOrders`.`Revision` AS `Revision`,`WorkOrders`.`Requestor` AS `Requestor`,`WorkOrders`.`Receiver` AS `Receiver`,`WorkOrders`.`AuthorID` AS `AuthorID`,`WorkOrders`.`DateCreated` AS `DateCreated`,`WorkOrders`.`DateNeedBy` AS `DateNeedBy`,`WorkOrders`.`Assigned` AS `Assigned`,`WorkOrders`.`Approved` AS `Approved`,`WorkOrders`.`ApprovedByCap` AS `ApprovedByCap`,`WorkOrders`.`Finished` AS `Finished`,`WorkOrders`.`Closed` AS `Closed`,`WorkOrders`.`Active` AS `Active` from `WorkOrders` where (`WorkOrders`.`Active` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `AllActiveUsersView`
--

/*!50001 DROP TABLE IF EXISTS `AllActiveUsersView`*/;
/*!50001 DROP VIEW IF EXISTS `AllActiveUsersView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `AllActiveUsersView` AS select `Users`.`UserID` AS `UserID`,`Users`.`UserName` AS `UserName`,`Users`.`LastName` AS `LastName`,`Users`.`FirstName` AS `FirstName`,`Users`.`NickName` AS `NickName`,`Users`.`Tags` AS `Tags`,`Users`.`IPT` AS `IPT` from `Users` where (`Users`.`Active` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `AppendedDataView`
--

/*!50001 DROP TABLE IF EXISTS `AppendedDataView`*/;
/*!50001 DROP VIEW IF EXISTS `AppendedDataView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `AppendedDataView` AS select `AppendedData`.`WID` AS `WID`,`AppendedData`.`UserID` AS `UserID`,`AppendedData`.`TextInfo` AS `TextInfo`,`AppendedData`.`DateCreated` AS `DateCreated`,`AppendedData`.`Sequence` AS `Sequence`,`AppendedData`.`PicID` AS `PicID`,`AppendedData`.`PrimaryFile` AS `PrimaryFile`,`AppendedData`.`Removed` AS `Removed`,`Users`.`LastName` AS `LastName`,`Users`.`FirstName` AS `FirstName`,`Users`.`IPT` AS `IPT`,`Users`.`Tags` AS `Tags`,`Users`.`NickName` AS `NickName` from (`AppendedData` left join `Users` on((`AppendedData`.`UserID` = `Users`.`UserID`))) order by `AppendedData`.`Sequence` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `AssignedUsersView`
--

/*!50001 DROP TABLE IF EXISTS `AssignedUsersView`*/;
/*!50001 DROP VIEW IF EXISTS `AssignedUsersView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `AssignedUsersView` AS select `Assignments`.`WID` AS `WID`,`Users`.`UserID` AS `UserID`,`Users`.`UserName` AS `UserName`,`Users`.`LastName` AS `LastName`,`Users`.`FirstName` AS `FirstName`,`Users`.`NickName` AS `NickName`,`Users`.`Tags` AS `Tags`,`Users`.`IPT` AS `IPT` from (`Users` join `Assignments` on((`Assignments`.`UserID` = `Users`.`UserID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `AssignmentsView`
--

/*!50001 DROP TABLE IF EXISTS `AssignmentsView`*/;
/*!50001 DROP VIEW IF EXISTS `AssignmentsView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `AssignmentsView` AS select `ActiveWorkOrders`.`WID` AS `WID`,`ActiveWorkOrders`.`Title` AS `Title`,`ActiveWorkOrders`.`Description` AS `Description`,`ActiveWorkOrders`.`Project` AS `Project`,`ActiveWorkOrders`.`Priority` AS `Priority`,`ActiveWorkOrders`.`Revision` AS `Revision`,`ActiveWorkOrders`.`Requestor` AS `Requestor`,`ActiveWorkOrders`.`Receiver` AS `Receiver`,`ActiveWorkOrders`.`AuthorID` AS `AuthorID`,`ActiveWorkOrders`.`DateCreated` AS `DateCreated`,`ActiveWorkOrders`.`DateNeedBy` AS `DateNeedBy`,`ActiveWorkOrders`.`Assigned` AS `Assigned`,`ActiveWorkOrders`.`Approved` AS `Approved`,`ActiveWorkOrders`.`ApprovedByCap` AS `ApprovedByCap`,`ActiveWorkOrders`.`Finished` AS `Finished`,`ActiveWorkOrders`.`Closed` AS `Closed`,`ActiveWorkOrders`.`Active` AS `Active`,`Assignments`.`UserID` AS `UserID` from (`Assignments` join `ActiveWorkOrders` on((`Assignments`.`WID` = `ActiveWorkOrders`.`WID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `UserView`
--

/*!50001 DROP TABLE IF EXISTS `UserView`*/;
/*!50001 DROP VIEW IF EXISTS `UserView`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `UserView` AS select `Users`.`UserID` AS `UserID`,`Users`.`UserName` AS `UserName`,`Users`.`PasswordHash` AS `PasswordHash`,`Users`.`LastName` AS `LastName`,`Users`.`FirstName` AS `FirstName`,`Users`.`NickName` AS `NickName`,`Users`.`Title` AS `Title`,`Users`.`Email` AS `Email`,`Users`.`Tags` AS `Tags`,`Users`.`Active` AS `Active`,`Users`.`IPT` AS `IPT`,`UserPics`.`PicID` AS `PicID` from (`Users` left join `UserPics` on((`UserPics`.`UserID` = `Users`.`UserID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-16  2:50:31
