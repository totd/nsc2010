<?php

class Inspection_IndexController extends Zend_Controller_Action
{
    public function init()
    {
    }

    public function indexAction()
    {
    }

    public function createAction($equipmentId = null)
    {
        if (is_null($equipmentId)) {
            $equipmentId = $this->_request->getParam('equipmentId');
        }

        if (!is_null($equipmentId) && !empty($equipmentId)) {
            $inspectionModel = new Inspection_Model_Inspection();

            // TODO implement creation through the form
            $row = array (
                'ins_Equipment_ID' => $equipmentId
            );

            try {
                $inspectionModel->saveInspection($row);

                $this->view->inspectionRow = $row;
            } catch (Exception $e) {

            }
        }
    }
}

