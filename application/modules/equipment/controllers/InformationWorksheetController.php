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



        $this->view->equipmentRow = $equipmentRow;
        $this->view->breadcrumbs = "<a href='/equipment/list/index'>Equipments</a>&nbsp;&gt;&nbsp;New Equipment View";
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


        $this->view->equipmentRow = $equipmentRow;
        $this->view->breadcrumbs = "<a href='/equipment/list/index'>Equipments</a>&nbsp;&gt;&nbsp;New Equipment View";
        $this->view->action = "/equipment/save/id/{$equipmentRow['e_id']}";
        $this->view->pageTitle = 'UPDATE VEHICLE INFORMATION WORKSHEET';
        $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
    }

    public function completedAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/list');
            }
        }

        // TODO implement comlete action.
//        $equipmentModel = new Equipment_Model_Equipment();
//        $equipmentModel->changeNewEquipmentStatus('Completed', $id);
        return $this->_redirect('equipment/list');
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
            // TODO implement filling manual all table fealds with validating.
            foreach ($this->_request->getPost() as $key => $value) {
                $data[$key] = $value;
            }

            $where = $equipmentModel->getAdapter()->quoteInto('e_id = ?', $this->_request->getPost('e_id'));

            $equipmentModel->update($data, $where);
            
            return $this->_redirect('equipment/list');
        }
    }

    public function addAssignmentAction($equipmentId = null)
    {
        if (is_null($equipmentId)) {
            $equipmentId = $this->_request->getParam('equipmentId');
        }

        if (is_null($equipmentId)) {
            $this->view->errorMessage = "Equipment is undefined";
        } else {
            $equipmentModel = new Equipment_Model_Equipment();
            $this->view->VIN = $equipmentModel->getVIN($equipmentId);

            $equipmentAssignmentModel = new EquipmentAssignment_Model_EquipmentAssignment();
            $equipmentAssigmentRow = $equipmentAssignmentModel->getAssignment($equipmentId);

            if (is_null($equipmentAssigmentRow)) {
                $equipmentAssigmentRow['e_id'] = $equipmentId;
                $equipmentAssigmentRow['ea_Equipment_id'] = $equipmentId;
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
        $this->view->breadcrumbs = "<a href='/equipment/list/index'>Equipments</a>&nbsp;&gt;&nbsp;New Equipment View";
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

}
