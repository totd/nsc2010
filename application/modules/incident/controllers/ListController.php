<?php

class Incident_ListController extends Zend_Controller_Action
{

    private $_filterFields = array(
        'i_Number' => array(
            'text' => 'Incident #'
        ),
        'i_Date' => array(
            'text' => 'Date'
        ),
        'd_Name' => array(
            'text' => 'Driver Name'
        ),
        's_Name' => array(
            'text' => 'State'
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
        $this->_helper->layout->setLayout('incidentLayout');
    }

    public function init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function indexAction($options = null)
    {
        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;Incident List";

        // Set parameters for paginator
        $status = $this->_getParam('status', 'Open');
        $from = $this->_getParam('from', 0);
        $step = $this->_getParam('step', 20);
        $orderBy = $this->_getParam('orderBy', 'i_Status');
        $orderWay = $this->_getParam('orderWay', 'ASC');
        $searchBy = $this->_getParam('searchBy');
        $searchText = $this->_getParam('searchText');

        if (is_null($options)) {
            if ($this->_request->isPost()) {
                $options['SearchBy'] = $this->_request->getPost('SearchBy');

                if (!empty($options['SearchBy']) && $options['SearchBy'] == 'i_Date') {
                    try {
                        $searctDate = $this->_request->getPost('SearchText');
                        if (!empty($searctDate)) {
                            $date = new Zend_Date($searctDate, "MM-dd-YYYY");
                            $options['SearchText'] = $date->toString("yyyy-MM-dd");
                        }
                    } catch (Exception $e) {
                        $options['SearchBy'] = 'i_Number';
                        $options['SearchText'] = '';
                    }
                } else {
                    if (!empty($options['SearchBy']) && $options['SearchBy'] == 'd_Name') {
                        $options['SearchBy'] = array('d_First_Name', 'd_Last_Name');
                    }
                    $options['SearchText'] = $this->_request->getPost('SearchText');
                }
                
                $status = $this->_request->getPost('Status');
                $orderBy = $this->_request->getPost('orderBy');
                $orderWay = $this->_request->getPost('orderWay');
                $searchBy = $this->_request->getPost('SearchBy');
                $searchText = $this->_request->getPost('SearchText');
            }
        } elseif (!isset($options['SearchBy']) ||
                !isset($options['Status']) ||
                !isset($options['SearchText']) ||
                !isset($options['orderBy']) ||
                !isset($options['orderWay'])
        ) {
            $this->_redirect('/incident/list');
        }

        $this->view->status = $status;
        $this->view->from = $from;
        $this->view->step = $step;
        $this->view->orderBy = $orderBy;
        $this->view->orderWay = $orderWay;

        $incidentModel = new Incident_Model_Incident();
        $options['Status'] = $status;
        if ($orderBy == 'd_Name') {
            $options['orderBy'] = array('d_First_Name', 'd_Last_Name');
        } else {
            $options['orderBy'] = $orderBy;
        }
        $options['orderWay'] = $orderWay;
        $incidents = $incidentModel->getIncidentList($from, $step, $options);
        if (sizeof($incidents) > 0) {
            foreach ($incidents['limitIncidents'] as $key => &$value) {
                if (isset($value['i_Date']) && !is_null($value['i_Date']) && $value['i_Date'] != '0000-00-00') {
                    $date = new Zend_Date($value['i_Date'], 'yyyy-MM-dd');
                    $value['i_Date'] = $date->toString("MM-dd-YYYY");
                } else {
                    $value['i_Date'] = '';
                }
            }

            $this->view->incidents = $incidents['limitIncidents'];
            $this->view->allIncidents = $incidents['totalCount'];
        } else {
            $this->view->incidents = null;
        }

        if (!empty($searchBy) && !empty($searchText)) {
            foreach ($this->_filterFields as $key => &$value) {
                if ($searchBy == $key) {
                    $value['selected'] = true;
                    $this->view->searchText = $searchText;
                    break;
                }
            }
        } else {
            $this->_filterFields['i_Number']['selected'] = 'true';
        }
        $this->view->filterFields = $this->_filterFields;

        foreach ($this->_statuses as $key => &$value) {
            if ($status == $key) {
                $value['selected'] = true;
                break;
            }
        }
        $this->view->statuses = $this->_statuses;
        
        $this->view->pageTitle = 'LIST OF INCIDENTS';
        $this->view->headScript()->appendFile('/js/jquery.url.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/equipment/list.js', 'text/javascript');
    }

}

