<?php

class User_Form_Login extends Zend_Form
{

    /**
     * @author Andryi Ilnytskyi 26.10.2010
     *
     * Init user form.
     */
    public function init()
    {
        $this->setMethod('post');

        $id = $this->createElement('hidden', 'user_id');
        // element options
        $id->setDecorators(array('ViewHelper'));
        // add the element to the form
        $this->addElement($id);

        $parentCompany = $this->createElement('text','parent_company_code');
        $parentCompany->setLabel('Parent Company: ');
        $parentCompany->addFilter('StripTags');
        $this->addElement($parentCompany);

        $companyCode = $this->createElement('text','company_code');
        $companyCode->setLabel('Company Code: ');
        $companyCode->setRequired('true');
        $companyCode->addFilter('StripTags');
        $this->addElement($companyCode);

        $homeBaseCode = $this->createElement('text','homebase_code');
        $homeBaseCode->setLabel('Home Base Code: ');
        $homeBaseCode->setRequired('true');
        $homeBaseCode->addFilter('StripTags');
        $this->addElement($homeBaseCode);
        
        $depot = $this->createElement('text','depot_name');
        $depot->setLabel('Depot: ');
        $depot->addFilter('StripTags');
        $this->addElement($depot);

        $username = $this->createElement('text','username');
        $username->setLabel('Username: ');
        $username->setRequired('true');
        $username->addFilter('StripTags');
        $username->addErrorMessage('The username is required!');
        $this->addElement($username);

        $password = $this->createElement('password', 'password');
        $password->setLabel('Password: ');
        $password->setRequired('true');
        $this->addElement($password);
       
        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

