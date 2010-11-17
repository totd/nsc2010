SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;

--
-- `company`
--

INSERT INTO `company` (`c_id`, `c_Parent_Company_Account_Number`, `c_Number`, `c_EIN`, `c_SSN`, `c_DOT_Number`, `c_Carrier_Number`, `c_Name`, `c_Contact_Table_ID`, `c_Annual_Support`, `c_DOT_Regulated`) VALUES
(1, 1, 'c1', NULL, NULL, NULL, NULL, 'c1', 0, '', '');

--
-- `contacts_table`
--

INSERT INTO `contacts_table` (`ct_ID`, `ct_Contact`, `ct_Contact_Title`, `ct_Telephone_Number`, `ct_Contact_Fax`, `ct_Contact_Email`, `ct_Address1`, `ct_Address2`, `ct_City`, `ct_State`, `ct_Postal_Code`, `ct_Country_Code`, `ct_Start_Date`, `ct_Created_Date_Time`, `ct_URL`, `ct_Memo`) VALUES
(1, 'qwe', 'qwe qwe', '12312312', '123123', 'qwe@qwe.qwe', 'qwqe qwsada sdqw d12', 'asd asd231d 2', 'Qweqw', 2, '12312', NULL, '2010-11-09', '2010-11-16 10:01:29', NULL, 'asd asjd lkasj hdasj flsadf jadsj fhdsa gfasdkfarskyeg ek fas fbdsdjf aksgf avskafshf kasjd'),
(2, 'asd', 'asd', '123122221', '112311123', 'qqasa@assd.as', '12asd asd asds321 easd', NULL, 'Adsd-as', 22, '21221', NULL, '2010-11-03', '2010-11-16 13:41:39', NULL, NULL);


--
-- `custom_document__fax_status`
--

INSERT INTO `custom_document__fax_status` (`cdfs_id`, `cdfs_status`) VALUES
(1, 'PENDING'),
(2, 'SENT'),
(3, 'ERROR');



--
-- `custom_document__form_status`
--

INSERT INTO `custom_document__form_status` (`cdfms_id`, `cdfms_status`) VALUES
(4, 'Vehicle Registration'),
(5, 'Vehicle Insurance'),
(6, 'Vehicle Other'),
(7, 'Vehicle State Inspection Report'),
(8, 'Vehicle Federal Inspection Report'),
(9, 'Vehicle Maintenance Report/Record'),
(10, 'Vehicle Receipts of Repair'),
(11, 'Vehicle Roadside Inspection Report');



--
-- `depot`
--

INSERT INTO `depot` (`d_id`, `d_HomeBase_Account_Number`, `d_Name`, `d_Contact_Table_ID`, `d_Annual_Support`, `d_Road_Test_Record_Required`, `d_DOT_Regulated`) VALUES
(1, 1, 'dep1', 0, '', '', ''),
(2, 1, 'dep2', 1, 'No', 'No', 'Yes');

--
-- `driver`
--

INSERT INTO `driver` (`d_ID`, `d_homebase_ID`, `d_depot_ID`, `d_Driver_Alternate_ID`, `d_Driver_SSN`, `d_Entry_Date`, `d_Employment_Type`, `d_Account`, `d_First_Name`, `d_Middle_Name`, `d_Last_Name`, `d_Gender`, `d_Hair_Color`, `d_Eye_Color`, `d_Height_Feet`, `d_Height_Inches`, `d_Date_Of_Birth`, `d_Date_Of_Hire`, `d_Description`, `d_Telephone_Number1`, `d_Telephone_Number2`, `d_Telephone_Number3`, `d_Fax`, `d_Status`, `d_Total Miles Driven`, `d_Physical_Exam_Date`, `d_Doctor_Name`, `d_Medical_Card_Issue_Date`, `d_Medical_Card_Expiration_Date`, `d_DOT_Regulated`) VALUES
(1, 1, NULL, '123', '123-223-123', '2010-11-04 00:00:00', 4, NULL, 'test1', 'rr', 'test1', 1, 3, 1, 9, 3, '2010-11-01', '2010-11-03', 'test', '123123123', NULL, NULL, NULL, 1, 1122, '2010-11-03', 'doctor 1', '2010-11-03', '2010-11-30', 'Yes'),
(2, 1, NULL, NULL, '222-333-444', '2010-11-01 00:00:00', 4, NULL, 'driver nave 2', 'Driver-mid-name2', 'Driver-last-name2', 2, 1, 4, 3, 1, '1995-11-23', '2010-11-01', 'asdas dasd asd as', '123123123', NULL, NULL, NULL, 1, NULL, '2010-11-06', 'doctor name 2', '2010-11-01', '2010-11-30', 'No'),
(3, 1, NULL, NULL, '123456789', '2010-11-05 00:11:33', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1990-12-12', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, '123426789', '2010-11-05 00:12:25', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1990-12-12', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, '121212131', '2010-11-05 00:21:47', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, '123123111', '2010-11-15 22:27:09', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-10', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, '445456567', '2010-11-16 13:23:39', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-10', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- `driver_address_history`
--

INSERT INTO `driver_address_history` (`dah_ID`, `dah_Driver_ID`, `dah_Start_Date`, `dah_End_Date`, `dah_Current_Address`, `dah_Address1`, `dah_Address2`, `dah_City`, `dah_State`, `dah_Postal_Code`, `dah_Country_Code`, `dah_Phone`, `dah_row_created`) VALUES
(1, 7, '2010-11-11', '2010-11-10', 'YES', 'erewr wer wrw#%$', NULL, 'w2', 3, '33433', NULL, '652323231', '2010-11-16 12:23:22'),
(2, 7, '2010-11-11', '2010-12-11', 'NO', 'erewr we23', NULL, 'wsad', 3, '33433', NULL, '652323231', '2010-11-17 11:11:11');



--
-- `driver__employment_type`
--

INSERT INTO `driver__employment_type` (`det_id`, `det_type`) VALUES
(1, 'Company'),
(2, 'Owner'),
(3, 'Operator'),
(4, 'Employer'),
(5, 'Other');


--
-- `driver__eye_color`
--

INSERT INTO `driver__eye_color` (`dhc_id`, `dhc_type`) VALUES
(1, 'Blue'),
(2, 'Brown'),
(3, 'Green'),
(4, 'Hazle'),
(5, 'Other');


--
-- `driver__gender`
--

INSERT INTO `driver__gender` (`dg_id`, `dg_type`) VALUES
(1, 'Male'),
(2, 'Female');


--
-- `driver__hair_color`
--

INSERT INTO `driver__hair_color` (`dhc_id`, `dhc_type`) VALUES
(1, 'Black'),
(2, 'Brown'),
(3, 'Blonde'),
(4, 'White'),
(5, 'Grey'),
(6, 'Other');



--
-- `driver__status`
--

INSERT INTO `driver__status` (`ds_id`, `ds_type`) VALUES
(1, 'Pending'),
(2, 'Applicant'),
(3, 'Hired - Active'),
(4, 'Hired - Inactive'),
(5, 'Terminated');





--
-- `equipment_types`
--

INSERT INTO `equipment_types` (`et_type`) VALUES
('Tractor'),
('Straight Truck'),
('Trailer'),
('Dolly');

--
-- `equipment__active_status`
--

INSERT INTO `equipment__active_status` (`eas_id`, `eas_type`) VALUES
(1, 'In Service'),
(2, 'Out of Service'),
(3, 'Terminated');

--
-- `equipment__new_equipment_status`
--

INSERT INTO `equipment__new_equipment_status` (`enes_id`, `enes_type`) VALUES
(1, 'Pending'),
(2, 'Declined'),
(3, 'Completed');

--
-- `homebase`
--
INSERT INTO `homebase` (`h_id`, `h_Company_Account_Number`, `h_Carrier_Number`, `h_Name`, `h_Contact_Table_ID`, `h_Annual_Support`, `h_Road_Test_Record_Required`, `h_DOT_Regulated`) VALUES
(1, 1, 'hb1', 'hb1', 1, '', '', ''),
(2, 1, NULL, 'Homebase2', 2, 'No', 'Yes', 'Yes'),
(4, 1, NULL, 'Homebase2', 2, 'No', 'Yes', 'Yes'),
(5, 1, NULL, 'Homebase2', 2, 'No', 'Yes', 'Yes');

--
-- `incident__highway_street_travel_direction`
--

INSERT INTO `incident__highway_street_travel_direction` (`ihstd_id`, `ihstd_type`) VALUES
(1, 'North'),
(2, 'South'),
(3, 'East'),
(4, 'West');


--
-- `incident__incident_cause`
--

INSERT INTO `incident__incident_cause` (`iic_id`, `iic_type`) VALUES
(1, 'Weather'),
(2, 'Alcohol'),
(3, 'Drugs'),
(4, 'Roadway Obstruction'),
(5, 'Trip or Fall'),
(6, 'Road Conditions'),
(7, 'Traffic Conditions'),
(8, 'Road Surf Cond'),
(9, 'Traff Contr Devices'),
(10, 'Lighting Conditions'),
(11, 'HaxMat Spill'),
(12, 'Fuel Spill'),
(13, 'Construction');

--
-- `inspection__result`
--

INSERT INTO `inspection__result` (`ir_id`, `ir_type`) VALUES
(1, 'Passed'),
(2, 'Failed - Out of Service'),
(3, 'Failed – Defects Only');

--
-- `parent_company`
--

INSERT INTO `parent_company` (`pc_id`, `pc_Account_Number`, `pc_EIN`, `pc_Name`, `pc_Telephone_Number`, `pc_Contact_Table_ID`, `pc_DOT_Regulated`) VALUES
(1, 'pc1', '', 'pc1', '', 0, '');

--
-- `service_provider__type`
--

INSERT INTO `service_provider__type` (`spt_id`, `spt_type`) VALUES
(1, 'Insurance'),
(2, 'Tow Truck'),
(3, 'Repair');

--
-- `state`
--

INSERT INTO `state` (`s_id`, `s_name`) VALUES
(1, 'AZ'),
(2, 'AK'),
(3, 'AL'),
(4, 'AR'),
(5, 'CA'),
(6, 'CO'),
(7, 'CT'),
(8, 'DC'),
(9, 'DE'),
(10, 'FL'),
(11, 'GA'),
(12, 'HI'),
(13, 'IA'),
(14, 'ID'),
(15, 'IL'),
(16, 'IN'),
(17, 'KS'),
(18, 'KY'),
(19, 'LA'),
(20, 'MA'),
(21, 'MD'),
(22, 'ME'),
(23, 'MI'),
(24, 'MN'),
(25, 'MO'),
(26, 'MS'),
(27, 'MT'),
(28, 'NH'),
(29, 'NC'),
(30, 'ND'),
(31, 'NE'),
(32, 'NJ'),
(33, 'NM'),
(34, 'NV'),
(35, 'NY'),
(36, 'OH'),
(37, 'OK'),
(38, 'OR'),
(39, 'PA'),
(40, 'RI'),
(41, 'SC'),
(42, 'SD'),
(43, 'TN'),
(44, 'TX'),
(45, 'UT'),
(46, 'VA'),
(47, 'VT'),
(48, 'WA'),
(49, 'WI'),
(50, 'WV'),
(51, 'WY');

--
-- `user`
--

INSERT INTO `user` (`u_ID`, `u_User_ID`, `u_Parent_Company_ID`, `u_Company_ID`, `u_Homebase_ID`, `u_Depot_ID`, `u_Role_ID`, `u_User_Name`, `u_Password`, `u_Status`, `u_Title`, `u_Date_Created`, `u_Allowed_Access_To_DQF`, `u_Allowed_Access_To_VIM`, `u_Allowed_Access_To_Accident`, `u_First_Name`, `u_Last_Name`, `u_Email`, `u_Telephone_Number`, `u_Fax`, `u_Address1`, `u_Address2`, `u_City`, `u_State`, `u_Postal_Code`) VALUES
(1, NULL, 1, 1, 1, 1, 1, 'root', 'root', 1, NULL, '2010-10-28 14:15:10', '', '', '', 'Admin', 'Super', '', '', NULL, '', NULL, '', 1, ''),
(2, NULL, 1, 1, 1, 1, 11, 'user', 'user', 1, NULL, '2010-10-28 15:17:59', '', '', '', 'User', 'Simple', '', '', NULL, '', NULL, '', 2, ''),
(3, NULL, 1, 1, 1, 1, 11, 'test', 'test', 1, '', '2010-10-26 10:10:10', '', '', '', 'test', 'test', '', '', '', '', '', '', 3, '');

--
-- `user_role`
--

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


--
-- `user__status`
--

INSERT INTO `user__status` (`us_id`, `us_type`) VALUES
(1, 'ACTIVE'),
(2, 'INACTIVE'),
(3, 'TERMINATED');

COMMIT;
