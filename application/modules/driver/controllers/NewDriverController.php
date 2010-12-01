<?php

class Driver_NewDriverController extends Zend_Controller_Action
{

    public function init()
    {
        // Fetch the current instance of Zend_Auth
        $auth = Zend_Auth::getInstance();
        // Check whether an identity is set.
        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
            $this->driver = new Driver_Model_Driver(); 
        }else{
            return $this->_redirect('user/login');
        }
    }
    
    public function preDispatch(){
        # $this->_helper->layout->setLayout('equipmentLayout');
    }
    public function indexAction()
    {
        # returns list of temporary driver accounts
    }


    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * Check New Driver for existing in DB
     *
     */
    public function newDriverSearchAction()
    {
        $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/jQuery_validate_driver_search.js', 'text/javascript');

        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;New Driver - Look for a New Driver";
        $this->view->pageTitle = "NEW DRIVER - LOOK FOR A DRIVER";

        # origin - http://www.driverqualificationonline.com/ProdClient/Application/NewDriverSearch.asp
        # pre-create Driver search. If there no such Driver in DB - offer to create new one.
        $auth = Zend_Auth::getInstance();


        $this->view->systemMessage = "";

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();


            if (sizeof($_POST)>0) {
                $d_ssn = preg_match("/[0-9]{9}/",$_POST['d_Driver_SSN']);
                $d_dob = preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$_POST['d_Date_Of_Birth']);
                $d_et = preg_match("/[0-9]+/",$_POST['d_Employment_Type']);
                #if ($this->_request->isPost() && $NewDriverSearch_form->isValid($_POST)) {
                if($d_ssn==1 && $d_dob==1 && $d_et==1)
                {
                    if(sizeof(Driver_Model_Driver::searchNewDriver($_POST['d_Driver_SSN']))>0){
                        # Show message, that Driver with such SSN exist in DB
                        $this->view->systemMessage = "Driver with SSN # <b>" . $_POST['d_Driver_SSN'] . "</b> already exist! ";
                    }else{
                        # process creating of new Driver
                        $driver = Driver_Model_Driver::createPendingDriver($_POST);
                        return $this->_redirect('/driver/Driver/view-driver-Information/id/'.$driver);
                    }
                }else{
                    if($d_et==0){
                        $this->view->systemMessage = $this->view->systemMessage ."Select  Employee OR Contractor Application.<br/>";
                    }
                    if($d_ssn==0){
                        $this->view->systemMessage = $this->view->systemMessage ."SSN must contain 9 digits.<br/>";
                    }
                    if($d_dob==0){
                        $this->view->systemMessage = $this->view->systemMessage ."DOB myst be mm/dd/yyyy format.";
                    }
                }

                /*elseif(Driver_Model_Driver::searchNewDriver($NewDriverSearch_form->getValues())==false){
                    # Show message, that Driver with such SSN exist in DB
                    $d_Driver_SSN = $_POST['$d_Driver_SSN'];
                    $this->view->driver_exist = true;
                    $this->view->d_Driver_SSN = $d_Driver_SSN;
                }else{
                    # something strange occur O_o
                }*/
            }
            /*elseif($this->_request->isPost() && !$NewDriverSearch_form->isValid($_POST)){
                # TODO: implement notification what exactly fields are incorrect
                $this->view->systemMessage = "Check information in fields!";
            }else{
                $this->view->form_NewDriverSearch = $NewDriverSearch_form;
            }*/
        }else{
            return $this->_redirect('user/login');
        }
    }
    

  
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * Show table with driver information need to fill out
     *
     */
    public function driverInformationWorksheetViewAction()
    {
        isset($_POST['form_id'])?/**/:$_POST['form_id']=null;
        $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/ajax_homebase2depot.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/ajax_driverAddressHistory.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jQueryScripts/driver_misc.js', 'text/javascript');

        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/new-Driver/new-driver-search'>New Driver</a>&nbsp;&gt;&nbsp;Driver Information Worksheet";
        $this->view->pageTitle = "DRIVER INFORMATION WORKSHEET";

        $driverID = (int)$this->_request->getParam('id');
        $driverInfo = Driver_Model_Driver::getDriverInfo($driverID);
        $homebaseList = Homebase_Model_Homebase::getHomebaseList(null,1);
        $depotList = Depot_Model_Depot::getDepotList($driverInfo['d_homebase_ID'],1);
        $stateList = State_Model_State::getList();
        $currentDriverHistoryList = new Driver_Model_DriverAddressHistory();
        $currentDriverHistoryList->getList($driverID);


        $this->view->driverId = $driverID;
        $this->view->driverInfo = $driverInfo;
        $this->view->homebaseList = $homebaseList;
        $this->view->depotList = $depotList;
        $this->view->stateList = $stateList;
        $this->view->currentDriverHistoryList = $currentDriverHistoryList;
    }


}









