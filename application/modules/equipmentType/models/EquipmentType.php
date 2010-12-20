<?php
class EquipmentType_Model_EquipmentType extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment_types';

    /**
     * @author Andriy Ilnytskyi 15.11.2010
     *
     * Get all types from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select()
                ->order('et_id');
        return $this->fetchAll($select);
    }


    public function getList2()
    {
        $table = new EquipmentType_Model_EquipmentType();
        $row = $table->fetchAll("et_id > 0"," et_id asc ");
        $rowsetArray = $row->toArray();
        return $rowsetArray;
    }
}
