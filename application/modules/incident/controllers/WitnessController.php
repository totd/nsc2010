<?php
class Incident_WitnessController extends Zend_Controller_Action
{
    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('incidentLayout');
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_Validation');
        Zend_Controller_Action_HelperBroker::addPrefix('NSC_Helper_View');
    }

    public function  init()
    {
        $auth = Zend_Auth::getInstance();

        if ($auth->hasIdentity()) {
            $this->view->identity = $auth->getIdentity();
        }
    }

    public function addWitnessAction()
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
                    $dataIncidentsWitnesses = array(
                        'iw_incident_id' => $incidentId,
                        'iw_person_id' => $savePersonResult['row']['per_id']
                    );

                    $incidentsWitnessesModel = new Incident_Model_Witness();
                    $incidentsWitnessesRow = $incidentsWitnessesModel->saveWitness($dataIncidentsWitnesses);

                    if ($incidentsWitnessesRow) {
                        $result['result'] = 1;
                    } else {
                        $result['errorMessage'] = "Error is occurred during a witness-incident storing.";
                    }
                } else if (isset($savePersonResult['validationError'])) {
                    $result['errorMessage'] = $this->_helper->buildValidateError($savePersonResult['validationError']);
                } else {
                    $result['errorMessage'] = "Error is occurred during a witness-person storing.";
                }
            }
        }

        print json_encode($result);
    }

    public function getWitnessesAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();

        if ($this->_request->isXmlHttpRequest()) {
            $incidentId = $this->_request->getParam('incidentId');

            if (!empty($incidentId)) {
                $witnessModel = new Incident_Model_Witness();
                $witnesses = $witnessModel->getListByIncident($incidentId);

                $layout = new Zend_Layout();
                $layout->setLayoutPath(APPLICATION_PATH.'/modules/incident/views/scripts/partials/index/');
                $layout->i_ID = $incidentId;
                $layout->header =  'Witness Information - involved in Incident';

                if ($witnesses) {
                    $layout->setLayout('_witness-list');
                    $layout->witnessList = $witnesses;

                    $layout->states = $this->_helper->getStateArray();
                } else {
                    $layout->setLayout('_empty-list');
                    $layout->message = "No Witness";
                }

                $result['result'] = $layout->render();
            } else {
                $result['errror'] = "Incident is undefined";
            }
        }

        print json_encode($result);
    }

    public function saveWitnessAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array();
        if ($this->_request->isXmlHttpRequest()) {
            $personModel = new Person_Model_Person();

            $data = array();
            $data = $this->_request->getQuery();

            $savePersonResult = $personModel->savePerson($data);
            if (isset($savePersonResult['row'])) {
                $result['result'] = 1;
                $result['row'] = $savePersonResult['row'];
            } else if (isset($savePersonResult['validationError'])) {
                $result['errorMessage'] = $this->_helper->buildValidateError($savePersonResult['validationError']);
            }

            print json_encode($result);
        }
    }

    public function deleteWitnessAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);


        if ($this->_request->isXmlHttpRequest()) {
            $result = array();
            $personId = $this->_request->getParam('per_id');

            $incidentWitnessesModel = new Incident_Model_Witness();
            $countDeletedWitness = $incidentWitnessesModel->deleteWitness($personId);

            if (1 === $countDeletedWitness) {
                $personModel = new Person_Model_Person();
                $count = $personModel->deletePerson($personId);
                if (1 === $count) {
                    $result['result'] = 1;
                } else {
                    $result['error'] = "Can not delete this witness";
                }
            } else {
                $result['error'] = "Can not delete this witness";
            }

            print json_encode($result);
        }
    }
}
