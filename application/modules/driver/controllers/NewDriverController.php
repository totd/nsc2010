<?php

class Driver_NewDriverController extends Zend_Controller_Action
{

    var $auth;
    public function init()
    {
            # For menu highlighting:
            $this->view->currentPage = "NewDriver";
            
        $this->auth = Zend_Auth::getInstance();

        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
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

        if ($this->auth->hasIdentity()) {
            $this->view->headScript()->appendFile('/js/equipment/update.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/jQuery_validate_driver_search.js', 'text/javascript');

            # Breadcrumbs & page title goes here:
            $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;New Driver - Look for a New Driver";
            $this->view->pageTitle = "NEW DRIVER - LOOK FOR A DRIVER";

            
            # origin - http://www.driverqualificationonline.com/ProdClient/Application/NewDriverSearch.asp
            # pre-create Driver search. If there no such Driver in DB - offer to create new one.
            $auth = Zend_Auth::getInstance();


            $this->view->systemMessage = "";
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

            }
        }
    }
    

}









