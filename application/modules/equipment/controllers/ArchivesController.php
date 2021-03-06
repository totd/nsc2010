<?php

class Equipment_ArchivesController extends Zend_Controller_Action
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
        $this->view->breadcrumbs = "<a href='/equipment/index'>Equipment Management</a>&nbsp;&gt;&nbsp;Arhives";

        // Set parameters for paginator
        if ($this->_getParam('status') != null) {
            $status = $this->_getParam('status');
        } else {
            $status = 'Terminated';
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
        $equipments = $equipment->getArchivesList($from, $step, $options);
        if (sizeof($equipments) > 0) {
            $this->view->equipments = $equipments['limitEquipments'];
            $this->view->allEquipments = $equipments['totalCount'];
        } else {
            $this->view->equipments = null;
        }

        $this->view->pageTitle = 'Archives';
        $statuses = array(
            'Terminated' => array(
                'text' => 'Terminated'
            ),
            'All' => array(
                'text' => 'All'
            )
        );

        $filterFields = array(
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

    public function terminateAction($id = null, $status = null)
    {
        $equipmentModel = new Equipment_Model_Equipment();

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();

            if (isset($data['e_id']) && !empty($data['e_id'])) {
                $row['e_id'] = $data['e_id'];
            } else {
                $thid->view->errorMessage = 'Equipment ID is undefined';
                $this->_redirect('/equipment/truck-files');
            }


            if (isset($data['e_change_active_status_date'])) {
                try {
                    $myDate = new Zend_Date($data['e_change_active_status_date'], "MM/dd/yyyy");
                    $row['e_change_active_status_date'] = $myDate->toString("yyyy-MM-dd");
                } catch (Exception $e) {

                }
            }

            $row['e_Active_Status'] = $data['e_Active_Status'];

            if (isset($data['e_change_active_status_comment']) && !empty($data['e_change_active_status_comment'])) {
                $row['e_change_active_status_comment'] = $data['e_change_active_status_comment'];
            }

            $equipmentModel->saveEquipment($row);

            $this->_redirect("/equipment/archives");
        }

        if (is_null($id)) {
            $id = $this->_request->getParam('id');
        }

        if (is_null($status)) {
            $status = $this->_request->getParam('status');
            $statusModel = new ActiveStatus_Model_ActiveStatus();
            $statusId = $statusModel->getIdByType($status);
            if ($statusId) {
                $this->view->statusToChange = $statusId;
            }
        }

        if (!is_null($id) && !empty($id)) {
            $equipmentRow = $equipmentModel->getRow($id);

            if (!$equipmentRow) {
                $this->view->errorMessage = "Equipment doesn't exist.";
                $this->_redirect("/equipment/archives");
            }

            $row = $equipmentModel->findEquipmentByVIN($equipmentRow->e_Number);

            $this->view->equipmentRow = $row;

            $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/truck-files">Truck Files</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/equipment-file/index/id/' . $id . '">Equipment File</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;Change Status';

            $auth = Zend_Auth::getInstance();

            // Check whether an identity is set.
            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();

                $this->view->person = "{$identity->vau_First_Name} {$identity->vau_Last_Name}";
            }

            $date = new Zend_Date();
            $this->view->currentDate = $date->toString("MM/dd/yyyy");

            $this->view->pageTitle = 'Change Equipment Status';
            $this->view->headScript()->appendFile('/js/equipment/terminate.js', 'text/javascript');
            $this->view->headLink()->appendStylesheet('/css/main.css');


            $this->view->actionLabel = 'Terminate';

        } else {
            $this->_redirect("/equipment/archives");
        }
    }
}

