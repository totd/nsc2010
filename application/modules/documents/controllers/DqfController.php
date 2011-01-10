<?php

class Documents_DqfController extends Zend_Controller_Action
{

    var $auth;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
        }else{
            return $this->_redirect('user/login');
        }
    }

    public function indexAction()
    {
        
    }
    /**
     * @author Vlad Skachkov 19.12.2010
     *
     * Show upload/preview form for document images
     *
     * @param int $driver_id
     * @param int $document_form_name_id
     *
     * @return mixed The number of rows updated.
     */
    public function uploadFormAction()
    {
        $driver_id = (int)$this->_request->getParam('driver_id');
        $document_form_name_id = (int)$this->_request->getParam('document_form_name_id');

        $this->view->headScript()->appendFile('/js/jquery-latest.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery-ui.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/index.js', 'text/javascript');

        $this->view->headScript()->appendFile('/js/ajaxfileupload/ajaxupload.3.5.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/documents/index.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/documents/multiply-upload.js', 'text/javascript');
        $this->view->headScript()->appendFile('/css/document-file-upload.css', 'text/css');
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driver_id."'>Driver</a>&nbsp;&gt;&nbsp;<a href='/driver/driver/dqf/driver_id/".$driver_id."'>DQF</a>&nbsp;&gt;&nbsp;Upload Image Form";
        $this->view->pageTitle = "DRIVER QUALIFICATION FILE UPLOAD IMAGE FORM";


        $scans = Documents_Model_CustomDocument::getScansList($driver_id,$document_form_name_id);

        $this->view->scans = $scans;
        $this->view->driver_id = $driver_id;
        $this->view->document_form_name_id = $document_form_name_id;

            
    }


    /**
     * @author Vlad Skachkov 19.12.2010
     *
     * Show document images
     *
     * @param int $driver_id
     * @param int $document_form_name_id
     *
     * @return html
     */
    public function viewScansAction()
    {
        $driver_id = (int)$this->_request->getParam('driver_id');
        $document_form_name_id = (int)$this->_request->getParam('document_form_name_id');

        $this->view->headScript()->appendFile('/js/jquery-latest.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery-ui.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/index.js', 'text/javascript');

        $this->view->headScript()->appendFile('/js/ajaxfileupload/ajaxupload.3.5.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/documents/index.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/documents/multiply-upload.js', 'text/javascript');
        $this->view->headScript()->appendFile('/css/document-file-upload.css', 'text/css');
        # Breadcrumbs & page title goes here:
        $this->view->breadcrumbs = "<a href='/driver/driver/view-driver-Information/id/".$driver_id."'>Driver</a>&nbsp;&gt;&nbsp;<a href='/driver/driver/dqf/driver_id/".$driver_id."'>DQF</a>&nbsp;&gt;&nbsp;View Document Scans";
        $this->view->pageTitle = "DRIVER QUALIFICATION FILE SCANS";

        $scans = Documents_Model_CustomDocument::getScansList($driver_id,$document_form_name_id);
        
        
        $this->view->scans = $scans;
        $this->view->driver_id = $driver_id;
        $this->view->document_form_name_id = $document_form_name_id;


    }



}







