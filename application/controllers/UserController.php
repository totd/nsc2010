<?php
/**
 * @author Andryi Ilnytskiy 23.10.2010
 *
 * Class of the user's controller.
 */
class UserController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     * 
     * Deafault action.
     */
    public function indexAction()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Login action.
     */
    public function loginAction()
    {
        $userForm = new Form_User();
        $userForm->setAction('/user/login');
        $userForm->removeElement('role');

        if ($this->_request->isPost() && $userForm->isValid($_POST)) {
            $data = $userForm->getValues();
            $db = Zend_Db_Table::getDefaultAdapter();
            $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'users',
                    'username', 'password');
            $authAdapter->setIdentity($data['username']);
            $authAdapter->setCredential(md5($data['password']));
            $result = $authAdapter->authenticate();
            if ($result->isValid()) {
                $auth = Zend_Auth::getInstance();
                $storage = $auth->getStorage();
                $storage->write($authAdapter->getResultRowObject(
                        array('username', 'role')));
                return $this->_forward('list'); // redirect o needed action
            } else {
                $this->view->loginMessage = "Sorry, your username or
                                        password was incorrect";
            }
        }
        $this->view->form = $userForm;
    }

    /**
     * @author Andryi Ilnytskiy 22.10.2010
     *
     * Create a new user.
     */
    public function createAction()
    {
        $userForm = new Form_User();
        if ($this->_request->isPost()) {
            if ($userForm->isValid($_POST)) {
                $userModel = new Model_User();
                $userModel->createUser(
                    $userForm->getValue('username'),
                    $userForm->getValue('password'),
                    $userForm->getValue('role')
                );
                return $this->_forward('list'); // redirect to the users list.
            }
        }
        $userForm->setAction('/user/create');
        $this->view->form = $userForm;
    }

     /**
     * @author Andryi Ilnytskiy 22.10.2010
     *
     * Display the users' list.
     */
    public function listAction()
    {
        $currentUsers = Model_User::getUsers();
        if ($currentUsers->count() > 0) {
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }
    }

     /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Logout action.
     */
    public function logoutAction()
    {
        $authAdapter = Zend_Auth::getInstance();
        $authAdapter->clearIdentity();
    }

}

