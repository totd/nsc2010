<?php

class Documents_AjaxDocumentViewController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        //Turn off autorender of templites
        $this->_helper->viewRenderer->setNoRender();
        // turn of templites
        $this->_helper->layout()->disableLayout();
    }


    # get document scans list fo current form
    public function getDocumentScansListAction(){

        $cd_Driver_ID = $_REQUEST['cd_Driver_ID'];
        $cd_Form_Name_ID = $_REQUEST['cd_Form_Name_ID'];
        $scans = Documents_Model_CustomDocument::getScansList($cd_Driver_ID,$cd_Form_Name_ID);

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-scans-list');
        $layout->scans = $scans;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        echo $layout->render();

    }

}







