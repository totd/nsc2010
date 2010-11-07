<?php

/**
 * @author Andryi Ilnytskyi
 *
 *
 */
class Equipment_Form_SearchEquipment extends Zend_Form
{

    protected $elementDecorators = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array('Label', array('tag' => 'td', 'width'=>'300', 'bgcolor' => '#ffffff', 'class' => 'MainText')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );
    protected $buttonDecorators = array(
        'ViewHelper',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element', 'bgcolor' => '#66cdaa',
            'align' => 'right', 'colspan' => '2')),
       // array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );

    /**
     * @author Andryi Ilnytskyi 07.11.2010
     *
     * Init equipment form.
     */
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(new Zend_Form_Element_Button('ExitLink', array(
                    'decorators' => $this->buttonDecorators,
                    'onclick' => 'alert("Test");',
                    'label' => 'Exit'

        )));

        $this->addElement(new Zend_Form_Element_Radio('OwnedBy', array(
                    'multioptions' => array(
                        'OperatorVendor' => 'Owner Operator / Vendor',
                        'Company' => 'Company'
                    ),
                    'disableLoadDefaultDecorators' => true,
                    'value' => 'OperatorVendor',
                    'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                    'label' => 'Owned By:',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('VIN', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'label' => 'Vehicle Identification Number',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement('submit', 'NextLink', array(
            'decorators' => $this->buttonDecorators,
            'label' => 'Next',
                )
        );
    }

    /**
     * @author Andryi Ilnytskyi 07.11.2010
     * 
     * Set default decorators.
     */
    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array(
                                'tag' => 'table',
                                'width' => '80%',
                                'cellspacing' => '1',
                                'cellpadding' => '4',
                                'border' => '0',
                                'bgcolor' => '#cccccc',
                                'align' => 'center'
                )),
            'Form',
        ));
    }

}
