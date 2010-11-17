<?php

class Equipment_Form_ViewInformationWorksheet extends Zend_Form
{
    /**
     *
     * @var string Vehicle Identification Number
     */
    private $_VIN;

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
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );

    /**
     * @author Ilnytskyi Andryi
     * 
     * A class' constructor.
     *
     * @param array $equipmentRow
     * @param mixed $options
     */
    public function __construct($equipmentRow, $options = null)
    {
        parent::__construct($options);
    }



}