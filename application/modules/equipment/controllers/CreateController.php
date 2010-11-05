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
    public function indexAction()
    {
        $equipmentForm = new Equipment_Form_Equipment();
        if ($this->_request->isPost()) {
            if ($equipmentForm->isValid($_POST)) {
                $equipmentModel = new Equipment_Form_Equipment();
                $equipmentRow = array(
                    'u_Parent_Company_ID' => $equipmentForm->getValue('parent_company'),
                    'u_Company_ID' => $equipmentForm->getValue('company'),
                    'u_Homebase_ID' => $equipmentForm->getValue('homebase'),
                    'u_Depot_ID' => $equipmentForm->getValue('depot'),
                    'u_Role_ID' => $equipmentForm->getValue('role'),
                    'u_User_Name' => $equipmentForm->getValue('username'),
                    'u_Password' => $equipmentForm->getValue('password'),
                    'u_Status' => $equipmentForm->getValue('status'),
                    'u_Title' => $equipmentForm->getValue('title'),
                    'u_Date_Created' => $equipmentForm->getValue('date_created'),
                    'u_Allowed_Access_To_DQF' => $equipmentForm->getValue('access_DQF'),
                    'u_Allowed_Access_To_VIM' => $equipmentForm->getValue('access_VIM'),
                    'u_Allowed_Access_To_Accident' => $equipmentForm->getValue('access_accident'),
                    'u_First_Name' => $equipmentForm->getValue('first_name'),
                    'u_Last_Name' => $equipmentForm->getValue('last_name'),
                    'u_Email' => $equipmentForm->getValue('email'),
                    'u_Telephone_Number' => $equipmentForm->getValue('telephone_number'),
                    'u_Fax' => $equipmentForm->getValue('fax'),
                    'u_Address1' => $equipmentForm->getValue('address1'),
                    'u_Address2' => $equipmentForm->getValue('address2'),
                    'u_City' => $equipmentForm->getValue('city'),
                    'u_State' => $equipmentForm->getValue('state'),
                    'u_Postal_Code' => $equipmentForm->getValue('postal_code'),
                );
                $equipmentModel->createUser($equipmentRow);
                return $this->_redirect('equipment/list'); // _forward('index', 'list', 'user'); // redirect to the users list.
            }
        }
        $equipmentForm->setAction('/equipment/create');

        $this->view->form = $equipmentForm;
    }

}
