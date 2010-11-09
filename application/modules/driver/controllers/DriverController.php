<?php

class Driver_DriverController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function editDriverInformationAction()
    {

        $partial = array('partials/_driver-menu.phtml', 'default');
        $this->view->navigation()->menu()->setPartial($partial);

        $driverID = (int)$this->_request->getParam('id');
        $driverInfo = driver_Model_Driver::getDriverInfo($driverID);

        $driverPersonalInfo_Form = new driver_Form_DriverPersonalInformation();
        $driverPersonalInfo_Form->getForm($driverInfo);
        $driverPersonalInfo_Form->setAction('/driver/new-Driver/driver-Information-Worksheet-View/id/'.$driverID);

        # checking incomind data for Application Information Form.
        # if data correct - saving changes to DB, else - show notification to user:
        if($_POST['form_id']=='driver_applicationInformation_Form'){
            if ($this->_request->isPost() && $driver_applicationInformation_Form->isValid($_POST)) {
                # TODO: create action in Model to save changes
            }
        }

        # checking incomind data for Application Information Form.
        # if data correct - saving changes to DB, else - show notification to user:
        if($_POST['form_id']=='driver_applicationInformation_Form'){
            if ($this->_request->isPost() && $driverPersonalInfo_Form->isValid($_POST)) {
                # TODO: create action in Model to save changes
            }
        }


        $this->view->driverId = $driverID;
        $this->view->driver_applicationInformation_Form = $driver_applicationInformation_Form;
        $this->view->driverPersonalInfo_Form = $driverPersonalInfo_Form;
    }


}



