<?php

class Driver_AjaxDriverSearchController extends Zend_Controller_Action
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
        $qwe = new Custom_Action_Helper_Validate();
        $qwe->validateDate("1111-22-11","yyyy-mm-dd");
        $orderBy = explode("-",$_REQUEST['order_by']);
        $order_by=preg_match("/[a-zA-Z0-9_\-]+/",$orderBy[0]);
        if($order_by==1 &&(strtolower(($orderBy[1])=="asc")||(strtolower($orderBy[1])=="desc"))){
        }else{
            unset($orderBy);
            $orderBy=array('d_Entry_Date','DESC');
        }
        if(preg_match("/[0-9]+/",$_REQUEST['page'])){$page = $_REQUEST['page'];}
        
        $driverStatusListR = Driver_Model_DriverStatus::getAll(1);
        if (array_key_exists($_REQUEST['status'], $driverStatusListR)) {
            $where =" d_Status =" . $driverStatusListR[$_REQUEST['status']];
        }else{
            $where=" d_Status <> 0";
        }
        $drivers = Driver_Model_Driver::getDrivers($where,$orderBy,$page);
        print_r($drivers);
    }

    public function searchAction()
    {
        $search_by = $_REQUEST['search_by'];
        $search_by_value = $_REQUEST['search_by_value'];

        
    }


}



