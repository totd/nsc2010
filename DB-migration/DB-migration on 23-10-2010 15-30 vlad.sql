

CREATE TABLE IF NOT EXISTS holddups (
	`DIWID` bigint NOT NULL ,
	`FileID` bigint NOT NULL ,
	`EntryDate` datetime NOT NULL ,
	`AppDate` datetime NOT NULL ,
	`AppType` varchar(15) COLLATE utf8_unicode_ci NOT NULL ,
	`AppNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`DateOfHire` datetime NOT NULL ,
	`TruckNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`LastName` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`MiddleName` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`BirthName` varchar(100) COLLATE utf8_unicode_ci NOT NULL ,
	`RANumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`RAExpDate` datetime NOT NULL ,
	`MedNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`MedExpDate` datetime NOT NULL ,
	`MedExaminerName` varchar(50) COLLATE utf8_unicode_ci NOT NULL ,
	`StraightTruck` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`STFromDate` datetime NOT NULL ,
	`STToDate` datetime NOT NULL ,
	`STTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`TractorSemiTrailer` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`TSTFromDate` datetime NOT NULL ,
	`TSTToDate` datetime NOT NULL ,
	`TSTTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`DoublesTriples` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`DTFromDate` datetime NOT NULL ,
	`DTToDate` datetime NOT NULL ,
	`DTTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`Busses` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`BusFromDate` datetime NOT NULL ,
	`BusToDate` datetime NOT NULL ,
	`BusTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`Tankers` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`TanFromDate` datetime NOT NULL ,
	`TanToDate` datetime NOT NULL ,
	`TanTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`OtherEquip` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`OthFromDate` datetime NOT NULL ,
	`OthToDate` datetime NOT NULL ,
	`OthTotalMiles` varchar(10) COLLATE utf8_unicode_ci NOT NULL ,
	`OthDescribe` varchar(200) COLLATE utf8_unicode_ci NOT NULL ,
	`DeniedCDL` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`DeniedCDLExplain` varchar(200) COLLATE utf8_unicode_ci NOT NULL ,
	`SuspCDL` varchar(3) COLLATE utf8_unicode_ci NOT NULL ,
	`SuspCDLExplain` varchar(200) COLLATE utf8_unicode_ci NOT NULL ,
	`CopyStatus` varchar(15) COLLATE utf8_unicode_ci NOT NULL ,
	`Created` datetime NOT NULL ,
	`NoRA` tinyint NOT NULL ,
	`NoAcc` tinyint NOT NULL ,
	`NoViol` tinyint NOT NULL ,
	`NoEmpl` tinyint NOT NULL ,
	`DriverCode` varchar(30) COLLATE utf8_unicode_ci NOT NULL ,
	`TWICSerial` varchar(50) COLLATE utf8_unicode_ci NOT NULL ,
	`TWICExpDate` datetime NOT NULL ,
	`NextelPhone` varchar(15) COLLATE utf8_unicode_ci NOT NULL ,
	`NextelPhoneSerial` varchar(20) COLLATE utf8_unicode_ci NOT NULL ,
	`RadioFrequency` varchar(15) COLLATE utf8_unicode_ci NOT NULL ,
	`RadioSerial` varchar(20) COLLATE utf8_unicode_ci NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS holdkey (
	`DIWID` bigint NOT NULL auto_increment,
	`FileID` bigint NOT NULL ,
	`col3` tinyint NULL,
	PRIMARY KEY  (`DIWID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `tAccDOTinc` (
	`DOTincID` bigint NOT NULL auto_increment ,
	`AccIWID` bigint NOT NULL ,
	`Fatality` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`injuries` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`towed` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`citation` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`test` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Alcohol2` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Alcohol` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Drug` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`WhyNot` text COLLATE utf8_unicode_ci NOT NULL ,
	`WhyNotDrug` text COLLATE utf8_unicode_ci NOT NULL ,
	`DOTReportable` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	PRIMARY KEY  (`DOTincID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- ON `PRIMARY` TEXTIMAGE_ON `PRIMARY`


CREATE TABLE IF NOT EXISTS `tAccDQFDoc` (
	`AccDQFDocID` bigint NOT NULL auto_increment ,
	`AccIWID` bigint NOT NULL ,
	`DocID` bigint NOT NULL ,
	`Status` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`Requested` datetime NOT NULL ,
	`Completed` datetime NOT NULL ,
	`EmployeeDrID` bigint NOT NULL ,
	`ScanDateTime` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`Created` datetime NOT NULL ,
	`OtherTitle` varchar (200) COLLATE utf8_unicode_ci NOT NULL ,
	PRIMARY KEY  (`AccDQFDocID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tAccDoc` (
	`DocID` bigint NOT NULL auto_increment ,
	`DocType` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`Category` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`DocTitle` varchar (100) COLLATE utf8_unicode_ci NOT NULL ,
	`DocCode` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`HasPDF` tinyint NOT NULL ,
	`PDFFile` varchar (100) COLLATE utf8_unicode_ci NOT NULL ,
	`HasScan` tinyint NOT NULL ,
	`Multiple` tinyint NOT NULL ,
	`ForEmployer` tinyint NOT NULL ,
	`PageNum` tinyint NOT NULL ,
	`HasNSCCheck` tinyint NOT NULL,
	PRIMARY KEY  (`DocID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tAccEmployePassanger` (
	`PassangerID` bigint NOT NULL auto_increment ,
	`SSN` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`AccIWID` bigint NOT NULL ,
	`Status` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`DOB` datetime NOT NULL ,
	`FirstName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`LastName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`MIddleName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`HomePhone` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`BusinessPhone` varchar (16) COLLATE utf8_unicode_ci NOT NULL ,
	`StreetAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`CityAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`StateAddress` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`ZIPAddress` varchar (7) COLLATE utf8_unicode_ci NOT NULL ,
	`CDLNumber` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`State` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Class` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Injured` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`InjuryDescription` varchar (300) COLLATE utf8_unicode_ci NOT NULL ,
	`Killed` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Sex` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`HairColor` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`Eyes` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`HeightFeet` varchar (7) COLLATE utf8_unicode_ci NOT NULL ,
	`HeightInch` varchar (7) COLLATE utf8_unicode_ci NOT NULL ,
	`Weight` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`Seatbelt` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Statement` varchar (300) COLLATE utf8_unicode_ci NOT NULL ,
	`WitnessType` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`InjuryType` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`TransportedBy` varchar (50) COLLATE utf8_unicode_ci NOT NULL ,
	`TakenTo` varchar (50) COLLATE utf8_unicode_ci NOT NULL ,
	PRIMARY KEY  (`PassangerID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tAccEmployeeDriver` (
	`EmployeeDrID` bigint NOT NULL auto_increment ,
	`AccIWID` bigint NOT NULL ,
	`DriverID` bigint NOT NULL ,
	`SSN` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`HomeBaseID` bigint NOT NULL ,
	`Status` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`TerminationDate` datetime NOT NULL ,
	`DateOfHire` datetime NOT NULL ,
	`DOB` datetime NOT NULL ,
	`FirstName` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`LastName` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`MiddleName` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`BirthName` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`StreetAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`CityAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`StateAddress` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`ZIPAddress` varchar (8) COLLATE utf8_unicode_ci NOT NULL ,
	`CDLNumber` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`State` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Class` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`Injured` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`InjuryDescription` varchar (200) COLLATE utf8_unicode_ci NOT NULL ,
	`killed` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`HomePhone` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`BusinessPhone` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`InsuranceCarier` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`InsPolicy` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`TravDirection` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`OnStreet` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`Speed` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`SpeedMax` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`LicPlate` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`Sex` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`HairColor` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`Eyes` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`HeightFeet` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`HeightInch` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Weight` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`NumberOfPassanger` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Other` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Alcohol8` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Alcohol2` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`WhyNotAlcohol` text COLLATE utf8_unicode_ci NOT NULL ,
	`DrugTest` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`WhyNotDrug` text COLLATE utf8_unicode_ci NOT NULL ,
	`Citation8Hours` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`Citation32Hours` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`AccPoints` bigint NOT NULL ,
	PRIMARY KEY  (`EmployeeDrID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- ON `PRIMARY` TEXTIMAGE_ON `PRIMARY`


CREATE TABLE IF NOT EXISTS `tAccEmployeeMovement` (
	`EmployeeMovID` bigint NOT NULL auto_increment ,
	`EmployeeDrID` bigint NOT NULL ,
	`Stopped` tinyint NOT NULL ,
	`ProceedingStraight` tinyint NOT NULL ,
	`RunOffRoadway` tinyint NOT NULL ,
	`MakingRightTurn` tinyint NOT NULL ,
	`MakingLeftTurn` tinyint NOT NULL ,
	`MakingUTurn` tinyint NOT NULL ,
	`Backing` tinyint NOT NULL ,
	`Slowing` tinyint NOT NULL ,
	`Stopping` tinyint NOT NULL ,
	`Passing` tinyint NOT NULL ,
	`ChangingLanes` tinyint NOT NULL ,
	`Parking` tinyint NOT NULL ,
	`EnteringTraffic` tinyint NOT NULL ,
	`UnsafeTurning` tinyint NOT NULL ,
	`Parked` tinyint NOT NULL ,
	`Merging` tinyint NOT NULL ,
	`WrongWay` tinyint NOT NULL ,
	`Other` text COLLATE utf8_unicode_ci NOT NULL ,
	PRIMARY KEY  (`EmployeeMovID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- ON `PRIMARY` TEXTIMAGE_ON `PRIMARY`


CREATE TABLE IF NOT EXISTS `tAccEmployeeVehicle` (
	`AccEmployVehicleID` bigint NOT NULL auto_increment ,
	`EmployeeDrID` bigint NOT NULL ,
	`DriverID` bigint NOT NULL ,
	`AccIWID` bigint NOT NULL ,
	`TruckID` bigint NOT NULL ,
	`TIWID` bigint NOT NULL ,
	`VendorID` bigint NOT NULL ,
	`VendorCompany` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`HomeBaseID` bigint NOT NULL ,
	`Make` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`Model` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`Color` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`ProdYear` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`LicPlate` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`State` varchar (5) COLLATE utf8_unicode_ci NOT NULL ,
	`UnitNUmber` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersFirstName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersLastName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersMiddleName` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersStreetAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersCityAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersStateAddress` varchar (20) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersZIPAddress` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`OwnersCode` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`VIN` varchar (25) COLLATE utf8_unicode_ci NOT NULL ,
	`Towed` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`DOT` varchar (15) COLLATE utf8_unicode_ci NOT NULL ,
	`Damage` text COLLATE utf8_unicode_ci NOT NULL ,
	`PhotoTaken` varchar (3) COLLATE utf8_unicode_ci NOT NULL ,
	`InsCompany` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`InsPolicyNum` varchar (30) COLLATE utf8_unicode_ci NOT NULL ,
	`InsExpDate` datetime NOT NULL ,
	`VehicleValue` bigint NOT NULL ,
	`VehType` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`DamageEstimate` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	`Status` varchar (10) COLLATE utf8_unicode_ci NOT NULL ,
	PRIMARY KEY  (`AccEmployVehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
-- ON `PRIMARY` TEXTIMAGE_ON `PRIMARY`
/*

ALTER TABLE `tAccDQFDoc` WITH NOCHECK ADD 
	CONSTRAINT `PK_tAccDQFDoc` PRIMARY KEY  CLUSTERED 
	(
		`AccDQFDocID`
	) WITH  FILLFACTOR = 90  ON `PRIMARY` 
GO

ALTER TABLE `tAccDoc` WITH NOCHECK ADD 
	CONSTRAINT `PK_tAccDoc` PRIMARY KEY  CLUSTERED 
	(
		`DocID`
	) WITH  FILLFACTOR = 90  ON `PRIMARY` 
GO

ALTER TABLE `tAccEmployeeDriver` WITH NOCHECK ADD 
	CONSTRAINT `PK_tAccEmployeeDriver` PRIMARY KEY  CLUSTERED 
	(
		`EmployeeDrID`
	) WITH  FILLFACTOR = 90  ON `PRIMARY` 
GO

ALTER TABLE `tAccEmployeeMovement` WITH NOCHECK ADD 
	CONSTRAINT `PK_tAccEmployeeMovement` PRIMARY KEY  CLUSTERED 
	(
		`EmployeeMovID`
	) WITH  FILLFACTOR = 90  ON `PRIMARY` 
GO
*/
-- ALTER TABLE `site_content` CHANGE `page_id` `page_id` VARCHAR( 45 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ad'
-- ALTER TABLE `site_content` CHANGE `page_id` `page_id` VARCHAR( 45 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'adadasd'
ALTER TABLE `tAccDOTinc` 
	CHANGE `AccIWID` `AccIWID` BIGINT NOT NULL DEFAULT '-1',
	CHANGE `Fatality` `Fatality` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `injuries` `injuries` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `towed` `towed` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `citation` `citation` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `test` `test` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `Alcohol2` `Alcohol2` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `Alcohol` `Alcohol` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `Drug` `Drug` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `WhyNot` `WhyNot` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `WhyNotDrug` `WhyNotDrug` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
	CHANGE `DOTReportable` `DOTReportable` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
	

ALTER TABLE `tAccDQFDoc`  
	CHANGE `AccIWID` `AccIWID`  BIGINT DEFAULT '-1' ,
	CHANGE `DocID` `DocID`  BIGINT DEFAULT '-1' ,
	CHANGE `Status` `Status` VARCHAR( 15 ) DEFAULT '' ,
	CHANGE `Requested` `Requested` DATE NOT NULL DEFAULT '1990-01-01',
	CHANGE `Completed` `Completed` DATE NOT NULL DEFAULT '1990-01-01',
	CHANGE `EmployeeDrID` `EmployeeDrID`  BIGINT DEFAULT '-1' ,
	CHANGE `ScanDateTime` `ScanDateTime` VARCHAR( 20 ) DEFAULT '' ,
	CHANGE `Created` `Created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CHANGE `OtherTitle` `OtherTitle` VARCHAR( 200 ) DEFAULT '' 


ALTER TABLE `tAccDoc`  
	CHANGE `DocType` `DocType` VARCHAR( 30 ) DEFAULT '' ,
	CHANGE `Category` `Category` VARCHAR( 30 ) DEFAULT '' ,
	CHANGE `DocTitle` `DocTitle` VARCHAR( 100 ) DEFAULT '' ,
	CHANGE `DocCode` `DocCode` VARCHAR( 10 ) DEFAULT '' ,
	CHANGE `HasPDF` `HasPDF`  TINYINT DEFAULT '0' ,
	CHANGE `PDFFile` `PDFFile` VARCHAR( 100 ) DEFAULT '' ,
	CHANGE `HasScan` `HasScan`  TINYINT DEFAULT '0' ,
	CHANGE `Multiple` `Multiple`  TINYINT DEFAULT '0' ,
	CHANGE `ForEmployer` `ForEmployer`  TINYINT DEFAULT '0' ,
	CHANGE `PageNum` `PageNum`  TINYINT DEFAULT '0' ,
	CHANGE `HasNSCCheck` `HasNSCCheck`  TINYINT DEFAULT '0' 


ALTER TABLE `tAccEmployePassanger`  
	CHANGE `SSN` `SSN` VARCHAR( 30) DEFAULT '' ,
	CHANGE `Status` `Status` VARCHAR( 20) DEFAULT '' ,
	CHANGE `DOB` `DOB` DATE NOT NULL DEFAULT '1990-01-01',
	CHANGE `FirstName` `FirstName` VARCHAR( 20) DEFAULT '' ,
	CHANGE `LastName` `LastName` VARCHAR( 20) DEFAULT '' ,
	CHANGE `MIddleName` `MIddleName` VARCHAR( 20) DEFAULT '' ,
	CHANGE `HomePhone` `HomePhone` VARCHAR( 15) DEFAULT '' ,
	CHANGE `BusinessPhone` `BusinessPhone` VARCHAR( 16) DEFAULT '' ,
	CHANGE `StreetAddress` `StreetAddress` VARCHAR( 20) DEFAULT '' ,
	CHANGE `CityAddress` `CityAddress` VARCHAR( 20) DEFAULT '' ,
	CHANGE `StateAddress` `StateAddress` VARCHAR( 3) DEFAULT '' ,
	CHANGE `ZIPAddress` `ZIPAddress` VARCHAR( 7) DEFAULT '' ,
	CHANGE `CDLNumber` `CDLNumber` VARCHAR( 30) DEFAULT '' ,
	CHANGE `State` `State` VARCHAR( 5) DEFAULT '' ,
	CHANGE `Class` `Class` VARCHAR( 5) DEFAULT '' ,
	CHANGE `InjuryDescription` `InjuryDescription` VARCHAR(300) DEFAULT '' ,
	CHANGE `Killed` `Killed` VARCHAR( 5) DEFAULT '' ,
	CHANGE `Sex` `Sex` VARCHAR(10) DEFAULT '' ,
	CHANGE `HairColor` `HairColor` VARCHAR(10) DEFAULT '' ,
	CHANGE `Eyes` `Eyes` VARCHAR(10) DEFAULT '' ,
	CHANGE `HeightFeet` `HeightFeet` VARCHAR(7) DEFAULT '' ,
	CHANGE `HeightInch` `HeightInch` VARCHAR(7) DEFAULT '' ,
	CHANGE `Weight` `Weight` VARCHAR(10) DEFAULT '' ,
	CHANGE `Seatbelt` `Seatbelt` VARCHAR(5) DEFAULT '' ,
	CHANGE `Statement` `Statement` VARCHAR(300) DEFAULT '' ,
	CHANGE `WitnessType` `WitnessType` VARCHAR(15) DEFAULT '' ,
	CHANGE `InjuryType` `InjuryType` VARCHAR(30) DEFAULT '' ,
	CHANGE `TransportedBy` `TransportedBy` VARCHAR(50) DEFAULT '' ,
	CHANGE `TakenTo` `TakenTo` VARCHAR(50) DEFAULT '' 

ALTER TABLE `tAccEmployeeDriver`  
	CHANGE `SSN` `SSN` VARCHAR(15) DEFAULT '' ,
	CHANGE `HomeBaseID` `HomeBaseID`  BIGINT DEFAULT '-1' ,
	CHANGE `Status` `Status` VARCHAR(10) DEFAULT '' ,
	CHANGE `TerminationDate` `TerminationDate` DATE NOT NULL DEFAULT '1900-01-01',
	CHANGE `DateOfHire` `DateOfHire` DATE NOT NULL DEFAULT '1900-01-01',
	CHANGE `DOB` `DOB` DATE NOT NULL DEFAULT '1900-01-01',
	CHANGE `FirstName` `FirstName` VARCHAR(30) DEFAULT '' ,
	CHANGE `LastName` `LastName` VARCHAR(30) DEFAULT '' ,
	CHANGE `MiddleName` `MiddleName` VARCHAR(30) DEFAULT '' ,
	CHANGE `BirthName` `BirthName` VARCHAR(30) DEFAULT '' ,
	CHANGE `StreetAddress` `StreetAddress` VARCHAR(20) DEFAULT '' ,
	CHANGE `CityAddress` `CityAddress` VARCHAR(20) DEFAULT '' ,
	CHANGE `StateAddress` `StateAddress` VARCHAR( 3) DEFAULT '' ,
	CHANGE `ZIPAddress` `ZIPAddress` VARCHAR( 7) DEFAULT '' ,
	CHANGE `CDLNumber` `CDLNumber` VARCHAR( 30) DEFAULT '' ,
	CHANGE `State` `State` VARCHAR( 5) DEFAULT '' ,
	CHANGE `Class` `Class` VARCHAR( 5) DEFAULT '' ,
	CHANGE `Injured` `Injured` VARCHAR( 5) DEFAULT '' ,
	CHANGE `InjuryDescription` `InjuryDescription` VARCHAR(300) DEFAULT '' ,
	CHANGE `Killed` `Killed` VARCHAR( 5) DEFAULT '' ,
	CHANGE `HomePhone` `HomePhone` VARCHAR( 15) DEFAULT '' ,
	CHANGE `BusinessPhone` `BusinessPhone` VARCHAR( 16) DEFAULT '' ,
	CHANGE `InsuranceCarier` `InsuranceCarier` VARCHAR( 30) DEFAULT '' ,
	CHANGE `InsPolicy` `InsPolicy` VARCHAR( 20) DEFAULT '' ,
	CHANGE `TravDirection` `TravDirection` VARCHAR( 5) DEFAULT '' ,
	CHANGE `OnStreet` `OnStreet` VARCHAR(30) DEFAULT '' ,
	CHANGE `Speed` `Speed` VARCHAR(10) DEFAULT '' ,
	CHANGE `SpeedMax` `SpeedMax` VARCHAR(10) DEFAULT '' ,
	CHANGE `LicPlate` `LicPlate` VARCHAR(15) DEFAULT '' ,
	CHANGE `Sex` `Sex` VARCHAR(10) DEFAULT '' ,
	CHANGE `HairColor` `HairColor` VARCHAR(10) DEFAULT '' ,
	CHANGE `Eyes` `Eyes` VARCHAR(10) DEFAULT '' ,
	CHANGE `HeightFeet` `HeightFeet` VARCHAR(7) DEFAULT '' ,
	CHANGE `HeightInch` `HeightInch` VARCHAR(7) DEFAULT '' ,
	CHANGE `Weight` `Weight` VARCHAR(10) DEFAULT '' ,
	CHANGE `NumberOfPassanger` `NumberOfPassanger` VARCHAR(3) DEFAULT '' ,
	CHANGE `Other` `Other` VARCHAR(3) DEFAULT '' ,
	CHANGE `Alcohol8` `Alcohol8` VARCHAR(3) DEFAULT '' ,
	CHANGE `Alcohol2` `Alcohol2` VARCHAR(3) DEFAULT '' ,
	CHANGE `WhyNotAlcohol` `WhyNotAlcohol` TEXT DEFAULT '' ,
	CHANGE `DrugTest` `DrugTest` VARCHAR(3) DEFAULT '' ,
	CHANGE `WhyNotDrug` `WhyNotDrug` TEXT DEFAULT '' ,
	CHANGE `Citation8Hours` `Citation8Hours` VARCHAR(3) DEFAULT '' ,
	CHANGE `Citation32Hours` `Citation32Hours` VARCHAR(3) DEFAULT '' ,
	CHANGE `AccPoints` `AccPoints`  BIGINT DEFAULT '0' 
	

ALTER TABLE `tAccEmployeeMovement`  
	CHANGE `EmployeeDrID` `EmployeeDrID`  BIGINT DEFAULT '-1' ,
	CHANGE `Stopped` `Stopped`  TINYINT DEFAULT '0' ,
	CHANGE `ProceedingStraight` `ProceedingStraight`  TINYINT DEFAULT '0' ,
	CHANGE `RunOffRoadway` `RunOffRoadway`  TINYINT DEFAULT '0' ,
	CHANGE `MakingRightTurn` `MakingRightTurn`  TINYINT DEFAULT '0' ,
	CHANGE `MakingLeftTurn` `MakingLeftTurn`  TINYINT DEFAULT '0' ,
	CHANGE `Backing` `Backing`  TINYINT DEFAULT '0' ,
	CHANGE `Slowing` `Slowing`  TINYINT DEFAULT '0' ,
	CHANGE `Stopping` `Stopping`  TINYINT DEFAULT '0' ,
	CHANGE `Passing` `Passing`  TINYINT DEFAULT '0' ,
	CHANGE `ChangingLanes` `ChangingLanes`  TINYINT DEFAULT '0' ,
	CHANGE `Parking` `Parking`  TINYINT DEFAULT '0' ,
	CHANGE `EnteringTraffic` `EnteringTraffic`  TINYINT DEFAULT '0' ,
	CHANGE `UnsafeTurning` `UnsafeTurning`  TINYINT DEFAULT '0' ,
	CHANGE `Parked` `Parked`  TINYINT DEFAULT '0' ,
	CHANGE `Merging` `Merging`  TINYINT DEFAULT '0' ,
	CHANGE `WrongWay` `WrongWay`  TINYINT DEFAULT '0' ,
	CHANGE `Other` `Other` TEXT DEFAULT '' 
	
	
	

ALTER TABLE `tAccEmployeeVehicle`  
	CHANGE `EmployeeDrID` `EmployeeDrID`  BIGINT DEFAULT '-1' ,
	CHANGE `DriverID` `DriverID`  BIGINT DEFAULT '-1' ,
	CHANGE `AccIWID` `AccIWID`  BIGINT DEFAULT '-1' ,
	CHANGE `TruckID` `TruckID`  BIGINT DEFAULT '-1' ,
	CHANGE `TIWID` `TIWID`  BIGINT DEFAULT '-1' ,
	CHANGE `VendorID` `VendorID`  BIGINT DEFAULT '-1' ,
	CHANGE `VendorCompany` `VendorCompany`  VARCHAR(20) DEFAULT '' ,
	CHANGE `HomeBaseID` `HomeBaseID`  BIGINT DEFAULT '-1' ,
	CHANGE `Make` `Make`  VARCHAR(20) DEFAULT '' ,
	CHANGE `Model` `Model`  VARCHAR(20) DEFAULT '' ,
	CHANGE `Color` `Color`  VARCHAR(20) DEFAULT '' ,
	CHANGE `ProdYear` `ProdYear`  VARCHAR(5) DEFAULT '' ,
	CHANGE `LicPlate` `LicPlate`  VARCHAR(15) DEFAULT '' ,
	CHANGE `State` `State`  VARCHAR(5) DEFAULT '' ,
	CHANGE `UnitNUmber` `UnitNUmber`  VARCHAR(15) DEFAULT '' ,
	CHANGE `OwnersFirstName` `OwnersFirstName`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersLastName` `OwnersLastName`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersMiddleName` `OwnersMiddleName`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersStreetAddress` `OwnersStreetAddress`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersCityAddress` `OwnersCityAddress`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersStateAddress` `OwnersStateAddress`  VARCHAR(20) DEFAULT '' ,
	CHANGE `OwnersZIPAddress` `OwnersZIPAddress`  VARCHAR(10) DEFAULT '' ,
	CHANGE `OwnersCode` `OwnersCode`  VARCHAR(15) DEFAULT '' ,
	CHANGE `VIN` `VIN`  VARCHAR(25) DEFAULT '' ,
	CHANGE `Towed` `Towed`  VARCHAR(3) DEFAULT '' ,
	CHANGE `DOT` `DOT`  VARCHAR(15) DEFAULT '' ,
	CHANGE `Damage` `Damage` TEXT DEFAULT '' ,
	CHANGE `PhotoTaken` `PhotoTaken`  VARCHAR(3) DEFAULT '' ,
	CHANGE `InsCompany` `InsCompany`  VARCHAR(30) DEFAULT '' ,
	CHANGE `InsPolicyNum` `InsPolicyNum`  VARCHAR(30) DEFAULT '' ,
	CHANGE `InsExpDate` `InsExpDate` DATE NOT NULL DEFAULT '1900-01-01',
	CHANGE `VehicleValue` `VehicleValue`  BIGINT DEFAULT '0' ,
	CHANGE `VehType` `VehType`  VARCHAR(10) DEFAULT '' ,
	CHANGE `DamageEstimate` `DamageEstimate`  VARCHAR(10) DEFAULT '' ,
	CHANGE `Status` `Status`  VARCHAR(10) DEFAULT '' 
	

ALTER TABLE `tAccEmployeeMovement`
ADD FOREIGN KEY FK_tAccEmployeeMovement_tAccEmployeeDriver(EmployeeDrID)
REFERENCES `tAccEmployeeDriver`(`EmployeeDrID`)	 ON DELETE CASCADE ON UPDATE CASCADE 
	