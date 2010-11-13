<?php
class Equipment_Model_Equipment extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment';

    /**
     * @author Andryi Ilnytskyi 08.11.2010
     *
     * Change new_equipment_status of the equipment
     * 
     * @param string $status
     * @param int $id
     *
     * @return int The number of rows updated.
     */
    public function changeNewEquipmentStatus($status, $id)
    {
        $select = "SELECT enes_id FROM equipment__new_equipment_status WHERE enes_type='{$status}'";
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query($select);
        $result = $stmt->fetch();

        $returnResult = 0;

        if (count($result) > 0) {
            $data = array(
                    'e_New_Equipment_Status' => $result['enes_id']
                );
            $where = $this->getAdapter()->quoteInto('e_id = ?', $id);
            $returnResult = $this->update($data, $where);
        }

        return $returnResult;
    }

    /**
     * @author Andriy Ilnytskyi 04.11.2010
     *
     * Get all equipments from a storing.
     *
     * @param <type> $status
     * @param <type> $offset
     * @param <type> $count
     * @return <type>
     */
    public function getEquipmentList($status = 'Pending', $offset = 0, $count = 20)
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT * FROM equipment";
        $join = " JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id";

        if ($status == 'All') {
            $select .= " $join $limit";
        } else {
            $where = "WHERE enes_type = '$status'";
            $select .= " $join $where $limit";
        }
        
        $stmt = $this->getDefaultAdapter()->query($select);
        return $stmt->fetchAll();
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

            return $this->findEquipmentByVIN($rowEquipment->e_Number);
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
        $db = $this->getAdapter();

        $select = "SELECT *
                    FROM equipment
                    JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id
                    LEFT JOIN equipment_types ON et_id = e_type_id
                    WHERE e_Number = '$valueVIN'";

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query($select);

        $resultArray = $stmt->fetchAll();
        $result = (count($resultArray) > 0) ? $resultArray : null;

        return $result[0];
    }



}
