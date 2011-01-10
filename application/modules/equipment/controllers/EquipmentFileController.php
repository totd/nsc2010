<?php
class Equipment_EquipmentFileController extends Zend_Controller_Action
{
    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function indexAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
        }

        if (!is_null($id) && !empty($id)) {
            $equipmentModel = new Equipment_Model_Equipment();
            $equipmentRow = $equipmentModel->getRow($id);

            if (!$equipmentRow) {
                $this->view->errorMessage = "Equipment doesn't exist.";
                $this->_redirect("/equipment/truck-files");
            }

            $row = $equipmentModel->findEquipmentByVIN($equipmentRow->e_Number);

            $this->view->equipmentRow = $row;

            $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
            if (isset($row['eas_type']) && $row['eas_type'] == 'Terminated') {
                $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/archives">Archives</a>&nbsp;&gt;';
            } else {
                $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/truck-files">Truck Files</a>&nbsp;&gt;';
            }
            $this->view->breadcrumbs .= '&nbsp;Equipment File';

            $this->view->pageTitle = 'Equipment File';
        }
    }

    public function changeActiveStatusAction($id = null, $status = null)
    {
        $equipmentModel = new Equipment_Model_Equipment();

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();

            if (isset($data['e_id']) && !empty($data['e_id'])) {
                $row['e_id'] = $data['e_id'];

                if (isset($data['cancelChangeSubmit'])) {
                    $this->_redirect("/equipment/equipment-file/index/id/{$data['e_id']}");
                }
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

            $this->_redirect("/equipment/truck-files");
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
                $this->_redirect("/equipment/truck-files");
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
            $this->view->headScript()->appendFile('/js/equipment/change-active-status.js', 'text/javascript');
            $this->view->headLink()->appendStylesheet('/css/main.css');


            if (!empty($status)) {
                switch ($status) {
                    case 'In Service':
                        $this->view->actionLabel = 'Put in Service';
                        break;
                    case 'Out of Service':
                        $this->view->actionLabel = 'Out of Service';
                        break;
                }
            }
        } else {
            $this->_redirect("/equipment/truck-files");
        }
    }
}