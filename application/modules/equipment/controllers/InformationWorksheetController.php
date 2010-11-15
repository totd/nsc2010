<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_InformationWorksheetController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction($VIN = null)
    {
        if (is_null($VIN)) {
            $VIN = $this->_request->getParam('VIN');
            if (is_null($VIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($VIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                    'e_Number' => $VIN,
                );
            // Create equipment only with VIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        } else {
            // message about an existen equipment.
            //$this->_redirect('/equipment/search/index/VIN/' . $VIN);
        }



        $this->view->equipmentRow = $equipmentRow;
        $this->view->breadcrumbs = "<a href='/equipment/list/index'>Equipments</a>&nbsp;&gt;&nbsp;New Equipment View";
        $this->view->action = '/equipment/update-status/';
        $this->view->pageTitle = 'VEHICLE INFORMATION WORKSHEET';
    }



    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Save imformation worksheet of a new equipment.
     *
     * @param string $VIN
     *
     * @return mixed
     */
    public function updateAction($VIN = null)
    {
        if (is_null($VIN)) {
            $VIN = $this->_request->getParam('VIN');
            if (is_null($VIN)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentRow = $equipmentModel->findEquipmentByVIN($VIN);


        if (is_null($equipmentRow)) {
            $equipmentRow = array(
                    'e_Number' => $VIN,
                );
            // Create equipment only with VIN value
            $equipmentRow = $equipmentModel->createEquipment($equipmentRow);
        } else {
            // message about an existen equipment.
            //$this->_redirect('/equipment/search/index/VIN/' . $VIN);
        }

        $this->view->equipmentRow = $equipmentRow;
        $this->view->breadcrumbs = "<a href='/equipment/list/index'>Equipments</a>&nbsp;&gt;&nbsp;New Equipment View";
        $this->view->action = "/equipment/save/id/{$equipmentRow->e_id}";
        $this->view->pageTitle = 'UPDATE VEHICLE INFORMATION WORKSHEET';
    }

    public function completedAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Completed', $id);
        return $this->_redirect('equipment/list');
    }

    public function declinedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Declined', $id);
        return $this->_redirect('equipment/list');
    }
    
    public function reactivatedAction()
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
            if (is_null($id)) {
                $this->_redirect('/equipment/search');
            }
        }

        $equipmentModel = new Equipment_Model_Equipment();
        $equipmentModel->changeNewEquipmentStatus('Pending', $id);
        return $this->_redirect('equipment/list');
    }

    public function exitAction()
    {
        // TODO Implementation needed.
    }

}
