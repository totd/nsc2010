<?php

class User_CreateController extends Zend_Controller_Action
{
	protected $_acl; 
    protected $_application;

    public function init()
    {
        #$this->_acl = $this->_helper->getHelper('acl'); 
		
    }

    /**
     * @author Andryi Ilnytskiy 22.10.2010
     *
     * Create a new user.
     */
    public function indexAction()
    {
		if ( ($this->_application->currentRole != 'admin')) { 
			return $this->_redirect('user/index'); // redirect o needed action
        } 
        $userForm = new User_Form_User();
        if ($this->_request->isPost()) {
            if ($userForm->isValid($_POST)) {
                $userModel = new Model_User();
                $userModel->createUser(
                    $userForm->getValue('UserType'),
                    $userForm->getValue('Username'),
                    $userForm->getValue('Password'),
                    $userForm->getValue('StaffID'),
                    $userForm->getValue('HomeBaseID'),
                    $userForm->getValue('CompanyID'),
                    $userForm->getValue('Agreed')
                );
                return $this->_redirect('user/list');// _forward('index', 'list', 'user'); // redirect to the users list.
            }
        }
        $userForm->setAction('/user/create');
        $this->view->form = $userForm;
    }


}

