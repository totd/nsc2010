<?php
/**
 * @author Vladislav Skachkov 18.11.2010
 *
 * Set of different validators
 *
 */
class Custom_Action_Helper_Validate extends Zend_Controller_Action_Helper_Abstract
  {
    /**
     * @author Vladislav Skachkov 18.11.2010
     *
     * Date validation
     *
     * @param string $sDate 
     * @param string $sDateFormat mm/dd/yyyy || yyyy-mm-dd 
     *
     * @return bool.
     */
    public function validateDate($sDate,$sDateFormat="mm/dd/yyyy")
    {
        if($sDateFormat=="mm/dd/yyyy"){
            $isValid = preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/",$sDate);
            if($isValid==1){
                return true;
            }
        }elseif($sDateFormat=="yyyy-mm-dd"){
            $isValid = preg_match("/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$sDate);
            if($isValid==1){
                return true;
            }
        }
        return false;
    }
  }