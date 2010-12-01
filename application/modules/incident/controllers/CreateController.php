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

        if ($this->_request->isPost()) {
            $travelDirection = $this->_request->getPost('i_Highway_Street_Travel_Direction', '');
            if (!empty ($travelDirection)) {
                $incidentDataArray['i_Highway_Street_Travel_Direction'] = $travelDirection;
            }

            $street = $this->_request->getPost('i_Highway_Street', '');
            if (!empty ($street)) {
                $incidentDataArray['i_Highway_Street'] = $street;
            }

            $actualSpeed = $this->_request->getPost('i_Actual_Speed', '');
            if (!empty ($actualSpeed)) {
                $incidentDataArray['i_Actual_Speed'] = $actualSpeed;
            }
            
            $speedLimit = $this->_request->getPost('i_Speed_Limit', '');
            if (!empty ($speedLimit)) {
                $incidentDataArray['i_Speed_Limit'] = $speedLimit;
            }

            $colMovements = $this->_request->getPost('colMovements', null);
            if (!is_null($colMovements) && is_array($colMovements)) {
                $incidentDataArray['i_Collision_Movement'] = implode(",", $colMovements);
            }

            $colMovementsOther = $this->_request->getPost('colMovementsOther', '');
            if (!empty($colMovementsOther)) {
                $incidentDataArray['i_Collision_Movement_Other'] = $colMovementsOther;
            }

            $injured = $this->_request->getPost('injured', $incidentDataArray['i_Injured']);
            if (!empty ($injured)) {
                $incidentDataArray['i_Injured'] = $injured;
            }

            $deceased = $this->_request->getPost('deceased', $incidentDataArray['i_Deceased']);
            if (!empty ($deceased)) {
                $incidentDataArray['i_Deceased'] = $deceased;
            }

            $alcoholTest = $this->_request->getPost('alcoholTest', $incidentDataArray['i_Alcohol_Test']);
            if (!empty ($alcoholTest)) {
                $incidentDataArray['i_Alcohol_Test'] = $alcoholTest;
            }

            $drugTest = $this->_request->getPost('drugTest', $incidentDataArray['i_Drug_Test']);
            if (!empty ($drugTest)) {
                $incidentDataArray['i_Drug_Test'] = $drugTest;
            }

            $incidentSession->newIncidentDataArray = $incidentDataArray;

            $this->saveAction($incidentDataArray);
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

        $this->view->injured = $incidentDataArray['i_Injured'];
        $this->view->deceased = $incidentDataArray['i_Deceased'];
        $this->view->alcoholTest = $incidentDataArray['i_Alcohol_Test'];
        $this->view->drugTest = $incidentDataArray['i_Drug_Test'];

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

    public function saveAction($incidentRow = null)
    {
        $incidentSession = new Zend_Session_Namespace('newIncident');

        if (is_null($incidentRow)) {
            $incidentRow = $incidentSession->newIncidentDataArray;
        }

        $incidentModel = new Incident_Model_Incident();
        $incidentModel->saveIncident($incidentRow);

        $incidentSession->__unset('newIncidentDataArray');

        $this->_redirect('/incident/list');
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

