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

        $id = $this->createElement('hidden', 'UserId');
        // element options
        $id->setDecorators(array('ViewHelper'));
        // add the element to the form
        $this->addElement($id);

        $parentCompany = $this->createElement('text','ParentCompany');
        $parentCompany->setLabel('Parent Company: ');
        $parentCompany->addFilter('StripTags');
        $this->addElement($parentCompany);

        $companyCode = $this->createElement('text','CompanyCode');
        $companyCode->setLabel('Company Code: ');
        //$companyCode->setRequired('true');
        $companyCode->addFilter('StripTags');
        $this->addElement($companyCode);

        $homeBaseCode = $this->createElement('text','HomeBaseCode');
        $homeBaseCode->setLabel('Home Base Code: ');
        //$homeBaseCode->setRequired('true');
        $homeBaseCode->addFilter('StripTags');
        $this->addElement($homeBaseCode);
        
        $depot = $this->createElement('text','Depot');
        $depot->setLabel('Depot: ');
        $depot->addFilter('StripTags');
        $this->addElement($depot);

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
       
        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

