<?php

class Driver_Model_DriverAddressHistory extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver_address_history';


    /**
     * @author Vlad Skachkov 16.11.2010
     *
     * get driver address history list
     *
     * @param int $iDriverID
     * @return mixed
     */
    public function getList($iDriverID=null)
    {
        $table = new Driver_Model_DriverAddressHistory();
        if((int)$iDriverID==null){
            $row = $table->fetchAll(" dah_ID <> 0 "," dah_row_created DESC ");
        }else{
            $sWhere = "dah_Driver_ID = ".$iDriverID;
            $row = $table->fetchAll("dah_Driver_ID = ".$iDriverID," dah_row_created DESC ");
        }
        $rowsetArray = $row->toArray();
        return $rowsetArray;

    }
    /**
     * @author Vlad Skachkov 16.11.2010
     *
     * create driver address history record
     *
     * @param mixed $mData
     * @return mixed
     */
    public function createRecord($mData)
    {
        $table = new Driver_Model_DriverAddressHistory();
        return $table->insert($mData);
    }
    /**
     * @author Vlad Skachkov 16.11.2010
     *
     * delete driver address history record
     *
     * @param int $iRecord
     * @return mixed
     */
    public function deleteRecord($iRecord)
    {
        $table = new Driver_Model_DriverAddressHistory();
        return $table->delete("dah_ID =".$iRecord);
    }
}