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

    # get document's edit form
    public function getEditDocumentFormAction(){

        $cd_ID = $_REQUEST['cd_ID'];
        $cd_Driver_ID = $_REQUEST['cd_Driver_ID'];
        $custom_document = Documents_Model_CustomDocument::getRecord($cd_ID);
        $formStatusList = new Documents_Model_CustomDocumentFormStatus();
        $faxStatusList = new Documents_Model_CustomDocumentFaxStatus();


        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-edit-document-form');
        $layout->customDocument = $custom_document;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        $layout->formStatusList = $formStatusList->getList();
        $layout->faxStatusList = $faxStatusList->getList();
        echo $layout->render();

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







