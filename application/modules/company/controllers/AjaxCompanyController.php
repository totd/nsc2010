<?php

class Company_AjaxCompanyController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    # get company logo if aviable
    public function getLogoAction(){
        $ct_ID = $_REQUEST['ct_ID'];
        $company = Company_Model_Company::getRecord($ct_ID);
        if($company[0]['ct_logo']!=""){
            echo "/system/company/company_".$ct_ID."/".$company[0]['ct_logo']."?".rand(0,999);
        }else{echo 0;}
    }



}