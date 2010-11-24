<?php

class Equipment_TruckFilesController extends Zend_Controller_Action
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

    public function indexAction($options = null)
    {
        # TODO implement filling breadcrumbs.
        $this->view->breadcrumbs = "<a href='/equipment/index'>Equipment Management</a>&nbsp;&gt;&nbsp;Truck Files";

        // Set parameters for paginator
        if ($this->_getParam('status') != null) {
            $status = $this->_getParam('status');
        } else {
            $status = 'In Service';
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
            $orderBy = 'eas_type';
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
            $this->_redirect('/equipment/truckFiles');
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
        $equipments = $equipment->getTruckFilesList($from, $step, $options);
        if (sizeof($equipments) > 0) {
            $this->view->equipments = $equipments['limitEquipments'];
            $this->view->allEquipments = $equipments['totalCount'];
        } else {
            $this->view->equipments = null;
        }

        $this->view->pageTitle = 'Truck Fleet Services';
        $statuses = array(
            'In Service' => array(
                'text' => 'In Service'
            ),
            'Out of Service' => array(
                'text' => 'Out of Service'
            ),
            'All' => array(
                'text' => 'All'
            )
        );

        $filterFields = array(
            '-' => array(
                'text' => '-'
            ),
            'e_Unit_Number' => array(
                'text' => 'Unit #'
            ),
            'et_type' => array(
                'text' => 'Veh. Type'
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

