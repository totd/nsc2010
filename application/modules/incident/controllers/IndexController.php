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

        // create state select.
        $stateModel = new State_Model_State();
        $states = $stateModel->getList();

        $selectStateArray = array('' => '-');
        foreach ($states as $state) {
            if (is_object($state)) {
                $selectStateArray[$state->s_id] = $state->s_name;
            } else if (is_array ($state)){
                $selectStateArray[$state['s_id']] = $state['s_name'];
            }
        }
        $this->view->states = $selectStateArray;

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
        $this->view->breadcrumbs .= '&nbsp;&gt;&nbsp;Incident Profile';

        $this->view->pageTitle = 'INCIDENT INFORMATION WORKSHEET';

        $this->view->headLink()->appendStylesheet('/css/main.css');
        $this->view->headLink()->appendStylesheet('/css/multiselect/common.css');
        $this->view->headLink()->appendStylesheet('/css/multiselect/ui.multiselect.css');
        //$this->view->headScript()->appendFile('/js/jquery-ui.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/multiselect/plugins/tmpl/jquery.tmpl.1.1.1.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/multiselect/ui.multiselect.js', 'text/javascript');
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
                    $incidentModel = new Incident_Model_Incident();
                    $incidentRow = $incidentModel->getIcidentDescription($id);

                    if (isset($incidentRow['i_Date'])) {
                        $myDate = new Zend_Date($incidentRow['i_Date'], "YYYY-MM-dd");
                        $incidentRow['i_Date'] = $myDate->toString("MM/dd/YYYY");
                    }

                    $collisionArray = explode(',', $incidentRow['i_Collision_Movement']);
                    $result['collisionSelectOptions'] = $this->getCollisionSelectOptions($collisionArray);

                    if (isset($incidentRow['i_Collision_Movement'])) {
                        $incidentRow['i_Collision_Movement'] = str_replace(",", ", ", $incidentRow['i_Collision_Movement']);
                        $incidentRow['i_Collision_Movement'] = ucfirst($this->from_camel_case($incidentRow['i_Collision_Movement']));
                    }

                    $result['row'] = $incidentRow;
                    print json_encode($result);
                }
             }
        }

    }

    function from_camel_case($str) {
        $str[0] = strtolower($str[0]);
        $func = create_function('$c', 'return " " . $c[1];');
        return preg_replace_callback('/([A-Z])/', $func, $str);
    }


    public function getDriverInformationAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $incidentId =  $this->_request->getParam('id');

            $incidentModel = new Incident_Model_Incident();
            $driverId = $incidentModel->getIcidentFieldValueById($incidentId, 'i_Driver_ID');

            if (!is_null($driverId)) {
                $driverRow = Driver_Model_Driver::getDriverInfo($driverId);
            }

            if (is_array($driverRow) && count($driverRow) > 0) {
                print json_encode($driverRow);
            }
        }
    }

    public function saveDescriptionAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $incidentModel = new Incident_Model_Incident();

            $data = array();
            $data = $this->_request->getQuery();
            if (isset($data['i_Date'])) {
                try {
                    $date = new Zend_Date($data['i_Date'], "MM/dd/YYYY");
                    $data['i_Date'] = $date->toString("YYYY-MM-dd");
                } catch (Zend_Date_Exception $e) {
                    $data['i_Date'] = '0000-00-00';
                }
            }

            if (isset($data['ic_Preventable']) && isset($data['ic_ID'])) {
                $dataCause = array();
                if (!empty($data['ic_ID'])) {
                    $dataCause['ic_ID'] = $data['ic_ID'];
                } else {
                    // Set value for the foreign key to avoid DB error.
                    $dataCause['ic_Incident_ID'] = $data['i_ID'];
                }

                $dataCause['ic_Preventable'] = $data['ic_Preventable'];
                

                $modelIncidentCause = new Incident_Model_IncidentCause();
                $modelIncidentCause->saveIncidentCause($dataCause);
            }
            unset($data['ic_ID']);
            unset($data['ic_Preventable']);


            $where = $incidentModel->getAdapter()->quoteInto('i_ID = ?', $this->_request->getParam('i_ID'));
            

            $incidentModel->update($data, $where);

            echo 1;
        }
    }

    public function saveDriverInformationAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $incidentModel = new Incident_Model_Incident();

            $data = array();
            $data = $this->_request->getQuery();

            if (isset($data['colMovements']) && is_array($data['colMovements'])) {
                $data['i_Collision_Movement'] = implode(",", $data['colMovements']);
            }
            unset($data['colMovements']);

            $where = $incidentModel->getAdapter()->quoteInto('i_ID = ?', $this->_request->getParam('i_ID'));


            $incidentModel->update($data, $where);

            echo 1;
        }
        
    }

    public function getCollisionSelectOptions($selected) {
        $collisionArray = array(
            "Stopped" => array("text" => "Stopped"),
            "ProceedingStraight" => array("text" => "Proceeding Straight"),
            "RunOffRoadway" => array("text" => "Run Off Roadway"),
            "MakingLeftTurn" => array("text" => "Making Left Turn"),
            "MakingRightTurn" => array("text" => "Making Right Turn"),
            "MakingUTurn" => array("text" => "Making UTurn"),
            "Backing" => array("text" => "Backing"),
            "Slowing" => array("text" => "Slowing"),
            "Stopping" => array("text" => "Stopping"),
            "Passing" => array("text" => "Passing"),
            "ChangingLanes" => array("text" => "Changing Lanes"),
            "Parking" => array("text" => "Parking"),
            "EnteringTraffic" => array("text" => "Entering Traffic"),
            "UnsafeTurning" => array("text" => "Unsafe Turning"),
            "Parked" => array("text" => "Parked"),
            "Merging" => array("text" => "Merging"),
            "WrongWay" => array("text" => "WrongWay")
        );

        foreach($selected as $selectCollision) {
            if (key_exists($selectCollision, $collisionArray)) {
                $collisionArray[$selectCollision]['selected'] = true;
            }
        }

        $result = '';
        foreach ($collisionArray as $key=>$value) {
            $result .= '<option value="' . $key . '"';

            if (isset($value['selected'])) {
                $result .= ' selected="selected"';
            }

            $result .= '>' . $value['text'] . '</option>';
        }

        return $result;
    }

    public function changeDriverAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $incidentModel = new Incident_Model_Incident();

        $data = array();
        $data['i_Driver_ID'] = $this->_request->getParam('i_Driver_ID');

        $where = $incidentModel->getAdapter()->quoteInto('i_ID = ?', $this->_request->getParam('i_ID'));
        $incidentModel->update($data, $where);

        $this->_redirect("/incident/index/index/id/{$this->_request->getParam('i_ID')}");
    }
}

