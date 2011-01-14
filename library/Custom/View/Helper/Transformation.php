<?php
/**
 * @author Vladislav Skachkov 22.12.2010
 *
 * Set of different validators
 *
 */
class Custom_View_Helper_Transformation extends Zend_View_Helper_Abstract
  {
    /**
     * @author Vladislav Skachkov 22.12.2010
     *
     * Returns transformed phone/fax number
     *
     * @param string $sFormat
     *
     * @return bool.
     */
    public static function convertNumber($iNumber,$sFormat="(XXX) YYY-YYYY")
    {
        if(!isset($iNumber)){
            return null;
        }
        if($sFormat="(XXX) YYY-YYYY"){
            $result = preg_replace("/^([0-9]{3})([0-9]{3})([0-9]+)/","($1) $2-$3",$iNumber);
            return $result;
        }
    }
  }