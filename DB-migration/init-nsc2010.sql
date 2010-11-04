-- phpMyAdmin SQL Dump
-- version 3.3.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 24 2010 г., 13:16
-- Версия сервера: 5.0.27
-- Версия PHP: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `nsc2010`
--

-- --------------------------------------------------------

--
-- Структура таблицы `holddups`
--

CREATE TABLE IF NOT EXISTS `holddups` (
  `DIWID` bigint(20) NOT NULL,
  `FileID` bigint(20) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `AppDate` datetime NOT NULL,
  `AppType` varchar(15) collate utf8_unicode_ci NOT NULL,
  `AppNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `DateOfHire` datetime NOT NULL,
  `TruckNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `FirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MiddleName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `BirthName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `RANumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `RAExpDate` datetime NOT NULL,
  `MedNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MedExpDate` datetime NOT NULL,
  `MedExaminerName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `StraightTruck` varchar(3) collate utf8_unicode_ci NOT NULL,
  `STFromDate` datetime NOT NULL,
  `STToDate` datetime NOT NULL,
  `STTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TractorSemiTrailer` varchar(3) collate utf8_unicode_ci NOT NULL,
  `TSTFromDate` datetime NOT NULL,
  `TSTToDate` datetime NOT NULL,
  `TSTTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DoublesTriples` varchar(3) collate utf8_unicode_ci NOT NULL,
  `DTFromDate` datetime NOT NULL,
  `DTToDate` datetime NOT NULL,
  `DTTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Busses` varchar(3) collate utf8_unicode_ci NOT NULL,
  `BusFromDate` datetime NOT NULL,
  `BusToDate` datetime NOT NULL,
  `BusTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Tankers` varchar(3) collate utf8_unicode_ci NOT NULL,
  `TanFromDate` datetime NOT NULL,
  `TanToDate` datetime NOT NULL,
  `TanTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `OtherEquip` varchar(3) collate utf8_unicode_ci NOT NULL,
  `OthFromDate` datetime NOT NULL,
  `OthToDate` datetime NOT NULL,
  `OthTotalMiles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `OthDescribe` varchar(200) collate utf8_unicode_ci NOT NULL,
  `DeniedCDL` varchar(3) collate utf8_unicode_ci NOT NULL,
  `DeniedCDLExplain` varchar(200) collate utf8_unicode_ci NOT NULL,
  `SuspCDL` varchar(3) collate utf8_unicode_ci NOT NULL,
  `SuspCDLExplain` varchar(200) collate utf8_unicode_ci NOT NULL,
  `CopyStatus` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `NoRA` tinyint(4) NOT NULL,
  `NoAcc` tinyint(4) NOT NULL,
  `NoViol` tinyint(4) NOT NULL,
  `NoEmpl` tinyint(4) NOT NULL,
  `DriverCode` varchar(30) collate utf8_unicode_ci NOT NULL,
  `TWICSerial` varchar(50) collate utf8_unicode_ci NOT NULL,
  `TWICExpDate` datetime NOT NULL,
  `NextelPhone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `NextelPhoneSerial` varchar(20) collate utf8_unicode_ci NOT NULL,
  `RadioFrequency` varchar(15) collate utf8_unicode_ci NOT NULL,
  `RadioSerial` varchar(20) collate utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `holddups`
--


-- --------------------------------------------------------

--
-- Структура таблицы `holdkey`
--

CREATE TABLE IF NOT EXISTS `holdkey` (
  `DIWID` bigint(20) NOT NULL auto_increment,
  `FileID` bigint(20) NOT NULL,
  `col3` tinyint(4) default NULL,
  PRIMARY KEY  (`DIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `holdkey`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccdoc`
--

CREATE TABLE IF NOT EXISTS `taccdoc` (
  `DocID` bigint(20) NOT NULL auto_increment,
  `DocType` varchar(30) collate utf8_unicode_ci default '',
  `Category` varchar(30) collate utf8_unicode_ci default '',
  `DocTitle` varchar(100) collate utf8_unicode_ci default '',
  `DocCode` varchar(10) collate utf8_unicode_ci default '',
  `HasPDF` tinyint(4) default '0',
  `PDFFile` varchar(100) collate utf8_unicode_ci default '',
  `HasScan` tinyint(4) default '0',
  `Multiple` tinyint(4) default '0',
  `ForEmployer` tinyint(4) default '0',
  `PageNum` tinyint(4) default '0',
  `HasNSCCheck` tinyint(4) default '0',
  PRIMARY KEY  (`DocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccdotinc`
--

CREATE TABLE IF NOT EXISTS `taccdotinc` (
  `DOTincID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL default '-1',
  `Fatality` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `injuries` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `towed` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `citation` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `test` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `Alcohol2` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `Alcohol` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `Drug` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `WhyNot` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `WhyNotDrug` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  `DOTReportable` varchar(3) collate utf8_unicode_ci NOT NULL default 'No',
  PRIMARY KEY  (`DOTincID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccdotinc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccdqfdoc`
--

CREATE TABLE IF NOT EXISTS `taccdqfdoc` (
  `AccDQFDocID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `DocID` bigint(20) default '-1',
  `Status` varchar(15) collate utf8_unicode_ci default '',
  `Requested` date NOT NULL default '1990-01-01',
  `Completed` date NOT NULL default '1990-01-01',
  `EmployeeDrID` bigint(20) default '-1',
  `ScanDateTime` varchar(20) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `OtherTitle` varchar(200) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`AccDQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccdqfdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccemployeedriver`
--

CREATE TABLE IF NOT EXISTS `taccemployeedriver` (
  `EmployeeDrID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `DriverID` bigint(20) NOT NULL,
  `SSN` varchar(15) collate utf8_unicode_ci default '',
  `HomeBaseID` bigint(20) default '-1',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `TerminationDate` date NOT NULL default '1900-01-01',
  `DateOfHire` date NOT NULL default '1900-01-01',
  `DOB` date NOT NULL default '1900-01-01',
  `FirstName` varchar(30) collate utf8_unicode_ci default '',
  `LastName` varchar(30) collate utf8_unicode_ci default '',
  `MiddleName` varchar(30) collate utf8_unicode_ci default '',
  `BirthName` varchar(30) collate utf8_unicode_ci default '',
  `StreetAddress` varchar(20) collate utf8_unicode_ci default '',
  `CityAddress` varchar(20) collate utf8_unicode_ci default '',
  `StateAddress` varchar(3) collate utf8_unicode_ci default '',
  `ZIPAddress` varchar(7) collate utf8_unicode_ci default '',
  `CDLNumber` varchar(30) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `Class` varchar(5) collate utf8_unicode_ci default '',
  `Injured` varchar(5) collate utf8_unicode_ci default '',
  `InjuryDescription` varchar(300) collate utf8_unicode_ci default '',
  `Killed` varchar(5) collate utf8_unicode_ci default '',
  `HomePhone` varchar(15) collate utf8_unicode_ci default '',
  `BusinessPhone` varchar(16) collate utf8_unicode_ci default '',
  `InsuranceCarier` varchar(30) collate utf8_unicode_ci default '',
  `InsPolicy` varchar(20) collate utf8_unicode_ci default '',
  `TravDirection` varchar(5) collate utf8_unicode_ci default '',
  `OnStreet` varchar(30) collate utf8_unicode_ci default '',
  `Speed` varchar(10) collate utf8_unicode_ci default '',
  `SpeedMax` varchar(10) collate utf8_unicode_ci default '',
  `LicPlate` varchar(15) collate utf8_unicode_ci default '',
  `Sex` varchar(10) collate utf8_unicode_ci default '',
  `HairColor` varchar(10) collate utf8_unicode_ci default '',
  `Eyes` varchar(10) collate utf8_unicode_ci default '',
  `HeightFeet` varchar(7) collate utf8_unicode_ci default '',
  `HeightInch` varchar(7) collate utf8_unicode_ci default '',
  `Weight` varchar(10) collate utf8_unicode_ci default '',
  `NumberOfPassanger` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(3) collate utf8_unicode_ci default '',
  `Alcohol8` varchar(3) collate utf8_unicode_ci default '',
  `Alcohol2` varchar(3) collate utf8_unicode_ci default '',
  `WhyNotAlcohol` text collate utf8_unicode_ci,
  `DrugTest` varchar(3) collate utf8_unicode_ci default '',
  `WhyNotDrug` text collate utf8_unicode_ci,
  `Citation8Hours` varchar(3) collate utf8_unicode_ci default '',
  `Citation32Hours` varchar(3) collate utf8_unicode_ci default '',
  `AccPoints` bigint(20) default '0',
  PRIMARY KEY  (`EmployeeDrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccemployeedriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccemployeemovement`
--

CREATE TABLE IF NOT EXISTS `taccemployeemovement` (
  `EmployeeMovID` bigint(20) NOT NULL auto_increment,
  `EmployeeDrID` bigint(20) default '-1',
  `Stopped` tinyint(4) default '0',
  `ProceedingStraight` tinyint(4) default '0',
  `RunOffRoadway` tinyint(4) default '0',
  `MakingRightTurn` tinyint(4) default '0',
  `MakingLeftTurn` tinyint(4) default '0',
  `MakingUTurn` tinyint(4) NOT NULL,
  `Backing` tinyint(4) default '0',
  `Slowing` tinyint(4) default '0',
  `Stopping` tinyint(4) default '0',
  `Passing` tinyint(4) default '0',
  `ChangingLanes` tinyint(4) default '0',
  `Parking` tinyint(4) default '0',
  `EnteringTraffic` tinyint(4) default '0',
  `UnsafeTurning` tinyint(4) default '0',
  `Parked` tinyint(4) default '0',
  `Merging` tinyint(4) default '0',
  `WrongWay` tinyint(4) default '0',
  `Other` text collate utf8_unicode_ci,
  PRIMARY KEY  (`EmployeeMovID`),
  KEY `FK_tAccEmployeeMovement_tAccEmployeeDriver` (`EmployeeDrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccemployeemovement`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccemployeevehicle`
--

CREATE TABLE IF NOT EXISTS `taccemployeevehicle` (
  `AccEmployVehicleID` bigint(20) NOT NULL auto_increment,
  `EmployeeDrID` bigint(20) default '-1',
  `DriverID` bigint(20) default '-1',
  `AccIWID` bigint(20) default '-1',
  `TruckID` bigint(20) default '-1',
  `TIWID` bigint(20) default '-1',
  `VendorID` bigint(20) default '-1',
  `VendorCompany` varchar(20) collate utf8_unicode_ci default '',
  `HomeBaseID` bigint(20) default '-1',
  `Make` varchar(20) collate utf8_unicode_ci default '',
  `Model` varchar(20) collate utf8_unicode_ci default '',
  `Color` varchar(20) collate utf8_unicode_ci default '',
  `ProdYear` varchar(5) collate utf8_unicode_ci default '',
  `LicPlate` varchar(15) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `UnitNUmber` varchar(15) collate utf8_unicode_ci default '',
  `OwnersFirstName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersLastName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersMiddleName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersStreetAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersCityAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersStateAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersZIPAddress` varchar(10) collate utf8_unicode_ci default '',
  `OwnersCode` varchar(15) collate utf8_unicode_ci default '',
  `VIN` varchar(25) collate utf8_unicode_ci default '',
  `Towed` varchar(3) collate utf8_unicode_ci default '',
  `DOT` varchar(15) collate utf8_unicode_ci default '',
  `Damage` text collate utf8_unicode_ci,
  `PhotoTaken` varchar(3) collate utf8_unicode_ci default '',
  `InsCompany` varchar(30) collate utf8_unicode_ci default '',
  `InsPolicyNum` varchar(30) collate utf8_unicode_ci default '',
  `InsExpDate` date NOT NULL default '1900-01-01',
  `VehicleValue` bigint(20) default '0',
  `VehType` varchar(10) collate utf8_unicode_ci default '',
  `DamageEstimate` varchar(10) collate utf8_unicode_ci default '',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`AccEmployVehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccemployeevehicle`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccemployepassanger`
--

CREATE TABLE IF NOT EXISTS `taccemployepassanger` (
  `PassangerID` bigint(20) NOT NULL auto_increment,
  `SSN` varchar(30) collate utf8_unicode_ci default '',
  `AccIWID` bigint(20) NOT NULL,
  `Status` varchar(20) collate utf8_unicode_ci default '',
  `DOB` date NOT NULL default '1990-01-01',
  `FirstName` varchar(20) collate utf8_unicode_ci default '',
  `LastName` varchar(20) collate utf8_unicode_ci default '',
  `MIddleName` varchar(20) collate utf8_unicode_ci default '',
  `HomePhone` varchar(15) collate utf8_unicode_ci default '',
  `BusinessPhone` varchar(16) collate utf8_unicode_ci default '',
  `StreetAddress` varchar(20) collate utf8_unicode_ci default '',
  `CityAddress` varchar(20) collate utf8_unicode_ci default '',
  `StateAddress` varchar(3) collate utf8_unicode_ci default '',
  `ZIPAddress` varchar(7) collate utf8_unicode_ci default '',
  `CDLNumber` varchar(30) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `Class` varchar(5) collate utf8_unicode_ci default '',
  `Injured` varchar(5) collate utf8_unicode_ci NOT NULL,
  `InjuryDescription` varchar(300) collate utf8_unicode_ci default '',
  `Killed` varchar(5) collate utf8_unicode_ci default '',
  `Sex` varchar(10) collate utf8_unicode_ci default '',
  `HairColor` varchar(10) collate utf8_unicode_ci default '',
  `Eyes` varchar(10) collate utf8_unicode_ci default '',
  `HeightFeet` varchar(7) collate utf8_unicode_ci default '',
  `HeightInch` varchar(7) collate utf8_unicode_ci default '',
  `Weight` varchar(10) collate utf8_unicode_ci default '',
  `Seatbelt` varchar(5) collate utf8_unicode_ci default '',
  `Statement` varchar(300) collate utf8_unicode_ci default '',
  `WitnessType` varchar(15) collate utf8_unicode_ci default '',
  `InjuryType` varchar(30) collate utf8_unicode_ci default '',
  `TransportedBy` varchar(50) collate utf8_unicode_ci default '',
  `TakenTo` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`PassangerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccemployepassanger`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccfile`
--

CREATE TABLE IF NOT EXISTS `taccfile` (
  `AccFileID` bigint(20) NOT NULL auto_increment,
  `AccidentID` bigint(20) default '-1',
  `HomeBaseID` bigint(20) default '-1',
  `Status` varchar(20) collate utf8_unicode_ci default 'Open',
  `ClosingDate` date NOT NULL default '1900-01-01',
  `FileOpened` date NOT NULL default '1900-01-01',
  `FileCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `DOTCheck` tinyint(4) default '0',
  PRIMARY KEY  (`AccFileID`),
  KEY `FK_tAccFile_tAccident` (`AccidentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccident`
--

CREATE TABLE IF NOT EXISTS `taccident` (
  `AccidentID` bigint(20) NOT NULL auto_increment,
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `AccDate` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`AccidentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccident`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccinvolvedwith`
--

CREATE TABLE IF NOT EXISTS `taccinvolvedwith` (
  `InvolvedWithID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `Noncollision` varchar(3) collate utf8_unicode_ci NOT NULL,
  `OtherMotorVehicle` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Pedestrian` varchar(3) collate utf8_unicode_ci NOT NULL,
  `ParkedVehicle` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Train` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Bus` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Bicycle` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Animal` varchar(3) collate utf8_unicode_ci NOT NULL,
  `FixedObject` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Other` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`InvolvedWithID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccinvolvedwith`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tacciw`
--

CREATE TABLE IF NOT EXISTS `tacciw` (
  `AccIWID` bigint(20) NOT NULL auto_increment,
  `AccFileID` bigint(20) default '-1',
  `City` varchar(30) collate utf8_unicode_ci default '',
  `County` varchar(30) collate utf8_unicode_ci default '',
  `State` varchar(4) collate utf8_unicode_ci default '',
  `AccLocation` varchar(100) collate utf8_unicode_ci default '',
  `Intersection` varchar(100) collate utf8_unicode_ci default '',
  `Distance` varchar(20) collate utf8_unicode_ci default '',
  `DistFrom` varchar(100) collate utf8_unicode_ci default '',
  `AccTime` varchar(15) collate utf8_unicode_ci default '',
  `PhotoBy` varchar(30) collate utf8_unicode_ci default '',
  `SpeedLimit` varchar(10) collate utf8_unicode_ci default '',
  `Reported` varchar(5) collate utf8_unicode_ci default '',
  `PoliceDep` varchar(20) collate utf8_unicode_ci default '',
  `Scatched` varchar(5) collate utf8_unicode_ci default '',
  `OfficerName` varchar(40) collate utf8_unicode_ci default '',
  `ReportNum` varchar(40) collate utf8_unicode_ci default '',
  `FileOpened` date NOT NULL default '1900-01-01',
  `AccNarative` text collate utf8_unicode_ci,
  `MileMarker` text collate utf8_unicode_ci,
  `Preventable` varchar(3) collate utf8_unicode_ci default '',
  `AccType` varchar(15) collate utf8_unicode_ci default 'Not Defined',
  `AccNumber` varchar(50) collate utf8_unicode_ci default '',
  `HazmatSpill` varchar(3) collate utf8_unicode_ci default 'No',
  `FuelSpill` varchar(3) collate utf8_unicode_ci default 'No',
  PRIMARY KEY  (`AccIWID`),
  KEY `FK_tAccIW_tAccFile` (`AccFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tacciw`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tacclightningdata`
--

CREATE TABLE IF NOT EXISTS `tacclightningdata` (
  `LightningDataID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `DayLight` varchar(3) collate utf8_unicode_ci default '',
  `Dusk` varchar(3) collate utf8_unicode_ci default '',
  `Down` varchar(3) collate utf8_unicode_ci default '',
  `DarkLights` varchar(3) collate utf8_unicode_ci default '',
  `DarkNoLights` varchar(3) collate utf8_unicode_ci default '',
  `DarkLightsOff` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`LightningDataID`),
  UNIQUE KEY `tAccLightningData_Index_1` (`LightningDataID`),
  KEY `FK_tAccLightningData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tacclightningdata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccnarrative`
--

CREATE TABLE IF NOT EXISTS `taccnarrative` (
  `AccIWID` bigint(20) default '-1',
  `AccNarrative` text collate utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `taccnarrative`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccnotes`
--

CREATE TABLE IF NOT EXISTS `taccnotes` (
  `AccNotesID` bigint(20) NOT NULL auto_increment,
  `AccWID` bigint(20) default '-1',
  `NotesDate` date NOT NULL default '1900-01-01',
  `Notes` text collate utf8_unicode_ci,
  PRIMARY KEY  (`AccNotesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccnotes`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccotherdriver`
--

CREATE TABLE IF NOT EXISTS `taccotherdriver` (
  `OtherDrID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `HomeBaseID` bigint(20) default '-1',
  `SSN` varchar(11) collate utf8_unicode_ci default '',
  `FirstName` varchar(15) collate utf8_unicode_ci default '',
  `LastName` varchar(15) collate utf8_unicode_ci default '',
  `MiddleName` varchar(15) collate utf8_unicode_ci default '',
  `BirthName` varchar(15) collate utf8_unicode_ci default '',
  `StreetAddress` varchar(30) collate utf8_unicode_ci default '',
  `CityAddress` varchar(20) collate utf8_unicode_ci default '',
  `StateAddress` varchar(5) collate utf8_unicode_ci default '',
  `ZIPAddress` varchar(6) collate utf8_unicode_ci default '',
  `CDLNumber` varchar(15) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `Class` varchar(5) collate utf8_unicode_ci default '',
  `Injured` varchar(3) collate utf8_unicode_ci default '',
  `InjuryDescription` varchar(200) collate utf8_unicode_ci default '',
  `killed` varchar(3) collate utf8_unicode_ci default '',
  `HomePhone` varchar(15) collate utf8_unicode_ci default '',
  `BusinessPhone` varchar(15) collate utf8_unicode_ci default '',
  `InsuranceCarier` varchar(30) collate utf8_unicode_ci default '',
  `InsPolicy` varchar(20) collate utf8_unicode_ci default '',
  `TravDirection` varchar(3) collate utf8_unicode_ci default '',
  `OnStreet` varchar(30) collate utf8_unicode_ci default '',
  `Speed` varchar(3) collate utf8_unicode_ci default '',
  `SpeedMax` varchar(3) collate utf8_unicode_ci default '',
  `Sex` varchar(7) collate utf8_unicode_ci default '',
  `HairColor` varchar(10) collate utf8_unicode_ci default '',
  `Eyes` varchar(10) collate utf8_unicode_ci default '',
  `HeightFeet` varchar(3) collate utf8_unicode_ci default '',
  `HeightInch` varchar(3) collate utf8_unicode_ci default '',
  `Weight` varchar(3) collate utf8_unicode_ci default '',
  `NumberOfPassanger` varchar(2) collate utf8_unicode_ci default '',
  `DOB` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`OtherDrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccotherdriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccothermovement`
--

CREATE TABLE IF NOT EXISTS `taccothermovement` (
  `OtherMovID` bigint(20) NOT NULL auto_increment,
  `OtherDrID` bigint(20) default '-1',
  `Stopped` tinyint(4) default '0',
  `ProceedingStraight` tinyint(4) default '0',
  `RunOffRoadway` tinyint(4) default '0',
  `MakingRightTurn` tinyint(4) default '0',
  `MakingLeftTurn` tinyint(4) default '0',
  `MakingUTurn` tinyint(4) default '0',
  `Backing` tinyint(4) default '0',
  `Slowing` tinyint(4) default '0',
  `Stopping` tinyint(4) default '0',
  `Passing` tinyint(4) default '0',
  `ChangingLanes` tinyint(4) default '0',
  `Parking` tinyint(4) default '0',
  `EnteringTraffic` tinyint(4) default '0',
  `UnsafeTurning` tinyint(4) default '0',
  `Parked` tinyint(4) default '0',
  `Merging` tinyint(4) default '0',
  `WrongWay` tinyint(4) default '0',
  `Other` text collate utf8_unicode_ci,
  PRIMARY KEY  (`OtherMovID`),
  KEY `FK_tAccOtherMovement_tAccOtherDriver` (`OtherDrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccothermovement`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccothervehicle`
--

CREATE TABLE IF NOT EXISTS `taccothervehicle` (
  `AccOtherVehicleID` bigint(20) NOT NULL auto_increment,
  `OtherDrID` bigint(20) NOT NULL,
  `HomeBaseID` bigint(20) default '-1',
  `AccIWID` bigint(20) NOT NULL,
  `Make` varchar(20) collate utf8_unicode_ci default '',
  `Model` varchar(20) collate utf8_unicode_ci default '',
  `Color` varchar(20) collate utf8_unicode_ci default '',
  `ProdYear` varchar(5) collate utf8_unicode_ci default '',
  `LicPlate` varchar(15) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `OwnersFirstName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersLastName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersMiddleName` varchar(20) collate utf8_unicode_ci default '',
  `OwnersStreetAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersCityAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersStateAddress` varchar(20) collate utf8_unicode_ci default '',
  `OwnersZIPAddress` varchar(5) collate utf8_unicode_ci default '',
  `VIN` varchar(25) collate utf8_unicode_ci default '',
  `Towed` varchar(50) collate utf8_unicode_ci default '',
  `DOT` varchar(10) collate utf8_unicode_ci default '',
  `Damage` text collate utf8_unicode_ci,
  `PhotoTaken` varchar(3) collate utf8_unicode_ci default '',
  `InsCompany` varchar(30) collate utf8_unicode_ci default '',
  `InsPolicyNum` varchar(30) collate utf8_unicode_ci default '',
  `InsExpDate` date NOT NULL default '1900-01-01',
  `VehicleValue` bigint(20) default '0',
  `DamageEstimate` bigint(20) default '0',
  PRIMARY KEY  (`AccOtherVehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccothervehicle`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccpassanger`
--

CREATE TABLE IF NOT EXISTS `taccpassanger` (
  `PassangerID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `SSN` varchar(15) collate utf8_unicode_ci NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DOB` datetime NOT NULL,
  `FirstName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `MiddleName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `StreetAddress` varchar(20) collate utf8_unicode_ci NOT NULL,
  `CityAddress` varchar(20) collate utf8_unicode_ci NOT NULL,
  `StateAddress` varchar(3) collate utf8_unicode_ci NOT NULL,
  `ZIPAddress` varchar(8) collate utf8_unicode_ci NOT NULL,
  `CDLNumber` varchar(30) collate utf8_unicode_ci NOT NULL,
  `State` varchar(5) collate utf8_unicode_ci NOT NULL,
  `Injured` varchar(5) collate utf8_unicode_ci NOT NULL,
  `InjuryDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `killed` varchar(5) collate utf8_unicode_ci NOT NULL,
  `HomePhone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `BusinessPhone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Sex` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HairColor` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Eyes` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Height` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Weight` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`PassangerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccpassanger`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccradwaydata`
--

CREATE TABLE IF NOT EXISTS `taccradwaydata` (
  `RoadwayDataID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `Oneway` varchar(3) collate utf8_unicode_ci default '',
  `Twoway` varchar(3) collate utf8_unicode_ci default '',
  `TwoLane` varchar(3) collate utf8_unicode_ci default '',
  `ThreeLane` varchar(3) collate utf8_unicode_ci default '',
  `FourLane` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(200) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`RoadwayDataID`),
  KEY `FK_tAccRadwayData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccradwaydata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccroadconddata`
--

CREATE TABLE IF NOT EXISTS `taccroadconddata` (
  `RoadCondID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `Holes` varchar(3) collate utf8_unicode_ci default '',
  `LooseMaterial` varchar(3) collate utf8_unicode_ci default '-1',
  `Obstruction` varchar(3) collate utf8_unicode_ci default '',
  `Construction` varchar(3) collate utf8_unicode_ci default '',
  `ReducedRoadway` varchar(3) collate utf8_unicode_ci default '',
  `Flooded` varchar(3) collate utf8_unicode_ci default '',
  `NoUnusual` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`RoadCondID`),
  KEY `FK_tAccRoadCondData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccroadconddata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccsurfacedata`
--

CREATE TABLE IF NOT EXISTS `taccsurfacedata` (
  `SurfaceDataID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `Dry` varchar(3) collate utf8_unicode_ci default '',
  `Wet` varchar(3) collate utf8_unicode_ci default '',
  `Snow` varchar(3) collate utf8_unicode_ci default '',
  `Icy` varchar(3) collate utf8_unicode_ci default '',
  `Muddy` varchar(3) collate utf8_unicode_ci default '',
  `Oily` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`SurfaceDataID`),
  KEY `FK_tAccSurfaceData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccsurfacedata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tacctraficcontrol`
--

CREATE TABLE IF NOT EXISTS `tacctraficcontrol` (
  `TraficControlDataID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `Functioning` varchar(3) collate utf8_unicode_ci default '',
  `NotFunctioning` varchar(3) collate utf8_unicode_ci default '',
  `NoControl` varchar(3) collate utf8_unicode_ci default '',
  `Obscured` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`TraficControlDataID`),
  KEY `FK_tAccTraficControl_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tacctraficcontrol`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tacctraficdata`
--

CREATE TABLE IF NOT EXISTS `tacctraficdata` (
  `TrafficDataID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `Light` varchar(3) collate utf8_unicode_ci default '',
  `Heavy` varchar(3) collate utf8_unicode_ci default '',
  `Medium` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`TrafficDataID`),
  KEY `FK_tAccTraficData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tacctraficdata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tacctypeofcollison`
--

CREATE TABLE IF NOT EXISTS `tacctypeofcollison` (
  `TypeOfCollisionID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `HeadOn` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Sideswipe` varchar(3) collate utf8_unicode_ci NOT NULL,
  `RearEnd` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Broadside` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Overturned` varchar(3) collate utf8_unicode_ci NOT NULL,
  `HitObject` varchar(3) collate utf8_unicode_ci NOT NULL,
  `VehiclePedestrian` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Other` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`TypeOfCollisionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tacctypeofcollison`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccweatherdata`
--

CREATE TABLE IF NOT EXISTS `taccweatherdata` (
  `WeatherID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) default '-1',
  `ClearW` varchar(3) collate utf8_unicode_ci default '',
  `Cloudy` varchar(3) collate utf8_unicode_ci default '',
  `Raining` varchar(3) collate utf8_unicode_ci default '',
  `Snowing` varchar(3) collate utf8_unicode_ci default '',
  `Fog` varchar(3) collate utf8_unicode_ci default '',
  `Wind` varchar(3) collate utf8_unicode_ci default '',
  `Other` varchar(30) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`WeatherID`),
  KEY `FK_tAccWatherData_tAccIW` (`AccIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccweatherdata`
--


-- --------------------------------------------------------

--
-- Структура таблицы `taccwitness`
--

CREATE TABLE IF NOT EXISTS `taccwitness` (
  `WitnessID` bigint(20) NOT NULL auto_increment,
  `AccIWID` bigint(20) NOT NULL,
  `FirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MIddleName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Street` varchar(20) collate utf8_unicode_ci NOT NULL,
  `City` varchar(20) collate utf8_unicode_ci NOT NULL,
  `State` varchar(3) collate utf8_unicode_ci NOT NULL,
  `ZIP` varchar(7) collate utf8_unicode_ci NOT NULL,
  `Injured` varchar(5) collate utf8_unicode_ci NOT NULL,
  `InjuryDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `Killed` varchar(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`WitnessID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `taccwitness`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tactiondriver`
--

CREATE TABLE IF NOT EXISTS `tactiondriver` (
  `ActionDriverID` bigint(20) NOT NULL auto_increment,
  `HomeBaseID` bigint(20) default '-1',
  `DIWID` bigint(20) default '-1',
  `ActionType` varchar(15) collate utf8_unicode_ci default '',
  `Status` varchar(15) collate utf8_unicode_ci default '',
  `FromDate` date NOT NULL default '1900-01-01',
  `ValidForDays` tinyint(4) default '1',
  `ValidForMin` tinyint(4) default '90',
  `StartDateTime` date NOT NULL default '1900-01-01',
  `EndDateTime` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `CreatedByUserID` bigint(20) default '-1',
  PRIMARY KEY  (`ActionDriverID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tactiondriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tactionsystem`
--

CREATE TABLE IF NOT EXISTS `tactionsystem` (
  `ActionSystemID` bigint(20) NOT NULL auto_increment,
  `ActionType` varchar(15) collate utf8_unicode_ci default '',
  `ActionDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ToHomeBaseID` bigint(20) default '-1',
  `ToUserID` bigint(20) default '-1',
  `Confirmed` tinyint(4) default '0',
  PRIMARY KEY  (`ActionSystemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tactionsystem`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tactionsystemforfile`
--

CREATE TABLE IF NOT EXISTS `tactionsystemforfile` (
  `ActionSystemForFileID` bigint(20) NOT NULL auto_increment,
  `ActionSystemID` bigint(20) default '-1',
  `FileID` bigint(20) default '-1',
  `DIWID` bigint(20) default '-1',
  `ExpType` varchar(20) collate utf8_unicode_ci default '',
  `Expires` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ActionType` varchar(15) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`ActionSystemForFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tactionsystemforfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tactionuser`
--

CREATE TABLE IF NOT EXISTS `tactionuser` (
  `ActionUserID` bigint(20) NOT NULL auto_increment,
  `HomeBaseID` bigint(20) default '-1',
  `ActionType` varchar(100) collate utf8_unicode_ci default '',
  `ActionDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ActionOn` varchar(20) collate utf8_unicode_ci default '',
  `OnID` bigint(20) default '-1',
  `ByName` varchar(50) collate utf8_unicode_ci default '',
  `ByUserID` bigint(20) default '-1',
  `Parameters` text collate utf8_unicode_ci,
  `Comment` text collate utf8_unicode_ci,
  PRIMARY KEY  (`ActionUserID`),
  UNIQUE KEY `tActionUser2` (`ActionType`,`OnID`),
  UNIQUE KEY `tActionUser3` (`ActionType`,`ActionDate`,`OnID`),
  KEY `tActionUser9` (`OnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tactionuser`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tappcheck`
--

CREATE TABLE IF NOT EXISTS `tappcheck` (
  `AppCheckID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `CheckReview` tinyint(1) default '0',
  `CheckPrintForms` tinyint(1) default '0',
  `CheckScanAllForms` tinyint(1) default '0',
  `CheckSignature` tinyint(1) default '0',
  `CheckPicture` tinyint(1) default '0',
  `CheckScan` tinyint(1) default '0',
  `CheckAutoFax` tinyint(1) default '0',
  PRIMARY KEY  (`AppCheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tappcheck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tcompany`
--

CREATE TABLE IF NOT EXISTS `tcompany` (
  `CompanyID` bigint(20) NOT NULL auto_increment,
  `CompanyName` varchar(100) collate utf8_unicode_ci default '',
  `CompanyCode` varchar(20) collate utf8_unicode_ci default '',
  `Address` varchar(100) collate utf8_unicode_ci default '',
  `City` varchar(50) collate utf8_unicode_ci default '',
  `State` varchar(2) collate utf8_unicode_ci default '',
  `Zip` varchar(20) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Fax` varchar(30) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `P1FirstName` varchar(50) collate utf8_unicode_ci default '',
  `P1LastName` varchar(50) collate utf8_unicode_ci default '',
  `P1Title` varchar(50) collate utf8_unicode_ci default '',
  `P1Telephone` varchar(30) collate utf8_unicode_ci default '',
  `P1Email` varchar(100) collate utf8_unicode_ci default '',
  `P1Role` varchar(30) collate utf8_unicode_ci default '',
  `P1Status` varchar(10) collate utf8_unicode_ci default '',
  `Url` varchar(100) collate utf8_unicode_ci default 'https://www.driverqualificationonline.com/nschanson',
  PRIMARY KEY  (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tcompany`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tcompanydoc`
--

CREATE TABLE IF NOT EXISTS `tcompanydoc` (
  `DocID` bigint(20) NOT NULL,
  `DocType` varchar(30) collate utf8_unicode_ci default '',
  `Category` varchar(30) collate utf8_unicode_ci default '',
  `DocTitle` varchar(100) collate utf8_unicode_ci default '',
  `DocCode` varchar(10) collate utf8_unicode_ci default '',
  `HasPDF` tinyint(1) default '0',
  `PDFFile` varchar(100) collate utf8_unicode_ci default '',
  `HasScan` tinyint(1) default '0',
  `Multiple` tinyint(1) NOT NULL default '0',
  `PageNum` tinyint(4) NOT NULL default '-1',
  PRIMARY KEY  (`DocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tcompanydoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tcompanydoclist`
--

CREATE TABLE IF NOT EXISTS `tcompanydoclist` (
  `CompanyDocID` bigint(20) NOT NULL auto_increment,
  `CompanyID` bigint(20) default '-1',
  `DocID` bigint(20) default '-1',
  `Status` varchar(15) collate utf8_unicode_ci default '',
  `Requested` date NOT NULL default '1900-01-01',
  `Completed` date NOT NULL default '1900-01-01',
  `ScanDateTime` datetime default NULL,
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `OtherTitle` varchar(200) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`CompanyDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tcompanydoclist`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tcstaff`
--

CREATE TABLE IF NOT EXISTS `tcstaff` (
  `CStaffID` bigint(20) NOT NULL auto_increment,
  `CompanyID` bigint(20) default '-1',
  `FirstName` varchar(50) collate utf8_unicode_ci default '',
  `LastName` varchar(50) collate utf8_unicode_ci default '',
  `Title` varchar(50) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Email` varchar(100) collate utf8_unicode_ci default '',
  `Role` varchar(30) collate utf8_unicode_ci default '',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `DQF` tinyint(1) default '1',
  `VIM` tinyint(1) default '1',
  `Accident` tinyint(1) default '1',
  PRIMARY KEY  (`CStaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tcstaff`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiw`
--

CREATE TABLE IF NOT EXISTS `tdiw` (
  `DIWID` bigint(20) NOT NULL auto_increment,
  `FileID` bigint(20) default '-1',
  `EntryDate` datetime NOT NULL COMMENT 'при обновлении - установить текущее время и дату',
  `AppDate` date NOT NULL default '1900-01-01',
  `AppType` varchar(15) collate utf8_unicode_ci default '',
  `AppNumber` varchar(20) collate utf8_unicode_ci default '',
  `DateOfHire` date NOT NULL default '1900-01-01',
  `TruckNumber` varchar(20) collate utf8_unicode_ci default '',
  `FirstName` varchar(20) collate utf8_unicode_ci default '',
  `LastName` varchar(20) collate utf8_unicode_ci default '',
  `MiddleName` varchar(20) collate utf8_unicode_ci default '',
  `BirthName` varchar(100) collate utf8_unicode_ci default '',
  `RANumber` varchar(20) collate utf8_unicode_ci default '',
  `RAExpDate` date NOT NULL default '1900-01-01',
  `MedNumber` varchar(20) collate utf8_unicode_ci default '',
  `MedExpDate` date NOT NULL default '1900-01-01',
  `MedExaminerName` varchar(50) collate utf8_unicode_ci default '',
  `StraightTruck` varchar(3) collate utf8_unicode_ci default 'No',
  `STFromDate` date NOT NULL default '1900-01-01',
  `STToDate` date NOT NULL default '1900-01-01',
  `STTotalMiles` varchar(10) collate utf8_unicode_ci default '',
  `TractorSemiTrailer` varchar(3) collate utf8_unicode_ci default 'No',
  `TSTFromDate` date NOT NULL default '1900-01-01',
  `TSTToDate` date NOT NULL default '1900-01-01',
  `TSTTotalMiles` varchar(10) collate utf8_unicode_ci default '',
  `DoublesTriples` varchar(3) collate utf8_unicode_ci default 'No',
  `DTFromDate` date NOT NULL default '1900-01-01',
  `DTToDate` date NOT NULL default '1900-01-01',
  `DTTotalMiles` varchar(10) collate utf8_unicode_ci default '',
  `Busses` varchar(3) collate utf8_unicode_ci default 'No',
  `BusFromDate` date NOT NULL default '1900-01-01',
  `BusToDate` date NOT NULL default '1900-01-01',
  `BusTotalMiles` varchar(10) collate utf8_unicode_ci default '',
  `Tankers` varchar(3) collate utf8_unicode_ci default 'No',
  `TanFromDate` date NOT NULL default '1900-01-01',
  `TanToDate` date NOT NULL default '1900-01-01',
  `TanTotalMiles` varchar(100) collate utf8_unicode_ci default '',
  `OtherEquip` varchar(3) collate utf8_unicode_ci default 'No',
  `OthFromDate` date NOT NULL default '1900-01-01',
  `OthToDate` date NOT NULL default '1900-01-01',
  `OthTotalMiles` varchar(10) collate utf8_unicode_ci default '',
  `OthDescribe` varchar(200) collate utf8_unicode_ci default '',
  `DeniedCDL` varchar(3) collate utf8_unicode_ci default '',
  `DeniedCDLExplain` varchar(200) collate utf8_unicode_ci default '',
  `SuspCDL` varchar(3) collate utf8_unicode_ci default '',
  `SuspCDLExplain` varchar(200) collate utf8_unicode_ci default '',
  `CopyStatus` varchar(15) collate utf8_unicode_ci default 'Incomplete',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `NoRA` tinyint(1) default '0',
  `NoAcc` tinyint(1) default '0',
  `NoViol` tinyint(1) default '0',
  `NoEmpl` tinyint(1) default '0',
  `DriverCode` varchar(30) collate utf8_unicode_ci default '',
  `TWICSerial` varchar(50) collate utf8_unicode_ci default '-1',
  `TWICExpDate` date NOT NULL default '1900-01-01',
  `NextelPhone` varchar(15) collate utf8_unicode_ci default '',
  `NextelPhoneSerial` varchar(20) collate utf8_unicode_ci default '',
  `RadioFrequency` varchar(15) collate utf8_unicode_ci default '',
  `RadioSerial` varchar(20) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DIWID`),
  KEY `tDIW6` (`FileID`,`DIWID`,`FirstName`,`LastName`,`RAExpDate`,`NoRA`),
  KEY `tDIW7` (`FileID`,`DIWID`,`FirstName`,`LastName`,`MedExpDate`),
  KEY `tDIW8` (`FileID`),
  KEY `tDIW88` (`DIWID`,`FileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiw`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwaccident`
--

CREATE TABLE IF NOT EXISTS `tdiwaccident` (
  `DIWAccidentID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `AccDate` date NOT NULL default '1900-01-01',
  `City` varchar(50) collate utf8_unicode_ci default '',
  `State` varchar(3) collate utf8_unicode_ci default '',
  `AccType` varchar(30) collate utf8_unicode_ci default '',
  `Fatalies` varchar(3) collate utf8_unicode_ci default '',
  `Injuries` varchar(3) collate utf8_unicode_ci default '',
  `OrderNo` tinyint(4) default '-1',
  PRIMARY KEY  (`DIWAccidentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwaccident`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwaddress`
--

CREATE TABLE IF NOT EXISTS `tdiwaddress` (
  `DIWAddressID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `Address` varchar(200) collate utf8_unicode_ci default '',
  `City` varchar(50) collate utf8_unicode_ci default '',
  `State` varchar(3) collate utf8_unicode_ci default '',
  `Zip` varchar(20) collate utf8_unicode_ci default '',
  `Phone` varchar(30) collate utf8_unicode_ci default '',
  `YearsAtAddress` varchar(2) collate utf8_unicode_ci default '',
  `MonthsAtAddress` varchar(2) collate utf8_unicode_ci default '',
  `FromDate` date NOT NULL default '1900-01-01',
  `CurrAddress` varchar(3) collate utf8_unicode_ci default 'No',
  PRIMARY KEY  (`DIWAddressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwaddress`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwcdl`
--

CREATE TABLE IF NOT EXISTS `tdiwcdl` (
  `DIWCDLID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `CDLNumber` varchar(20) collate utf8_unicode_ci default '',
  `State` varchar(3) collate utf8_unicode_ci default '',
  `Class` varchar(1) collate utf8_unicode_ci default '',
  `EndorP` varchar(3) collate utf8_unicode_ci default '',
  `EndorT` varchar(3) collate utf8_unicode_ci default '',
  `EndorH` varchar(3) collate utf8_unicode_ci default '',
  `EndorN` varchar(3) collate utf8_unicode_ci default '',
  `EndorX` varchar(3) collate utf8_unicode_ci default '',
  `AirBrakeRestriction` varchar(3) collate utf8_unicode_ci default '0',
  `Expires` date NOT NULL default '1900-01-01',
  `CDLCurrent` varchar(3) collate utf8_unicode_ci default '0',
  `OrderNo` tinyint(4) default '-1',
  PRIMARY KEY  (`DIWCDLID`),
  KEY `tDIWCDL7` (`DIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwcdl`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwdatasheet`
--

CREATE TABLE IF NOT EXISTS `tdiwdatasheet` (
  `DIWDataSheetID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `Date1` date NOT NULL default '1900-01-01',
  `Hours1` varchar(2) collate utf8_unicode_ci default '',
  `Date2` date NOT NULL default '1900-01-01',
  `Hours2` varchar(2) collate utf8_unicode_ci default '',
  `Date3` date NOT NULL default '1900-01-01',
  `Hours3` varchar(2) collate utf8_unicode_ci default '',
  `Date4` date NOT NULL default '1900-01-01',
  `Hours4` varchar(2) collate utf8_unicode_ci default '',
  `Date5` date NOT NULL default '1900-01-01',
  `Hours5` varchar(2) collate utf8_unicode_ci default '',
  `Date6` date NOT NULL default '1900-01-01',
  `Hours6` varchar(2) collate utf8_unicode_ci default '',
  `Date7` date NOT NULL default '1900-01-01',
  `Hours7` varchar(2) collate utf8_unicode_ci default '',
  `LastRelievedDate` date NOT NULL default '1900-01-01',
  `LastRelievedTime` varchar(10) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DIWDataSheetID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwdatasheet`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwemployer`
--

CREATE TABLE IF NOT EXISTS `tdiwemployer` (
  `DIWEmployerID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `Employer` varchar(200) collate utf8_unicode_ci default '',
  `Address` varchar(200) collate utf8_unicode_ci default '',
  `City` varchar(50) collate utf8_unicode_ci default '',
  `State` varchar(2) collate utf8_unicode_ci default '',
  `Zip` varchar(20) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Fax` varchar(30) collate utf8_unicode_ci default '',
  `Job` varchar(200) collate utf8_unicode_ci default '',
  `FromMonth` varchar(3) collate utf8_unicode_ci default '0',
  `FromYear` varchar(5) collate utf8_unicode_ci default '0',
  `ToMonth` varchar(3) collate utf8_unicode_ci default '0',
  `ToYear` varchar(5) collate utf8_unicode_ci default '0',
  `Reason` varchar(100) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DIWEmployerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwemployer`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwvehicle`
--

CREATE TABLE IF NOT EXISTS `tdiwvehicle` (
  `DIWVehicleID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `OwnerFirstName` varchar(20) collate utf8_unicode_ci default '',
  `OwnerLastName` varchar(20) collate utf8_unicode_ci default '',
  `VehicleType` varchar(30) collate utf8_unicode_ci default '',
  `NumberOfAxles` varchar(5) collate utf8_unicode_ci default '',
  `LicPlateNumber` varchar(20) collate utf8_unicode_ci default '',
  `VIN` varchar(30) collate utf8_unicode_ci default '',
  `RegExpDate` date NOT NULL default '1900-01-01',
  `ValueOfVehicle` varchar(15) collate utf8_unicode_ci default '',
  `InsCompany` varchar(100) collate utf8_unicode_ci default '',
  `InsPolicy` varchar(20) collate utf8_unicode_ci default '',
  `InsExpDate` date NOT NULL default '1900-01-01',
  `InsLimits` varchar(200) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DIWVehicleID`),
  KEY `tDIWVehicle13` (`RegExpDate`,`DIWID`),
  KEY `tDIWVehicle14` (`InsExpDate`,`DIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwvehicle`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdiwviolation`
--

CREATE TABLE IF NOT EXISTS `tdiwviolation` (
  `DIWViolationID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `ViolDate` date NOT NULL default '1900-01-01',
  `Location` varchar(50) collate utf8_unicode_ci default '',
  `Violation` varchar(50) collate utf8_unicode_ci default '',
  `Penalty` varchar(50) collate utf8_unicode_ci default '',
  `TypeOfVehicle` varchar(20) collate utf8_unicode_ci default '',
  `OrderNo` tinyint(4) default '-1',
  PRIMARY KEY  (`DIWViolationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdiwviolation`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdoc`
--

CREATE TABLE IF NOT EXISTS `tdoc` (
  `DocID` bigint(20) NOT NULL auto_increment,
  `DocType` varchar(10) collate utf8_unicode_ci default '',
  `Category` varchar(30) collate utf8_unicode_ci default '',
  `DocTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DocCode` varchar(10) collate utf8_unicode_ci default '',
  `HasPDF` tinyint(4) default '0',
  `PDFFile` varchar(100) collate utf8_unicode_ci default '',
  `HasScan` tinyint(4) default '0',
  `Multiple` tinyint(4) default '0',
  `ForEmployer` tinyint(4) default '0',
  `PageNum` tinyint(4) default '-1',
  `HasNSCCheck` tinyint(4) default '1',
  PRIMARY KEY  (`DocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdotinspections`
--

CREATE TABLE IF NOT EXISTS `tdotinspections` (
  `DOTInspectionID` bigint(20) NOT NULL auto_increment,
  `CompanyID` bigint(20) default '-1',
  `InspectionDate` date NOT NULL default '1900-01-01',
  `InspectionTime` varchar(15) collate utf8_unicode_ci default '',
  `RequestedByFName` varchar(20) collate utf8_unicode_ci default '',
  `RequestedByLName` varchar(20) collate utf8_unicode_ci default '',
  `Status` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DOTInspectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdotinspections`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfannualreview`
--

CREATE TABLE IF NOT EXISTS `tdqfannualreview` (
  `DQFAnnualReviewID` bigint(20) NOT NULL auto_increment,
  `DQFDocID` bigint(20) default '-1',
  `ReviewDate` date NOT NULL default '1900-01-01',
  `Qualified` tinyint(4) default '-1',
  `Name` varchar(50) collate utf8_unicode_ci default '',
  `Remarks` text collate utf8_unicode_ci,
  `ConfirmReview` tinyint(4) default '-1',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`DQFAnnualReviewID`),
  KEY `FK_tDQFAnnualReview_tDQFDoc` (`DQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdqfannualreview`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfdisq383`
--

CREATE TABLE IF NOT EXISTS `tdqfdisq383` (
  `DQFDisq383ID` bigint(20) NOT NULL auto_increment,
  `DQFDocID` bigint(20) default '-1',
  `AADate` varchar(10) collate utf8_unicode_ci default '',
  `BBDate` varchar(10) collate utf8_unicode_ci default '',
  `CCDate` varchar(10) collate utf8_unicode_ci default '',
  `DDDate` varchar(10) collate utf8_unicode_ci default '',
  `EEDate` varchar(10) collate utf8_unicode_ci default '',
  `FFDate` varchar(10) collate utf8_unicode_ci default '',
  `GGDate` varchar(10) collate utf8_unicode_ci default '',
  `ToName` varchar(50) collate utf8_unicode_ci default '',
  `NoticeDate` date NOT NULL default '1900-01-01',
  `Period` varchar(20) collate utf8_unicode_ci default '',
  `SuspCode` varchar(20) collate utf8_unicode_ci default '',
  `SuspFromDate` date NOT NULL default '1900-01-01',
  `SuspToDate` date NOT NULL default '1900-01-01',
  `TermCode` varchar(20) collate utf8_unicode_ci default '',
  `TermDate` date NOT NULL default '1900-01-01',
  `ByName` varchar(50) collate utf8_unicode_ci default '',
  `ByTitle` varchar(50) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`DQFDisq383ID`),
  KEY `FK_tDQFDisq383_tDQFDoc` (`DQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdqfdisq383`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfdisq391`
--

CREATE TABLE IF NOT EXISTS `tdqfdisq391` (
  `DQFDisq391ID` bigint(20) NOT NULL auto_increment,
  `DQFDocID` bigint(20) default '-1',
  `ADate` varchar(10) collate utf8_unicode_ci default '',
  `BDate` varchar(10) collate utf8_unicode_ci default '',
  `CDate` varchar(10) collate utf8_unicode_ci default '',
  `DDate` varchar(10) collate utf8_unicode_ci default '',
  `EDate` varchar(10) collate utf8_unicode_ci default '',
  `FDate` varchar(10) collate utf8_unicode_ci default '',
  `GDate` varchar(10) collate utf8_unicode_ci default '',
  `HDate` varchar(10) collate utf8_unicode_ci default '',
  `IDate` varchar(10) collate utf8_unicode_ci default '',
  `JDate` varchar(10) collate utf8_unicode_ci default '',
  `KDate` varchar(10) collate utf8_unicode_ci default '',
  `LDate` varchar(10) collate utf8_unicode_ci default '',
  `MDate` varchar(10) collate utf8_unicode_ci default '',
  `NDate` varchar(10) collate utf8_unicode_ci default '',
  `ODate` varchar(10) collate utf8_unicode_ci default '',
  `PRegulation` varchar(15) collate utf8_unicode_ci default '',
  `PDate` varchar(10) collate utf8_unicode_ci default '',
  `PDescription` varchar(200) collate utf8_unicode_ci default '',
  `QRegulation` varchar(15) collate utf8_unicode_ci default '',
  `QDate` varchar(10) collate utf8_unicode_ci default '',
  `QDescription` varchar(200) collate utf8_unicode_ci default '',
  `RRegulation` varchar(15) collate utf8_unicode_ci default '',
  `RDate` varchar(10) collate utf8_unicode_ci default '',
  `RDescription` varchar(200) collate utf8_unicode_ci default '',
  `SRegulation` varchar(15) collate utf8_unicode_ci default '',
  `SDate` varchar(10) collate utf8_unicode_ci default '',
  `SDescription` varchar(200) collate utf8_unicode_ci default '',
  `ToName` varchar(50) collate utf8_unicode_ci default '',
  `NoticeDate` date NOT NULL default '1900-01-01',
  `Period` varchar(20) collate utf8_unicode_ci default '',
  `SuspCode` varchar(20) collate utf8_unicode_ci default '',
  `SuspFromDate` date NOT NULL default '1900-01-01',
  `SuspToDate` date NOT NULL default '1900-01-01',
  `TermCode` varchar(20) collate utf8_unicode_ci default '',
  `TermDate` date NOT NULL default '1900-01-01',
  `ByName` varchar(50) collate utf8_unicode_ci default '',
  `ByTitle` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DQFDisq391ID`),
  KEY `FK_tDQFDisq391_tDQFDoc` (`DQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdqfdisq391`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfdoc`
--

CREATE TABLE IF NOT EXISTS `tdqfdoc` (
  `DQFDocID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `DocID` bigint(20) default '-1',
  `Status` varchar(50) collate utf8_unicode_ci default '',
  `Requested` date NOT NULL default '1900-01-01',
  `Completed` date NOT NULL default '1900-01-01',
  `DIWEmployerID` bigint(20) default '-1',
  `ScanDateTime` varchar(20) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `OtherTitle` varchar(200) collate utf8_unicode_ci default '',
  `RelatedTo` bigint(20) default '-1',
  PRIMARY KEY  (`DQFDocID`),
  KEY `tDQFDoc7` (`DQFDocID`,`DIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdqfdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfdocdotcheck`
--

CREATE TABLE IF NOT EXISTS `tdqfdocdotcheck` (
  `DOTCheckID` tinyint(4) NOT NULL auto_increment,
  `DQFDocID` tinyint(4) default '-1',
  `TruckQFDocID` tinyint(4) default '-1',
  `AccQFDocID` tinyint(4) default '-1',
  `DriverFileID` tinyint(4) default '-1',
  `AccFileID` tinyint(4) default '-1',
  `VehFileID` tinyint(4) default '-1',
  `CompanyID` tinyint(4) default '-1',
  `CompanyDocID` int(11) default '-1',
  `DOTCheckStatus` tinyint(4) default '0',
  `DOTCheckNote` text collate utf8_unicode_ci,
  `DOTCheckDate` date NOT NULL default '1900-01-01',
  `DOTCheckBy` varchar(30) collate utf8_unicode_ci default '',
  `DocStatus` varchar(10) collate utf8_unicode_ci default '',
  `DOTInspectionID` tinyint(4) default '-1',
  `DocTitle` varchar(50) collate utf8_unicode_ci default '',
  `HomeBaseID` tinyint(4) default '-1',
  `HBName` varchar(50) collate utf8_unicode_ci default '',
  `CompName` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DOTCheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdqfdocdotcheck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdqfdocnsccheck`
--

CREATE TABLE IF NOT EXISTS `tdqfdocnsccheck` (
  `NSCCheckID` tinyint(4) NOT NULL,
  `DQFDocID` tinyint(4) NOT NULL,
  `NSCCheckStatus` tinyint(4) NOT NULL,
  `NSCCheckNote` text collate utf8_unicode_ci NOT NULL,
  `NSCCheckDate` datetime NOT NULL,
  `NSCCheckBy` varchar(30) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`NSCCheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tdqfdocnsccheck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdriver`
--

CREATE TABLE IF NOT EXISTS `tdriver` (
  `DriverID` bigint(20) NOT NULL auto_increment,
  `SSN` varchar(11) collate utf8_unicode_ci default '',
  `DOB` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`DriverID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdriveraccount`
--

CREATE TABLE IF NOT EXISTS `tdriveraccount` (
  `DriverAccountID` bigint(20) NOT NULL auto_increment,
  `DIWID` bigint(20) default '-1',
  `AccountType` varchar(10) collate utf8_unicode_ci default '',
  `DQFDocID` int(11) default '-1',
  `StartTime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `Duration` tinyint(4) default '0',
  `Status` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`DriverAccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdriveraccount`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdriverscrosssection`
--

CREATE TABLE IF NOT EXISTS `tdriverscrosssection` (
  `CrossID` bigint(20) NOT NULL auto_increment,
  `HBID` tinyint(4) default '-1',
  `CompanyID` tinyint(4) default '-1',
  `DateCreated` date NOT NULL default '1900-01-01',
  `Pending` tinyint(4) default '-1',
  `Applicant` tinyint(4) default '-1',
  `Hired` tinyint(4) default '-1',
  `HiredActive` tinyint(4) default '-1',
  `HiredInactive` tinyint(4) default '-1',
  `Declined` tinyint(4) default '-1',
  `Denied` tinyint(4) default '-1',
  `Terminated` tinyint(4) default '-1',
  `NoComplDrivers` int(11) default '-1',
  `NoComplItems` int(11) default '-1',
  `NoComplDriversByNSC` int(11) default '-1',
  `NoComplItemsByNSC` int(11) default '-1',
  PRIMARY KEY  (`CrossID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdriverscrosssection`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tdriversnoncomplientitemsum`
--

CREATE TABLE IF NOT EXISTS `tdriversnoncomplientitemsum` (
  `NoncompID` int(11) NOT NULL auto_increment,
  `DateCreated` date NOT NULL default '1900-01-01',
  `HBID` tinyint(4) default '-1',
  `CompanyID` tinyint(4) default '-1',
  `CDLExpired` tinyint(4) default '-1',
  `RAExpired` tinyint(4) default '-1',
  `MDExpired` tinyint(4) default '-1',
  `AnRevExpired` tinyint(4) default '-1',
  `RecViolExpired` tinyint(4) default '-1',
  `MissCreatedNeverScanned` tinyint(4) default '-1',
  `MissRequiredFormDocument` tinyint(4) default '-1',
  `MissingRA` tinyint(4) default '-1',
  `MissingPrevEmploy` tinyint(4) default '-1',
  `MissingRADIWData` tinyint(4) default '-1',
  `MissingMDDIWData` tinyint(4) default '-1',
  `MissingAddressDIWData` tinyint(4) default '-1',
  `MissingCDLDIWData` tinyint(4) default '-1',
  `MissingPrevEmplLDIWData` tinyint(4) default '-1',
  `MissingAccDIWData` tinyint(4) default '-1',
  `MissingViolDIWData` tinyint(4) default '-1',
  `MissingVehDIWData` tinyint(4) default '-1',
  `MissRequiredFormDocumentForVeh` tinyint(4) default '-1',
  `VehInsExpired` tinyint(4) default '-1',
  `VehRegExpired` tinyint(4) default '-1',
  PRIMARY KEY  (`NoncompID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tdriversnoncomplientitemsum`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tfaxrequest`
--

CREATE TABLE IF NOT EXISTS `tfaxrequest` (
  `FaxRequestID` bigint(20) NOT NULL auto_increment,
  `DQFDocID` int(11) default '-1',
  `RequestDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `RequestByUserID` int(11) default '-1',
  `SubmitDate` datetime default NULL,
  `SubmitByUserID` int(11) default '-1',
  `Status` varchar(50) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`FaxRequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tfaxrequest`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tfile`
--

CREATE TABLE IF NOT EXISTS `tfile` (
  `FileID` bigint(20) NOT NULL auto_increment,
  `DriverID` int(11) default '-1',
  `HomeBaseID` int(11) default '-1',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `TerminationDate` date NOT NULL default '1900-01-01',
  `NSCCheck` tinyint(4) default '0',
  `NSCCheckAction` varchar(50) collate utf8_unicode_ci default '',
  `VendorID` int(11) default '-1',
  `ActiveStatus` varchar(10) collate utf8_unicode_ci default 'Active',
  `DOTCheck` tinyint(4) default '0',
  `LocationID` tinyint(4) default '-1',
  PRIMARY KEY  (`FileID`),
  KEY `tFile8` (`FileID`,`DriverID`,`HomeBaseID`,`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `thbstaff`
--

CREATE TABLE IF NOT EXISTS `thbstaff` (
  `HBStaffID` bigint(20) NOT NULL auto_increment,
  `HomeBaseID` int(11) default '-1',
  `FirstName` varchar(20) collate utf8_unicode_ci default '',
  `LastName` varchar(20) collate utf8_unicode_ci default '',
  `Title` varchar(50) collate utf8_unicode_ci default '',
  `Role` varchar(20) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Email` varchar(100) collate utf8_unicode_ci default '',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `CreatedByUserID` int(11) default '-1',
  `DQF` tinyint(4) default '1',
  `VIM` tinyint(4) default '1',
  `Accident` tinyint(4) default '1',
  PRIMARY KEY  (`HBStaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `thbstaff`
--


-- --------------------------------------------------------

--
-- Структура таблицы `thomebase`
--

CREATE TABLE IF NOT EXISTS `thomebase` (
  `HomeBaseID` bigint(20) NOT NULL auto_increment,
  `CompanyID` int(11) default '-1',
  `HomeBaseName` varchar(100) collate utf8_unicode_ci default '',
  `HomeBaseCode` varchar(20) collate utf8_unicode_ci default '',
  `Address` varchar(100) collate utf8_unicode_ci default '',
  `City` varchar(50) collate utf8_unicode_ci default '',
  `State` varchar(2) collate utf8_unicode_ci default '',
  `Zip` varchar(20) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Fax` varchar(30) collate utf8_unicode_ci default '',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `StartDate` timestamp NOT NULL default '0000-00-00 00:00:00',
  `Created` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `Url` varchar(100) collate utf8_unicode_ci default 'https://www.driverqualificationonline.com/nschanson',
  `DQFModul` varchar(3) collate utf8_unicode_ci default 'Yes',
  `TruckModul` varchar(3) collate utf8_unicode_ci default 'No',
  `NewDriverRate` double default '65',
  `MonthlyDriverRate` double default '2.5',
  `NewVehicleRate` double default '19.95',
  `MonthlyVehicleRate` double default '1.65',
  `RenewDriverRate` double default '0',
  `NewTruckRate` double default '19.95',
  `MonthlyTruckRate` double default '1.65',
  PRIMARY KEY  (`HomeBaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `thomebase`
--


-- --------------------------------------------------------

--
-- Структура таблицы `thomebaselocations`
--

CREATE TABLE IF NOT EXISTS `thomebaselocations` (
  `LocationID` tinyint(4) NOT NULL auto_increment,
  `HomeBaseID` tinyint(4) NOT NULL,
  `CompanyID` tinyint(4) NOT NULL,
  `LocationCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationDistrict` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationAddress` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationCity` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationState` varchar(3) collate utf8_unicode_ci NOT NULL,
  `LocationZIP` varchar(10) collate utf8_unicode_ci NOT NULL,
  `MngFirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MngLastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `MngEmail` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationPhone` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationFax` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LocationCell` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`LocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `thomebaselocations`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tinvoice`
--

CREATE TABLE IF NOT EXISTS `tinvoice` (
  `InvoiceID` bigint(20) NOT NULL auto_increment,
  `InvoiceForHBID` int(11) default '-1',
  `FileID` int(11) default '-1',
  `InvoiceType` varchar(20) collate utf8_unicode_ci default '',
  `InvoiceDate` date NOT NULL default '1900-01-01',
  `Name` varchar(50) collate utf8_unicode_ci default '',
  `ForYear` varchar(4) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ByUserID` int(11) default '-1',
  PRIMARY KEY  (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tinvoice`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tinvoiceforhb`
--

CREATE TABLE IF NOT EXISTS `tinvoiceforhb` (
  `InvoiceForHBID` bigint(20) NOT NULL auto_increment,
  `HomeBaseID` int(11) default '-1',
  `InvoiceType` varchar(20) collate utf8_unicode_ci default '',
  `InvoiceDate` date NOT NULL default '1900-01-01',
  `Rate` double default '65',
  PRIMARY KEY  (`InvoiceForHBID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tinvoiceforhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tinvoicetruck`
--

CREATE TABLE IF NOT EXISTS `tinvoicetruck` (
  `InvoiceID` bigint(20) NOT NULL auto_increment,
  `InvoiceForHBID` int(11) default '-1',
  `TruckFileID` int(11) default '-1',
  `InvoiceType` varchar(20) collate utf8_unicode_ci default '',
  `InvoiceDate` date NOT NULL default '1900-01-01',
  `Name` varchar(50) collate utf8_unicode_ci default '',
  `ForYear` varchar(4) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ByUserID` int(11) default '-1',
  PRIMARY KEY  (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tinvoicetruck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tinvoicetruckforhb`
--

CREATE TABLE IF NOT EXISTS `tinvoicetruckforhb` (
  `InvoiceForHBID` bigint(20) NOT NULL auto_increment,
  `HomeBaseID` int(11) default '-1',
  `InvoiceType` varchar(20) collate utf8_unicode_ci default '',
  `InvoiceDate` date NOT NULL default '1900-01-01',
  `Rate` double default '0',
  PRIMARY KEY  (`InvoiceForHBID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tinvoicetruckforhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tloginurl`
--

CREATE TABLE IF NOT EXISTS `tloginurl` (
  `LoginID` tinyint(4) NOT NULL auto_increment,
  `CompanyCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `HBCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LoginUrl` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`LoginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tloginurl`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tmerror`
--

CREATE TABLE IF NOT EXISTS `tmerror` (
  `ErrorID` bigint(20) NOT NULL auto_increment,
  `SessionID` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ModuleName` varchar(500) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `ErrorType` tinyint(4) NOT NULL,
  `SystemMsg` varchar(5000) collate utf8_unicode_ci NOT NULL,
  `CustomerMsg` varchar(800) collate utf8_unicode_ci NOT NULL,
  `ActionType` varchar(50) collate utf8_unicode_ci NOT NULL default '1',
  PRIMARY KEY  (`ErrorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tmerror`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tnscstaff`
--

CREATE TABLE IF NOT EXISTS `tnscstaff` (
  `NSCStaffID` bigint(20) NOT NULL auto_increment,
  `FirstName` varchar(20) collate utf8_unicode_ci default '',
  `LastName` varchar(20) collate utf8_unicode_ci default '',
  `Title` varchar(50) collate utf8_unicode_ci default '',
  `Telephone` varchar(30) collate utf8_unicode_ci default '',
  `Email` varchar(100) collate utf8_unicode_ci default '',
  `Role` varchar(20) collate utf8_unicode_ci default '0',
  `Status` varchar(10) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `CreatedByUserID` int(11) default '-1',
  PRIMARY KEY  (`NSCStaffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tnscstaff`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tsession`
--

CREATE TABLE IF NOT EXISTS `tsession` (
  `SID` bigint(20) NOT NULL,
  `RID` varchar(12) collate utf8_unicode_ci NOT NULL,
  `UserID` int(11) default '-1',
  `CurrentHBID` int(11) default '-1',
  `LastClickTime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `StartTime` timestamp NOT NULL default '0000-00-00 00:00:00',
  `SessionStatus` tinyint(4) default '-1',
  `CurrentCompanyID` int(11) default '-1',
  UNIQUE KEY `SID` (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tsession`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tsetup`
--

CREATE TABLE IF NOT EXISTS `tsetup` (
  `SetupID` bigint(20) NOT NULL auto_increment,
  `ParentID` bigint(20) NOT NULL,
  `SetupName` varchar(50) collate utf8_unicode_ci default '',
  `Status` tinyint(4) NOT NULL,
  `Code` varchar(20) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`SetupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tsetup`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttiw`
--

CREATE TABLE IF NOT EXISTS `ttiw` (
  `TIWID` int(11) NOT NULL auto_increment,
  `TruckFileID` int(11) default '-1',
  `TruckVendorID` int(11) default '-1',
  `EntryDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `DateOfHire` date NOT NULL default '1900-01-01',
  `AppDate` date NOT NULL default '1900-01-01',
  `AppNumber` varchar(20) collate utf8_unicode_ci default '',
  `VehType` varchar(20) collate utf8_unicode_ci default '',
  `UnitNumber` varchar(25) collate utf8_unicode_ci default '',
  `Year` varchar(10) collate utf8_unicode_ci default '',
  `Make` varchar(20) collate utf8_unicode_ci default '',
  `Model` varchar(20) collate utf8_unicode_ci default '',
  `Color` varchar(15) collate utf8_unicode_ci default '',
  `UnladenWeight` varchar(9) collate utf8_unicode_ci default '0',
  `GVW` varchar(9) collate utf8_unicode_ci default '0',
  `NumOfAxles` varchar(10) collate utf8_unicode_ci default '',
  `LicPlateNum` varchar(20) collate utf8_unicode_ci default '',
  `RegState` varchar(20) collate utf8_unicode_ci default '',
  `RegExpDate` date NOT NULL default '1900-01-01',
  `VehicleValue` int(11) default '0',
  `LastEvaluationDate` date NOT NULL default '1900-01-01',
  `InsCompany` varchar(30) collate utf8_unicode_ci default '',
  `InsPolicyNum` varchar(30) collate utf8_unicode_ci default '',
  `InsExpDate` date NOT NULL default '1900-01-01',
  `AppType` varchar(10) collate utf8_unicode_ci default '',
  `InsLimits` int(11) default '0',
  `NSCCheck` varchar(3) collate utf8_unicode_ci default 'No',
  `RFID` varchar(15) collate utf8_unicode_ci default '',
  `ProfitCN` varchar(15) collate utf8_unicode_ci default '',
  `ProfitCNLocation` varchar(30) collate utf8_unicode_ci default '',
  `OwningCompany` varchar(50) collate utf8_unicode_ci default '',
  `IRP` varchar(20) collate utf8_unicode_ci default '',
  `IFTASticker` varchar(20) collate utf8_unicode_ci default '',
  `Weight2290` varchar(10) collate utf8_unicode_ci default '',
  `TitleStatus` varchar(20) collate utf8_unicode_ci default 'Corporate',
  `GVRW` int(11) default '0',
  `HUT` varchar(10) collate utf8_unicode_ci default 'No',
  `IFTAStickerExpDate` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`TIWID`),
  UNIQUE KEY `IX_tTIW` (`TIWID`),
  UNIQUE KEY `IX_tTIW_1` (`TIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttiw`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttiwbitinspection`
--

CREATE TABLE IF NOT EXISTS `ttiwbitinspection` (
  `TIWBITInspID` tinyint(4) NOT NULL auto_increment,
  `TIWID` int(11) default '-1',
  `InspectorName` varchar(30) collate utf8_unicode_ci default '',
  `InspCompany` varchar(100) collate utf8_unicode_ci default '',
  `Result` varchar(15) collate utf8_unicode_ci default '',
  `ShopNote` text collate utf8_unicode_ci,
  `BITExpDate` date NOT NULL default '1900-01-01',
  `ReinspectionDate` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `InspectionDate` date NOT NULL default '1900-01-01',
  `InspectorNumber` varchar(15) collate utf8_unicode_ci default '',
  `InspectionFormNumber` varchar(25) collate utf8_unicode_ci default '',
  `InspectionType` varchar(10) collate utf8_unicode_ci default '',
  `DOTExpDate` date NOT NULL default '1900-01-01',
  `InspectorCertification` varchar(100) collate utf8_unicode_ci default '',
  `InspectorID` tinyint(4) default '-1',
  `InsCompanyID` tinyint(4) default '-1',
  PRIMARY KEY  (`TIWBITInspID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttiwbitinspection`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttiwdisinspection`
--

CREATE TABLE IF NOT EXISTS `ttiwdisinspection` (
  `TIWDISInspID` tinyint(4) NOT NULL auto_increment,
  `TIWID` int(11) default '-1',
  `InspectorName` varchar(30) collate utf8_unicode_ci default '',
  `InspCompany` varchar(100) collate utf8_unicode_ci default '',
  `Result` varchar(15) collate utf8_unicode_ci default '',
  `ShopNote` text collate utf8_unicode_ci,
  `DISExpDate` date NOT NULL default '1900-01-01',
  `ReinspectionDate` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `InspectionDate` date NOT NULL default '1900-01-01',
  `InspectorNumber` varchar(15) collate utf8_unicode_ci default '',
  `InspectionFormNumber` varchar(25) collate utf8_unicode_ci default '',
  `InspectionType` varchar(10) collate utf8_unicode_ci default '',
  `StickerNumber` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`TIWDISInspID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttiwdisinspection`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruck`
--

CREATE TABLE IF NOT EXISTS `ttruck` (
  `TruckID` bigint(20) NOT NULL auto_increment,
  `VIN` varchar(30) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`TruckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckactionsystem`
--

CREATE TABLE IF NOT EXISTS `ttruckactionsystem` (
  `ActionSystemID` bigint(20) NOT NULL auto_increment,
  `ActionType` varchar(15) collate utf8_unicode_ci default '',
  `ActionDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ToHomeBaseID` int(11) default '-1',
  `ToUserID` int(11) default '-1',
  `Confirmed` tinyint(4) default '0',
  PRIMARY KEY  (`ActionSystemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckactionsystem`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckactionsystemforfile`
--

CREATE TABLE IF NOT EXISTS `ttruckactionsystemforfile` (
  `ActionSystemForFileID` bigint(20) NOT NULL auto_increment,
  `ActionSystemID` int(11) default '-1',
  `TruckFileID` int(11) default '-1',
  `TIWID` int(11) default '-1',
  `ExpType` varchar(20) collate utf8_unicode_ci default '',
  `Expires` date NOT NULL default '1900-01-01',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `ActionType` varchar(15) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`ActionSystemForFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckactionsystemforfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckappcheck`
--

CREATE TABLE IF NOT EXISTS `ttruckappcheck` (
  `AppCheckID` tinyint(4) NOT NULL auto_increment,
  `TIWID` int(11) default '-1',
  `CheckReview` tinyint(1) default '0',
  `CheckBIT` tinyint(1) default '0',
  `CheckPicture` tinyint(1) default '0',
  `CheckReqDoc` tinyint(1) default '0',
  `CheckVehReg` tinyint(1) default '0',
  `CheckInsSert` tinyint(1) default '0',
  PRIMARY KEY  (`AppCheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckappcheck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckdoc`
--

CREATE TABLE IF NOT EXISTS `ttruckdoc` (
  `DocID` tinyint(4) NOT NULL auto_increment,
  `DocType` varchar(10) collate utf8_unicode_ci default '',
  `Category` varchar(30) collate utf8_unicode_ci default '',
  `DocTitle` varchar(100) collate utf8_unicode_ci default '',
  `DocCode` varchar(10) collate utf8_unicode_ci default '',
  `HasPDF` tinyint(4) default '0',
  `PDFFile` varchar(100) collate utf8_unicode_ci default '',
  `HasScan` tinyint(4) default '0',
  `Muitiple` tinyint(4) default '0',
  `PageNum` tinyint(4) default '-1',
  PRIMARY KEY  (`DocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckdriver`
--

CREATE TABLE IF NOT EXISTS `ttruckdriver` (
  `DriverID` int(11) default '-1',
  `TruckID` int(11) default '-1',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `HBID` int(11) default '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ttruckdriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckfile`
--

CREATE TABLE IF NOT EXISTS `ttruckfile` (
  `TruckFileID` bigint(20) NOT NULL auto_increment,
  `TruckID` bigint(20) NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TerminationDate` datetime NOT NULL,
  `VendorID` tinyint(4) NOT NULL,
  `DOTCheck` tinyint(4) NOT NULL,
  PRIMARY KEY  (`TruckFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckinspectioncompany`
--

CREATE TABLE IF NOT EXISTS `ttruckinspectioncompany` (
  `InsCompanyID` tinyint(4) NOT NULL auto_increment,
  `CompanyID` tinyint(4) NOT NULL,
  `HBID` tinyint(4) NOT NULL,
  `InsCompanyName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `InsCompanyAddress` varchar(100) collate utf8_unicode_ci NOT NULL,
  `InsCompanyCity` varchar(50) collate utf8_unicode_ci NOT NULL,
  `InsCompanyState` varchar(10) collate utf8_unicode_ci NOT NULL,
  `InsCompanyZIP` varchar(10) collate utf8_unicode_ci NOT NULL,
  `InsCompCreated` datetime NOT NULL,
  PRIMARY KEY  (`InsCompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckinspectioncompany`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckinspector`
--

CREATE TABLE IF NOT EXISTS `ttruckinspector` (
  `InspectorID` tinyint(4) NOT NULL auto_increment,
  `InsCompanyID` tinyint(4) default '-1',
  `InspectorFirstName` varchar(50) collate utf8_unicode_ci default '',
  `InspectorLastName` varchar(50) collate utf8_unicode_ci default '',
  `InspectorNumber` varchar(50) collate utf8_unicode_ci NOT NULL,
  `InspectorCreated` date NOT NULL default '1900-01-01',
  `InspectorCertificate` varchar(100) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`InspectorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckinspector`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckinspectorcertificate`
--

CREATE TABLE IF NOT EXISTS `ttruckinspectorcertificate` (
  `InspectorCertificateID` tinyint(4) NOT NULL auto_increment,
  `InspectorID` int(11) default '-1',
  `InspectorCertificate` varchar(100) collate utf8_unicode_ci default '',
  `InspectorCertificateCreated` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`InspectorCertificateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckinspectorcertificate`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckmaintenance`
--

CREATE TABLE IF NOT EXISTS `ttruckmaintenance` (
  `MaintenanceID` tinyint(4) NOT NULL auto_increment,
  `TIWID` int(11) default '-1',
  `RequestedDate` date NOT NULL default '1900-01-01',
  `CompletedDate` date NOT NULL default '1900-01-01',
  `NextMaintDate` date NOT NULL default '1900-01-01',
  `MaintNumber` varchar(20) collate utf8_unicode_ci default '',
  `Amount` int(11) default '0',
  `MaintCompany` varchar(30) collate utf8_unicode_ci default '',
  `MaintMonth` varchar(10) collate utf8_unicode_ci default '',
  `Notes` text collate utf8_unicode_ci,
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`MaintenanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckmaintenance`
--


-- --------------------------------------------------------

--
-- Структура таблицы `ttruckqfdoc`
--

CREATE TABLE IF NOT EXISTS `ttruckqfdoc` (
  `TruckQFDocID` bigint(20) NOT NULL auto_increment,
  `TIWID` int(11) default '-1',
  `DocID` int(11) default '-1',
  `Status` varchar(15) collate utf8_unicode_ci default '',
  `Requested` date NOT NULL default '1900-01-01',
  `Completed` date NOT NULL default '1900-01-01',
  `TIWBITInspID` int(11) default '-1',
  `ScanDateTime` varchar(20) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `OtherTitle` varchar(200) collate utf8_unicode_ci default '',
  `TIWDISInspID` int(11) default '-1',
  PRIMARY KEY  (`TruckQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `ttruckqfdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
  `UserID` int(11) NOT NULL auto_increment,
  `UserType` varchar(20) collate utf8_unicode_ci default '',
  `StaffID` int(11) default '-1',
  `HomeBaseID` int(11) default '-1',
  `CompanyID` tinyint(4) default '-1',
  `Username` varchar(20) collate utf8_unicode_ci default '',
  `Password` varchar(100) collate utf8_unicode_ci default '',
  `Agreed` tinyint(4) default '0',
  PRIMARY KEY  (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tuser`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendor`
--

CREATE TABLE IF NOT EXISTS `tvendor` (
  `VendorID` tinyint(4) NOT NULL auto_increment,
  `SSN` varchar(12) collate utf8_unicode_ci default '',
  `FederalID` varchar(20) collate utf8_unicode_ci default '',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`VendorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendor`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendorappcheck`
--

CREATE TABLE IF NOT EXISTS `tvendorappcheck` (
  `AppCheckID` tinyint(4) NOT NULL auto_increment,
  `VIWID` int(11) default '-1',
  `CheckReview` tinyint(1) default '0',
  `CheckContract` tinyint(1) default '0',
  PRIMARY KEY  (`AppCheckID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendorappcheck`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendorcontract`
--

CREATE TABLE IF NOT EXISTS `tvendorcontract` (
  `ContractID` tinyint(4) NOT NULL auto_increment,
  `VIWID` int(11) default '-1',
  `ContractNum` varchar(20) collate utf8_unicode_ci default '',
  `DateOfContractSign` date NOT NULL default '1900-01-01',
  `ExpDateContract` date NOT NULL default '1900-01-01',
  `ContractSign` varchar(10) collate utf8_unicode_ci default '',
  `ContractFileName` varchar(100) collate utf8_unicode_ci default '',
  `UnitNumber` varchar(25) collate utf8_unicode_ci default '',
  `TruckID` int(11) default '-1',
  PRIMARY KEY  (`ContractID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendorcontract`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendordoc`
--

CREATE TABLE IF NOT EXISTS `tvendordoc` (
  `DocID` tinyint(4) NOT NULL auto_increment,
  `DocType` varchar(10) collate utf8_unicode_ci default '',
  `Category` varchar(30) collate utf8_unicode_ci default '',
  `DocTitle` varchar(100) collate utf8_unicode_ci default '',
  `DocCode` varchar(10) collate utf8_unicode_ci default '',
  `HasPDF` tinyint(4) default '0',
  `PDFFile` varchar(100) collate utf8_unicode_ci default '',
  `HasScan` tinyint(4) default '0',
  `Multiple` tinyint(4) default '0',
  `PageNum` tinyint(4) default '-1',
  PRIMARY KEY  (`DocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendordoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendordriver`
--

CREATE TABLE IF NOT EXISTS `tvendordriver` (
  `VendDriverID` tinyint(4) NOT NULL auto_increment,
  `VendorID` int(11) default '-1',
  `DriverID` int(11) default '-1',
  `VendorCode` varchar(15) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`VendDriverID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendordriver`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendorfile`
--

CREATE TABLE IF NOT EXISTS `tvendorfile` (
  `VendorFileID` tinyint(4) NOT NULL auto_increment,
  `VendorID` int(11) default '-1',
  `HomeBaseID` int(11) default '-1',
  `Created` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `Status` varchar(15) collate utf8_unicode_ci default 'Inactive',
  `TerminationDate` date NOT NULL default '1900-01-01',
  PRIMARY KEY  (`VendorFileID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendorfile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tvendorqfdoc`
--

CREATE TABLE IF NOT EXISTS `tvendorqfdoc` (
  `VendorQFDocID` bigint(20) NOT NULL auto_increment,
  `VIWID` int(11) default '-1',
  `DocID` int(11) default '-1',
  `Status` varchar(15) collate utf8_unicode_ci default '',
  `Requested` date NOT NULL default '1900-01-01',
  `Completed` date NOT NULL default '1900-01-01',
  `ContractID` int(11) default '-1',
  `ScanDateTime` varchar(20) collate utf8_unicode_ci default '',
  `Created` date NOT NULL default '1900-01-01',
  `OtherTitle` varchar(100) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`VendorQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tvendorqfdoc`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tviw`
--

CREATE TABLE IF NOT EXISTS `tviw` (
  `VIWID` tinyint(4) NOT NULL auto_increment,
  `VendorFileID` tinyint(4) default '-1',
  `VendorCode` varchar(25) collate utf8_unicode_ci default '',
  `AppType` varchar(15) collate utf8_unicode_ci default '',
  `CompanyName` varchar(50) collate utf8_unicode_ci default '',
  `FirstName` varchar(20) collate utf8_unicode_ci default '',
  `LastName` varchar(20) collate utf8_unicode_ci default '',
  `Address` varchar(50) collate utf8_unicode_ci default '',
  `City` varchar(20) collate utf8_unicode_ci default '',
  `Zip` varchar(20) collate utf8_unicode_ci default '',
  `State` varchar(5) collate utf8_unicode_ci default '',
  `Phone` varchar(30) collate utf8_unicode_ci default '',
  `Fax` varchar(30) collate utf8_unicode_ci default '',
  `Email` varchar(100) collate utf8_unicode_ci default '',
  `EntryDate` date NOT NULL default '1900-01-01',
  `DateOfHire` date NOT NULL default '1900-01-01',
  `AppDate` date NOT NULL default '1900-01-01',
  `AppNumber` varchar(20) collate utf8_unicode_ci default '',
  PRIMARY KEY  (`VIWID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tviw`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vaccidentlistforallhb`
--

CREATE TABLE IF NOT EXISTS `vaccidentlistforallhb` (
  `AccidentID` bigint(20) NOT NULL,
  `AccDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `AccFileID` bigint(20) NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `AccIWID` bigint(20) NOT NULL,
  `City` varchar(30) collate utf8_unicode_ci NOT NULL,
  `State` varchar(4) collate utf8_unicode_ci NOT NULL,
  `FirstName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `EmployeeDrID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vaccidentlistforallhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vallhb`
--

CREATE TABLE IF NOT EXISTS `vallhb` (
  `CompanyID` bigint(20) NOT NULL,
  `CompanyName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `CompanyCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Address` varchar(100) collate utf8_unicode_ci NOT NULL,
  `City` varchar(50) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Zip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Fax` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `P1FirstName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `P1LastName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `P1Title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `P1Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `P1Email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `P1Role` varchar(30) collate utf8_unicode_ci NOT NULL,
  `P1Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HomeBaseID` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HomeBaseName` bigint(20) default NULL,
  `HomeBaseCode` varchar(100) collate utf8_unicode_ci default NULL,
  `HBAddress` varchar(20) collate utf8_unicode_ci default NULL,
  `HBCity` varchar(100) collate utf8_unicode_ci default NULL,
  `HBState` varchar(50) collate utf8_unicode_ci default NULL,
  `HBZip` varchar(2) collate utf8_unicode_ci default NULL,
  `HBTelephone` varchar(20) collate utf8_unicode_ci default NULL,
  `HBFax` varchar(30) collate utf8_unicode_ci default NULL,
  `HBStatus` varchar(30) collate utf8_unicode_ci default NULL,
  `HBStartDate` varchar(10) collate utf8_unicode_ci default NULL,
  `HBCreated` datetime default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vallhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vfiledoctypes`
--

CREATE TABLE IF NOT EXISTS `vfiledoctypes` (
  `DocID` bigint(20) NOT NULL,
  `FileID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vfiledoctypes`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlastannualreview`
--

CREATE TABLE IF NOT EXISTS `vlastannualreview` (
  `FileID` bigint(20) NOT NULL,
  `DQFDocID` bigint(20) NOT NULL,
  `DIWID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `DIWEmployerID` bigint(20) NOT NULL,
  `ScanDateTime` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(200) collate utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlastannualreview`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlastdiwforhbforarchives`
--

CREATE TABLE IF NOT EXISTS `vlastdiwforhbforarchives` (
  `DIWID` bigint(20) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlastdiwforhbforarchives`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlastrecordofviolations`
--

CREATE TABLE IF NOT EXISTS `vlastrecordofviolations` (
  `FileID` bigint(20) NOT NULL,
  `DQFDocID` bigint(20) NOT NULL,
  `DIWID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `DIWEmployerID` bigint(20) NOT NULL,
  `ScanDateTime` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(200) collate utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlastrecordofviolations`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlasttiwforhb`
--

CREATE TABLE IF NOT EXISTS `vlasttiwforhb` (
  `TIWID` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlasttiwforhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlastviwforhb`
--

CREATE TABLE IF NOT EXISTS `vlastviwforhb` (
  `VIWID` tinyint(4) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlastviwforhb`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vlastviwidforhb`
--

CREATE TABLE IF NOT EXISTS `vlastviwidforhb` (
  `VIWID` tinyint(4) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vlastviwidforhb`
--


--
-- Ограничения внешнего ключа сохраненных таблиц
--

