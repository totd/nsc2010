<?php

class Driver_Model_Driver extends Zend_Db_Table_Abstract
{

    protected $_name = 'driver';
    public function init()
    {
        $_SESSION['driver_info']['DriverEmploymentType_list'] = Driver_Model_DriverEmploymentType::getAll();
        $_SESSION['driver_info']['DriverEyeColor_list'] = Driver_Model_DriverEyeColor::getAll();
        $_SESSION['driver_info']['DriverGender_list'] = Driver_Model_DriverGender::getAll();
        $_SESSION['driver_info']['DriverHairColor_list'] = Driver_Model_DriverHairColor::getAll();
        $_SESSION['driver_info']['DriverStatus_list'] = Driver_Model_DriverStatus::getAll();
    }

    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * get all drivers list
     *
     * @return mixed
     */
    public function getList(){
        $select = $this->select();
        return $this->fetchAll($select);
    }
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * get drivers list
     *
     * @param int: $iStatus - status ID, $iPage
     * @param nixed: $mOrderBy - array('field'=>'field_name','sort' => 'ASC|DESC')
     * @return mixed
     */
    # public static function getDrivers($iStatus=1,$mOrderBy=array('field'=>'d_Entry_Date','sort' => 'DESC'),$iFrom=0,$iLimit=20)
    public static function getDrivers($sWhere="1",$mOrderBy=array('d_Entry_Date','DESC'),$iPage = 0)
    {
        $Where =" WHERE ".$sWhere;
        $sOrderBy =" ORDER BY ".$mOrderBy[0]." ".$mOrderBy[1];
        if($iPage==0){
            $sLimit = "";
        }elseif($iPage==1){
            $sLimit = "LIMIT 0,6";;
        }else{
            $sLimit = "LIMIT ".(6*($iPage-1)).",6";
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        *
                      FROM driver
                      ' . $Where . '
                      ' . $sOrderBy . '
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
     * @param string $d_Driver_SSN Array which contains value of the fields
     * @return mixed
     */
     public static function searchNewDriver($d_Driver_SSN)
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
         $stmt = $db->query('
                      SELECT
                        d_ID, d_Driver_SSN, d_Date_Of_Birth 	
                      FROM driver
                      WHERE d_Driver_SSN = "' . $d_Driver_SSN . '" 

        ');
         $row = $stmt->fetchAll();
         return $row;
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
         $arr=explode("/",$driverData['d_Date_Of_Birth']);
         $driverData['d_Date_Of_Birth'] = $arr[2]."-".$arr[0]."-".$arr[1];
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
    /**
     * @author Vlad Skachkov 04.11.2010
     *
     * save driver information
     *
     * @param mixed $data
     * @return mixed
     */
    public function saveDriverInfo($data)
    {
        $db = new Driver_Model_Driver();
        
        $w = 'd_ID = '.$data['d_ID'];
       echo $db->update($data,$w);
       return $db->update($data,$w);
    }

}

