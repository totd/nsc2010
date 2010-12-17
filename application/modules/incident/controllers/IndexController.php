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
                    $incidentModel = new Incident_Model_Incident();
                    $incidentRow = $incidentModel->getIcidentDescription($id);

                    if (isset($incidentRow['i_Date'])) {
                        $myDate = new Zend_Date($incidentRow['i_Date'], "YYYY-MM-dd");
                        $incidentRow['i_Date'] = $myDate->toString("MM/dd/YYYY");
                    }

                    if (isset($incidentRow['i_Collision_Movement'])) {
                        $incidentRow['i_Collision_Movement'] = str_replace(",", ", ", $incidentRow['i_Collision_Movement']);
                        $incidentRow['i_Collision_Movement'] = ucfirst($this->from_camel_case($incidentRow['i_Collision_Movement']));
                    }

                    $result = $incidentRow;
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
}

