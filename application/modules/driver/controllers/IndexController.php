<?php

class Driver_IndexController extends Zend_Controller_Action
{

    public $driver = null;

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
        $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;New Drivers Profile List";

        $driverStatusListR = Driver_Model_DriverStatus::getAll(1);
        $this->view->driverStatusList = Driver_Model_DriverStatus::getAll(0);
        if (array_key_exists($this->_getParam('status'), $driverStatusListR)) {
            $where =" d_Status =" . $driverStatusListR[$this->_getParam('status')];
            $this->view->statusId = $driverStatusListR[$this->_getParam('status')];
        }else{
            $where=" d_Status <> 0";
            $this->view->statusId = 0;
        }
        if(preg_match("/[0-9]+/",$this->_getParam('page'))){$page = $this->_getParam('page');}
        if(!isset($_REQUEST['page'])){$page=1;}

        $orderBy = explode("-",$_REQUEST['order_by']);
        $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
        if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
            if(strtolower($orderBy[1])=="desc"){
                $orderBy[1]="asc";
            }else{$orderBy[1]="desc";}
        }else{
            unset($orderBy);
            $orderBy=array('d_Entry_Date','DESC');
        }

        $this->view->status = $this->_getParam('status');
        $this->view->page = $page;


        # returns list of temporary driver accounts
        $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
        if (sizeof($Drivers) > 0) {
            $this->view->Drivers = $Drivers;
            $this->view->orderBy = $orderBy;
            $this->view->allDrivers = $this->driver->getDrivers($where,$orderBy,0);
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

    public function dqfAction()
    {
        # Breadcrumbs goes here:
        $this->view->breadcrumbs = "<a href='/driver/index/dqf'>DQF</a>&nbsp;&gt;&nbsp;DQF List";

        $driverStatusListR = Driver_Model_DriverStatus::getAll(1);
        $this->view->driverStatusList = Driver_Model_DriverStatus::getAll(0);
        if (array_key_exists($this->_getParam('status'), $driverStatusListR)) {
            $where =" d_Status =" . $driverStatusListR[$this->_getParam('status')];
            $this->view->statusId = $driverStatusListR[$this->_getParam('status')];
        }else{
            $where=" d_Status BETWEEN 2 AND 5";
            $this->view->statusId = 0;
        }
        if(preg_match("/[0-9]+/",$this->_getParam('page'))){$page = $this->_getParam('page');}
        if(!isset($_REQUEST['page'])){$page=1;}

        $orderBy = explode("-",$_REQUEST['order_by']);
        $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
        if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
            if(strtolower($orderBy[1])=="desc"){
                $orderBy[1]="asc";
            }else{$orderBy[1]="desc";}
        }else{
            unset($orderBy);
            $orderBy=array('d_Entry_Date','DESC');
        }

        $this->view->status = $this->_getParam('status');
        $this->view->page = $page;


        # returns list of DQF
        $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
        if (sizeof($Drivers) > 0) {
            $this->view->Drivers = $Drivers;
            $this->view->orderBy = $orderBy;
            $this->view->allDrivers = $this->driver->getDrivers($where,$orderBy,0);
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





