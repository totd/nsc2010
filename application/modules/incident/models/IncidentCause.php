<?php
class Incident_Model_IncidentCause extends Zend_Db_Table_Abstract
{
    protected $_name = "incident_cause";

    public function saveIncidentCause($saveRow)
    {
        if (isset($saveRow['ic_ID'])) {
            $rowTable = $this->fetchRow("ic_ID = {$this->getDefaultAdapter()->quote($saveRow['ic_ID'])}");
            if ($rowTable) {
                unset($saveRow['ic_ID']);
            }

        } else {
            $rowTable = $this->createRow();
        }


        foreach ($saveRow as $key => $value) {
            $rowTable->$key = $value;
        }

        $rowTable->save();
        
        return $rowTable;
    }
    
}

