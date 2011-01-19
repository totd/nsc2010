<?php
class Maintenance_MaintenanceController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_Validation');
    }

    public function  init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function addEquipmentMaintenanceAction()
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

                $maintenanceModel = new Maintenance_Model_Maintenance();
                $saveResult = $maintenanceModel->saveMaintenance($dataMaintenance);

                if (isset($saveResult['row']) && is_array($saveResult['row'])) {
                    $result['result'] = 1;
                    $result['row'] = $saveResult['row'];
                } else if (isset($saveResult['validationError'])) {
                    $result['errorMessage'] = $this->_helper->buildValidateError($saveResult['validationError']);
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

    public function addSpMaintenanceAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $dataMaintenance = array();
            $dataMaintenance = $this->_request->getQuery();

            $spId = $dataMaintenance['em_service_provider_id'];
            if (!empty($spId)) {
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

                $maintenanceModel = new Maintenance_Model_Maintenance();
                $saveResult = $maintenanceModel->saveMaintenance($dataMaintenance);

                if (isset($saveResult['row']) && is_array($saveResult['row'])) {
                    $result['result'] = 1;
                    $result['row'] = $saveResult['row'];
                } else if (isset($saveResult['validationError'])) {
                    $result['errorMessage'] = $this->_helper->buildValidateError($saveResult['validationError']);
                } else if (isset($saveResult['saveError'])) {
                    $result['errorMessage'] = $saveResult['saveError'];
                } else {
                    $result['errorMessage'] = "Error is occurred during a maintenance storing.";
                }
            } else {
                $result['errorMessage'] = "Service Provider is required.";
            }
        }

        print json_encode($result);
    }

    public function getEquipmentMaintenancesAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $equipmentId = $this->_request->getParam('equipmentId');

            if (!empty($equipmentId)) {
                $maintenanceModel = new Maintenance_Model_Maintenance();
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
                $layout->setLayoutPath(APPLICATION_PATH.'/modules/maintenance/views/scripts/partials/index/');
                $layout->i_ID = $equipmentId;
                $layout->header =  'Equipment - Monthly Maintenance';

                if ($maintenances) {
                    $layout->setLayout('_maintenance-equipment-list');
                    $layout->maintenanceList = $maintenances;
                } else {
                    $layout->setLayout('_empty-equipment-maintenance-list');
                    $layout->message = "There is no maintenance records";
                }

                // create service provider select.
                $spModel = new ServiceProvider_Model_ServiceProvider();
                $spList = $spModel->getList(array('sp_type' => 'Repair'));

                $selectSpArray = array('' => '-');
                foreach ($spList as $sp) {
                    if (is_object($sp)) {
                        $selectSpArray[$sp->sp_id] = $sp->sp_name;
                    } else if (is_array ($sp)){
                        $selectSpArray[$sp['sp_id']] = $sp['sp_name'];
                    }
                }
                $layout->spList = $selectSpArray;

                $auth = Zend_Auth::getInstance();
                if ($auth->hasIdentity()) {
                    $layout->identity = $auth->getIdentity();
                }

                $result['result'] = $layout->render();
            } else {
                $result['errror'] = "Equipment is undefined";
            }
        }

        print json_encode($result);
    }

    public function getSpMaintenancesAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $spId = $this->_request->getParam('spId');

            if (!empty($spId)) {
                $maintenanceModel = new Maintenance_Model_Maintenance();
                $maintenances = $maintenanceModel->getListBySp($spId);

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
                $layout->setLayoutPath(APPLICATION_PATH.'/modules/maintenance/views/scripts/partials/index/');
                $layout->header =  'Equipment - Monthly Maintenance';

                if ($maintenances) {
                    $layout->setLayout('_maintenance-sp-list');
                    $layout->maintenanceList = $maintenances;
                } else {
                    $layout->setLayout('_empty-sp-maintenance-list');
                    $layout->message = "There is no maintenance records";
                }

                // create equipment select.
                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentList = $equipmentModel->getList();

                $selectEquipmentArray = array('' => '-');
                foreach ($equipmentList as $equipment) {
                    if (is_object($equipment)) {
                        $selectEquipmentArray[$equipment->e_id] = $equipment->e_Number;
                    } else if (is_array($equipment)){
                        $selectEquipmentArray[$equipment['e_id']] = $equipment['e_Number'];
                    }
                }
                $layout->equipmentList = $selectEquipmentArray;

                $auth = Zend_Auth::getInstance();
                if ($auth->hasIdentity()) {
                    $layout->identity = $auth->getIdentity();
                }

                $result['result'] = $layout->render();
            } else {
                $result['errror'] = "Service Provider is undefined";
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
            $maintenanceModel = new Maintenance_Model_Maintenance();

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
                foreach ($saveResult['row'] as $key => &$value) {
                    if (in_array($key, $dateFieldNameArray)) {
                        try {
                            $dateZend = new Zend_Date($value, 'yyyy-MM-dd');
                            $value = $dateZend->toString('MM/dd/yyyy');
                        } catch (Exception $e) {
                            $value = '';
                        }
                    }
                }
                $result['row'] = $saveResult['row'];
            } else if (isset($saveResult['validationError'])) {
                $result['errorMessage'] = $this->_helper->buildValidateError($saveResult['validationError']);
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

            $maintenanceModel = new Maintenance_Model_Maintenance();
            $countDeletedMaintenance = $maintenanceModel->deleteMaintenance($maintenanceId);

            if (1 === $countDeletedMaintenance) {
                $result['result'] = 1;
            } else {
                $result['errorMessage'] = "Can not delete this maintenance";
            }

            print json_encode($result);
        }
    }

    public function deleteSpFromMaintenancesAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $result = array();
            $spId = $this->_request->getParam('spId');

            $maintenaceModel = new Maintenance_Model_Maintenance();
            $countDeletedLinks = $maintenaceModel->deleteSpFromMaintenaces($spId);

            if ($countDeletedLinks) {
                $result['result'] = 1;
            } else {
                $result['errorMessage'] = 'Eroor during deleting service providers links from maintenances';
            }

            print json_encode($result);
        }
    }

}

