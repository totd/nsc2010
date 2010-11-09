<?php
/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Default controller of the equipment module.
 */
class Equipment_ListController extends Zend_Controller_Action
{
    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Deafault action.
     */
    public function indexAction()
    {
        $equipments = Equipment_Model_Equipment::getEquipmentList();
        if ($equipments->count() > 0) {
            $this->view->equipments = $equipments;
        } else {
            $this->view->equipments = null;
        }

        // Check whether the user has permission to search equipment.
        $display_search_link = false;

        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->identity = $auth->getIdentity();

            $permission = new Permission_Model_Permission();
            if ($permission->doesRoleHaveResource($this->identity->vau_role, 'equipment/search')) {
                $display_search_link = true;
            }
        }

        $this->view->display_search_link = $display_search_link;
    }
}

