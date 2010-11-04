CREATE TABLE `nsc2010`.`user_acceess1` (
`ua1ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`ua1_title` VARCHAR( 20 ) NOT NULL
) ENGINE = InnoDB ;

INSERT INTO `nsc2010`.`user_acceess1` (`ua1ID` ,`ua1_title` )VALUES
(NULL , 'NSC USERS'),
(NULL , 'CUSTOMER USERS'),
(NULL , 'EXTERNAL USERS');

CREATE TABLE `nsc2010`.`user_acceess2` (
`ua2ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`ua2_ua1ID` int NOT NULL,
`ua2_title` varchar(20)
) ENGINE = InnoDB;

INSERT INTO `nsc2010`.`user_acceess2` (`ua2ID` ,`ua2_ua1ID` ,`ua2_title` )VALUES
(NULL , '1', 'Level 1'),
(NULL , '1', 'Level 2'),
(NULL , '1', 'Level 3'),
(NULL , '1', 'Level 4'),
(NULL , '2', 'Level 1'),
(NULL , '2', 'Level 2'),
(NULL , '2', 'Level 3'),
(NULL , '3', 'Auditor'),
(NULL , '3', 'Insurance');

CREATE TABLE `nsc2010`.`user_access_title` (
`uatID` INT NOT NULL ,
`uat_title` VARCHAR( 100 ) NOT NULL,
 UNIQUE KEY `user_access_title` (`uatID`,`uat_title`)
) ENGINE = InnoDB;

INSERT INTO `nsc2010`.`user_access_title` (`uatID` ,`uat_title` )
VALUES ('1', 'CEO, GM, Operations Manager'),
('2', 'Manager'),
('3', 'Employee (Trained)'),
('4', 'Office (Clerical, Temp or In the Field)'),
('5', 'Super Administrator'),
('6', 'System Manager'),
('7', 'Office'),
('8', 'Read Only'),
('9', 'Read Only');

ALTER TABLE `tuser` CHANGE `UserType` `UserTypeID` INT NULL DEFAULT '8'
