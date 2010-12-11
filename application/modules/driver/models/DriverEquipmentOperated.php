<?php
class Driver_Model_DriverEquipmentOperated extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver__equipment_operated';


    public function getList($iDriverID=null)
    {
        $table = new Driver_Model_DriverEquipmentOperated();
        if((int)$iDriverID==null){
            return "ERROR: No Driver ID passed.";
        }else{
            $row = $table->fetchAll("deo_Driver_ID = ".$iDriverID," deo_Equipment_Type_ID asc ");
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