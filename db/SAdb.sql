DROP DATABASE IF EXISTS `SAdb`;
CREATE DATABASE `SAdb`; 
USE `SAdb`;

SET NAMES utf8 ;
SET character_set_client = utf8mb4 ;

CREATE TABLE `Doctor` (
  `idDoctor` int NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Clinic` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDoctor`),
  UNIQUE KEY `DoctorID_UNIQUE` (`idDoctor`),
  KEY `Doctor_idx` (`idDoctor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `SAdb`.`Doctor` (`idDoctor`, `FirstName`, `LastName`, `Clinic`, `Email`) VALUES ('1', 'Rodger', 'Kohl', 'Plano Cardiologist', 'DrKohl@PlanoC.com');
INSERT INTO `SAdb`.`Doctor` (`idDoctor`, `FirstName`, `LastName`, `Clinic`, `Email`) VALUES ('2', 'V', 'Lal', 'SouthLake Cardiologists', 'DrLal@southlakeC.com');


CREATE TABLE `Patient` (
  `idPatient` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Device` varchar(45) DEFAULT NULL,
  `Insurance` varchar(45) DEFAULT NULL,
  `idDoctor` int DEFAULT NULL,
  PRIMARY KEY (`idPatient`),
  UNIQUE KEY `idPatient_UNIQUE` (`idPatient`),
  KEY `doctorID_idx` (`idDoctor`),
  CONSTRAINT `doctorsID` FOREIGN KEY (`idDoctor`) REFERENCES `Doctor` (`idDoctor`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `SAdb`.`Patient` (`idPatient`, `FirstName`, `LastName`, `Device`, `Insurance`, `idDoctor`) VALUES ('1', 'Andrew', 'Romero', 'Apple Watch 3', 'UNH', '2');
INSERT INTO `SAdb`.`Patient` (`idPatient`, `FirstName`, `LastName`, `Device`, `Insurance`, `idDoctor`) VALUES ('2', 'Priscilla', 'Haskell', 'Apple Watch 3', 'BlueCross', '1');
INSERT INTO `SAdb`.`Patient` (`idPatient`, `FirstName`, `LastName`, `Device`, `Insurance`, `idDoctor`) VALUES ('3', 'Olivia', 'Guziec', 'Event Recorder 1', 'GEHA', '2');
INSERT INTO `SAdb`.`Patient` (`idPatient`, `FirstName`, `LastName`, `Device`, `Insurance`, `idDoctor`) VALUES ('4', 'Ganesh', 'Venkatsairao', 'Apple Watch 6', 'UNH', '2');
INSERT INTO `SAdb`.`Patient` (`idPatient`, `FirstName`, `LastName`, `Device`, `Insurance`, `idDoctor`) VALUES ('5', 'Antonio', 'Hale', 'Apple Watch 6', 'GEHA', '2');



CREATE TABLE `Report` (
  `HeartRate` int DEFAULT NULL,
  `Symptoms` varchar(45) DEFAULT NULL,
  `AutoDetected` varchar(45) DEFAULT NULL,
  `NumberOfEpisodes` int DEFAULT NULL,
  `idPatient` int NOT NULL,
  `idReport` int unsigned NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`idReport`),
  KEY `idPatient_idx` (`idPatient`),
  CONSTRAINT `idPatient` FOREIGN KEY (`idPatient`) REFERENCES `Patient` (`idPatient`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`) VALUES ('172', 'Skipped Heart Beat', 'Afib', '1', '1','1' ,'2022-03-19', '14:20:20');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('167', 'None', 'SVT', '0', '1', '2' ,'2022-03-16', '13:15:20');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('162', 'Other - "Was excersicsing"', 'None', '0', '1','3' , '2022-03-31', '12:10:20');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('157', 'Fatigue', 'PVC', '2', '1','4' , '2022-03-20', '11:05:20');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('152', 'Fatigue', 'Ventricular Run', '1', '1','5' , '2022-03-01', '10:00:20');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('112', 'None', 'PVC', '4', '5', '6' ,'2022-02-20', '02:10:40');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('98', 'None', 'None', '0', '2','7' , '2022-02-01', '01:05:40');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('110', 'None', 'None', '0', '2','8' , '2022-01-13', '00:00:40');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`) VALUES ('79', 'None', 'None', '0', '2','9' , '2021-12-25', '22:01:01');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`) VALUES ('140', 'Fatigue', 'PVC', '3', '1', '10' ,'2021-12-06', '20:56:01');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('170', 'None', 'PVC', '2', '1', '11' ,'2022-03-05', '19:51:01');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('154', 'None', 'PVC', '5', '1', '12' ,'2022-01-01', '18:46:01');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('178', 'Rapid Heartbeat Dizziness', 'Afib', '1', '5','13' , '2021-11-24', '17:41:01');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('129', 'Fatigue', 'PVC', '1', '5', '14' ,'2022-03-19', '10:11:23');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('100', 'None', 'None', '4', '5', '15' ,'2022-03-19', '05:10:10');
INSERT INTO `SAdb`.`Report` (`HeartRate`, `Symptoms`, `AutoDetected`, `NumberOfEpisodes`, `idPatient`, `idReport`, `Date`, `Time`)  VALUES ('90', 'None', 'None', '4', '5','16' , '2022-03-19', '04:05:10');