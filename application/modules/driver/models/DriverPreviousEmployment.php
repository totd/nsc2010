<?php
class Driver_Model_DriverPreviousEmployment extends Zend_Db_Table_Abstract
{
    protected $_name = 'driver__previous_employment';

    
    public static function getList($iDriver)
    {
        if(isset($iDriver)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       *
                        FROM driver__previous_employment
                        LEFT JOIN employer ON employer.emp_ID = driver__previous_employment.dpe_Employer_ID
                      WHERE dpe_Driver_ID='.$iDriver.'
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
                      FROM driver__previous_employment
                      WHERE dpe_ID='.$iID.'
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
        return $table->delete("dpe_ID = ".$iRecord);
    }
    
    public function updateRecord($mData)
    {
        $db = new Driver_Model_DriverPreviousEmployment();
        $w = "dpe_ID = ".(int)$mData['dpe_ID'];
        return $db->update($mData,$w);
    }

    public static function getRecordByQuery($sQuery,$sField)
    {
        if(isset($sQuery)){
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                       distinct '.$sField.'
                      FROM driver__previous_employment
                      WHERE '.$sField.' like "%'.$sQuery.'%"
        ');
         return $stmt->fetchAll();
        }else{
            return null;
        }
    }
}