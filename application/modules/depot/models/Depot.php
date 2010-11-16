<?php

class Depot_Model_Depot extends Zend_Db_Table_Abstract
{
    protected $_name = 'depot';
    var $table;
    public function init(){
        $this->table = 'depot';
    }
    /**
     * @author Vladislav Skachkov 16.11.2010
     *
     * Get List of Depots
     *
     * @param int $iHomebaseID
     * @param int $iShortList
     *
     * @return array.
     */
    public function getDepotList($iHomebaseID=null,$iShortList=0)
    {
        if($iShortList==0){
            if($iHomebaseID!=null){
                $sql='
                      SELECT *
                      FROM depot
                        JOIN homebase on depot.d_HomeBase_Account_Number = homebase.h_id
                      WHERE d_HomeBase_Account_Number = '.$iHomebaseID.'
                    ';
            }else{
                $sql='
                      SELECT *
                      FROM depot
                        JOIN homebase on depot.d_HomeBase_Account_Number = homebase.h_id
                    ';
            }
        }else{
            if($iHomebaseID!=null){
                $sql='
                      SELECT d_id,d_Name
                      FROM depot
                      WHERE d_HomeBase_Account_Number = '.$iHomebaseID.'
                    ';
            }else{
                $sql='
                      SELECT d_id,d_Name
                      FROM depot
                    ';
            }
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->fetchAssoc($sql);
        if(sizeof($stmt)>0){
            return $stmt;
        }
        return null;
    }

}