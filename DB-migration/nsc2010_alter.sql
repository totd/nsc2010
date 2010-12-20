SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_Company_2_Parent_Company__pc_id` FOREIGN KEY (`c_Parent_Company_Account_Number`) REFERENCES `parent_company` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `custom_document`
--
ALTER TABLE `custom_document`
  ADD CONSTRAINT `fk_custom_document_company1` FOREIGN KEY (`cd_Company_ID`) REFERENCES `company` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_custom_document_driver1` FOREIGN KEY (`cd_Driver_ID`) REFERENCES `driver` (`d_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_custom_document_homebase1` FOREIGN KEY (`cd_Homebase_ID`) REFERENCES `homebase` (`h_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`dp_HomeBase_Account_Number`) REFERENCES `homebase` (`h_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `driver_address_history`
--
ALTER TABLE `driver_address_history`
  ADD CONSTRAINT `fk_driver_address_history_driver1` FOREIGN KEY (`dah_Driver_ID`) REFERENCES `driver` (`d_ID`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `driver_service_hours`
--
ALTER TABLE `driver_service_hours`
  ADD CONSTRAINT `fk_driver_service_hours_driver1` FOREIGN KEY (`dsh_Driver_ID`) REFERENCES `driver` (`d_ID`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `equipment_assignment`
--
ALTER TABLE `equipment_assignment`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`ea_owner_id`) REFERENCES `equipment_owner` (`eo_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_homebase_id` FOREIGN KEY (`ea_homebase_id`) REFERENCES `homebase` (`h_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipment_id` FOREIGN KEY (`ea_equipment_id`) REFERENCES `equipment` (`e_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `equipment_identifier`
--
ALTER TABLE `equipment_identifier`
  ADD CONSTRAINT `fk_equipment_identifier_equipment1` FOREIGN KEY (`ei_Equipment_Number_ID`) REFERENCES `equipment` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `equipment_maintenance`
--
ALTER TABLE `equipment_maintenance`
  ADD CONSTRAINT `fk_equipment_maintenance_equipment1` FOREIGN KEY (`em_Equipment_ID`) REFERENCES `equipment` (`e_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipment_maintenance_service_provider1` FOREIGN KEY (`em_Service_Provider_ID`) REFERENCES `service_provider` (`sp_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `homebase`
--
ALTER TABLE `homebase`
  ADD CONSTRAINT `homebase_ibfk_1` FOREIGN KEY (`h_Company_Account_Number`) REFERENCES `company` (`c_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `incident_investigator`
--
ALTER TABLE `incident_investigator`
  ADD CONSTRAINT `fk_incident_investigator_company1` FOREIGN KEY (`ii_Company_ID`) REFERENCES `company` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incident_investigator_driver1` FOREIGN KEY (`ii_Driver_ID`) REFERENCES `driver` (`d_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `fk_inspection_equipment1` FOREIGN KEY (`ins_Equipment_ID`) REFERENCES `equipment` (`e_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inspection_inspection_types1` FOREIGN KEY (`ins_Type_ID`) REFERENCES `inspection_types` (`it_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `service_provider__company_assignment`
--
ALTER TABLE `service_provider__company_assignment`
  ADD CONSTRAINT `fk_service_provider__company_assignment_company1` FOREIGN KEY (`spсa_Company_ID`) REFERENCES `company` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_provider__company_assignment_service_provider1` FOREIGN KEY (`spсa_Service_Provider_ID`) REFERENCES `service_provider` (`sp_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `service_provider__insurance`
--
ALTER TABLE `service_provider__insurance`
  ADD CONSTRAINT `fk_service_provider__insurance_insurance1` FOREIGN KEY (`spi_Insurance_Company_ID`) REFERENCES `insurance` (`i_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_provider__insurance_service_provider1` FOREIGN KEY (`spi_Service_Provider_ID`) REFERENCES `service_provider` (`sp_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_company1` FOREIGN KEY (`u_Company_ID`) REFERENCES `company` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_depot1` FOREIGN KEY (`u_Depot_ID`) REFERENCES `depot` (`dp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_homebase1` FOREIGN KEY (`u_Homebase_ID`) REFERENCES `homebase` (`h_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_parent_company1` FOREIGN KEY (`u_Parent_Company_ID`) REFERENCES `parent_company` (`pc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_user_role1` FOREIGN KEY (`u_Role_ID`) REFERENCES `user_role` (`ur_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

COMMIT;
