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
        // TODO refactor it after RoleControler implementation.
        $userTypes= array('multiOptions' => array (
                '1' => 'NSC SuperAdmin',                            // NSC_USERS__Level_0
                '2' => 'NSC Admin',                                 // NSC_USERS__Level_1
                '3' => 'NSC Office',                                // NSC_USERS__Level_2
                '4' => 'NSC Auditor',                               // NSC_USERS__Level_3
                '5' => 'NSC Checker',                               // NSC_USERS__Level_4
                '6' => 'Client User SuperAdmin',                    // CUSTOMER_USERS__Level_0
                '7' => 'Client User NationalAdmin',                 // CUSTOMER_USERS__Level_1
                '8' => 'Client User RegionalAdmin',                 // CUSTOMER_USERS__Level_2
                '9' => 'Client User LocalAdmin',                    // CUSTOMER_USERS__Level_3
                '10' => 'Client User Office',                        // CUSTOMER_USERS__Level_4
                '11' => 'DEMO',                                      // CUSTOMER_USERS__Level_5
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

