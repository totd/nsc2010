<?php

class driver_Form_NewDriver extends Zend_Form
{

    # Form to fill information for new driver 
    public function init()
    {
        $this->setMethod('post');


        $d_Employment_Type = new Zend_Form_Element_Radio('d_Employment_Type');
        $d_Employment_Type->setLabel('Application for:');
        $d_Employment_Type->setRequired('true');
        $d_Employment_Type->addMultiOptions(array(
                    'Employer' => 'Employee/Driver',
                    'Operator' => 'Operator/Contractor'
                        ));
        $d_Employment_Type->setSeparator(' ');
        $this->addElement($d_Employment_Type);

        $d_Driver_SSN = $this->createElement('text','d_Driver_SSN');
        $d_Driver_SSN->setLabel('Driver SSN: (only numbers) ');
        $d_Driver_SSN->setRequired('true');
        $d_Driver_SSN->addValidator('regex',false,array('/[0-9]+/'));
        $d_Driver_SSN->addValidator('StringLength', false, 9);
        $this->addElement($d_Driver_SSN);

        $d_Date_Of_Birth = $this->createElement('text','d_Date_Of_Birth');
        $d_Date_Of_Birth->setLabel('Driver Date Of Birth: (yyyy-mm-dd)');
        $d_Date_Of_Birth->setRequired('true');
        $d_Date_Of_Birth->addFilter('StripTags');
        $d_Date_Of_Birth->addValidator('regex',false,array('/[0-9][0-9][0-9][0-9]\-[0-9][0-9]\-[0-9][0-9]/'));
        $this->addElement($d_Date_Of_Birth);


        $this->addElement('submit', 'Driver', array('label' => 'By Driver'));
        $submit = $this->addElement('submit', 'Administrator', array('label' => 'By Administrator'));
    }


}

