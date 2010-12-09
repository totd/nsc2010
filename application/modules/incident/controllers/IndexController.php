<?php
class Incident_IndexController extends Zend_Controller_Action
{
    public function  init()
    {
        
    }

    public function indexAction()
    {
        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;Incident Profile';

        $this->view->pageTitle = 'INCIDENT INFORMATION WORKSHEET';
    }

}

