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
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $dah_Address1 = $_REQUEST['dah_Address1'];
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
            $msg=$msg."Driver ID losted.<br/>";
        }
        if($dah_Address1==null){
            $errors++;
            $msg=$msg."Please fill Street!<br/>";
        }
        if($dah_City==null){
            $errors++;
            $msg=$msg."Please fill City.<br/>";
        }elseif(preg_match("/[\s\w\.\-\&,]+/",$dah_City)==0){
            $errors++;
            $msg=$msg.'City should contain ONLY Alpha-numeric sybols, and "-.&, " symbols!<br/>';
        }
        if($dah_State==null){
            $errors++;
            $msg=$msg."Some error with State field.<br/>";
        }
        if($dah_Postal_Code==null){
            $errors++;
            $msg=$msg."Please fill Zip!<br/>";
        }elseif(preg_match("/[\d\-]{5,10}/",$dah_Postal_Code)==0){
            $errors++;
            $msg=$msg.'Zip should contain ONLY digits! 5 or 10 digits.<br/>';
        }
        if($dah_Phone==null){
            $errors++;
            $msg=$msg."Please fill Phone!<br/>";
        }
        $dah_Phone = preg_replace("/[^0-9]+/","",$dah_Phone);
        if(preg_match("/[\d\-\s\(\)]{5,15}/",$dah_Phone)==0){
            $errors++;
            $msg=$msg.'Phone should contain ONLY digits! 9 or 10 digits.<br/>';
        }
        if($dah_Start_Date==null){
            $errors++;
            $msg=$msg."Please select From Date!<br/>";
        }elseif(preg_match("/[\d]{4}\-[\d]{2}\-[\d]{2}/",$dah_Start_Date)==0){
            $errors++;
            $msg=$msg.'Please, select correct date (yyyy-mm-dd)!<br/>';
        }
        if($dah_End_Date==null){
            $errors++;
            $msg=$msg."Please select To Date!<br/>";
        }elseif(preg_match("/[\d]{4}\-[\d]{2}\-[\d]{2}/",$dah_End_Date)==0){
            $errors++;
            $msg=$msg.'Please, select correct date (yyyy-mm-dd)!<br/>';
        }
        if(strtoupper($dah_Current_Address)!="YES" && $dah_Current_Address!="NO"){
            $errors++;
            $msg=$msg."Some error with Current Address field.<br/>";
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
            $data['dah_Start_Date']=$dah_Start_Date ;
            $data['dah_End_Date']=$dah_End_Date;
            $data['dah_Current_Address']=$dah_Current_Address;

            Driver_Model_DriverAddressHistory::createRecord($data);
            echo 1;
        }
    }

    public function getDriverAddressHistoryListAction()
    {
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $arr = new Driver_Model_DriverAddressHistory();
      /*  $layout = new Zend_Layout();
        $layout->setLayoutPath('/ajax/views/scripts/driverArddressHistory');
        $layout->setLayout('get-driver-address-history-list');
        $layout->content = $arr;
        echo $layout->render('/_history-item');
//        $view->*/
        print_r($arr->getList($dah_Driver_ID));
    }


}



