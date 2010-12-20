<?php

class Driver_DriverController extends Zend_Controller_Action
{
    var $auth;
    public function init()
    {

            # For menu highlighting:
            $this->view->currentPage = "DriverFiles";
            
        $this->auth = Zend_Auth::getInstance();

        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function editDriverInformationAction()
    {

        if ($this->auth->hasIdentity()) {

        }
    }

    public function saveDriverInformationAction()
    {
        if ($this->auth->hasIdentity()) {
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
            try{
                $date->set($_POST['d_Medical_Card_Expiration_Date'],"MM/dd/YYYY");
                $_POST['d_Medical_Card_Expiration_Date']=$date->toString("YYYY-MM-dd");
            }catch(Exception $e){
                $_POST['d_Medical_Card_Expiration_Date']=null;
            }
            try{
                $date->set($_POST['d_TWIC_expiration'],"MM/dd/YYYY");
                $_POST['d_TWIC_expiration']=$date->toString("YYYY-MM-dd");
            }catch(Exception $e){
                $_POST['d_TWIC_expiration']=null;
            }
            try{
                $date->set($_POST['d_R_A_expiration'],"MM/dd/YYYY");
                $_POST['d_R_A_expiration']=$date->toString("YYYY-MM-dd");
            }catch(Exception $e){
                $_POST['d_R_A_expiration']=null;
            }
            $_POST['d_ID']=$driverID;
            $_POST['d_last_update_date']=date("Y-m-d H:i:s");
            unset($_POST['Driver_Personal_Information']);
            if(Driver_Model_Driver::saveDriverInfo($_POST)==true){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
            elseif(Driver_Model_Driver::saveDriverInfo($_POST)==0){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
        }
    }
    public function viewDriverInformationAction()
    {
        if ($this->auth->hasIdentity()) {
            $driverID = (int)$this->_request->getParam('id');
            $this->view->headScript()->appendFile('/js/driver/ajax_validate_driver.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_driverAddressHistory.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_driver_equipment_operated.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_employment_history.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_driver_license.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_homebase2depot.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/driver/ajax_driver_hos.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/jQueryScripts/driver_misc.js', 'text/javascript');

            $this->view->headScript()->appendFile('/js/jQ-autocomplite/jquery.ajaxQueue.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/jQ-autocomplite/jquery.autocomplete.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/jQ-autocomplite/jquery.bgiframe.min.js', 'text/javascript');
            $this->view->headScript()->appendFile('/js/jQ-autocomplite/thickbox-compressed.js', 'text/javascript');
            $this->view->headScript()->appendFile('/css/jQ-autocomplite/jquery.autocomplete.css', 'text/css');
            $this->view->headScript()->appendFile('/css/jQ-autocomplite/thickbox.css', 'text/css');

            #custom autocomplite handlers goes here:
            $this->view->headScript()->appendFile('/js/driver/ajax_autocomplite.js', 'text/javascript');

            # Breadcrumbs & page title goes here:
            $this->view->pageTitle = "DRIVER INFORMATION WORKSHEET- Driver Information";
            $this->view->breadcrumbs = "<a href='/driver/index/index?status=All' >DQF</a>&nbsp;&gt;&nbsp;Driver Profile";
            $driverInfo = Driver_Model_Driver::getDriverInfo($driverID);

            if($this->auth->vau_role=="NSC_LEVEL_0"){
                $driverInfo['d_Driver_SSN'] = preg_replace("/^([0-9]{3})([0-9]{2})([0-9]{4})/","$1-$2-$3",$driverInfo['d_Driver_SSN']);
            }else{
                $driverInfo['d_Driver_SSN'] = preg_replace("/^([0-9]{4})([0-9]{1})([0-9]{4})/","XXX-X$2-$3",$driverInfo['d_Driver_SSN']);
            }

            $homebaseList = Homebase_Model_Homebase::getHomebaseList(null,1);
            $depotList = Depot_Model_Depot::getDepotList($driverInfo['d_homebase_ID'],1);
            $homebase = Homebase_Model_Homebase::getHomebase($driverInfo['d_homebase_ID']);
            $depot = Depot_Model_Depot::getDepot($driverInfo['d_depot_ID']);
            $stateList = State_Model_State::getList();
            $currentDriverHistoryList = new Driver_Model_DriverAddressHistory();
            $currentDriverHistoryList->getList($driverID);
            $currentDriverHosList = Driver_Model_DriverHos::getList($driverID,1);
            $currentDriverLrfwRecord = Driver_Model_DriverLrfw::getRecord($driverID);
            $driverEquipmentOperatedList = Driver_Model_DriverEquipmentOperated::getList($driverID);
            $equipmentTypeList = new EquipmentType_Model_EquipmentType();

            $toDate = date("Y-m-d");
            $arr = explode("-",$toDate);
            for($i=0;$i<=6;$i++){
                $date = date("Y-m-d",mktime(0, 0, 0, $arr[1], $arr[2]-$i, $arr[0]));
                $dt = explode("-",$date);
                $week[$i]['dhos_date']=$dt[1]."/".$dt[2]."/".$dt[0];
                $week[$i]['dhos_hours']="-";
                $week[$i]['dhos_ID']="";
                foreach($currentDriverHosList as $k => $v){
                    if (in_array($date, $v)) {
                        $week[$i]['dhos_hours'] = $v['dhos_hours'];
                        $week[$i]['dhos_ID'] = $v['dhos_ID'];
                    }
                }
            }


            $this->view->driverId = $driverID;
            $this->view->driverInfo = $driverInfo;
            $this->view->homebaseList = $homebaseList;
            $this->view->depotList = $depotList;
            $this->view->homebase = $homebase;
            $this->view->depot = $depot;
            $this->view->stateList = $stateList;
            $this->view->currentDriverHistoryList = $currentDriverHistoryList;
            $this->view->currentDriverHoSList = $week;
            $this->view->currentDriverLrfwRecord = $currentDriverLrfwRecord;
            $this->view->driverEquipmentOperatedList = $driverEquipmentOperatedList;
            $this->view->equipmentTypeList = $equipmentTypeList->getList2();
    }
    }

    public function dqfAction()
    {
        if ($this->auth->hasIdentity()) {
            // DRIVER QUALIFICATION FILE
            $driverID = (int)$this->_request->getParam('driver_id');
            # Breadcrumbs & page title goes here:
            $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driverID."'>Driver</a>&nbsp;&gt;&nbsp;Save Driver Information";
            $this->view->pageTitle = "DRIVER QUALIFICATION FILE";
            $driverID = (int)$this->_request->getParam('driver_id');
            $driverInfo = Driver_Model_Driver::getDriverInfo($driverID);

            $this->view->driverInfo = $driverInfo;
            $this->view->documentsFormList = Documents_Model_CustomDocument::getList($driverID);
        }
    }
    public function driverCompleteAction()
      {

        if ($this->auth->hasIdentity()) {
            $driverID = (int)$this->_request->getParam('id');
            $data['d_ID']=$driverID;
            $data['d_Status']=2;
            
            if(Driver_Model_Driver::saveDriverInfo($data)==true){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
            elseif(Driver_Model_Driver::saveDriverInfo($data)==0){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
        }
      }
    public function driverDeclineAction()
      {

        if ($this->auth->hasIdentity()) {
            $driverID = (int)$this->_request->getParam('id');
            $data['d_ID']=$driverID;
            $data['d_Status']=5;
            
            if(Driver_Model_Driver::saveDriverInfo($data)==true){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
            elseif(Driver_Model_Driver::saveDriverInfo($data)==0){
                $this->_redirect("/driver/driver/view-driver-Information/id/".$driverID);
            }
        }
      }


}

