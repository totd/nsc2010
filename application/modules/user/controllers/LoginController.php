<?php
/**
 * @author Andryi Ilnytskiy 23.10.2010
 * 
 * Handler of the user login.
 */
class User_LoginController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    /**
     * @author Andryi Ilnytskiy 23.10.2010
     *
     * Default action.
     */
    public function indexAction()
    {
        $loginForm = new User_Form_Login();
        $loginForm->setAction('/user/login');
        
        if ($this->_request->isPost() && $loginForm->isValid($_POST)) {
            $data = $loginForm->getValues();
            $db = Zend_Db_Table::getDefaultAdapter();
            $authAdapter = new Zend_Auth_Adapter_DbTable($db, 'vauthuser',
                    'vau_username', 'vau_password');
            $authAdapter->setIdentity($data['username']);

            // TODO Implement password crypt
            // $authAdapter->setCredential(md5($data['password']));
            $authAdapter->setCredential($data['password']);

            // Added additional login criteria.
            $select = $authAdapter->getDbSelect();
            $select->where("vau_homebase_code = '{$data['homebase_code']}'");
            $select->where("vau_company_code = '{$data['company_code']}'");

            // Check nonrequired parameters.
            if (!empty($data['parent_company_code'])) {
                $select->where("vau_parent_company_code = '{$data['parent_company_code']}'");
            }

            if (!empty($data['depot_name'])) {
                 $select->where("vau_depot_name = '{$data['depot_name']}'");
            }

            // Check an authentication.
            $result = $authAdapter->authenticate();
            
            if ($result->isValid()) {
                $auth = Zend_Auth::getInstance();
                $storage = $auth->getStorage();
                $storage->write($authAdapter->getResultRowObject(
                        array('vau_role_id', 'vau_role', 'vau_role_title', 'vau_username', 'vau_password')));
                
                // TODO Implement a forwarding or redirecting to the needed action.
                //return $this->_forward('list', 'index', 'user');
                return $this->_redirect('user/list'); 
            } else {
                $this->view->loginMessage = "Sorry, a data you have input is incorrect";
            }
        }
        $this->view->form = $loginForm;
    }
}

