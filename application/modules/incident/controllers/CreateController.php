<?php
class Incident_CreateController extends Zend_Controller_Action
{
    public function  preDispatch()
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
                    $date = new Zend_Date($incidentDate, "MM/dd/yyyy");
                    $incidentDate = $date->toString("yyyy-MM-dd");
                } catch (Exception $e) {
                    //throw new Exception("Not valid incident date");
                    $thid->_redirect('/index/create/step1');
                }
            } else {
                //throw new Exception("Incident date is required");
                $thid->_redirect('/index/create/step1');
            }

            
            $incidentSession->newIncidentDataArray = array();
            $incidentSession->newIncidentDataArray['i_Date'] = $incidentDate;

            $incidentSession->newIncidentDataArray['i_fatality'] = $this->_request->getPost('fatality');
            $incidentSession->newIncidentDataArray['i_injuries'] = $this->_request->getPost('injuries');
            $incidentSession->newIncidentDataArray['i_towed'] = $this->_request->getPost('towed');
            $incidentSession->newIncidentDataArray['i_citation'] = $this->_request->getPost('citation');

            if ($incidentSession->newIncidentDataArray['i_fatality'] == 'Yes' ||
                    $incidentSession->newIncidentDataArray['i_injuries'] == 'Yes' ||
                    $incidentSession->newIncidentDataArray['i_towed'] == 'Yes') {
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

        if (isset($incidentSession->newIncidentDataArray['i_DOT_Regulated'])) {
            $this->view->i_DOT_Regulated = $incidentSession->newIncidentDataArray['i_DOT_Regulated'];
        }

        $this->view->breadcrumbs = '<a href="/incident/index">Incident Management</a>';
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;<a href="/incident/list">Incident List</a>';
        $this->view->breadcrumbs .= "&nbsp;&gt;&nbsp;New Incident";
        
        $this->view->pageTitle = "NEW INCIDENT";
         $this->view->headScript()->appendFile('/js/incident/create/step2.js', 'text/javascript');
    }

    public function step3Action()
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
            $travelDirection = $this->_request->getPost('i_Travel_Direction_ID', '');
            if (!empty ($travelDirection)) {
                $incidentDataArray['i_Travel_Direction_ID'] = $travelDirection;
            }

            $street = $this->_request->getPost('i_Collision_Highway_Street', '');
            if (!empty ($street)) {
                $incidentDataArray['i_Collision_Highway_Street'] = $street;
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

            $injured = $this->_request->getPost('injured');
            if (!empty ($injured)) {
                $incidentDataArray['i_Injured'] = $injured;
            }

            $deceased = $this->_request->getPost('deceased');
            if (!empty ($deceased)) {
                $incidentDataArray['i_Deceased'] = $deceased;
            }

            $alcoholTest = $this->_request->getPost('alcoholTest');
            if (!empty ($alcoholTest)) {
                $incidentDataArray['i_Alcohol_Test'] = $alcoholTest;
            }

            $incidentDataArray['i_reason_not_conducted_alcohol_test'] = $this->_request->getPost('i_reason_not_conducted_alcohol_test');
                        
            $drugTest = $this->_request->getPost('drugTest');
            if (!empty ($drugTest)) {
                $incidentDataArray['i_Drug_Test'] = $drugTest;
            }

            $incidentDataArray['i_reason_not_conducted_drug_test'] = $this->_request->getPost('i_reason_not_conducted_drug_test');

            $incidentSession->newIncidentDataArray = $incidentDataArray;

            $this->saveAction($incidentDataArray);
            //$incidentSession->__unset('newIncidentDataArray');
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
            $selectTravelDirectionArray[$travelDirection->td_id] = array('text' => $travelDirection->td_type);
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
        $this->view->headScript()->appendFile('/js/incident/create/step3.js');
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



    public function addDriverAction()
    {
        $driver_id = $this->_request->getParam('driver_id');
        $incident_id = $this->_request->getParam('incident_id');

        if ($incident_id == 'new') {
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
                $this->_redirect('/incident/create/step3');
            } else {
                $incidentDataArray['i_Driver_ID'] = $driver_id;
                $incidentSession->newIncidentDataArray = $incidentDataArray;
                $this->_redirect('/incident/create/step3');
            }
        } else {
            $this->_redirect("/incident/index/change-driver/i_ID/$incident_id/i_Driver_ID/$driver_id");
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

