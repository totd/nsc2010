<?php

class driver_Model_Driver extends Zend_Db_Table_Abstract
{

    protected $_name = 'driver';
    public function init()
    {
        $_SESSION['driver_info']['DriverEmploymentType_list'] = driver_Model_DriverEmploymentType::getAll();
        $_SESSION['driver_info']['DriverEyeColor_list'] = driver_Model_DriverEyeColor::getAll();
        $_SESSION['driver_info']['DriverGender_list'] = driver_Model_DriverGender::getAll();
        $_SESSION['driver_info']['DriverHairColor_list'] = driver_Model_DriverHairColor::getAll();
        $_SESSION['driver_info']['DriverStatus_list'] = driver_Model_DriverStatus::getAll();
    }

    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * get drivers list
     *
     * @param int: $iStatus, $iFrom
     * @return mixed
     */
    public static function getDrivers($iStatus=1,$iFrom=0,$iLimit=20)
    {
        if($iStatus==0){
            $sWhere =" WHERE 1";
        }else{
            $sWhere =" WHERE d_Status = " . $iStatus . "";
        }
        if((isset($iFrom)) && (isset($iLimit))){
            $sLimit = "LIMIT ".$iFrom.",".$iLimit."";
        }else{
            $sLimit = "LIMIT 0,20";
        }
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        *
                      FROM driver
                      ' . $sWhere . '
                      ' . $sLimit . '


        ');
         $row = $stmt->fetchAll();
        return $row;
    }
    
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * Check New Driver for existing in DB
     *
     * @param array $searchData Array which contains value of the fields
     * @return mixed
     */
     public static function searchNewDriver($searchData)
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        d_ID, d_Driver_SSN, d_Date_Of_Birth 	
                      FROM driver
                      WHERE d_Driver_SSN = "' . $searchData['d_Driver_SSN'] . '" 

        ');
         $row = $stmt->fetchAll();
         if(sizeof($row)>0){
             for($i=0;$i<sizeof($row);$i++){
                 if($row[$i]['d_Driver_SSN']==$searchData['d_Driver_SSN']){
                     return false; # driver with such SSN found in DB. Proceed is impossible;
                 }
             }
         }else{
              return true;
         }
         return 'error';
    }
    
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * create pending record for New Driver
     *
     * @param array $driverData Array which contains value of the fields
     * @return mixed
     */
     public static function createPendingDriver($driverData)
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      INSERT INTO driver(d_Driver_SSN,d_Employment_Type,d_Date_Of_Birth,d_Status)
                      VALUES("' . $driverData['d_Driver_SSN'] . '","' . $driverData['d_Employment_Type'] . '","' . $driverData['d_Date_Of_Birth'] . '",1)
        ');
         $stmt = $db->query('
                      SELECT
                        d_ID, d_Driver_SSN, d_Date_Of_Birth
                      FROM driver
                      WHERE d_Driver_SSN = "' . $driverData['d_Driver_SSN'] . '"
        ');
         
         $row = $stmt->fetch();
         return $row['d_ID'];
    }

    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * get driver information
     *
     * @param int $driverID 
     * @return mixed
     */
     public static function getDriverInfo($driverID)
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        *
                      FROM driver
                      WHERE d_ID = "' . $driverID . '"
        ');
         $row = $stmt->fetch();
         return $row;
    }

}

