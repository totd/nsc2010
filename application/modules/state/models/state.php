<?php
class State_Model_State extends Zend_Db_Table_Abstract
{
    protected $_name = 'state';

    /**
     * @author Andriy Ilnytskyi 15.11.2010
     *
     * Get all states from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}
