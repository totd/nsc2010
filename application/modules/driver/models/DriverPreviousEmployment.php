<?php
class Driver_Model_DriverPreviousEmployment extends Zend_Db_Table_Abstract
{
  protected $_name = 'previous_employment';

    /**
     * @author Vlad Skachkov 22.11.2010
     *
     * get previous employment list for current driver
     *
     * @param int $iDriver
     * @return mixed
     */
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
    /**
     * @author Vlad Skachkov 22.11.2010
     *
     * get previous employment information
     *
     * @param int $iID
     * @return mixed
     */
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
    /**
     * @author Vlad Skachkov 22.11.2010
     *
     * create previous employment history record
     *
     * @param mixed $mData
     * @return mixed
     */
    public function createRecord($mData)
    {
        $table = new Driver_Model_DriverPreviousEmployment();
        return $table->insert($mData);
    }
    /**
     * @author Vlad Skachkov 22.11.2010
     *
     * delete previous employment history record
     *
     * @param int $iRecord
     * @return mixed
     */
    public function deleteRecord($iRecord)
    {
        $table = new Driver_Model_DriverPreviousEmployment();
        return $table->delete("pe_ID = ".$iRecord);
    }

}