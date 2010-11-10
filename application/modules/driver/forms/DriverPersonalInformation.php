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


        $d_Employment_Type = new Zend_Form_Element_Select('d_Employment_Type');
        $d_Employment_Type->setLabel('Application Type');
        $d_Employment_Type->setRequired('true');
        $d_Employment_Type->addMultiOptions(array(
            '4' => 'Employee/Driver',
            '3' => 'Operator/Contractor'
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
        $d_Employment_Type->setValue($_SESSION['driver_info']['DriverStatus_list'][$driverInfo['d_Status']]);
        $this->addElement($d_Employment_Type);
        
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
            '1' => 'Male',
            '2' => 'Female'
        ));
        $d_Gender->setValue($_SESSION['driver_info']['DriverGender_list'][$driverInfo['d_Gender']]);
        $this->addElement($d_Gender);

        $d_Hair_Color = new Zend_Form_Element_Select('d_Hair_Color');
        $d_Hair_Color->setLabel('Hair Color');
        $d_Hair_Color->addMultiOptions(array(
            Null => '-Select-',
            '1' => 'Black',
            '2' => 'Brown',
            '3' => 'Blonde',
            '4' => 'White',
            '5' => 'Grey',
            '6' => 'Other'
        ));
        $d_Hair_Color->setValue($_SESSION['driver_info']['DriverHairColor_list'][$driverInfo['d_Hair_Color']]);
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
        
        $d_Medical_Card_Expiration_Date = new Zend_Form_Element_Text('d_Medical_Card_Expiration_Date');
        $d_Medical_Card_Expiration_Date->setLabel('Medical Card Expiration Date');
        $d_Medical_Card_Expiration_Date->setValue($driverInfo['d_Medical_Card_Expiration_Date']);
        $this->addElement($d_Medical_Card_Expiration_Date);
        /*
        $d_Medical_Card_Expiration_Date = new Zend_Form_Element_Text('d_Medical_Card_Expiration_Date');
        $d_Medical_Card_Expiration_Date->setLabel("Medical Examiner's Name");
        $d_Medical_Card_Expiration_Date->setValue($driverInfo['d_Medical_Card_Expiration_Date']);
        $this->addElement($d_Medical_Card_Expiration_Date);
        */
        $d_Telephone_Number1 = new Zend_Form_Element_Text('d_Telephone_Number1');
        $d_Telephone_Number1->setLabel('#1 Telephone_Number');
        $d_Telephone_Number1->setRequired('true');
        $d_Telephone_Number1->setValue($driverInfo['d_Telephone_Number1']);
        $this->addElement($d_Telephone_Number1);
        
        $d_Telephone_Number2 = new Zend_Form_Element_Text('d_Telephone_Number2');
        $d_Telephone_Number2->setLabel('#2 Telephone_Number');
        $d_Telephone_Number2->setValue($driverInfo['d_Telephone_Number2']);
        $this->addElement($d_Telephone_Number2);

        $d_Telephone_Number3 = new Zend_Form_Element_Text('d_Telephone_Number3');
        $d_Telephone_Number3->setLabel('#3 Telephone_Number');
        $d_Telephone_Number3->setValue($driverInfo['d_Telephone_Number3']);
        $this->addElement($d_Telephone_Number3);


        $submit = $this->addElement('submit', 'Driver_Personal_Information', array('label' => 'Save'));
    }

}
