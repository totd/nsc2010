<?php
class Incident_Model_Incident extends Zend_Db_Table_Abstract
{
    protected $_name = 'incident';

    public function getIcidentDescription($id)
    {
        $row = $this->fetchRow("i_ID = $id");

        return $row;

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
        $join = " LEFT JOIN state ON i_State = s_id";
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
}