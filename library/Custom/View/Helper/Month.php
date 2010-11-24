<?php
/**
 * @author Vladislav Skachkov 21.11.2010
 *
 * Set of different validators
 *
 */
class Custom_View_Helper_Month extends Zend_View_Helper_Abstract
  {
    /**
     * @author Vladislav Skachkov 21.11.2010
     *
     * Returns array of months
     *
     * @param string $sFormat = "SHORT" | "FULL"
     *
     * @return bool.
     */
    public function getMonth($sFormat="SHORT")
    {
        $monthShort = array('01'=>'Jan','02' =>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','9'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
        return $monthShort;
    }
  }