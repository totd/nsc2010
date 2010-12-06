<?php
class Driver_Model_DriverAddressHistory extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver_address_history';


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

    public function getRecord($dah_ID)
    {
        $row = $this->fetchRow($this->select()->where('dah_id = ?',$dah_ID));
        if($row==null){return false;}
        return $row->toArray();
    }

    public function createRecord($mData)
    {
        $table = new Driver_Model_DriverAddressHistory();
        return $table->insert($mData);
    }

    public function deleteRecord($iRecord)
    {
        $table = new Driver_Model_DriverAddressHistory();
        return $table->delete("dah_ID =".$iRecord);
    }

    public function updateRecord($mData)
    {
        unset($mData['PHPSESSID']);
        $db = new Driver_Model_DriverAddressHistory();
        $w = 'dah_ID = '.$mData['dah_ID'];
        return $db->update($mData,$w);
    }

    public static function getRecordByQuery($sQuery,$sField)
    {
        if(isset($sQuery)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       distinct '.$sField.'
                      FROM driver_address_history
                      WHERE '.$sField.' like "%'.$sQuery.'%"
        ');
         return $stmt->fetchAll();
        }else{
            return null;
        }
    }
}
