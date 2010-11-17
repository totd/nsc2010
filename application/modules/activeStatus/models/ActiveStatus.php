<?php
class ActiveStatus_Model_ActiveStatus extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment__active_status';

    /**
     * @author Andriy Ilnytskyi 08.11.2010
     *
     * Get all active statuses from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

