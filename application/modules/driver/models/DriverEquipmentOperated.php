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
        if(isset($mData)){
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            try
            {
            $db->query('
                      insert into driver__equipment_operated (deo_Driver_ID,deo_Equipment_Type_ID,deo_is_operated,deo_From_Date,deo_To_Date,deo_Total_Miles)
                        values('.$mData[2].','.$mData[3].',"'.$mData[4].'","'.$mData[5].'","'.$mData[6].'","'.$mData[7].'")
                ');
            }catch(Exception $e)
            {
                return null;
            }
            return true;
        }else{
            return null;
        }
    }

    public function deleteRecord($iRecord)
    {
        $table = new Driver_Model_DriverEquipmentOperated();
        return $table->delete("dah_ID =".$iRecord);
    }

    public function updateRecord($mData)
    {
        if(isset($mData)){
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            try
            {
            $db->query('
                      update driver__equipment_operated
                        set deo_Driver_ID = '.$mData[2].',
                            deo_Equipment_Type_ID = '.$mData[3].',
                            deo_is_operated = "'.$mData[4].'",
                            deo_From_Date = "'.$mData[5].'",
                            deo_To_Date = "'.$mData[6].'",
                            deo_Total_Miles = "'.$mData[7].'"
                        where deo_ID = '.$mData[1].'
                ');
            }catch(Exception $e)
            {
                return null;
            }
            return true;
        }else{
            return null;
        }
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