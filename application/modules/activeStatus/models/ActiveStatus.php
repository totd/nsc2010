<?php
class ActiveStatus_Model_ActiveStatus extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment__active_status';

    public function getIdByType($status)
    {
        $result = null;

        $row = $this->fetchRow("eas_type = '$status'");

        if ($row) {
            $result = $row->eas_id;
        }

        return $result;

    }

    public function getRowByStatus($statusTitle)
    {
        $rowTable = $this->fetchRow("eas_type = {$this->getDefaultAdapter()->quote($statusTitle)}");

        return $rowTable;
    }

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

