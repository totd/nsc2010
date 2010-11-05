<?php

class Driver_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {
        # returns list of temporary driver accounts

        $pendingDrivers = driver_Model_Driver::getDrivers();
        if (sizeof($pendingDrivers) > 0) {
            $this->view->pendingDrivers = $pendingDrivers;
        } else {
            $this->view->pendingDrivers = null;
        }
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();

        $partial = array('partial/_Header.phtml', 'default');
        $this->view->navigation()->menu()->setPartial($partial);
        }else{
            return $this->_redirect('user/login');
        }
    }

    


}



