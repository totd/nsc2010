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
     * @return mixed
     */
    public function getEquipmentList()
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

            $db = $this->getAdapter();

            $select = "SELECT e_id, e_Number, e_Entry_Date, enes_type
                            FROM equipment
                            JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id
                            WHERE e_Number = '{$rowEquipment->e_Number}'";
                            
            // TODO implement using ZendDB->select()
//            $select = $this->select()
//                             ->from('equipment')
//                             ->columns(array('e_Number', 'e_Entry_Date', 'enes_type'))
//                             ->join('equipment__new_equipment_status', 'e_New_Equipment_Status = enes_id')
//                             ->where('e_Number = ?', $rowEquipment->e_Number);
//            $stmt = $select->query();

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $stmt = $db->query($select);
            
            $resultArray = $stmt->fetchAll();
            $result = (count($resultArray) > 0) ? $resultArray : null;

            return $result[0];
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
