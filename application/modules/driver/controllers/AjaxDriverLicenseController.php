<?php
class Driver_AjaxDriverLicenseController extends Zend_Controller_Action
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
        if(sizeof($l_License_Restrictions)>100){
            $errors++;
            $msg=$msg."License Restrictions cannot contain more than 100 symbols!<br/>";
        }


        if($errors>0){
            echo $msg;
        }else{

            $data=array();
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

            Driver_Model_License::createRecord($data);
            echo 1;
        }
    }

    public function getDriverLicensesListAction()
    {
        $l_Driver_ID = $_REQUEST['l_Driver_ID'];
        $arr = new Driver_Model_License();
        $stateList = State_Model_State::getList();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/driver-license/');
        $layout->setLayout('get-driver-licenses-list');
        $layout->driverLicensesList = $arr->getList($l_Driver_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function deleteRecordAction()
    {
        $l_ID = $_REQUEST['l_ID'];
        Driver_Model_License::deleteRecord($l_ID);
    }

    public function getRecordAction()
    {
        $l_ID = $_REQUEST['l_ID'];
        $arr = new Driver_Model_License();
        $stateList = State_Model_State::getList();
        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/driver-license/');
        $layout->setLayout('get-record');
        $layout->driverLicenseRecord = $arr->getRecord($l_ID);
        $layout->stateList = $stateList;
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


}











