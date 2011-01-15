<?php

class Company_Model_Company extends Zend_Db_Table 
{
    protected $_name = 'company';

    /**
     * @author Vlad Skachkov 28.10.2010
     *
     * Get Company list
     *
     * @return mixed
     */
      public static function getCompanyList()
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query(" SELECT
                                *
                                FROM company
                                LEFT JOIN contacts_table on contacts_table.ct_ID=company.c_Contact_Table_ID
                                LEFT JOIN state on state.s_id=contacts_table.ct_State
        ");
        $row = $stmt->fetchAll();
        return $row;
    }

    public static function getRecord($c_ID)
    {
         $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query(" SELECT *
                                FROM company
                               LEFT JOIN contacts_table on contacts_table.ct_ID=company.c_Contact_Table_ID
                               WHERE c_id = ".$c_ID."
                                ");
        $row = $stmt->fetchAll();
        return $row;
    }
}

