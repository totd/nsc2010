-- Data for testing
INSERT INTO `thomebase` (`HomeBaseID`, `CompanyID`, `HomeBaseName`, `HomeBaseCode`, `Address`, `City`, `State`, `Zip`,
`Telephone`, `Fax`, `Status`, `StartDate`, `Created`, `Url`, `DQFModul`, `TruckModul`, `NewDriverRate`,
`MonthlyDriverRate`, `NewVehicleRate`, `MonthlyVehicleRate`, `RenewDriverRate`, `NewTruckRate`, `MonthlyTruckRate`)
VALUES (1, -1, '', 'qwe123', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00',
'https://www.driverqualificationonline.com/nschanson', 'Yes', 'No', 65, 2.5, 19.95, 1.65, 0, 19.95, 1.65);

INSERT INTO `tcompany` (`CompanyID`, `CompanyName`, `CompanyCode`, `Address`, `City`, `State`, `Zip`, `Telephone`,
`Fax`, `Created`, `P1FirstName`, `P1LastName`, `P1Title`, `P1Telephone`, `P1Email`, `P1Role`, `P1Status`, `Url`)
VALUES (1, 'test', 'asd456', '', '', '', '', '', '', '2010-10-27 10:30:41', '', '', '', '', '', '', '',
'https://www.driverqualificationonline.com/nschanson');

INSERT INTO `tuser` (`UserTypeID`, `StaffID`, `HomeBaseID`, `DepotID`, `CompanyID`, `Username`, `Password`, `Agreed`)
VALUES (1, 0, 1, 0, 1, 'root', 'root', 0);
--


-- Create view for login
CREATE OR REPLACE VIEW `vauthuser` AS
SELECT
`tuser`.`UserID` AS `UserID`,
`tuser`.`Username` AS `Username`,
`tuser`.`Password` AS `Password`,
`tuser`.`UserTypeID` AS `UserTypeID`,
`user_access_title`.`uat_title` AS `uat_title`,
`user_access_title`.`uat_role` AS `uat_role`,
`tuser`.`HomeBaseID` AS `HomeBaseID`,
`thomebase`.`HomeBaseCode` AS `HomeBaseCode`,
`tuser`.`CompanyID` AS `CompanyID`,
`tcompany`.`CompanyCode` AS `CompanyCode`, 
`depot`.`d_name` AS `d_name`
FROM `tuser`
INNER JOIN `thomebase` ON `tuser`.`HomeBaseID` = `thomebase`.`HomeBaseID`
INNER JOIN `tcompany` ON `tuser`.`CompanyID` = `tcompany`.`CompanyID`
INNER JOIN `user_access_title` ON `tuser`.`UserTypeID` = `user_access_title`.`id`
LEFT JOIN `depot` ON `tuser`.`DepotID` = `depot`.`d_id`;
-- 


