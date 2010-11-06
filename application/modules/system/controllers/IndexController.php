<?php

class System_IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        // action body
    }

    public function welcomeAction()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();

        // Check whether an identity is set.
        if ($auth->hasIdentity()!=null) {
            $this->view->identity = $auth->getIdentity();

            //$partial = array('partial/_Header.phtml', 'default');
            //$this->view->navigation()->menu()->setPartial($partial);
          

            $this->view->listOfCompanies = null;
        }else{
            return $this->_redirect('system/error/session-closed');
        }
    }


}



