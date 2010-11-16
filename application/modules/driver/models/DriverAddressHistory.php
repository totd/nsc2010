<?php

class Driver_Model_DriverAddressHistory extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver_address_history';


    /**
     * @author Vlad Skachkov 16.11.2010
     *
     * get driver adress history types list
     *
     * @param int $iDriverID
     * @return mixed
     */
    public static function getAddressHistory($iDriverID)
    {
        $sql='SELECT
                *
                FROM driver_address_history
        ';
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->fetchAssoc($sql);
        if(sizeof($stmt)>0){
            return $stmt;
        }
        return null;
    }
}