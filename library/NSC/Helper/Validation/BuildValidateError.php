<?php
class NSC_Helper_Validation_BuildValidateError extends Zend_Controller_Action_Helper_Abstract
{
    /** @var Zend_Loader_PluginLoader */
    public $pluginLoader;

    /**
     * Constructor: initialize plugin loader
     */
    public function  __construct()
    {
        $this->pluginLoader = new Zend_Loader_PluginLoader();
    }

    /**
     * Convert array to string to show error.
     * 
     * @param array $validationErrorArray
     * @return string 
     */
    public function buildValidateErrorMessage($validationErrorArray)
    {
        $result = '';

        if (isset($validationErrorArray['notExistFields'])) {
            $result = "The following fields don't exist: " .
                                    implode(", ", $validationErrorArray['notExistFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['requiredFields'])) {
            $result .= "The following fields are required: " .
                                    implode(", ", $validationErrorArray['requiredFields']) .
                                    "<br /><br />";
        }

        if (isset($validationErrorArray['notUniqueFieldValue'])) {
            foreach ($validationErrorArray['notUniqueFieldValue'] as $value) {
                $result .= "A value '{$value['value']}' doesn't unique for the field '{$value['field']}'" .
                                    "<br /><br />";
            }
        }

        if (isset($validationErrorArray['notValidFields'])) {
            foreach ($validationErrorArray['notValidFields'] as $value) {
                $result .= $value['message'] . "<br /><br />";
            }
        }

        if (isset($validationErrorArray['dateError'])) {
            foreach ($validationErrorArray['dateError'] as $value) {
                $result .= $value . "<br /><br />";
            }
        }

        if (isset($validationErrorArray['other'])) {
            foreach ($validationErrorArray['other'] as $value) {
                $result .= $value . "<br /><br />";
            }
        }

        if (empty($result)) {
            $result = 'Unknown validation error';
        }

        return $result;
    }

    /**
     * Srategy patern: call helper as broken method.
     *
     * @param array $validationErrorArray
     * @return string
     */
    public function direct($validationErrorArray)
    {
        return $this->buildValidateErrorMessage($validationErrorArray);
    }

}

