<?php

class Driver_AjaxDriverController extends Zend_Controller_Action
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
    public function validateDriverInfoAction()
    {
        $msg="";
        if($_GET['d_homebase_ID']==""){
            $msg = $msg."Homebase - is required\n";
        }
        if($_GET['d_First_Name']==""){
            $msg = $msg."First Name - is required!\n";
        }elseif(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_First_Name'])==0){
            $msg = $msg."Invalid First Name!\n";
        }
        if($_GET['d_Last_Name']==""){
            $msg = $msg."Last Name - is required!\n";
        }elseif(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_Last_Name'])==0){
            $msg = $msg."Invalid Last Name!\n";
        }
        if($_GET['d_Middle_Name']!=""){
            if(preg_match("/[\s\.\-A-Za-z]+/",$_GET['d_Middle_Name'])==0){
                $msg = $msg."Invalid Middle Name!\n";
            }
        }
        if($_GET['d_Telephone_Number1']==""){
            $msg = $msg."Telephone #1 - is required\n";
        }
        elseif(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number1'])==0){
            $msg=$msg."Telephone #1 should contain ONLY digits! 9 or 10 digits.\n";
        }
        if($_GET['d_Telephone_Number2']!=""){
            if(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number2'])==0){
                $msg=$msg."Telephone #2 should contain ONLY digits! 9 or 10 digits.\n";
            }
        }
        if($_GET['d_Telephone_Number3']!=""){
            if(preg_match("/[\d\-\s\(\)]{5,15}/",$_GET['d_Telephone_Number3'])==0){
                $msg=$msg."Telephone #3 should contain ONLY digits! 9 or 10 digits.\n";
            }
        }
        if($_GET['d_Medical_Card_Expiration_Date']!=""){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_Medical_Card_Expiration_Date'])==0){
                $msg=$msg."Medical card expiration date is invalid! Please, select correct date (mm/dd/yyyy)!\n";
            }
        }
        if($_GET['d_Doctor_Name']!=""){
            if(preg_match("/[\s\w\.\-]+/",$_GET['d_Doctor_Name'])==0){
                $msg = $msg."Invalid Doctors Name!\n";
            }
        }
        if($_GET['d_TWIC']!=""){
            if(preg_match("/[A-Za-z0-9]+/",$_GET['d_TWIC'])==0){
                $msg = $msg."Invalid TWIC number! (Should contain only letters and numbers)\n";
            }
        }
        if($_GET['d_TWIC_expiration']!=null){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_TWIC_expiration'])==0){
                $msg=$msg."TWIC expiration date is invalid! Please, select correct date (mm/dd/yyyy)!\n";
            }
        }
        if($_GET['d_R_A']!=""){
            if(preg_match("/[A-Za-z0-9]+/",$_GET['d_R_A'])==0){
                $msg = $msg."Invalid R/A card number! (Should contain only letters and numbers)\n";
            }
        }
        if($_GET['d_R_A_expiration']!=null){
            if(preg_match("/[\d]{2}\/[\d]{2}\/[\d]{4}/",$_GET['d_R_A_expiration'])==0){
                $msg=$msg."Resident/Alien card expiration date is invalid! Please, select correct date (mm/dd/yyyy)!\n";
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