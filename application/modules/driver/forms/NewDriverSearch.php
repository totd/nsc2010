<?php

class driver_Form_NewDriverSearch extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');


        $d_Employment_Type = new Zend_Form_Element_Radio('d_Employment_Type');
        $d_Employment_Type->setLabel('Application for:');
        $d_Employment_Type->setRequired('true');
        $d_Employment_Type->addMultiOptions(array(
                    'Employer' => 'Employee',
                    'Operator' => 'Contractor'
                        ));
        $d_Employment_Type->setSeparator(' ');
        $this->addElement($d_Employment_Type);

        $d_Driver_SSN = $this->createElement('text','d_Driver_SSN');
        $d_Driver_SSN->setLabel('Driver SSN: (123-45-6789) ');
        $d_Driver_SSN->setRequired('true');
        $d_Driver_SSN->addFilter('StripTags');
        $this->addElement($d_Driver_SSN);

        $d_Date_Of_Birth = $this->createElement('text','d_Date_Of_Birth');
        $d_Date_Of_Birth->setLabel('Driver Date Of Birth: (yyyy-mm-dd)');
        $d_Date_Of_Birth->setRequired('true');
        $d_Date_Of_Birth->addFilter('StripTags');
        $this->addElement($d_Date_Of_Birth);


        $this->addElement('submit', 'Driver', array('label' => 'By Driver'));
        $submit = $this->addElement('submit', 'Administrator', array('label' => 'By Administrator'));
    }


}

