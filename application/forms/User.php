<?php

class Form_User extends Zend_Form
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
                 'NSC' => 'NSC',
                'HomeBase' => 'HomeBase',
                'CompanyUser' => 'CompanyUser'
            ));
        $userType = $this->createElement('select', 'UserType', $userTypes);
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

        $username = $this->createElement('text','Username');
        $username->setLabel('Username: ');
        $username->setRequired('true');
        $username->addFilter('StripTags');
        $username->addErrorMessage('The username is required!');
        $this->addElement($username);

        $password = $this->createElement('password', 'Password');
        $password->setLabel('Password: ');
        $password->setRequired('true');
        $this->addElement($password);

        $agreed = $this->createElement('checkbox','Agreed');
        $agreed->setLabel('Agreed: ');
        $this->addElement($agreed);

        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

