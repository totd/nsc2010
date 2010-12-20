<?php
class EquipmentAssignment_Model_EquipmentAssignment extends Zend_Db_Table_Abstract
{
    protected $_name = 'equipment_assignment';

    public function findRow($field, $value)
    {
        $result = false;

        $rowTable = $this->fetchRow("$field = $value");
        if ($rowTable) {
            $result = true;
        }

        return $result;
    }

    public function saveAssignment($saveRow)
    {
        if (isset($saveRow['ea_id'])) {
            $rowTable = $this->fetchRow("ea_id = {$this->getDefaultAdapter()->quote($saveRow['ea_id'])}");
            unset($saveRow['ea_id']);
        } else {
            $rowTable = $this->createRow();
        }

        if ($rowTable) {
            foreach ($saveRow as $key => $value) {
                $rowTable->$key = $value;
            }

            $rowTable->save();
            //return the new user
            return $rowTable;
        } else {
            throw new Zend_Exception("Could not save equipment assignment!");
        }
    }

    public function getAssignment($equipmentId)
    {
        $select = "SELECT *
            FROM equipment_assignment
            LEFT JOIN homebase ON ea_homebase_id = h_id
            LEFT JOIN company ON ea_company_id = c_id
            LEFT JOIN equipment ON ea_equipment_id = e_id
            LEFT JOIN equipment_owner ON ea_owner_id = eo_id
            LEFT JOIN driver ON ea_driver_id = d_ID
            LEFT JOIN depot ON ea_depot_id = dp_id
            LEFT JOIN service_provider__equipment_assignment ON e_id = spea_Equipment_id
            LEFT JOIN service_provider ON spea_Service_Provider_ID = sp_ID
            LEFT JOIN inspection ON e_id = ins_Equipment_ID
            LEFT JOIN equipment_maintenance ON e_id = em_Equipment_ID
            LEFT JOIN incident ON e_id = i_Equipment_ID
            where ea_equipment_id = {$this->getDefaultAdapter()->quote($equipmentId)}
        ";

        $stmt = $this->getDefaultAdapter()->query($select);
        $assignmentRow = $stmt->fetch();
        return $assignmentRow;
    }

    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all equipment assignments from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }
}

