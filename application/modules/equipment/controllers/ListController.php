<?php
/**
 * @author Andryi Ilnytskiy 04.11.2010
 *
 * Default controller of the equipment module.
 */
class Equipment_ListController extends Zend_Controller_Action
{
    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskiy 04.11.2010
     *
     * Deafault action.
     */
    public function indexAction()
    {
        $equipments = Equipment_Model_Equipment::getEquipmentList();
        if ($equipments->count() > 0) {
            $this->view->equipments = $equipments;
        } else {
            $this->view->equipments = null;
        }

        // TODO implement hiden CreteEquipment link if user hasn't permission
        $this->view->display_create_link = true;

        //$partial = array('partials/_header.phtml', 'user');
        $partial = array('partial/_Header.phtml', 'default');
        $this->view->navigation()->menu()->setPartial($partial);
    }
}

