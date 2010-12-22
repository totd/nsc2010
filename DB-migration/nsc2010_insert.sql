
--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`c_id`, `c_Parent_Company_Account_Number`, `c_Number`, `c_EIN`, `c_SSN`, `c_DOT_Number`, `c_Carrier_Number`, `c_Name`, `c_Contact_Table_ID`, `c_Annual_Support`, `c_DOT_Regulated`) VALUES
(1, 1, 'c1', NULL, NULL, NULL, NULL, 'c1', 0, '', '');

--
-- Дамп данных таблицы `contacts_table`
--

INSERT INTO `contacts_table` (`ct_ID`, `ct_Contact`, `ct_Contact_Title`, `ct_Telephone_Number`, `ct_Contact_Fax`, `ct_Contact_Email`, `ct_Address1`, `ct_Address2`, `ct_City`, `ct_State`, `ct_Postal_Code`, `ct_Country_Code`, `ct_Start_Date`, `ct_Created_Date_Time`, `ct_URL`, `ct_Memo`) VALUES
(1, 'qwe', 'qwe qwe', '12312312', '123123', 'qwe@qwe.qwe', 'qwqe qwsada sdqw d12', 'asd asd231d 2', 'Qweqw', 2, '12312', NULL, '2010-11-09', '2010-11-16 10:01:29', NULL, 'asd asjd lkasj hdasj flsadf jadsj fhdsa gfasdkfarskyeg ek fas fbdsdjf aksgf avskafshf kasjd'),
(2, 'asd', 'asd', '123122221', '112311123', 'qqasa@assd.as', '12asd asd asds321 easd', NULL, 'Adsd-as', 22, '21221', NULL, '2010-11-03', '2010-11-16 13:41:39', NULL, NULL);

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`country_ID`, `country_name`) VALUES
(1, 'USA'),
(2, 'Canada'),
(3, 'Mexico'),
(4, 'Ukraine');

--
-- Дамп данных таблицы `custom_document`
--


--
-- Дамп данных таблицы `custom_document__fax_status`
--

INSERT INTO `custom_document__fax_status` (`cdfs_id`, `cdfs_status`) VALUES
(1, 'PENDING'),
(2, 'SENT'),
(3, 'ERROR');

--
-- Дамп данных таблицы `custom_document__form_category`
--

INSERT INTO `custom_document__form_category` (`cdfc_ID`, `cdfc_name`) VALUES
(1, 'APPLICATION FORMS'),
(2, 'RENEWAL AND TERMINATION FORMS');

--
-- Дамп данных таблицы `custom_document__form_name`
--

INSERT INTO `custom_document__form_name` (`cdfn_ID`, `cdfn_category_id`, `cdfn_name`) VALUES
(1, 1, 'Application For Employment'),
(2, 1, 'Certification Of Compliance With Driver License Requirements'),
(3, 1, 'Employment Eligibility Verification'),
(4, 1, 'Request For Information From Previous Employer'),
(5, 1, 'Request/Consent For Alcohol And Controlled Substance Information'),
(6, 1, 'Request for Motor Vehicle Report'),
(7, 1, 'Record Of Road Test'),
(8, 1, 'Driver Data Sheet'),
(9, 2, 'Certification Of Violations'),
(10, 2, 'Medical Card'),
(11, 2, 'Commercial Driver License'),
(12, 2, 'Social Security Card'),
(13, 2, 'Motor Vehicle Report (MVR)'),
(14, 2, 'Driver''s Physical Examination Form');

--
-- Дамп данных таблицы `custom_document__form_status`
--

INSERT INTO `custom_document__form_status` (`cdfms_id`, `cdfms_status`) VALUES
(4, 'EIN Registration'),
(5, 'EIN Insurance'),
(6, 'EIN Other'),
(7, 'EIN State Inspection Report'),
(8, 'EIN Federal Inspection Report'),
(9, 'EIN Maintenance Report/Record'),
(10, 'EIN Receipts of Repair'),
(11, 'EIN Roadside Inspection Report');

--
-- Дамп данных таблицы `depot`
--

INSERT INTO `depot` (`dp_id`, `dp_HomeBase_Account_Number`, `dp_Name`, `dp_Contact_Table_ID`, `dp_Annual_Support`, `dp_Road_Test_Record_Required`, `dp_DOT_Regulated`) VALUES
(1, 1, 'dep1', 0, '', '', ''),
(2, 1, 'dep2', 1, 'No', 'No', 'Yes');

--
-- Дамп данных таблицы `driver`
--

INSERT INTO `driver` (`d_ID`, `d_homebase_ID`, `d_depot_ID`, `d_Driver_Alternate_ID`, `d_Driver_SSN`, `d_Entry_Date`, `d_Employment_Type`, `d_Suffix`, `d_Account`, `d_First_Name`, `d_Middle_Name`, `d_Last_Name`, `d_Gender`, `d_Hair_Color`, `d_Eye_Color`, `d_Height_Feet`, `d_Height_Inches`, `d_Date_Of_Birth`, `d_Date_Of_Hire`, `d_Description`, `d_Telephone_Number1`, `d_Telephone_Number2`, `d_Telephone_Number3`, `d_Fax`, `d_Status`, `d_Total Miles Driven`, `d_Physical_Exam_Date`, `d_Doctor_Name`, `d_Medical_Card_Issue_Date`, `d_Medical_Card_Expiration_Date`, `d_DOT_Regulated`, `d_TWIC`, `d_TWIC_expiration`, `d_R_A`, `d_R_A_expiration`, `d_last_update_date`) VALUES
(1, 1, 1, '123', '123223123', '2010-11-04 00:00:00', 2, '', NULL, 'test1', 'rr', 'esdfsdf', 1, 1, 2, 1, 1, '2010-11-01', '2010-11-03', 'test', '123123123', '', '', NULL, 1, 1122, '2010-11-03', 'doctor 1', '2010-11-03', '2010-11-30', 'Yes', '', NULL, '', NULL, '2010-12-20 13:47:17'),
(2, 1, NULL, NULL, '222333444', '2010-11-01 00:00:00', 4, NULL, NULL, 'driver nave 2', 'Driver-mid-name2', 'Driver-last-name2', 2, 1, 4, 3, 1, '1995-11-23', '2010-11-01', 'asdas dasd asd as', '123123123', NULL, NULL, NULL, 1, NULL, '2010-11-06', 'doctor name 2', '2010-11-01', '2010-11-30', 'No', NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, NULL, '123456789', '2010-11-05 00:11:33', 4, '', NULL, 'asd', '', 'asd', 1, NULL, NULL, NULL, NULL, '1990-12-12', NULL, NULL, '123123123', '', '', NULL, 2, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '', NULL, '2010-12-22 22:07:57'),
(4, 1, NULL, NULL, '123426789', '2010-11-05 00:12:25', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1990-12-12', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, '121212131', '2010-11-05 00:21:47', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, '123123111', '2010-11-15 22:27:09', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-10', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, '445456567', '2010-11-16 13:23:39', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-10', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, '111111115', '2010-11-23 23:16:35', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-01', NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, '123123123', '2010-11-23 23:17:47', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-10', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, '123123333', '2010-11-24 11:22:41', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, '321321321', '2010-11-24 11:22:59', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-08-04', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 2, NULL, '321321322', '2010-11-24 11:24:58', 4, NULL, NULL, 'ewrwer', '', 'werwer', 2, 3, 5, 4, 7, '2010-11-01', NULL, NULL, '234234234', '', '', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, '234234234', '2010-11-24 11:32:31', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-11-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 2, NULL, '000000005', '2010-11-24 18:51:20', 4, NULL, NULL, 'sdf sdf', 'dsf fd sd', 'sdf df ', 2, 3, 3, 8, 6, '2010-11-01', NULL, NULL, '3242342332', '', '234234234', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, '122212312', '2010-12-20 11:59:44', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2010-12-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- Дамп данных таблицы `driver_service_hours`
--


--
-- Дамп данных таблицы `driver__employment_type`
--

INSERT INTO `driver__employment_type` (`det_id`, `det_type`) VALUES
(1, 'Company'),
(2, 'Owner'),
(3, 'Operator'),
(4, 'Employer'),
(5, 'Other');

--
-- Дамп данных таблицы `driver__equipment_operated`
--

INSERT INTO `driver__equipment_operated` (`deo_ID`, `deo_Driver_ID`, `deo_Equipment_Type_ID`, `deo_is_operated`, `deo_From_Date`, `deo_To_Date`, `deo_Total_Miles`) VALUES
(1, 2, 2, 'Yes', '2010-12-02', '2010-12-02', 2123.21),
(2, 2, 5, 'Yes', '2005-05-05', '2005-05-05', 23.00),
(4, 2, 6, 'Yes', '2010-12-31', '2010-12-31', 123.43),
(9, 2, 1, 'Yes', '2010-12-01', '2010-12-01', 1.00),
(12, 2, 11, 'Yes', '2010-12-01', '2010-12-31', 23.00),
(13, 5, 1, 'Yes', '1998-01-01', '2010-12-28', 2323.00),
(15, 5, 8, 'Yes', '2010-12-01', '2010-12-31', 54645.00),
(16, 3, 1, 'Yes', '2010-12-01', '2010-12-31', 12.00),
(18, 3, 4, 'Yes', '1998-12-18', '2010-12-31', 23.00);

--
-- Дамп данных таблицы `driver__eye_color`
--

INSERT INTO `driver__eye_color` (`dhc_id`, `dhc_type`) VALUES
(1, 'Blue'),
(2, 'Brown'),
(3, 'Green'),
(4, 'Hazle'),
(5, 'Other');

--
-- Дамп данных таблицы `driver__gender`
--

INSERT INTO `driver__gender` (`dg_id`, `dg_type`) VALUES
(1, 'Male'),
(2, 'Female');

--
-- Дамп данных таблицы `driver__hair_color`
--

INSERT INTO `driver__hair_color` (`dhc_id`, `dhc_type`) VALUES
(1, 'Black'),
(2, 'Brown'),
(3, 'Blonde'),
(4, 'White'),
(5, 'Grey'),
(6, 'Other');

--
-- Дамп данных таблицы `driver__hos`
--

INSERT INTO `driver__hos` (`dhos_ID`, `dhos_Driver_ID`, `dhos_date`, `dhos_hours`) VALUES
(1, 1, '2010-12-15', 2),
(2, 1, '2010-12-16', 2),
(3, 1, '2010-12-17', 3),
(4, 1, '2010-12-18', 4),
(5, 1, '2010-12-19', 5),
(6, 1, '2010-12-20', 6),
(7, 1, '2010-12-21', 7);

--
-- Дамп данных таблицы `driver__lrfw`
--

INSERT INTO `driver__lrfw` (`dlrfw_Driver_ID`, `dlrfw_date`, `dlrfw_from_time`) VALUES
(1, '2010-12-14', '11:11');

--
-- Дамп данных таблицы `driver__previous_employment`
--

INSERT INTO `driver__previous_employment` (`dpe_ID`, `dpe_Driver_ID`, `dpe_Employer_ID`, `dpe_Employment_Start_Date`, `dpe_Employment_Stop_Date`, `dpe_Position`, `dpe_Salary`, `dpe_Reason_for_Leaving`) VALUES
(8, 1, 18, '2010-12-21', '2010-12-14', 'Driver', '24000', 'Too romantic for this job'),
(10, 1, 19, '2010-12-21', '2010-12-22', 'Super driver', '42342', 'Too lazy for this job'),
(11, 3, 20, '2010-12-01', '2010-12-31', 'bending unit', '9000', 'to old to wrk'),
(16, 3, 39, '2010-12-01', '2010-12-31', 'Capitan of the spaceship', '100500', 'wut?'),
(18, 3, 20, '2010-12-01', '2010-12-31', 'asd', '123', 'asd');

--
-- Дамп данных таблицы `driver__status`
--

INSERT INTO `driver__status` (`ds_id`, `ds_type`) VALUES
(1, 'Pending'),
(2, 'Applicant'),
(3, 'Hired - Active'),
(4, 'Hired - Inactive'),
(5, 'Terminated');

--
-- Дамп данных таблицы `employer`
--

INSERT INTO `employer` (`emp_ID`, `emp_Employer_Name`, `emp_Address1`, `emp_Address2`, `emp_City`, `emp_State_ID`, `emp_Country_ID`, `emp_Postal_Code`, `emp_Phone`, `emp_Fax`, `emp_DOT_Safety_Sensitive_Function`, `emp_FMCSR`, `emp_approved`) VALUES
(18, 'The Big Simpsons Company', 'Evergreen Terrace, 24', NULL, 'Springfield', 5, 1, '23432', '834932847', '4958395830', 'NO', 'NO', 'YES'),
(19, 'Olde Bender Co. Ltd.', 'Times sq', NULL, 'New York', 35, 1, '12345', '3289742938', '324324234', 'NO', 'NO', 'YES'),
(20, 'Some Company', 'Anywhere 8/64', NULL, 'Bobryjsk', 11, 1, '123332', '123473998', '198384998', 'NO', 'NO', 'YES'),
(32, 'Planet Express', 'Don&acute;t remember', NULL, 'New New-York', 48, 1, '123321', '199232546', '199232546', 'NO', 'NO', 'YES'),
(39, 'Awesome "SupraFirm"', 'Beneding Rodriguez str, 77', NULL, 'Futurama', 18, 1, '123098', '1192342234', '1192342235', 'NO', 'NO', 'YES');

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`e_id`, `e_Number`, `e_Owner_Number`, `e_Unit_Number`, `e_Alternate_ID`, `e_RFID_No`, `e_Entry_Date`, `e_License_Number`, `e_License_Expiration_Date`, `e_Start_Mileage`, `e_Registration_State`, `e_Gross_Equipment_Weight_Rating`, `e_Gross_Equipment_Registered_Weight`, `e_Unladen_Weight`, `e_Axles`, `e_Name`, `e_Year`, `e_Make`, `e_Color`, `e_Model`, `e_Description`, `e_New_Equipment_Status`, `e_Active_Status`, `e_Fee`, `e_Title_Status`, `e_Picture`, `e_DOT_Regulated`, `e_type_id`, `e_activation_date`, `e_activation_comment`, `e_change_active_status_date`, `e_change_active_status_comment`) VALUES
(1, 'test1', '', '1', '', '', '2010-11-24 16:06:37', '1', '2010-11-27', '1', 17, '1', '1', '1', 1, '1', 1976, '1', '1', '1', '1', 3, 3, '', '', 'root_24_11_2010_16_10_14_4942.jpg', 'No', 1, '2010-11-02', '', '2010-11-24', NULL),
(2, 'test01', '', '324234', '', '', '2010-11-24 16:11:09', '23ew', '2010-11-01', '34', 6, '234', '223', 'wer23', 3, '3423', 2000, 'wer3', '34ew', '234234', '4ewefw', 1, NULL, '', '', NULL, 'Yes', 4, NULL, NULL, NULL, NULL),
(3, 'test03', NULL, NULL, NULL, NULL, '2010-11-24 16:20:53', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '88', NULL, NULL, NULL, NULL, '2010-11-24 16:40:17', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'sdfdsf', NULL, NULL, NULL, NULL, '2010-12-19 19:36:14', NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Дамп данных таблицы `equipment_assignment`
--


--
-- Дамп данных таблицы `equipment_identifier`
--


--
-- Дамп данных таблицы `equipment_maintenance`
--


--
-- Дамп данных таблицы `equipment_owner`
--

INSERT INTO `equipment_owner` (`eo_id`, `eo_number`, `eo_code`, `eo_SSN`, `eo_federal_id`, `eo_name`, `eo_contact`, `eo_phone`, `eo_fax`, `eo_address1`, `eo_address2`, `eo_city`, `eo_state_id`, `eo_postal_code`) VALUES
(1, '1', '1', 1, 1, 'TestOwner', '1', 1, 1, '1', '1', '1', 1, 1);

--
-- Дамп данных таблицы `equipment_types`
--

INSERT INTO `equipment_types` (`et_id`, `et_type`) VALUES
(8, 'Bus'),
(7, 'Company Car'),
(4, 'Dolly'),
(6, 'Forklift'),
(11, 'Pole Trailer'),
(5, 'Reefer Unit'),
(1, 'Straight Truck'),
(2, 'Tractor'),
(3, 'Trailer'),
(10, 'Utility Truck'),
(9, 'Van');

--
-- Дамп данных таблицы `equipment__active_status`
--

INSERT INTO `equipment__active_status` (`eas_id`, `eas_type`) VALUES
(1, 'In Service'),
(2, 'Out of Service'),
(3, 'Terminated');

--
-- Дамп данных таблицы `equipment__new_equipment_status`
--

INSERT INTO `equipment__new_equipment_status` (`enes_id`, `enes_type`) VALUES
(1, 'Pending'),
(2, 'Declined'),
(3, 'Completed');

--
-- Дамп данных таблицы `fee`
--


--
-- Дамп данных таблицы `homebase`
--

INSERT INTO `homebase` (`h_id`, `h_Company_Account_Number`, `h_Carrier_Number`, `h_Name`, `h_Contact_Table_ID`, `h_Annual_Support`, `h_Road_Test_Record_Required`, `h_DOT_Regulated`) VALUES
(1, 1, 'hb1', 'hb1', 1, '', '', ''),
(2, 1, NULL, 'Homebase1', 2, 'No', 'Yes', 'Yes'),
(4, 1, NULL, 'Homebase2', 2, 'No', 'Yes', 'Yes'),
(5, 1, NULL, 'Homebase3', 2, 'No', 'Yes', 'Yes');

--
-- Дамп данных таблицы `incident`
--


--
-- Дамп данных таблицы `incident_cause`
--


--
-- Дамп данных таблицы `incident__incident_cause`
--

INSERT INTO `incident_cause` (`ic_id`, `ic_type`) VALUES
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
-- Дамп данных таблицы `incident__investigator`
--


--
-- Дамп данных таблицы `incident__passenger`
--


--
-- Дамп данных таблицы `inspection`
--


--
-- Дамп данных таблицы `inspection_types`
--


--
-- Дамп данных таблицы `inspection__result`
--

INSERT INTO `inspection__result` (`ir_id`, `ir_type`) VALUES
(1, 'Passed'),
(2, 'Failed - Out of Service'),
(3, 'Failed – Defects Only');

--
-- Дамп данных таблицы `insurance`
--


--
-- Дамп данных таблицы `license`
--


--
-- Дамп данных таблицы `medical_history`
--


--
-- Дамп данных таблицы `parent_company`
--

INSERT INTO `parent_company` (`pc_id`, `pc_Account_Number`, `pc_EIN`, `pc_Name`, `pc_Telephone_Number`, `pc_Contact_Table_ID`, `pc_DOT_Regulated`) VALUES
(1, 'pc1', '', 'pc1', '', 0, '');

--
-- Дамп данных таблицы `passenger`
--


--
-- Дамп данных таблицы `role`
--


--
-- Дамп данных таблицы `score`
--


--
-- Дамп данных таблицы `service_provider`
--


--
-- Дамп данных таблицы `service_provider__company_assignment`
--


--
-- Дамп данных таблицы `service_provider__equipment_assignment`
--


--
-- Дамп данных таблицы `service_provider__insurance`
--


--
-- Дамп данных таблицы `service_provider__type`
--

INSERT INTO `service_provider__type` (`spt_id`, `spt_type`) VALUES
(1, 'Insurance'),
(2, 'Tow Truck'),
(3, 'Repair');

--
-- Дамп данных таблицы `state`
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

INSERT INTO `travel_direction` (`td_id`, `td_type`) VALUES
(1, 'North'),
(2, 'South'),
(3, 'East'),
(4, 'West'),
(5, 'North East'),
(6, 'North West'),
(7, 'South East'),
(8, 'South West');


INSERT INTO `user` (`u_ID`, `u_User_ID`, `u_Parent_Company_ID`, `u_Company_ID`, `u_Homebase_ID`, `u_Depot_ID`, `u_Role_ID`, `u_User_Name`, `u_Password`, `u_Status`, `u_Title`, `u_Date_Created`, `u_Allowed_Access_To_DQF`, `u_Allowed_Access_To_VIM`, `u_Allowed_Access_To_Accident`, `u_First_Name`, `u_Last_Name`, `u_Email`, `u_Telephone_Number`, `u_Fax`, `u_Address1`, `u_Address2`, `u_City`, `u_State`, `u_Postal_Code`) VALUES
(1, NULL, 1, 1, 1, 1, 1, 'root', 'root', 1, NULL, '2010-10-28 14:15:10', '', '', '', 'Admin', 'Super', '', '', NULL, '', NULL, '', 1, ''),
(2, NULL, 1, 1, 1, 1, 9, 'user', 'user', 1, NULL, '2010-10-28 15:17:59', '', '', '', 'User', 'Simple', '', '', NULL, '', NULL, '', 2, ''),
(3, NULL, 1, 1, 1, 1, 9, 'test', 'test', 1, '', '2010-10-26 10:10:10', '', '', '', 'test', 'test', '', '', '', '', '', '', 3, '');

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`ur_ID`, `ur_role`, `ur_title`) VALUES
(1, 'NSC_LEVEL_1', 'NSC CEO - Operations Manager'),
(2, 'NSC_LEVEL_2', 'NSC Manager'),
(3, 'NSC_LEVEL_3', 'NSC Employee'),
(4, 'NSC_LEVEL_4', 'NSC Office'),
(5, 'CUSTOMER_LEVEL_1', 'Customer Super Administrator'),
(6, 'CUSTOMER_LEVEL_2', 'Customer System Manager'),
(7, 'CUSTOMER_LEVEL_3', 'Customer Office'),
(8, 'EXTERNAL_LEVEL_1', 'External Auditor'),
(9, 'EXTERNAL_LEVEL_2', 'External Insurance');

--
-- Дамп данных таблицы `user__status`
--

INSERT INTO `user__status` (`us_id`, `us_type`) VALUES
(1, 'ACTIVE'),
(2, 'INACTIVE'),
(3, 'TERMINATED');

--
-- Дамп данных таблицы `violation`
--


--
-- Дамп данных таблицы `violation_type`
--


--
-- Дамп данных таблицы `witness`
--

