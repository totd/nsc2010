<?php

class driver_Model_Driver extends Zend_Db_Table_Abstract
{

    protected $_name = 'driver';

    /**
     * @author Vlad Skachkov 22.10.2010
     *
     * Check New Driver for existing in DB
     *
     * @param array $searchData Array which contains value of the fields
     * @return mixed
     */
     public static function searchNewDriver($searchData)
    {
         $sWhere='';
         foreach ($searchData as $key => $value)
         {
             if(is_int($value)){
                 $sWhere=$sWhere . ' ' . $key . ' = ' . $value . ' or ';
             }
             else{
                 $sWhere=$sWhere . ' ' . $key . ' = "' . $value . '" or ';
             }
         }
         $sWhere = preg_replace("/or\s$/",'',$sWhere);
         if ($sWhere=="")
         {
             return null;
         }

         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        d_ID, d_Driver_SSN, d_Date_Of_Birth 	
                      FROM driver
                      WHERE ' . $sWhere . '

        ');
         $row = $stmt->fetchAll();
         for($i=0;$i<sizeof($row);$i++){
             if($row[$i]['d_Driver_SSN']==$searchData['d_Driver_SSN']){
                 return false; # driver with such SSN found in DB. Proceed is impossible;
             }else{
                 return true; # There is no driver with such SSN in DB, so we can proceed;
             }
         }
         return 'error';
    }
    /**
     * @author Vlad Skachkov 22.10.2010
     *
     * Check New Driver for existing in DB
     *
     * @param array $searchData Array which contains value of the fields
     * @return mixed
     */
     public function createPendingDriver($driverData)
    {
        $rowDriver = $this->createRow();
        if ($rowDriver) {
            foreach ($driverData as $key => $value) {
                $rowDriver->$key = $value;
            }
            $rowDriver->save();
            return $rowDriver;
        } else {
            throw new Zend_Exception("Could not create user!");
        }
    }

}

