<?php

class driver_Model_MedicalHistory extends Zend_Db_Table_Abstract
{
  protected $_name = 'medical_history';


    /**
     * @author Vlad Skachkov 08.11.2010
     *
     * get driver medical history list
     *
     * @param string $sStatus
     * @return mixed
     */
    public static function getDriverHistory($driverID)
    {
        if(!(int)$driverID){
            return 'driver ID must be integer!';
        }
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                      FROM medical_history
                      WHERE mh_Driver_ID='.$driverID.'
        ');
         $row = $stmt->fetchAll();
         return $row;
    }

}