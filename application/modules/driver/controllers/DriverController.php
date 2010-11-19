<?php

class Driver_DriverController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function editDriverInformationAction()
    {
        $driverID = (int)$this->_request->getParam('id');
        # Page title goes here:
        $this->view->pageTitle = "DRIVER INFORMATION WORKSHEET- Driver Information";
        $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;Driver Profile List";


        $driverInfo = Driver_Model_Driver::getDriverInfo($driverID);

        $driverPersonalInfo_Form = new Driver_Form_DriverPersonalInformation();
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
    }
    public function saveDriverInformationAction()
    {
        $driverID = (int)$this->_request->getParam('id');
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driverID."'>Driver</a>&nbsp;&gt;&nbsp;Save Driver Information";
        $this->view->pageTitle = "SAVE DRIVER INFORMATION";
        $errors = "";
        if($_POST['d_First_Name']==""){
            $errors = $errors."First Name - is required!<br/>";    
        }/*
        if($_POST['d_Date_Of_Birth']==""){
            $errors = $errors."DOB - is required!<br/>";
        }else{
            $arr = explode("/",$_POST['d_Date_Of_Birth']);
            $_POST['d_Date_Of_Birth'] = $arr[2]."-".$arr[0]."-".$arr[1];
        }*/
        if($_POST['d_Last_Name']==""){
            $errors = $errors."Last Name - is required!<br/>";
        }
        if($_POST['d_Telephone_Number1']==""){
            $errors = $errors."Telephone Number #1 - is required!<br/>";
        }
        if($_POST['d_homebase_ID']==""){
            $errors = $errors."Homebase - is required!<br/>";
        }

        if($errors == ""){
            
        }else{
            
        }
        $_POST['d_ID']=$driverID;
        unset($_POST['Driver_Personal_Information']);
        if(Driver_Model_Driver::saveDriverInfo($_POST)==true){
            $this->_redirect("/driver/new-Driver/driver-Information-Worksheet-View/id/".$driverID);
        }
        elseif(Driver_Model_Driver::saveDriverInfo($_POST)==0){
            $this->_redirect("/driver/new-Driver/driver-Information-Worksheet-View/id/".$driverID);
        }
    }

    public function viewDriverInformationAction()
    {
        $driverID = (int)$this->_request->getParam('id');
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driverID."'>Driver</a>&nbsp;&gt;&nbsp;Save Driver Information";
        $this->view->pageTitle = "SAVE DRIVER INFORMATION";
    }


}







