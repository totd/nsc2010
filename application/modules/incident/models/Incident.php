<?php
class Incident_Model_Incident extends Zend_Db_Table_Abstract
{
    protected $_name = 'incident';

    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all incidents from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}