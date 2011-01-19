<?php
class ServiceProvider_ListController extends Zend_Controller_Action
{
    private $_filterFields = array(
        'sp_name' => array(
            'text' => 'Name'
        ),
        'sp_type' => array(
            'text' => 'Type'
        ),
        'sp_city' => array(
            'text' => 'City'
        ),
        's_name' => array(
            'text' => 'State'
        ),
        'sp_status' => array(
            'text' => 'Status'
        )
    );

    private $_statuses = array(
        'Open' => array(
            'text' => 'Open'
        ),
        'Closed' => array(
            'text' => 'Closed'
        ),
        'All' => array(
            'text' => 'All'
        )
    );

    public function preDispatch()
    {
        $this->_helper->layout->setLayout('serviceProviderLayout');
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->_helper->layout->identity = $auth->getIdentity();
        }
    }

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function indexAction()
    {
        $this->view->breadcrumbs = '<a href="/serviceProvider/index">Service Provider Management</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;Service Provider List";

        // Set parameters for paginator and db-query
        $this->view->status = $options['Status'] = $this->_getParam('Status', 'Open');
        $this->view->from = $from = $this->_getParam('from', 0);
        $this->view->from = $step = $this->_getParam('step', 20);
        $this->view->orderBy = $options['orderBy'] = $this->_getParam('orderBy', 'sp_status');
        $this->view->orderWay = $options['orderWay'] = $this->_getParam('orderWay', 'ASC');
        $options['SearchBy'] = $this->_getParam('SearchBy', 'sp_name');
        $options['SearchText'] = $this->_getParam('SearchText', '');

        $spModel = new ServiceProvider_Model_ServiceProvider();
        $spList = $spModel->getSpList($from, $step, $options);

        if (count($spList)) {
            $this->view->spList = $spList['limitSpList'];
            $this->view->allSp = $spList['totalCount'];
        } else {
            $this->view->spList = null;
        }

        if (!empty($options['SearchText'])) {
            foreach ($this->_filterFields as $key => &$value) {
                if ($options['SearchBy'] == $key) {
                    $value['selected'] = true;
                    $this->view->searchText = $options['SearchText'];
                    break;
                }
            }
        } else {
            $this->_filterFields['sp_name']['selected'] = 'true';
        }
        $this->view->filterFields = $this->_filterFields;

        foreach ($this->_statuses as $key => &$value) {
            if ($options['Status'] == $key) {
                $value['selected'] = true;
                break;
            }
        }
        $this->view->statuses = $this->_statuses;

        $this->view->pageTitle = 'LIST OF SERVICE PROVIDERS';
        $this->view->headScript()->appendFile('/js/jquery.url.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/sp/list.js', 'text/javascript');
    }
}

