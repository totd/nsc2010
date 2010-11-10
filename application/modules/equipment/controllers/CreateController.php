<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_CreateController extends Zend_Controller_Action
{

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Create a new equipment.
     */
    public function indexAction($VIN = null)
    {
        if (is_null($VIN)) {
            $VIN = $this->_request->getParam('VIN');
            if (is_null($VIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentForm = new Equipment_Form_Equipment();
        if ($this->_request->isPost()) {
            if ($equipmentForm->isValid($_POST)) {
                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentRow = array(
                    //'e_id' => $equipmentForm->getValue(''),
                    //'e_Number' => $equipmentForm->getValue('VIN'),
                    //'e_Owner_Number' => $equipmentForm->getValue(''),
                    'e_Unit_Number' => $equipmentForm->getValue('UnitNumber'),
//                    'e_Alternate_ID' => $equipmentForm->getValue(''),
                    'e_RFID_No' => $equipmentForm->getValue('RFID'),
//                    'e_Entry_Date' => $equipmentForm->getValue(''),
                    'e_License_Number' => $equipmentForm->getValue('LicPlateNum'),
                    'e_License_Expiration_Date' => $equipmentForm->getValue('RegExpDate'),
//                    'e_Start_Mileage' => $equipmentForm->getValue(''),
                    'e_Registration_State' => $equipmentForm->getValue('State'),
                    'e_Gross_Vehicle_Weight_Rating' => $equipmentForm->getValue('GVW'),
                    'e_Gross_Vehicle_Registered_Weight' => $equipmentForm->getValue('GVRW'),
                    'e_Unladen_Weight' => $equipmentForm->getValue('UnladenWeight'),
                    'e_Axles' => $equipmentForm->getValue('NumOfAxles'),
//                    'e_Name' => $equipmentForm->getValue(''),
                    'e_Year' => $equipmentForm->getValue('Year'),
                    'e_Make' => $equipmentForm->getValue('Make'),
                    'e_Color' => $equipmentForm->getValue('Color'),
                    'e_Model' => $equipmentForm->getValue('Model'),
//                    'e_Description' => $equipmentForm->getValue(''),
//                    'e_New_Equipment_Status' => $equipmentForm->getValue(''),
//                    'e_Active_Status' => $equipmentForm->getValue(''),
//                    'e_Fee' => $equipmentForm->getValue(''),
//                    'e_Title_Status' => $equipmentForm->getValue(''),
//                    'e_Picture' => $equipmentForm->getValue(''),
//                    'e_DOT_Regulated'=> $equipmentForm->getValue('')
                );
                $equipmentModel->createEquipment($equipmentRow);
                return $this->_redirect('equipment/list'); 
            }
        }
        $equipmentForm->setAction('/equipment/create');

        $this->view->form = $equipmentForm;
    }

}
