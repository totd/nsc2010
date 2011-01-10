<?php
class Incident_Model_Incident extends Zend_Db_Table_Abstract
{
    protected $_name = 'incident';

    public function deleteInvolvedEquipment($incidentId)
    {
        $rowTable = $this->fetchRow("i_ID = {$this->getDefaultAdapter()->quote($incidentId)}");
        if ($rowTable) {
            $rowTable->i_Equipment_ID = null;
            $rowTable->save();
        }
    }

    public function getIncidentDescription($id)
    {
        $select = "SELECT *
                    FROM incident
                    LEFT JOIN state ON i_State_ID = s_id
                    LEFT JOIN travel_direction ON i_Travel_Direction_ID = td_id
                    WHERE i_ID = {$this->getDefaultAdapter()->quote($id)}
                    ";
        $stmt = $this->getDefaultAdapter()->query($select);

        $row = $stmt->fetchAll();

        $result = null;

        if (is_array($row) && count($row)) {
            $result = $row[0];
        }

        return $result;

    }

    /**
     * @author Andriy Ilnytskyi 16.11.2010
     *
     * Get all incidents from a storing.
     *
     * @return mixed
     */
    public function getList()
    {
        $select = $this->select();
        return $this->fetchAll($select);
    }

    /**
     * @author Andriy Ilnytskyi 25.11.2010
     *
     * Get all incidents from a storing.
     *
     * @param int $offset
     * @param count $count
     * @param mixed $filterOptions
     * @param string $excludeStatus
     *
     * @return mixed
     */
    public function getIncidentList($offset = 0, $count = 20, $filterOptions = null)
    {
        $limit = "LIMIT $offset, $count";
        $select  = "SELECT SQL_CALC_FOUND_ROWS * FROM incident";
        $join = " LEFT JOIN state ON i_State_ID = s_id";
        $join .= " LEFT JOIN driver ON i_Driver_ID = d_ID";
        $where = "";
        $orderBy = " ORDER BY ";

        if (isset($filterOptions['Status'])) {
            if ($filterOptions['Status'] != 'All') {
                $where .= "WHERE i_Status = {$this->getDefaultAdapter()->quote($filterOptions['Status'])}";
            }
        }

        if (isset($filterOptions['SearchBy']) &&  $filterOptions['SearchBy'] != '-'
                && isset($filterOptions['SearchBy'])
                && isset($filterOptions['SearchText']) && !empty($filterOptions['SearchText'])) {
            
            $where .= empty($where) ? "WHERE " : " AND ";
            if (is_array($filterOptions['SearchBy'])) {
                for ($i = 0; $i < count($filterOptions['SearchBy']); $i++) {
                    if ($i > 0) {
                        $where .= ' OR ';
                    }
                    $where .= " {$filterOptions['SearchBy'][$i]} LIKE '%{$filterOptions['SearchText']}%' ";
                }
            } else {
                $where .= " {$filterOptions['SearchBy']} LIKE '%{$filterOptions['SearchText']}%' ";
            }
        }

        if (!isset($filterOptions['orderBy'])) {
            $filterOptions['orderBy'] = 'i_Status';
        }

        if (!isset($filterOptions['orderWay'])) {
            $filterOptions['orderWay'] = 'ASC';
        }

        if (is_array($filterOptions['orderBy'])) {
            for ($i = 0; $i < count($filterOptions['orderBy']); $i++) {
                if ($i > 0) {
                    $orderBy .= ' , ';
                }
                $orderBy .= " {$filterOptions['orderBy'][$i]} {$filterOptions['orderWay']}";
            }
        } else {
            $orderBy .= "{$filterOptions['orderBy']} {$filterOptions['orderWay']}";
        }

        $select .= " $join $where $orderBy $limit";

        $stmt = $this->getDefaultAdapter()->query($select);

        $result['limitIncidents'] = $stmt->fetchAll();

        $select = 'SELECT FOUND_ROWS()';
        $stmt = $this->getDefaultAdapter()->query($select);
        $totalCount = $stmt->fetchAll();
        $result['totalCount'] = (isset($totalCount[0]['FOUND_ROWS()'])) ? $totalCount[0]['FOUND_ROWS()'] : $count;

        return $result;
    }

    public function saveIncident($saveRow)
    {
        if (isset($saveRow['i_ID'])) {
            $rowTable = $this->fetchRow("i_ID = {$this->getDefaultAdapter()->quote($saveRow['i_ID'])}");
            if ($rowTable) {
                unset($saveRow['i_ID']);
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

    public function getIcidentFieldValueById($id, $field)
    {
        $result = null;

        if (!empty($id) && !empty($field)) {
            $rowTable = $this->fetchRow("i_ID = {$this->getDefaultAdapter()->quote($id)}");

            if (!is_null($rowTable)) {
                $result = $rowTable->$field;
            }
        }

        return $result;
    }

    public function incidentIsExists($id)
    {
        $result = false;

        if (!empty($id)) {
            $rowTable = $this->fetchRow("i_ID = {$this->getDefaultAdapter()->quote($id)}");

            if (!is_null($rowTable)) {
                $result = true;
            }
        }

        return $result;
    }

    /**
     * Get the biggest last modified time according to all tables which are linked with incident
     * 
     * @param int $id
     * @return string Contains datetime value
     */
    public function getLastModifiedDate($id)
    {
        $result = null;

        if (!empty($id)) {
            $db = $this->getAdapter();

            // TODO decide a nessecity to compare with driver and equipment last_modified_time
            $select = "SELECT i_last_modified_datetime,
                                MAX(iwp.per_last_modified_datetime) as max_iwp_date_time,
                                MAX(ipp.per_last_modified_datetime) as max_ipp_date_time,
                                (i_last_modified_datetime - MAX(iwp.per_last_modified_datetime)) as iw_compare,
                                (i_last_modified_datetime - MAX(ipp.per_last_modified_datetime)) as ip_compare,
                                (MAX(iwp.per_last_modified_datetime) - MAX(ipp.per_last_modified_datetime)) as wp_compare
                        FROM incident
                        LEFT JOIN incidents_passengers ON i_ID = ip_incident_id
                        LEFT JOIN person ipp ON ip_person_id = ipp.per_id
                        LEFT JOIN incidents_witnesses ON i_ID = iw_incident_id
                        LEFT JOIN person iwp ON iw_person_id = iwp.per_id
                        WHERE i_ID = {$this->getDefaultAdapter()->quote($id)}
                        GROUP BY ip_incident_id, iw_incident_id";

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $stmt = $db->query($select);

            $resultArray = $stmt->fetchAll();
            $row = (count($resultArray) > 0) ? $resultArray[0] : null;
            if (!is_null($row)) {
                if (!isset($row['max_iwp_date_time']) && !isset($row['max_ipp_date_time'])) {
                    $result = $row['i_last_modified_datetime'];
                } else if (
                            (isset($row['iw_compare']) && $row['iw_compare'] > 0 && isset($row['ip_compare']) && $row['ip_compare'] > 0) ||
                            (!isset($row['iw_compare']) && isset($row['ip_compare']) && $row['ip_compare'] > 0) ||
                            (isset($row['iw_compare']) && $row['iw_compare'] > 0 && !isset($row['ip_compare']))
                        ) {
                    $result = $row['i_last_modified_datetime'];
                } else if (isset($row['wp_compare']) && $row['wp_compare'] > 0) {
                    $result = $row['max_iwp_date_time'];
                } else {
                    $result = $row['max_ipp_date_time'];
                }

                if (is_null($result)) {
                    $result = $row['i_last_modified_datetime'];
                }
            }
        }

        return $result;
    }
}