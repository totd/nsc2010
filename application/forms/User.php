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

        $id = $this->createElement('hidden', 'id');
        // element options
        $id->setDecorators(array('ViewHelper'));
        // add the element to the form
        $this->addElement($id);

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

        // create role select.
        $roles = array('multiOptions' => array (
                 'user' => 'User',
                'administrator' => 'Administrator'
            ));
        $role = $this->createElement('select', 'role', $roles);
        $role->setLabel("Role:");
        $this->addElement($role);

        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

