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
        $driverID = $_POST['d_ID'];
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driverID."'>Driver</a>&nbsp;&gt;&nbsp;Save Driver Information";
        $this->view->pageTitle = "SAVE DRIVER INFORMATION";
        $errors = "";
        if($_POST['d_First_Name']==""){
            $errors = $errors."First Name - is required!<br/>";
        }
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
        $date = new Zend_Date();
        $date->set($_POST['d_Medical_Card_Expiration_Date'],"MM/dd/YYYY");
        $_POST['d_Medical_Card_Expiration_Date']=$date->toString("YYYY-MM-dd");
        $_POST['d_ID']=$driverID;
        unset($_POST['Driver_Personal_Information']);
        if(Driver_Model_Driver::saveDriverInfo($_POST)==true){
            $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
        }
        elseif(Driver_Model_Driver::saveDriverInfo($_POST)==0){
            $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
        }
    }
    public function viewDriverInformationAction()
    {
        $driverID = (int)$this->_request->getParam('id');
        $this->view->headScript()->appendFile('/js/driver/ajax_driverAddressHistory.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/ajax_employment_history.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/ajax_driver_license.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/driver/ajax_homebase2depot.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jQueryScripts/driver_misc.js', 'text/javascript');
        # Breadcrumbs & page title goes here:
        $this->view->pageTitle = "DRIVER INFORMATION WORKSHEET- Driver Information";
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-information/id/".$driverID."' >DQF</a>&nbsp;&gt;&nbsp;Driver Profile";

        $driverInfo = Driver_Model_Driver::getDriverInfo($driverID);
        $homebaseList = Homebase_Model_Homebase::getHomebaseList(null,1);
        $depotList = Depot_Model_Depot::getDepotList($driverInfo['d_homebase_ID'],1);
        $homebase = Homebase_Model_Homebase::getHomebase($driverInfo['d_homebase_ID']);
        $depot = Depot_Model_Depot::getDepot($driverInfo['d_depot_ID']);
        $stateList = State_Model_State::getList();
        $currentDriverHistoryList = new Driver_Model_DriverAddressHistory();
        $currentDriverHistoryList->getList($driverID);


        $this->view->driverId = $driverID;
        $this->view->driverInfo = $driverInfo;
        $this->view->homebaseList = $homebaseList;
        $this->view->depotList = $depotList;
        $this->view->homebase = $homebase;
        $this->view->depot = $depot;
        $this->view->stateList = $stateList;
        $this->view->currentDriverHistoryList = $currentDriverHistoryList;
    }

    public function dqfAction()
    {
        // DRIVER QUALIFICATION FILE
        $driverID = (int)$this->_request->getParam('driver_id');
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driverID."'>Driver</a>&nbsp;&gt;&nbsp;Save Driver Information";
        $this->view->pageTitle = "DRIVER QUALIFICATION FILE";
    }


}

