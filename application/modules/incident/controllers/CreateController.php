<?php
class Incident_CreateController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('incidentLayout');
    }

    public function init()
    {
    }

    public function indexAction()
    {
    }

    public function step1Action()
    {
        if ($this->_request->isPost()) {
            $incidentDate = $this->_request->getPost('i_Date');
            if (!empty($incidentDate)) {
                try {
                    $date = new Zend_Date($incidentDate, "MM/dd/YYYY");
                    $incidentDate = $date->toString("YYYY-MM-dd");
                } catch (Exception $e) {
                    //throw new Exception("Not valid incident date");
                    $thid->_redirect('/index/create/step1');
                }
            } else {
                //throw new Exception("Incident date is required");
                $thid->_redirect('/index/create/step1');
            }

            $incidentSession = new Zend_Session_Namespace('newIncident');
            $incidentSession->newIncident == array();
            $incidentSession->newIncident['i_Date'] = $incidentDate;

            $fatality = $this->_request->getPost('fatality');
            $injuries = $this->_request->getPost('injuries');
            $towed = $this->_request->getPost('towed');
            $citation = $this->_request->getPost('citation');

            if ($fatality == 'Yes' || $injuries == 'Yes' || $towed == 'Yes') {
                $incidentSession->newIncident['i_DOT_Regulated'] = 'Yes';
            } else {
                $incidentSession->newIncident['i_DOT_Regulated'] = 'No';
            }

            $this->_redirect('/incident/create/step2');
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";

        $this->view->pageTitle = "NEW INCIDENT";
        $this->view->headScript()->appendFile('/js/incident/create/step1.js', 'text/javascript');
    }

    public function step2Action()
    {
        if ($this->_request->isPost()) {
            $this->_redirect('/incident/create/step3');
        }

        $incidentSession = new Zend_Session_Namespace('newIncident');

        if (isset($incidentSession->newIncident['i_DOT_Regulated'])) {
            $this->view->i_DOT_Regulated = $incidentSession->newIncident['i_DOT_Regulated'];
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";
        
        $this->view->pageTitle = "NEW INCIDENT";
        $this->view->headScript()->appendFile('/js/incident/create/step2.js', 'text/javascript');
    }

    public function step3Action()
    {
        if ($this->_request->isPost()) {
            $this->_redirect('/incident/create/step4');
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";

        $this->view->pageTitle = "NEW INCIDENT";
        $this->view->headScript()->appendFile('/js/incident/create/step3.js', 'text/javascript');
    }

    public function exitAction()
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');

        if (isset($incidentSession->newIncident)) {
            unset ($incidentSession->newIncident);
        }

        $this->_redirect('/incident/list');
    }
}

