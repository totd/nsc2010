<?php
class Incident_IndexController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('incidentLayout');
    }

    public function  init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function indexAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam("id");
        }

        if (is_null($id)) {
            $this->_redirect('/incident/list');
        }

        $incidentModel = new Incident_Model_Incident();
        if (!$incidentModel->incidentIsExists($id)) {
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
            $selectTravelDirectionArray[$travelDirection->td_id] = array('text' => $travelDirection->td_type);
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
        $this->view->headScript()->appendFile('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/multiselect/plugins/tmpl/jquery.tmpl.1.1.1.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/multiselect/ui.multiselect.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/incident/index/autocomplete.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/incident/index/index.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/incident/index/witness.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/incident/index/passenger.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/incident/index/dot.js', 'text/javascript');
        
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
                    $incidentRow = $incidentModel->getIncidentDescription($id);

                    if (isset($incidentRow['i_Date'])) {
                        $incidentDate = new Zend_Date($incidentRow['i_Date'], "yyyy-MM-dd");
                        $incidentRow['i_Date'] = $incidentDate->toString("MM/dd/yyyy");
                    }

                    $collisionArray = explode(',', $incidentRow['i_Collision_Movement']);
                    
                    $result['collisionSelectOptions'] = $this->getCollisionSelectOptions($collisionArray);

                    if (isset($incidentRow['i_Collision_Movement'])) {
                        $incidentRow['i_Collision_Movement'] = str_replace(",", ", ", $incidentRow['i_Collision_Movement']);
                        $incidentRow['i_Collision_Movement'] = ucfirst($this->from_camel_case($incidentRow['i_Collision_Movement']));
                    }

                    $result['row'] = $incidentRow;
                    $result['row']['collisionArray'] = $collisionArray;
                    $result['row']['collisionSelectOptions'] = $this->getCollisionSelectOptions($collisionArray);

                    $result['row']['alcohol_test_cease_all_attempts_2hours'] = false;
                    $result['row']['alcohol_test_cease_all_attempts_8hours'] = false;
                    $result['row']['drug_test_cease_all_attempts'] = false;

                    if ($incidentRow['i_fatality'] == 'Yes' || (
                        $incidentRow['i_citation'] == 'Yes' &&
                            ($incidentRow['i_injuries'] == 'Yes' || $incidentRow['i_towed'] == 'Yes')
                            )) {
                        $sameDay = false;
                        if (isset($incidentDate) && isset($incidentRow['i_Time'])) {
                            $incidentTime = explode(":", $incidentRow['i_Time']);
                            $incidentDate->add($incidentTime[0], Zend_Date::HOUR);
                            $incidentDate->add($incidentTime[1], Zend_Date::MINUTE);
                            $incidentDate->add($incidentTime[2], Zend_Date::SECOND);

                            $currentDate = new Zend_Date();
                            $diffSeconds = $currentDate->sub($incidentDate)->get();

                            $secondsIn2Days = 2 * 60 * 60 *24;
                            $secondsIn8Days = 8 * 60 * 60 *24;
                            $secondsIn32Days = 32 * 60 * 60 *24;

                            if ($diffSeconds > $secondsIn2Days) {
                                $result['row']['alcohol_test_cease_all_attempts_2hours'] = true;
                            }

                            if ($diffSeconds > $secondsIn8Days) {
                                $result['row']['alcohol_test_cease_all_attempts_8hours'] = true;
                            }

                            if ($diffSeconds > $secondsIn32Days) {
                                $result['row']['drug_test_cease_all_attempts'] = true;
                            }
                        }
                    }

                    print json_encode($result);
                }
             }
        }

    }

    private function from_camel_case($str) {
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

            $driverRow = '';
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
                    $date = new Zend_Date($data['i_Date'], "MM/dd/yyyy");
                    $data['i_Date'] = $date->toString("yyyy-MM-dd");
                } catch (Zend_Date_Exception $e) {
                    $data['i_Date'] = '0000-00-00';
                }
            }

            $incidentModel->saveIncident($data);

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

            $incidentModel->saveIncident($data);

            echo 1;
        }
        
    }

    private function getCollisionSelectOptions($selected) {
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

    public function addInvolvedEquipmentAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        
        $incidentId = $this->_request->getParam('incidentId');
        $equipmentId = $this->_request->getParam('equipmentId');

        if (!empty($incidentId) && !empty($equipmentId)) {
            $incidentModel = new Incident_Model_Incident();
            $data = array(
                'i_ID' => $incidentId,
                'i_Equipment_ID' => $equipmentId
                );
            $incidentModel->saveIncident($data);
            $this->_redirect("/incident/index/index/id/$incidentId");
        } else {
            $this->_redirect("/incident/list");
        }
    }

    public function deleteInvolvedEquipmentAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $incidentId = $this->_request->getParam('incidentId');

        if (!empty($incidentId)) {
            $incidentModel = new Incident_Model_Incident();
            $incidentModel->deleteInvolvedEquipment($incidentId);
            $this->_redirect("/incident/index/index/id/$incidentId");
        } else {
            $this->_redirect("/incident/list");
        }
    }

    public function getLastModifiedDateAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $incidentId = $this->_request->getParam('incidentId');

        $lastModifiedDate = '';
        if (!empty($incidentId)) {
            $incidentModel = new Incident_Model_Incident();
            $lastModifiedDate = $incidentModel->getLastModifiedDate($incidentId);

            if (!empty($lastModifiedDate) &&  $lastModifiedDate != '0000-00-00 00:00:00') {
                try {
                    $date = new Zend_Date($lastModifiedDate, "yyyy-MM-dd HH:mm:ss");
                    $lastModifiedDate = $date->toString("MM/dd/yyyy HH:mm");
                } catch (Zend_Date_Exception $e) {
                    $lastModifiedDate = '';
                }
            }
        }

        $result['last_modified_date'] = $lastModifiedDate;
        print json_encode($result);
    }


}

