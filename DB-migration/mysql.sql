

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
  PRIMARY KEY  (`AccFileID`)
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
  PRIMARY KEY  (`AccIWID`)
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
  PRIMARY KEY  (`LightningDataID`)
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
  PRIMARY KEY  (`OtherMovID`)
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
  PRIMARY KEY  (`RoadwayDataID`)
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
  PRIMARY KEY  (`RoadCondID`)
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
  PRIMARY KEY  (`SurfaceDataID`)
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
  PRIMARY KEY  (`TraficControlDataID`)
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
  PRIMARY KEY  (`TrafficDataID`)
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
  PRIMARY KEY  (`WeatherID`)
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
  `ActionSystemID` bigint(20) NOT NULL,
  `FileID` bigint(20) NOT NULL,
  `DIWID` bigint(20) NOT NULL,
  `ExpType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Expires` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `ActionType` varchar(15) collate utf8_unicode_ci NOT NULL,
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
  `HomeBaseID` bigint(20) NOT NULL,
  `ActionType` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ActionDate` datetime NOT NULL,
  `ActionOn` varchar(20) collate utf8_unicode_ci NOT NULL,
  `OnID` bigint(20) NOT NULL,
  `ByName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ByUserID` bigint(20) NOT NULL,
  `Parameters` varchar(3000) collate utf8_unicode_ci NOT NULL,
  `Comment` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ActionUserID`)
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
  `DIWID` bigint(20) NOT NULL,
  `CheckReview` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckPrintForms` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckScanAllForms` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckSignature` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckPicture` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckScan` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckAutoFax` varchar(1) collate utf8_unicode_ci NOT NULL,
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
  `Url` varchar(100) collate utf8_unicode_ci NOT NULL,
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
  `DocType` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Category` varchar(30) collate utf8_unicode_ci NOT NULL,
  `DocTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DocCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HasPDF` tinyint(4) NOT NULL,
  `PDFFile` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HasScan` tinyint(4) NOT NULL,
  `Multiple` tinyint(4) NOT NULL,
  `PageNum` tinyint(4) NOT NULL,
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
  `CompanyID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `ScanDateTime` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(200) collate utf8_unicode_ci NOT NULL,
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
  `CompanyID` bigint(20) NOT NULL,
  `FirstName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Role` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `DQF` tinyint(4) NOT NULL,
  `VIM` tinyint(4) NOT NULL,
  `Accident` tinyint(4) NOT NULL,
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
  `RadioSerial` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`DIWID`)
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
  `DIWID` bigint(20) NOT NULL,
  `AccDate` datetime NOT NULL,
  `City` varchar(50) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `AccType` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Fatalies` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Injuries` varchar(3) collate utf8_unicode_ci NOT NULL,
  `OrderNo` tinyint(4) NOT NULL,
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
  `DIWID` bigint(20) NOT NULL,
  `Address` varchar(200) collate utf8_unicode_ci NOT NULL,
  `City` varchar(50) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Zip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Phone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `YearsAtAddress` varchar(2) collate utf8_unicode_ci NOT NULL,
  `MonthsAtAddress` varchar(2) collate utf8_unicode_ci NOT NULL,
  `FromDate` datetime NOT NULL,
  `CurrAddress` varchar(3) collate utf8_unicode_ci NOT NULL,
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
  `DIWID` bigint(20) NOT NULL,
  `CDLNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Class` varchar(1) collate utf8_unicode_ci NOT NULL,
  `EndorP` varchar(3) collate utf8_unicode_ci NOT NULL,
  `EndorT` varchar(3) collate utf8_unicode_ci NOT NULL,
  `EndorH` varchar(3) collate utf8_unicode_ci NOT NULL,
  `EndorN` varchar(3) collate utf8_unicode_ci NOT NULL,
  `EndorX` varchar(3) collate utf8_unicode_ci NOT NULL,
  `AirBrakeRestriction` varchar(3) collate utf8_unicode_ci NOT NULL,
  `Expires` datetime NOT NULL,
  `CDLCurrent` varchar(3) collate utf8_unicode_ci NOT NULL,
  `OrderNo` tinyint(4) NOT NULL,
  PRIMARY KEY  (`DIWCDLID`)
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
  `DIWID` bigint(20) NOT NULL,
  `Date1` datetime NOT NULL,
  `Hours1` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date2` datetime NOT NULL,
  `Hours2` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date3` datetime NOT NULL,
  `Hours3` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date4` datetime NOT NULL,
  `Hours4` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date5` datetime NOT NULL,
  `Hours5` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date6` datetime NOT NULL,
  `Hours6` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Date7` datetime NOT NULL,
  `Hours7` varchar(2) collate utf8_unicode_ci NOT NULL,
  `LastRelievedDate` datetime NOT NULL,
  `LastRelievedTime` varchar(10) collate utf8_unicode_ci NOT NULL,
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
  `DIWID` bigint(20) NOT NULL,
  `Employer` varchar(200) collate utf8_unicode_ci NOT NULL,
  `Address` varchar(200) collate utf8_unicode_ci NOT NULL,
  `City` varchar(50) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Zip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Fax` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Job` varchar(200) collate utf8_unicode_ci NOT NULL,
  `FromMonth` varchar(3) collate utf8_unicode_ci NOT NULL,
  `FromYear` varchar(5) collate utf8_unicode_ci NOT NULL,
  `ToMonth` varchar(3) collate utf8_unicode_ci NOT NULL,
  `ToYear` varchar(5) collate utf8_unicode_ci NOT NULL,
  `Reason` varchar(200) collate utf8_unicode_ci NOT NULL,
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
  `DIWID` bigint(20) NOT NULL,
  `OwnerFirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `OwnerLastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `VehicleType` varchar(30) collate utf8_unicode_ci NOT NULL,
  `NumberOfAxles` varchar(5) collate utf8_unicode_ci NOT NULL,
  `LicPlateNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `VIN` varchar(30) collate utf8_unicode_ci NOT NULL,
  `RegExpDate` datetime NOT NULL,
  `ValueOfVehicle` varchar(15) collate utf8_unicode_ci NOT NULL,
  `InsCompany` varchar(100) collate utf8_unicode_ci NOT NULL,
  `InsPolicy` varchar(20) collate utf8_unicode_ci NOT NULL,
  `InsExpDate` datetime NOT NULL,
  `InsLimits` varchar(200) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`DIWVehicleID`)
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
  `DIWID` bigint(20) NOT NULL,
  `ViolDate` datetime NOT NULL,
  `Location` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Violation` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Penalty` varchar(50) collate utf8_unicode_ci NOT NULL,
  `TypeOfVehicle` varchar(20) collate utf8_unicode_ci NOT NULL,
  `OrderNo` tinyint(4) NOT NULL,
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
  `DocType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Category` varchar(30) collate utf8_unicode_ci NOT NULL,
  `DocTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DocCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HasPDF` tinyint(4) NOT NULL,
  `PDFFile` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HasScan` tinyint(4) NOT NULL,
  `Multiple` tinyint(4) NOT NULL,
  `ForEmployer` tinyint(4) NOT NULL,
  `PageNum` tinyint(4) NOT NULL,
  `HasNSCCheck` tinyint(4) NOT NULL,
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
  `CompanyID` bigint(20) NOT NULL,
  `InspectionDate` datetime NOT NULL,
  `InspectionTime` varchar(15) collate utf8_unicode_ci NOT NULL,
  `RequestedByFName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `RequestedByLName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Status` varchar(50) collate utf8_unicode_ci NOT NULL,
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
  `DQFDocID` bigint(20) NOT NULL,
  `ReviewDate` datetime NOT NULL,
  `Qualified` tinyint(4) NOT NULL,
  `Name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Remarks` text collate utf8_unicode_ci NOT NULL,
  `ConfirmReview` tinyint(4) NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY  (`DQFAnnualReviewID`)
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
  `DQFDocID` bigint(20) NOT NULL,
  `AADate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `BBDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `CCDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DDDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `EEDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `FFDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `GGDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `ToName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `NoticeDate` datetime NOT NULL,
  `Period` varchar(20) collate utf8_unicode_ci NOT NULL,
  `SuspCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `SuspFromDate` datetime NOT NULL,
  `SuspToDate` datetime NOT NULL,
  `TermCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TermDate` datetime NOT NULL,
  `ByName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ByTitle` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY  (`DQFDisq383ID`)
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
  `DQFDocID` bigint(20) NOT NULL,
  `ADate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `BDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `CDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `EDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `FDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `GDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `IDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `JDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `KDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `LDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `MDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `NDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `ODate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `PRegulation` varchar(15) collate utf8_unicode_ci NOT NULL,
  `PDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `PDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `QRegulation` varchar(15) collate utf8_unicode_ci NOT NULL,
  `QDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `QDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `RRegulation` varchar(15) collate utf8_unicode_ci NOT NULL,
  `RDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `RDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `SRegulation` varchar(15) collate utf8_unicode_ci NOT NULL,
  `SDate` varchar(10) collate utf8_unicode_ci NOT NULL,
  `SDescription` varchar(200) collate utf8_unicode_ci NOT NULL,
  `ToName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `NoticeDate` datetime NOT NULL,
  `Period` varchar(20) collate utf8_unicode_ci NOT NULL,
  `SuspCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `SuspFromDate` datetime NOT NULL,
  `SuspToDate` datetime NOT NULL,
  `TermCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `TermDate` datetime NOT NULL,
  `ByName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ByTitle` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`DQFDisq391ID`)
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
  `DIWID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `DIWEmployerID` bigint(20) NOT NULL,
  `ScanDateTime` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(200) collate utf8_unicode_ci NOT NULL,
  `RelatedTo` bigint(20) NOT NULL,
  PRIMARY KEY  (`DQFDocID`)
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
  `DQFDocID` tinyint(4) NOT NULL,
  `TruckQFDocID` tinyint(4) NOT NULL,
  `AccQFDocID` tinyint(4) NOT NULL,
  `DriverFileID` tinyint(4) NOT NULL,
  `AccFileID` tinyint(4) NOT NULL,
  `VehFileID` tinyint(4) NOT NULL,
  `CompanyID` tinyint(4) NOT NULL,
  `CompanyDocID` bigint(20) NOT NULL,
  `DOTCheckStatus` tinyint(4) NOT NULL,
  `DOTCheckNote` text collate utf8_unicode_ci NOT NULL,
  `DOTCheckDate` datetime NOT NULL,
  `DOTCheckBy` varchar(30) collate utf8_unicode_ci NOT NULL,
  `DocStatus` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DOTInspectionID` tinyint(4) NOT NULL,
  `DocTitle` varchar(50) collate utf8_unicode_ci NOT NULL,
  `HomeBaseID` tinyint(4) NOT NULL,
  `HBName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `CompName` varchar(50) collate utf8_unicode_ci NOT NULL,
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
  `SSN` varchar(9) collate utf8_unicode_ci NOT NULL,
  `DOB` datetime NOT NULL,
  `Created` datetime NOT NULL,
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
  `DIWID` bigint(20) NOT NULL,
  `AccountType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DQFDocID` bigint(20) NOT NULL,
  `StartTime` datetime NOT NULL,
  `Duration` tinyint(4) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
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
  `HBID` tinyint(4) NOT NULL,
  `CompanyID` tinyint(4) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `Pending` tinyint(4) NOT NULL,
  `Applicant` tinyint(4) NOT NULL,
  `Hired` tinyint(4) NOT NULL,
  `HiredActive` tinyint(4) NOT NULL,
  `HiredInactive` tinyint(4) NOT NULL,
  `Declined` tinyint(4) NOT NULL,
  `Denied` tinyint(4) NOT NULL,
  `Terminated` tinyint(4) NOT NULL,
  `NoComplDrivers` bigint(20) NOT NULL,
  `NoComplItems` bigint(20) NOT NULL,
  `NoComplDriversByNSC` bigint(20) NOT NULL,
  `NoComplItemsByNSC` bigint(20) NOT NULL,
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
  `NoncompID` bigint(20) NOT NULL auto_increment,
  `DateCreated` datetime NOT NULL,
  `HBID` tinyint(4) NOT NULL,
  `CompanyID` tinyint(4) NOT NULL,
  `CDLExpired` tinyint(4) NOT NULL,
  `RAExpired` tinyint(4) NOT NULL,
  `MDExpired` tinyint(4) NOT NULL,
  `AnRevExpired` tinyint(4) NOT NULL,
  `RecViolExpired` tinyint(4) NOT NULL,
  `MissCreatedNeverScanned` tinyint(4) NOT NULL,
  `MissRequiredFormDocument` tinyint(4) NOT NULL,
  `MissingRA` tinyint(4) NOT NULL,
  `MissingPrevEmploy` tinyint(4) NOT NULL,
  `MissingRADIWData` tinyint(4) NOT NULL,
  `MissingMDDIWData` tinyint(4) NOT NULL,
  `MissingAddressDIWData` tinyint(4) NOT NULL,
  `MissingCDLDIWData` tinyint(4) NOT NULL,
  `MissingPrevEmplLDIWData` tinyint(4) NOT NULL,
  `MissingAccDIWData` tinyint(4) NOT NULL,
  `MissingViolDIWData` tinyint(4) NOT NULL,
  `MissingVehDIWData` tinyint(4) NOT NULL,
  `MissRequiredFormDocumentForVeh` tinyint(4) NOT NULL,
  `VehInsExpired` tinyint(4) NOT NULL,
  `VehRegExpired` tinyint(4) NOT NULL,
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
  `DQFDocID` bigint(20) NOT NULL,
  `RequestDate` datetime NOT NULL,
  `RequestByUserID` bigint(20) NOT NULL,
  `SubmitDate` datetime default NULL,
  `SubmitByUserID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
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
  `DriverID` bigint(20) NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TerminationDate` datetime NOT NULL,
  `NSCCheck` tinyint(4) NOT NULL,
  `NSCCheckAction` varchar(50) collate utf8_unicode_ci NOT NULL,
  `VendorID` bigint(20) NOT NULL,
  `ActiveStatus` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DOTCheck` tinyint(4) NOT NULL,
  `LocationID` tinyint(4) NOT NULL,
  PRIMARY KEY  (`FileID`)
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
  `HomeBaseID` bigint(20) NOT NULL,
  `FirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Role` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `CreatedByUserID` bigint(20) NOT NULL,
  `DQF` tinyint(4) NOT NULL,
  `VIM` tinyint(4) NOT NULL,
  `Accident` tinyint(4) NOT NULL,
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
  `CompanyID` bigint(20) NOT NULL,
  `HomeBaseName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HomeBaseCode` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Address` varchar(100) collate utf8_unicode_ci NOT NULL,
  `City` varchar(50) collate utf8_unicode_ci NOT NULL,
  `State` varchar(2) collate utf8_unicode_ci NOT NULL,
  `Zip` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Fax` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `StartDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `Url` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DQFModul` varchar(3) collate utf8_unicode_ci NOT NULL,
  `TruckModul` varchar(3) collate utf8_unicode_ci NOT NULL,
  `NewDriverRate` double NOT NULL,
  `MonthlyDriverRate` double NOT NULL,
  `NewVehicleRate` double NOT NULL,
  `MonthlyVehicleRate` double NOT NULL,
  `RenewDriverRate` double NOT NULL,
  `NewTruckRate` double NOT NULL,
  `MonthlyTruckRate` double NOT NULL,
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
  `InvoiceForHBID` bigint(20) NOT NULL,
  `FileID` bigint(20) NOT NULL,
  `InvoiceType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `InvoiceDate` datetime NOT NULL,
  `Name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ForYear` varchar(4) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `ByUserID` bigint(20) NOT NULL,
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
  `HomeBaseID` bigint(20) NOT NULL,
  `InvoiceType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `InvoiceDate` datetime NOT NULL,
  `Rate` double NOT NULL,
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
  `InvoiceForHBID` bigint(20) NOT NULL,
  `TruckFileID` bigint(20) NOT NULL,
  `InvoiceType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `InvoiceDate` datetime NOT NULL,
  `Name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `ForYear` varchar(4) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `ByUserID` bigint(20) NOT NULL,
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
  `HomeBaseID` bigint(20) NOT NULL,
  `InvoiceType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `InvoiceDate` datetime NOT NULL,
  `Rate` double NOT NULL,
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
  `ActionType` varchar(50) collate utf8_unicode_ci NOT NULL,
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
  `FirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Telephone` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Role` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `CreatedByUserID` bigint(20) NOT NULL,
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
  `UserID` bigint(20) NOT NULL,
  `CurrentHBID` bigint(20) NOT NULL,
  `LastClickTime` datetime NOT NULL,
  `StartTime` datetime NOT NULL,
  `SessionStatus` tinyint(4) NOT NULL,
  `CurrentCompanyID` int(11) NOT NULL,
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
  `SetupName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Code` varchar(20) collate utf8_unicode_ci NOT NULL,
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
  `TruckFileID` int(11) NOT NULL,
  `TruckVendorID` tinyint(4) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `DateOfHire` datetime NOT NULL,
  `AppDate` datetime NOT NULL,
  `AppNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `VehType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `UnitNumber` varchar(25) collate utf8_unicode_ci NOT NULL,
  `Year` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Make` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Model` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Color` varchar(15) collate utf8_unicode_ci NOT NULL,
  `UnladenWeight` bigint(20) NOT NULL,
  `GVW` int(11) NOT NULL,
  `NumOfAxles` varchar(10) collate utf8_unicode_ci NOT NULL,
  `LicPlateNum` varchar(20) collate utf8_unicode_ci NOT NULL,
  `RegState` varchar(20) collate utf8_unicode_ci NOT NULL,
  `RegExpDate` datetime NOT NULL,
  `VehicleValue` bigint(20) NOT NULL,
  `LastEvaluationDate` datetime NOT NULL,
  `InsCompany` varchar(30) collate utf8_unicode_ci NOT NULL,
  `InsPolicyNum` varchar(30) collate utf8_unicode_ci NOT NULL,
  `InsExpDate` datetime NOT NULL,
  `AppType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `InsLimits` bigint(20) NOT NULL,
  `NSCCheck` varchar(3) collate utf8_unicode_ci NOT NULL,
  `RFID` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ProfitCN` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ProfitCNLocation` varchar(30) collate utf8_unicode_ci NOT NULL,
  `OwningCompany` varchar(50) collate utf8_unicode_ci NOT NULL,
  `IRP` varchar(20) collate utf8_unicode_ci NOT NULL,
  `IFTASticker` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Weight2290` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TitleStatus` varchar(20) collate utf8_unicode_ci NOT NULL,
  `GVRW` bigint(20) NOT NULL,
  `HUT` varchar(10) collate utf8_unicode_ci NOT NULL,
  `IFTAStickerExpDate` datetime NOT NULL,
  PRIMARY KEY  (`TIWID`)
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
  `TIWID` tinyint(4) NOT NULL,
  `InspectorName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `InspCompany` varchar(100) collate utf8_unicode_ci NOT NULL,
  `Result` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ShopNote` text collate utf8_unicode_ci NOT NULL,
  `BITExpDate` datetime NOT NULL,
  `ReinspectionDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `InspectionDate` datetime NOT NULL,
  `InspectorNumber` varchar(15) collate utf8_unicode_ci NOT NULL,
  `InspectionFormNumber` varchar(25) collate utf8_unicode_ci NOT NULL,
  `InspectionType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `DOTExpDate` datetime NOT NULL,
  `InspectorCertification` varchar(100) collate utf8_unicode_ci NOT NULL,
  `InspectorID` tinyint(4) NOT NULL,
  `InsCompanyID` tinyint(4) NOT NULL,
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
  `TIWID` tinyint(4) NOT NULL,
  `InspectorName` varchar(30) collate utf8_unicode_ci NOT NULL,
  `InspCompany` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Result` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ShopNote` text collate utf8_unicode_ci NOT NULL,
  `DISExpDate` datetime NOT NULL,
  `ReinspectionDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `InspectionDate` datetime NOT NULL,
  `InspectorNumber` varchar(15) collate utf8_unicode_ci NOT NULL,
  `InspectionFormNumber` varchar(25) collate utf8_unicode_ci NOT NULL,
  `InspectionType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `StickerNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
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
  `VIN` varchar(30) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
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
  `ActionType` varchar(15) collate utf8_unicode_ci NOT NULL,
  `ActionDate` datetime NOT NULL,
  `ToHomeBaseID` bigint(20) NOT NULL,
  `ToUserID` bigint(20) NOT NULL,
  `Confirmed` tinyint(4) NOT NULL,
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
  `ActionSystemID` bigint(20) NOT NULL,
  `TruckFileID` bigint(20) NOT NULL,
  `TIWID` bigint(20) NOT NULL,
  `ExpType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Expires` datetime NOT NULL,
  `Created` datetime NOT NULL,
  `ActionType` varchar(15) collate utf8_unicode_ci NOT NULL,
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
  `TIWID` tinyint(4) NOT NULL,
  `CheckReview` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckBIT` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckPicture` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckReqDoc` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckVehReg` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckInsSert` varchar(1) collate utf8_unicode_ci NOT NULL,
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
  `DocType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Category` varchar(30) collate utf8_unicode_ci NOT NULL,
  `DocTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DocCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HasPDF` tinyint(4) NOT NULL,
  `PDFFile` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HasScan` tinyint(4) NOT NULL,
  `Muitiple` tinyint(4) NOT NULL,
  `PageNum` tinyint(4) NOT NULL,
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
  `DriverID` tinyint(4) NOT NULL,
  `TruckID` tinyint(4) NOT NULL,
  `Created` datetime NOT NULL,
  `HBID` bigint(20) NOT NULL
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
  `InsCompanyID` tinyint(4) NOT NULL,
  `InspectorFirstName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `InspectorLastName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `InspectorNumber` varchar(50) collate utf8_unicode_ci NOT NULL,
  `InspectorCreated` datetime NOT NULL,
  `InspectorCertificate` varchar(100) collate utf8_unicode_ci NOT NULL,
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
  `InspectorID` tinyint(4) NOT NULL,
  `InspectorCertificate` varchar(100) collate utf8_unicode_ci NOT NULL,
  `InspectorCertificateCreated` datetime NOT NULL,
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
  `TIWID` tinyint(4) NOT NULL,
  `RequestedDate` datetime NOT NULL,
  `CompletedDate` datetime NOT NULL,
  `NextMaintDate` datetime NOT NULL,
  `MaintNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Amount` bigint(20) NOT NULL,
  `MaintCompany` varchar(30) collate utf8_unicode_ci NOT NULL,
  `MaintMonth` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Notes` text collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
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
  `TIWID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `TIWBITInspID` bigint(20) NOT NULL,
  `ScanDateTime` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(200) collate utf8_unicode_ci NOT NULL,
  `TIWDISInspID` bigint(20) NOT NULL,
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
  `UserID` bigint(20) NOT NULL auto_increment,
  `UserType` varchar(20) collate utf8_unicode_ci NOT NULL,
  `StaffID` bigint(20) NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `CompanyID` bigint(20) NOT NULL,
  `Username` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Agreed` tinyint(4) NOT NULL,
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
  `SSN` varchar(12) collate utf8_unicode_ci NOT NULL,
  `FederalID` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
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
  `VIWID` tinyint(4) NOT NULL,
  `CheckReview` varchar(1) collate utf8_unicode_ci NOT NULL,
  `CheckContract` varchar(1) collate utf8_unicode_ci NOT NULL,
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
  `VIWID` tinyint(4) NOT NULL,
  `ContractNum` varchar(20) collate utf8_unicode_ci NOT NULL,
  `DateOfContractSign` datetime NOT NULL,
  `ExpDateContract` datetime NOT NULL,
  `ContractSign` varchar(10) collate utf8_unicode_ci NOT NULL,
  `ContractFileName` varchar(100) collate utf8_unicode_ci NOT NULL,
  `UnitNumber` varchar(25) collate utf8_unicode_ci NOT NULL,
  `TruckID` bigint(20) NOT NULL,
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
  `DocType` varchar(10) collate utf8_unicode_ci NOT NULL,
  `Category` varchar(30) collate utf8_unicode_ci NOT NULL,
  `DocTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
  `DocCode` varchar(10) collate utf8_unicode_ci NOT NULL,
  `HasPDF` tinyint(4) NOT NULL,
  `PDFFile` varchar(100) collate utf8_unicode_ci NOT NULL,
  `HasScan` tinyint(4) NOT NULL,
  `Multiple` tinyint(4) NOT NULL,
  `PageNum` tinyint(4) NOT NULL,
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
  `VendorID` tinyint(4) NOT NULL,
  `DriverID` tinyint(4) NOT NULL,
  `VendorCode` varchar(15) collate utf8_unicode_ci NOT NULL,
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
  `VendorID` tinyint(4) NOT NULL,
  `HomeBaseID` bigint(20) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` varchar(10) collate utf8_unicode_ci NOT NULL,
  `TerminationDate` datetime NOT NULL,
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
  `VIWID` bigint(20) NOT NULL,
  `DocID` bigint(20) NOT NULL,
  `Status` varchar(15) collate utf8_unicode_ci NOT NULL,
  `Requested` datetime NOT NULL,
  `Completed` datetime NOT NULL,
  `ContractID` tinyint(4) NOT NULL,
  `ScanDateTime` varchar(50) collate utf8_unicode_ci NOT NULL,
  `Created` datetime NOT NULL,
  `OtherTitle` varchar(100) collate utf8_unicode_ci NOT NULL,
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
  `VendorFileID` tinyint(4) NOT NULL,
  `VendorCode` varchar(25) collate utf8_unicode_ci NOT NULL,
  `AppType` varchar(15) collate utf8_unicode_ci NOT NULL,
  `CompanyName` varchar(50) collate utf8_unicode_ci NOT NULL,
  `FirstName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `LastName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `Address` varchar(50) collate utf8_unicode_ci NOT NULL,
  `City` varchar(20) collate utf8_unicode_ci NOT NULL,
  `ZIP` varchar(15) collate utf8_unicode_ci NOT NULL,
  `State` varchar(5) collate utf8_unicode_ci NOT NULL,
  `Phone` varchar(12) collate utf8_unicode_ci NOT NULL,
  `Fax` varchar(12) collate utf8_unicode_ci NOT NULL,
  `Email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `EntryDate` datetime NOT NULL,
  `DateOfHire` datetime NOT NULL,
  `AppDate` datetime NOT NULL,
  `AppNumber` varchar(20) collate utf8_unicode_ci NOT NULL,
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

--
-- Ограничения внешнего ключа таблицы `taccemployeemovement`
--
ALTER TABLE `taccemployeemovement`
  ADD CONSTRAINT `taccemployeemovement_ibfk_1` FOREIGN KEY (`EmployeeDrID`) REFERENCES `taccemployeedriver` (`EmployeeDrID`) ON DELETE CASCADE ON UPDATE CASCADE;
