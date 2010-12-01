<?php

class Ajax_DriverAddressHistoryController extends Zend_Controller_Action
{

    public function init()
    {
        //Turn off autorender of templites
        $this->_helper->viewRenderer->setNoRender();
        // turn of templites
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction()
    {
        // action body
    }

    public function addRecordAction()
    {
        $dah_Address1 = $_REQUEST['dah_Address1'];
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $dah_City = $_REQUEST['dah_City'];
        $dah_State = $_REQUEST['dah_State'];
        $dah_Postal_Code = $_REQUEST['dah_Postal_Code'];
        $dah_Phone = $_REQUEST['dah_Phone'];
        $dah_Start_Date = $_REQUEST['dah_Start_Date'];
        $dah_End_Date = $_REQUEST['dah_End_Date'];
        $dah_Current_Address = $_REQUEST['dah_Current_Address'];


        $errors=0;
        $msg = "";
        if((int)$dah_Driver_ID==null){
            $errors++;
            $msg=$msg."Driver ID losted.\n";
        }
        if($dah_Address1==null){
            $errors++;
            $msg=$msg."Please, fill Street!\n";
        }
        if($dah_City==null){
            $errors++;
            $msg=$msg."Please, fill City.\n";
        }elseif(preg_match("/[\s\w\.\-\&,]+/",$dah_City)==0){
            $errors++;
            $msg=$msg."City should contain ONLY Alpha-numeric sybols, and '-.&, ' symbols!\n";
        }
        if($dah_State==null){
            $errors++;
            $msg=$msg."Please, select State.\n";
        }
        if($dah_Postal_Code==null){
            $errors++;
            $msg=$msg."Please, fill Zip!\n";
        }elseif(preg_match("/[\d\-]{5,10}/",$dah_Postal_Code)==0){
            $errors++;
            $msg=$msg."Zip should contain ONLY digits! 5 or 10 digits.\n";
        }
        if($dah_Phone==null){
            $errors++;
            $msg=$msg."Please, fill Phone!\n";
        }
        $dah_Phone = preg_replace("/[^0-9]+/","",$dah_Phone);
        if(preg_match("/[\d\-\s\(\)]{5,15}/",$dah_Phone)==0){
            $errors++;
            $msg=$msg."Phone should contain ONLY digits! 9 or 10 digits.\n";
        }
        if($dah_Start_Date==null){
            $errors++;
            $msg=$msg."Please, select From Date!\n";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$dah_Start_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct date (mm/dd/yyyy)!\n";
        }
        if($dah_End_Date==null){
            $errors++;
            $msg=$msg."Please, select To Date!\n";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$dah_End_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct date (mm/dd/yyyy)!\n";
        }
        if(strtoupper($dah_Current_Address)!="YES" && $dah_Current_Address!="NO"){
            $errors++;
            $msg=$msg."Some error with Current Address field.\n";
        }
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['dah_Driver_ID']=$dah_Driver_ID;
            $data['dah_Address1']=$dah_Address1 ;
            $data['dah_City']=$dah_City ;
            $data['dah_State']=$dah_State;
            $data['dah_Postal_Code']=$dah_Postal_Code ;
            $data['dah_Phone']=$dah_Phone ;

            $date = new Zend_Date($dah_Start_Date);
            $data['dah_Start_Date'] =  $date->toString("YYYY-MM-dd");
            $date = new Zend_Date($dah_End_Date);
            $data['dah_End_Date'] =  $date->toString("YYYY-MM-dd");
            $data['dah_Current_Address']=$dah_Current_Address;

            Driver_Model_DriverAddressHistory::createRecord($data);
            echo 1;
        }
    }
    public function getDriverAddressHistoryListAction()
    {
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $arr = new Driver_Model_DriverAddressHistory();
        $stateList = State_Model_State::getList();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/ajax/views/scripts/driver-address-history/');
        $layout->setLayout('get-driver-address-history-list');
        $layout->driverAddressHistoryList = $arr->getList($dah_Driver_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function deleteRecordAction()
    {
        $dah_ID = $_REQUEST['dah_ID'];
        Driver_Model_DriverAddressHistory::deleteRecord($dah_ID);
    }

    public function getRecordAction()
    {
        $dah_ID = $_REQUEST['dah_ID'];
        $arr = new Driver_Model_DriverAddressHistory();
        $stateList = State_Model_State::getList();
        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/ajax/views/scripts/driver-address-history/');
        $layout->setLayout('get-record');
        $layout->driverAddressHistoryRecord = $arr->getRecord($dah_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function updateRecordAction()
    {
        $errors=0;
        $msg = "";
        if((int)$_REQUEST['dah_Driver_ID']==null){
            $errors++;
            $msg=$msg."Driver ID losted.\n";
        }
        if($_REQUEST['dah_Address1']==null){
            $errors++;
            $msg=$msg."Please, fill Street!\n";
        }
        if($_REQUEST['dah_City']==null){
            $errors++;
            $msg=$msg."Please, fill City.\n";
        }elseif(preg_match("/[\s\w\.\-\&,]+/",$_REQUEST['dah_City'])==0){
            $errors++;
            $msg=$msg."City should contain ONLY Alpha-numeric sybols, and '-.&, ' symbols!\n";
        }
        if($_REQUEST['dah_State']==null){
            $errors++;
            $msg=$msg."Some error with State field.\n";
        }
        if($_REQUEST['dah_Postal_Code']==null){
            $errors++;
            $msg=$msg."Please fill Zip!\n";
        }elseif(preg_match("/[\d\-]{5,10}/",$_REQUEST['dah_Postal_Code'])==0){
            $errors++;
            $msg=$msg."Zip should contain ONLY digits! from 5 to 10 digits.\n";
        }
        if($_REQUEST['dah_Phone']==null){
            $errors++;
            $msg=$msg."Please fill Phone!\n";
        }
        $dah_Phone = preg_replace("/[^0-9]+/","",$_REQUEST['dah_Phone']);
        if(preg_match("/[\d\-\s\(\)]{5,15}/",$_REQUEST['dah_Phone'])==0){
            $errors++;
            $msg=$msg."Phone should contain ONLY digits! 9 or 10 digits.\n";
        }
        if($_REQUEST['dah_Start_Date']==null){
            $errors++;
            $msg=$msg."Please select From Date!\n";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_REQUEST['dah_Start_Date'])==0){
            $errors++;
            $msg=$msg."Please, select correct date (mm/dd/yyyy)!\n";
        }
        if($_REQUEST['dah_End_Date']==null){
            $errors++;
            $msg=$msg."Please select To Date!\n";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_REQUEST['dah_End_Date'])==0){
            $errors++;
            $msg=$msg."Please, select correct date (mm/dd/yyyy)!\n";
        }
        if(strtoupper($_REQUEST['dah_Current_Address'])!="YES" && $_REQUEST['dah_Current_Address']!="NO"){
            $errors++;
            $msg=$msg."Some error with Current Address field.\n";
        }
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['dah_ID']=$_REQUEST['dah_ID'];
            $data['dah_Driver_ID']=$_REQUEST['dah_Driver_ID'];
            $data['dah_Address1']=$_REQUEST['dah_Address1'];
            $data['dah_City']=$_REQUEST['dah_City'];
            $data['dah_State']=$_REQUEST['dah_State'];
            $data['dah_Postal_Code']=$_REQUEST['dah_Postal_Code'];
            $data['dah_Phone']=$_REQUEST['dah_Phone'];

            $date = new Zend_Date($_REQUEST['dah_Start_Date']);
            $data['dah_Start_Date'] =  $date->toString("YYYY-MM-dd");
            $date = new Zend_Date($_REQUEST['dah_End_Date']);
            $data['dah_End_Date'] =  $date->toString("YYYY-MM-dd");
            $data['dah_Current_Address']=$_REQUEST['dah_Current_Address'];

            Driver_Model_DriverAddressHistory::updateRecord($data);
            echo 1;
        }
    }
}