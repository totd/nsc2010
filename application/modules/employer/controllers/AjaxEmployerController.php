<?php

class Employer_AjaxEmployerController extends Zend_Controller_Action
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

    public function addRecordAction()
    {
        $emp_Employer_Name = $_REQUEST['emp_Employer_Name'];
        $emp_Address1 = $_REQUEST['emp_Address1'];
        $emp_City = $_REQUEST['emp_City'];
        $emp_State_ID = $_REQUEST['emp_State_ID'];
        $emp_Postal_Code = $_REQUEST['emp_Postal_Code'];
        $emp_Phone = $_REQUEST['emp_Phone'];
        $emp_Fax = $_REQUEST['emp_Fax'];
        $emp_DOT_Safety_Sensitive_Function = $_REQUEST['emp_DOT_Safety_Sensitive_Function'];
        $emp_FMCSR_Regulated = $_REQUEST['emp_FMCSR_Regulated'];
        
        $errors=0;
        $msg = "";
        if($emp_Employer_Name==null){
            $errors++;
            $msg=$msg."Please, fill Employer!<br/>";}
        if($emp_Address1==null){
            $errors++;
            $msg=$msg."Please, fill Street!<br/>";}
        if($emp_City==null){
            $errors++;
            $msg=$msg."Please, fill city!<br/>";}
        if($emp_State_ID==null || $emp_State_ID=="-"){
            $errors++;
            $msg=$msg."Please, select State!<br/>";}
        if($emp_Postal_Code==""){
            $errors++;
            $msg=$msg."Please, fill Zip!<br/>";}
        elseif(preg_match("/[\d]{5,10}/",$emp_Postal_Code)==0){
            $errors++;
            $msg=$msg."Zip must be from 5 to 9 digits!<br/>";}
        if($emp_Phone==""){
            $errors++;
            $msg=$msg."Please, fill Phone!<br/>";}
        elseif(preg_match("/[\d]{8,10}/",$emp_Phone)==0){
            $errors++;
            $msg=$msg."Phone must be from 8 to 10 digits!<br/>";}
        if($emp_Fax==""){
            $errors++;
            $msg=$msg."Please, fill Phone!<br/>";}
        elseif(preg_match("/[\d]{8,10}/",$emp_Fax)==0){
            $errors++;
            $msg=$msg."Fax must be from 8 to 10 digits!<br/>";}
        
        if($errors>0){
            echo $msg;
        }else{
            $data=array();
            $data['emp_Employer_Name']=$emp_Employer_Name;
            $data['emp_Address1']=$emp_Address1;
            $data['emp_City']=$emp_City;
            $data['emp_State_ID']=$emp_State_ID;
            $data['emp_Postal_Code']=$emp_Postal_Code;
            $data['emp_Phone']=$emp_Phone;
            $data['emp_Fax']=$emp_Fax;
            $data['emp_DOT_Safety_Sensitive_Function']=$emp_DOT_Safety_Sensitive_Function;
            $data['emp_FMCSR']=$emp_FMCSR_Regulated;

            Employer_Model_Employer::createRecord($data);
            $row = Employer_Model_Employer::getRecordBySearchQuery($data);
            if(sizeof($row)>0){
                echo $row['emp_ID'];
            }else{ echo "Can't find employer!";}
        }
    }



}