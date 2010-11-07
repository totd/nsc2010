<?php

/**
 * @author Andryi Ilnytskiy 07.11.2010
 *
 * Handle of the equipment searching.
 */
class Equipment_SearchController extends Zend_Controller_Action
{

    public function init()
    {

    }

    /**
     * @author Andryi Ilnytskyi 07.11.2010
     *
     * Create new equipment only with VIN value
     *
     * @param string $valueVIN Value of the Vehicle Identification Number
     *
     */
    public function indexAction()
    {
        $form = new Equipment_Form_SearchEquipment();
        if ($this->_request->isPost()) {
            if ($form->isValid($_POST)) {
                $equipment = new Equipment_Model_Equipment();
                $searchResult = $equipment->findEquipmentByVIN($form->getValue('VIN'));

                $this->view->VIN = $form->getValue('VIN');
                
                if (is_null($searchResult)) {
                    $this->render('not_exist');
                } else {
                    $this->render('exist');
                }
                return;
            }
        } else {
            $form->setAction('/equipment/search');
            $this->view->form = $form;
        }

        
    }

}

