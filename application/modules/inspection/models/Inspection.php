<?php
class Inspection_Model_Inspection extends Zend_Db_Table_Abstract
{
    protected $_name = 'inspection';

    public function saveInspection($saveRow)
    {
        if (isset($saveRow['ins_Equipment_ID'])) {
            $rowTable = $this->fetchRow("ins_Equipment_ID = {$this->getDefaultAdapter()->quote($saveRow['ins_Equipment_ID'])}");
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
            throw new Zend_Exception("Could not save inspection!");
        }
    }

    public function equipmentIsInspected($equipmentId)
    {
        $result = true;

        // TODO uncomment it after Inspection implementation.
//        $row = $this->fetchRow("ins_Equipment_ID = $equipmentId");
//
//        if (!$row) {
//            $resul = false;
//        }

        return $result;
    }

    /**
     * @author Andriy Ilnytskyi 19.11.2010
     *
     * Get all incpections from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    
}