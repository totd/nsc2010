<?php
class Incident_Model_Passenger extends Zend_Db_Table_Abstract
{
    protected $_name = "incidents_passengers";

    public function savePassenger($saveRow)
    {
        if (isset($saveRow['ip_id'])) {
            $rowTable = $this->fetchRow("ip_id = {$this->getDefaultAdapter()->quote($saveRow['ip_id'])}");
            if ($rowTable) {
                unset($saveRow['ip_id']);
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
                    FROM incidents_passengers
                    LEFT JOIN person ON ip_person_id = per_id
                    LEFT JOIN state ON per_state_id = s_id
                    WHERE ip_incident_id = {$this->getDefaultAdapter()->quote($incidentId)}
                    ";
            $stmt = $this->getDefaultAdapter()->query($select);

            $rows = $stmt->fetchAll();

            if (is_array($rows) && count($rows)) {
                $result = $rows;
            }
        }

        return $result;
    }

    public function deletePassenger($personId)
    {
        $result = 0;

        if (!empty($personId)) {
            $rowTable = $this->fetchRow("ip_person_id = {$this->getDefaultAdapter()->quote($personId)}");
            $result = $rowTable->delete();
        }

        return $result;
    }
}

