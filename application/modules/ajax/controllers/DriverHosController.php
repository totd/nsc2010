<?php

class Ajax_DriverHosController extends Zend_Controller_Action
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

    public function proceedHosAction()
    {
        
        $Driver_ID = $_GET['Driver_ID'];
        $dhos_date_str = trim($_GET['dhos_date']);
        $dhos_hours_str = preg_replace("/[^0-9-|\s]+/","",trim($_GET['dhos_hours']));
        $dlrfw_date = trim($_GET['dlrfw_date']);
        $dlrfw_from_time = trim($_GET['dlrfw_from_time']);

        $msg="";
        if($Driver_ID==""){
            $msg=$msg."Driver ID has been lost! Pleas Contact system administrator!\n";
        }/*
        if($dlrfw_date!="" && preg_match("/^[0-9]+$/",$dhos_hours_str)==0){
            $msg=$msg."Please check Date!\n (mm/dd/yyyy)";
        }*/
        if($dlrfw_date!="" && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$dlrfw_date)==0){
            $msg=$msg."Please check Date!\n (mm/dd/yyyy)";
        }
        if($dlrfw_from_time!="" && preg_match("/^[0-9]{1,2}\:[0-9]{1,2}$/",$dlrfw_from_time)==0){
            $msg=$msg."Please check Time! (hh:mm)\n";
        }
        if($msg!=""){echo $msg;}
        else{
            $date = new Zend_Date();
            $dhos_date = explode(" ",$dhos_date_str);
            $dhos_hours = explode("|",$dhos_hours_str);
            unset($dhos_hours[7]);
            for($i=0;$i<sizeof($dhos_hours);$i++){
                $date->set($dhos_date[$i],"MM/dd/YYYY");
                if($dhos_hours[$i]==""){
                    Driver_Model_DriverHos::deleteRecord(array("dhos_Driver_ID"=>$Driver_ID,"dhos_date"=>$date->toString("YYYY-MM-dd")));
                }elseif($dhos_hours[$i]!="-"){
                    $row = Driver_Model_DriverHos::getRecord(array("dhos_Driver_ID"=>$Driver_ID,"dhos_date"=>$date->toString("YYYY-MM-dd")));
                    if(sizeof($row)>1){
                        Driver_Model_DriverHos::updateRecord(array("dhos_Driver_ID"=>$Driver_ID,"dhos_date"=>$date->toString("YYYY-MM-dd"),"dhos_hours"=>$dhos_hours[$i]));
                    }else{
                        Driver_Model_DriverHos::createRecord(array("dhos_Driver_ID"=>$Driver_ID,"dhos_date"=>$date->toString("YYYY-MM-dd"),"dhos_hours"=>$dhos_hours[$i]));
                    }
                }
            }
            $date->set($dlrfw_date,"MM/dd/YYYY");
            $dlrfw_date =Driver_Model_DriverLrfw::getRecord($Driver_ID);
            if($dlrfw_date!=null){
                Driver_Model_DriverLrfw::updateRecord(array("dlrfw_Driver_ID"=>$Driver_ID,"dlrfw_date"=>$date->toString("YYYY-MM-dd"),"dlrfw_from_time"=>$dlrfw_from_time));
            }else{
                Driver_Model_DriverLrfw::createRecord(array("dlrfw_Driver_ID"=>$Driver_ID,"dlrfw_date"=>$date->toString("YYYY-MM-dd"),"dlrfw_from_time"=>$dlrfw_from_time));
            }
        }
        echo 1;
    }


}



