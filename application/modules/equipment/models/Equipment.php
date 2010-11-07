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
        $rowEquipment = $this->createRow();
        if ($rowEquipment) {
            foreach ($equipmentRow as $key => $value) {
                $rowEquipment->$key = $value;
            }

            $rowEquipment->save();
            return $rowEquipment;
        } else {
            throw new Zend_Exception("Could not create equipment!");
        }
    }

    /**
     * @author Andryi Ilnytskyi
     * 
     * Find equipment by VIN
     * 
     * @param string $valueVIN
     * 
     * @return mixed search result
     */
    public function findEquipmentByVIN($valueVIN)
    {
        $select = $this->select()
                ->where('e_Number = ?', $valueVIN);

        $stmt = $select->query();
        $resultArray = $stmt->fetchAll();
        $result = (count($resultArray) > 0) ? $resultArray : null;
        
        return $result;
    }

}
