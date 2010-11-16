<?php

class State_Model_State  extends Zend_Db_Table_Abstract
{

    protected $_name = 'state';

    /**
     * @author Vlad Skachkov 16.11.2010
     *
     * Get all states.
     *
     * @return mixed
     */
    public static function getList()
    {
        $sql='SELECT *
                FROM state';

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->fetchAssoc($sql);
        if(sizeof($stmt)>0){
            return $stmt;
        }
        return null;
    }

}

