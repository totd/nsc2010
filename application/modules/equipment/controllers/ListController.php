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
        # TODO implement filling breadcrumbs.
        $this->view->breadcrumbs = "<a href='#'>Archives</a>&nbsp;&gt;&nbsp;Equipment Profile";

        // Set parameters for paginator
        if ($this->_getParam('status') != null) {
            $status = $this->_getParam('status');
        } else {
            $status = 'Pending';
        }

        if ((int) $this->_getParam('from') != null) {
            $from = $this->_getParam('from');
        } else {
            $from = 0;
        }

        if ((int) $this->_getParam('step') != null) {
            $step = $this->_getParam('step');
        } else {
            $step = 3;
        }

        $this->view->status = $status;
        $this->view->from = $from;
        $this->view->step = $step;

        $equipment = new Equipment_Model_Equipment();
        $equipments = $equipment->getEquipmentList($status, $from, $step);
        if (sizeof($equipments) > 0) {
            $this->view->equipments = $equipments;
            $this->view->allEquipments = $equipment->getEquipmentList();
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

