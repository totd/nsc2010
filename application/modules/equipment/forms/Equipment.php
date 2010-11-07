<?php

class Equipment_Form_Equipment extends Zend_Form
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
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
    );

    /**
     * @author Andryi Ilnytskyi 05.11.2010
     *
     * Init equipment form.
     */
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(new Zend_Form_Element_Text('VIN', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'label' => 'VIN',
                    'disable' => 'true',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('UnitNumber', array(
                    'maxlength' => 30,
                    'size' => 20,
                    'label' => 'Unit Number',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Select('VehicleType', array(
                    'MultiOptions' => array(
                        '' => '-',
                        'Tractor' => 'Tractor',
                        'Straight Truck' => 'Straight Truck',
                        'Trailer' => 'Trailer',
                        'Dolly' => 'Dolly'
                    ),
                    'label' => 'Vehicle Type',
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
                    'label' => 'Gross Vehicle Weight',
                    'decorators' => $this->elementDecorators
                )));

        $this->addElement(new Zend_Form_Element_Text('GVRW', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => '',
                    'label' => 'Gross Vehicle Registered Weight',
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

        $this->addElement(new Zend_Form_Element_Text('VehicleValue', array(
                    'maxlength' => 15,
                    'size' => 20,
                    'value' => 0,
                    'label' => 'Vehicle Value',
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

        $this->addElement('submit', 'save', array(
            'decorators' => $this->buttonDecorators,
            'label' => 'Save',
                )
        );
//
//        $this->addElement(new Zend_Form_Element_Hidden('ProfitCN', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('ProfitCNLocation', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('OwningCompany', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('IRP', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('IFTASticker', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('IFTAStickerExpDate', array(
//                    'value' => '1/1/1900'
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('Weight2290', array(
//                    'value' => ''
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('HUT', array(
//                    'value' => 'No'
//                )));
//
//        $this->addElement(new Zend_Form_Element_Hidden('TitleStatus', array(
//                    'value' => 'Corporate'
//                )));
//
//
//        $this->setDecorators(array(
//            'FormElements',
//            array('HtmlTag', array('tag' => 'table')),
//            'Form',
//        ));
//
//        $id = $this->createElement('hidden', 'EquipmentId');
//        // element options
//        $id->setDecorators(array('ViewHelper'));
//        // add the element to the form
//        $this->addElement($id);
//
//        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
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

