<?php

class User_Form_User extends Zend_Form
{

    /**
     * @author Andryi Ilnytskyi 23.10.2010
     *
     * Init user form.
     */
    public function init()
    {
        $this->setMethod('post');

        $id = $this->createElement('hidden', 'UserId');
        // element options
        $id->setDecorators(array('ViewHelper'));
        // add the element to the form
        $this->addElement($id);


        // create role select.
        $userTypes= array('multiOptions' => array (
                '1' => 'CEO, GM, Operations Manager (NSC)',             // NSC_USERS__Level_1
                '2' => 'Manager (NSC)',                                 // NSC_USERS__Level_2
                '3' => 'Employee (Trained) (NSC)',                      // NSC_USERS__Level_3
                '4' => 'Office (Clerical, Temp or In the Field) (NSC)', // NSC_USERS__Level_4
                '5' => 'Super Administrator (Customer)',                // CUSTOMER_USERS__Level_1
                '6' => 'System Manager (Customer)',                     // CUSTOMER_USERS__Level_2
                '7' => 'Office (Customer)',                             // CUSTOMER_USERS__Level_3
                '8' => 'Auditor (Read Only)',                           // EXTERNAL_USERS__Auditor
                '9' => 'Insurance (Read Only)',                         // EXTERNAL_USERS__Insurance
            )
        );
        $userType = $this->createElement('select', 'UserTypeID', $userTypes);
        $userType->setLabel("UserType:");
        $this->addElement($userType);

        $staffId = $this->createElement('text','StaffID');
        $staffId->setLabel('Staff: ');
        $staffId->addFilter('StripTags');
        $this->addElement($staffId);

        $homeBaseId = $this->createElement('text','HomeBaseID');
        $homeBaseId->setLabel('HomeBase: ');
        $homeBaseId->addFilter('StripTags');
        $this->addElement($homeBaseId);

        $companyID = $this->createElement('text','CompanyID');
        $companyID->setLabel('Company: ');
        $companyID->addFilter('StripTags');
        $this->addElement($companyID);

        $depotID = $this->createElement('text','DepotID');
        $depotID->setLabel('Depot: ');
        $depotID->addFilter('StripTags');
        $this->addElement($depotID);

        $username = $this->createElement('text','Username');
        $username->setLabel('Username: ');
        $username->setRequired('true');
        $username->addFilter('StripTags');
        $username->addErrorMessage('The username is required!');
        $this->addElement($username);

//      TODO Possible needed hidden.
//        $password = $this->createElement('password', 'Password');
        $password = $this->createElement('text', 'Password');
        $password->setLabel('Password: ');
        $password->setRequired('true');
        $this->addElement($password);

        $agreed = $this->createElement('checkbox','Agreed');
        $agreed->setLabel('Agreed: ');
        $this->addElement($agreed);

        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

