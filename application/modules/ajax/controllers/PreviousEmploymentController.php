<?php

class Ajax_PreviousEmploymentController extends Zend_Controller_Action
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

    public function getPreviousEmploymentListAction()
    {
        $dah_Driver_ID = $_REQUEST['dah_Driver_ID'];
        $arr = new Driver_Model_DriverPreviousEmployment();
        $stateList = State_Model_State::getList();

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/ajax/views/scripts/previous-employment/');
        $layout->setLayout('get-previous-employment-list');
        $layout->driverEmploymentHistoryList = $arr->getList($dah_Driver_ID);
        $layout->stateList = $stateList;
        echo $layout->render();
    }

    public function editPreviouseEmploymentAction()
    {
        // action body
    }

}
