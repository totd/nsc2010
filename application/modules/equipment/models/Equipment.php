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

    /**
     * @author Andriy Ilnytskyi 05.11.2010
     *
     * Create equipment.
     *
     * @param array $equipmentRow Array which contains value of the fields
     * @return mixed
     */
    public function createEquipment($equipmentRow)
    {
        // create a new row
        $rowEquipment = $this->createRow();
        if ($rowEquipment) {
            foreach ($equipmentRow as $key => $value) {
                $rowEquipment->$key = $value;
            }

            $rowEquipment->save();
            //return the new equipment
            return $rowEquipment;
        } else {
            throw new Zend_Exception("Could not create user!");
        }
    }
}
