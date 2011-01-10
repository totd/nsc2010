<?php
class Incident_DotController extends Zend_Controller_Action
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

    public function getDotCriteriaAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->_request->isXmlHttpRequest()) {
            $result = array (
                'result' => 0,
                'errorMessage' => ''
            );

            $incidentId = $this->_request->getParam('incidentId');

            if (!empty($incidentId)) {
                $incidentModel = new Incident_Model_Incident();
                $incidentRow = $incidentModel->getIncidentDescription($incidentId);

                if ($incidentRow) {
                    $layout = new Zend_Layout();
                    $layout->setLayoutPath(APPLICATION_PATH . '/modules/incident/views/scripts/partials/index');
                    $layout->setLayout('_dot-criteria');

                    $layout->fatality = $incidentRow['i_fatality'];
                    $layout->injuries = $incidentRow['i_injuries'];
                    $layout->towed = $incidentRow['i_towed'];
                    $layout->citation = $incidentRow['i_citation'];
                    $layout->dotRegulated = $incidentRow['i_DOT_Regulated'];

                    if ($incidentRow['i_fatality'] == 'Yes' || (
                        $incidentRow['i_citation'] == 'Yes' &&
                            ($incidentRow['i_injuries'] == 'Yes' || $incidentRow['i_towed'] == 'Yes')
                            )) {
                        $layout->drugAlcholTestRequired = true;
                    } else {
                        $layout->drugAlcholTestRequired = false;
                    }

                    $layout->i_ID = $incidentId;
                    
                    $result['result'] = 1;
                    $result['markup'] = $layout->render();
                } else {
                    $result['errorMessage'] = 'Incident does not exist';
                }
            } else {
                $result['errorMessage'] = 'Incident is undefined';
            }

            print json_encode($result);
        }
    }

    public function saveDotCriteriaAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $result = array(
            
        );

        if ($this->_request->isXmlHttpRequest()) {
            $data = $this->_request->getQuery();

            if (isset($data['i_ID'])) {
                if ((isset($data['i_fatality']) && $data['i_fatality'] == 'Yes') ||
                    (isset($data['i_injuries']) && $data['i_injuries'] == 'Yes') ||
                    (isset($data['i_towed']) && $data['i_towed'] == 'Yes')
                        ) {
                    $data['i_DOT_Regulated'] = 'Yes';
                } else {
                    $data['i_DOT_Regulated'] = 'No';
                }

                $incidentModel = new Incident_Model_Incident();
                $incidentModel->saveIncident($data);

                echo 1;
            }
        }
    }
}

