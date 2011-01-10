<?php
class Incident_Model_Witness extends Zend_Db_Table_Abstract
{
    protected $_name = "incidents_witnesses";

    public function saveWitness($saveRow)
    {
        if (isset($saveRow['iw_id'])) {
            $rowTable = $this->fetchRow("iw_id = {$this->getDefaultAdapter()->quote($saveRow['iw_id'])}");
            if ($rowTable) {
                unset($saveRow['iw_id']);
            }
        } else {
            $rowTable = $this->createRow();
        }

        foreach ($saveRow as $key => $value) {
            $rowTable[$key] = $value;
        }

        $rowTable->save();



        return $rowTable;
    }

    public function getListByIncident($incidentId)
    {
        $result = null;

        if (!empty($incidentId)) {
            $select = "SELECT *
                    FROM incidents_witnesses
                    LEFT JOIN person ON iw_person_id = per_id
                    LEFT JOIN state ON per_state_id = s_id
                    WHERE iw_incident_id = {$this->getDefaultAdapter()->quote($incidentId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) && count($rows)) {
                $result = $rows;
            }
        }

        return $result;
    }

    public function deleteWitness($personId)
    {
        $result = 0;

        if (!empty($personId)) {
            $rowTable = $this->fetchRow("iw_person_id = {$this->getDefaultAdapter()->quote($personId)}");
            $result = $rowTable->delete();
        }

        return $result;
    }
}

