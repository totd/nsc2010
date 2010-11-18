<?php

class User_Form_Login extends Zend_Form
{
    protected $elementDecorators = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array('Label', array('tag' => 'td')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );
    protected $buttonDecorators = array(
        'ViewHelper',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr', 'colspan' => '3', 'align' => 'right')),
    );


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

        $parentCompany = $this->createElement('text','parent_company_code',
                    array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Parent Company: ',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    )
                );
        $this->addElement($parentCompany);

        $companyCode = $this->createElement('text','company_code',
                array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Company Code: ',
                        'required' => 'true',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    ));
        $this->addElement($companyCode);

        $homeBaseCode = $this->createElement('text','homebase_code',
                array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Home Base Code: ',
                        'required' => 'true',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    ));
        $this->addElement($homeBaseCode);

        $depot = $this->createElement('text','depot_name',
                array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Depot: ',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    ));
        $this->addElement($depot);

        $username = $this->createElement('text','username',
                array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Username: ',
                        'required' => 'true',
                        'errorMessage' => 'The username is required!',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    ));
        $this->addElement($username);

        $password = $this->createElement('password', 'password',
                array(
                        'maxlength' => 30,
                        'size' => 20,
                        'label' => 'Password: ',
                        'required' => 'true',
                        'decorators' => $this->elementDecorators,
                        'filters' => array('StripTags')
                    ));
        $this->addElement($password);

        $this->addElement('submit', 'save', array(
            'decorators' => $this->buttonDecorators,
            'label' => 'Login',
                )
        );
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag',
                array(
                    'tag' => 'table',
                    'style' => 'padding: 20px 0px;',
                    'cellspacing' => '0',
                    'cellpadding' => '0')),
            'Form'
        ));

        $this->_attribs = array('class' => 'select-parametr');
    }


}

