<?php

class driver_Form_DriverPersonalInformation extends Zend_Form
{

    public function init(){

    }
    public function getForm($driverInfo)
    {
        $this->setMethod('post');
        $this->setAttrib('id','driver_DriverPersonalInformation_Form');
        $this->setAttrib('name','driver_DriverPersonalInformation_Form');

        # set identifier for current form;
        $formName = new Zend_Form_Element_Hidden('form_id');
        $formName->setAttrib('hidden','hidden');
        $formName->setRequired('true');
        $formName->setValue('driver_DriverPersonalInformation_Form');
        $this->addElement($formName);
/*
        $d_Employment_Type = new Zend_Form_Element_Select('d_First_Name');
        $d_Employment_Type->setLabel('Application Type');
        $d_Employment_Type->setRequired('true');
        $d_Employment_Type->addMultiOptions(array(
            'Employer' => 'Employee/Driver',
            'Operator' => 'Operator/Contractor'
        ));
        $d_Employment_Type->setValue($driverInfo['d_Employment_Type']);
        $this->addElement($d_Employment_Type);
*/
        $d_First_Name = new Zend_Form_Element_Text('d_First_Name');
        $d_First_Name->setLabel('First Name:');
        $d_First_Name->setRequired('true');
        $d_First_Name->setValue($driverInfo['$d_First_Name']);
        $this->addElement($d_First_Name);

        $d_Middle_Name = new Zend_Form_Element_Text('d_Middle_Name');
        $d_Middle_Name->setLabel('Middle Name');
        $d_Middle_Name->setValue($driverInfo['d_Middle_Name']);
        $this->addElement($d_Middle_Name);


        $d_Last_Name = new Zend_Form_Element_Text('d_Last_Name');
        $d_Last_Name->setLabel('Last Name');
        $d_Last_Name->setRequired('true');
        $d_Last_Name->setValue($driverInfo['d_Last_Name']);
        $this->addElement($d_Last_Name);

        $d_Gender = new Zend_Form_Element_Select('d_Gender');
        $d_Gender->setLabel('Sex');
        $d_Gender->setRequired('true');
        $d_Gender->addMultiOptions(array(
            'Male' => 'Male',
            'Female' => 'Female'
        ));
        $d_Gender->setValue($driverInfo['d_Gender']);
        $this->addElement($d_Gender);

        $d_Hair_Color = new Zend_Form_Element_Select('d_Hair_Color');
        $d_Hair_Color->setLabel('Hair Color');
        $d_Hair_Color->addMultiOptions(array(
            Null => '-Select-',
            'Black' => 'Black',
            'Brown' => 'Brown',
            'Blonde' => 'Blonde',
            'White' => 'White',
            'Grey' => 'Grey',
            'Other' => 'Other',
            'N/A' => 'N/A'
        ));
        if($driverInfo['d_Hair_Color']==""){
            $d_Hair_Color->setValue('N/A');
        }else{
            $d_Hair_Color->setValue($driverInfo['d_Hair_Color']);
        }
        $this->addElement($d_Hair_Color);

        $d_Height_Feet = new Zend_Form_Element_Select('d_Height_Feet');
        $d_Height_Feet->setLabel('Height Feet');
        $d_Height_Feet->addMultiOptions(array(
            null => '-Select-',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9'
        ));
        $d_Height_Feet->setValue($driverInfo['d_Height_Feet']);
        $this->addElement($d_Height_Feet);

        $d_Height_Inches = new Zend_Form_Element_Select('d_Height_Inches');
        $d_Height_Inches->setLabel('Height Inches');
        $d_Height_Inches->addMultiOptions(array(
            null => '-Select-',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11'
        ));
        $d_Height_Inches->setValue($driverInfo['d_Height_Inches']);
        $this->addElement($d_Height_Inches);        

        $d_Driver_SSN = new Zend_Form_Element_Text('d_Driver_SSN');
        $d_Driver_SSN->setLabel('Social Security #');
        $d_Driver_SSN->setAttrib('readonly','readonly');
        $d_Driver_SSN->setValue($driverInfo['d_Driver_SSN']);
        $this->addElement($d_Driver_SSN);

        $d_Date_Of_Birth = new Zend_Form_Element_Text('d_Date_Of_Birth');
        $d_Date_Of_Birth->setLabel('Date Of Birth');
        $d_Date_Of_Birth->setRequired('true');
        $d_Date_Of_Birth->setValue($driverInfo['d_Date_Of_Birth']);
        $this->addElement($d_Date_Of_Birth);
        
        $d_Date_Of_Birth = new Zend_Form_Element_Text('Employee identification code');
        $d_Date_Of_Birth->setLabel('Employee identification code ????');
        $d_Date_Of_Birth->setRequired('true');
        $d_Date_Of_Birth->setValue($driverInfo['Employee identification code']);
        $this->addElement($d_Date_Of_Birth);


        $submit = $this->addElement('submit', 'Driver_Personal_Information', array('label' => 'Save'));
    }

}
