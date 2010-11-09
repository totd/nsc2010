<?php

class Driver_IndexController extends Zend_Controller_Action
{
    var $driver;
    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
            $this->driver = new driver_Model_Driver();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {
        # returns list of temporary driver accounts
        $pendingDrivers = $this->driver->getDrivers();
        if (sizeof($pendingDrivers) > 0) {
            $this->view->pendingDrivers = $pendingDrivers;
        } else {
            $this->view->pendingDrivers = null;
        }
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
            $partial = array('partials/_driver-menu.phtml', 'default');
            $this->view->navigation()->menu()->setPartial($partial);

            # Breadcrumbs goes here:
            $this->view->breadcrumbs = "<a href='#'>Archives</a>&nbsp;&gt;&nbsp;Driver Profile";

        }else{
            return $this->_redirect('user/login');
        }
    }

    


}



