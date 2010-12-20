<?php
class Equipment_Model_Equipment extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment';

    protected $_requiredCopmleteFields = array (
        'e_Unit_Number' => 'unit',
        'e_License_Expiration_Date' => 'license expiration date',
        'e_License_Number' => 'license plate number',
        'e_Start_Mileage' => 'start mileage',
        'e_Registration_State' => 'registration state',
        'e_Gross_Equipment_Weight_Rating' => 'gross equipment weight',
        'e_Gross_Equipment_Registered_Weight' => 'gross equipment registered weight',
        'e_Unladen_Weight' => 'unladen weight',
        'e_Axles' => 'number of axles',
        'e_Name' => 'name',
        'e_Make' => 'make',
        'e_Color' => 'color',
        'e_Model' => 'model',
        'e_Year' => 'year of manufacturing',
        'e_Description' => 'description',
        'e_DOT_Regulated' => 'DOT regulated',
        'e_type_id' => 'type'
    );

    public function getArchivesList($offset = 0, $count = 20, $filterOptions = null)
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM equipment";
        $join = " JOIN equipment__active_status ON e_Active_Status = eas_id";
        $join .= " JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id";
        $join .= " LEFT JOIN state ON e_Registration_State = s_id";
        $join .= " LEFT JOIN equipment_types ON e_type_id = et_id";
        $where = " WHERE enes_type = 'Completed'";
        $orderBy = " ORDER BY ";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where .= " AND eas_type = {$this->getDefaultAdapter()->quote($filterOptions['Status'])}";
            } else {
                // TODO refactor if status Denied will be used.
                $where .= " AND eas_type = 'Terminated'";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])) {
            $where .= empty($where) ? "WHERE " : " AND ";
            $where .= "{$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%'";
        }

        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'eas_type';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";

        $select .= " $join $where $orderBy $limit";

        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitEquipments'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
    }

    public function saveEquipment($saveRow)
    {
        if (isset($saveRow['e_id'])) {
            $rowTable = $this->fetchRow("e_id = {$this->getDefaultAdapter()->quote($saveRow['e_id'])}");
            if ($rowTable) {
                unset($saveRow['e_id']);
            }

            foreach ($saveRow as $key => $value) {
                $rowTable[$key] = $value;
            }
            
            $rowTable->save();

            return $rowTable;
        }
    }

    public function getTruckFilesList($offset = 0, $count = 20, $filterOptions = null, $excludeStatus = 'Terminated')
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM equipment";
        $join = " JOIN equipment__active_status ON e_Active_Status = eas_id";
        $join .= " JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id";
        $join .= " LEFT JOIN state ON e_Registration_State = s_id";
        $join .= " LEFT JOIN equipment_types ON e_type_id = et_id";
        $where = " WHERE enes_type = 'Completed'";
        $orderBy = " ORDER BY ";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where .= " AND eas_type = {$this->getDefaultAdapter()->quote($filterOptions['Status'])}";
            } else if (!is_null($excludeStatus)) {
                $where .= " AND eas_type <> {$this->getDefaultAdapter()->quote($excludeStatus)}";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])) {
            $where .= empty($where) ? "WHERE " : " AND ";
            $where .= "{$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%'";
        }

        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'eas_type';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";

        $select .= " $join $where $orderBy $limit";

        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitEquipments'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
    }

    public function completeEquipment($saveRow)
    {
        $rowTable = $this->fetchRow("e_id = {$this->getDefaultAdapter()->quote($saveRow['e_id'])}");
        unset($saveRow['e_id']);

        if ($rowTable) {
            foreach ($saveRow as $key => $value) {
                $rowTable[$key] = $value;
            }

            $rowTable->save();

            $rowTable = $this->changeNewEquipmentStatus('Completed', $rowTable->e_id);
            //return the new user
            return $rowTable;
        } else {
            throw new Zend_Exception("Could not save equipment assignment!");
        }
    }

    public function getRow($id)
    {
        $row = $this->fetchRow("e_id = $id");

        return $row;
    }

    public function checkCompletedFields($id)
    {
        $row = $this->getRow($id);

        foreach ($row as $field => $value) {
            if ((empty($value) || is_null($field)) && key_exists($field, $this->_requiredCopmleteFields))  {
                $result[$field] = $this->_requiredCopmleteFields[$field];
            }
        }

        return (isset($result)) ? $result : null;
    }

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

        if (count($result) > 0) {
            $rowTable = $this->fetchRow("e_id = {$this->getDefaultAdapter()->quote($id)}");

            if ($rowTable) {
                $rowTable['e_New_Equipment_Status'] = $result['enes_id'];
                $rowTable->save();
            return $rowTable;
            } else {
                throw new Zend_Exception("Could not change equipment status!");
            }

            
        }
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
        $join .= " LEFT JOIN equipment_types ON e_type_id = et_id";
        $where = "";
        $orderBy = " ORDER BY ";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where = "WHERE enes_type = {$this->getDefaultAdapter()->quote($filterOptions['Status'])}";
            } else {
                $where = "WHERE enes_type <> {$this->getDefaultAdapter()->quote($excludeStatus)}";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])) {
            $where .= empty($where) ? "WHERE " : " AND ";
            $where .= "{$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%'";
        }

        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'enes_type';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";

        $select .= " $join $where $orderBy $limit";
        
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

            $rowEquipment->e_Entry_Date = new Zend_Db_Expr("NOW()");

            $rowEquipment->save();

            return $this->findEquipmentByVIN($rowEquipment->e_Number);
        } else {
            throw new Zend_Exception("Could not create equipment!");
        }
    }

    /**
     * @author Andryi Ilnytskyi
     * 
     * Find equipment by EIN
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
                    LEFT JOIN equipment__active_status ON e_Active_Status = eas_id
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

    public function getEquipmentInformation($id)
    {
        $result = null;
        
        if (!empty($id)) {
            $db = $this->getAdapter();


            $select = "SELECT *
                        FROM equipment
                        LEFT JOIN equipment__active_status ON e_Active_Status = eas_id
                        JOIN equipment__new_equipment_status ON e_New_Equipment_Status = enes_id
                        LEFT JOIN equipment_types ON et_id = e_type_id
                        LEFT JOIN state ON e_Registration_State = s_id
                        WHERE e_id = '$id'";

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $stmt = $db->query($select);

            $resultArray = $stmt->fetchAll();
            $result = (count($resultArray) > 0) ? $resultArray[0] : null;
        }

        return $result;
    }
}
