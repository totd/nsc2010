-- Data for testing
TRUNCATE TABLE `user`;
TRUNCATE TABLE `depot`;
TRUNCATE TABLE `user_role`;
TRUNCATE TABLE `homebase`;
TRUNCATE TABLE `company`;
TRUNCATE TABLE `parent_company`;


INSERT INTO `parent_company` (`pc_id`, `pc_Account_Number`, `pc_EIN`, `pc_Name`, `pc_Telephone_Number`, `pc_Contact`, `pc_Contact_Title`, `pc_Contact_Fax`, `pc_Contact_Email`, `pc_Address1`, `pc_Address2`, `pc_City`, `pc_State`, `pc_Postal_Code`, `pc_Country_Code`, `pc_Start_Date`, `pc_Created_Date_Time`, `pc_URL`, `pc_Memo`, `pc_DOT_Regulated`) VALUES
(1, 'pc1', '', 'pc1', '', '', '', '', '', '', NULL, '', '', '', NULL, '0000-00-00', '2010-10-28 14:03:25', NULL, NULL, '');

INSERT INTO `company` (`c_id`, `c_Parent_Company_Account_Number`, `c_Number`, `c_EIN`, `c_SSN`, `c_DOT_Number`, `c_Carrier_Number`, `c_Name`, `c_Contact`, `c_Contact_Title`, `c_Contact_Telephone_Number`, `c_Contact_Fax`, `c_Contact_Email`, `c_Address1`, `c_Address2`, `c_City`, `c_State`, `c_Postal_Code`, `c_Country_Code`, `c_Start_Date`, `c_Created_Date_Time`, `c_URL`, `c_Memo`, `c_Annual_Support`, `c_DOT_Regulated`) VALUES
(1, 1, 'c1', NULL, NULL, NULL, NULL, 'c1', '', NULL, '', '', '', '', NULL, '', '', '', NULL, '0000-00-00', '2010-10-28 14:04:31', NULL, NULL, '', '');

INSERT INTO `homebase` (`h_id`, `h_Company_Account_Number`, `h_Carrier_Number`, `h_Name`, `h_Contact`, `h_Contact_Title`, `h_Contact_Telephone_Number`, `h_Contact_Fax`, `h_Contact_Email`, `h_Address1`, `h_Address2`, `h_City`, `h_State`, `h_Postal_Code`, `h_Country_Code`, `h_Start_Date`, `h_Created_Date_Time`, `h_URL`, `h_Memo`, `h_Annual_Support`, `h_Road_Test_Record_Required`, `h_DOT_Regulated`) VALUES
(1, 1, 'hb1', 'hb1', '', NULL, '', '', '', '', NULL, '', '', '', NULL, '0000-00-00', '2010-10-28 14:06:44', NULL, NULL, '', '', '');

INSERT INTO `depot` (`d_id`, `d_HomeBase_Account_Number`, `d_Name`, `d_Contact`, `d_Contact_Title`, `d_Contact_Telephone_Number`, `d_Contact_Fax`, `d_Contact_Email`, `d_Address1`, `d_Address2`, `d_City`, `d_State`, `d_Postal_Code`, `d_Country_Code`, `d_Start_Date`, `d_Created_Date_Time`, `d_URL`, `d_Memo`, `d_Annual_Support`, `d_Road_Test_Record_Required`, `d_DOT_Regulated`) VALUES
(1, 1, 'dep1', '', NULL, '', '', '', '', NULL, '', '', '', NULL, '0000-00-00', '2010-10-28 14:14:29', NULL, NULL, '', '', '');

INSERT INTO `user_role` (`ur_ID`, `ur_role`, `ur_title`) VALUES
(1, 'NSC_USERS__Level_0', 'NSC SuperAdmin'),
(2, 'NSC_USERS__Level_1', 'NSC Admin'),
(3, 'NSC_USERS__Level_2', 'NSC Office'),
(4, 'NSC_USERS__Level_3', 'NSC Auditor'),
(5, 'NSC_USERS__Level_4', 'NSC Checker'),
(6, 'CUSTOMER_USERS__Level_0', 'Client User SuperAdmin'),
(7, 'CUSTOMER_USERS__Level_1', 'Client User NationalAdmin'),
(8, 'CUSTOMER_USERS__Level_2', 'Client User RegionalAdmin'),
(9, 'CUSTOMER_USERS__Level_3', 'Client User LocalAdmin'),
(10, 'CUSTOMER_USERS__Level_4', 'Client User Office'),
(11, 'CUSTOMER_USERS__Level_5', 'DEMO');

INSERT INTO `user` (`u_ID`, `u_User_ID`, `u_Parent_Company_ID`, `u_Company_ID`, `u_Homebase_ID`, `u_Depot_ID`, `u_Role_ID`, `u_User_Name`, `u_Password`, `u_Status`, `u_Title`, `u_Date_Created`, `u_Allowed_Access_To_DQF`, `u_Allowed_Access_To_VIM`, `u_Allowed_Access_To_Accident`, `u_First_Name`, `u_Last_Name`, `u_Email`, `u_Telephone_Number`, `u_Fax`, `u_Address1`, `u_Address2`, `u_City`, `u_State`, `u_Postal_Code`) VALUES
(1, NULL, 1, 1, 1, 1, 1, 'root', 'root', 'ACTIVE', NULL, '2010-10-28 14:15:10', '', '', '', '', '', '', '', NULL, '', NULL, '', '', ''),
(2, NULL, 1, 1, 1, 1, 11, 'user', 'user', '', NULL, '2010-10-28 15:17:59', '', '', '', '', '', '', '', NULL, '', NULL, '', '', '');

--

-- Create view for login
CREATE OR REPLACE VIEW `vauthuser` AS
SELECT
`user`.`u_ID` AS `vau_ID`
, `user`.`u_User_Name` AS `vau_username`
, `user`.`u_Password` AS `vau_password`
, `user`.`u_Role_ID` AS `vau_role_id`
, `user_role`.`ur_title` AS `vau_role_title`
, `user_role`.`ur_role` AS `vau_role`
, `user`.`u_Homebase_ID` AS `vau_homebase_id`
, `homebase`.`h_Name` AS `vau_homebase_code`
, `user`.`u_Company_ID` AS `vau_company_id`
, `company`.`c_Name` AS `vau_company_code`
, `depot`.`d_Name` AS `vau_depot_name`
, `parent_company`.`pc_Name` AS `vau_parent_company_code`
FROM `user`
INNER JOIN `company` ON `user`.`u_Company_ID` = `company`.`c_id`
LEFT JOIN `parent_company` ON `company`.`c_Parent_Company_Account_Number` = `parent_company`.`pc_id`
INNER JOIN `user_role` ON `user`.`u_Role_ID` = `user_role`.`ur_ID`
INNER JOIN `homebase` on `user`.`u_HomeBase_ID` = `homebase`.`h_id`
LEFT JOIN `depot` ON `user`.`u_Depot_ID` = `depot`.`d_id`;
-- 


