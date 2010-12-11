-- phpMyAdmin SQL Dump
-- version 3.3.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 16 2010 г., 16:09
-- Версия сервера: 5.1.49
-- Версия PHP: 5.3.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `nsc2010`
--

-- --------------------------------------------------------

--
-- Структура таблицы `driver__hos`
--

CREATE TABLE IF NOT EXISTS `driver__hos` (
  `dhos_ID` int(11) NOT NULL AUTO_INCREMENT,
  `dhos_Driver_ID` int(11) NOT NULL,
  `dhos_date` date NOT NULL,
  `dhos_hours` int(11) NOT NULL,
  PRIMARY KEY (`dhos_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `driver__lrfw`
--

CREATE TABLE IF NOT EXISTS `driver__lrfw` (
  `dlrfw_Driver_ID` int(11) NOT NULL,
  `dlrfw_date` date NOT NULL,
  `dlrfw_from_time` varchar(5) NOT NULL,
  UNIQUE KEY `dlrfw_Driver_ID` (`dlrfw_Driver_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `driver__equipment_operated`
--

CREATE TABLE IF NOT EXISTS `driver__equipment_operated` (
  `deo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `deo_Driver_ID` int(11) NOT NULL,
  `deo_Equipment_Type_ID` int(11) NOT NULL,
  `deo_is_operated` enum('Yes','No') NOT NULL DEFAULT 'No',
  `deo_From_Date` date NOT NULL,
  `deo_To_Date` date DEFAULT NULL,
  `deo_Total_Miles` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`deo_ID`),
  UNIQUE KEY `deo_driver_equipment_assigment` (`deo_Driver_ID`,`deo_Equipment_Type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_Parent_Company_Account_Number` int(11) DEFAULT NULL,
  `c_Number` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `c_EIN` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `c_SSN` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `c_DOT_Number` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `c_Carrier_Number` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `c_Name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `c_Contact_Table_ID` int(11) NOT NULL,
  `c_Annual_Support` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `c_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `FK_Company_2_Parent_Company__pc_id` (`c_Parent_Company_Account_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Структура таблицы `contacts_table`
--

DROP TABLE IF EXISTS `contacts_table`;
CREATE TABLE IF NOT EXISTS `contacts_table` (
  `ct_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ct_Contact` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ct_Contact_Title` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ct_Telephone_Number` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ct_Contact_Fax` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ct_Contact_Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ct_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ct_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ct_City` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ct_State` tinyint(2) NOT NULL,
  `ct_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ct_Country_Code` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `ct_Start_Date` date NOT NULL,
  `ct_Created_Date_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ct_URL` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ct_Memo` text COLLATE latin1_general_ci,
  PRIMARY KEY (`ct_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Структура таблицы `custom_document`
--

DROP TABLE IF EXISTS `custom_document`;
CREATE TABLE IF NOT EXISTS `custom_document` (
  `cd_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cd_Driver_ID` int(11) DEFAULT NULL,
  `cd_Company_ID` int(11) DEFAULT NULL,
  `cd_Homebase_ID` int(11) DEFAULT NULL,
  `cd_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cd_Description` text COLLATE latin1_general_ci,
  `cd_Logo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cd_Fax_Status_id` tinyint(4) NOT NULL DEFAULT '1',
  `cd_Document_Form_Status` tinyint(4) NOT NULL,
  `cd_Date_Requested` date NOT NULL,
  `cd_Date_Completed` date NOT NULL,
  `cd_Scan` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cd_Archived` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT 'No',
  `cd_Electronic_Signature` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cd_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cd_ID`),
  KEY `fk_custom_document_company1` (`cd_Company_ID`),
  KEY `fk_custom_document_driver1` (`cd_Driver_ID`),
  KEY `fk_custom_document_homebase1` (`cd_Homebase_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Структура таблицы `custom_document__fax_status`
--

DROP TABLE IF EXISTS `custom_document__fax_status`;
CREATE TABLE IF NOT EXISTS `custom_document__fax_status` (
  `cdfs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cdfs_status` varchar(50) NOT NULL,
  PRIMARY KEY (`cdfs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

--
-- Структура таблицы `custom_document__form_status`
--

DROP TABLE IF EXISTS `custom_document__form_status`;
CREATE TABLE IF NOT EXISTS `custom_document__form_status` (
  `cdfms_id` int(11) NOT NULL AUTO_INCREMENT,
  `cdfms_status` varchar(50) NOT NULL,
  PRIMARY KEY (`cdfms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;


-- --------------------------------------------------------

--
-- Структура таблицы `depot`
--

DROP TABLE IF EXISTS `depot`;
CREATE TABLE IF NOT EXISTS `depot` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `dp_HomeBase_Account_Number` int(11) NOT NULL,
  `dp_Name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `dp_Contact_Table_ID` int(11) NOT NULL,
  `dp_Annual_Support` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `dp_Road_Test_Record_Required` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `dp_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`dp_id`),
  KEY `FK_Depot_2_HomeBase__h_id` (`dp_HomeBase_Account_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Структура таблицы `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `d_ID` int(11) NOT NULL AUTO_INCREMENT,
  `d_homebase_ID` int(11) DEFAULT NULL,
  `d_depot_ID` int(11) DEFAULT NULL,
  `d_Driver_Alternate_ID` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Driver_SSN` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Entry_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_Employment_Type` tinyint(4) NOT NULL DEFAULT '5',
  `d_Suffix` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Account` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `d_First_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Middle_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Last_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Gender` tinyint(4) DEFAULT NULL,
  `d_Hair_Color` tinyint(4) DEFAULT NULL,
  `d_Eye_Color` tinyint(4) DEFAULT NULL,
  `d_Height_Feet` tinyint(4) DEFAULT NULL COMMENT '1 - 9',
  `d_Height_Inches` tinyint(4) DEFAULT NULL COMMENT '1 - 11',
  `d_Date_Of_Birth` date NOT NULL,
  `d_Date_Of_Hire` date DEFAULT NULL,
  `d_Description` text COLLATE latin1_general_ci,
  `d_Telephone_Number1` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Telephone_Number2` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Telephone_Number3` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Fax` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Status` tinyint(4) NOT NULL DEFAULT '1',
  `d_Total Miles Driven` int(11) DEFAULT NULL,
  `d_Physical_Exam_Date` date DEFAULT NULL,
  `d_Doctor_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `d_Medical_Card_Issue_Date` date DEFAULT NULL,
  `d_Medical_Card_Expiration_Date` date DEFAULT NULL,
  `d_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci DEFAULT NULL,
  `d_TWIC` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `d_TWIC_expiration` date DEFAULT NULL,
  `d_R_A` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `d_R_A_expiration` date DEFAULT NULL,
  PRIMARY KEY (`d_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Структура таблицы `driver_address_history`
--

DROP TABLE IF EXISTS `driver_address_history`;
CREATE TABLE IF NOT EXISTS `driver_address_history` (
  `dah_ID` int(11) NOT NULL AUTO_INCREMENT,
  `dah_Driver_ID` int(11) NOT NULL,
  `dah_Start_Date` date NOT NULL,
  `dah_End_Date` date NOT NULL,
  `dah_Current_Address` set('YES','NO') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dah_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dah_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `dah_City` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dah_State` tinyint(2) NOT NULL,
  `dah_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dah_Country_Code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `dah_Phone` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `dah_row_created`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dah_ID`),
  KEY `fk_driver_address_history_driver1` (`dah_Driver_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `driver_address_history`
--


-- --------------------------------------------------------

--
-- Структура таблицы `driver_service_hours`
--

DROP TABLE IF EXISTS `driver_service_hours`;
CREATE TABLE IF NOT EXISTS `driver_service_hours` (
  `dsh_ID` int(11) NOT NULL AUTO_INCREMENT,
  `dsh_Driver_ID` int(11) NOT NULL,
  `dsh_Date` date NOT NULL,
  `dsh_Off_Duty_Start_Time_1` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Stop_Time_1` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Start_Time_2` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Stop_Time_2` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Start_Time_3` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Stop_Time_3` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Start_Time_4` int(11) DEFAULT NULL,
  `dsh_Off_Duty_Stop_Time_4` int(11) DEFAULT NULL,
  `dsh_Total_Hours_Off_Duty` int(11) DEFAULT NULL,
  `dsh_Sleeper_Berth_Start_Time_1` int(11) DEFAULT NULL,
  `dsh_Sleeper_Berth_Stop_Time_1` int(11) DEFAULT NULL,
  `dsh_Sleeper_Berth_Start_Time_2` int(11) DEFAULT NULL,
  `dsh_Sleeper_Berth_Stop_Time_2` int(11) DEFAULT NULL,
  `dsh_Total_Hours_Sleeper_Berth` int(11) DEFAULT NULL,
  `dsh_Driving_Start_Time_1` int(11) DEFAULT NULL,
  `dsh_Driving_Stop_Time_1` int(11) DEFAULT NULL,
  `dsh_Driving_Start_Time_2` int(11) DEFAULT NULL,
  `dsh_Driving_Stop_Time_2` int(11) DEFAULT NULL,
  `dsh_Total_Hours_Driving` int(11) DEFAULT NULL,
  `dsh_On_Duty_Not_Driving_Start_Time_1` int(11) DEFAULT NULL,
  `dsh_On_Duty_Not_Driving_Stop_Time_1` int(11) DEFAULT NULL,
  `dsh_On_Duty_Not_Driving_Start_Time_2` int(11) DEFAULT NULL,
  `dsh_On_Duty_Not_Driving_Stop_Time_2` int(11) DEFAULT NULL,
  `dsh_Total_Hours_On_Duty` int(11) DEFAULT NULL,
  `dsh_Odometer_Start_1` int(11) DEFAULT NULL,
  `dsh_Odometer_Stop_1` int(11) DEFAULT NULL,
  `dsh_Total_Miles_Driving` int(11) DEFAULT NULL,
  `dsh_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`dsh_ID`),
  KEY `fk_driver_service_hours_driver1` (`dsh_Driver_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `driver_service_hours`
--


-- --------------------------------------------------------

--
-- Структура таблицы `driver__employment_type`
--

DROP TABLE IF EXISTS `driver__employment_type`;
CREATE TABLE IF NOT EXISTS `driver__employment_type` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_type` varchar(100) NOT NULL,
  PRIMARY KEY (`det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Структура таблицы `driver__eye_color`
--

DROP TABLE IF EXISTS `driver__eye_color`;
CREATE TABLE IF NOT EXISTS `driver__eye_color` (
  `dhc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dhc_type` varchar(100) NOT NULL,
  PRIMARY KEY (`dhc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Структура таблицы `driver__gender`
--

DROP TABLE IF EXISTS `driver__gender`;
CREATE TABLE IF NOT EXISTS `driver__gender` (
  `dg_id` int(11) NOT NULL AUTO_INCREMENT,
  `dg_type` varchar(100) NOT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Структура таблицы `driver__hair_color`
--

DROP TABLE IF EXISTS `driver__hair_color`;
CREATE TABLE IF NOT EXISTS `driver__hair_color` (
  `dhc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dhc_type` varchar(100) NOT NULL,
  PRIMARY KEY (`dhc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Структура таблицы `driver__status`
--

DROP TABLE IF EXISTS `driver__status`;
CREATE TABLE IF NOT EXISTS `driver__status` (
  `ds_id` int(11) NOT NULL AUTO_INCREMENT,
  `ds_type` varchar(100) NOT NULL,
  PRIMARY KEY (`ds_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_Number` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `e_Owner_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Unit_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Alternate_ID` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_RFID_No` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Entry_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `e_License_Number` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `e_License_Expiration_Date` date NOT NULL DEFAULT '0000-00-00',
  `e_Start_Mileage` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Registration_State` tinyint(2) DEFAULT NULL,
  `e_Gross_Vehicle_Weight_Rating` varchar(7) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Gross_Vehicle_Registered_Weight` varchar(7) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Unladen_Weight` varchar(7) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Axles` tinyint(2) DEFAULT NULL,
  `e_Name` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Year` year(4) DEFAULT NULL,
  `e_Make` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Color` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Model` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `e_New_Equipment_Status` tinyint(4) DEFAULT '1',
  `e_Active_Status` tinyint(4) DEFAULT NULL,
  `e_Fee` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Title_Status` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `e_Picture` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `e_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci DEFAULT NULL,
  `e_type_id` int(11) DEFAULT NULL,
  `e_activation_date` date DEFAULT NULL,
  `e_activation_comment` tinytext COLLATE latin1_general_ci,
  `e_change_active_status_date` date DEFAULT NULL,
  `e_change_active_status_comment` tinytext COLLATE latin1_general_ci,
  PRIMARY KEY (`e_id`),
  UNIQUE KEY `e_Number` (`e_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `equipment`
--


-- --------------------------------------------------------

--
-- Table structure for table `equipment_types`
--
DROP TABLE IF EXISTS `equipment_types`;
CREATE TABLE IF NOT EXISTS `equipment_types` (
  `et_id` int(11) NOT NULL AUTO_INCREMENT,
  `et_type` varchar(50) NOT NULL,
  PRIMARY KEY (`et_id`),
  UNIQUE KEY `et_type` (`et_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_assignment`
--

DROP TABLE IF EXISTS `equipment_assignment`;
CREATE TABLE IF NOT EXISTS `equipment_assignment` (
  `ea_id` int(11) NOT NULL AUTO_INCREMENT,
  `ea_company_id` int(11) DEFAULT NULL,
  `ea_homebase_id` int(11) NOT NULL,
  `ea_depot_id` int(11) DEFAULT NULL,
  `ea_equipment_id` int(11) NOT NULL,
  `ea_owner_id` int(11) NOT NULL,
  `ea_driver_id` int(11) DEFAULT NULL,
  `ea_start_date` date NOT NULL,
  `ea_end_date` date NOT NULL,
  `ea_mileage` int(11) DEFAULT NULL,
  `ea_DOT_regulated` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`ea_id`),
  KEY `fk_owner_id` (`ea_owner_id`),
  KEY `fk_homebase_id` (`ea_homebase_id`),
  KEY `fk_equipment_id` (`ea_equipment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment_owner`
--

DROP TABLE IF EXISTS `equipment_owner`;
CREATE TABLE IF NOT EXISTS `equipment_owner` (
  `eo_id` int(11) NOT NULL AUTO_INCREMENT,
  `eo_number` varchar(12) DEFAULT NULL,
  `eo_code` varchar(12) DEFAULT NULL,
  `eo_SSN` int(11) DEFAULT NULL,
  `eo_federal_id` int(11) NOT NULL,
  `eo_name` varchar(255) NOT NULL,
  `eo_contact` varchar(250) NOT NULL,
  `eo_phone` int(11) NOT NULL,
  `eo_fax` int(11) DEFAULT NULL,
  `eo_address1` varchar(250) NOT NULL,
  `eo_address2` varchar(250) DEFAULT NULL,
  `eo_city` varchar(250) NOT NULL,
  `eo_state_id` int(11) NOT NULL,
  `eo_postal_code` int(11) NOT NULL,
  PRIMARY KEY (`eo_id`),
  UNIQUE KEY `eo_number` (`eo_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment_identifier`
--

DROP TABLE IF EXISTS `equipment_identifier`;
CREATE TABLE IF NOT EXISTS `equipment_identifier` (
  `ei_id` int(11) NOT NULL AUTO_INCREMENT,
  `ei_Equipment_Type_Types` set('VIN','Serial Number','Vessel Number') COLLATE latin1_general_ci NOT NULL,
  `ei_Equipment_Number_ID` int(11) NOT NULL,
  PRIMARY KEY (`ei_id`),
  KEY `fk_equipment_identifier_equipment1` (`ei_Equipment_Number_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment_maintenance`
--

DROP TABLE IF EXISTS `equipment_maintenance`;
CREATE TABLE IF NOT EXISTS `equipment_maintenance` (
  `em_ID` int(11) NOT NULL AUTO_INCREMENT,
  `em_Equipment_ID` int(11) DEFAULT NULL,
  `em_Service_Provider_ID` int(11) DEFAULT NULL,
  `em_Maintenance_Month` int(11) NOT NULL DEFAULT '30',
  `em_Requested_Date` date NOT NULL,
  `em_Next_Maintenance_Date` date DEFAULT NULL,
  `em_Completed_Date` date NOT NULL,
  `em_Invoice_Amount` varchar(12) COLLATE latin1_general_ci DEFAULT '30',
  `em_Service_Date` date NOT NULL,
  `em_Notes` text COLLATE latin1_general_ci,
  `em_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`em_ID`),
  KEY `fk_equipment_maintenance_equipment1` (`em_Equipment_ID`),
  KEY `fk_equipment_maintenance_service_provider1` (`em_Service_Provider_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Структура таблицы `equipment__active_status`
--

DROP TABLE IF EXISTS `equipment__active_status`;
CREATE TABLE IF NOT EXISTS `equipment__active_status` (
  `eas_id` int(11) NOT NULL AUTO_INCREMENT,
  `eas_type` varchar(20) NOT NULL,
  PRIMARY KEY (`eas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment__new_equipment_status`
--

DROP TABLE IF EXISTS `equipment__new_equipment_status`;
CREATE TABLE IF NOT EXISTS `equipment__new_equipment_status` (
  `enes_id` int(11) NOT NULL AUTO_INCREMENT,
  `enes_type` varchar(10) NOT NULL,
  PRIMARY KEY (`enes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `f_ID` int(11) NOT NULL AUTO_INCREMENT,
  `f_Fee_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `f_IFTA_Sticker` set('Yes','No') COLLATE latin1_general_ci DEFAULT NULL,
  `f_Expiration_Date` date NOT NULL,
  `f_Weight_Code` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `f_NYHUT` set('Yes','No') COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`f_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `fee`
--


-- --------------------------------------------------------

--
-- Структура таблицы `homebase`
--

DROP TABLE IF EXISTS `homebase`;
CREATE TABLE IF NOT EXISTS `homebase` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_Company_Account_Number` int(11) NOT NULL,
  `h_Carrier_Number` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `h_Name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `h_Contact_Table_ID` int(11) NOT NULL,
  `h_Annual_Support` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `h_Road_Test_Record_Required` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `h_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`h_id`),
  KEY `FK_HomeBase_2_Company__c_id` (`h_Company_Account_Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `incident`
--

DROP TABLE IF EXISTS `incident`;
CREATE TABLE IF NOT EXISTS `incident` (
  `i_ID` int(11) NOT NULL AUTO_INCREMENT,
  `i_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Violation_ID` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Driver_ID` int(11) NOT NULL,
  `i_Date` date NOT NULL,
  `i_Time` time DEFAULT NULL,
  `i_Status` enum('Pending','Open','Closed') COLLATE latin1_general_ci NOT NULL DEFAULT 'Pending',
  `i_City` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `i_State` tinyint(2) DEFAULT NULL,
  `i_Postal_Code` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Highway_Street` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Highway_Street_Travel_Direction` tinyint(4) DEFAULT NULL,
  `i_At_Intersection` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Collision_Movement` set('Stopped','ProceedingStraight','RunOffRoadway','MakingLeftTurn','MakingRightTurn','MakingUTurn','Backing','Slowing','Stopping','Passing','ChangingLanes','Parking','EnteringTraffic','UnsafeTurning','Parked','Merging','WrongWay') COLLATE latin1_general_ci DEFAULT NULL,
  `i_Collision_Movement_Other` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Mile_Marker` int(11) DEFAULT NULL,
  `i_Speed_Limit` tinyint(3) DEFAULT NULL,
  `i_Actual_Speed` tinyint(3) DEFAULT NULL,
  `i_Construction_Zone` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Alcohol_Test` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Drug_Test` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Cell_Phone_Usage` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Photo_Taken_By` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Injured` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Injury_Description` text COLLATE latin1_general_ci,
  `i_Injured_Persons_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Deceased` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Incident_Diagram_Taken` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Reported` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  `i_Police_Department` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Officer_Name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Police_Report_Number` varchar(24) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Narrative` text COLLATE latin1_general_ci,
  `i_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci DEFAULT 'No',
  PRIMARY KEY (`i_ID`),
  KEY `fk_driver_id` (`i_Driver_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `incident`
--


-- --------------------------------------------------------

--
-- Структура таблицы `incident_cause`
--

DROP TABLE IF EXISTS `incident_cause`;
CREATE TABLE IF NOT EXISTS `incident_cause` (
  `ic_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ic_Incident_ID` int(11) NOT NULL,
  `ic_Incident_Cause` tinyint(4) DEFAULT NULL,
  `ic_Preventable` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `ic_Incident_Witness` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `ic_Incident_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `ic_Witness_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ic_ID`),
  KEY `fk_incident_cause_incident1` (`ic_Incident_ID`),
  KEY `fk_incident_cause_witness1` (`ic_Witness_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `incident_cause`
--


-- --------------------------------------------------------

--
-- Структура таблицы `incident__highway_street_travel_direction`
--

DROP TABLE IF EXISTS `incident__highway_street_travel_direction`;
CREATE TABLE IF NOT EXISTS `incident__highway_street_travel_direction` (
  `ihstd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ihstd_type` varchar(10) NOT NULL,
  PRIMARY KEY (`ihstd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `incident__incident_cause`
--

DROP TABLE IF EXISTS `incident__incident_cause`;
CREATE TABLE IF NOT EXISTS `incident__incident_cause` (
  `iic_id` int(11) NOT NULL AUTO_INCREMENT,
  `iic_type` varchar(50) NOT NULL,
  PRIMARY KEY (`iic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Структура таблицы `incident__investigator`
--

DROP TABLE IF EXISTS `incident__investigator`;
CREATE TABLE IF NOT EXISTS `incident__investigator` (
  `ii_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ii_Investigator_Number` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `ii_Driver_ID` int(11) DEFAULT NULL,
  `ii_Company_ID` int(11) DEFAULT NULL,
  `ii_Organization_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ii_Contact_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ii_Telephone_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `ii_Fax` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `ii_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ii_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ii_City` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ii_State` tinyint(2) NOT NULL,
  `ii_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `ii_Country_Code` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ii_ID`),
  KEY `fk_incident__investigator_company1` (`ii_Company_ID`),
  KEY `fk_incident__investigator_driver1` (`ii_Driver_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `incident__investigator`
--


-- --------------------------------------------------------

--
-- Структура таблицы `incident__passenger`
--

DROP TABLE IF EXISTS `incident__passenger`;
CREATE TABLE IF NOT EXISTS `incident__passenger` (
  `ip_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip_Equipment_Number` int(11) NOT NULL,
  `ip_Passenger _Number` int(11) NOT NULL,
  PRIMARY KEY (`ip_ID`),
  KEY `fk_incident__passenger_equipment1` (`ip_Equipment_Number`),
  KEY `fk_incident__passenger_passenger1` (`ip_Passenger _Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `incident__passenger`
--


-- --------------------------------------------------------

--
-- Структура таблицы `inspection`
--

DROP TABLE IF EXISTS `inspection`;
CREATE TABLE IF NOT EXISTS `inspection` (
  `i_ID` int(11) NOT NULL AUTO_INCREMENT,
  `i_Equipment_ID` int(11) NOT NULL,
  `i_Date` date NOT NULL,
  `i_Start_Time` time NOT NULL,
  `i_Entry_Date` date NOT NULL,
  `i_Inspector_First_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `i_Inspector_Last_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `i_Inspector_ID_Number` int(11) DEFAULT NULL,
  `i_Inspector_Certificate` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Type_ID` int(11) NOT NULL,
  `i_Result` tinyint(4) DEFAULT NULL,
  `i_Next_Date` date NOT NULL,
  `i_Reinspection_Date` date NOT NULL,
  `i_Company` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `i_Diesel_Inspection_Information` text COLLATE latin1_general_ci,
  `i_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`i_ID`),
  KEY `fk_inspection_equipment1` (`i_Equipment_ID`),
  KEY `fk_inspection_inspection_types1` (`i_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `inspection`
--


-- --------------------------------------------------------

--
-- Структура таблицы `inspection_types`
--

DROP TABLE IF EXISTS `inspection_types`;
CREATE TABLE IF NOT EXISTS `inspection_types` (
  `it_ID` int(11) NOT NULL AUTO_INCREMENT,
  `it_Inspection_ID` int(11) NOT NULL,
  `it_Inspection_Type_Type` set('Local','Federal','State','Company') COLLATE latin1_general_ci NOT NULL,
  `it_Inspection_Type_Parameters` text COLLATE latin1_general_ci,
  PRIMARY KEY (`it_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `inspection_types`
--


-- --------------------------------------------------------

--
-- Структура таблицы `inspection__result`
--

DROP TABLE IF EXISTS `inspection__result`;
CREATE TABLE IF NOT EXISTS `inspection__result` (
  `ir_id` int(11) NOT NULL AUTO_INCREMENT,
  `ir_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ir_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `insurance`
--

DROP TABLE IF EXISTS `insurance`;
CREATE TABLE IF NOT EXISTS `insurance` (
  `i_Insurance_Carrier_ID` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Carrier_Name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `i_Insurance_Policy_Number` varchar(24) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Liability_Limit` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Deductible` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Expiration_Date` date NOT NULL,
  `i_Insurance_General_Liability` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Auto` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Cargo` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_Insurance_Workers_Compensation` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `i_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `i_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`i_ID`),
  UNIQUE KEY `i_Insurance_Carrier_Name` (`i_Insurance_Carrier_Name`),
  UNIQUE KEY `Insurance_ID` (`i_Insurance_Carrier_ID`,`i_Insurance_Carrier_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `insurance`
--


-- --------------------------------------------------------

--
-- Структура таблицы `medical_history`
--

DROP TABLE IF EXISTS `medical_history`;
CREATE TABLE IF NOT EXISTS `medical_history` (
  `mh_Driver_ID` varchar(12) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mh_Examiner_Name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mh_Exam_Date` date NOT NULL,
  `mh_Passed` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mh_Expiration_Date` date NOT NULL,
  `mh_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  UNIQUE KEY `mh_ID` (`mh_Driver_ID`,`mh_Examiner_Name`,`mh_Exam_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Дамп данных таблицы `medical_history`
--


-- --------------------------------------------------------

--
-- Структура таблицы `parent_company`
--

DROP TABLE IF EXISTS `parent_company`;
CREATE TABLE IF NOT EXISTS `parent_company` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_Account_Number` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `pc_EIN` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `pc_Name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `pc_Telephone_Number` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `pc_Contact_Table_ID` int(11) NOT NULL,
  `pc_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Структура таблицы `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `p_ID` int(11) NOT NULL AUTO_INCREMENT,
  `p_Passenger_First_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `p_Passenger_Last_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `p_Passenger_Telephone_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `p_Passenger_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `p_Passenger_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `p_Passenger_City` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `p_Passenger_State` tinyint(2) NOT NULL,
  `p_Passenger_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`p_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `passenger`
--


-- --------------------------------------------------------

--
-- Структура таблицы `previous_employment`
--

DROP TABLE IF EXISTS `previous_employment`;
CREATE TABLE IF NOT EXISTS `previous_employment` (
  `pe_Driver_ID` int(11) NOT NULL,
  `pe_Employer_Name` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Employment_Start_Date` date NOT NULL,
  `pe_Employment_Stop_Date` date NOT NULL,
  `pe_Position` varchar(24) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Salary` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Reason_for_Leaving` text COLLATE latin1_general_ci,
  `pe_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `pe_City` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_State` tinyint(2) NOT NULL,
  `pe_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Phone` varchar(14) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Fax` varchar(14) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_DOT_Safety_Sensitive_Function` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_FMCSR_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Intermodal` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Interstate` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_Intrastate` set('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pe_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pe_ID`),
  KEY `fk_previous_employment_driver1` (`pe_Driver_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `previous_employment`
--


-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `r_ID` int(11) NOT NULL AUTO_INCREMENT,
  `r_Level_ID` int(11) NOT NULL DEFAULT '11',
  `r_Company_ID` int(11) DEFAULT NULL,
  `r_Homebase_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- `License`
--

DROP TABLE IF EXISTS `license`;
CREATE TABLE `license` (
`l_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`l_Driver_License_Number` VARCHAR( 24 ) NOT NULL ,
`l_Driver_Issue_State_id` INT NOT NULL ,
`l_Driver_ID` INT NOT NULL ,
`l_Class` ENUM( 'A', 'B', 'C', 'D', 'E', 'M' ) NOT NULL ,
`l_Expiration_Date` DATE NOT NULL ,
`l_License_Endorsements` SET( 'P', 'T', 'H', 'N', 'X' ) NOT NULL ,
`l_License_Restrictions` VARCHAR( 100 ) NOT NULL ,
`l_Points_Score` VARCHAR( 10 ) NOT NULL ,
`l_DOT_Regulated` SET( 'YES', 'NO' ) NOT NULL
) ENGINE = InnoDB;
-- --------------------------------------------------------

--
-- Структура таблицы `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `s_ID` int(11) NOT NULL AUTO_INCREMENT,
  `s_Driver_License_Number` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `s_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `s_Driver_License_Point` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`s_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `score`
--


-- --------------------------------------------------------

--
-- Структура таблицы `service_provider`
--

DROP TABLE IF EXISTS `service_provider`;
CREATE TABLE IF NOT EXISTS `service_provider` (
  `sp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sp_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sp_Contact` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sp_Type` tinyint(4) DEFAULT NULL,
  `sp_Telephone_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `sp_Fax` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `sp_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sp_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `sp_City` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sp_State` tinyint(2) NOT NULL,
  `sp_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `sp_Description` text COLLATE latin1_general_ci,
  `sp_Insurance_Last_Valuation_Date` date NOT NULL,
  `sp_Insurance_Company_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `sp_Insurance_Policy_Number` varchar(24) COLLATE latin1_general_ci DEFAULT NULL,
  `sp_Insurance_Limit` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `sp_Insurance_Deductible` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `sp_DOT_Regulated` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sp_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `service_provider`
--


-- --------------------------------------------------------

--
-- Структура таблицы `service_provider__company_assignment`
--

DROP TABLE IF EXISTS `service_provider__company_assignment`;
CREATE TABLE IF NOT EXISTS `service_provider__company_assignment` (
  `spсa_ID` int(11) NOT NULL AUTO_INCREMENT,
  `spсa_Service_Provider_ID` int(11) NOT NULL,
  `spсa_Company_ID` int(11) NOT NULL,
  PRIMARY KEY (`spсa_ID`),
  UNIQUE KEY `spсa_row` (`spсa_Service_Provider_ID`,`spсa_Company_ID`),
  KEY `fk_service_provider__company_assignment_service_provider1` (`spсa_Service_Provider_ID`),
  KEY `fk_service_provider__company_assignment_company1` (`spсa_Company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `service_provider__company_assignment`
--


-- --------------------------------------------------------

--
-- Структура таблицы `service_provider__equipment_assignment`
--

DROP TABLE IF EXISTS `service_provider__equipment_assignment`;
CREATE TABLE IF NOT EXISTS `service_provider__equipment_assignment` (
  `spea_ID` int(11) NOT NULL AUTO_INCREMENT,
  `spea_Service_Provider_ID` int(11) NOT NULL,
  `spea_Equipment_ID` int(11) NOT NULL,
  PRIMARY KEY (`spea_ID`),
  UNIQUE KEY `spea_row` (`spea_Service_Provider_ID`,`spea_Equipment_ID`),
  KEY `fk_service_provider__equipment_assignment_equipment1` (`spea_Equipment_ID`),
  KEY `fk_service_provider__equipment_assignment_service_provider1` (`spea_Service_Provider_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `service_provider__equipment_assignment`
--


-- --------------------------------------------------------

--
-- Структура таблицы `service_provider__insurance`
--

DROP TABLE IF EXISTS `service_provider__insurance`;
CREATE TABLE IF NOT EXISTS `service_provider__insurance` (
  `spi_ID` int(11) NOT NULL AUTO_INCREMENT,
  `spi_Service_Provider_ID` int(11) NOT NULL,
  `spi_Insurance_Company_ID` int(11) NOT NULL,
  PRIMARY KEY (`spi_ID`),
  UNIQUE KEY `spi_row` (`spi_Service_Provider_ID`,`spi_Insurance_Company_ID`),
  KEY `fk_service_provider__insurance_service_provider1` (`spi_Service_Provider_ID`),
  KEY `fk_service_provider__insurance_insurance1` (`spi_Insurance_Company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `service_provider__insurance`
--


-- --------------------------------------------------------

--
-- Структура таблицы `service_provider__type`
--

DROP TABLE IF EXISTS `service_provider__type`;
CREATE TABLE IF NOT EXISTS `service_provider__type` (
  `spt_id` int(11) NOT NULL AUTO_INCREMENT,
  `spt_type` varchar(50) NOT NULL,
  PRIMARY KEY (`spt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(2) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------
--
-- Структура таблицы `Violation`
--

DROP TABLE IF EXISTS `Violation`;
CREATE TABLE `Violation` (
`v_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`v_Inspection_Number_id` INT NOT NULL ,
`v_Violation_Number` VARCHAR( 12 ) NOT NULL ,
`v_Equipment_Number_id` INT NOT NULL ,
`v_Driver_Number_id` INT NOT NULL ,
`v_Company_Number_id` INT NOT NULL ,
`v_DOT_Regulated` SET( 'YES', 'NO' ) NOT NULL
) ENGINE = InnoDB  ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Структура таблицы `Violation_Type`
--

DROP TABLE IF EXISTS `Violation_Type`;
CREATE TABLE `nsc2010`.`Violation_Type` (
`vt_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`vt_Item` VARCHAR( 100 ) NOT NULL DEFAULT "'turn signal', 'brakes', 'steering', 'left front turn signal', 'rear turn signal trailer', 'etc'",
`vt_Item_Specific` VARCHAR( 100 ) NOT NULL DEFAULT "'Right', 'left', 'Right Front', 'Left Rear', 'etc.'"
) ENGINE = InnoDB;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_ID` int(11) NOT NULL AUTO_INCREMENT,
  `u_User_ID` varchar(24) COLLATE latin1_general_ci DEFAULT NULL,
  `u_Parent_Company_ID` int(11) DEFAULT NULL,
  `u_Company_ID` int(11) DEFAULT NULL,
  `u_Homebase_ID` int(11) DEFAULT NULL,
  `u_Depot_ID` int(11) DEFAULT NULL,
  `u_Role_ID` int(11) NOT NULL DEFAULT '11',
  `u_User_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Status` tinyint(4) DEFAULT NULL,
  `u_Title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `u_Date_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_Allowed_Access_To_DQF` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `u_Allowed_Access_To_VIM` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `u_Allowed_Access_To_Accident` set('Yes','No') COLLATE latin1_general_ci NOT NULL,
  `u_First_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Last_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Telephone_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `u_Fax` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `u_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `u_City` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `u_State` tinyint(2) NOT NULL,
  `u_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`u_ID`),
  UNIQUE KEY `u_User_Name` (`u_User_Name`),
  UNIQUE KEY `u_User_ID` (`u_User_ID`),
  KEY `fk_user_user_role1` (`u_Role_ID`),
  KEY `fk_user_company1` (`u_Company_ID`),
  KEY `fk_user_parent_company1` (`u_Parent_Company_ID`),
  KEY `fk_user_homebase1` (`u_Homebase_ID`),
  KEY `fk_user_depot1` (`u_Depot_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `ur_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ur_role` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ur_title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ur_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user__status`
--

DROP TABLE IF EXISTS `user__status`;
CREATE TABLE IF NOT EXISTS `user__status` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_type` varchar(50) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `witness`
--

DROP TABLE IF EXISTS `witness`;
CREATE TABLE IF NOT EXISTS `witness` (
  `w_ID` int(11) NOT NULL AUTO_INCREMENT,
  `w_Witness_First_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `w_Witness_Last_Name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `w_Telephone_Number` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `w_Address1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `w_Address2` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `w_City` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `w_State` tinyint(2) NOT NULL,
  `w_Postal_Code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`w_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `witness`
--


-- --------------------------------------------------------

--
-- Структура для представления `vauthuser`
--
DROP VIEW IF EXISTS `vauthuser`;
CREATE VIEW `vauthuser` AS
select
`user`.`u_ID` AS `vau_ID`,`user`.`u_User_Name` AS `vau_username`,`user`.`u_Password` AS `vau_password`,
`user`.`u_Role_ID` AS `vau_role_id`,`user_role`.`ur_title` AS `vau_role_title`,`user_role`.`ur_role` AS `vau_role`,
`user`.`u_Homebase_ID` AS `vau_homebase_id`, `user`.`u_First_Name` AS `vau_First_Name`,
`user`.`u_Last_Name` AS `vau_Last_Name`, `homebase`.`h_Name` AS `vau_homebase_code`,
`user`.`u_Company_ID` AS `vau_company_id`,`company`.`c_Name` AS `vau_company_code`,`depot`.`dp_Name` AS `vau_depot_name`,
`parent_company`.`pc_Name` AS `vau_parent_company_code`
from
(((((`user` join `company` on((`user`.`u_Company_ID` = `company`.`c_id`)))
left join `parent_company` on((`company`.`c_Parent_Company_Account_Number` = `parent_company`.`pc_id`)))
join `user_role` on((`user`.`u_Role_ID` = `user_role`.`ur_ID`)))
join `homebase` on((`user`.`u_Homebase_ID` = `homebase`.`h_id`)))
left join `depot` on((`user`.`u_Depot_ID` = `depot`.`dp_id`)));

COMMIT;
