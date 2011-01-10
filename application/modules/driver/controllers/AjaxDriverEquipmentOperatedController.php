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

    public function addRecordAction()
    {
        $msg="";
        $date = new Zend_Date();

            if(preg_match("/[0-9]+/",$_GET['deo_Driver_ID'])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Losted Driver ID.</div>";
                }
            if(preg_match("/[0-9]+/",$_GET['deo_Equipment_Type_ID'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> Select Equipment Type!</div>";
                }

            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$_GET['deo_From_Date'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> From Date can't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($_GET['deo_From_Date'],"MM/dd/YYYY");
                $_GET['deo_From_Date']=$date->toString("YYYY-MM-dd");
            }
            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$_GET['deo_To_Date'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> To Date can't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($_GET['deo_To_Date'],"MM/dd/YYYY");
                $_GET['deo_To_Date']=$date->toString("YYYY-MM-dd");
            }
            if(preg_match("/^[0-9]+$/",$_GET['deo_Total_Miles'])==1){
                $_GET['deo_Total_Miles']=$_GET['deo_Total_Miles'].".00";}
            elseif(preg_match("/^[0-9]+\.[0-9]+$/",$_GET['deo_Total_Miles'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> Total Miles can contain only digits and dot.</div>";}
            $_GET['deo_Total_Miles'] = preg_replace("/\.([0-9][0-9])(.)+$/",".$1",$_GET['deo_Total_Miles']);
           
        if($msg!=""){
            echo $msg;
            return null;
        }else{
            if(Driver_Model_DriverEquipmentOperated::createRecord($_GET)){
                echo 1;
            }else{
                Echo "Some error occured while creating record.<br/> Please, contact system administrator.";
            }
        }
    }

    public function deleteRecordAction()
    {
        $deo_ID = $_REQUEST['deo_ID'];
        Driver_Model_DriverEquipmentOperated::deleteRecord($deo_ID);
    }

    public function getRecordAction()
    {
        $deo_ID = $_REQUEST['deo_ID'];
        $arr = new Driver_Model_DriverEquipmentOperated();
        $equipmentTypeList = new EquipmentType_Model_EquipmentType();
        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/driver/views/scripts/ajax/driver-equipment-operated/');
        $layout->setLayout('get-record');
        $layout->equipmentTypeList = $equipmentTypeList->getList2();
        $layout->driverEquipmentOperatedRecord = $arr->getRecord($deo_ID);
        echo $layout->render();
    }
    public function updateRecordAction(){
        $msg="";
        $date = new Zend_Date();
        if($_GET['deo_From_Date']!="" && $_GET['deo_To_Date']!=""){
        $arr1 = explode("/",$_GET['deo_From_Date']);
        $arr2 = explode("/",$_GET['deo_To_Date']);
        $time1 = mktime(0,0,0,$arr1[0],$arr1[1],$arr1[2]);
        $time2 = mktime(0,0,0,$arr2[0],$arr2[1],$arr2[2]);
        if($time1>=$time2){
            $msg=$msg."<div><span style='color:red;'>ERROR:</span> Date <strong>From</strong> shoould be less than date <strong>To</strong> at least for one day!</div>";
        }
        }
            if(preg_match("/[0-9]+/",$_GET['deo_ID'])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Losted Record ID.</div>";
                }
            if(preg_match("/[0-9]+/",$_GET['deo_Driver_ID'])==0){
                $msg=$msg."<div><span style='color:red;'>FATAL ERROR:</span> Losted Driver ID.</div>";
                }
            if(preg_match("/[0-9]+/",$_GET['deo_Equipment_Type_ID'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> Select Equipment Type!</div>";
                }

            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$_GET['deo_From_Date'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> From Date can't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($_GET['deo_From_Date'],"MM/dd/yyyy");
                $_GET['deo_From_Date']=$date->toString("yyyy-MM-dd");
            }
            if(preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$_GET['deo_To_Date'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> To Date can't be empty and should be correct (mm/dd/yyyy).</div>";}
            else{
                $date->set($_GET['deo_To_Date'],"MM/dd/yyyy");
                $_GET['deo_To_Date']=$date->toString("yyyy-MM-dd");
            }
            if(preg_match("/^[0-9]+$/",$_GET['deo_Total_Miles'])==1){
                $_GET['deo_Total_Miles']=$_GET['deo_Total_Miles'].".00";}
            elseif(preg_match("/^[0-9]+\.[0-9]+$/",$_GET['deo_Total_Miles'])==0){
                $msg=$msg."<div><span style='color:red;'>ERROR:</span> Total Miles can contain only digits and dot.</div>";}
            $_GET['deo_Total_Miles'] = preg_replace("/\.([0-9][0-9])(.)+$/",".$1",$_GET['deo_Total_Miles']);

        if($msg!=""){
            echo $msg;
            return null;
        }else{
            if(Driver_Model_DriverEquipmentOperated::updateRecord($_GET)){
                echo 1;
            }else{
                Echo "Some error occured while creating record.<br/> Please, contact system administrator.";
            }
        }
    }
}