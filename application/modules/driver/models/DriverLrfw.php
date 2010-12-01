<?php

class Driver_Model_DriverLrfw extends Zend_Db_Table_Abstract
{
    protected $_name = 'driver__lrfw';
    
    public static function getRecord($driverID)
    {
        $table = new Driver_Model_DriverLrfw();
        try{
            $table->select();
            $row = $table->fetchAll("dlrfw_Driver_ID = $driverID");
            if($row==null){return null;}
        }catch(Exception $e){
            echo $e->getMessage();
            return null;
        }
        return $row->toArray();
    }

    public static function createRecord($mData)
    {
        $table = new Driver_Model_DriverLrfw();
        return $table->insert($mData);
    }

    public static function updateRecord($mData)
    {
        $db = new Driver_Model_DriverLrfw();
        $w = "dlrfw_Driver_ID =".$mData['dlrfw_Driver_ID'];
        return $db->update($mData,$w);
    }
}