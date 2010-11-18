<?php

class Driver_IndexController extends Zend_Controller_Action
{
    var $driver;
    public function init()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
            $this->driver = new Driver_Model_Driver();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {

        # Breadcrumbs goes here:
        $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;Driver Profile List";

        if((int)$this->_getParam('status')!=null){
            $status = $this->_getParam('status');
        }else{
            $status=0;
        }
        if((int)$this->_getParam('from')!=null){
            $from = $this->_getParam('from');
        }else{
            $from = 0;
        }
        if((int)$this->_getParam('step')!=null){
            $step = $this->_getParam('step');
        }else{
            $step = 3;
        }
        $this->view->status = $status;
        $this->view->from = $from;
        $this->view->step = $step;
        
        # returns list of temporary driver accounts
        $Drivers = $this->driver->getDrivers($status,$from,$step);
        if (sizeof($Drivers) > 0) {
            $this->view->Drivers = $Drivers;
            $this->view->allDrivers = $this->driver->getDrivers($status,0,20);
        } else {
            $this->view->Drivers = null;
        }

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();


        }else{
            return $this->_redirect('user/login');
        }
    }

    


}



