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
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            // Clean session
            $incidentSession->__unset('newIncidentDataArray');
        }

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

            
            $incidentSession->newIncidentDataArray == array();
            $incidentSession->newIncidentDataArray['i_Date'] = $incidentDate;

            $fatality = $this->_request->getPost('fatality');
            $injuries = $this->_request->getPost('injuries');
            $towed = $this->_request->getPost('towed');
            $citation = $this->_request->getPost('citation');

            if ($fatality == 'Yes' || $injuries == 'Yes' || $towed == 'Yes') {
                $incidentSession->newIncidentDataArray['i_DOT_Regulated'] = 'Yes';
            } else {
                $incidentSession->newIncidentDataArray['i_DOT_Regulated'] = 'No';
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
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            $incidentDataArray = $incidentSession->newIncidentDataArray;
            if (!isset($incidentDataArray['i_Date'])
                    || !isset($incidentDataArray['i_DOT_Regulated'])
                    ) {
                // User reaches this page without meeting previos steps
                $this->exitAction();
            }
        } else {
            // User reaches this page without meeting previos steps
            $this->exitAction();
        }

        if ($this->_request->isPost()) {
            $this->_redirect('/incident/create/step3');
        }

        if (isset($incidentSession->newIncidentDataArray['i_DOT_Regulated'])) {
            $this->view->i_DOT_Regulated = $incidentSession->newIncidentDataArray['i_DOT_Regulated'];
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";
        
        $this->view->pageTitle = "NEW INCIDENT";
    }

    public function step3Action()
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            $incidentDataArray = $incidentSession->newIncidentDataArray;
            if (!isset($incidentDataArray['i_Date']) || !isset($incidentDataArray['i_DOT_Regulated'])) {
                // User reaches this page without meeting previos steps
                $this->exitAction();
            }
        } else {
            // User reaches this page without meeting previos steps
            $this->exitAction();
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";

        $this->view->pageTitle = "NEW INCIDENT";
    }

    public function step4Action()
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            $incidentDataArray = $incidentSession->newIncidentDataArray;
            if (!isset($incidentDataArray['i_Date'])
                    || !isset($incidentDataArray['i_DOT_Regulated'])
                    || !isset($incidentDataArray['i_Driver_ID'])
                    ) {
                // User reaches this page without meeting previos steps
                $this->exitAction();
            }
        } else {
            // User reaches this page without meeting previos steps
            $this->exitAction();
        }

        if ($this->_request->isPost()) {
            
            $injured = $this->_request->getPost('injured', 'No');
            $deceased = $this->_request->getPost('deceased', 'No');
            $alcoholTest = $this->_request->getPost('alcoholTest', 'No');
            $drugTest = $this->_request->getPost('drugTest', 'No');

            $incidentDataArray = $incidentSession->newIncidentDataArray;
            $incidentDataArray['i_Injured'] = $injured;
            $incidentDataArray['i_Deceased'] = $deceased;
            $incidentDataArray['i_Alcohol_Test'] = $alcoholTest;
            $incidentDataArray['i_Drug_Test'] = $drugTest;

            $incidentSession->newIncidentDataArray = $incidentDataArray;
            $this->_redirect('/incident/create/step5');
        }

        
        $driver_id = $incidentDataArray['i_Driver_ID'];
        if (!is_null($driver_id)) {
            $driverRow = Driver_Model_Driver::getDriverInfo($driver_id);
        }
        
        if (is_array($driverRow) && count($driverRow) > 0) {
            $this->view->driverName = "{$driverRow['d_First_Name']} {$driverRow['d_Middle_Name']} {$driverRow['d_Last_Name']}";
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";

        $this->view->pageTitle = "NEW INCIDENT";
        $this->view->headScript()->appendFile('/js/incident/create/step4.js', 'text/javascript');
    }

    public function step5Action()
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            $incidentDataArray = $incidentSession->newIncidentDataArray;
            if (!isset($incidentDataArray['i_Date'])
                    || !isset($incidentDataArray['i_DOT_Regulated'])
                    || !isset($incidentDataArray['i_Driver_ID'])
                    || !isset($incidentDataArray['i_Injured'])
                    || !isset($incidentDataArray['i_Deceased'])
                    || !isset($incidentDataArray['i_Alcohol_Test'])
                    || !isset($incidentDataArray['i_Drug_Test'])
                    ) {
                // User reaches this page without meeting previos steps
                $this->exitAction();
            }
        } else {
            // User reaches this page without meeting previos steps
            $this->exitAction();
        }

        $driver_id = $incidentDataArray['i_Driver_ID'];
        if (!is_null($driver_id)) {
            $driverRow = Driver_Model_Driver::getDriverInfo($driver_id);
        }

        if (is_array($driverRow) && count($driverRow) > 0) {
            $this->view->driverRow = $driverRow;
        }

        // create travel direction select.
        $travelDirectionModel = new Incident_Model_TravelDirection();
        $travelDirections = $travelDirectionModel->getList();

        $selectTravelDirectionArray = array('' => array('text' => '-'));
        foreach ($travelDirections as $travelDirection) {
            $selectTravelDirectionArray[$travelDirection->ihstd_id] = array('text' => $travelDirection->ihstd_type);
        }
        $selectTravelDirectionArray['']['selected'] = true;
        $this->view->travelDirections = $selectTravelDirectionArray;

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";

        $this->view->pageTitle = "NEW INCIDENT";

        $this->view->headLink()->appendStylesheet('/css/main.css');
        $this->view->headLink()->appendStylesheet('/css/multiselect/common.css');
        $this->view->headLink()->appendStylesheet('/css/multiselect/ui.multiselect.css');
        $this->view->headScript()->appendFile('/js/jquery-ui.min.js');
        $this->view->headScript()->appendFile('/js/multiselect/plugins/tmpl/jquery.tmpl.1.1.1.js');
        $this->view->headScript()->appendFile('/js/multiselect/ui.multiselect.js');
        $this->view->headScript()->appendFile('/js/incident/create/step5.js');
    }



    public function addDriverAction($driver_id = null)
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');
        if ($incidentSession->__isset('newIncidentDataArray')) {
            $incidentDataArray = $incidentSession->newIncidentDataArray;
            if (!isset($incidentDataArray['i_Date']) || !isset($incidentDataArray['i_DOT_Regulated'])) {
                // User reaches this page without meeting step1
                $this->exitAction();
            }
        } else {
            // User reaches this page without meeting step1
            $this->exitAction();
        }

        if (is_null($driver_id)) {
            $driver_id = $this->_request->getParam('driver_id');
        }

        if (is_null($driver_id)) {
            $this->_redirect('/incident/create/step3');
        } else {
            $incidentDataArray['i_Driver_ID'] = $driver_id;
            $incidentSession->newIncidentDataArray = $incidentDataArray;
            $this->_redirect('/incident/create/step4');
        }
    }

    public function exitAction()
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');

        if (isset($incidentSession->newIncidentDataArray)) {

            unset ($incidentSession->newIncidentDataArray);
        }

        $this->_redirect('/incident/list');
    }
}

