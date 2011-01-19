<?php

class Documents_AjaxDocumentViewController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();

        $this->_helper->viewRenderer->setNoRender();
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


         if ($this->auth->hasIdentity()) {
            $layout->identity = $this->auth->getIdentity();
        }
        
        $layout->scans = $scans;
        $layout->cd_Driver_ID = $cd_Driver_ID;
        echo $layout->render();

    }

    # get document's view form
    # Vlad 15.01.2011
    public function getViewDocumentFormAction(){

        $layout = new Zend_Layout();
        $layout->setLayoutPath(APPLICATION_PATH.'/modules/documents/views/scripts/ajax/');
        $layout->setLayout('get-view-document-form');

         if ($this->auth->hasIdentity()) {
            $layout->identity = $this->auth->getIdentity();
        }

        $cd_ID = $_REQUEST['cd_ID'];
        $custom_document = Documents_Model_CustomDocument::getRecord($cd_ID);
        $scans = Documents_Model_CustomDocument::getScansList($custom_document[0]['cd_Driver_ID'],$custom_document[0]['cd_Form_Name_ID']);
        $layout->scans = $scans;


        if($custom_document[0]['cd_Company_ID']!=""){
            $homebaseList = Homebase_Model_Homebase::getHomebaseList($custom_document[0]['cd_Company_ID']);
            $layout->homebaseList = $homebaseList;
        }
        $layout->customDocument = $custom_document;
        echo $layout->render();

    }
}







