<?php
class NewStatus_Model_NewStatus extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment__new_equipment_status';

    /**
     * @author Andriy Ilnytskyi 08.11.2010
     *
     * Get all new statuses from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

