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
        $role = $this->createElement('select', 'role', $userTypes);
        $role->setLabel("Role:");
        $this->addElement($role);

        $staffId = $this->createElement('text','parent_company');
        $staffId->setLabel('Parent Company: ');
        $staffId->addFilter('StripTags');
        $this->addElement($staffId);

        $homeBaseId = $this->createElement('text','homebase');
        $homeBaseId->setLabel('HomeBase: ');
        $homeBaseId->addFilter('StripTags');
        $this->addElement($homeBaseId);

        $companyID = $this->createElement('text','company');
        $companyID->setLabel('Company: ');
        $companyID->addFilter('StripTags');
        $this->addElement($companyID);

        $depotID = $this->createElement('text','depot');
        $depotID->setLabel('Depot: ');
        $depotID->addFilter('StripTags');
        $this->addElement($depotID);

        $username = $this->createElement('text','username');
        $username->setLabel('Username: ');
        $username->setRequired('true');
        $username->addFilter('StripTags');
        $username->addErrorMessage('The username is required!');
        $this->addElement($username);

//      TODO Possible needed hidden.
//        $password = $this->createElement('password', 'Password');
        $password = $this->createElement('text', 'password');
        $password->setLabel('Password: ');
        $password->setRequired('true');
        $username->addErrorMessage('The password is required!');
        $this->addElement($password);

        $status_values = array('multiOptions' => array (
            'ACTIVE' => 'Active',
            'INACTIVE' => 'Inactive',
            'TERMINATED' => 'Terminated'
        ));
        $status = $this->createElement('select', 'status', $status_values);
        $status->setLabel("Status:");
        $this->addElement($status);

        $title = $this->createElement('text','title');
        $title->setLabel('Title: ');
        $title->addFilter('StripTags');
        $this->addElement($title);

        $date_created = $this->createElement('text','date_created');
        $date_created->setLabel('date_created: ');
        $date_created->addFilter('StripTags');
        $this->addElement($date_created);

        $access_DQF = $this->createElement('text','access_DQF');
        $access_DQF->setLabel('access_DQF: ');
        $access_DQF->addFilter('StripTags');
        $this->addElement($access_DQF);

        $access_VIM = $this->createElement('text','access_VIM');
        $access_VIM->setLabel('access_VIM: ');
        $access_VIM->addFilter('StripTags');
        $this->addElement($access_VIM);

        $access_accident = $this->createElement('text','access_accident');
        $access_accident->setLabel('access_accident: ');
        $access_accident->addFilter('StripTags');
        $this->addElement($access_accident);

        $first_name = $this->createElement('text','first_name');
        $first_name->setLabel('first_name: ');
        $first_name->addFilter('StripTags');
        $this->addElement($first_name);

        $last_name = $this->createElement('text','last_name');
        $last_name->setLabel('last_name: ');
        $last_name->addFilter('StripTags');
        $this->addElement($last_name);

        $email = $this->createElement('text','email');
        $email->setLabel('email: ');
        $email->addFilter('StripTags');
        $this->addElement($email);

        $telephone_number = $this->createElement('text','telephone_number');
        $telephone_number->setLabel('telephone_number: ');
        $telephone_number->addFilter('StripTags');
        $this->addElement($telephone_number);

        $fax = $this->createElement('text','fax');
        $fax->setLabel('fax: ');
        $fax->addFilter('StripTags');
        $this->addElement($fax);

        $address1 = $this->createElement('text','address1');
        $address1->setLabel('address1: ');
        $address1->addFilter('StripTags');
        $this->addElement($address1);

        $address2 = $this->createElement('text','address2');
        $address2->setLabel('address2: ');
        $address2->addFilter('StripTags');
        $this->addElement($address2);

        $city = $this->createElement('text','city');
        $city->setLabel('city: ');
        $city->addFilter('StripTags');
        $this->addElement($city);

        $state = $this->createElement('text','state');
        $state->setLabel('state: ');
        $state->addFilter('StripTags');
        $this->addElement($state);

        $postal_code = $this->createElement('text','postal_code');
        $postal_code->setLabel('postal_code: ');
        $postal_code->addFilter('StripTags');
        $this->addElement($postal_code);


        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

