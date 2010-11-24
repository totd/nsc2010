<?php

class Homebase_Model_Homebase extends Zend_Db_Table_Abstract
{
    protected $_name = 'homebase';

    /**
     * @author Vladislav Skachkov 16.11.2010
     *
     * Get List of Homebases
     *
     * @param int $iCompanyID
     * @param int $iShortList
     *
     * @return array.
     */
    public static function getHomebaseList($iCompanyID=null,$iShortList=0)
    {
        if($iShortList==0){
            if($iCompanyID!=null){
                $select = "SELECT * FROM homebase
                            JOIN contacts_table on contacts_table.ct_ID=homebase.h_Contact_Table_ID
                            JOIN company on company.c_ID=homebase.h_Company_Account_Number
                            WHERE h_Company_Account_Number=" . $iCompanyID . "
                            ";
            }else{
                $select = "SELECT * FROM homebase
                            JOIN contacts_table on contacts_table.ct_ID=homebase.h_Contact_Table_ID
                            JOIN company on company.c_ID=homebase.h_Company_Account_Number
                            ";
            }
        }else{
            if($iCompanyID!=null){
                $select = "SELECT h_id,h_Name FROM homebase
                            WHERE h_Company_Account_Number=" . $iCompanyID . "
                            ";
            }else{
                $select = "SELECT h_id,h_Name FROM homebase
                            ";
            }
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $stmt = $db->fetchAssoc($select);
    }
    
    /**
     * @author Vladislav Skachkov 20.11.2010
     *
     * Get homebase
     *
     * @return mixed
     */
    public function getHomebase($id)
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query('
                      SELECT
                        *
                      FROM homebase
                      WHERE h_ID = "' . $id . '"
        ');
        $row = $stmt->fetch();
        return $row;
    }
    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all homebases from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

}
