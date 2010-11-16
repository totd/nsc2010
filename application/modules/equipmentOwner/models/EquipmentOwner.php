<?php
class EquipmentOwner_Model_EquipmentOwner extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment_owner';

    /**
     * @author Andriy Ilnytskyi 08.11.2010
     *
     * Get all equipment owners from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

