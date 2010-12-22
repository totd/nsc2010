<?php
class Incident_Model_TravelDirection extends  Zend_Db_Table_Abstract
{
    protected $_name = "travel_direction";

    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

