<?php
class Equipment_VehicleFileController extends Zend_Controller_Action
{
    public function  init()
    {
    }

    public function  preDispatch()
    {
        $this->_helper->layout->setLayout('equipmentLayout');
    }

    public function indexAction($id = null)
    {
        if (is_null($id)) {
            $id = $this->_request->getParam('id');
        }

        if (!is_null($id) && !empty($id)) {
            $equipmentModel = new Equipment_Model_Equipment();
            $equipmentRow = $equipmentModel->getRow($id);

            if (!$equipmentRow) {
                $this->view->errorMessage = "Equipment doesn't exist.";
                $this->_redirect("/equipment/truck-files");
            }

            $row = $equipmentModel->findEquipmentByVIN($equipmentRow->e_Number);

            $this->view->equipmentRow = $row;

            $this->view->breadcrumbs = '<a href="/equipment/index">Equipment Management</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;<a href="/equipment/truck-files">Truck Files</a>&nbsp;&gt;';
            $this->view->breadcrumbs .= '&nbsp;Vehicle File';

            $this->view->pageTitle = 'Vehicle File';
        }
    }
}

