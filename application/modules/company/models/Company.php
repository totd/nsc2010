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
      c_id,c_Name,
      contacts_table.ct_State as `ct_State`,
      contacts_table.ct_Start_Date as `ct_Start_Date`,
      parent_company.pc_id as `pc_id`,
      parent_company.pc_Name as `pc_Name`,
      homebase.h_Name as `h_Name`
      FROM company
       LEFT JOIN contacts_table on contacts_table.ct_ID=company.c_Contact_Table_ID
       LEFT JOIN parent_company on parent_company.pc_ID=company.c_Parent_Company_Account_Number
       LEFT JOIN homebase on homebase.h_Company_Account_Number=company.c_id
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

