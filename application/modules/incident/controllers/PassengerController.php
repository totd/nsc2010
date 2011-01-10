<?php
class Incident_PassengerController extends Zend_Controller_Action
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

    public function addPassengerAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;

        if ($this->_request->isXmlHttpRequest()) {
            $data = array();
            $data = $this->_request->getQuery();

            $incidentId = $data['i_ID'];
            if (!empty($incidentId)) {
                unset($data['i_ID']);

                $personModel = new Person_Model_Person();
                $savePersonResult = $personModel->savePerson($data);

                if (isset($savePersonResult['row']) && isset($savePersonResult['row']['per_id'])) {
                    $dataIncidentsPassengers = array(
                        'ip_incident_id' => $incidentId,
                        'ip_person_id' => $savePersonResult['row']['per_id']
                    );

                    $incidentsPassengersModel = new Incident_Model_Passenger();
                    $incidentsPassengersRow = $incidentsPassengersModel->savePassenger($dataIncidentsPassengers);

                    if ($incidentsPassengersRow) {
                        $result['result'] = 1;
                    } else {
                        $result['errorMessage'] = "Error is occurred during a passenger storing. Please try again later.<br />";
                    }
                } else if (isset($savePersonResult['validationError'])) {
                    $result['errorMessage'] = $this->buildValidateErrorMessage($savePersonResult['validationError']);
                } else {
                    $result['errorMessage'] = "Error is occurred during a person storing. Please try again later.";
                }
            } else {
                $result['errorMessage'] .= "Incident is undefined.<br />";
            }
        }

        print json_encode($result);
    }

    private function buildValidateErrorMessage($validationErrorArray)
    {
        $result = '';

        if (isset($validationErrorArray['notExistFields'])) {
            $result = "The following fields don't exist: " .
                                    implode(", ", $validationErrorArray['notExistFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['requiredFields'])) {
            $result .= "The following fields are required: " .
                                    implode(", ", $validationErrorArray['requiredFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['notValidFields'])) {
            foreach ($validationErrorArray['notValidFields'] as $value) {
                $result .= $value['message'] . "<br /><br />";
            }
        }

        if (empty($result)) {
            $result = 'Unknown validation error';
        }

        return $result;
    }

    public function getPassengersAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();

        if ($this->_request->isXmlHttpRequest()) {
            $incidentId = $this->_request->getParam('incidentId');

            if (!empty($incidentId)) {
                $passengerModel = new Incident_Model_Passenger();
                $passengers = $passengerModel->getListByIncident($incidentId);

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH.'/modules/incident/views/scripts/partials/index/');

                $layout->i_ID = $incidentId;
                $layout->header =  'Passenger Information - involved in Incident';
                if ($passengers) {
                    $layout->setLayout('_passenger-list');
                    $layout->passengerList = $passengers;

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
                    $layout->states = $selectStateArray;
                } else {
                    $layout->setLayout('_empty-list');
                    $layout->message = "No Passenger";
                }

                $result['result'] = $layout->render();
            } else {
                $result['errror'] = "Incident is undefined";
            }
        }

        print json_encode($result);

    }

    public function savePassengerAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        $result['errorMessage'] = '';
        $result['result'] = 0;
        
        if ($this->_request->isXmlHttpRequest()) {
            $personModel = new Person_Model_Person();

            $data = array();
            $data = $this->_request->getQuery();

            $savePersonResult = $personModel->savePerson($data);
            if (isset($savePersonResult['row'])) {
                $result['result'] = 1;
                $result['row'] = $savePersonResult['row'];
            } else if (isset($savePersonResult['validationError'])) {
                $result['errorMessage'] = $this->buildValidateErrorMessage($savePersonResult['validationError']);
            }

            print json_encode($result);
        }
    }

    public function deletePassengerAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);


        if ($this->_request->isXmlHttpRequest()) {
            $result = array();
            $personId = $this->_request->getParam('per_id');

            $incidentPassengersModel = new Incident_Model_Passenger();
            $countDeletedPassenger = $incidentPassengersModel->deletePassenger($personId);

            if (1 === $countDeletedPassenger) {
                $personModel = new Person_Model_Person();
                $count = $personModel->deletePerson($personId);
                if (1 === $count) {
                    $result['result'] = 1;
                } else {
                    $result['error'] = "Can not delete this passenger";
                }
            } else {
                $result['error'] = "Can not delete this passenger";
            }

            print json_encode($result);
        }
    }
    
}

