<?php
class Violation_ListController extends Zend_Controller_Action
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
    }

    public function indexAction($options = null)
    {
        $this->view->breadcrumbs = '<a href="/violation/index">Violation Management</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;Violation List";

        $from = $this->_getParam('from', 0);
        $step = $this->_getParam('step', 20);
        $orderBy = $this->_getParam('orderBy', 'v_code');
        $orderWay = $this->_getParam('orderWay', 'ASC');

        if (is_null($options)) {
            if ($this->_request->isPost()) {
                $orderBy = $this->_request->getPost('orderBy');
                $orderWay = $this->_request->getPost('orderWay');
            }
        } else if (!isset($options['orderBy']) ||
                !isset($options['orderWay'])) {
            $this->_redirect('/violation/list');
        }

        $this->view->from = $from;
        $this->view->step = $step;
        $this->view->orderBy = $orderBy;
        $this->view->orderWay = $orderWay;

        $violationTypeModel = new Violation_Model_Violation();
        $options['orderBy'] = $orderBy;
        $options['orderWay'] = $orderWay;
        $violations = $violationTypeModel->getViolationList($from, $step, $options);
        if (sizeof($violations) > 0) {
            $this->view->violations = $violations['limitViolations'];
            $this->view->allViolations = $violations['totalCount'];
        } else {
            $this->view->violations = null;
        }

        $this->view->pageTitle = 'LIST OF VIOLATIONS';
        $this->view->headScript()->appendFile('/js/jquery.url.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/violation/list/index.js', 'text/javascript');
    }

}

