<?php

class Driver_AjaxDriverEquipmentOperatedController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction()
    {
        // action body
    }
    
    public function getDriverEquipmentOperatedListAction()
    {
        $deo_Driver_ID = $_REQUEST['deo_Driver_ID'];
        $arr = new Driver_Model_DriverEquipmentOperated();
        $equipmentTypeList = new EquipmentType_Model_EquipmentType();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/driver-equipment-operated/');
        $layout->setLayout('get-driver-address-history-list');
        $layout->driverEquipmentOperatedList = $arr->getList($deo_Driver_ID);
        $layout->equipmentTypeList = $equipmentTypeList->getList2();
        echo $layout->render();
    }


    public function updateRecordAction()
    {
        $l_ID = $_REQUEST['l_ID'];
        $l_Driver_ID = $_REQUEST['l_Driver_ID'];
        $l_Driver_License_Number = $_REQUEST['l_Driver_License_Number'];
        $l_Driver_Issue_State_id = $_REQUEST['l_Driver_Issue_State_id'];
        $l_Class = $_REQUEST['l_Class'];
        $l_Expiration_Date = $_REQUEST['l_Expiration_Date'];
        $l_DOT_Regulated = $_REQUEST['l_DOT_Regulated'];
        $l_License_Restrictions = $_REQUEST['l_License_Restrictions'];
        $l_License_Endorsements = str_replace(" ",",",trim($_REQUEST['l_License_Endorsements']));
        $l_Points_Score = $_REQUEST['l_Points_Score'];

        $msg = "";
        $errors=0;
        if((int)$l_Driver_ID==null){
            $errors++;
            $msg=$msg."Driver ID losted. Please, contact system administrator!<br/>";
        }
        if($l_Driver_License_Number==null){
            $errors++;
            $msg=$msg."Please, fill CDL#.<br/>";
        }elseif(preg_match("/^[\w]{2,24}+$/",$l_Driver_License_Number)==0){
            $errors++;
            $msg=$msg."CDL should contain ONLY Alpha-numeric sybols! MAX 24 symbols!<br/>";
        }
        if(preg_match("/^[0-9]+$/",$l_Driver_Issue_State_id)==0){
            $errors++;
            $msg=$msg."Please, select State.<br/>";
        }
        if(preg_match("/^[A-Za-z]$/",$l_Class)==0){
            $errors++;
            $msg=$msg."Please, select Class.<br/>";
        }
        if($l_Expiration_Date==null){
            $errors++;
            $msg=$msg."Please, select Expiration Date!<br/>";
        }elseif(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$l_Expiration_Date)==0){
            $errors++;
            $msg=$msg."Please, select correct date (mm/dd/yyyy)!<br/>";
        }
        if(strtoupper($l_DOT_Regulated)!="YES" && strtoupper($l_DOT_Regulated)!="NO"){
            $errors++;
            $msg=$msg."Please, select YES or NO from DOT Regulated.<br/>";
        }
        if(sizeof($l_License_Restrictions)==0){
            $errors++;
            $msg=$msg."License Restrictions cannot contain more than 100 symbols!<br/>";
        }


        if($errors>0){
            echo $msg;
        }else{

            $data=array();
            $data['l_ID']=$l_ID;
            $data['l_Driver_ID']=$l_Driver_ID;
            $data['l_Driver_License_Number']=$l_Driver_License_Number ;
            $data['l_Driver_Issue_State_id']=$l_Driver_Issue_State_id ;
            $data['l_Class']=$l_Class;
            $date = new Zend_Date($l_Expiration_Date,"MM/dd/YYYY");
            $data['l_Expiration_Date'] =  $date->toString("YYYY-MM-dd");
            $data['l_DOT_Regulated']=$l_DOT_Regulated ;
            $data['l_License_Restrictions']=$l_License_Restrictions;
            $data['l_License_Endorsements']=$l_License_Endorsements;
            $data['l_Points_Score']=$l_Points_Score;

            Driver_Model_License::updateRecord($data);
            echo 1;
        }
    }
    public function validateDriverEquipmentOperatedAction()
    {
        $msg="";
        if($_GET['d_homebase_ID']==""){
            $msg = $msg."Homebase - is required<br/>";
        }
        if($_GET['d_First_Name']==""){
            $msg = $msg."First Name - is required!<br/>";
        }elseif(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_First_Name'])==0){
            $msg = $msg."Invalid First Name!<br/>";
        }
        if($_GET['d_Last_Name']==""){
            $msg = $msg."Last Name - is required!<br/>";
        }elseif(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_Last_Name'])==0){
            $msg = $msg."Invalid Last Name!<br/>";
        }
        if($_GET['d_Middle_Name']!=""){
            if(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_Middle_Name'])==0){
                $msg = $msg."Invalid Middle Name!<br/>";
            }
        }
        if($_GET['d_Telephone_Number1']==""){
            $msg = $msg."Telephone #1 - is required<br/>";
        }
        elseif(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number1'])==0){
            $msg=$msg."Telephone #1 should contain ONLY digits! 9 or 10 digits.<br/>";
        }
        if($_GET['d_Telephone_Number2']!=""){
            if(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number2'])==0){
                $msg=$msg."Telephone #2 should contain ONLY digits! 9 or 10 digits.<br/>";
            }
        }
        if($_GET['d_Telephone_Number3']!=""){
            if(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number3'])==0){
                $msg=$msg."Telephone #3 should contain ONLY digits! 9 or 10 digits.<br/>";
            }
        }
        if($_GET['d_Medical_Card_Expiration_Date']!=""){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_Medical_Card_Expiration_Date'])==0){
                $msg=$msg."Medical card expiration date is invalid! Please, select correct date (mm/dd/yyyy)!<br/>";
            }
        }
        if($_GET['d_Doctor_Name']!=""){
            if(preg_match("/[\s\w\.\-]+/",$_GET['d_Doctor_Name'])==0){
                $msg = $msg."Invalid Doctors Name!<br/>";
            }
        }
        if($_GET['d_TWIC']!=""){
            if(preg_match("/[A-Za-z0-9]+/",$_GET['d_TWIC'])==0){
                $msg = $msg."Invalid TWIC number! (Should contain only letters and numbers)<br/>";
            }
        }
        if($_GET['d_TWIC_expiration']!=null){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_TWIC_expiration'])==0){
                $msg=$msg."TWIC expiration date is invalid! Please, select correct date (mm/dd/yyyy)!<br/>";
            }
        }
        if($_GET['d_R_A']!=""){
            if(preg_match("/[A-Za-z0-9]+/",$_GET['d_R_A'])==0){
                $msg = $msg."Invalid R/A card number! (Should contain only letters and numbers)<br/>";
            }
        }
        if($_GET['d_R_A_expiration']!=null){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_R_A_expiration'])==0){
                $msg=$msg."Resident/Alien card expiration date is invalid! Please, select correct date (mm/dd/yyyy)!<br/>";
            }
        }
        if($msg!=""){
            echo $msg;
            return null;
        }else{
            echo 1;
            return true;
        }
    }
}