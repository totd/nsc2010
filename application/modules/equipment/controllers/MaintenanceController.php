<?php
class Equipment_MaintenanceController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function  init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function addMaintenanceAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $dataMaintenance = array();
            $dataMaintenance = $this->_request->getQuery();

            $equipmentId = $dataMaintenance['em_equipment_id'];
            if (!empty($equipmentId)) {
                $dateFieldNameArray = array('em_requested_date', 'em_completed_date', 'em_next_maintenance_date', 
                                            'em_service_date');

                foreach ($dataMaintenance as $key => &$value) {
                    if (in_array($key, $dateFieldNameArray)) {
                        try {
                            $dateZend = new Zend_Date($value, 'MM/dd/yyyy');
                            $value = $dateZend->toString('yyyy-MM-dd');
                        } catch (Exception $e) {
                            $value = '';
                        }
                    }
                }

                $maintenanceModel = new Equipment_Model_Maintenance();
                $saveResult = $maintenanceModel->saveMaintenance($dataMaintenance);

                if (isset($saveResult['row']) && is_array($saveResult['row'])) {
                    $result['result'] = 1;
                    $result['row'] = $saveResult['row'];
                } else if (isset($saveResult['validationError'])) {
                    $result['errorMessage'] = $this->buildValidateErrorMessage($saveResult['validationError']);
                } else if (isset($saveResult['saveError'])) {
                    $result['errorMessage'] = $saveResult['saveError'];
                } else {
                    $result['errorMessage'] = "Error is occurred during a maintenance storing.";
                }
            } else {
                $result['errorMessage'] = "Equipment is required.";
            }
        }

        print json_encode($result);
    }

    private function buildValidateErrorMessage($validationErrorArray)
    {
        $result = '';

        if (isset($validationErrorArray['notExistFields'])) {
            $result = "The following fields don't exist: " .
                                    implode(", ", $validationErrorArray['notExistFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['requiredFields'])) {
            $result .= "The following fields are required: " .
                                    implode(", ", $validationErrorArray['requiredFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['notValidFields'])) {
            foreach ($validationErrorArray['notValidFields'] as $value) {
                $result .= $value['message'] . "<br /><br />";
            }
        }

        if (isset($validationErrorArray['dateError'])) {
            foreach ($validationErrorArray['dateError'] as $value) {
                $result .= $value . "<br /><br />";
            }
        }

        if (empty($result)) {
            $result = 'Unknown validation error';
        }

        return $result;
    }

    public function getMaintenancesAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $equipmentId = $this->_request->getParam('equipmentId');

            if (!empty($equipmentId)) {
                $maintenanceModel = new Equipment_Model_Maintenance();
                $maintenances = $maintenanceModel->getListByEquipment($equipmentId);

                $dateFieldNameArray = array('em_requested_date', 'em_completed_date', 'em_next_maintenance_date',
                                            'em_service_date');

                if (is_array($maintenances) && count($maintenances)) {
                    foreach ($maintenances as &$row) {
                        foreach ($row as $key => &$value) {
                            if (in_array($key, $dateFieldNameArray)) {
                                try {
                                    $dateZend = new Zend_Date($value, 'yyyy-MM-dd');
                                    $value = $dateZend->toString('MM/dd/yyyy');
                                } catch (Exception $e) {
                                    $value = '';
                                }
                            }
                        }
                    }
                }

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH.'/modules/equipment/views/scripts/partials/index/');
                $layout->i_ID = $equipmentId;
                $layout->header =  'Equipment - Monthly Maintenance';

                if ($maintenances) {
                    $layout->setLayout('_maintenance-list');
                    $layout->maintenanceList = $maintenances;

                    // create service provider select.
                    $spModel = new ServiceProvider_Model_ServiceProvider();
                    $spList = $spModel->getList();

                    $selectSpArray = array('' => '-');
                    foreach ($spList as $sp) {
                        if (is_object($sp)) {
                            $selectSpArray[$sp->sp_id] = $sp->sp_name;
                        } else if (is_array ($sp)){
                            $selectSpArray[$sp['sp_id']] = $sp['sp_name'];
                        }
                    }
                    $layout->spList = $selectSpArray;
                } else {
                    $layout->setLayout('_empty-list');
                    $layout->message = "There is no maintenance records";
                }

                $result['result'] = $layout->render();
            } else {
                $result['errror'] = "Equipment is undefined";
            }
        }

        print json_encode($result);
    }

    public function saveMaintenanceAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;
        
        if ($this->_request->isXmlHttpRequest()) {
            $maintenanceModel = new Equipment_Model_Maintenance();

            $data = array();
            $data = $this->_request->getQuery();

            $dateFieldNameArray = array('em_requested_date', 'em_completed_date', 'em_next_maintenance_date',
                                            'em_service_date');

            foreach ($data as $key => &$value) {
                if (in_array($key, $dateFieldNameArray)) {
                    try {
                        $dateZend = new Zend_Date($value, 'MM/dd/yyyy');
                        $value = $dateZend->toString('yyyy-MM-dd');
                    } catch (Exception $e) {
                        $value = '';
                    }
                }
            }

            $saveResult = $maintenanceModel->saveMaintenance($data);
             if (isset($saveResult['row']) && is_array($saveResult['row'])) {
                $result['result'] = 1;
                $result['row'] = $saveResult['row'];
            } else if (isset($saveResult['validationError'])) {
                $result['errorMessage'] = $this->buildValidateErrorMessage($saveResult['validationError']);
            } else if (isset($saveResult['saveError'])) {
                $result['errorMessage'] = $saveResult['saveError'];
            } else {
                $result['errorMessage'] = "Error is occurred during a maintenance storing.";
            }

            print json_encode($result);
        }
    }

    public function deleteMaintenanceAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $result = array();
            $maintenanceId = $this->_request->getParam('em_id');

            $maintenanceModel = new Equipment_Model_Maintenance();
            $countDeletedMaintenance = $maintenanceModel->deleteMaintenance($maintenanceId);

            if (1 === $countDeletedMaintenance) {
                $result['result'] = 1;
            } else {
                $result['errorMessage'] = "Can not delete this maintenance";
            }

            print json_encode($result);
        }
    }

}

