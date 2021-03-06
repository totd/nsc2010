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
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Deafault action.
     */
    public function indexAction($options = null)
    {
        # TODO implement filling breadcrumbs.
        $this->view->breadcrumbs = "<a href='/equipment/index'>Equipment Management</a>&nbsp;&gt;&nbsp;Equipment List";

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

        if ($this->_getParam('orderBy') != null) {
            $orderBy = $this->_getParam('orderBy');
        } else {
            $orderBy = 'enes_type';
        }

        if ($this->_getParam('orderWay') != null) {
            $orderWay = $this->_getParam('orderWay');
        } else {
            $orderWay = 'ASC';
        }


        if (is_null($options)) {
            if ($this->_request->isPost()) {
                $options['SearchBy'] = $this->_request->getPost('SearchBy');
                $options['SearchText'] = $this->_request->getPost('SearchText');
                $status = $this->_request->getPost('Status');
                $orderBy = $this->_request->getPost('orderBy');
                $orderWay = $this->_request->getPost('orderWay');
            }
        } elseif (!isset($options['SearchBy']) ||
                    !isset($options['Status']) ||
                    !isset($options['SearchText']) ||
                    !isset($options['orderBy']) ||
                    !isset($options['orderWay'])
                ) {
            $this->_redirect('/equipment/list');
        }

        $this->view->status = $status;
        $this->view->from = $from;
        $this->view->step = $step;
        $this->view->orderBy = $orderBy;
        $this->view->orderWay = $orderWay;

        $equipment = new Equipment_Model_Equipment();
        $options['Status'] = $status;
        $options['orderBy'] = $orderBy;
        $options['orderWay'] = $orderWay;
        $equipments = $equipment->getEquipmentList($from, $step, $options);
        if (sizeof($equipments) > 0) {
            $this->view->equipments = $equipments['limitEquipments'];
            $this->view->allEquipments = $equipments['totalCount'];
        } else {
            $this->view->equipments = null;
        }

        $this->view->pageTitle = 'LIST OF EQUIPMENT';
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
            'e_Unit_Number' => array(
                    'text' => 'Unit #'
                ),
            'et_type' => array(
                    'text' => 'Eq. Type'
                ),
            'e_Number' => array(
                    'text' => 'EIN'
                ),
            'e_Gross_Equipment_Weight_Rating' => array(
                    'text' => 'GVW'
                ),
            'e_license_Number' => array(
                    'text' => 'Lic. Plate #'
                ),
            's_Name' => array(
                    'text' => 'State'
                ),
            'e_Axles' => array(
                    'text' => '#Axles'
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
            $filterFields['e_Unit_Number']['selected'] = 'true';
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

