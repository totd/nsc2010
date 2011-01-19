<?php
class Violation_IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('violationLayout');
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_Validation');
    }

    public function createAction()
    {
        $this->view->breadcrumbs = '<a href="/violation/index">Violation Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/violation/list">Violation List</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;New Violation;';

        $this->view->pageTitle = "NEW VIOLATION";
        $this->view->headScript()->appendFile('/js/violation/index/create.js', 'text/javascript');
    }

    public function indexAction($violationId = null)
    {
        if (is_null($violationId)) {
            $violationId = $this->_request->getParam("id");
        }

        if (is_null($violationId)) {
            $this->_redirect('/violation/list');
        }
        
        $violationModel = new Violation_Model_Violation();
        $violationRow = $violationModel->getRow($violationId);

        if (is_null($violationRow)) {
            $this->redirect('/violation/list');
        }

        $this->view->violationRow = $violationRow;


        $this->view->breadcrumbs = '<a href="/violation/index">Violation Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/violation/list">Violation List</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;Update Violation;';

        $this->view->pageTitle = "UPDATE VIOLATION INFORMATION";
        $this->view->headScript()->appendFile('/js/violation/index/index.js', 'text/javascript');
    }

    public function saveAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $data = array();
            $data = $this->_request->getQuery();

            $violationModel = new Violation_Model_Violation();
            $saveResult = $violationModel->saveViolation($data);

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
}

