<?php

class Driver_IndexController extends Zend_Controller_Action
{

    public $driver = null;
    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
            $this->driver = new Driver_Model_Driver();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {

        if ($this->auth->hasIdentity()) {
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


            $orderBy=array('d_Status','ASC');
            if(isset($_REQUEST['order_by'])){
                unset($orderBy);
                $orderBy = explode("-",$_REQUEST['order_by']);
                $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
                if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
                    if(strtolower($orderBy[1])=="desc"){
                        $orderBy[1]="asc";
                    }else{$orderBy[1]="desc";}
                }
            }

            if(isset($_REQUEST['status'])){
                $this->view->status = $this->_getParam('status');
            }else{
                $this->view->status = "All";
            }
            $this->view->page = $page;


            # For menu highlighting:
            $this->view->currentPage = "NewDriver";
            
            # returns list of temporary driver accounts
            $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
            if (sizeof($Drivers) > 0) {
                $this->view->Drivers = $Drivers;
                $this->view->orderBy = $orderBy;
                $this->view->allDrivers = $this->driver->getDrivers($where,$orderBy,0);
            } else {
                $this->view->Drivers = null;
                $this->view->orderBy = $orderBy;
            }

            $auth = Zend_Auth::getInstance();
            if ($auth->hasIdentity()) {
                $this->view->identity = $auth->getIdentity();
            }else{
                return $this->_redirect('user/login');
            }
        }
    }

    public function dqfAction()
    {

        if ($this->auth->hasIdentity()) {
            # Breadcrumbs goes here:
            $this->view->breadcrumbs = "<a href='/driver/index/dqf'>DQF</a>&nbsp;&gt;&nbsp;DQF List";

            $driverStatusListR = Driver_Model_DriverStatus::getAll(1);
            $this->view->driverStatusList = Driver_Model_DriverStatus::getAll(0);
            if (array_key_exists($this->_getParam('status'), $driverStatusListR)) {
                $where =" d_Status =" . $driverStatusListR[$this->_getParam('status')];
                $this->view->statusId = $driverStatusListR[$this->_getParam('status')];
            }else{
                $where=" d_Status BETWEEN 2 AND 4";
                $this->view->statusId = 0;
            }
            if(preg_match("/[0-9]+/",$this->_getParam('page'))){$page = $this->_getParam('page');}
            if(!isset($_REQUEST['page'])){$page=1;}

            $orderBy=array('d_Status','ASC');
            if(isset($_REQUEST['order_by'])){
                unset($orderBy);
                $orderBy = explode("-",$_REQUEST['order_by']);
                $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
                if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
                    if(strtolower($orderBy[1])=="desc"){
                        $orderBy[1]="asc";
                    }else{$orderBy[1]="desc";}
                }
            }

            if(isset($_REQUEST['status'])){
                $this->view->status = $this->_getParam('status');
            }else{
                $this->view->status = "All";
            }
            $this->view->page = $page;

            # For menu highlighting:
            $this->view->currentPage = "DriverFiles";

            # returns list of DQF
            $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
            if (sizeof($Drivers) > 0) {
                $this->view->Drivers = $Drivers;
                $this->view->orderBy = $orderBy;
                $this->view->allDrivers = $this->driver->getDrivers($where,$orderBy,0);
            } else {
                $this->view->Drivers = null;
                $this->view->orderBy = $orderBy;
            }

            $auth = Zend_Auth::getInstance();
            if ($auth->hasIdentity()) {
                $this->view->identity = $auth->getIdentity();
            }else{
                return $this->_redirect('user/login');
            }
        }
    }
    
    public function archivesAction()
    {

        if ($this->auth->hasIdentity()) {
            # Breadcrumbs goes here:
            $this->view->breadcrumbs = "<a href='/driver/index/dqf'>DQF</a>&nbsp;&gt;&nbsp;DQF List";

            $driverStatusListR = Driver_Model_DriverStatus::getAll(1);
            $this->view->driverStatusList = Driver_Model_DriverStatus::getAll(0);
            if (array_key_exists($this->_getParam('status'), $driverStatusListR)) {
                $where =" d_Status =" . $driverStatusListR[$this->_getParam('status')];
                $this->view->statusId = $driverStatusListR[$this->_getParam('status')];
            }else{
                $where=" d_Status = 5";
                $this->view->statusId = 0;
            }
            if(preg_match("/[0-9]+/",$this->_getParam('page'))){$page = $this->_getParam('page');}
            if(!isset($_REQUEST['page'])){$page=1;}


            $orderBy=array('d_Status','ASC');
            if(isset($_REQUEST['order_by'])){
                unset($orderBy);
                $orderBy = explode("-",$_REQUEST['order_by']);
                $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
                if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
                    if(strtolower($orderBy[1])=="desc"){
                        $orderBy[1]="asc";
                    }else{$orderBy[1]="desc";}
                }
            }

            if(isset($_REQUEST['status'])){
                $this->view->status = $this->_getParam('status');
            }else{
                $this->view->status = "All";
            }
            $this->view->page = $page;

            # For menu highlighting:
            $this->view->currentPage = "DriverArchives";

            # returns list of DQF
            $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
            if (sizeof($Drivers) > 0) {
                $this->view->Drivers = $Drivers;
                $this->view->orderBy = $orderBy;
                $this->view->allDrivers = $this->driver->getDrivers($where,$orderBy,0);
            } else {
                $this->view->Drivers = null;
                $this->view->orderBy = $orderBy;
            }

            $auth = Zend_Auth::getInstance();
            if ($auth->hasIdentity()) {
                $this->view->identity = $auth->getIdentity();
            }else{
                return $this->_redirect('user/login');
            }
        }
    }

    public function involvedInIncidentDriversAction()
    {

        if ($this->auth->hasIdentity()) {
            # Breadcrumbs goes here:
            $this->view->breadcrumbs = "<a href='/incident/list'>Incidents</a>&nbsp;&gt;&nbsp; <a href='/incident/index/dqf'>New Incident</a>&nbsp;&gt;&nbsp; Select driver involved in accident";
            $incident_id = $this->_getParam('incident_id');
            if($incident_id==""){
                return $this->_redirect('/incident/list');
            }
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


            $orderBy=array('d_Status','ASC');
            if(isset($_REQUEST['order_by'])){
                unset($orderBy);
                $orderBy = explode("-",$_REQUEST['order_by']);
                $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
                if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
                    if(strtolower($orderBy[1])=="desc"){
                        $orderBy[1]="asc";
                    }else{$orderBy[1]="desc";}
                }
            }

            if(isset($_REQUEST['status'])){
                $this->view->status = $this->_getParam('status');
            }else{
                $this->view->status = "All";
            }
            $this->view->page = $page;


            $Drivers = $this->driver->getDrivers($where,$orderBy,$page);
            if (sizeof($Drivers) > 0) {
                $this->view->incident_id = $incident_id;
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

    public function reportsAction()
    {
        # For menu highlighting:
        $this->view->currentPage = "DriverReports";
    
    }


}







