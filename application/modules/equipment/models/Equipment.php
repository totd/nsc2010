<?php
class Equipment_Model_Equipment extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment';

    /**
     * @author Andriy Ilnytskyi 22.10.2010
     *
     * Get all users from a storing.
     *
     * @return mixed
     */
    public static function getEquipmentList()
    {
        $equipmentModel = new self();
        $select = $equipmentModel->select();
        return $equipmentModel->fetchAll($select);
    }
}
