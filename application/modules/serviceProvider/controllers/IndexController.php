<?php
class ServiceProvider_IndexController extends Zend_Controller_Action
{
    public function preDispatch()
    {
        $this->_helper->layout->setLayout('serviceProviderLayout');
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_Validation');
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_View');
    }

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function createAction()
    {
        $this->view->breadcrumbs = '<a href="/serviceProvider/index">Service Provider Management</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;Service Provider Search";
        $this->view->pageTitle = 'New Service Provider';

        $this->view->headScript()->appendFile('/js/sp/index/create.js', 'text/javascript');
    }

    public function saveAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $spModel = new ServiceProvider_Model_ServiceProvider();

            $data = array();
            $data = $this->_request->getQuery();

            $saveResult = $spModel->saveSp($data);

            if (isset($saveResult['row'])) {
                $result['result'] = 1;
                $result['row'] = $saveResult['row'];
            } else if (isset($saveResult['validationError'])) {
                $result['errorMessage'] = $this->_helper->buildValidateError($saveResult['validationError']);
            } else if (isset($saveResult['saveError'])) {
                $result['errorMessage'] = $saveResult['saveError'];
            } else {
                $result['errorMessage'] = "Error is occurred during a violation storing. Please try again later.";
            }

            print json_encode($result);
        }
    }

    public function indexAction()
    {
        $id = $this->_request->getParam('id');
        if (is_null($id)) {
            $this->_redirect('/serviceProvider/list');
        }
        
        $spModel = new ServiceProvider_Model_ServiceProvider();
        $spRow = $spModel->getRow($id);
        if (is_null($spRow)) {
            $this->_redirect('/serviceProvider/list');
        }

        $this->view->spRow = $spRow;

        $this->view->sp_id = $id;
        $this->view->states = $this->_helper->getStateArray();

        $this->view->breadcrumbs = '<a href="/serviceProvider/index">Service Provider Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/serviceProvider/list">Service Provider List</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;Service Provider Profile';

        $this->view->pageTitle = 'SERVICE PROVIDER INFORMATION WORKSHEET';
        
        $this->view->headScript()->appendFile('/js/sp/index/index.js');

        $this->view->headLink()->appendStylesheet('/css/calculator/jquery.calculator.css');
        $this->view->headScript()->appendFile('/js/sp/index/maintenance.js');
        $this->view->headScript()->appendFile('/js/calculator/jquery.calculator.min.js', 'text/javascript');
    }

    public function getInformationAction()
    {
        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);

            $result = array();
            $result['errorMessage'] = '';
            $result['result'] = 0;

            $spId = $this->_request->getParam('sp_id');

            $spModel = new ServiceProvider_Model_ServiceProvider();
            $spRow = $spModel->getRow($spId);

            if (!is_null($spRow)) {
                if (array_key_exists('sp_entry_date', $spRow) && $spRow['sp_entry_date'] != '0000-00-00') {
                    $zendDate = new Zend_Date($spRow['sp_entry_date'], 'yyyy-MM-dd');
                    $spRow['sp_entry_date'] = $zendDate->toString('MM/dd/yyyy');
                } else {
                    $spRow['sp_entry_date'] = '';
                }

                $result['result'] = 1;
                $result['row'] = $spRow;
            } else {
                $result['errorMessage'] = "The specfied Service Provider doesn't exist.";
            }

            print json_encode($result);
        }
    }

    public function getLastModifiedDateAction() {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $spId = $this->_request->getParam('sp_id');

        $lastModifiedDate = '';
        if (!empty($spId)) {
            $spModel = new ServiceProvider_Model_ServiceProvider();
            $lastModifiedDate = $spModel->getLastModifiedDate($spId);

            if (!empty($lastModifiedDate) &&  $lastModifiedDate != '0000-00-00 00:00:00') {
                try {
                    $date = new Zend_Date($lastModifiedDate, "yyyy-MM-dd HH:mm:ss");
                    $lastModifiedDate = $date->toString("MM/dd/yyyy HH:mm");
                } catch (Zend_Date_Exception $e) {
                    $lastModifiedDate = '';
                }
            }
        }

        $result['last_modified_date'] = $lastModifiedDate;
        print json_encode($result);
    }
}

