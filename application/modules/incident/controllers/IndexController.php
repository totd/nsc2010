<?php
class Incident_IndexController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('incidentLayout');
    }

    public function  init()
    {
        
    }

    public function indexAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam("id");
        }

        if (is_null($id)) {
            // TODO decide if user is needed to view message about error.
            $this->_redirect('/incident/list');
        }

        $this->view->i_ID = $id;

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;Incident Profile';

        $this->view->pageTitle = 'INCIDENT INFORMATION WORKSHEET';
        $this->view->headScript()->appendFile('/js/incident/index/index.js', 'text/javascript');
    }

    public function getDescriptionAction($id = null)
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if (is_null($id)) {
             if ($this->_request->isXmlHttpRequest()) {
                $id = $this->_request->getParam('id');

                if (!is_null($id)) {
                    $layout = new Zend_Layout();
                    $layout->setLayoutPath(APPLICATION_PATH . '/modules/incident/views/scripts/partials/index');
                    $layout->setLayout('_view_description');

                    $incidentModel = new Incident_Model_Incident();
                    $incidentRow = $incidentModel->getIcidentDescription($id);

                    if (isset($incidentRow['i_Date'])) {
                        $myDate = new Zend_Date($incidentRow['i_Date'], "YYYY-MM-dd");
                        $incidentRow['i_Date'] = $myDate->toString("MM/dd/YYYY");
                    }

                    $layout->incidentRow = $incidentRow;

                    echo $layout->render();
                }
             }
        }
        
    }

    public function getDescriptionUpdateAction($id = null)
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if (is_null($id)) {
             if ($this->_request->isXmlHttpRequest()) {
                $id = $this->_request->getParam('id');

                if (!is_null($id)) {
                    $layout = new Zend_Layout();
                    $layout->setLayoutPath(APPLICATION_PATH . '/modules/incident/views/scripts/partials/index');
                    $layout->setLayout('_view_description');

                    $incidentModel = new Incident_Model_Incident();
                    $incidentRow = $incidentModel->getIcidentDescription($id);

                    if (isset($incidentRow['i_Date'])) {
                        $myDate = new Zend_Date($incidentRow['i_Date'], "YYYY-MM-dd");
                        $incidentRow['i_Date'] = $myDate->toString("MM/dd/YYYY");
                    }

                    $result['row'] = $incidentRow;
                    print json_encode($result);
                }
             }
        }

    }

}

