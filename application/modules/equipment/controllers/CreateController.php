<?php

/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Handle of the equipment creation.
 */
class Equipment_CreateController extends Zend_Controller_Action
{

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Create a new equipment.
     */
    public function indexAction()
    {
        $equipmentForm = new Equipment_Form_Equipment();
        if ($this->_request->isPost()) {
            if ($equipmentForm->isValid($_POST)) {
                $equipmentModel = new Equipment_Model_Equipment();
                $equipmentRow = array(
 
                );
                $equipmentModel->createEquipment($equipmentRow);
                return $this->_redirect('equipment/list'); 
            }
        }
        $equipmentForm->setAction('/equipment/create');

        $this->view->form = $equipmentForm;
    }

}
