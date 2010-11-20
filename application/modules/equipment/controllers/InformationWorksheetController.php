<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_InformationWorksheetController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function init()
    {

    }

    public function indexAction($VIN = null)
    {
        $this->view->breadcrumbs = "<a href='/equipment/index'>Equipment Management</a>&nbsp;&gt;&nbsp;<a href='/equipment/list#'>Equipment List</a>&nbsp;&gt;&nbsp;<a href='/equipment/list#'>Equipment Search</a>&nbsp;&gt;&nbsp;Equipment VIM";

        if (is_null($VIN)) {
            $VIN = $this->_request->getParam('VIN');
            if (is_null($VIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($VIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                'e_Number' => $VIN,
            );
            // Create equipment only with VIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        } else {
            // message about an existen equipment.
            //$this->_redirect('/equipment/search/index/VIN/' . $VIN);
        }


        if (!empty($equipmentRow['e_License_Expiration_Date']) && $equipmentRow['e_License_Expiration_Date'] != '0000-00-00') {
            $myDate = new Zend_Date($equipmentRow['e_License_Expiration_Date']);
            $equipmentRow['e_License_Expiration_Date'] = $myDate->toString("MM/dd/YYYY");
        } else {
            $equipmentRow['e_License_Expiration_Date'] = '';
        }

        $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
        $this->view->equipmentHasAssignment = $equipmentAssignmentModel->findRow('ea_equipment_id', $equipmentRow['e_id']);

        $this->view->equipmentRow = $equipmentRow;
        $this->view->action = '/equipment/update-status/';
        $this->view->pageTitle = 'VEHICLE INFORMATION WORKSHEET';
    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Save imformation worksheet of a new equipment.
     *
     * @param string $VIN
     *
     * @return mixed
     */
    public function updateAction($VIN = null)
    {
        if (is_null($VIN)) {
            $VIN = $this->_request->getParam('VIN');
            if (is_null($VIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/VIN/' . $VIN . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;VIM Update';

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($VIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                'e_Number' => $VIN,
            );
            // Create equipment only with VIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        } else {
            // message about an existen equipment.
            //$this->_redirect('/equipment/search/index/VIN/' . $VIN);
        }

        // create state select.
        $stateModel = new State_Model_State();
        $states = $stateModel->getList();

        $selectStateArray = array('' => array('text' => '-'));
        foreach ($states as $state) {
            if (is_object($state)) {
                $selectStateArray[$state->s_id] = array('text' => $state->s_name);
            } else {
                $selectStateArray[$state['s_id']] = array('text' => $state['s_name']);
            }
        }

        if (isset($equipmentRow['e_Registration_State']) && !is_null($equipmentRow['e_Registration_State'])) {
            foreach ($selectStateArray as $key => &$value) {
                if ($equipmentRow['e_Registration_State'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectStateArray['']['selected'] = true;
        }
        $this->view->states = $selectStateArray;

        // create equipment type select.
        $equipmentTypeModel = new EquipmentType_Model_EquipmentType();
        $equipmentTypes = $equipmentTypeModel->getList();

        $selectEquipmentTypeArray = array('' => array('text' => '-'));
        foreach ($equipmentTypes as $equipmentType) {
            $selectEquipmentTypeArray[$equipmentType->et_id] = array('text' => $equipmentType->et_type);
        }

        if (isset($equipmentRow['e_type_id']) && !is_null($equipmentRow['e_type_id'])) {
            foreach ($selectEquipmentTypeArray as $key => &$value) {
                if ($equipmentRow['e_type_id'] == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectEquipmentTypeArray['']['selected'] = true;
        }
        $this->view->equipmentTypes = $selectEquipmentTypeArray;


        if (!empty($equipmentRow['e_License_Expiration_Date']) && $equipmentRow['e_License_Expiration_Date'] != '0000-00-00') {
            $myDate = new Zend_Date($equipmentRow['e_License_Expiration_Date']);
            $equipmentRow['e_License_Expiration_Date'] = $myDate->toString("MM/dd/YYYY");
        } else {
            $equipmentRow['e_License_Expiration_Date'] = '';
        }

        $this->view->equipmentRow = $equipmentRow;
        $this->view->pageTitle = 'UPDATE VEHICLE INFORMATION WORKSHEET';
        $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
    }

    public function validateCompletedAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->getRow($id);
        if (is_null($equipmentRow)) {
            $this->_redirect('/equipment/list');
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/VIN/' . $equipmentRow->e_Number . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;Validate Complete Action';

        
        $this->view->pageTitle = 'COMPLETE VEHICLE APPLICATION';
        $VIN = $equipmentRow->e_Number;
        $this->view->VIN = $equipmentRow->e_Number;
        $this->view->UnitNumber = $equipmentRow->e_Unit_Number;
        $this->view->ID = $equipmentRow->e_id;


        $warningFields = $equipmentModel->checkCompletedFields($id);

        $inspectionModel = new Inspection_Model_Inspection();
        $hasInspection = $inspectionModel->equipmentIsInspected($equipmentRow->e_id);
        $this->view->hasInspection = $hasInspection;

        if (is_null($warningFields) && $hasInspection) {
            $this->render('completed_no_errors');
        } else {
            if ($warningFields) {
                $this->view->warningArray = $warningFields;
            }
            $this->render('completed_errors');
        }

        // TODO implement comlete action.
//        $equipmentModel = new Equipment_Model_Equipment();
//        $equipmentModel->changeNewEquipmentStatus('Completed', $id);
        //return $this->_redirect('equipment/list');
    }

    public function declinedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Declined', $id);
        return $this->_redirect('equipment/list');
    }

    public function reactivatedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Pending', $id);
        return $this->_redirect('equipment/list');
    }

    /**
     * @author Andryi Ilnytskyi 16.11.2010
     *
     * Updated VIM
     * 
     * @return mixed 
     */
    public function saveVimAction()
    {
        if ($this->_request->isPost()) {
            $equipmentModel = new Equipment_Model_Equipment();

            $data = array();
            // TODO implement filling manual all table fields with validating.
            foreach ($this->_request->getPost() as $key => $value) {
                if ($key == 'e_License_Expiration_Date') {
                    try {
                        $myDate = new Zend_Date($value, "MM/dd/YYYY");
                        $data[$key] = $myDate->toString("YYYY-MM-dd");
                    } catch (Exception $e) {
                        
                    }
                } else {
                    $data[$key] = $value;
                }
            }

            $where = $equipmentModel->getAdapter()->quoteInto('e_id = ?', $this->_request->getPost('e_id'));

            $equipmentModel->update($data, $where);
            
            return $this->_redirect('equipment/list');
        }
    }

    public function saveAssignmentAction()
    {
        if ($this->_request->isPost()) {
            $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
            $cols = $equipmentAssignmentModel->info(Zend_Db_Table_Abstract::COLS);

            $data = array();
            // TODO implement filling manual all table fields with validating.
            foreach ($this->_request->getPost() as $key => $value) {
                if (in_array($key, $cols)) {

                    if (empty($value) || is_null($value)) {
                        continue;
                    } elseif ($key == 'ea_start_date' || $key == 'ea_end_date') {
                        try {
                            $myDate = new Zend_Date($value, "MM/dd/YYYY");
                            $data[$key] = $myDate->toString("YYYY-MM-dd");
                        } catch (Exception $e) {

                        }
                    } else {
                        $data[$key] = $value;
                    }
                }
            }

            $equipmentAssignmentModel->saveAssignment($data);

            return $this->_redirect('equipment/list');
        }
    }

    public function addAssignmentAction($equipmentId = null, $VIN = null)
    {
        

        if (is_null($equipmentId)) {
            $equipmentId = $this->_request->getParam('equipmentId');
            $VIN = $this->_request->getParam('VIN');
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/VIN/' . $VIN . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;Assignment Update';

        if (is_null($equipmentId)) {
            $this->view->errorMessage = "Equipment is undefined";
        } else {
            $equipmentModel = new Equipment_Model_Equipment();
            $this->view->VIN = $equipmentModel->getVIN($equipmentId);

            $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
            $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentId);

            if (is_null($equipmentAssigmentRow) || empty($equipmentAssigmentRow)) {
                $equipmentAssigmentRow['e_id'] = $equipmentId;
                $equipmentAssigmentRow['ea_equipment_id'] = $equipmentId;

                $this->view->equipmentAssignmentRow = $equipmentAssigmentRow;
            } elseif (is_array($equipmentAssigmentRow) && count($equipmentAssigmentRow)) {
                if (!empty($equipmentAssigmentRow['ea_start_date']) && $equipmentAssigmentRow['ea_start_date'] != '0000-00-00') {
                    $dateObj = new Zend_Date($equipmentAssigmentRow['ea_start_date'], "YYYY-MM-dd");
                    $equipmentAssigmentRow['ea_start_date'] = $dateObj->toString("MM/dd/YYYY");
                } else {
                    $equipmentAssigmentRow['ea_start_date'] = '';
                }

                if (!empty($equipmentAssigmentRow['ea_end_date']) && $equipmentAssigmentRow['ea_end_date'] != '0000-00-00') {
                    $dateObj = new Zend_Date($equipmentAssigmentRow['ea_end_date']);
                    $equipmentAssigmentRow['ea_end_date'] = $dateObj->toString("MM/dd/YYYY", "YYYY-MM-dd");
                } else {
                    $equipmentAssigmentRow['ea_end_date'] = '';
                }


                $this->view->equipmentAssignmentRow = $equipmentAssigmentRow;
            }

            // Prepearing data for the form

            // Homebases
            $this->view->homebases = $this->getSelectList('homebase', 'h_id', 'h_Name',
                        (isset($equipmentAssigmentRow['ea_homebase_id']) ? $equipmentAssigmentRow['ea_homebase_id'] : null)
                    );

            // Depots
            $this->view->depots = $this->getSelectList('depot', 'd_id', 'd_Name',
                        (isset($equipmentAssigmentRow['ea_depot_id']) ? $equipmentAssigmentRow['ea_depot_id'] : null)
                    );

            // Owners
            $this->view->owners = $this->getSelectList('equipmentOwner', 'eo_id', 'eo_name',
                        (isset($equipmentAssigmentRow['ea_owner_id']) ? $equipmentAssigmentRow['ea_owner_id'] : null)
                    );
            
            // Drivers
            $this->view->drivers = $this->getSelectList('driver', 'd_ID', 'd_Driver_SSN',
                        (isset($equipmentAssigmentRow['ea_driver_id']) ? $equipmentAssigmentRow['ea_driver_id'] : null)
                    );

            // Service providers
            $this->view->serviceProviders = $this->getSelectList('serviceProvider', 'sp_ID', 'sp_Name',
                        (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
                    );

            // Incidents
            $this->view->incidents = $this->getSelectList('incident', 'i_ID', 'i_Violation_ID',
                        (isset($equipmentAssigmentRow['spea_Service_Provider_ID']) ? $equipmentAssigmentRow['spea_Service_Provider_ID'] : null)
                    );


        }

        //$this->view->equipmentRow = $equipmentRow;
        $this->view->pageTitle = 'UPDATE EQUIPMENT ASSIGNMENT';
        $this->view->headScript()->appendFile('/js/equipment/assignment.js', 'text/javascript');
    }

    public function viewAssignmentAction()
    {

    }

    private function getSelectList($entity, $valueField, $textField, $selectedValue = null, $methodName = 'getList')
    {
        $modelName = ucfirst($entity) . '_Model_' . ucfirst($entity);

        $entityModel = new $modelName();
        $entities = $entityModel->$methodName();

        $selectArray = array('' => array('text' => '-'));
        foreach ($entities as $row) {
            if (is_object($row)) {
                $selectArray[$row->$valueField] = array('text' => $row->$textField);
            } elseif (is_array($row)) {
                $selectArray[$row[$valueField]] = array('text' => $row[$textField]);
            }
        }

        if (!is_null($selectedValue)) {
            foreach ($selectArray as $key => &$value) {
                if ($selectedValue == $key) {
                    $value['selected'] = true;
                    break;
                }
            }
        } else {
            $selectArray['']['selected'] = true;
        }

        return $selectArray;
    }

    public function showCompleteFormAction($id = null)
    {
        if (is_null($equipmentId)) {
            $equipmentId = $this->_request->getParam('id');
            $VIN = $this->_request->getParam('VIN');
        }

        $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/VIN/' . $VIN . '">Equipment VIM</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/validate-completed/id/' . $equipmentId . '/VIN/' . $VIN . '">Validate Complete Action</a>&nbsp;&gt;';
        $this->view->breadcrumbs .= '&nbsp;Complete Action';

        if (is_null($id)) {
            $id = $this->_request->getParam('id');
        }

        if (!is_null($id) && !empty($id)) {
            $equipmentModel = new Equipment_Model_Equipment();
            $equipmentRow = $equipmentModel->getRow($id);

            if (!$equipmentRow) {
                $this->view->errorMessage = "Equipment doesn't exist.";
                $this->_redirect("/equipment/list");
            }

            $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/list">Equipment List</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/search">Equipment Search</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/index/VIN/' . $equipmentRow->e_Number . '">Equipment VIM</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/information-worksheet/validate-completed/id/' . $id . '">Validate Complete Action</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;Validate Complete Action';

            $inspectionModel = new Inspection_Model_Inspection();
            $hasInspection = $inspectionModel->equipmentIsInspected($id);
            if (!$hasInspection) {
                $this->_redirect("/equipment/information-worksheet/validate-completed/id/{$equipmentRow->e_id}");
            }

            $auth = Zend_Auth::getInstance();

            // Check whether an identity is set.
            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();

                $this->view->person = "{$identity->vau_First_Name} {$identity->vau_Last_Name}";
            }


            $date = new Zend_Date();
            $this->view->currentDate = $date->toString("MM/dd/YYYY");
            $this->view->equipmentRow = $equipmentRow;
            $this->view->pageTitle = 'COMPLETE VEHICLE APPLICATION';
            $this->view->headScript()->appendFile('/js/equipment/show-complete-form.js', 'text/javascript');
        }
    }

    public function completedAction()
    {
        $equipmentModel = new Equipment_Model_Equipment();

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if (isset($data['e_id'])) {
                $row['e_id'] = $data['e_id'];
            }

            if (isset($data['e_activation_date'])) {
                try {
                    $myDate = new Zend_Date($data['e_activation_date'], "MM/dd/YYYY");
                    $row['e_activation_date'] = $myDate->toString("YYYY-MM-dd");
                } catch (Exception $e) {

                }
            }
            
            if (isset($data['e_activation_comment'])) {
                $row['e_activation_comment'] = $data['e_activation_comment'];
            }

            $equipmentActiveStatus = new ActiveStatus_Model_ActiveStatus();
            $activeStatusRecord = $equipmentActiveStatus->getRowByStatus('In Service');
            if ($activeStatusRecord) {
                $row['e_Active_Status'] = $activeStatusRecord->eas_id;
            }

            $equipmentModel->completeEquipment($row);

            $this->_redirect("/equipment/list");
        }
    }

}
