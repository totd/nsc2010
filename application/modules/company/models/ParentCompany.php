<?php

class company_Model_ParentCompany extends Zend_Db_Table
{
    protected $_name = 'parent_company';

    /**
     * @author Vlad Skachkov 29.10.2010
     *
     * Get Parent Company list
     *
     * @return mixed
     */
      public static function getParentCompanyList()
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query(" SELECT
      pc_id,pc_Name
      FROM parent_company
        ");
        $row = $stmt->fetchAll();
        return $row;

    }


}

