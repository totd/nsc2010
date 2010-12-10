<?php
class Driver_Model_DriverPreviousEmployment extends Zend_Db_Table_Abstract
{
    protected $_name = 'previous_employment';

    
    public static function getList($iDriver)
    {
        if(isset($iDriver)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                      FROM previous_employment
                      WHERE pe_Driver_ID='.$iDriver.'
        ');
         return $stmt->fetchAll();
        }else{
            return null;
        }
    }

    public static function getRecord($iID)
    {
        if(isset($iID)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                      FROM previous_employment
                      WHERE pe_ID='.$iID.'
        ');
         return $stmt->fetch();
        }else{
            return null;
        }
    }

    public function createRecord($mData)
    {
        $table = new Driver_Model_DriverPreviousEmployment();
        return $table->insert($mData);
    }

    public function deleteRecord($iRecord)
    {
        $table = new Driver_Model_DriverPreviousEmployment();
        return $table->delete("pe_ID = ".$iRecord);
    }
    
    public function updateRecord($mData)
    {
        $db = new Driver_Model_DriverPreviousEmployment();
        $w = "pe_ID = ".(int)$mData['pe_ID'];
        return $db->update($mData,$w);
    }

    public static function getRecordByQuery($sQuery,$sField)
    {
        if(isset($sQuery)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       distinct '.$sField.'
                      FROM previous_employment
                      WHERE '.$sField.' like "%'.$sQuery.'%"
        ');
         return $stmt->fetchAll();
        }else{
            return null;
        }
    }
}