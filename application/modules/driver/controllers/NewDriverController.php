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
                }else{
                    return $this->_redirect('user/login');
                }
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
        # origin - http://www.driverqualificationonline.com/ProdClient/Application/NewDriverSearch.asp
                # pre-create Driver search. If there no such Driver in DB - offer to create new one.
                $auth = Zend_Auth::getInstance();
                if ($auth->hasIdentity()) {
                    $this->view->identity = $auth->getIdentity();
        
                    # load to template Top Menu
                    $navigation = array('partial/_Header.phtml', 'default');
                    $this->view->navigation()->menu()->setPartial($navigation);
        
                    $NewDriverSearch_form = new driver_Form_NewDriverSearch();
                    $NewDriverSearch_form->setAction('/driver/new-Driver/new-Driver-Search');
        
                    if ($this->_request->isPost() && $NewDriverSearch_form->isValid($_POST)) {
                        if(driver_Model_Driver::searchNewDriver($NewDriverSearch_form->getValues())==true)
                        {
                            # process creating of new Driver
                            $driver = driver_Model_Driver::createPendingDriver($_POST);
                            return $this->_redirect('/driver/new-Driver/driver-Information-Worksheet-View/id/'.$driver);
                        }elseif(driver_Model_Driver::searchNewDriver($NewDriverSearch_form->getValues())==false){
                            # Show message, that Driver with such SSN exist in DB
                            $d_Driver_SSN = $_POST['$d_Driver_SSN'];
                            $this->view->driver_exist = true;
                            $this->view->d_Driver_SSN = $d_Driver_SSN;
                        }else{
                            # something strange occur O_o
                        }
                    }elseif($this->_request->isPost() && !$NewDriverSearch_form->isValid($_POST)){
                        # TODO: implement notification what exactly fields are incorrect
                        $this->view->systemMessage = "Check information in fields!";
                    }else{
                        $this->view->form_NewDriverSearch = $NewDriverSearch_form;
                    }
                }else{
                    return $this->_redirect('user/login');
                }
    }

    public function newDriverCompleteAction()
    {
        // action body
    }
    
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * Show table with driver information need to fill out
     *
     */
    public function driverInformationWorksheetViewAction()
    {

        $partial = array('partial/_Header.phtml', 'default');
        $this->view->navigation()->menu()->setPartial($partial);

        $driverID = (int)$this->_request->getParam('id');
        $driverInfo = driver_Model_Driver::getDriverInfo($driverID);
        
        $driver_applicationInformation_Form = new driver_Form_ApplicationInformation();
        $driver_applicationInformation_Form->getForm($driverInfo);
        $driver_applicationInformation_Form->setAction('/driver/new-Driver/driver-Information-Worksheet-View/id/'.$driverID);

        $driverPersonalInfo_Form = new driver_Form_DriverPersonalInformation();
        $driverPersonalInfo_Form->getForm($driverInfo);
        $driverPersonalInfo_Form->setAction('/driver/new-Driver/driver-Information-Worksheet-View/id/'.$driverID);

        # checking incomind data for Application Information Form.
        # if data correct - saving changes to DB, else - show notification to user:
        if($_POST['form_id']=='driver_applicationInformation_Form'){
            if ($this->_request->isPost() && $driver_applicationInformation_Form->isValid($_POST)) {
                # TODO: create action in Model to save changes
            }
        }
        
        # checking incomind data for Application Information Form.
        # if data correct - saving changes to DB, else - show notification to user:
        if($_POST['form_id']=='driver_applicationInformation_Form'){
            if ($this->_request->isPost() && $driverPersonalInfo_Form->isValid($_POST)) {
                # TODO: create action in Model to save changes
            }
        }

        
        $this->view->driverId = $driverID;
        $this->view->driver_applicationInformation_Form = $driver_applicationInformation_Form;
        $this->view->driverPersonalInfo_Form = $driverPersonalInfo_Form;
    }


    public function updateDriverAction()
    {
        // action body
    }


}









