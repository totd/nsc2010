<?php
class Equipment_Model_Equipment extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment';

    public function getVIN($equipmentId)
    {
        $row = $this->fetchRow("e_id = $equipmentId");

        return $row->e_Number;
    }

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
     * @param int $offset
     * @param count $count
     * @param mixed $filterOptions
     * @param string $excludeStatus
     *
     * @return mixed
     */
    public function getEquipmentList($offset = 0, $count = 20, $filterOptions = null, $excludeStatus = 'Completed')
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM equipment";
        $join = " JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id";
        $join .= " LEFT JOIN state ON e_Registration_State = s_id";
        $where = "";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where = "WHERE enes_type = '{$filterOptions['Status']}'";
            } else {
                $where = "WHERE enes_type <> '$excludeStatus'";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])) {
            $where .= empty($where) ? "WHERE " : " AND ";
            $where .= "{$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%'";
        }

        $select .= " $join $where $limit";
        
        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitEquipments'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
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
                    LEFT JOIN state ON e_Registration_State = s_id
                    WHERE e_Number = '$valueVIN'";

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $stmt = $db->query($select);

        $resultArray = $stmt->fetchAll();
        $result = (count($resultArray) > 0) ? $resultArray : null;

        return $result[0];
    }



}
