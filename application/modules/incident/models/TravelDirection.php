<?php
class Incident_Model_TravelDirection extends  Zend_Db_Table_Abstract
{
    protected $_name = "incident__highway_street_travel_direction";

    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

