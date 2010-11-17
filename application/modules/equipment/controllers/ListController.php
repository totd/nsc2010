<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Default controller of the equipment module.
 */
class Equipment_ListController extends Zend_Controller_Action
{
    public function preDispatch(){
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Deafault action.
     */
    public function indexAction($options = null)
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
            $step = 20;
        }


        if (is_null($options)) {
            if ($this->_request->isPost()) {
                $options['SearchBy'] = $this->_request->getPost('SearchBy');
                $options['SearchText'] = $this->_request->getPost('SearchText');
                $status = $options['Status'] = $this->_request->getPost('Status');
            }
        } elseif (!isset($options['SearchBy']) || !isset($options['Status']) || !isset($options['SearchText'])) {
            $this->_redirect('/equipment/list');
        }

        $this->view->status = $status;
        $this->view->from = $from;
        $this->view->step = $step;

        $equipment = new Equipment_Model_Equipment();
        $options['Status'] = $status;
        $equipments = $equipment->getEquipmentList($from, $step, $options);
        if (sizeof($equipments) > 0) {
            $this->view->equipments = $equipments['limitEquipments'];
            $this->view->allEquipments = $equipments['totalCount'];
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
        $this->view->pageTitle = 'LIST OF VENDORS NOT JOINED TO THE VEHICLE';
        $statuses = array(
            'Pending' => array(
                'text' => 'Pending'
            ),
            'Declined' => array(
                'text' => 'Declined'
            ),
            'All' => array(
                'text' => 'All'
            )
        );

        $filterFields = array (
            '-' => array(
                    'text' => '-'
                ),
            'e_Unit_Number' => array(
                    'text' => 'ID'
                ),
            'e_Number' => array(
                    'text' => 'VIN'
                ),
            'e_Gross_Vehicle_Weight_Rating' => array(
                    'text' => 'GVW'
                ),
            'e_license_Number' => array(
                    'text' => 'Lic. Plate #'
                ),
            'e_Axles' => array(
                    'text' => '# of axles'
                )
        );
        if (isset($options['SearchBy']) && isset($options['SearchText'])) {
            foreach ($filterFields as $key => &$value) {
                if ($options['SearchBy'] == $key) {
                    $value['selected'] = true;
                    $this->view->searchText = $options['SearchText'];
                    break;
                }
            }
        } else {
            $filterFields['-']['selected'] = 'true';
        }
        $this->view->filterFields = $filterFields;

        foreach ($statuses as $key => &$value) {
            if ($status == $key) {
                $value['selected'] = true;
                break;
            }
        }
        $this->view->statuses = $statuses;

        $this->view->headScript()->appendFile('/js/jquery.url.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/equipment/list.js', 'text/javascript');
        
    }
}

