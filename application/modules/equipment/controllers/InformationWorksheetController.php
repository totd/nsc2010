<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_InformationWorksheetController extends Zend_Controller_Action
{

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

            $equipmentModel->createEquipment($equipmentRow);

        }

        $this->view->VIN = $VIN;

        $newStatus = new NewStatus_Model_NewStatus();
        $listNewStatuses = $newStatus->getList();

        $activeStatus = new ActiveStatus_Model_ActiveStatus();
        $listActiveStatuses = $activeStatus->getList();

        $equipmentForm = new Equipment_Form_EditInformationWorksheet($listNewStatuses, $listActiveStatuses);
        if ($this->_request->isPost()) {
            if ($equipmentForm->isValid($_POST)) {
                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentRow = array(
                    //'e_id' => $equipmentForm->getValue(''), //*/
                    'e_Number' => $equipmentForm->getValue('VIN'), //*/
                    //'e_Owner_Number' => $equipmentForm->getValue(''), //*/
                    'e_Unit_Number' => $equipmentForm->getValue('UnitNumber'), //*/
//                    'e_Alternate_ID' => $equipmentForm->getValue(''), //*/
                    'e_RFID_No' => $equipmentForm->getValue('RFID'), //*/
//                    'e_Entry_Date' => $equipmentForm->getValue(''), //*/
                    'e_License_Number' => $equipmentForm->getValue('LicPlateNum'), //*/
                    'e_License_Expiration_Date' => $equipmentForm->getValue('RegExpDate'), //*/
//                    'e_Start_Mileage' => $equipmentForm->getValue(''), //*/
                    'e_Registration_State' => $equipmentForm->getValue('State'), //*/
                    'e_Gross_Vehicle_Weight_Rating' => $equipmentForm->getValue('GVW'), //*/
                    'e_Gross_Vehicle_Registered_Weight' => $equipmentForm->getValue('GVRW'), //*/
                    'e_Unladen_Weight' => $equipmentForm->getValue('UnladenWeight'), //*/
                    'e_Axles' => $equipmentForm->getValue('NumOfAxles'), //*
//                    'e_Name' => $equipmentForm->getValue(''), //*/
                    'e_Year' => $equipmentForm->getValue('Year'), //*/
                    'e_Make' => $equipmentForm->getValue('Make'), //*/
                    'e_Color' => $equipmentForm->getValue('Color'), //*/
                    'e_Model' => $equipmentForm->getValue('Model'), //*/
//                    'e_Description' => $equipmentForm->getValue(''), //*/
                    'e_New_Equipment_Status' => $equipmentForm->getValue('NewStatus'), /*/
                    'e_Active_Status' => $equipmentForm->getValue('ActiveStatus'), /*/
//                    'e_Fee' => $equipmentForm->getValue(''), /*/
//                    'e_Title_Status' => $equipmentForm->getValue(''), /*/
//                    'e_Picture' => $equipmentForm->getValue(''), /*
//                    'e_DOT_Regulated'=> $equipmentForm->getValue(''), /*/
//                    'e_type_id'=> $equipmentForm->getValue(''), /*/
                );
                $equipmentModel->createEquipment($equipmentRow);
                return $this->_redirect('equipment/list');
            }
        }
        $equipmentForm->setAction('/equipment/create');

        $this->view->form = $equipmentForm;
    }

    public function completedAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Completed', $id);
        return $this->_redirect('equipment/list');
    }

    public function declinedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/search');
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
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Pending', $id);
        return $this->_redirect('equipment/list');
    }

    public function exitAction()
    {
        // TODO Implementation needed.
    }

}
