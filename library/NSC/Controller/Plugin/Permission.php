<?php

class NSC_Controller_Plugin_Permission extends  Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->identity = $auth->getIdentity();

            $permission = new Permission_Model_Permission();
            $this->identity->permissions->equipment_create_permission = $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'create-new');
            $this->identity->permissions->equipment_assignment_create_permission = $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'save-assignment');
            $this->identity->permissions->equipment_modify_permission = $permission->doesRoleHaveResource($this->identity->vau_role,
                    'equipment/information-worksheet', 'completed');

            /***** DRIVERS SECTION *****/

            $this->identity->permissions->driver_delete_driver_address_history = $permission->doesRoleHaveResource($this->identity->vau_role,
                    'driver/Ajax-Driver-Address-History', 'delete-Record');
            $this->identity->permissions->see_non_crypt_ssn_permission = $permission->doesRoleHavePermission($this->identity->vau_role, 'seeNonCryptSsn');

        }
    }
}

