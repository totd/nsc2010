<?php
class NSC_Helper_View_GetStateArray extends Zend_Controller_Action_Helper_Abstract
{
    /**
     *
     * @var Zend_Loader_PluginLoader
     */
    public $pluginLoader;

    /**
     * Constructor: initialize plugin loader
     */
    public function __construct()
    {
        $this->pluginLoader = new Zend_Loader_PluginLoader();
    }

    /**
     * Get array of available states. 
     * 
     * @param boolean $emptyValue If it's 'true' - empty value would be added to the array's beginning.
     * 
     * @return mixed
     */
    public function getStates($emptyValue = true)
    {
        $result = null;

        $stateArraySession = new Zend_Session_Namespace('stateArray');
        if ($stateArraySession->__isset('stateArrayData')) {
            $result = $stateArraySession->__get('stateArrayData');
        } else {

            $stateModel = new State_Model_State();
            $states = $stateModel->getList();

            $stateArray = null;

            if ($emptyValue) {
                $stateArray = array('' => '-');
            }
            foreach ($states as $state) {
                if (is_object($state)) {
                    $stateArray[$state->s_id] = $state->s_name;
                } else if (is_array ($state)){
                    $stateArray[$state['s_id']] = $state['s_name'];
                }
            }
            
            if (!is_null($stateArray)) {
                $stateArraySession->stateArrayData = array();
                $stateArraySession->stateArrayData = $stateArray;
            }
            
            $result = $stateArray;
        }

        return $result;
    }

    public function direct($emptyValue = true)
    {
        return $this->getStates($emptyValue);
    }
}

