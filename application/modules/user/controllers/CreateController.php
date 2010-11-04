<?php
/**
 * @author Andryi Ilnytskiy 22.10.2010
 *
 * Handle of the user creation.
 */
class User_CreateController extends Zend_Controller_Action
{

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 22.10.2010
     *
     * Create a new user.
     */
    public function indexAction()
    {
        $userForm = new User_Form_User();
        if ($this->_request->isPost()) {
            if ($userForm->isValid($_POST)) {
                $userModel = new User_Model_User();
                $userRow = array(
                    'u_Parent_Company_ID' => $userForm->getValue('parent_company'),
                    'u_Company_ID' => $userForm->getValue('company'),
                    'u_Homebase_ID' => $userForm->getValue('homebase'),
                    'u_Depot_ID' => $userForm->getValue('depot'),
                    'u_Role_ID' => $userForm->getValue('role'),
                    'u_User_Name' => $userForm->getValue('username'),
                    'u_Password' => $userForm->getValue('password'),
                    'u_Status' => $userForm->getValue('status'),
                    'u_Title' => $userForm->getValue('title'),
                    'u_Date_Created' => $userForm->getValue('date_created'),
                    'u_Allowed_Access_To_DQF' => $userForm->getValue('access_DQF'),
                    'u_Allowed_Access_To_VIM' => $userForm->getValue('access_VIM'),
                    'u_Allowed_Access_To_Accident' => $userForm->getValue('access_accident'),
                    'u_First_Name' => $userForm->getValue('first_name'),
                    'u_Last_Name' => $userForm->getValue('last_name'),
                    'u_Email' => $userForm->getValue('email'),
                    'u_Telephone_Number' => $userForm->getValue('telephone_number'),
                    'u_Fax' => $userForm->getValue('fax'),
                    'u_Address1' => $userForm->getValue('address1'),
                    'u_Address2' => $userForm->getValue('address2'),
                    'u_City' => $userForm->getValue('city'),
                    'u_State' => $userForm->getValue('state'),
                    'u_Postal_Code' => $userForm->getValue('postal_code'),
                );
                $userModel->createUser($userRow);
                return $this->_redirect('user/list'); // _forward('index', 'list', 'user'); // redirect to the users list.
            }
        }
        $userForm->setAction('/user/create');
        $this->view->form = $userForm;
    }

}

