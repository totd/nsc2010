<?php

class Driver_Model_DriverHos extends Zend_Db_Table_Abstract
{
  protected $_name = 'driver__hos';
  
    /**
     * @author Vlad Skachkov 08.11.2010
     *
     * get list of all days where drivers activity marked
     *
     * @param int $iDriverID
     * @param int $forWeek if 1 then get only records for last week, else - all records
     * @return mixed
     */
    public function getList($iDriverID=null,$forWeek=0)
    {
        $table = new Driver_Model_DriverHos();
        if((int)$iDriverID==null){
            return null;
        }else{
            if($forWeek==0){
                $row = $table->fetchAll("dhos_Driver_ID = ".$iDriverID," dhos_date ASC ");
            }elseif($forWeek==1){
                $table->select("dhos_ID,dhos_date,dhos_hours");
                $toDate = date("Y-m-d");
                $arr = explode("-",$toDate);
                $startDate = date("Y-m-d",mktime(0, 0, 0, $arr[1], $arr[2]-7, $arr[0]));
                $row = $table->fetchAll("dhos_Driver_ID = ".$iDriverID." and dhos_date BETWEEN '".$startDate."' and '".$toDate."' "," dhos_date DESC ");
            }
        }
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }

    public static function getRecord($mData)
    {
        $table = new Driver_Model_DriverHos();
        $row = $table->fetchRow("dhos_Driver_ID =".$mData['dhos_Driver_ID']." AND dhos_date = '".$mData['dhos_date']."'");
        if($row==null){return false;}
        return $row->toArray();
    }
    public static function createRecord($mData)
    {
        $table = new Driver_Model_DriverHos();
        return $table->insert($mData);
    }

    public function deleteRecord($mData)
    {
        if(isset($mData['dhos_Driver_ID']) && isset($mData['dhos_date'])){
            $table = new Driver_Model_DriverHos();
            return $table->delete("dhos_Driver_ID =".$mData['dhos_Driver_ID']." AND dhos_date = '".$mData['dhos_date']."' ");
        }else{return null;}

    }
    public static function updateRecord($mData)
    {
        $db = new Driver_Model_DriverHos();
        $w = "dhos_Driver_ID =".$mData['dhos_Driver_ID']." AND dhos_date = '".$mData['dhos_date']."'";
        return $db->update($mData,$w);
    }
}