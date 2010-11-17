<?php

class Driver_Model_DriverStatus extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver__status';


    /**
     * @author Vlad Skachkov 08.11.2010
     *
     * get driver status list
     *
     * @param string $sStatus
     * @return mixed
     */
    public static function getAll()
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                      FROM driver__status
        ');
         $row = $stmt->fetchAll();
        $arr = array();
        $arr[]=null;
        foreach($row as $k => $v){
            foreach($v as $key => $val){
                if(!preg_match("/[0-9]+/",$val)){
                    $arr[] = "".$val."";
                }
            }
        }
        unset($arr[0]);
         return $arr;
    }

}