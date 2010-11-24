<?php

class Ajax_HoursOfServiceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getDriverHoSListAction()
    {
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $arr = new Driver_Model_DriverAddressHistory();
        $stateList = State_Model_State::getList();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/ajax/views/scripts/driver-address-history/');
        $layout->setLayout('get-driver-address-history-list');
        $layout->driverAddressHistoryList = $arr->getList($dah_Driver_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }
}

