<?php

class User_LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Handler of the user login.
     */
    public function indexAction()
    {
        $loginForm = new User_Form_Login();
        $loginForm->setAction('/user/login');
        
        if ($this->_request->isPost() && $loginForm->isValid($_POST)) {
            $data = $loginForm->getValues();
            $db = Zend_Db_Table::getDefaultAdapter();
            $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'tuser',
                    'Username', 'Password');
            $authAdapter->setIdentity($data['Username']);
            // TODO Implement password crypt
//            $authAdapter->setCredential(md5($data['password']));
            $authAdapter->setCredential($data['Password']);
            $result = $authAdapter->authenticate();
            if ($result->isValid()) {
                $auth = Zend_Auth::getInstance();
                $storage = $auth->getStorage();
                $storage->write($authAdapter->getResultRowObject(
                        array('UserTypeID', 'StaffID', 'HomeBaseID', 'DepotID', 'CompanyID', 'Username', 'Password',
                                'Agreed')));
                return $this->_redirect('user/list'); // redirect o needed action
            } else {
                $this->view->loginMessage = "Sorry, your username or password was incorrect";
            }
        }
        $this->view->form = $loginForm;
    }


}

