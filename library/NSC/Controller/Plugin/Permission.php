<?php

class NSC_Controller_Plugin_Permission extends  Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->identity = $auth->getIdentity();

            $permission = new Permission_Model_Permission();
            $this->identity->permissions->equipment_create_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'create-new');
            $this->identity->permissions->equipment_assignment_create_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'save-assignment');
            $this->identity->permissions->equipment_modify_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'completed');

            /***** MAIONTENANCE SECTION *****/

            $this->identity->permissions->equipment_maintenance_create_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                            'maintenance/maintenance', 'add-equipment-maintenance');
            $this->identity->permissions->equipment_maintenance_delete_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                            'maintenance/maintenance', 'delete-maintenance');
            $this->identity->permissions->equipment_maintenance_modify_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                            'maintenance/maintenance', 'save-maintenance');

            /***** INCIDENT SECTION *****/
            $this->identity->permissions->incident_create_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/create', 'save');
            $this->identity->permissions->incident_modify_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/index', 'save-description');

            $this->identity->permissions->incident_involved_driver_create_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/create', 'add-driver');
            $this->identity->permissions->incident_involved_driver_modify_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/index', 'change-driver');

            $this->identity->permissions->incident_involved_equipment_create_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/index',
                            'add-involved-equipment');
            $this->identity->permissions->incident_involved_equipment_delete_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role,
                            'incident/index', 'delete-involved-equipment');

            $this->identity->permissions->incident_witness_create_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/witness', 'add-witness');
            $this->identity->permissions->incident_witness_delete_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/witness', 'delete-witness');
            $this->identity->permissions->incident_witness_modify_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/witness', 'save-witness');

            $this->identity->permissions->incident_passenger_create_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/passenger', 'add-passenger');
            $this->identity->permissions->incident_passenger_delete_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/passenger',
                            'delete-passenger');
            $this->identity->permissions->incident_passenger_modify_permission = 
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'incident/passenger',
                            'save-passenger');

            /***** VIOLATIONS SECTION *****/
            $this->identity->permissions->violation_create_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'violation/index',
                            'create');
            $this->identity->permissions->violation_modify_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'violation/index',
                            'save');

            /***** SERVICE PROVIDER SECTION *****/
            $this->identity->permissions->service_provider_create_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'serviceProvider/index',
                            'create');
            $this->identity->permissions->service_provider_modify_permission =
                    $permission->doesRoleHaveResource($this->identity->vau_role, 'serviceProvider/index',
                            'save');

            

            /***** DRIVERS SECTION *****/

            $this->identity->permissions->driver_delete_driver_address_history = $permission->doesRoleHaveResource($this->identity->vau_role,
                    'driver/Ajax-Driver-Address-History', 'delete-Record');
            $this->identity->permissions->see_non_crypt_ssn_permission = $permission->doesRoleHavePermission($this->identity->vau_role, 'seeNonCryptSsn');
            $this->identity->permissions->documents_add = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsAdd');
            $this->identity->permissions->documents_delete = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsDelete');
            $this->identity->permissions->documents_edit = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsEdit');
            $this->identity->permissions->documents_add_comment = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsAddComments');
            $this->identity->permissions->documents_delete_comment = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsDeleteComments');
            $this->identity->permissions->documents_edit_comment = $permission->doesRoleHavePermission($this->identity->vau_role, 'documentsEditComments');

        }
    }
}

