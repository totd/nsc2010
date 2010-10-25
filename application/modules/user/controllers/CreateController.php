<?php

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
                $r = $userForm->getValue('Agreed');
                $userModel->createUser(
                    $userForm->getValue('UserType'),
                    $userForm->getValue('Username'),
                    $userForm->getValue('Password'),
                    $userForm->getValue('StaffID'),
                    $userForm->getValue('HomeBaseID'),
                    $userForm->getValue('CompanyID'),
                    (int) $userForm->getValue('Agreed')
                );
                return $this->_redirect('user/list'); // _forward('index', 'list', 'user'); // redirect to the users list.
            }
        }
        $userForm->setAction('/user/create');
        $this->view->form = $userForm;
    }

}

