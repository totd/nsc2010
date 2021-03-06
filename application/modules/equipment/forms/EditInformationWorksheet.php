<?php

class Equipment_Form_EditInformationWorksheet extends Zend_Form
{
    private $_listNewStatuses;
    private $_listActiveStatuses;


    /**
     *
     * @var string Equipment Identification Number
     */
    private $_VIN = 'test'; // TODO remove afer save implementation.

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

    public function __construct($listNewStatuses, $listActiveStatuses, $options = null)
    {
        $this->_listActiveStatuses = $listActiveStatuses;
        $this->_listNewStatuses = $listNewStatuses;


        parent::__construct($options);
    }

    /**
     * @author Andryi Ilnytskyi 05.11.2010
     *
     * Init equipment form.
     */
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(new Zend_Form_Element_Text('EIN', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'label' => 'EIN',
                    'disable' => 'true',
                    'value' => $this->_VIN,
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('UnitNumber', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'label' => 'Unit Number',
                    'decorators' => $this->elementDecorators
                )));

        // TODO implement using DB
        $this->addElement(new Zend_Form_Element_Select('EquipmentType', array(
                    'MultiOptions' => array(
                        '' => '-',
                        'Tractor' => 'Tractor',
                        'Straight Truck' => 'Straight Truck',
                        'Trailer' => 'Trailer',
                        'Dolly' => 'Dolly'
                    ),
                    'label' => 'Equipment Type',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('Model', array(
                    'maxlength' => 19,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Model',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('Year', array(
                    'maxlength' => 5,
                    'size' => 10,
                    'value' => '',
                    'label' => 'Year',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('Make', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Make',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('Color', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Color',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('UnladenWeight', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Unladen Weight',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('GVW', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Gross Equipment Weight',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('GVRW', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Gross Equipment Registered Weight',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('NumOfAxles', array(
                    'maxlength' => 10,
                    'size' => 8,
                    'value' => '',
                    'label' => 'Number Of Axles',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('LicPlateNum', array(
                    'maxlength' => 20,
                    'size' => 20,
                    'value' => '',
                    'label' => 'License Plate Number',
                    'decorators' => $this->elementDecorators
                )));

        // TODO Implemented usins StateController
        $this->addElement(new Zend_Form_Element_Select('State', array(
                    'MultiOptions' => array(
                        '-' => '-',
                        'AZ' => 'AZ',
                        'AK' => 'AK',
                        'AL' => 'AL',
                        'AR' => 'AR',
                        'CA' => 'CA',
                        'CO' => 'CO',
                        'CT' => 'CT',
                        'DC' => 'DC',
                        'DE' => 'DE',
                        'FL' => 'FL',
                        'GA' => 'GA',
                        'HI' => 'HI',
                        'IA' => 'IA',
                        'ID' => 'ID',
                        'IL' => 'IL',
                        'IN' => 'IN',
                        'KS' => 'KS',
                        'KY' => 'KY',
                        'LA' => 'LA',
                        'MA' => 'MA',
                        'MD' => 'MD',
                        'ME' => 'ME',
                        'MI' => 'MI',
                        'MN' => 'MN',
                        'MO' => 'MO',
                        'MS' => 'MS',
                        'MT' => 'MT',
                        'NH' => 'NH',
                        'NC' => 'NC',
                        'ND' => 'ND',
                        'NE' => 'NE',
                        'NJ' => 'NJ',
                        'NM' => 'NM',
                        'NV' => 'NV',
                        'NY' => 'NY',
                        'OH' => 'OH',
                        'OK' => 'OK',
                        'OR' => 'OR',
                        'PA' => 'PA',
                        'RI' => 'RI',
                        'SC' => 'SC',
                        'SD' => 'SD',
                        'TN' => 'TN',
                        'TX' => 'TX',
                        'UT' => 'UT',
                        'VA' => 'VA',
                        'VT' => 'VT',
                        'WA' => 'WA',
                        'WI' => 'WI',
                        'WV' => 'WV',
                        'WY' => 'WY'
                    ),
                    'label' => 'Registration State',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('RegExpDate', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'License Expiration Date',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('RFID', array(
                    'maxlength' => 15,
                    'size' => 15,
                    'value' => '',
                    'label' => 'Radio Frequency Identification Device #',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('EquipmentValue', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => 0,
                    'label' => 'Equipment Value',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('LastEvaluationDate', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Last Evaluation Date',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('InsCompany', array(
                    'maxlength' => 100,
                    'size' => 40,
                    'value' => '',
                    'label' => 'Insurance Company Name',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('InsPolicyNum', array(
                    'maxlength' => 20,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Insurance Policy Number',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('InsExpDate', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Insurance Expiration Date',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('InsLimits', array(
                    'maxlength' => 200,
                    'size' => 60,
                    'value' => 0,
                    'label' => 'Insurance Limits',
                    'decorators' => $this->elementDecorators
                )));

        $selectArray = array('' => '-');
        foreach ($this->_listActiveStatuses as $status) {
            $selectArray[$status->eas_id] = $status->eas_type;
        }

        $this->addElement(new Zend_Form_Element_Select('ActiveStatus', array(
                    'MultiOptions' => $selectArray,
                    'label' => 'Active Status',
                    'decorators' => $this->elementDecorators
                )));


        $selectArray = array();
        foreach ($this->_listNewStatuses as $status) {
            $selectArray[$status->enes_id] = $status->enes_type;
        }

        $this->addElement(new Zend_Form_Element_Select('NewStatus', array(
                    'MultiOptions' => $selectArray,
                    'label' => 'New Status',
                    'decorators' => $this->elementDecorators
                )));

        

        $this->addElement('submit', 'save', array(
            'decorators' => $this->buttonDecorators,
            'label' => 'Save',
                )
        );
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form',
        ));
    }

}