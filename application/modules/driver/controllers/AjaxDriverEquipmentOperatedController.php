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
        #print_r($equipmentTypes);
        $msg="";
        $deo=array();
        $_GET['deo_records'] = preg_replace("/\n$/","",$_GET['deo_records']);
        $deo_records=explode("\n",$_GET['deo_records']);
        foreach($deo_records as $k => $v){
            $deo[$k]=array();
            $l1 = explode(";",$v);
            foreach($l1 as $k2=>$v2){
                $deo[$k][$k2]=array();
                $l2 = explode(":",$v2);
                $deo[$k][$k2]=$l2[1];
            }
        }
        $fatal_errors=0;
        $date = new Zend_Date(); 
        for($i=0;$i<sizeof($deo);$i++){

            $create_new=0;
            if(preg_match("/[0-9]+/",$deo[$i][0])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR at row #{$deo[$i][0]}:</span> losted record ID.</div>";
                $fatal_errors++;}
            if($deo[$i][1]==""){
                $create_new=1;
            }elseif($deo[$i][1]!="" && preg_match("/[0-9]+/",$deo[$i][1])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR at row #{$deo[$i][0]}:</span> losted record ID.</div>";
                $fatal_errors++;}
            if(preg_match("/[0-9]+/",$deo[$i][2])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR at row #{$deo[$i][0]}:</span> losted Driver ID.</div>";
                $fatal_errors++;}
            if(preg_match("/[0-9]+/",$deo[$i][3])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR at row #{$deo[$i][0]}:</span> losted Equipment Operated Type ID.</div>";
                $fatal_errors++;}
            if((strtolower($deo[$i][4])!="no") && (strtolower($deo[$i][4])!="yes")){
                $msg=$msg."<div><span style='color:red;'>ERROR at row #{$deo[$i][0]}:</span> select \"YES\" or \"NO\".</div>";}
            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$deo[$i][5])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR at row #{$deo[$i][0]}:</span> From Date cant't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($deo[$i][5],"MM/dd/YYYY");
                $deo[$i][5]=$date->toString("YYYY-MM-dd");
            }
            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$deo[$i][6])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR at row #{$deo[$i][0]}:</span> To Date cant't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($deo[$i][6],"MM/dd/YYYY");
                $deo[$i][6]=$date->toString("YYYY-MM-dd");
            }
            if(preg_match("/^[0-9]+$/",$deo[$i][7])==1){
                $deo[$i][6]=$deo[$i][6].".00";}
            elseif(preg_match("/^[0-9]+\.[0-9]+$/",$deo[$i][7])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR at row #{$deo[$i][0]}:</span> Total Miles can contain only digits and dot.</div>";}
            $deo[$i][7] = preg_replace("/\.([0-9][0-9])(.)+$/",".$1",$deo[$i][7]);
            if($create_new==1){
                Driver_Model_DriverEquipmentOperated::createRecord($deo[$i]);
            }else{
                Driver_Model_DriverEquipmentOperated::updateRecord($deo[$i]);
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