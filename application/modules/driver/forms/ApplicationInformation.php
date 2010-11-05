<?php

class driver_Form_ApplicationInformation extends Zend_Form
{

    public function init(){
        
    }
    public function getForm($driverInfo)
    {
        $this->setMethod('post');
        $this->setAttrib('id','driver_applicationInformation_Form');
        $this->setAttrib('name','driver_applicationInformation_Form');

        # set identifier for current form;
        $formName = new Zend_Form_Element_Hidden('form_id');
        $formName->setAttrib('hidden','hidden');
        $formName->setValue('driver_applicationInformation_Form');
        $this->addElement($formName);

        $d_Employment_Type = new Zend_Form_Element_Select('d_Employment_Type');
        $d_Employment_Type->setLabel('Application Type');
        $d_Employment_Type->setRequired('true');
        $d_Employment_Type->addMultiOptions(array(
            'Employer' => 'Employee/Driver',
            'Operator' => 'Operator/Contractor'
        ));
        $d_Employment_Type->setValue($driverInfo['d_Employment_Type']);
        $this->addElement($d_Employment_Type);

        $d_Employment_Type = new Zend_Form_Element_Text('entry date');
        $d_Employment_Type->setLabel('Entry Date');
        $d_Employment_Type->setAttrib('disabled', 'disabled');
        $d_Employment_Type->setValue($driverInfo['d_Entry_Date']);
        $this->addElement($d_Employment_Type);
        
        $d_Employment_Type = new Zend_Form_Element_Text('statys');
        $d_Employment_Type->setLabel('Status');
        $d_Employment_Type->setAttrib('disabled', 'disabled');
        $d_Employment_Type->setValue($driverInfo['d_Status']);
        $this->addElement($d_Employment_Type);

        $submit = $this->addElement('submit', 'application_type', array('label' => 'Save'));
    }


}

